CLOUD COMPUTING 2025 — Registration Confirmation

Hello {!! $registration->name !!}!

Congratulations! You have successfully registered for Cloud Computing 2025. We're excited to have you join the class!

REGISTRATION DETAILS
Registration ID : {!! $registration->code !!}
Full Name       : {!! $registration->name !!}
Email           : {!! $registration->email !!}
Birthdate       : {!! $registration->birthdate->format('F j, Y') !!}
Course          : Cloud Computing 2025
Registered on   : {!! $registeredAt->format('F j, Y H:i') !!} WIB

To complete your registration, open this link:
{!! $confirmUrl !!}

Important: please confirm by {!! $deadline->format('F j, Y') !!} to secure your spot.

Questions? Contact us at {!! config('mail.from.address') !!}
If you didn't register, you can safely ignore this email.
