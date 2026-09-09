<?php

use Livewire\Component;

new class extends Component {};
?>

<header class="sticky top-0 z-50 w-full border-b border-border bg-background/85 backdrop-blur supports-backdrop-filter:bg-background/70">
    <div class="px-6 lg:px-12 xl:px-24">
        <div class="mx-auto flex h-14 max-w-7xl items-center justify-between gap-6">

            {{-- Logo --}}
            <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-2 text-foreground">
                <x-icons.velyx class="h-5 w-5" />
                <span class="text-[15px] font-semibold tracking-tight">Velyx</span>
            </a>

            {{-- Nav --}}
            <nav class="hidden flex-1 items-center gap-1 sm:flex" aria-label="Navigation principale">
                <x-ui.button href="{{ route('docs.page', 'installation') }}" wire:navigate variant="ghost" size="sm" class="text-muted-foreground hover:text-foreground">
                    Docs
                </x-ui.button>
                <x-ui.button href="{{ route('docs.page', 'components') }}" wire:navigate variant="ghost" size="sm" class="text-muted-foreground hover:text-foreground">
                    Composants
                </x-ui.button>
            </nav>

            {{-- Right actions --}}
            <div class="flex items-center gap-1">
                <a
                    href="{{ config('velyx-docs.links.support') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex h-8 items-center gap-1.5 rounded-md px-2.5 text-xs font-medium text-muted-foreground transition-colors hover:text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
                >
                    <x-lucide-heart class="h-3.5 w-3.5" />
                    <span class="hidden sm:inline">Soutenir</span>
                </a>

                <a
                    href="{{ config('velyx-docs.links.github') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex size-9 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-accent hover:text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
                    aria-label="Velyx sur GitHub"
                >
                    <x-icons.github class="h-4 w-4" />
                </a>
            </div>
        </div>
    </div>
</header>
