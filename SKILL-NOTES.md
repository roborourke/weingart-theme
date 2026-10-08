# Skill notes: block-theme-principles in Create mode

Skill under test: `block-theme-principles` v1.0.0. Target: WordPress 7.1 (latest on Playground is 7.1.3). Every search used `--wp 7.1`. I also read the official `wp-block-themes`, `wp-patterns`, `blueprint` and `wp-playground` skills for mechanics.

The skill's Create mode has four steps. Steps 1 and 3 are where it changed the build most. Step 2 gave a clear order but no answer for the cases that mattered here. Step 4 asks for an output (file plan, decisions with ids, open questions). That is this file plus the README.

## Step 1: start from `fse-for-greenfield`, `start-from-scratch-not-off-the-shelf`, `theme-json-single-source`, `cbt-workflow`

Queries: none needed, SKILL.md names the four ids. `search.mjs get` on all four.

Used: all four.

What it made me do differently:
- Wrote `theme.json` before any pattern, and put every colour, size and space in it (`theme-json-single-source`). The blend mode for overprint is a theme.json custom token (`--wp--custom--film-blend`) so the `negative` variation can switch it to `screen` without touching CSS.
- Started from an empty folder with my own `theme.json`, not a scaffold (`start-from-scratch-not-off-the-shelf`).

Missing, unclear or conflicting:
- `cbt-workflow` cannot be followed by an agent with no running Site Editor. It says to configure in the Site Editor and save with Create Block Theme. The Playground comes last in my flow, so I wrote the files by hand. The chunk should say what an agent does instead (write files, then verify in Playground).
- `start-from-scratch-not-off-the-shelf` is marked `disagreement` with the official skill ("prefer a known-good scaffold") and is an unconfirmed default. It does not say what the minimum scratch layout is. I used: `style.css` header, `theme.json`, `templates/index.html`, `parts/`, `patterns/`, `functions.php`. A five-line "minimum scratch theme" would remove guesswork.
- Step 1 does not mention `$schema`. `theme-json-schema-version` only emits an `info` if it is absent. I used `https://schemas.wp.org/wp/7.1/theme.json` (it redirects to the `wp/7.1` branch of Gutenberg). The skill could say which URL form to use for a given `--wp`.

## Step 2: decide in order (editor control, block style, binding, pattern, custom block)

Queries: `custom block or pattern`, `section styles block styles variations`. `get`: `core-before-custom-blocks`, `block-style-before-template-css`, `patterns-by-reference-in-templates`. Also surfaced and not read: `custom-blocks-for-editor-ux`, `wrapper-and-encapsulated-blocks`, `t4-blocks-patterns-templates`, `component-patterns-with-parent`.

What it made me do differently:
- Built zero custom blocks. Every device is a core block plus a block style, a style variation, or a pattern.
- Used the `writingMode` typography support (paragraph and heading both support it in 7.1) as a block attribute in patterns, not CSS.
- Put purely typographic styles (`label`, `caption`, `numeral`) fully in `styles/blocks/*.json`, with no CSS.
- Referenced patterns by slug in templates (`<!-- wp:pattern {"slug":"weingart/archive-loop"} /-->`).
- Split the front page on purpose: the template pulls `stepped-hero` by slug (theme-owned) and then renders `post-content` (editor-owned, seeded by the blueprint from the registered patterns). That is the `patterns-filesystem-vs-db` debate in practice. The skill states the tension but gives no recipe for a front page that is partly theme and partly editor.

