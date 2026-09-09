<?php

use Livewire\Component;

new class extends Component {};
?>

<footer class="border-t border-border bg-background" role="contentinfo">
    <div class="px-6 lg:px-12 xl:px-24 py-14 lg:py-20">
        <div class="mx-auto max-w-7xl">

            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[1.5fr_1fr_1fr]">

                {{-- Brand --}}
                <div class="flex flex-col gap-5 sm:col-span-2 lg:col-span-1">
                    <a href="{{ route('home') }}" wire:navigate class="flex w-fit items-center gap-2 text-foreground">
                        <x-icons.velyx class="h-5 w-5" />
                        <span class="text-[15px] font-semibold tracking-tight">Velyx</span>
                    </a>

                    <p class="max-w-xs text-sm leading-relaxed text-muted-foreground">
                        Copiez le composant, adaptez le balisage, livrez des interfaces qui restent votre produit — pas un paquet.
                    </p>

                    <div class="inline-flex w-fit items-center gap-2 rounded-lg border border-border bg-muted px-3 py-2 font-mono text-xs text-muted-foreground">
                        <x-icons.terminal class="h-3.5 w-3.5 shrink-0 opacity-60" />
                        npx velyx@latest add button
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <x-ui.button href="{{ route('docs.page', 'installation') }}" wire:navigate size="sm" iconRight="arrow-right">
                            Commencer
                        </x-ui.button>
                        <x-ui.button href="{{ config('velyx-docs.links.github') }}" target="_blank" rel="noopener noreferrer" variant="outline" size="sm">
                            GitHub
                        </x-ui.button>
                    </div>
                </div>

                {{-- Explorer --}}
                <div class="flex flex-col gap-4">
                    <p class="font-mono text-xs uppercase tracking-wider text-muted-foreground/60">Explorer</p>
                    <div class="-ml-3 flex flex-col items-start">
                        <x-ui.button href="{{ route('docs.page', 'installation') }}" wire:navigate variant="link" size="sm" class="text-muted-foreground hover:text-foreground">
                            Commencer
                        </x-ui.button>
                        <x-ui.button href="{{ route('docs.page', 'components') }}" wire:navigate variant="link" size="sm" class="text-muted-foreground hover:text-foreground">
                            Composants
                        </x-ui.button>
                        <x-ui.button href="{{ route('docs.index') }}" wire:navigate variant="link" size="sm" class="text-muted-foreground hover:text-foreground">
                            Documentation
                        </x-ui.button>
                    </div>
                </div>

                {{-- Communauté --}}
                <div class="flex flex-col gap-4">
                    <p class="font-mono text-xs uppercase tracking-wider text-muted-foreground/60">Communauté</p>
                    <div class="-ml-3 flex flex-col items-start">
                        <x-ui.button href="{{ config('velyx-docs.links.github') }}" target="_blank" rel="noopener noreferrer" variant="link" size="sm" class="text-muted-foreground hover:text-foreground">
                            GitHub
                        </x-ui.button>
                        <x-ui.button href="{{ config('velyx-docs.links.twitter') }}" target="_blank" rel="noopener noreferrer" variant="link" size="sm" class="text-muted-foreground hover:text-foreground">
                            X (Twitter)
                        </x-ui.button>
                        <x-ui.button href="{{ config('velyx-docs.links.support') }}" target="_blank" rel="noopener noreferrer" variant="link" size="sm" iconLeft="heart" class="text-muted-foreground hover:text-foreground">
                            Soutenir
                        </x-ui.button>
                    </div>
                </div>

            </div>

            <x-ui.separator class="my-8" />

            <div class="flex flex-col gap-3 text-xs text-muted-foreground/70 sm:flex-row sm:items-center sm:justify-between">
                <p>&copy; {{ date('Y') }} Velyx. Des composants Laravel pour les équipes qui tiennent à leur code.</p>
                <div class="flex items-center gap-5">
                    <button
                        type="button"
                        class="dark-mode-toggle group inline-flex items-center gap-2 rounded text-xs text-muted-foreground/70 transition-colors hover:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring"
                        aria-label="Basculer le thème sombre"
                    >
                        <x-lucide-sun class="h-3.5 w-3.5 shrink-0 dark:hidden" />
                        <x-lucide-moon class="hidden h-3.5 w-3.5 shrink-0 dark:block" />
                        <span class="relative inline-flex h-5 w-9 shrink-0 items-center rounded-full border border-border bg-muted transition-colors duration-200">
                            <span class="absolute size-4 translate-x-0.5 rounded-full bg-foreground/70 shadow-sm transition-transform duration-200 ease-out dark:translate-x-[1.125rem]"></span>
                        </span>
                        <span class="select-none">
                            <span class="dark:hidden">Clair</span>
                            <span class="hidden dark:inline">Sombre</span>
                        </span>
                    </button>

                    <p class="flex items-center gap-1">
                        Inspiré par
                        <x-ui.button href="https://ui.shadcn.com?utm_source={{ url()->current() }}" target="_blank" rel="noopener noreferrer" variant="link" class="h-auto p-0 text-xs text-muted-foreground/70 hover:text-muted-foreground">
                            shadcn/ui
                        </x-ui.button>
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>
