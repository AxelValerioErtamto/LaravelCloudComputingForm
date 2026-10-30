<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Registration $registration)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirm your registration – Cloud Computing 2025',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registration-confirmation',
            text: 'emails.registration-confirmation-text',
            with: [
                'confirmUrl' => route('registration.confirm', $this->registration->token),
                'deadline' => $this->registration->confirmDeadline()->timezone('Asia/Jakarta'),
                'registeredAt' => $this->registration->created_at->copy()->timezone('Asia/Jakarta'),
            ],
        );
    }
}