Missing, unclear or wrong:
- **No guidance for what core does not expose.** The order stops at "editor control or block support" and says CSS only where a control cannot do it. It never says what to do with: `font-stretch` (the width axis of a variable font), `mix-blend-mode`, pseudo-elements, CSS counters, `clip-path`. I confirmed in the 7.1 source (`class-wp-theme-json.php`) that none has a theme.json key. Searches for "font-stretch variable font axis", "mix-blend-mode pseudo-element css", "writing-mode vertical text" returned only loosely related chunks (`fluid-type-and-spacing`, `element-styles-in-theme-json`, `custom-blocks-for-editor-ux`). A principle like "CSS-only styles: register the style, put the CSS in a per-block file, expose any value as a theme.json custom token" would have settled this.
- **Where does that CSS live?** Three options exist and the skill does not rank them: (a) `styles.css` or `css` inside a `styles/blocks/*.json` partial; (b) `wp_enqueue_block_style` files; (c) a global stylesheet. `per-block-css-loading` implies (b). I used (b) for pseudo-element and blend rules, and (a) for one-line declarations (`font-stretch:62%`).
- **`block-style-before-template-css` says block-style partials are "likely 6.6, verify".** I verified in 7.1: `wp_register_block_style_variations_from_theme_json_partials()` skips any partial with no `styles` key. A partial that only names a style, with all CSS elsewhere, is silently not registered, so the editor never offers it. I only noticed because I checked the core source. The principle should say: a partial must carry at least one `styles` value, or register the style in PHP.
- **Per-instance CSS cost.** Block-style variations from theme.json are emitted per block instance (`is-style-label--2`, `--7`, `--8`, ...). On the front page that is 51 rules, about 30 KB uncompressed, from `label`, `caption`, `numeral`, `condensed` and `extended` used across patterns. The skill promotes JSON block styles (`block-style-before-template-css`, `design-in-block-styles-vs-theme-json`) and never mentions this cost. `runtime-performance-hygiene` and `per-block-css-loading` should cross-reference it.
- `component-patterns-with-parent` says to build small component patterns plus a parent. My patterns are section-level and PHP loops build the repeated rows. Neither the skill nor `wp-patterns` says whether loops in a pattern file are fine. `wp-patterns` says "Pattern PHP executes once at registration" and warns against query-dependent code, so loops over static arrays are safe. I kept them.
- `wp-patterns` guardrail 1 says "no custom CSS classes". Block-style classes (`is-style-*`) are custom classes in the markup. The skill's `unregistered-block-style` check is the right companion, but the conflict between the two skills is not mentioned in `crossref/official-agent-skills`.
- Pattern categories: patterns with unregistered `Categories:` are dropped from the inserter. Neither skill says to register a theme category. I added `register_block_pattern_category( 'weingart', ... )` in `functions.php`.

## Step 3: tokens in theme.json, then patterns by slug, then per-block CSS

Queries: `presets literals theme.json`, `fluid type spacing`, `pattern ids urls template reference`, `important specificity editor front end`, `accessibility focus reduced motion`. `get`: `fluid-type-and-spacing`, `presets-over-literals`, `accessibility-baseline`, `element-styles-in-theme-json`, `pattern-assets-no-ids`, `per-block-css-loading`, `editor-first-controls`.

What it made me do differently:
- All type sizes and spacing are fluid presets. Spacing steps 50, 60, 70 have min values at 25 percent of max so the stepped headline keeps equal steps on mobile.
- No `!important`, no `.editor-styles-wrapper`, no hex or px font sizes outside `theme.json` settings. All colours in CSS go through `var(--wp--preset--color--*)`. Dots in the halftone use `color-mix()` on a preset, which passes `literal-colors`.
- Link, button and focus states are in `styles.elements` (`:hover`, `:focus-visible`). I checked the generated CSS: focus outlines are emitted for links and buttons.
- Reduced motion: the only transition is wrapped in `@media (prefers-reduced-motion: no-preference)`.
- Fonts: self-hosted woff2 through `fontFace`, as the brief asked.

Missing, unclear or conflicting:
- **`runtime-performance-hygiene` says "system fonts".** This brief needs two custom families. The skill does not say how to ship web fonts responsibly (subset, one variable file, `font-display: swap`, preload). I used one Latin variable file (90 KB), `swap`, and did not preload.
- **`accessibility-baseline` has no colour contrast numbers** and has `confidence: low`. The brief's palette failed AA in three places: grey `#8a8a8a` text on paper (3.0:1), magenta (ink on it 4.2:1) and red (paper on it 4.3:1). I computed the ratios myself and adjusted magenta to `#ee1a8c` and red to `#dc0613`, and added a second grey for small text. A contrast table check in `check-theme.mjs` for palette pairs would catch this.
- Semantic palette slugs are not covered. `basel-red` replaces the cyan film by overriding the `cyan` slug's value, so the slug lies. A role-based alias (`accent`) would be cleaner but then `film-cyan` is not "cyan". No principle covers naming palette slugs by colour versus by role.
- The slug normaliser trap from the official skill (`3xl` becomes `3-xl`) did not bite because I used numeric spacing slugs (`10`..`90`) and `x-large` style names. The skill cross-references it under `presets-over-literals`, which was helpful.
- Style variations (`styles/*.json`): no principle at all. I wrote `basel-red` (palette override) and `negative` (swap root colours, keep palette so ink text on film grounds stays dark, change blend to `screen`). The official `style-variations.md` covers the file format only. Design advice is missing: swap styles, not palette values, when slugs like `ink` double as "text colour" and "black".

