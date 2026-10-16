<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Axel — Portfolio</title>

    <!-- Fonts & Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-indigo-500 selection:text-white min-h-screen flex flex-col justify-between relative overflow-x-hidden">

    <!-- Background Glow Effects -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-tr from-indigo-600/20 to-violet-500/20 blur-3xl pointer-events-none -z-10 rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500/10 blur-3xl pointer-events-none -z-10 rounded-full"></div>

    <!-- Navigation Header -->
    <header class="w-full max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <div class="text-xl font-bold tracking-tight text-white flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-indigo-500 inline-block animate-pulse"></span>
            axel<span class="text-indigo-400">.</span>
        </div>

        @if (Route::has('login'))
            <nav class="flex items-center gap-4 text-sm font-medium">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-slate-300 hover:text-white transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-white transition-colors">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-full transition-all shadow-lg shadow-indigo-600/20">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Main Hero Section -->
    <main class="w-full max-w-4xl mx-auto px-6 py-20 my-auto text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-slate-800 bg-slate-900/80 text-slate-300 text-xs font-medium mb-8 shadow-sm backdrop-blur-sm">
            <span class="flex h-2 w-2 relative">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            Available for new opportunities
        </div>

        <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-white mb-6">
            Hi, I'm <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-violet-400 to-pink-400">Axel</span>.
        </h1>

        <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed mb-10">
            I can defeat you in untitled boxing game!
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#projects" class="w-full sm:w-auto bg-white text-slate-950 hover:bg-slate-200 font-semibold px-6 py-3.5 rounded-xl transition-all shadow-xl">
                View My Work
            </a>
            <a href="#contact" class="w-full sm:w-auto bg-slate-900 hover:bg-slate-800 text-slate-200 font-semibold px-6 py-3.5 rounded-xl border border-slate-800 transition-all">
                Get in Touch
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-6xl mx-auto px-6 py-8 border-t border-slate-900/80 text-center text-xs text-slate-500 flex flex-col sm:flex-row justify-between items-center gap-4">
        <p>&copy; {{ date('Y') }} Axel. Built with Laravel & Tailwind CSS.</p>
        <div class="flex items-center gap-6">
            <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors">GitHub</a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors">LinkedIn</a>
            <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors">X / Twitter</a>
        </div>
    </footer>

</body>
</html>