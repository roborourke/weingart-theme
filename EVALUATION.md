# Evaluation: weingart block theme

Reviewer: independent read, no browser, no server. WP version: `Requires at least: 6.6`, `Tested up to: 7.1`, `$schema` .../wp/7.1/ (so min 6.6, target 7.1). Shape: pure block theme (no classic templates). `check-theme.mjs` at `--wp 6.6`, `6.9` and `7.1`: 0 errors, 0 warnings, 0 info each time.

Tag legend: `[D]` = rests on a `decision: default` principle, `[L]` = rests on a `confidence: low` principle. Severity as in the skill (must / should / consider).

## 1. Scorecard

| Theme | Verdict | Summary |
|---|---|---|
| T1 Editor in control | Met | Block styles, section styles and elements used well; no locking. One parity risk (see markup validity). |
| T2 Tokens and theme.json | Met | Everything is presets; fluid sizes and spacing; `$schema` set. A few literals in CSS-only pieces. |
| T3 CSS strategy | Partly met | No `!important`; per-block enqueue used, but the files load on every page and theme.json block styles emit per-instance CSS. |
| T4 Blocks, patterns, templates | Partly met | No custom blocks, patterns by slug, no IDs. Hand-written markup has a likely validation defect and one dead anchor. |
| T5 Environment drift | Met | Navigation has no `ref`, no attachment IDs, templates committed. |
| T6 Performance | Partly met | One variable font, `swap`, no preload; 3 rem-scale counters per post; one query per page. |
| T7 Accessibility | Not met | Invisible focus ring on buttons, contrast failures in dark contexts, decorative counter read aloud, heading skip. `must`. |
| T8 Editor experience | Partly met | Good style names and a pattern category; no comments, no featured image, template text not translatable. |
| T9 Process, versions | Met | Greenfield FSE, from scratch, version gates consistent (6.6 for section styles and theme.json v3). |

### T1 Editor in control
- Met: `block-style-before-template-css` (should). All `is-style-*` have a registration (PHP or `styles/blocks/*.json`); the `unregistered-block-style` check passes. `editor-first-controls` met: `writingMode`, spacing, min-height, colours via supports.
- `theme.json:270` `styles.css` global `a, .wp-element-button` transition: acceptable, reduced-motion guarded. `consider`.
- `appearanceTools: true` (`theme.json:5`) turns on every control, against `defaults-over-guardrails` (consider, decision rob). Not a defect for a designer-led theme. `consider`.
- Not applicable: `lock-sparingly` [D] (no locks used).

### T2 Tokens and theme.json
- Met: `theme-json-single-source`, `presets-over-literals`, `fluid-type-and-spacing`, `element-styles-in-theme-json` [D].
- `assets/css/blocks/group.css:28-29,49-56,66-69` literal sizes (`0.14rem`, `1rem`, `1px`, `1.25rem`) in CSS rather than tokens. `consider`. They are geometry, not design tokens, so I would accept them.
- `theme.json:77` `display` fluid `max` (8rem) is above `size` (7rem); `giant` too (`18rem` vs `16rem`). Valid but the "size" is no longer the real maximum, and the editor shows 7rem. `should`, `presets-over-literals`/`fluid-type-and-spacing`. Fix: set `size` to the max.
- `styles/basel-red.json:8` overrides the `cyan` slug with a red value. Class names `has-cyan-background-color` then mean red. `should`, no principle covers slug honesty (skill gap, see section 2).
- `theme.json:19-20` two greys: sensible split by use (large vs small). Good.
- `theme.json:152-153` `heading` `lineHeight: "1"` is applied to h3/h4 body-sized headings too; wrapped lines will collide. `consider`.

### T3 CSS strategy
- Met: `no-important-use-specificity`: no `!important`, specificity of two classes.
- Partly met: `per-block-css-loading` (should). `functions.php:73-85` registers per-block files through `wp_enqueue_block_style` on `init` (correct hook). But `group` and `separator` are in the header on every page, so `group.css` (about 3 KB, overprint/halftone/registration/wedge) and `separator.css` load everywhere. The principle is satisfied in form, not in saving. Fix: split `group.css` into one file per style (not possible per style in core: block-style CSS is per block, not per style) or accept the cost. `consider`.
- `styles/blocks/*.json`: block style variations from theme.json are emitted per instance (`.is-style-label--2` ...). See section 2.
- `theme.json:270` global CSS in theme.json `css` string: fine for two rules; `element-styles-in-theme-json` [D] would prefer elements. `consider`.
- `group.css:6-8,10-12` `> *` and `> * + *` child selectors couple the style to the inner markup; override of blockGap through negative margin fights the layout engine (`native-layout-over-hacks`, should). The `blockGap:0` on the pattern plus margin-inline-start is a deliberate overlap, so this is a judgement call. `consider`.
- `group.css:73-75` `clip-path` wedge on a Group: also clips focus outline and any child content. `consider`.

