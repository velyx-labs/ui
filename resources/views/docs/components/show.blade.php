<?php
use Livewire\Component;

new class extends Component {};
?>

@php
    $meta = $componentData['meta'] ?? [];
    $requires = $meta['requires'] ?? ['composer' => [], 'npm' => [], 'velyx' => []];
    $hasDeps = array_filter([
        ...($requires['composer'] ?? []),
        ...($requires['npm'] ?? []),
        ...($requires['velyx'] ?? []),
    ]);
    $categories = array_filter($meta['categories'] ?? []);
@endphp

<x-docs.layout :title="$title">
    <x-docs.page-header
        eyebrow="Component"
        :title="\Illuminate\Support\Str::headline($componentName)"
        :description="$meta['description'] ?? 'Velyx component.'"
    />

    <div class="space-y-12">
        <section>
            <h2 id="installation" class="text-xl font-semibold tracking-[-0.02em]">Installation</h2>
            <div class="mt-4">
                <x-docs.code-tabs
                    npm="npx velyx@latest add {{ $componentName }}"
                    pnpm="pnpm dlx velyx@latest add {{ $componentName }}"
                    yarn="yarn dlx velyx@latest add {{ $componentName }}"
                    bun="bunx --bun velyx@latest add {{ $componentName }}"
                />
            </div>
            <p class="mt-3 text-sm text-muted-foreground">
                Files land in <code class="rounded bg-muted px-1 py-0.5 font-mono text-[0.8125rem]">resources/views/components/ui/{{ $componentName }}/</code> — yours to edit.
            </p>
        </section>

        <section>
            <h2 id="preview" class="text-xl font-semibold tracking-[-0.02em]">Preview</h2>
            <p class="mt-2 text-sm text-muted-foreground">Rendered from the same Blade template the CLI copies into your project.</p>
            <x-docs.component-preview :name="$componentName" />
        </section>

        <section>
            <h2 id="requirements" class="text-xl font-semibold tracking-[-0.02em]">Requirements</h2>
            <dl class="mt-4 grid grid-cols-1 gap-px overflow-hidden rounded-lg border border-border bg-border sm:grid-cols-2">
                <div class="bg-background px-4 py-3">
                    <dt class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">Laravel</dt>
                    <dd class="mt-1 text-sm">{{ $meta['laravel'] ?? '>=10' }}</dd>
                </div>
                <div class="bg-background px-4 py-3">
                    <dt class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">Alpine.js</dt>
                    <dd class="mt-1 text-sm">{{ ($meta['requires_alpine'] ?? false) ? 'Required' : 'Not required' }}</dd>
                </div>
                <div class="bg-background px-4 py-3">
                    <dt class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">Version</dt>
                    <dd class="mt-1 text-sm">{{ $componentData['version'] ?? '—' }}<span class="text-muted-foreground"> · latest {{ $componentData['latest'] ?? '—' }}</span></dd>
                </div>
                <div class="bg-background px-4 py-3">
                    <dt class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">Categories</dt>
                    <dd class="mt-1 text-sm">{{ $categories ? implode(', ', $categories) : '—' }}</dd>
                </div>
            </dl>
        </section>

        @if($hasDeps)
        <section>
            <h2 id="dependencies" class="text-xl font-semibold tracking-[-0.02em]">Dependencies</h2>
            <p class="mt-2 text-sm text-muted-foreground">Resolved and installed automatically by the CLI.</p>
            <div class="mt-4 space-y-3">
                @foreach(['composer' => 'Composer', 'npm' => 'npm', 'velyx' => 'Velyx components'] as $key => $label)
                    @if(!empty($requires[$key]))
                        <div class="flex flex-col gap-1.5 sm:flex-row sm:items-baseline sm:gap-3">
                            <span class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60 sm:w-36 sm:shrink-0">{{ $label }}</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($requires[$key] as $dep)
                                    <code class="rounded border border-border bg-muted px-1.5 py-0.5 font-mono text-xs">{{ $dep }}</code>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        @endif
    </div>
</x-docs.layout>
