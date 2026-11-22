# Material 3 Color System

Material color tokens describe roles, not a mandatory palette. Keep Alice’s approved palette fixed and map its values to the roles the theme actually uses. Do not generate dynamic color or copy Material’s sample purple palette.

## Core role families

| Role family | Roles | Typical meaning |
| --- | --- | --- |
| Primary | `primary`, `on-primary`, `primary-container`, `on-primary-container` | High-emphasis actions and their foregrounds |
| Secondary | `secondary`, `on-secondary`, `secondary-container`, `on-secondary-container` | Supporting actions and lower-emphasis emphasis |
| Tertiary | `tertiary`, `on-tertiary`, `tertiary-container`, `on-tertiary-container` | Complementary accent where the design needs it |
| Error | `error`, `on-error`, `error-container`, `on-error-container` | Validation and error feedback |
| Surface | `surface`, `on-surface`, `on-surface-variant`, surface containers | Page, content, and nested component backgrounds |
| Outline | `outline`, `outline-variant` | Important control boundaries and quieter dividers |

`on-*` roles are for text or icons displayed on the paired role. A container role is a fill; its `on-*` role is the foreground placed on that fill. Check the actual pair for WCAG 2.2 AA; token names do not replace contrast verification.

## Surface hierarchy

Use `surface` for the main page canvas. Material’s surface-container family provides semantic levels for grouping and nested surfaces:

- `surface-container-lowest` — least emphasized container
- `surface-container-low` — subtle separation from the page
- `surface-container` — default container surface
- `surface-container-high` and `surface-container-highest` — stronger grouping
- `surface-dim` and `surface-bright` — optional roles when the layout needs relative surface emphasis

These are optional semantic roles, not a mandate to give every card a different fill. In Alice, prefer the project’s restrained surface and border treatment and introduce only the levels a real page hierarchy needs. Keep region mappings consistent as responsive layouts reflow.

## Mapping example

Map the project’s semantic tokens into roles, then consume the roles in components:

```css
:root {
  --md-sys-color-primary: var(--color-action-primary);
  --md-sys-color-on-primary: var(--color-text-inverse);
  --md-sys-color-surface: var(--color-bg-page);
  --md-sys-color-on-surface: var(--color-text-primary);
  --md-sys-color-on-surface-variant: var(--color-text-muted);
  --md-sys-color-outline-variant: var(--color-border-subtle);
  --md-sys-color-error: var(--color-status-error);
}

.primary-action {
  color: var(--md-sys-color-on-primary);
  background: var(--md-sys-color-primary);
}

.page-content {
  color: var(--md-sys-color-on-surface);
  background: var(--md-sys-color-surface);
}
```

This is a role-mapping illustration, not approval to use those exact pairings on every component. For example, use the project’s existing button specification to determine its inverse hover/pressed pairing. Check contrast on the final rendered colors.

## Choosing roles

- Use primary for the most important action or active emphasis; keep secondary actions visually subordinate.
- Use error roles for errors, not general promotional emphasis. Pair status colors with text or another clear signal.
- Use `outline-variant` for quiet dividers and `outline` for boundaries that need stronger definition.
- Use neutral surface roles for large backgrounds. Avoid using accent-container colors as a shortcut for all cards and panels.
- Add inverse, fixed, dim/bright, or other optional roles only when a documented UI need calls for them.

Material’s role terminology and surface-container families are summarized here so the skill is usable offline; the full list is intentionally limited to roles relevant to this project.
