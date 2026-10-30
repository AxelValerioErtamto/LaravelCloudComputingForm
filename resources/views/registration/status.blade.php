@php
    $icons = ['success' => '✓', 'info' => 'i', 'warning' => '!', 'error' => '✕'];
    $tone = $tone ?? 'info';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} · Cloud Computing 2025</title>
    @include('registration.partials.styles')
</head>
<body>
    <main class="card tone-{{ $tone }}">
        <header class="card-header">
            <svg class="cloud" viewBox="0 0 64 40" aria-hidden="true">
                <path d="M50 38H16A14 14 0 0 1 14.6 10.1 18 18 0 0 1 48.6 13.1 12.5 12.5 0 0 1 50 38Z" fill="currentColor"/>
            </svg>
            <h1>Cloud Computing 2025</h1>
            <p>Registration</p>
        </header>

        <section class="status">
            <div class="status-icon" aria-hidden="true">{{ $icons[$tone] ?? 'i' }}</div>
            <h2>{{ $title }}</h2>
            <p>{{ $message }}</p>

            @isset($email)
                <span class="email">{{ $email }}</span>
            @endisset

            @isset($note)
                <p class="note">{{ $note }}</p>
            @endisset

            <a href="{{ route('registration.create') }}" class="btn">
                {{ $tone === 'success' ? 'Register another student' : 'Back to the registration form' }}
            </a>
        </section>
    </main>

    <p class="below"><a href="{{ url('/') }}">← Back to axelv.my.id</a></p>
</body>
</html>
