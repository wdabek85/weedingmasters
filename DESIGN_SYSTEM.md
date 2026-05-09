# Wedding Masters — Design System

Single source of truth for tokens, components, sections, and pages.
**Rule:** before building any UI, check this doc → reuse, extend, or add to registry as `planned` BEFORE writing code → flip to `built` after merge.

Status legend: `planned` · `wip` · `built` · `deprecated`

Theme path: `app/public/app/themes/weddingmasters/`
Blade components: `resources/views/components/`
Section partials: `resources/views/sections/`
CSS tokens: `resources/css/app.css` (Tailwind v4 `@theme`)

---

## 1. Tokens

### 1.1 Color (glamour palette)

| Token            | Hex       | Role                                    |
| ---------------- | --------- | --------------------------------------- |
| `noir`           | `#0A0A0A` | Dark sections bg, primary text on light |
| `charcoal`       | `#1F1F1F` | Body text on light, alt dark surface    |
| `champagne`      | `#C9A961` | Primary accent (CTA, links, hover)      |
| `gold-deep`      | `#A88B3F` | Accent hover/active                     |
| `ivory`          | `#FAF7F2` | Default page background                 |
| `cream`          | `#F2EBDD` | Alt soft surface                        |
| `blush`          | `#E8C4C4` | Soft secondary accent                   |
| `mute`           | `#8A8A8A` | Placeholder, divider, disabled text     |
| `line`           | `#E5DFD2` | Hairline borders on light               |

### 1.2 Typography

- **Display / Heading:** `Cormorant Garamond` — 600, 700 (Google Fonts)
- **Body / UI:** `Inter` — 400, 500, 600 (Google Fonts)

Type scale (mobile → desktop):

| Token       | mobile           | desktop           | font   |
| ----------- | ---------------- | ----------------- | ------ |
| `display`   | 2.75rem / 1.05   | 4.5rem / 1.0      | serif  |
| `h1`        | 2.25rem / 1.1    | 3.25rem / 1.05    | serif  |
| `h2`        | 1.75rem / 1.15   | 2.5rem / 1.1      | serif  |
| `h3`        | 1.375rem / 1.2   | 1.75rem / 1.2     | serif  |
| `lead`      | 1.125rem / 1.5   | 1.25rem / 1.55    | sans   |
| `body`      | 1rem / 1.65      | 1rem / 1.65       | sans   |
| `small`     | 0.875rem / 1.5   | 0.875rem / 1.5    | sans   |
| `eyebrow`   | 0.75rem / 1.2 (uppercase, tracking-widest) | sans |

### 1.3 Spacing

Tailwind default scale + named tokens for sections:

| Token            | rem     | Use                       |
| ---------------- | ------- | ------------------------- |
| `section-y-sm`   | 3rem    | Mobile section padding-y  |
| `section-y`      | 5rem    | Default section padding-y |
| `section-y-lg`   | 7.5rem  | Hero / focal sections     |

### 1.3a Container

**Use the `container-glam` utility on every section's outer wrapper.** Defined in `resources/css/app.css` via `@utility`. Specs:

| Breakpoint           | max-width | padding-x  |
| -------------------- | --------- | ---------- |
| mobile (<768)        | 1440px    | 24px       |
| md (768–1023)        | 1440px    | 40px       |
| lg+ (≥1024)          | 1440px    | 80px       |

```html
<section class="bg-ivory py-section-y">
  <div class="container-glam">
    <!-- section content -->
  </div>
</section>
```

Do NOT use raw `mx-auto max-w-7xl px-5 md:px-8 lg:px-12` patterns. Always go through `container-glam` so site-wide layout stays consistent and changes happen in one place.

### 1.4 Radius

| Token        | rem     | Use                           |
| ------------ | ------- | ----------------------------- |
| `radius-xs`  | 0.125rem| Inputs (subtle)               |
| `radius-sm`  | 0.25rem | Default                       |
| `radius-md`  | 0.5rem  | Cards                         |
| `radius-pill`| 9999px  | Tags, pills                   |

Glamour leans **low-radius / sharp** — keep cards at `radius-sm` by default.

### 1.5 Shadow

| Token        | Value                                              |
| ------------ | -------------------------------------------------- |
| `shadow-sm`  | `0 1px 2px rgba(10,10,10,.04)`                    |
| `shadow-md`  | `0 8px 24px -8px rgba(10,10,10,.12)`              |
| `shadow-lg`  | `0 24px 60px -16px rgba(10,10,10,.18)`            |

### 1.6 Breakpoints

Tailwind defaults: `sm 640 / md 768 / lg 1024 / xl 1280 / 2xl 1536`. Designs target **375 mobile / 1440 desktop**.

### 1.7 Motion

- Durations: use Tailwind defaults — `duration-150` (snap), `duration-300` (default), `duration-500` (slow)
- Default easing: `cubic-bezier(.2,.7,.2,1)` (token: `ease-glam`) — use `ease-glam` utility

---

## 2. Components (Blade `<x-*>`)

Order: atoms → molecules → composites. Build sequence in §8.

