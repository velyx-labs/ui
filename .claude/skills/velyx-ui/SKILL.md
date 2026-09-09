---
name: velyx-ui
description: "Use for any work on the Velyx registry app's own website — the marketing landing (resources/views/pages/home.blade.php), the documentation site (resources/views/docs/**, x-docs.* components), the shared layout/header/footer, brand assets, or the Geist design system (tokens in resources/css/app.css, rules in DESIGN.md). Also use when adding, versioning, or documenting a Velyx component in registry/components/**, wiring its preview (resources/views/preview/components/**) or its docs nav entry (config/velyx-docs.php). Triggers: Velyx landing page, Velyx docs, x-docs.layout, x-docs.toc, component registry, meta.json, Geist design, brand/og image, velyx-docs config. Do NOT use for the distributed components' internal markup (that is livewire-development / tailwindcss-development) or generic Laravel backend work."
license: MIT
metadata:
  author: velyx
---

# Velyx UI & Docs

This skill governs the **registry application's own site** — landing page, documentation, layout,
brand — and the workflow for **publishing components to the registry**. It does not govern the
markup of the shipped components themselves.

## Design system: Geist

The site follows the Vercel / Geist visual language. The full contract is in **`DESIGN.md`** at the
repo root — read it before styling anything. Non-negotiables:

- **Monochrome.** Black / white / a neutral grey scale. The only chromatic colours are `--link`
  (blue, text links only) and `--destructive`. No brand colour, no gradients, no glows.
- **Tokens only.** Every colour comes from the semantic Tailwind classes backed by
  `resources/css/app.css` (`--background`, `--foreground`, `--muted-foreground`, `--border`,
  `--primary`, `--link`, …). Never hard-code a hex in a Blade view. Never add a `<style>` block
  to a view.
- **Type.** `Geist` (`font-sans`, `font-heading`) and `Geist Mono` (`font-mono`), both bundled via
  `@fontsource` in `app.css` — never add a webfont `<link>`. Tight tracking on headings
  (`tracking-[-0.03em]`, hero `-0.045em`); mono uppercase for eyebrows / labels / table headers.
- **Layout.** Content max-width ~1080px; hairline (`gap-px` over `bg-border`) bento grids with
  varied spans, not equal thirds; buttons at `--radius` (6px); section rhythm `py-24`ish.
- **Themes are equal.** Light and dark both first-class. No forced default — the theme resolves
  from `localStorage('theme')` then `prefers-color-scheme` (see below). Never reintroduce a
  "default to dark" branch.

## Site architecture

- **One shell:** `resources/views/components/layout.blade.php` (`<x-layout>`). It renders
  `partials.head`, the theme bootstrap script, `<livewire:partials.header />`, `{{ $slot }}`,
  `<livewire:partials.footer />`, `@livewireScriptConfig`. Do **not** add `@livewireScripts` —
  `resources/js/app.js` boots Livewire via the ESM bundle.
  - `resources/views/layouts/app.blade.php` is the Livewire full-page layout
    (`config/livewire.php` → `component_layout`); it just delegates to `<x-layout>`.
  - `resources/views/components/docs/base-layout.blade.php` also delegates to `<x-layout>`.
- **Theme:** the inline script in `<x-layout>` and `preferredTheme()` / the `matchMedia` listener
  in `app.js` must stay in sync — stored preference wins, otherwise system, and a change of OS
  theme is reflected live while no explicit choice is stored. The `.dark-mode-toggle` button in
  the footer is wired by `app.js`; keep that class and markup if you touch the footer.
- **Head & brand:** `resources/views/partials/head.blade.php` owns the favicon / manifest /
  `theme-color` / `og:` / `twitter:` block. Brand files live in `public/brand/` (+ `favicon.svg`,
  `site.webmanifest` at `public/` root). The mark is inline as `<x-icons.velyx>`
  (`stroke="currentColor"`, one file for both themes) — not an `<img>` swap. OG copy is English.
- **Links & repo:** GitHub / X / support URLs and the stars-API repo slug come from
  `config('velyx-docs.links.*')` and `config('velyx-docs.github_repo')`. Canonical repo is
  `velyx-labs/velyx`. Never hard-code a GitHub URL in a view.

## Documentation site

- Pages are Blade under `resources/views/docs/`. Wrap content in **`<x-docs.layout :title="...">`**
  (3-pane: sidebar / content / "On this page").
- **`<x-docs.page-header eyebrow title description />`** for the page head.
- **`<x-docs.toc />`** is rendered by `x-docs.layout` automatically — it scans
  `.documentation-main` for `h2`/`h3`, slugs any missing `id`, and scroll-spies. Author real
  `<h2>`s and the TOC populates itself; add explicit `id=""` when you want a stable anchor.
- **`<x-docs.code-tabs npm pnpm yarn bun />`** for install commands (it does not forward
  `class` — wrap it in a `<div>` to add margin).
- **`<x-docs.component-preview :name="..." />`** renders the live component with a Preview/Code
  toggle (source is fetched from the `previews.source` route).
- **Component pages** render from `resources/views/docs/components/show.blade.php` for every
  component. `DocsController::component()` first looks for an override at
  `resources/views/docs/pages/components/{name}.blade.php` — only add one for a component that
  genuinely needs bespoke content; otherwise the generic page (Installation / Preview /
  Requirements / Dependencies, all from metadata) is the source of truth.
- **Nav** is `config/velyx-docs.php` → `navigation` (`Section => ['url' => ..., 'children' => [...]]`).
  Add a component's entry under `Components` when you publish it.

## Adding or updating a component in the registry

See **`reference/adding-a-component.md`** for the full checklist. In short: create
`registry/components/{name}/meta.json` + `versions.json` + `{version}/{name}/*.blade.php`, add a
preview at `resources/views/preview/components/{name}/index.blade.php`, and add the nav entry.
`App\Services\ComponentService` reads `meta.json` (`description`, `categories`, `laravel`,
`requires_alpine`, `requires.{composer,npm,velyx}`, `files`) — keep those fields accurate, the
docs page renders straight from them.

## Icons

- `<x-icon name="arrow-right-02" />` — HugeIcons, general UI.
- `<x-lucide-* />` — Lucide, used across `x-ui.*` and docs.
- `<x-icons.* />` — brand marks (`icons.github`, `icons.velyx`, `icons.terminal`, …) in
  `resources/views/components/icons/`.
- Never use emoji in UI.

## Build & test

- Frontend: `pnpm run build` (or `composer run dev` for the full dev stack). A missing Vite
  manifest error means assets aren't built.
- Tests: `php artisan test --compact` (Pest). Site-level rendering is covered by
  `tests/Feature/SiteRenderTest.php` — extend it when you change the layout, head, landing or a
  docs template. Every change needs a test.
- Formatting: `vendor/bin/pint --dirty --format agent` after touching PHP/Blade.

## Anti-patterns

- `<style>` blocks in Blade views; hard-coded hex; a webfont `<link>`.
- Any chromatic colour beyond `--link` / `--destructive`; warm/cream backgrounds; serif body
  (the old "Cursor Warm Gothic" system is retired).
- A forced dark default, or a second divergent full HTML document instead of `<x-layout>`.
- Hard-coded GitHub / social URLs — use `config('velyx-docs.links.*')`.
- `@livewireScripts` in the layout (double-loads Livewire).
- A bespoke `docs/pages/components/{name}.blade.php` when the generic page would do.
