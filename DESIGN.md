# Design System — Velyx (Geist)

The Velyx site (landing + docs) follows the **Vercel / Geist** visual language:
monochrome, high whitespace, hairline borders, one typeface, no brand color.
Light and dark are treated equally — no forced default, the site follows
`prefers-color-scheme` with a manual toggle stored in `localStorage('theme')`.

## 1. Principles

1. **Practice what you preach** — the landing renders the real `<x-ui.*>` components it ships.
2. **Show the work** — real CLI output and real Blade code do the selling, not marketing copy.
3. **Monochrome by default** — black and white plus a neutral grey scale. The only
   chromatic color is the link blue, and only on text links.
4. **Hairlines, not cards everywhere** — 1px borders separate regions; reserve fill,
   radius and shadow for the one element that needs lifting.
5. **Type carries the page** — Geist, tight tracking on headings, Geist Mono for
   code, commands, eyebrows and table headers.

## 2. Color tokens

Defined in `resources/css/app.css` (`:root` / `.dark`). Never hard-code hex in views —
use the semantic Tailwind classes (`bg-background`, `text-muted-foreground`, `border-border`…).

| Token | Light | Dark | Use |
|-------|-------|------|-----|
| `--background` | `#ffffff` | `#0a0a0a` | Page ground |
| `--card` / `--muted` | `#fafafa` | `#141414` | Subtle raised surface, code blocks |
| `--secondary` / `--accent` | `#f4f4f4` | `#1f1f1f` | Hover fills, chips |
| `--foreground` | `#000000` | `#ededed` | Primary text |
| `--muted-foreground` | `#666666` | `#8f8f8f` | Secondary text, captions |
| `--border` / `--input` | `#eaeaea` | `#262626` / `#2e2e2e` | Hairlines, field borders |
| `--primary` | `#000000` | `#ededed` | Solid button fill (inverts per theme) |
| `--primary-foreground` | `#ffffff` | `#0a0a0a` | Text on solid button |
| `--ring` | `#000000` | `#8f8f8f` | Focus outline |
| `--destructive` | `#e5484d` | `#ff6369` | Errors, destructive actions |
| `--link` | `#0070f3` | `#3291ff` | **Text links only** — `text-link` |

`--radius`: `0.375rem` (6px). Chart tokens are unchanged (data-viz only).

## 3. Typography

- **Sans (display + body):** `Geist` — `--font-sans`, also `--font-heading`.
  Bundled via `@fontsource/geist`, no webfont request.
- **Mono:** `Geist Mono` — `--font-mono`. Code, terminal, `npx` commands,
  uppercase eyebrow labels, table column headers.
- Headings: weight 600, `letter-spacing: -0.03em` (down to `-0.045em` on the hero).
- Body: weight 400, `letter-spacing: -0.011em`, measure ~60–65ch.
- Eyebrows / labels: Geist Mono, `~11px`, `letter-spacing: 0.14em`, uppercase.

Type scale: hero `clamp(2.6rem, 6vw, 4.3rem)` · h2 `2rem` · h3 `1.05rem` ·
body `0.95rem` · small `0.8rem`.

## 4. Layout

- Content max-width **1080px**, 24px side padding.
- Bento / specimen grids: `gap: 1px` over a `--border`-colored background to draw
  hairline separators; vary cell spans (`col-span-2`) rather than equal thirds.
- Nav: sticky, minimal — mark + wordmark left, 2–3 links, GitHub star count right.
- Docs: three panes — `220px` rail / `1fr` content / `190px` "On this page" TOC.
- Buttons: radius 6px. Primary = `--primary` fill. Secondary = transparent + `--border` outline.
- Section rhythm: `clamp(4rem, 8vw, 7rem)` vertical.
- Mobile: all multi-column collapses below 880px; TOC and rail hidden.

## 5. Motion

Minimal. Ease-out, 150–250ms, `transform` / `opacity` only. Respect
`prefers-reduced-motion`. The dark-mode toggle keeps its circular View-Transition reveal.

## 6. Brand assets

`public/brand/` — see `public/site.webmanifest` and `resources/views/partials/head.blade.php`.

- Mark: horizontal bar over a downward chevron (`M6 3H10 M3 7L8 13L13 7`),
  `stroke="currentColor"` — one file for both themes.
- `velyx-mark-{black,white}.svg`, `velyx-lockup-{black,white}.svg`, `favicon.svg`
  (theme-aware), platform icons, and `og-image.*` (1200×630, English copy).

## 7. Banned

- No warm / cream backgrounds, no serif body, no orange accent (the previous
  "Cursor Warm Gothic" system is retired).
- No chromatic color beyond `--link` and `--destructive`.
- No `<style>` blocks inside Blade views — all styling via tokens + Tailwind utilities.
- No pure `#000` shadows or glows; no gradient heroes.
- No emoji in UI — use the icon system (`<x-icon>`, `<x-lucide-*>`, `<x-icons.*>`).
- No forced dark mode; no webfont `<link>` (fonts are bundled).
