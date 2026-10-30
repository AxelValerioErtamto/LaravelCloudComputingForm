<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirm your registration – Cloud Computing 2025</title>
</head>
<body style="margin:0; padding:0; background-color:#f1f5f9; font-family:'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color:#1f2937;">
    {{-- Preview text shown next to the subject line in the inbox --}}
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">
        You're registered for Cloud Computing 2025. Confirm your spot within {{ \App\Models\Registration::CONFIRM_DAYS }} days.
    </div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f1f5f9;">
        <tr>
            <td align="center" style="padding:32px 12px;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; background-color:#ffffff; border-radius:12px; overflow:hidden;">

                    {{-- Header --}}
                    <tr>
                        <td align="center" style="background-color:#2563eb; background-image:linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); padding:36px 24px 30px;">
                            <div style="font-size:40px; line-height:1;">☁️</div>
                            <h1 style="margin:12px 0 0; font-size:26px; font-weight:700; color:#ffffff;">Cloud Computing 2025</h1>
                            <p style="margin:6px 0 0; font-size:15px; color:#dbeafe;">Registration Confirmation</p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:32px 32px 8px;">
                            <p style="margin:0 0 14px; font-size:18px; color:#111827;">
                                Hello <strong>{{ $registration->name }}</strong>! 👋
                            </p>
                            <p style="margin:0 0 24px; font-size:15px; line-height:1.6; color:#374151;">
                                Congratulations! You have successfully registered for
                                <strong>Cloud Computing 2025</strong>. We're excited to have you join the class!
                            </p>

                            {{-- Details card --}}
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f8fafc; border:1px solid #e2e8f0; border-left:4px solid #2563eb; border-radius:8px;">
                                <tr>
                                    <td style="padding:20px 22px;">
                                        <p style="margin:0 0 14px; font-size:15px; font-weight:700; color:#1e293b;">📋 Registration Details</p>
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:14px;">
                                            <tr>
                                                <td width="130" style="padding:6px 0; color:#64748b; font-weight:600; vertical-align:top;">Registration ID</td>
                                                <td style="padding:6px 0; color:#111827; font-family:Consolas, Menlo, monospace;">{{ $registration->code }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0; color:#64748b; font-weight:600; vertical-align:top;">Full Name</td>
                                                <td style="padding:6px 0; color:#111827;">{{ $registration->name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0; color:#64748b; font-weight:600; vertical-align:top;">Email</td>
                                                <td style="padding:6px 0; color:#111827; word-break:break-all;">{{ $registration->email }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0; color:#64748b; font-weight:600; vertical-align:top;">Birthdate</td>
                                                <td style="padding:6px 0; color:#111827;">{{ $registration->birthdate->format('F j, Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0; color:#64748b; font-weight:600; vertical-align:top;">Course</td>
                                                <td style="padding:6px 0; color:#111827; font-weight:700;">Cloud Computing 2025</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0; color:#64748b; font-weight:600; vertical-align:top;">Registered on</td>
                                                <td style="padding:6px 0; color:#111827;">{{ $registeredAt->format('F j, Y · H:i') }} WIB</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:28px 0 18px; font-size:15px; line-height:1.6; color:#374151;">
                                To complete your registration and confirm your spot in the class, please click the button below:
                            </p>
                        </td>
                    </tr>

                    {{-- Button (table-based so it works in Outlook too) --}}
                    <tr>
                        <td align="center" style="padding:0 32px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center" bgcolor="#16a34a" style="border-radius:8px;">
                                        <a href="{{ $confirmUrl }}" target="_blank"
                                           style="display:inline-block; padding:14px 34px; font-size:16px; font-weight:700; color:#ffffff; text-decoration:none; border-radius:8px;">
                                            🎓 Confirm My Registration
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:24px 32px 8px;">
                            <p style="margin:0 0 16px; padding:12px 14px; background-color:#fffbeb; border:1px solid #fde68a; border-radius:6px; font-size:14px; line-height:1.5; color:#92400e;">
                                <strong>Important:</strong> please confirm by
                                <strong>{{ $deadline->format('F j, Y') }}</strong>
                                ({{ \App\Models\Registration::CONFIRM_DAYS }} days) to secure your spot.
                            </p>
                            <p style="margin:0; font-size:12.5px; line-height:1.5; color:#94a3b8;">
                                Button not working? Copy this link into your browser:<br>
                                <a href="{{ $confirmUrl }}" style="color:#2563eb; word-break:break-all;">{{ $confirmUrl }}</a>
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:24px 32px 30px;">
                            <hr style="border:0; border-top:1px solid #e2e8f0; margin:0 0 20px;">
                            <p style="margin:0 0 6px; text-align:center; font-size:13.5px; color:#64748b;">
                                Thank you for choosing Cloud Computing 2025!
                            </p>
                            <p style="margin:0; text-align:center; font-size:13px; color:#94a3b8;">
                                Questions? Contact us at
                                <a href="mailto:{{ config('mail.from.address') }}" style="color:#2563eb;">{{ config('mail.from.address') }}</a>
                            </p>
                            <p style="margin:12px 0 0; text-align:center; font-size:12px; color:#cbd5e1;">
                                If you didn't register, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