| Slug                | Path                                          | Props / Variants                                                                  | Status   | Used in                                       |
| ------------------- | --------------------------------------------- | --------------------------------------------------------------------------------- | -------- | --------------------------------------------- |
| `logo`              | `components/logo.blade.php`                   | `size: sm\|md\|lg`, `tone: dark\|light`, `href`                                   | built    | nav, footer                                   |
| `button`            | `components/button.blade.php`                 | `variant: primary\|outline\|dark`, `tone: dark\|light`, `size: sm\|md`, `block: bool`, `href`, `as: a\|button`, `type` | built    | hero, gallery, contact-form, offer-card, sticky-bar |
| `eyebrow`           | `components/eyebrow.blade.php`                | `tone: champagne\|mute\|ivory`, `as: span\|p\|div`                               | built    | hero, offers, all section pre-headings        |
| `nav-link`          | `components/nav-link.blade.php`               | `href`, `active: bool`, `dropdown: bool`, `tone: dark\|light`                     | built    | nav (header + footer menus)                   |
| `phone-pill`        | `components/phone-pill.blade.php`             | `tel`, `label`, `tone: dark\|light`, `size: sm\|md`                               | built    | nav, mobile-sticky-cta                        |
| `icon-tile`         | `components/icon-tile.blade.php`              | `size: sm\|md\|lg`, `tone: light\|dark`, _(slot for icon)_                        | planned  | feature-card, icon-row, contact-row           |
| `feature-card`      | `components/feature-card.blade.php`           | `title`, named `icon` (champagne SVG), default slot (HTML, `<strong>` auto-styled ivory); dark charcoal/80 card + champagne hairline accent + glow hover | built    | sections/features                             |
| `offer-card`        | `components/offer-card.blade.php`             | `title`, `description`, `href`, `image`, `accent: gold\|rose\|charcoal\|warm`, `featured: bool`, `cta` | built    | sections/offers                               |
| `stat`              | `components/stat.blade.php`                   | `value`, `label`                                                                  | planned  | sections/trust-bar                            |
| `step`              | `components/step.blade.php`                   | `number`, `title`, _(slot description)_                                           | built    | sections/process                              |
| `icon-row`          | `components/icon-row.blade.php`               | `title`, `description`, default slot = icon SVG (rendered in 44px noir disc)      | built    | sections/wedding-with-us                      |
| `gallery-tile`      | `components/gallery-tile.blade.php`           | `image`, `alt`, `href`, `aspect: square\|portrait\|landscape`, `accent: gold\|rose\|charcoal\|warm` (placeholder gradient gdy brak `image`) | built    | sections/gallery                              |
| `accordion`         | `components/accordion.blade.php`              | _(slot only)_; adds top hairline so first item has both top + bottom borders     | built    | sections/faq                                  |
| `accordion-item`    | `components/accordion-item.blade.php`         | `question`, `open: bool`, `id` (auto-gen), _(slot answer)_; Alpine x-collapse     | built    | sections/faq                                  |
| `form-field`        | `components/form-field.blade.php`             | `name`, `label`, `type: text\|email\|tel\|date\|textarea`, `required`, `placeholder`, `value`, `error`, `autocomplete` | built    | sections/contact-form                         |
| `checkbox`          | `components/checkbox.blade.php`               | `name`, `value`, `required`, `checked`, `error`, _(slot label)_                   | built    | sections/contact-form                         |
| `contact-row`       | `components/contact-row.blade.php`            | `label`, `sub`, `href`, _(slot = icon SVG)_; falls back to `<div>` if no href     | built    | sections/contact-form, partials/footer        |
| `social-link`       | `components/social-link.blade.php`            | `platform: ig\|fb\|yt\|tt\|sp`, `href`, `tone: dark\|light`                       | built    | sections/footer                               |
| `map-placeholder`   | `components/map-placeholder.blade.php`        | `caption`, `aspect: 4/3\|3/2\|1/1`                                                | built    | sections/contact-form                         |
| `partner-logos`     | `components/partner-logos.blade.php`          | `logos: array`                                                                    | planned  | sections/trust-bar                            |
| `check-item`        | `components/check-item.blade.php`             | `tone: champagne\|dark` (default champagne), `size: sm\|md`, label as slot         | built    | sections/about (and future bullet lists)      |
| `spotify-embed`     | `components/spotify-embed.blade.php`          | `playlist: string` (Spotify playlist ID), `height: int` (default 352), `title: string` | built    | sections/about                                |
| `page-header`       | `components/page-header.blade.php`            | `eyebrow`, `title` (HTML allowed), `lead`, `breadcrumb: array`, `variant: dark\|light`, `align: left\|center` | built    | every subpage (kontakt, oferta, galeria, polityka, ...) |
| `channel-card`      | `components/channel-card.blade.php`           | `label`, `sub`, `href`, `external: bool`, _(slot = icon SVG)_; aspect-[5/4] card  | built    | kontakt page                                  |
| `marquee`           | `components/marquee.blade.php`                | `items: array`, `separator`, `tone: dark\|light`; pure-CSS infinite horizontal scroll, edge fade masks | built    | strip between hero and features              |
| `section-divider`   | `components/section-divider.blade.php`        | `tone: light\|dark`, `ornament: string`; champagne ornament flanked by hairlines | built    | between major page sections                   |
| `testimonial-card`  | `components/testimonial-card.blade.php`       | `quote` (slot), `name`, `location`, `date`; champagne quote glyph + serif italic + champagne hairline + byline | built    | sections/testimonials                         |

