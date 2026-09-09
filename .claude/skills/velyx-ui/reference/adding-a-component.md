# Adding or updating a Velyx component

The registry lives in `registry/components/{name}/`. `App\Services\ComponentService` reads it, the
API (`routes/api.php`) serves it, `public/registry.json` is the generated aggregate, and the docs
render from the same metadata. Prefer the `registry:*` Artisan commands over editing JSON by hand.

## Layout of one component

```
registry/components/{name}/
├── meta.json                     # canonical metadata (see fields below)
├── versions.json                 # { "latest": "1.2.0", "versions": ["1.0.0", "1.1.0", "1.2.0"] }
└── {version}/
    └── {name}/
        ├── index.blade.php       # the component (multiple blades / nested dirs allowed)
        ├── *.js  *.css           # optional assets (copied to resources/js|css/ui/ on install)
```

`meta.json` fields consumed by the docs page and API:

| field | shape | notes |
|---|---|---|
| `name` | string | kebab-case, matches the directory |
| `version` | string | current latest |
| `description` | string | one line, shown as the docs page lede |
| `categories` | string[] | e.g. `["ui", "feedback"]` — shown on the docs page |
| `laravel` | string | e.g. `">=10"` |
| `requires_alpine` | bool | drives the "Alpine.js: Required" row |
| `files` | `[{ "path": "...", "type": "blade" }]` | relative to `{version}/{name}/` |
| `requires` | `{ "composer": [], "npm": [], "velyx": [] }` | rendered as the Dependencies section; `velyx` = other registry components |

## New component

1. `registry/components/{name}/meta.json` — fill every field above; `version` = `1.0.0`.
2. `registry/components/{name}/versions.json` — `{ "latest": "1.0.0", "versions": ["1.0.0"] }`.
3. `registry/components/{name}/1.0.0/{name}/index.blade.php` — the source. Use `@props`,
   `data-slot`, semantic tokens, `$attributes->class([...])`; follow a sibling component. Alpine
   behaviour goes in `resources/js/ui/{name}.js` and is registered in `resources/js/app.js`.
4. **Preview:** `resources/views/preview/components/{name}/index.blade.php` — `@props(['props' => []])`,
   read `$props['...']` with sane defaults, render `<x-ui.{name}>` inside a
   `flex h-[220px] items-center justify-center` wrapper (copy `preview/components/badge/index.blade.php`).
   Served by the `preview.component` route and embedded by `<x-docs.component-preview>`.
5. **Docs nav:** add `'{Label}' => 'docs/components/{name}'` under `Components` in
   `config/velyx-docs.php`. No page file needed — the generic
   `resources/views/docs/components/show.blade.php` renders it. Only create
   `resources/views/docs/pages/components/{name}.blade.php` if it needs bespoke content.
6. `php artisan registry:validate --component={name} --strict`
7. `php artisan test --compact` and `vendor/bin/pint --dirty --format agent`.

## New version of an existing component

1. Copy `registry/components/{name}/{old}/` to `.../{new}/` and edit the source.
2. `php artisan registry:bump {name} {patch|minor|major}` (updates `versions.json` + `meta.json`)
   — or `php artisan registry:release {name} {version}` for an explicit version.
3. Re-run `registry:validate` and the test suite.

## Checks

- `php artisan registry:list` — see everything the registry exposes.
- `php artisan registry:validate [--json] [--strict]` — structure / integrity.
- The component's docs page at `/docs/components/{name}` must render (covered generically by
  `tests/Feature/SiteRenderTest.php`; add a case if the component needs special handling).
