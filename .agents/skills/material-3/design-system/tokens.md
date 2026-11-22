# Material 3 Token Model

Use this guide when replacing the theme’s token architecture with a Material 3 model. Material tokens separate raw design choices from their semantic use so components can change without scattering values through CSS.

## Three token layers

| Layer | Purpose | Examples |
| --- | --- | --- |
| Reference (`md.ref`) | Primitive palette and typeface values | `--md-ref-palette-primary-40`, `--md-ref-typeface-brand` |
| System (`md.sys`) | Semantic roles used across the interface | `--md-sys-color-primary`, `--md-sys-typescale-body-medium-size`, `--md-sys-shape-corner-medium` |
| Component (`md.comp`) | Component-specific choices that need their own control | `--md-comp-button-container-color`, `--md-comp-card-container-shape` |

Keep reference values connected to the approved Alice palette and typefaces. System tokens express their meaning. Add component tokens only when a component genuinely needs a stable override; otherwise let it inherit system roles.

## CSS token example

The following shows the dependency direction. The right-hand values are project aliases, not proposed colors or fonts. During the refactor, map each alias to the corresponding approved WordPress preset or semantic property and check the rendered pairings.

```css
:root {
  /* Reference layer: project-owned primitives. */
  --md-ref-color-brand: var(--color-action-primary);
  --md-ref-color-canvas: var(--color-bg-page);
  --md-ref-color-ink: var(--color-text-primary);
  --md-ref-typeface-brand: var(--font-serif);
  --md-ref-typeface-plain: var(--font-sans);

  /* System layer: semantic roles used by patterns and components. */
  --md-sys-color-primary: var(--md-ref-color-brand);
  --md-sys-color-on-primary: var(--color-text-inverse);
  --md-sys-color-surface: var(--md-ref-color-canvas);
  --md-sys-color-on-surface: var(--md-ref-color-ink);
  --md-sys-typescale-headline-large-font: var(--md-ref-typeface-brand);
  --md-sys-typescale-body-medium-font: var(--md-ref-typeface-plain);

  /* System shape, spacing, and motion roles alias approved project tokens. */
  --md-sys-shape-corner-small: var(--radius-sm);
  --md-sys-shape-corner-none: var(--radius-none);
  --md-sys-motion-duration-short: var(--duration-fast);
  --md-sys-motion-easing-standard: var(--ease-editorial);
}
```

Material’s full generated vocabulary includes more roles and type attributes. Add them when a real component or state uses them; do not create a large unused token catalog merely to mirror every possible token.

## Light theme and future dark theme

The active values belong in the default theme context. Keep a clear seam for later theme mapping without populating or activating dark values today:

```css
:root {
  /* Active light system-token mappings. */
}

/* Future integration point only; do not add values or a switch yet. */
[data-theme="dark"] {
}
```

Do not add `prefers-color-scheme` behavior or a theme control until dark mode is requested. If the dark theme is implemented later, map its system roles separately while keeping reference brand values shared where appropriate.

## Component-token example

Start with system roles. Introduce a component alias only if a button’s spec needs an independent treatment that should not affect other primary surfaces:

```css
:root {
  --md-comp-button-filled-container: var(--md-sys-color-primary);
  --md-comp-button-filled-label: var(--md-sys-color-on-primary);
}

.wp-block-button__link {
  background: var(--md-comp-button-filled-container);
  color: var(--md-comp-button-filled-label);
}
```

If no independent button override is needed, use `--md-sys-color-primary` and `--md-sys-color-on-primary` directly. Avoid a second component-token layer that only renames every system token.

## WordPress implementation mapping

- Keep editor-visible presets and global style defaults in `theme.json`.
- Map WordPress preset variables to the Material reference layer in the theme’s semantic CSS layer.
- Have patterns and component CSS consume Material system roles rather than raw hex values or WordPress preset names directly.
- Keep token definitions in one shared layer and component-specific styling near the styles that consume them.
- Update `docs/frontend/08.ui-tokens.md` and affected UI Registry entries when approved token roles or values change.