> Add new entries here BEFORE writing the file.

---

## 3. Sections (page-level partials)

Header/footer/sticky live in `partials/`; content sections in `sections/`.

| #   | Slug                  | Path                                            | Composes (components)                                                            | Status   |
| --- | --------------------- | ----------------------------------------------- | -------------------------------------------------------------------------------- | -------- |
| 00a | `nav`                 | `sections/header.blade.php`                     | `logo`, `nav-link`, `phone-pill`, _(mobile hamburger + Alpine drawer)_           | built    |
| 01  | `hero`                | `sections/hero.blade.php`                       | `button` (primary + outline), bg image/video                                     | built    |
| 02  | `trust-bar`           | `sections/trust-bar.blade.php`                  | `stat` × 3, `partner-logos`                                                      | planned  |
| 03  | `features`            | `sections/features.blade.php`                   | bg-ivory section + dark `feature-card` × 3 (bg-charcoal); editorial "dark cards on light paper" cezura po dark hero | built    |
| 04  | `offers`              | `sections/offers.blade.php`                     | text intro (eyebrow + h2 + lead) + `offer-card` × 4 (1 featured + 3 normal); 4×2 mosaic grid lg+ | built    |
| 05  | `wedding-with-us`     | `sections/wedding-with-us.blade.php`            | 3 paired rows — paragraph 7/12 + matching `icon-row` 5/12, hairline border-bottom between rows; no photo | built    |
| 06  | `gallery`             | `sections/gallery.blade.php`                    | heading + 2-col mobile / 3-col md+ mosaic of `gallery-tile` × 6 mobile / 9 md+ (mix `aspect` + `accent`) + `button` CTA "Zobacz pełną galerię" | built    |
| 07  | `process`             | `sections/process.blade.php`                    | `step` × 4, hidden `review-box` slot                                             | built    |
| 08  | `about`               | `sections/about.blade.php`                      | photo (left, stretches to right col height lg+) + h2 + 3 paragraphs + `spotify-embed` | built    |
| 08b | `testimonials`        | `sections/testimonials.blade.php`               | bg-cream; heading + 1/2/3-col `testimonial-card` × 3 (champagne quote glyph + serif italic) | built    |
| 09  | `faq`                 | `sections/faq.blade.php`                        | 2-col split (5/7 fr) — heading + sticky CTA / `accordion` + `accordion-item` × 7 | built    |
| 10  | `contact-form`        | `sections/contact-form.blade.php`               | heading + 2-col split — `form-field` × 5 + `checkbox` + submit / `contact-row` × 3 (phone/mail/whatsapp) + `map-placeholder` | built    |
| 11a | `footer`              | `sections/footer.blade.php`                     | noir bg + champagne bokeh; 3-col grid (brand+`logo`+`social-link` × 3 / nav menu / kontakt 3 rows) + bottom strip (copyright + legal) | built    |
| 11b | `mobile-sticky-cta`   | `partials/mobile-sticky-cta.blade.php`          | `phone-pill`, `button` (whatsapp)                                                | planned  |

---

## 4. Pages

| Page              | Template                                   | Sections (in order)                                                                                                                | Status   |
| ----------------- | ------------------------------------------ | ---------------------------------------------------------------------------------------------------------------------------------- | -------- |
| Home              | `views/front-page.blade.php`               | `nav` → `hero` → `features` → `offers` → `wedding-with-us` → `process` → `about` → `faq` → `contact-form` → `footer` (§02/§06 deferred) | wip      |
| Kontakt           | `views/page-kontakt.blade.php`             | `nav` → `page-header` (dark) → magazine spread (form 3fr left + editorial 7fr right with channel ladder) → `footer`                | wip      |

Other pages (TBD — wireframes only cover Home for v1.0): O nas, Oferta (+ subpages), Galeria, FAQ standalone, Polityka prywatności.

> **WP page setup:** create a Page in admin titled "Kontakt" with slug `kontakt`. Sage will auto-pick `page-kontakt.blade.php` via the WP template hierarchy.

---

## 5. ACF field groups

| Group             | Location rule                              | JSON path                                         | Status   |
| ----------------- | ------------------------------------------ | ------------------------------------------------- | -------- |
| _(none yet)_      |                                            | `app/public/app/themes/weddingmasters/acf-json/`  |          |

ACF JSON sync target: `acf-json/` (auto-created on first save).

---

## 6. Decisions log

ADR-style. Newest on top.

### 2026-04-29 — DS-030: §05 wedding-with-us fifth pass — paired rows (text + highlight)
v4 (small sidebar photo + stacked icons) had the highlight blocks pushed BELOW the photo, breaking visual correspondence with the text — user noted left text "totally doesn't match" the right column.

