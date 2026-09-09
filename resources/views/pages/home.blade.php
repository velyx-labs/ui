<?php

use App\Services\ComponentService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

new class extends Component
{
    public array $components = [];

    public int $stars = 0;

    public function mount(ComponentService $componentService): void
    {
        $this->components = $componentService->getAllComponents();

        $repo = config('velyx-docs.github_repo');

        $this->stars = Cache::remember('github_stars_velyx', 3600, function () use ($repo) {
            $response = Http::withHeaders(['Accept' => 'application/vnd.github+json'])
                ->timeout(5)
                ->get("https://api.github.com/repos/{$repo}");

            return $response->successful() ? (int) $response->json('stargazers_count', 0) : 0;
        });
    }
};
?>

<div class="bg-background text-foreground">

    {{-- ─── HERO ──────────────────────────────────────────────────────────── --}}
    <section class="px-6 pt-24 pb-20 md:pt-32 md:pb-28 lg:px-12 xl:px-24">
        <div class="mx-auto max-w-3xl">
            <p class="font-mono text-xs uppercase tracking-[0.14em] text-muted-foreground">
                Composants Blade pour Laravel
            </p>

            <h1 class="mt-5 text-[clamp(2.6rem,6vw,4.3rem)] font-semibold leading-[0.95] tracking-[-0.045em]">
                Copiez le composant.<br>
                <span class="text-muted-foreground/60">Il est à vous.</span>
            </h1>

            <p class="mt-6 max-w-[46ch] text-lg leading-relaxed text-muted-foreground">
                Velyx copie des composants dans votre dépôt — pas une dépendance.
                Vous les lisez, les modifiez, les commitez. Zéro runtime.
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-3">
                <x-ui.button href="{{ route('docs.page', 'installation') }}" wire:navigate size="lg" iconRight="arrow-right">
                    Commencer
                </x-ui.button>
                <x-ui.button href="{{ route('docs.page', 'components') }}" wire:navigate variant="outline" size="lg">
                    Parcourir les {{ count($this->components) }} composants
                </x-ui.button>
            </div>

            <div
                x-data="{ cmd: 'npx velyx@latest add button field', copied: false }"
                class="mt-6 inline-flex items-center gap-3 rounded-lg border border-border bg-muted px-4 py-2.5 font-mono text-sm text-muted-foreground"
            >
                <span class="select-none text-muted-foreground/50">$</span>
                <span class="text-foreground" x-text="cmd"></span>
                <button
                    type="button"
                    @click="navigator.clipboard.writeText(cmd); copied = true; setTimeout(() => copied = false, 1500)"
                    class="ml-1 rounded border border-border px-1.5 py-0.5 text-xs transition-colors hover:text-foreground"
                    :class="copied && 'text-foreground'"
                    x-text="copied ? 'copié' : 'copier'"
                ></button>
            </div>

            <p class="mt-5 text-sm text-muted-foreground/70">
                <a
                    href="{{ config('velyx-docs.links.github') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-1.5 transition-colors hover:text-foreground"
                >
                    <x-lucide-star class="size-3.5" />
                    @if($stars > 0)
                        <strong class="font-semibold text-foreground">{{ number_format($stars) }}</strong>&nbsp;étoiles sur GitHub
                    @else
                        Star sur GitHub
                    @endif
                </a>
            </p>
        </div>
    </section>

    <x-ui.separator />

    {{-- ─── CE QUI EST LIVRÉ (bento) ──────────────────────────────────────── --}}
    <section class="px-6 py-24 lg:px-12 xl:px-24">
        <div class="mx-auto max-w-7xl">
            <div class="mb-10 flex flex-col gap-4 border-b border-border pb-8 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="text-[clamp(1.75rem,3.5vw,2.5rem)] font-semibold tracking-[-0.03em]">
                        Ce qui est livré.
                    </h2>
                    <p class="mt-2 max-w-[52ch] text-sm text-muted-foreground">
                        Chaque cellule est rendue par le template Blade que vous copierez — la landing mange sa propre nourriture.
                    </p>
                </div>
                <x-ui.button href="{{ route('docs.page', 'components') }}" wire:navigate variant="outline" size="sm" iconRight="arrow-right" class="shrink-0">
                    Les {{ count($this->components) }} composants
                </x-ui.button>
            </div>

            <div class="grid grid-cols-1 gap-px overflow-hidden rounded-xl border border-border bg-border sm:grid-cols-2 lg:grid-cols-3">

                {{-- Button — cellule large --}}
                <div class="flex flex-col gap-5 bg-background p-8 sm:col-span-2">
                    <span class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">button.blade.php</span>
                    <div class="flex flex-wrap gap-2.5">
                        <x-ui.button size="sm">Primary</x-ui.button>
                        <x-ui.button size="sm" variant="outline">Outline</x-ui.button>
                        <x-ui.button size="sm" variant="ghost">Ghost</x-ui.button>
                        <x-ui.button size="sm" variant="secondary">Secondary</x-ui.button>
                        <x-ui.button size="sm" variant="destructive">Supprimer</x-ui.button>
                    </div>
                    <div class="flex flex-wrap gap-2.5">
                        <x-ui.button iconRight="arrow-right">Commencer</x-ui.button>
                        <x-ui.button variant="outline" icon="icons.github" :lucide="false">GitHub</x-ui.button>
                    </div>
                </div>

                {{-- Badge --}}
                <div class="flex flex-col gap-4 bg-background p-8">
                    <span class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">badge</span>
                    <div class="flex flex-wrap gap-2">
                        <x-ui.badge>Défaut</x-ui.badge>
                        <x-ui.badge variant="secondary">Secondary</x-ui.badge>
                        <x-ui.badge variant="success">Publié</x-ui.badge>
                        <x-ui.badge variant="destructive">Erreur</x-ui.badge>
                        <x-ui.badge variant="outline">Brouillon</x-ui.badge>
                    </div>
                </div>

                {{-- Field --}}
                <div class="flex flex-col gap-5 bg-background p-8">
                    <span class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">field</span>
                    <div class="space-y-4">
                        <x-ui.field>
                            <x-ui.field.label>Adresse e-mail</x-ui.field.label>
                            <x-ui.field.content>
                                <x-ui.input placeholder="vous@exemple.com" />
                            </x-ui.field.content>
                        </x-ui.field>
                        <x-ui.field>
                            <x-ui.field.label>Mot de passe</x-ui.field.label>
                            <x-ui.field.content>
                                <x-ui.input type="password" placeholder="••••••••" />
                            </x-ui.field.content>
                        </x-ui.field>
                    </div>
                </div>

                {{-- Checkbox --}}
                <div class="flex flex-col gap-5 bg-background p-8">
                    <span class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">checkbox</span>
                    <div class="space-y-3 text-sm">
                        <label class="flex cursor-pointer items-center gap-2.5">
                            <x-ui.checkbox checked />
                            <span>Notifications par e-mail</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-2.5 text-muted-foreground">
                            <x-ui.checkbox />
                            <span>Actualités produit</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-2.5">
                            <x-ui.checkbox checked />
                            <span>Alertes de sécurité</span>
                        </label>
                    </div>
                </div>

                {{-- Progress --}}
                <div class="flex flex-col gap-5 bg-background p-8">
                    <span class="font-mono text-[10px] uppercase tracking-[0.14em] text-muted-foreground/60">progress-bar</span>
                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <div class="flex justify-between text-xs text-muted-foreground">
                                <span>Envoi des assets</span><span>72%</span>
                            </div>
                            <x-ui.progress-bar :percentage="72" />
                        </div>
                        <div class="space-y-1.5">
                            <div class="flex justify-between text-xs text-muted-foreground">
                                <span>Installation des deps</span><span>30%</span>
                            </div>
                            <x-ui.progress-bar :percentage="30" />
                        </div>
                        <div class="space-y-1.5">
                            <div class="flex justify-between text-xs text-muted-foreground">
                                <span>Build terminé</span><span>100%</span>
                            </div>
                            <x-ui.progress-bar :percentage="100" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <x-ui.separator />

    {{-- ─── WORKFLOW ──────────────────────────────────────────────────────── --}}
    <section class="px-6 py-24 lg:px-12 xl:px-24">
        <div class="mx-auto max-w-7xl">
            <div class="mb-10 space-y-1.5">
                <p class="font-mono text-xs uppercase tracking-[0.14em] text-muted-foreground/60">Workflow</p>
                <h2 class="text-3xl font-semibold tracking-[-0.03em]">Trois commandes. C'est tout.</h2>
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                @foreach([
                    ['01', 'Initialiser le projet', 'npx velyx@latest init', 'Détecte votre stack Laravel, écrit un fichier velyx.json.'],
                    ['02', 'Choisir des composants', 'npx velyx@latest add button', 'Les fichiers atterrissent dans votre code. Commitez, ils sont à vous.'],
                    ['03', 'Ou plusieurs à la fois', 'npx velyx@latest add button field input', 'Chaque exécution est idempotente.'],
                ] as [$step, $title, $command, $description])
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="font-mono text-xs text-muted-foreground/50">{{ $step }}</span>
                        <span class="h-px flex-1 bg-border"></span>
                    </div>
                    <h3 class="font-semibold">{{ $title }}</h3>
                    <div class="rounded-lg bg-muted px-4 py-3 font-mono text-sm text-foreground">
                        <span class="mr-2 select-none text-muted-foreground">$</span>{{ $command }}
                    </div>
                    <p class="text-sm leading-relaxed text-muted-foreground">{{ $description }}</p>
                </div>
                @endforeach
            </div>

            <div class="mt-10 overflow-hidden rounded-xl border border-border">
                <div class="border-b border-border bg-muted px-4 py-2.5 font-mono text-xs text-muted-foreground/60">~/mon-app-laravel</div>
                <div class="space-y-1.5 p-5 font-mono text-sm">
                    <div><span class="mr-2 select-none text-muted-foreground/40">$</span>npx velyx@latest add button field</div>
                    <div class="space-y-0.5 pl-5 text-muted-foreground">
                        <div><span class="mr-2 text-foreground">✓</span>button.blade.php</div>
                        <div><span class="mr-2 text-foreground">✓</span>field/index.blade.php</div>
                        <div class="pt-1 text-muted-foreground/60">2 composants copiés — ils sont à vous.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-ui.separator />

    {{-- ─── CTA FINAL ─────────────────────────────────────────────────────── --}}
    <section class="px-6 py-28 lg:px-12 xl:px-24">
        <div class="mx-auto max-w-2xl space-y-7">
            <span class="block h-px w-8 bg-foreground/25"></span>
            <h2 class="text-[clamp(2rem,5vw,3.25rem)] font-semibold leading-[1.05] tracking-[-0.03em]">
                Vos composants,<br>
                <span class="text-muted-foreground">votre code.</span>
            </h2>
            <p class="text-lg leading-relaxed text-muted-foreground">
                Arrêtez de vous battre avec des librairies boîte noire. Collez le code, faites-le vôtre, livrez en confiance.
            </p>
            <div class="flex flex-wrap gap-3">
                <x-ui.button href="{{ route('docs.page', 'installation') }}" wire:navigate size="lg" iconRight="arrow-right">
                    Commencer
                </x-ui.button>
                <x-ui.button href="{{ route('docs.page', 'components') }}" wire:navigate variant="outline" size="lg">
                    Parcourir les composants
                </x-ui.button>
            </div>
        </div>
    </section>

</div>
