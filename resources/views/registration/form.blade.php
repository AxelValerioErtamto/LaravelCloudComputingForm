<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register · Cloud Computing 2025</title>
    @include('registration.partials.styles')
</head>
<body>
    <main class="card">
        <header class="card-header">
            <svg class="cloud" viewBox="0 0 64 40" aria-hidden="true">
                <path d="M50 38H16A14 14 0 0 1 14.6 10.1 18 18 0 0 1 48.6 13.1 12.5 12.5 0 0 1 50 38Z" fill="currentColor"/>
            </svg>
            <h1>Cloud Computing 2025</h1>
            <p>Registration Form</p>
        </header>

        <form method="POST" action="{{ route('registration.store', [], false) }}" class="card-body" id="registration-form">
            @csrf

            @if (session('mail_error'))
                <div class="alert alert-error" role="alert">{{ session('mail_error') }}</div>
            @endif

            <div class="field">
                <label for="name">Full Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                       placeholder="Enter your full name" autocomplete="name" required
                       class="@error('name') is-invalid @enderror">
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="email">Student Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                       placeholder="Enter your student email" autocomplete="email" required
                       class="@error('email') is-invalid @enderror">
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password"
                       placeholder="Create a secure password" autocomplete="new-password" minlength="8" required
                       class="@error('password') is-invalid @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @else
                    <p class="hint">At least 8 characters.</p>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       placeholder="Confirm your password" autocomplete="new-password" minlength="8" required>
            </div>

            <div class="field">
                <label for="birthdate">Birthdate</label>
                <input id="birthdate" name="birthdate" type="date" value="{{ old('birthdate') }}"
                       max="{{ now()->toDateString() }}" required
                       class="@error('birthdate') is-invalid @enderror">
                @error('birthdate') <p class="error">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn" id="submit-btn">Register for Cloud Computing 2025</button>
        </form>
    </main>

    <p class="below"><a href="{{ url('/') }}">← Back to axelv.my.id</a></p>

    <script>
        // Prevent double submissions (and double emails) while the request is in flight.
        document.getElementById('registration-form').addEventListener('submit', function () {
            var btn = document.getElementById('submit-btn');
            btn.disabled = true;
            btn.textContent = 'Registering…';
        });
    </script>
</body>
</html>