### T4 Blocks, patterns, templates
- Met: `core-before-custom-blocks` (zero custom blocks), `patterns-by-reference-in-templates` (all loops via `wp:pattern`), `pattern-assets-no-ids` (no images at all), `component-patterns-with-parent` (section-level patterns; PHP loops over static arrays are safe).
- `bindings-for-single-property`: n/a (no dynamic single-property use).
- **should (high risk)**: `wp:paragraph {"align":"wide"}` with class `alignwide` at `patterns/archive-loop` n/a; actual hits: `patterns/stepped-hero.php:16-18`, `patterns/index-list.php:23-25`, `patterns/post-grid.php:16-18`, `patterns/specimen.php:34-36`, `templates/404.html:5-6,13-14`. In core, Paragraph has no `supports.align` for wide/full; its `align` attribute is text alignment, and `save()` would write `has-text-align-wide`. The editor will probably flag these as invalid and offer recovery. Front end is fine (HTML is output as saved). I could not run the editor; verify by opening each pattern in the Code Editor. Fix: wrap in a Group with `align: wide`, or drop the attribute and rely on constrained layout width.
- **should**: `patterns/stepped-hero.php:59` `href="#index"` points at the `index-list` pattern anchor, which `front-page.html` does not include. The button is dead on a fresh site. Fix: link to something that exists, or include the pattern.
- **should**: `templates/front-page.html` always overrides `home`. If Settings > Reading is "latest posts", the front page shows the hero plus an empty `post-content`, and no posts. `templates-committed-and-clean` [D]. Fix: make hero conditional by moving to a page-template via `customTemplates`, or note it.
- `templates/home.html` is byte-identical to `index.html`. Delete one (`templates-committed-and-clean` [D], `theme-json-diff-hygiene` spirit). `consider`.
- `patterns/colophon.php:8` `Block Types: core/template-part/footer` is correct. Footer part is only a pattern reference: fine, but then the part has no content of its own and the Site Editor "reset" returns to the pattern. OK.
- `patterns/overprint-poster.php:26` `layout.verticalAlignment: "space-between"` with `orientation: vertical`: not a value the Group UI emits for vertical stacks; likely ignored. `consider`.
- Missing: no `wp:comments` in `single.html`, no featured image anywhere, no `author`, `tag` or `singular` templates (index fallback is fine). `consider`.

### T5 Environment drift and governance
- Met: `no-env-ids-in-committed-markup`: `wp:navigation` at `parts/header.html:13` has no `ref` and carries `wp:page-list` inner blocks. `queryId` 11 and 12 are static and unique per page.
- Met: `templates-committed-and-clean` [D], `cbt-workflow`: n/a for an agent build.
- `navigation-is-expensive`: n/a here; page-list fallback is the cheap route. Note it means editors edit the menu in the header part.

### T6 Performance
- Met: `query-loop-cost` [D]: at most one query per page; `inherit:true` on the main loop.
- Partly met: `runtime-performance-hygiene`. Fonts: `theme.json:44` one 90 KB variable file; `swap` set; no preload; Latin subset only (no Latin Extended, so Polish, Czech, Hungarian, Turkish glyphs fall back to Arial and break the width axis). `should`.
- `assets/css/blocks/post-template.css:10-19` a display-size mono numeral per list item; six per page, fine.
- `theme.json:36` family stack lists `Archivo` first, so the fallback `Helvetica Neue, Arial` has different metrics and no `size-adjust`; swap will shift layout on a 7-8rem headline. `consider`.

