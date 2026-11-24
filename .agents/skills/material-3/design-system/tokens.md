# Material 3 Token Model

Use this guide when replacing the theme’s token architecture with a Material 3 model. Material tokens separate raw design choices from their semantic use so the visual system can evolve without scattering values through CSS. The foundation pass documents reference and system layers; defer component tokens until component specifications need them.

## Three token layers

| Layer | Purpose | Examples |
| --- | --- | --- |
| Reference (`md.ref`) | Palette and typeface values | `--md-ref-palette-primary40`, `--md-ref-typeface-brand` |
| System (`md.sys`) | Semantic roles used across the interface | `--md-sys-color-primary`, `--md-sys-typescale-body-medium-size`, `--md-sys-shape-corner-medium` |
| Component (`md.comp`) | Component-specific choices that need their own control | `--md-comp-button-container-color`, `--md-comp-card-container-shape` |

Keep reference values connected to Alice’s palette and typefaces. Material reference names use the `--md-ref-<category>-<role>` form; for a curated, non-tonal brand palette, use a project-specific palette namespace and descriptive names rather than inventing Material tone numbers. Material typeface references use `--md-ref-typeface-brand` and `--md-ref-typeface-plain`. System tokens express semantic meaning. Map `on-*` foregrounds to paired roles and verify contrast on actual colors. Add component tokens only when a component genuinely needs a stable override. Material’s five type roles are display, headline, title, body, and label, each with large, medium, and small styles; each style carries font, size, line-height, weight, and tracking attributes.

## CSS token example

The following shows the dependency direction. The right-hand values are project aliases, not proposed colors or fonts. During the refactor, map each alias to the corresponding approved WordPress preset or semantic property and check the rendered pairings.

```css
:root {
  /* Reference layer: project-owned source values. */
  --md-ref-palette-alice-neutral-ink: #111111;
  --md-ref-palette-alice-neutral-canvas: #F9F8F6;
  --md-ref-palette-alice-neutral-body: #222222;
  --md-ref-typeface-brand: "Cormorant Garamond", Georgia, serif;
  --md-ref-typeface-plain: "Plus Jakarta Sans", sans-serif;

  /* System layer: semantic roles used by patterns and components. */
  --md-sys-color-primary: var(--md-ref-palette-alice-neutral-ink);
  --md-sys-color-on-primary: var(--md-ref-palette-alice-neutral-canvas);
  --md-sys-color-surface: var(--md-ref-palette-alice-neutral-canvas);
  --md-sys-color-on-surface: var(--md-ref-palette-alice-neutral-body);
  --md-sys-typescale-headline-large-font: var(--md-ref-typeface-brand);
  --md-sys-typescale-body-medium-font: var(--md-ref-typeface-plain);

  /* System shape, spacing, and motion roles alias approved project tokens. */
  --md-sys-shape-corner-none: 0;
  --md-sys-shape-corner-extra-small: 4px;
  --md-sys-shape-corner-small: 8px;
  --md-sys-shape-corner-medium: 12px;
  --md-sys-shape-corner-large: 16px;
  --md-sys-shape-corner-extra-large: 28px;
  --md-sys-shape-corner-full: 9999px;
  --md-sys-elevation-level0: 0px;
  --md-sys-elevation-level1: 1px;
  --md-sys-elevation-level2: 3px;
  --md-sys-elevation-level3: 6px;
  --md-sys-elevation-level4: 8px;
  --md-sys-elevation-level5: 12px;
  --md-sys-color-scrim: #111111;
}
```

Material’s full generated vocabulary includes more roles and type attributes. Add them when a real component or state uses them; do not create a large unused token catalog merely to mirror every possible token.

For Alice’s foundation, use the standard seven corner tokens (`none`, `extra-small`, `small`, `medium`, `large`, `extra-large`, `full`), the fifteen baseline typescale styles, and emphasized weight variants for title and label only. These variants keep baseline family, size, line-height, and tracking; only weight changes. Material Web’s standard typescale token family does not define a separate emphasized suffix, so document it as a project extension using the same role/size vocabulary. Elevation levels express z-distance; shadow is a rendering treatment, and `md.sys.color.scrim` is a translucent backdrop treatment whose opacity is chosen for its overlay context. Do not add Expressive increased corners, shape morphing, or spring motion to this project foundation.

### Spatial system tokens

Use the canonical `--md-sys-layout-*`, `--md-sys-space-*`, and `--md-sys-layer-*` names in [UI Tokens](../../../../docs/frontend/08.ui-tokens.md#spacing-and-layout). They define the three width classes, grid margins and gutters, container/prose rulers, spacing rhythm, safe areas, and the strict scaffold z-index scale. Short forms such as `--container-max`, `--measure-prose`, `--space-section-y`, and `--z-pane-temp` are explanatory role names, not alternate custom properties or a second namespace. Do not invent local spatial tokens for standardized templates or components.

The scaffold layer roles are `base`, `sticky`, `backdrop`, `pane-temp`, and `toast`, with increasing values `0`, `100`, `200`, `300`, and `400`. Keep these separate from Material elevation levels, which describe visual depth rather than application stacking order.

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

## Official references

- [Material 3 applying type](https://m3.material.io/styles/typography/applying-type)
- [Material 3 emphasized typography API](https://developer.android.com/reference/kotlin/androidx/compose/material3/Typography.html)
- [Material typography emphasized weights](https://github.com/material-components/material-components-android/blob/master/docs/theming/Typography.md?plain=1)
- [Material Web typography and token naming](https://material-web.dev/theming/typography/)
- [Material Web shape token names](https://material-web.dev/theming/shape/)
- [Material 3 elevation](https://m3.material.io/styles/elevation)