## Step 3b: keep environment IDs out of committed markup

Queries: `ref environment ids navigation`, `query loop cost`. `get`: `no-env-ids-in-committed-markup`, `query-loop-cost`.

What it made me do differently:
- The header navigation has no `ref`. It holds inner blocks (`wp:page-list`) so it renders without a `wp_navigation` post. I verified the menu renders in Playground with no DB navigation. I dropped `wp:home-link` because the page list already shows the front page.
- No `queryId` collisions: the two patterns use 11 and 12. Each page has at most one Query Loop, well under the budget of 4. The front page has one (`post-grid`). `index`, `home`, `archive` and `search` share the `archive-loop` pattern with `inherit: true`.
- No attachment IDs: the theme has no images at all, so `pattern-assets-no-ids` was met by omission. `get_theme_file_uri()` is used for the fonts through theme.json only. No pattern needed it.

Missing or unclear:
- `no-env-ids-in-committed-markup` says what to remove but not what to put in its place. For navigation, "inner blocks, no `ref`" worked and renders, but editors then edit the menu inside the header part. The principle does not say whether that is acceptable; `navigation-is-expensive` suggests deciding early but I did not read it.
- `query-loop-cost` has `decision: default` (unconfirmed) and gives a count budget but nothing on the numbered-list device used here (a CSS counter on `post-template`). It is free, but it is not discussed.

## Step 4: output (file plan, decisions with ids, open questions)

Decisions with ids are above. Open questions for Rob:
1. Is it right to ship per-instance JSON block styles for tiny typographic styles used dozens of times (30 KB on the front page)?
2. Should CSS-only block styles be registered in PHP (what I did) or as a JSON partial with a trivial `styles` value?
3. Is the split front page (hero by slug in the template, rest in `post-content`) the preferred pattern?

## Validator and tooling findings

- `check-theme.mjs` `unregisteredBlockStyle` only sees `register_block_style( ..., array( 'name' => 'literal' ) )`. My first version looped over an array and the check reported 50 false warnings. Literal calls are also easier to grep, so I rewrote them. The skill should state this limit.
- The same check counts a `styles/blocks/*.json` partial with `blockTypes` as registered even when it has no `styles`. Core ignores such partials (see step 2). This is a false negative: the check would pass a theme whose styles never appear in the editor.
- No check validates that `wp:pattern` slugs exist in `patterns/` (`patterns-by-reference-in-templates` lists it as automatable). I checked by hand and via the Playground render.
- No check for block markup validity against `save()`. Hand-written pattern markup (classes, `style` attributes) can trigger "Attempt block recovery" in the editor. `wp-patterns` says to verify in the Code Editor. I could not open the editor (no browser step), so this is unverified. Highest-risk blocks: Group with flex and `verticalAlignment`, paragraphs with `writingMode`, the Group with `border`.
- No check or guidance for Playground verification of a theme. The skill had no hit for "playground blueprint demo content". I used the `blueprint` and `wp-playground` skills.

## Process notes

- Commit trailer: the brief said `Claude Opus 5.5 (1M context)`; the harness said `Claude Sonnet 5.5`, which is the model that did the work. Commits use the Sonnet line.
- Search output is one line of JSON per result list. `cut` on it breaks it. A `--ids` flag or text output would help when scanning.

## Final `check-theme.mjs` output

```
$ node scripts/check-theme.mjs /Users/rob/Work/weingart-theme/weingart --wp 7.1
0 error(s), 0 warning(s), 0 info; 0 allowed.
exit 0
```

No allow-list (`.block-theme-principles.json`) is used.