### T7 Accessibility (must)
- **must**: `theme.json:146-148` and `:127-129` focus outline `color: currentColor`. On the default button (paper text on ink) the outline is paper, offset 3px onto a paper page: invisible. In `styles/negative.json:15` and `styles/blocks/group-ink.json:12` the button is paper-on-ink inside an ink context: the outline is ink on ink. Fix: use a fixed token (`ink` on paper, `yellow` on ink) via a section-style override. `accessibility-baseline` [L].
- **must**: `styles/blocks/paragraph-caption.json:8` text `grey-dark` (#6b6b6b) is 4.68:1 on paper but 3.54:1 on ink. Caption on the `Ink` section style or the `Negative` variation fails AA at 12px. `colophon.php:41,45` overrides to `grey` (5.47:1 on ink) by hand, which shows the problem. Fix: have `group-ink.json` and `negative.json` re-point caption through a variable, or add a dark-context element rule. [L]
- **must**: `theme.json:254-256` global `core/separator` text is `ink`. Inside the `Ink` section style (and the colophon footer, `patterns/colophon.php:17`) the heavy rule is ink on ink: invisible. `negative.json:19-21` fixes it for the variation only, not for the section style. Fix: set separator colour in `group-ink.json`. [L]
- **should**: `theme.json:18` `grey` (#8a8a8a) is 3.03:1 on paper. It is named "large type and rules", but nothing stops use for body text; `defaultPalette:false` leaves it selectable. Fix: leave out of the text palette or document. [L]
- **should**: `post-template.css:11` `content: counter(...)` on `li::before` is announced by screen readers (`01`, `02`). Fix: `content: counter(...) / ""` (alt text empty) with a fallback. [L]
- **should**: `patterns/post-grid.php:29` h3 titles on a page with no h2 above (the label above the query is a paragraph). Heading skip. [L]
- **should**: `patterns/stepped-hero.php:28-41` the headline reads "Type" (h1) then two or three separate paragraphs; the accessible heading is just "Type". Visual and semantic headline diverge. [L]
- **consider**: `patterns/colophon.php:33` `site-title` level 2 renders an h2 on every page.
- Met: reduced-motion guard (`theme.json:270`), links underlined (`:121`), colour pairs: ink/paper 16.6, ink/cyan 6.6, ink/magenta 4.6, ink/yellow 14.8, paper/red 4.5 (all AA for normal text, magenta and red marginal).

### T8 Editor experience
- Met: `editor-language-and-defaults` (style names Overprint, Registration marks, Label, Numeral, Film Cyan; category registered).
- `templates/*.html` strings ("Journal", "Page not found", "The sheet you asked for...", "Search") are not translatable (templates are not run through gettext). `should` for a distributable theme. Fix: move copy into patterns and use `esc_html_e`.
- Section styles named `Paper` and `Ink` share a name with palette presets and can be confused in the inspector. `consider`.
- Hard-coded demo copy (Weingart history) in `index-list.php` and `halftone-quote.php` is fine as demo content, but pattern descriptions say it is "a table of contents", so it will be inserted with Basel text. `consider`.

### T9 Process, migration and WP versions
- Met: `fse-for-greenfield`, `start-from-scratch-not-off-the-shelf` [D]. `hybrid-*`: n/a.
- `test-across-wp-majors`: version gates are consistent: v3 and `styles/blocks/` need 6.6, header says 6.6; `fontStretch` needs 6.5. `Tested up to: 7.1` is fine.
- `scaffold-vs-from-scratch` debate applies: builder chose scratch; the debate says scaffold is the official default. Reasonable here.

## 2. Findings the skill missed

1. **Hand-written block markup validity.** The skill has nothing on comment-versus-HTML consistency. The likely Paragraph `align:"wide"` defect above passed `check-theme.mjs`. A check for `wp:paragraph` with `align` in (`wide`, `full`) would catch it; a broader one could compare comment attributes with classes and styles.
2. **Focus visibility and contrast.** `accessibility-baseline` says "contrast (official checklist)" and gives no method. A palette-pair contrast table, plus "outline colour must not be `currentColor` on a filled control", would have found three of the `must` findings. Contrast in dark section styles and variations is only visible by crossing every text style with every ground.
3. **Dark-context overrides.** Section styles and style variations that invert colours must restate every global colour that is set on a block (separator, caption). No principle.
4. **CSS cost of block-style variations.** `styles/blocks/*.json` partials emit per-instance rules (`is-style-label--2`, `--7`...). `block-style-before-template-css` promotes them without mentioning this. The builder measured about 30 KB on the front page.
5. **Font loading.** `runtime-performance-hygiene` says "system fonts". Nothing on subsetting, `size-adjust` fallback, preload, or a fallback stack with similar metrics.
6. **Palette slug honesty.** Variations that overwrite `cyan` with red.
7. **Heading order and landmarks** are not checked (`accessibility-baseline` lists them but defers to the official skill; `check-theme.mjs` has no check). A regex over `<h\d>`/`"level":N` in a pattern or template is cheap.
8. **i18n in templates.** Pattern PHP escaping was good here (`esc_html_e`, `esc_attr`, `esc_html`), but the skill has no rule that template HTML cannot be translated.
9. **Template availability.** No check that required templates exist (comments, `404`, `search` all do here, but `single` lacks comments); no check that `front-page` overrides a posts front page.
10. **In-page anchors** to patterns that may not be on the page.
11. **CSS counters and generated content** read by assistive tech.
12. **`clip-path` and `overflow` clipping of focus outlines.**
13. Missing from the check set: `wp:pattern` slugs resolve to files; template `area`; pattern `Categories` registered (the builder registered one by hand).

## 3. Skill usability

Searches (all with `--wp 7.1`, top 4 shown as id/score):

| Query | Top results | Verdict |
|---|---|---|
| "per-block css enqueue" | per-block-css-loading 9.9, t3-css-strategy 8.6 | Good |
| "contrast color palette accessibility" | accessibility-baseline 10.1, t7 5.7 | Good ranking, but chunk has no contrast guidance |
| "font loading preload fontFace" | runtime-performance-hygiene 8.5, t6-performance 7.7, wp-feature-timeline 7.3 | Right chunk, content is thin ("system fonts") |
| "block style variations css cost" | block-style-before-template-css 7.0, t1 6.3, query-loop-cost 6.2 | Found the principle that promotes them; nothing on cost |
| "section styles block style variation" | block-style-before-template-css 6.65, t1 6.3, component-patterns-with-parent 6.0 | OK |
| "focus outline" | element-styles-in-theme-json 3.6, block-style-before-template-css 3.5, accessibility-baseline 3.2 | Weak, spread |
| "heading order" | accessibility-baseline 3.5, hybrid-vs-full-fse 2.5 | Weak, no real match |
| "i18n pattern translation escaping" | official-only-guidance 12.2 (crossref), no-env-ids 5.3 | Correct pointer to official skills, nothing in-skill |
| "hand-written block markup validation" | t8-editor-experience 5.6, sources 5.5, editor-language-and-defaults 4.3 | Failed: no relevant chunk exists |
| "comments template" | query-loop-cost 4.1, patterns-filesystem-vs-db 3.2 | Failed |

Evaluate steps: clear enough. Gaps: Step 1 does not say which version to pass when the theme has min and tested values (I tried 6.6, 6.9 and 7.1; all identical). Step 2 says "run check-theme" but the check prints only a total, never which checks ran or what they scanned, so "0 / 0 / 0" is not evidence of coverage. `check-theme.mjs` has no `--help`/`--json`. `search.mjs list` returns one-line JSON with all fields (about 6 KB for T1-T9); a `--ids` or text mode would help. The Evaluate output wants "top five findings", but Evaluate mode never says how to treat `decision: default` (it is said in rule 3 only).

Token cost: 9 principle chunks `get`-ed (accessibility-baseline, per-block-css-loading, block-style-before-template-css, runtime-performance-hygiene, pattern-assets-no-ids, templates-committed-and-clean, element-styles-in-theme-json, plus two lists of results), about 13 KB plus 7 KB, so roughly 5-6k tokens of references, plus SKILL.md (about 4k tokens) and the nine `list` outputs (about 2k tokens). Cheap. Chunks are dominated by evidence ids and counterpoint prose that does not help a reviewer; the `## Review check` lines are what I used.

Wrong, stale or contradictory:
- `block-style-before-template-css` says block-style JSON under `styles/blocks/` is "likely 6.6, verify". It is 6.6; the builder also found that partials without a `styles` key are skipped silently, and `unregistered-block-style` counts them as registered (false negative).
- `unregistered-block-style` only sees literal `register_block_style(... 'name' => 'x')` calls; loops give false warnings. SKILL.md does not state this.
- `accessibility-baseline` is `confidence: low`, `severity: must` and has no concrete checks. A `must` finding resting on a low-confidence principle is awkward; I raised four anyway, because they are objectively measurable.
- `wp-patterns` guardrail "no custom CSS classes" conflicts with `is-style-*` use; `crossref/official-agent-skills` does not mention it (builder's note, I agree).
- `element-styles-in-theme-json` context says focus styling is "not yet available in 6.9"; the theme uses `:focus-visible` in elements on 7.1 and the builder says it emits. Chunk may be stale for 7.1.

## 4. Builder's notes: agreement and disagreement

Agree:
- Per-instance CSS cost of theme.json block-style partials is real and unmentioned; it is a skill gap (my missed-finding 4).
- No check for block-markup validity; builder lists "Group with flex and `verticalAlignment`, paragraphs with `writingMode`, Group with `border`" as highest risk. My higher risk is Paragraph `align:"wide"`, which they did not name. The `writingMode` markup, `border` group and flex group markup look consistent with core to me.
- No guidance for what core does not expose (font-stretch, blend, counters).
- Contrast numbers missing; palette slug naming; no check that `wp:pattern` slugs exist.
- Dead false negative on partials without `styles`.

Disagree or add:
- Builder says contrast was fixed (grey, magenta, red, second grey). Ratios in light context are fine, but the dark contexts (Ink section, Negative variation, caption and separator, focus ring) still fail. The builder's own note says the focus outlines "are emitted", which is true, but `currentColor` makes them invisible on filled buttons.
- Builder says "a skipped heading level (h1 then h3)" was caught and fixed. `post-grid.php:29` still has h3 titles with no h2 above them on the front page (the pattern is inserted by the blueprint).
- Builder fixed a doubled `<header>`; I confirm `parts/header.html` has no `tagName`.
- Builder says "`display` is 7rem"; the fluid max is 8rem, so the editor value and front end differ.
- Builder did not mention the dead `#index` anchor, the `front-page.html` override, or the identical `home.html`.
- Builder claims 0 custom blocks, no IDs: I confirm.
