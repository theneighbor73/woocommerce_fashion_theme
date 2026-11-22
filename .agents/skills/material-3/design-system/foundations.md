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
| `primary` | `--color-action-primary` | Primary actions and key emphasis |
| `on-primary` | `--color-text-inverse` | Text on the primary action surface |
| `surface` | `--color-bg-page` | Page and content backgrounds |
| `on-surface` | `--color-text-primary` | Main copy and controls |
| `outline` / `outline-variant` | `--color-border-subtle` | Control boundaries / quiet dividers |
| `error` | `--color-status-error` | Validation and critical feedback |

```css
.product-notice {
  color: var(--color-text-primary);
  background: var(--color-accent-subtle);
  border-inline-start: var(--border-width-thick) solid var(--color-accent-primary);
}
```

The example shows role-based composition, not a fixed Material pairing. For example, the project’s accent-subtle token is decorative and should not be used for small text unless the actual contrast passes.

## Typography

- Keep the project’s approved serif and sans-serif families. Use type roles to establish hierarchy for editorial display, headings, body copy, metadata, controls, and labels.
- Use the project’s responsive type tokens and line-height, weight, and tracking values where they fit. Keep product names, prices, form labels, and supporting copy easy to scan.
- Do not add Material’s default typeface or a second font family just to match a sample.

### Role mapping example

```css
.editorial-title {
  font-family: var(--font-serif);
  font-size: var(--text-2xl);
  line-height: var(--leading-display);
  font-weight: var(--weight-regular);
}

.product-card__title,
.product-card__price {
  font-family: var(--font-sans);
  font-size: var(--text-sm);
  line-height: var(--leading-snug);
}
```

Treat Material roles such as `display`, `headline`, `title`, `body`, and `label` as semantic guidance. Map them to Alice’s existing responsive tokens; do not create a second parallel scale when a project token already serves the role.

## Shape and depth

- Use a consistent shape scale through semantic radius tokens. Choose shape by component role and the approved UI specification; do not add decorative rounding indiscriminately.
- Use surface and border contrast to establish grouping. Reserve shadows for floating layers that need separation, such as menus or dialogs.
- Treat elevation as a hierarchy cue, not a reason to add shadows to every card or section. Preserve the project’s restrained visual treatment.

### Component examples

```css
.product-card {
  border: var(--border-width-thin) solid var(--color-border-subtle);
  border-radius: var(--radius-none);
  background: var(--color-bg-page);
}

.menu-panel {
  border: var(--border-width-thin) solid var(--color-border-subtle);
  border-radius: var(--radius-sm);
  background: var(--color-bg-page);
  box-shadow: var(--shadow-overlay);
}
```

Use the project’s shape token for the component’s intended role. A card may remain square while a floating menu uses the approved small radius; Material does not require every component to share one corner value.

## Motion

- Use short, purposeful transitions for state changes and layout feedback. Keep timing and easing consistent through tokens.
- Do not add expressive spring physics or shape morphing. Respect `prefers-reduced-motion` and ensure motion is not required to understand a state.

### Transition example

```css
.wp-block-button__link {
  transition:
    color var(--duration-fast) var(--ease-editorial),
    background-color var(--duration-fast) var(--ease-editorial),
    border-color var(--duration-fast) var(--ease-editorial);
}

@media (prefers-reduced-motion: reduce) {
  .wp-block-button__link {
    transition-duration: 0.01ms;
  }
}
```

Animate only properties that clarify feedback. Avoid animating layout or large surfaces for routine hover and focus states.
