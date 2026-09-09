@props([
    'title' => 'Velyx Documentation',
    'description' => config('velyx-docs.site_description'),
])

<x-docs.base-layout :title="$title" :description="$description">
    <div
        class="documentation-grid container-wrapper px-6 py-10 lg:px-8"
        x-data="{ sidebarOpen: false }"
        x-effect="document.body.classList.toggle('overflow-hidden', sidebarOpen)"
    >

        {{-- Mobile trigger --}}
        <div class="lg:hidden mb-6">
            <button
                @click="sidebarOpen = true"
                class="inline-flex items-center gap-2 rounded-lg border border-border bg-card px-3 py-2 text-sm font-medium text-foreground transition-colors hover:bg-muted"
            >
                <x-lucide-menu class="h-4 w-4" />
                <span>Menu</span>
            </button>
        </div>

        {{-- Mobile backdrop --}}
        <div
            x-show="sidebarOpen"
            @click="sidebarOpen = false"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-background/60 backdrop-blur-sm lg:hidden"
        ></div>

        {{-- Mobile sidebar panel --}}
        <div
            x-show="sidebarOpen"
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r border-border bg-background lg:hidden"
        >
            <div class="flex items-center justify-between border-b border-border px-5 py-4">
                <span class="font-mono text-xs uppercase tracking-widest text-muted-foreground/50">Docs</span>
                <button
                    @click="sidebarOpen = false"
                    class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                    aria-label="Close menu"
                >
                    <x-lucide-x class="h-4 w-4" />
                </button>
            </div>
            <div class="flex-1 overflow-y-auto px-5 py-6">
                <livewire:docs.sidebar />
            </div>
        </div>

        {{-- Desktop sidebar --}}
        <aside class="documentation-sidebar hidden lg:block">
            <div class="documentation-sidebar__inner">
                <livewire:docs.sidebar />
            </div>
        </aside>

        {{-- Main content --}}
        <main class="documentation-main min-w-0 pb-20">
            {{ $slot }}
        </main>

        {{-- On this page --}}
        <aside class="documentation-toc">
            <x-docs.toc />
        </aside>

    </div>
</x-docs.base-layout>
