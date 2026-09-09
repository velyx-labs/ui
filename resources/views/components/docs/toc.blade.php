{{-- Auto-generated "On this page" list. Scans .documentation-main for h2/h3, assigns ids, tracks the visible section. --}}
<nav x-data="docsToc()" x-show="items.length > 0" x-cloak aria-label="On this page">
    <p class="mb-3 font-mono text-[10px] uppercase tracking-[0.16em] text-muted-foreground/60">On this page</p>
    <ul class="space-y-px border-l border-border text-sm">
        <template x-for="item in items" :key="item.id">
            <li>
                <a
                    :href="'#' + item.id"
                    @click.prevent="go(item.id)"
                    class="-ml-px block border-l border-transparent py-1 pl-3 leading-snug text-muted-foreground transition-colors hover:text-foreground"
                    :class="{ 'border-foreground text-foreground': active === item.id, 'pl-6': item.level === 1 }"
                    x-text="item.text"
                ></a>
            </li>
        </template>
    </ul>
</nav>

@once
    <script>
        window.docsToc = function () {
            return {
                items: [],
                active: null,
                observer: null,
                init() {
                    const main = document.querySelector('.documentation-main');
                    if (!main) {
                        return;
                    }

                    const headings = Array.from(main.querySelectorAll('h2, h3'));

                    this.items = headings
                        .map((heading) => {
                            if (!heading.id) {
                                heading.id = heading.textContent.trim().toLowerCase()
                                    .replace(/[^\w\s-]/g, '')
                                    .replace(/\s+/g, '-')
                                    .replace(/-+/g, '-')
                                    .replace(/^-|-$/g, '');
                            }

                            return {
                                id: heading.id,
                                text: heading.textContent.trim(),
                                level: heading.tagName === 'H3' ? 1 : 0,
                            };
                        })
                        .filter((item) => item.id && item.text);

                    if (this.items.length === 0) {
                        return;
                    }

                    this.active = this.items[0].id;

                    this.observer = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                this.active = entry.target.id;
                            }
                        });
                    }, { rootMargin: '0px 0px -70% 0px', threshold: 0 });

                    headings.forEach((heading) => this.observer.observe(heading));
                },
                destroy() {
                    this.observer?.disconnect();
                },
                go(id) {
                    const el = document.getElementById(id);

                    if (!el) {
                        return;
                    }

                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    history.replaceState(null, '', '#' + id);
                    this.active = id;
                },
            };
        };
    </script>
@endonce
