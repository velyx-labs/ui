@php
    $navigation = config('velyx-docs.navigation', []);
    $currentPath = trim(request()->path(), '/');
@endphp

<nav class="space-y-6 text-sm">
    <div class="lg:hidden">
        <x-ui.input placeholder="Search docs..." icon="search" aria-label="Search docs" />
    </div>

    @foreach($navigation as $section => $item)
        <section>
            <a
                href="{{ docs_url($item['url']) }}"
                class="mb-2 block px-2 font-mono text-[11px] uppercase tracking-[0.14em] text-muted-foreground/60 transition-colors hover:text-foreground"
            >
                {{ $section }}
            </a>

            <div class="space-y-px border-l border-border">
                @foreach(($item['children'] ?? []) as $label => $url)
                    @php $active = $currentPath === trim($url, '/'); @endphp
                    <a
                        href="{{ docs_url($url) }}"
                        @class([
                            '-ml-px block border-l py-1.5 pl-3 transition-colors',
                            'border-foreground font-medium text-foreground' => $active,
                            'border-transparent text-muted-foreground hover:border-border hover:text-foreground' => ! $active,
                        ])
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </section>
    @endforeach
</nav>
