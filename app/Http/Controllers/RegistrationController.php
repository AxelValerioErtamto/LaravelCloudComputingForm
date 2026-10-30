<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationConfirmation;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class RegistrationController extends Controller
{
    /** GET /registration — show the form. */
    public function create()
    {
        return view('registration.form');
    }

    /** POST /registration — validate, save, send the confirmation email. */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthdate' => ['required', 'date', 'after:1900-01-01', 'before_or_equal:today'],
        ], [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your student email.',
            'email.email' => 'That doesn\'t look like a valid email address.',
            'password.min' => 'Your password needs at least 8 characters.',
            'password.confirmed' => 'The two passwords don\'t match.',
            'birthdate.required' => 'Please pick your birthdate.',
            'birthdate.before_or_equal' => 'Your birthdate can\'t be in the future.',
        ]);

        $registration = Registration::create([
            'name' => trim($data['name']),
            'email' => Str::lower(trim($data['email'])),
            'password' => Hash::make($data['password']),
            'birthdate' => $data['birthdate'],
            'token' => Str::random(64),
        ]);

        try {
            Mail::to($registration->email, $registration->name)
                ->send(new RegistrationConfirmation($registration));
        } catch (Throwable $e) {
            // Mail server unreachable, wrong credentials, etc. Log it and let the user retry.
            report($e);
            $registration->delete();

            return back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('mail_error', 'Sorry, we couldn\'t send the confirmation email right now. Please try again in a moment.');
        }

        return redirect()
            ->route('registration.sent')
            ->with('registered_email', $registration->email);
    }

    /** GET /registration/sent — "check your inbox" page. */
    public function sent(Request $request)
    {
        $email = $request->session()->get('registered_email');

        if (! $email) {
            return redirect()->route('registration.create');
        }

        return view('registration.status', [
            'tone' => 'success',
            'title' => 'Check your inbox',
            'message' => 'We\'ve sent a confirmation email to',
            'email' => $email,
            'note' => 'Open it and click "Confirm My Registration" within ' . Registration::CONFIRM_DAYS . ' days to secure your spot. Can\'t find it? Check your spam folder.',
        ]);
    }

    /** GET /registration/confirm/{token} — the link inside the email. */
    public function confirm(string $token)
    {
        $registration = Registration::where('token', $token)->first();

        if (! $registration) {
            return response()->view('registration.status', [
                'tone' => 'error',
                'title' => 'Link not valid',
                'message' => 'This confirmation link doesn\'t match any registration. Please register again.',
            ], 404);
        }

        if ($registration->confirmed_at) {
            return view('registration.status', [
                'tone' => 'info',
                'title' => 'Already confirmed',
                'message' => 'Your registration was confirmed on '
                    . $registration->confirmed_at->timezone('Asia/Jakarta')->format('F j, Y \a\t H:i') . ' WIB. You\'re all set!',
            ]);
        }

        if ($registration->isExpired()) {
            return view('registration.status', [
                'tone' => 'warning',
                'title' => 'Link expired',
                'message' => 'Confirmation links are valid for ' . Registration::CONFIRM_DAYS . ' days. Please fill in the form again to get a new one.',
            ]);
        }

        $registration->forceFill(['confirmed_at' => now()])->save();

        return view('registration.status', [
            'tone' => 'success',
            'title' => 'You\'re in, ' . Str::before($registration->name, ' ') . '!',
            'message' => 'Your spot in Cloud Computing 2025 is confirmed. Registration ID: ' . $registration->code . '.',
        ]);
    }
}
