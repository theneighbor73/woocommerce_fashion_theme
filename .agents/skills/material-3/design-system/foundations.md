# Foundations

Apply baseline Material 3 concepts through the project’s approved tokens. This is guidance for mapping roles and relationships; it does not provide alternate palette or font values.

## Color

- Use the existing palette and semantic tokens as the source of color values. Do not generate dynamic color from a seed or introduce Material’s sample palette.
- Give each color a clear role, such as page surface, text, action, border, or status. Use the approved palette shades that fit the component and context; there is no universal shade-to-role mapping.
- Keep foreground and background combinations legible and meaningful. Check contrast on the rendered surface; do not communicate status with color alone.
- Use a standard light color scheme. Do not add medium- or high-contrast theme variants.

### Role mapping example

Map a role to a project token instead of copying a Material sample value. The names below illustrate the relationship; select the approved token that fits the actual component and verify contrast.

| Material role | Alice token example | Typical use |
| --- | --- | --- |
| `primary` | `--md-sys-color-primary` | Primary emphasis |
| `on-primary` | `--md-sys-color-on-primary` | Foreground on primary |
| `surface` | `--md-sys-color-surface` | Page and content backgrounds |
| `on-surface` | `--md-sys-color-on-surface` | Main copy and controls |
| `outline` / `outline-variant` | `--md-sys-color-outline` / `--md-sys-color-outline-variant` | Clear boundaries / quiet dividers |
| `error` | `--md-sys-color-error` | Validation and critical feedback |

```css
.content-region {
  color: var(--md-sys-color-on-surface);
  background: var(--md-sys-color-surface);
}
```

Use Alice’s `md.ref` palette values as ingredients and `md.sys.color` tokens as roles. Do not treat a brand accent as a text color on a light surface unless its actual contrast passes.

## Typography

- Keep the project’s approved serif and sans-serif families. Use Material 3’s five semantic roles—display, headline, title, body, and label—with large, medium, and small sizes. Assign roles by content purpose, then define family, size, line-height, weight, and tracking as a coherent style. Alice’s emphasized variants are limited to title and label; preserve all baseline metrics and change only the documented weight. Display, headline, and body use baseline styles only.
- Use the project’s responsive type tokens and line-height, weight, and tracking values where they fit. Keep product names, prices, form labels, and supporting copy easy to scan.
- Do not add Material’s default typeface or a second font family just to match a sample.

### Role mapping example

```css
.editorial-title {
  font-family: var(--md-ref-typeface-brand);
  font-size: var(--md-sys-typescale-display-large-size);
  line-height: var(--md-sys-typescale-display-large-line-height);
  font-weight: var(--md-sys-typescale-display-large-weight);
}

.product-card__title,
.product-card__price {
  font-family: var(--md-ref-typeface-plain);
  font-size: var(--md-sys-typescale-title-small-size);
  line-height: var(--md-sys-typescale-title-small-line-height);
}
```

Treat the five roles and their three sizes as the system vocabulary; map them to Alice’s responsive tokens and established fonts. Do not create a parallel scale with duplicate meaning. Do not use label styles for extended reading text.

## Shape and depth

- Use a consistent shape scale through semantic radius tokens. Choose shape by component role and the approved UI specification; do not add decorative rounding indiscriminately.
- Use surface and border contrast to establish grouping. For a given grouping choose an outer container border, internal dividers, whitespace, or tonal surface shift; do not combine redundant boundaries. Reserve shadows for floating layers that need separation, such as menus or dialogs.
- Treat elevation as a hierarchy cue, not a reason to add shadows to every card or section. Preserve the project’s restrained visual treatment.

### Foundation examples

```css
.surface-example {
  border: 1px solid var(--md-sys-color-outline-variant);
  border-radius: var(--md-sys-shape-corner-none);
  background: var(--md-sys-color-surface);
}
```

Use Material’s baseline corner vocabulary: none, extra-small (4px), small (8px), medium (12px), large (16px), extra-large (28px), and full. Alice keeps square corners as the default; do not add rounded shapes without a design need. Elevation levels express z-distance, while shadow and `md.sys.color.scrim` provide visual treatments. Scrim is an opaque color token applied translucently over the background beneath an overlay; set opacity in the relevant overlay specification.

Alice uses one low-density level. Follow the LTR Space and Layout foundation for margins, gutters, safe-area insets, pane behavior, and application stacking order. Do not add density variants, RTL mirroring, or redundant border/divider treatments.

## Motion

- Use short, purposeful transitions for state changes and layout feedback. Keep timing and easing consistent through tokens.
- Do not add expressive spring physics or shape morphing. Respect `prefers-reduced-motion` and ensure motion is not required to understand a state.

### Transition example

```css
.motion-example {
  transition:
    color var(--md-sys-motion-duration-fast) var(--md-sys-motion-easing-standard),
    background-color var(--md-sys-motion-duration-fast) var(--md-sys-motion-easing-standard),
    border-color var(--md-sys-motion-duration-fast) var(--md-sys-motion-easing-standard);
}

@media (prefers-reduced-motion: reduce) {
  .motion-example {
    transition-duration: 0.01ms;
  }
}
```

Animate only properties that clarify feedback. Avoid animating layout or large surfaces for routine hover and focus states.
