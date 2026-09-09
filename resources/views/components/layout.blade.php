@props([
    'title' => null,
    'description' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head', ['title' => $title])
    <meta name="description" content="{{ $description ?? config('velyx-docs.site_description') }}">
    @livewireStyles

    <script>
        (function () {
            const stored = localStorage.getItem('theme');
            const theme = stored === 'dark' || stored === 'light'
                ? stored
                : (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', theme === 'dark');
            document.documentElement.dataset.theme = theme;
        })();
    </script>
</head>
<body class="min-h-screen bg-background text-foreground antialiased">
    <livewire:partials.header />
    {{ $slot }}
    <livewire:partials.footer />
    @livewireScriptConfig
</body>
</html>