Realized: each of the 3 paragraphs already corresponds 1:1 to one of the 3 icon-row highlights ("Muzyka pod każde pokolenie" = paragraph 1's gist, etc.). Restructured the section as **3 paired rows**, each row containing one paragraph (col-span-7) + its matching icon-row (col-span-5), separated by hairline `border-line`. Each row aligns top so the icon sits next to paragraph's first line.

**Photo dropped entirely** — it was source of conflict in every iteration (banner-top dominated, sidebar-small imbalanced). Section is now pure typography + icon-rows, but with strong visual rhythm via hairline-separated rows. If a photo is needed back, it would be a small horizontal banner ABOVE the paired rows, not inside them.

**Reversibility:** trivial — single section file.

### 2026-04-29 — DS-029: §05 wedding-with-us fourth pass — small photo as accent in sidebar
Third pass (full-width 16:9 banner top) made photo too dominant — text was secondary to a giant photo. User clarified photo should support, not lead. Restart with text-primary composition:
- 2-col grid `lg:grid-cols-12` — text 7/12 (primary, with `max-w-2xl` reading width inside) / sidebar 5/12 (right)
- Sidebar: small accent photo (`aspect-square`, `max-w-sm` ≈ 384px max) + 3 icon-rows stacked below with gap-7
- Photo small enough to feel like a "marginalia" image, not a banner

**Reversibility:** trivial — single section file.

### 2026-04-29 — DS-028: §05 wedding-with-us third pass — clean banner layout (readability priority)
Second pass (sticky-photo-right + drop-cap left + horizontal icons strip below) was unreadable: drop-cap created weird text wrap, sticky photo competed with reading flow. Restart with clarity-first composition:
1. **Heading** at top (eyebrow + h2, max-w-2xl)
2. **Full-width photo banner** (`aspect-[16/9]`, rounded-2xl, subtle bottom gradient overlay) — single dramatic visual hook, sets the mood
3. **2-col grid below**: text occupies `lg:col-span-2` (max-w-2xl inside, comfortable reading column) + icon-rows sidebar `lg:col-span-1` (1/3 width, 3 stacked rows with gap-7/8)

**Dropped:** drop-cap (caused readability issues), sticky photo (caused layout shift / awkward alignment), horizontal icon strip (cramped titles wrapping).

**Reversibility:** trivial — single section file. DS-027 redesign preserved in git history if needed.

### 2026-04-29 — DS-027: Reverted DS-026 motion pack — kept photos + dividers, redesign §05
User clarified: "nudna jak flaki z olejem" was about **visual design of sections** (specifically §05 wedding-with-us was bare text + small icons), NOT about lack of animation. Marquee + scroll reveals + parallax all reverted. Stock photo strategy also clarified — random Picsum was wrong; user wants either wedding/party themed OR color-matched-to-palette photos.

**Reverted from DS-026:**
- `<x-marquee>` removed from front-page (component file kept for future use)
- All `data-reveal` / `x-intersect.once` / `--reveal-delay` attrs stripped from sections
- `data-hero-parallax` + JS handler removed from app.js
- `[data-reveal]` and `.animate-marquee` CSS removed from app.css

**Kept from DS-026:**
- `<x-section-divider>` between major home sections (static, not animated, gives editorial rhythm)
- Stock photos approach — but **swapped Picsum → Unsplash specific wedding/party-themed IDs**. Each placement has a relevant photo (wedding scene for Hero/Wesela/§05, prom-style for Studniówki, corporate for Eventy, party for 18-tki, DJ booth for About).

**§05 wedding-with-us redesigned:**
- 2-col split (text 3fr / photo 2fr, photo `lg:sticky lg:top-28`)
- 3 icon-rows moved BELOW the grid as horizontal 3-col strip with hairline border-top — clear visual break, icons get their own moment instead of being squished into a sidebar
- Drop-cap kept on first paragraph (signature glamour element of §05)

**Reversibility:** trivial — single template + 1 css cleanup + 1 js cleanup.

### 2026-04-29 — DS-026: "Ożywienie" pack — motion + photos + ornaments — REVERTED by DS-027
User feedback: site felt static / "nudna jak flaki z olejem". Added 5-layer life-injection:

1. **Scroll reveals (universal)** — `@alpinejs/intersect` plugin + `[data-reveal]` CSS utility (opacity + 16px translate-y, 600ms ease-glam, transition-delay via CSS var `--reveal-delay`). Applied to every section heading + cards + content blocks. Stagger via inline style `--reveal-delay: Nms` (typical 0/100/200ms cascades on grids). Honors `prefers-reduced-motion`.

2. **Marquee ticker** (`<x-marquee>`) — pure CSS infinite horizontal scroll, ~32s loop. Items duplicated for seamless. Edge fade masks left/right. Inserted as strip between hero and features (`tone="dark"`) to bridge dark hero → light features. Items: cities, years, response time, accordion mention.

3. **Hero parallax** — RAF-throttled scroll handler in `app.js` translating `[data-hero-parallax]` elements at 0.3× scroll speed. Universal browser support, cheap (only runs while hero in viewport).

4. **Section dividers** (`<x-section-divider>`) — champagne ◆ flanked by hairlines (`bg-line` light / `bg-ivory/15` dark). Inserted between every major section on home for editorial rhythm. Self-revealing (uses `data-reveal`).

5. **Stock photos via Picsum** — replaced gradient placeholders with deterministic seeded URLs (`https://picsum.photos/seed/wm-XXX/W/H`). Hero bg, all 4 offer cards, About figure. Photos won't be wedding-themed (Picsum is random) but with dark overlays they look atmospheric. **Swap each `image=`/`src=` URL for real ACF-delivered photos when client provides them.**

**Reversibility:** all reversible per layer — kill `[data-reveal]` attrs to disable reveals; remove `<x-marquee>` line from front-page; remove `data-hero-parallax` attribute; remove `<x-section-divider>` lines; swap Picsum URLs for ACF/empty.

### 2026-04-29 — DS-025: Wedding-with-us — editorial 2-col with drop-cap
Section §05 built per wireframe content (3 paragraphs of "what wedding feels like with us" + 3 icon highlights). Layout decisions:
- 2-col split `lg:grid-cols-[3fr_2fr]` — text 60% / icons 40%, gap-16 lg+
- **Drop-cap on first letter** of first paragraph (large champagne serif, float-left, 6xl→7xl) — glamour magazine touch, only used here on home (signature element for this section)
- 2-3 selective `<strong class="text-noir">` keywords in body for editorial emphasis
- Right column: 3 stacked `<x-icon-row>` (44px noir disc + champagne icon + serif title + sub copy) — Lucide icons: Music note / Sparkles / CheckCircle
- Mobile order: icon-rows first (visual hooks), text below (long form)
- Hidden review-box slot kept as comment in section file — uncomment after first weddings ship

**Reversibility:** trivial — single component + section file.

### 2026-04-29 — DS-024: Features dark — refit to site DNA (keep dark, drop SaaS-y elements)
User feedback: dark bg differentiating is great, but section "stylistically deviates too much" from rest of home. Refit:
- **bg**: dropped SaaS-y dot grid pattern; now uses Hero-style radial bokeh (champagne 0.18 at top, gold-deep 0.12 bottom-right). Calmer, matches Hero's visual language.
- **heading**: switched from centered + champagne underlined `z nami` highlight back to standard left-aligned eyebrow + h2 inside `max-w-2xl` block — same pattern as offers / process / about / faq / contact-form. Consistent rhythm.
- **cards**: dropped backdrop-blur, dropped champagne hairline gradient accent, dropped exotic champagne glow shadow on hover. Now: **standard rounded-2xl + ivory/10 border + charcoal bg + lift-and-shadow hover** — same vocabulary as rest of site cards. Icon disc at top (noir bg + champagne icon, inverts on hover) matching `<x-contact-row>` and `<x-channel-card>` disc pattern.
- **body keywords**: kept `<strong>` auto-styling (subtle editorial emphasis, no impact on stylistic fit).

Section is now visually differentiated by being dark, but every other element (heading style, card structure, hover, icon disc) matches the established site DNA.

**Reversibility:** trivial — single component + section file.

### 2026-04-29 — DS-023: Features pivot → Concept D (dark glamour, inspired by zaprojektowani.com) — REFINED by DS-024
First dark pass (centered heading w/ champagne underline highlight on `z nami`, dot grid, champagne hairline gradient accents, exotic glow hover) → too SaaS-landing-y, deviated stylistically. See DS-024 for the refined version.
User showed zaprojektowani.com benefits section as inspiration → switched from MVP-locked Concept A (cream cards) to **Concept D — dark glamour**:
- Section: full **noir bg** with subtle champagne dot-grid pattern (`radial-gradient` 24×24px, opacity 0.06) + soft top-down champagne glow.
- Heading: **centered** (vs. left-aligned elsewhere on home) — eyebrow `Wyróżniki` + h2 `Co dostajecie z nami` with **`z nami`** highlighted in champagne color + thin underline 8px below.
- Cards: charcoal/80 bg + `ivory/10` hairline border + `rounded-2xl` + backdrop-blur. Inside: top row (title left + Lucide icon right in champagne), short champagne hairline accent (48px wide), body with `<strong>` keywords styled to ivory (selective emphasis, magazine vibe). Hover: border brightens to `champagne/40` + soft champagne glow shadow.
- No CTAs in cards (inspiration had outlined pills; skipped to avoid competing with hero CTAs).

Rhythm impact: home now goes hero (dark) → **features (dark)** → offers (ivory section, dark cards) → process (ivory) → ... — two dark sections back-to-back at top create a "heavy editorial intro" before the light blocks. Different texture per dark section (Hero = bokeh, Features = grid+glow) keeps them visually distinct.

**Reversibility:** trivial — single component + section file. Concept A is preserved in DS-022 history (commented superseded). B/C alternatives still parked.

### 2026-04-29 — DS-022: Features pivot — Concept A (cream cards w/ champagne icon disc) — SUPERSEDED by DS-023
First pass (DS-021, hairline trio) felt too "SaaS-landing" against the richer glamour patterns elsewhere on the page. User flagged "nie pasuje do całego designu". Locked Concept A for MVP: 3 cream cards (rounded-2xl, line border, soft shadow) on ivory section, **champagne filled disc** (60px) with noir icon at top of each, serif title + sans body, hover gives -translate-y + champagne border + shadow-md. Visual family: light-glamour, sits between offers (dark cards) and about (text+photo) without repeating either.

**Deferred alternatives (parked for future iteration):**
- **Concept B — Dark mini-cards** matching `offer-card` DNA: dark gradient placeholder bg + ivory text + champagne accent, aspect ~1:1 (smaller than offers' 4:5). Mocny brand voice ale ryzyko duplikacji offers visually.
- **Concept C — Editorial magazine spread** with photo placeholder above each feature (cream + champagne radial subtle gradient) + serif title + body below. Mniej "card", bardziej "spread". Wymaga że placeholder gradient jest naprawdę elegancki — opcja jeśli kiedyś dostaniemy realne small-format zdjęcia "scen z parkietu".

**Reversibility:** trivial — single component + section file. Lucide icons (Headphones / Music / Share2) reused from DS-021.

### 2026-04-29 — DS-021: Features section — editorial trio with hairline dividers (SUPERSEDED by DS-022)
Wireframe §03 has 3 cards with icons. First attempt: 3 equal columns separated by champagne hairline dividers (`divide-x` lg+, `divide-y` mobile). No card border, no fill. Champagne Lucide line icons (stroke 1.5) at top. Pattern was too quiet vs. rest of page → superseded.

### 2026-04-29 — DS-020: Contact page pivot — asymmetric magazine spread (B layout)
First pass mirrored a competitor's "greeting card + 4 channel cards + form" pattern → too template-y, too similar to inspiration shot. Pivoted to editorial magazine spread:
- **LEFT 30% (`lg:grid-cols-[3fr_7fr]`)** — form in cream card with eyebrow "Formularz" + h3 "Zostaw ślad pisemny." Block-width submit, narrow column. **Sticky** (`lg:sticky lg:top-28`) so form stays in view while reading editorial.
- **RIGHT 70%** — eyebrow "List od nas" + big h2 "Najpierw rozmowa, potem reszta." (4xl→6xl) + 2 paragraphs of personal copy + signature with overlapping initials avatars (M champagne / T noir, ring-ivory) + `[Imię] + [Imię]` + channel ladder: 4 horizontal rows separated by hairlines, each = icon disc / label / sub / arrow with hover translate.
- **Mobile**: editorial first via `order-1 lg:order-2`, form second via `order-2 lg:order-1` — context before action on small screens.
Distinct from any pattern earlier on site or in user's other projects. Form gets visual definition (card) AND staying power (sticky); editorial gets dominance (70% width + bold typography) and personality.
**Reversibility:** trivial — single template file.

### 2026-04-29 — DS-019: Contact page composition — greeting + channels + form
Inspired by user reference 2026-04-29 (clean Polish DJ contact page) but adapted to glamour DNA. Three blocks below the page header:
1. **Greeting card** — cream-bg card inside ivory section, overlapping initials avatars (M champagne / T noir, ring-cream), animated champagne pulse-dot status pill ("Odpowiadamy w 24h"), h2 + lead + pencil-icon signature `[Imię] + [Imię]`. Personable, sets tone before the form.
2. **Channels grid** — 4 cards (Zadzwoń / WhatsApp / Instagram / Email) using new `<x-channel-card>` (aspect-[5/4], icon disc top, label+sub bottom, diagonal arrow corner that nudges on hover). Centered heading "Wybierz wygodny kanał".
3. **Form section** — cream bg (alternates from ivory). Heading "Napisz dłużej, jeśli wolisz." + 2-col grid (form 1.4fr / map 1fr). Form fields + RODO + submit; map placeholder right column.
**Reversibility:** trivial — page-kontakt.blade.php is single file.

### 2026-04-29 — DS-018: Subpage header pattern — `<x-page-header>` reusable component
Every subpage (Kontakt, Oferta, Galeria, Polityka, etc.) shares the same header pattern: optional breadcrumb + eyebrow + h1 + lead. Two visual variants: `dark` (noir bg + bokeh placeholder, glamour mini-hero, default — matches home Hero DNA) and `light` (ivory bg + hairline border-bottom, quiet editorial). Heading width capped at `max-w-3xl`, padding `py-20/24/28` per breakpoint. Title prop accepts HTML so callers can `<br>` for line breaks. Visual continuity between home Hero and subpages — site never loses brand identity when navigating.
**Reversibility:** trivial — single component file.

### 2026-04-29 — DS-017: Contact section — presentational form, backend deferred
Form is purely structural in MVP (no `action` handler, no JS validation beyond native HTML5 `required`). When backend wires up, options: WP Contact Form 7 / WPForms plugin (drop-in, ACF-friendly), or a custom REST endpoint hitting an SMTP/transactional provider (Postmark/Resend). Form fields named in snake_case to map cleanly to ACF/CF7. WhatsApp link uses `https://wa.me/<number-without-plus>` standard. Phone/email/WhatsApp values are placeholders — replace `$tel`, `$email` in `sections/contact-form.blade.php` when client data lands.
**Reversibility:** trivial — single section file.

### 2026-04-29 — DS-016: FAQ layout — full-width 2-col split, sticky heading
First pass put accordion in a centered `max-w-3xl` (768px) inside the 1440px container — wasted ¾ of the width on widescreen, ignoring container-glam baseline. User correctly flagged: wireframe is content spec, not layout spec — UX standard for FAQ on wide layouts is split (heading left + accordion right). Implemented `lg:grid-cols-[5fr_7fr]` with heading column `lg:sticky lg:top-28` (sticks while user scrolls through Q/A — Stripe/Linear pattern). Reading width on answers protected via `max-w-2xl` on the panel content inside `<x-accordion-item>` (button still spans full column for click target). Added secondary CTA link "Napisz do nas" under heading — funnel into contact section.
**Reversibility:** trivial — single section file + 1-line change in accordion-item.

### 2026-04-29 — DS-015: FAQ accordion — Alpine `@alpinejs/collapse`, +/× icon
Added `@alpinejs/collapse` dep for smooth height transition on Q/A panels (manual max-height tricks are fragile with dynamic content). FAQ items independent (each item has its own `open` state — multiple can be open at once; better UX than single-open-mode for skim-readers). Icon: `+` rotating 45° → `×` on open via `rotate-45` class. Hairlines: wrapper top + each item bottom (gives clean hairline grid, first item gets a top edge). First item open by default per wireframe DS-004.
**Reversibility:** trivial — uninstall plugin and rewrite collapse with manual CSS if bundle size becomes a concern.

### 2026-04-29 — DS-014: About proportions — photo stretches to match right column height
First pass put photo on `aspect-[4/3]` even on lg+, leaving uneven heights vs. the (text + Spotify) content. User wants symmetry: photo column height = text + Spotify combined. Solution: keep `aspect-[4/3]` on mobile/md (sensible when stacked), remove aspect at lg+ via `lg:aspect-auto lg:h-full lg:min-h-[560px]`. Grid default `align-items: stretch` (no `items-start`) ensures both columns share row height. Also reverted to wireframe text body (3 paragraphs); inspiration's checklist dropped — wireframe is content spec.
**Reversibility:** trivial — single section file.

### 2026-04-29 — DS-013: About section — photo + checklist + Spotify embed
Per user reference 2026-04-29: split layout — photo left (4:3 placeholder until real duo photo), content right (eyebrow + h2 + lead + 4 `check-item`s + Spotify playlist embed). User wants Spotify preview embedded *inside* the about section, under the checklist — emphasizes "you'll hear us" before they even contact. New atoms `check-item` (champagne filled-circle ✓) and `spotify-embed` (lazy iframe wrapper). Spotify playlist ID is currently a placeholder (`37i9dQZF1DXcBWIGoYBM5M` = Spotify-curated "Today's Top Hits", stable global list); replace with the duo's real playlist when delivered.
**Reversibility:** trivial — swap placeholder ID via `$playlistId` in `sections/about.blade.php`. Photo placeholder block clearly marked for swap to real `<img>`.

### 2026-04-29 — DS-012: Process pivot — horizontal stepper, short parallel copy
First pass was vertical timeline (rows separated by hairline). User feedback: vertical takes too much height + long descriptions force scroll-and-read, **undermining the "process is simple" message**. Pivoted to horizontal stepper: lg+ uses `grid-cols-4` single row with thin champagne connector line between numerals; md uses 2×2; mobile stacks. Descriptions rewritten as short parallel one-liners (≤12 words). Wireframe is content spec, not visual spec — DS-005 still holds for copy direction but visual freedom is implicit.
**Reversibility:** trivial — `<x-step>` and `sections/process.blade.php` are independent files.

### 2026-04-29 — DS-011: Process section — Concept B (refined serif numerals)
After three concepts (A editorial timeline / B oversized numerals / C dark stepper), user picked **B** with explicit constraint: numerals must NOT be huge. Final size: `text-5xl lg:text-6xl` (48→60px) — visible as art element, not screaming. Champagne color, font-weight 600, leading-none. Layout: lg+ uses 2-col grid `[140px_1fr]` (numeral fixed | content fluid); mobile stacks. Each step row separated by `border-t border-line`, first row has no border. ivory bg matches offers — process is part of the ivory editorial flow.
**Reversibility:** trivial — adjust sizes/colors in `components/step.blade.php`.

### 2026-04-29 — DS-010: Site container locked at 1440 / 24-40-80
Custom Tailwind utility `container-glam` defined in `resources/css/app.css` using `@utility`. Max-width 1440px, padding-inline 24px (mobile) / 40px (md) / 80px (lg+). Replaces ad-hoc `max-w-7xl px-...` patterns in sections. Single source of truth for site horizontal rhythm — change once, propagates everywhere.
**Reversibility:** trivial — edit the `@utility container-glam` block and rebuild.

### 2026-04-29 — DS-009: Offer-card placeholders — layered radial gradients per `accent`
No real photos yet, but inspiration uses photo-bg cards. Implemented `accent` prop on `offer-card` with 4 distinct gradient combos (`gold`, `rose`, `charcoal`, `warm`) so cards still differentiate visually. SVG noise grain layer on top adds texture without external images. When ACF wires up, pass `image` prop with the real photo URL — it overrides the placeholder.
**Reversibility:** trivial — drop `accent` and pass `image` per card.

### 2026-04-29 — DS-008: Build order — skip §02 trust-bar and §03 features (for now)
Per user decision 2026-04-29: jump from hero (§01) to offers (§04). Reason: §02 needs real numbers/partner logos and §03 needs final icon set + copy review — both blocked on input. Offers section is fully buildable from inspiration shot. Resume §02/§03 once inputs land.
**Reversibility:** trivial — both sections are independent partials inserted between hero and offers in `front-page.blade.php`.

### 2026-04-29 — DS-007: Hero v2 — full-bleed cinematic, drop ivory card overlay
Initial hero used a centered ivory card on dark gradient (DS-001 style). User reference shot showed photo-first hero with bottom-left content, no card, dark glassy CTAs. Switched to: full-bleed bg (placeholder = layered champagne/gold radial bokeh + grain + vignette + bottom-up dark fade for legibility), left-aligned content positioned bottom-left, max-w-2xl on copy, primary CTA changed to new `dark` button variant (solid noir, champagne hover), secondary stays `outline` with tone=`light`. Bg block in `sections/hero.blade.php` is clearly marked — swap whole `aria-hidden` block for `<img>`/`<video>` once real media arrives.
**Reversibility:** trivial — hero is single file; revert by restoring v1 markup from git.

### 2026-04-29 — DS-006: Alpine.js for declarative interactivity
Added `alpinejs` to `package.json` and bootstrapped in `resources/js/app.js`. Used by mobile drawer (nav), and will power FAQ accordion, future modals/lightbox, form interactions. Footprint ~7KB gzipped — pays for itself within two interactive components vs. hand-rolled vanilla JS. `[x-cloak] { display: none !important }` rule lives in `app.css` so unhydrated elements don't flash before Alpine boots.
**Reversibility:** medium — would require rewriting drawer/accordion in vanilla JS. Worth it only if bundle size becomes a concern.

### 2026-04-29 — DS-005: hard-code wireframe copy in MVP, ACF wiring later
Bedrock + ACF Pro is the long-term content path, but for MVP we ship Blade templates with the Polish copy from the wireframe baked in. Once ACF is configured, we wrap each text node with `get_field(...)` (or a View Composer) and migrate the copy into the field group. Saves a round-trip on copy review.
**Reversibility:** trivial — replace literals with `{{ $field }}` calls per section.

### 2026-04-29 — DS-004: wireframe v1 parsed → 13 sections, ~20 components
Source: `/Users/wiktor/Downloads/wedding-masters-wireframe_2.html`. Locked Home composition: nav → hero → trust → features → offers → wedding-with-us → gallery → process → about → faq → contact → footer → mobile-sticky. Hidden `review-box` slots noted in `wedding-with-us` and `process` — structurally present, content empty until first weddings ship. Two `[ikona]` placeholders everywhere — MVP uses Lucide icon set (open-source, sharp glamour-friendly look) unless changed.
**Reversibility:** trivial — sections/components are independent partials.

### 2026-04-29 — DS-001: glamour palette + Cormorant/Inter pairing
Locked starting palette and typography per brief. Glamour translates to high-contrast (noir + ivory) with champagne gold accent and blush as soft secondary. Cormorant serif + Inter sans is a battle-tested editorial wedding pairing — refined without being twee.
**Reversibility:** trivial — change tokens in `resources/css/app.css` and font enqueue in `app/setup.php`.

### 2026-04-29 — DS-002: Bedrock + Sage 11 + Tailwind 4 + ACF Pro
Stack chosen by user. Theme slug `weddingmasters`. Bedrock paths remapped from `web/` to `app/public/` so Local's web root works untouched.

### 2026-04-29 — DS-003: doc-first component workflow
Every UI addition passes through this doc. New components/sections enter as `planned` with props/variants BEFORE code; flip to `built` on merge.

---

## 7. Build sequence

Phase-gated to keep dependencies clean. Each phase ends with a `npm run build` smoke test.

**Phase 1 — Atoms** (no other deps)
1. `button`
2. `eyebrow`
3. `nav-link`
4. `phone-pill`
5. `icon-tile`
6. `social-link`

**Phase 2 — Molecules** (compose atoms)
7. `feature-card` (icon-tile + heading + text)
8. `offer-card` (image + heading + text + link)
9. `stat`
10. `step`
11. `icon-row` (icon-tile + heading + sub)
12. `gallery-tile`
13. `accordion-item` + `accordion`
14. `form-field`, `checkbox`
15. `contact-row`
16. `map-placeholder`, `partner-logos`

**Phase 3 — Chrome** (shared partials)
17. `partials/nav` (logo + nav-link + phone-pill)
18. `partials/footer` (logo + social-link + nav-link + contact-row)
19. `partials/mobile-sticky-cta`

**Phase 4 — Sections** (top-of-page → bottom)
20. hero · 21. trust-bar · 22. features · 23. offers · 24. wedding-with-us · 25. gallery · 26. process · 27. about · 28. faq · 29. contact-form

**Phase 5 — Page**
30. `front-page.blade.php` — stitch all sections + chrome.

**Phase 6 — ACF wiring** (deferred, see DS-005)
31. Install ACF Pro via Composer (auth.json key required)
32. Field groups per section, JSON-synced to `acf-json/`
33. Replace literals with `get_field()` / View Composers

---

## 8. Conventions

- **Component naming:** kebab-case slug, single-word preferred (`button`, `card`, `nav`). Compound slugs use `-` (`section-hero`).
- **Props:** typed via Blade `@props([...])`, with sensible defaults. Always document props in this registry's "Props / Variants" cell.
- **Section structure:** every section = a Blade partial in `resources/views/sections/` consuming components — never raw markup repeated across pages.
- **ACF field naming:** snake_case, prefixed by section/page when field is bound to that scope (e.g. `home_hero_headline`).
- **Tailwind classes:** prefer token utilities (`bg-noir`, `text-champagne`) over arbitrary values (`bg-[#0A0A0A]`). If you reach for `[]`, ask whether the value belongs in tokens.
- **No inline styles** outside Blade `style="--var: value"` for runtime CSS vars driven by ACF.
