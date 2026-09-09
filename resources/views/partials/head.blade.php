<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="{{ asset('favicon.ico') }}" sizes="16x16 32x32 48x48">
<link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
<link rel="apple-touch-icon" href="{{ asset('brand/apple-touch-icon.png') }}" sizes="180x180">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">
<meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#0a0a0a" media="(prefers-color-scheme: dark)">

<meta property="og:type" content="website">
<meta property="og:site_name" content="Velyx">
<meta property="og:title" content="Velyx — UI components for Laravel">
<meta property="og:description" content="Copy UI components into your Laravel codebase. Customize every detail.">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('brand/og-image.png') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:type" content="image/png">
<meta property="og:image:alt" content="Velyx — UI components copied into a Laravel code editor.">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Velyx — UI components for Laravel">
<meta name="twitter:description" content="Copy UI components into your Laravel codebase. Customize every detail.">
<meta name="twitter:image" content="{{ asset('brand/og-image.png') }}">
<meta name="twitter:image:alt" content="Velyx — UI components copied into a Laravel code editor.">

@vite('resources/css/app.css')
@vite('resources/js/app.js')

<script defer src="https://analytics.jiordiviera.me/script.js" data-website-id="04167809-86e7-4be3-b0ca-72e2b392ee52"></script>
<meta name="algolia-site-verification"  content="3F0311C1507C6863" />