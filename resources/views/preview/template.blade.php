<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview: {{ $component }}</title>

    {{-- Tailwind & app assets (Geist ships bundled via @fontsource in app.css) --}}
    @vite('resources/css/app.css')
    @livewireStyles
    @vite('resources/js/app.js')
    <style>
        /* Preview-specific styles */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        .preview-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }
    </style>
</head>
<body>
    <div class="preview-container" data-preview="{{ $component }}" data-variant="{{ $currentVariant ?? 'default' }}">
        {{-- Loading state --}}
        <div x-cloak x-data="{ loaded: true }" x-show="!loaded" class="preview-loading">
            <div class="preview-spinner"></div>
        </div>

        {{-- Component content --}}
        <div x-data="previewData()" x-init="initPreview()" x-show="loaded" x-cloak>
            @include($previewView, [
                'component' => $component,
                'props' => $props,
                'variants' => $variants ?? [],
                'currentVariant' => $currentVariant ?? 'default',
                'isInteractive' => $isInteractive ?? false,
            ])
        </div>
    </div>

    {{-- Preview initialization script --}}
    <script>
        function previewData() {
            return {
                loaded: false,
                component: '{{ $component }}',
                props: @js($props),
                variant: '{{ $currentVariant ?? 'default' }}',

                initPreview() {
                    // Wait for Alpine to be ready
                    this.$nextTick(() => {
                        this.loaded = true;

                        // Emit ready event to parent iframe
                        window.parent.postMessage({
                            type: 'preview:ready',
                            component: this.component,
                            variant: this.variant,
                        }, '*');
                    });
                }
            }
        }
    </script>

    @stack('previewScripts')
    @livewireScriptConfig
    
    <!-- Initialize theme -->
    <script>
        // Theme initialization - default to dark
        if (localStorage.getItem('theme') !== 'light') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    
        // Smooth scrolling for anchor links
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
