# Weingart

A WordPress block theme after the typography of Wolfgang Weingart (*Typography: My Way to Typography*, Lars Müller, 2000). A strict Swiss grid, deliberately disrupted. Off-white paper, black ink, and cyan, magenta and yellow printed as overlapping film. All text in these demos is original.

Requires WordPress 6.6+, tested on 7.1. PHP 7.4+.

## Install

This repo is the theme. Either clone it into your themes folder:

```
cd wp-content/themes
git clone https://github.com/roborourke/weingart-theme.git weingart
```

Or download the ZIP from GitHub and upload it under Appearance > Themes > Add New Theme > Upload Theme. Then activate Weingart.

## Run it in Playground

You need Node 20.18 or newer (the pinned CLI warns it prefers Node 24.18; it ran on 24.15). From the repo root:

```
npx @wp-playground/cli@3.1.57 server --mount=.:/wordpress/wp-content/themes/weingart --blueprint=./blueprint.json --port=9420
```

The mount includes the `.git` folder. That is harmless.

Open http://127.0.0.1:9420. The blueprint activates the theme, turns on `WP_DEBUG` display, sets pretty permalinks and creates demo content:

- `/` is a page called Index. It uses the "Front page with stepped hero" page template, which adds the hero; the page body holds the index, overprint poster, post grid and halftone quote. If Settings > Reading shows latest posts instead, the front page is the plain journal list.
- `/journal/` is the posts page (eight posts in five categories).
- `/about/` shows the type specimen.
- `/category/process/`, `/?s=type` and any missing URL show the archive, search and 404 templates.

Stop the server with Ctrl+C. If you started it in the background, kill its PID and check `pgrep -f wp-playground` returns nothing.

The repo root is mounted, so edits to templates, patterns and CSS show on reload. Edits to the blueprint need a restart.

## What is in the theme

```
./
  style.css             theme header: name, version, requirements
  theme.json            tokens: palette, fluid type and spacing, fonts, element styles
  functions.php         pattern category, PHP block styles, per-block CSS loading
  styles/               style variations: basel-red, negative
  styles/blocks/        block and section styles that theme.json can express
  assets/css/blocks/    CSS only for what theme.json cannot do (blend modes, crop marks, counters)
  assets/fonts/         Archivo (variable, wdth 62-125, wght 100-900; Latin and Latin Extended), IBM Plex Mono 400/700, licences
  patterns/             weingart/stepped-hero, index-list, overprint-poster, halftone-quote,
                        specimen, post-grid, archive-loop, colophon
  parts/                header, footer
  templates/            index, front-stepped (page template), single, page, archive, search, 404
  screenshot.png        theme thumbnail for Appearance > Themes
  docs/                 build notes, evaluation and screenshots (left out of ZIP downloads)
  blueprint.json        Playground blueprint with demo content (left out of ZIP downloads)
```

### Design devices

| Device | Where it lives |
| --- | --- |
| Stepped headline | `stepped-hero` pattern: spacing presets 50, 60, 70 as equal left padding steps |
| Width and weight contrast | `condensed` and `extended` styles on headings and paragraphs (`font-stretch` has no theme.json key) |
| Letterspaced labels, vertical labels | `label` paragraph style; `writingMode` typography support on paragraphs |
| Huge index numerals | `numeral` paragraph style; `indexed` post-template style counts 01, 02, 03 with a CSS counter |
| Heavy rules and bars | `rule-heavy` and `rule-short` separator styles; `wedge` group style |
| Overprint film | `overprint` group style (`mix-blend-mode`, set through `--wp--custom--film-blend`) |
| Halftone screen | `halftone` group style |
| Crop and registration marks | `registration` group style |
| Section styles | `ink`, `film-cyan`, `film-magenta`, `paper` group styles |

### Style variations

- **Basel red** swaps `accent-1` (the cyan film) for a red that keeps ink text at 4.5:1 or more. It lists the full palette, because a variation palette replaces the theme palette.
- **Negative** turns the page to ink and the type to paper, and switches the overprint blend to `screen`.

## Colour and contrast

Magenta and red are slightly adjusted from the original brief so text passes WCAG AA. Ink on magenta is 4.6:1. Paper on red is 4.5:1. Cyan and yellow are only used as grounds with ink text. Palette slugs are semantic: `base` (paper), `contrast` (ink), `accent-1` to `accent-4` (cyan, magenta, yellow, red), `muted` and `muted-strong`. Grey `muted` `#8a8a8a` is for rules, large type and dark grounds; `muted-strong` is for small text on paper (4.7:1).

## Fonts

Self-hosted woff2 from the `@fontsource-variable/archivo@5.3.0` and `@fontsource/ibm-plex-mono@5.3.0` packages (Latin subset; Archivo also has Latin Extended). Both are under the SIL Open Font License 1.1. The licence texts are in `assets/fonts/`. Nothing loads from a font CDN at runtime.

## Checks

```
node <block-theme-principles>/scripts/check-theme.mjs . --wp 7.1
```

Run it from the repo root. See `docs/SKILL-NOTES.md` for how the `block-theme-principles` skill shaped the build.

## Licence

The theme is GPL-2.0-or-later (see `LICENSE`). The bundled fonts are under the SIL Open Font License 1.1; their licence texts are in `assets/fonts/`.
