---
name: css-writing
description: Project CSS conventions for the Alice WordPress Block Theme.
---

# CSS Writing

Use this skill for theme stylesheets, `theme.json` styles, responsive presentation, and design tokens.

## Project constraints

- CSS presents native WordPress and WooCommerce markup; it must not introduce new business behavior.
- Treat `docs/frontend/08.ui-tokens.md` as the source for approved tokens and `docs/frontend/04-design-system.md` as the visual guide.
- Keep the six palette roles and values defined in `docs/00.project-overview.md`. Do not introduce additional palette colors without direction.
- Prefer `theme.json` for global presets and block defaults. Use CSS for visual details that are not practical in `theme.json`.

## Conventions

- Follow the existing stylesheet organization; do not create a new structure without need.
- Reuse WordPress preset variables or documented semantic tokens. Avoid repeated literal values and one-off tokens.
- Scope component styles to their block or theme component. Avoid broad selectors that alter unrelated WordPress or WooCommerce controls.
- Prefer logical properties (`margin-inline`, `padding-block`, `inset-inline-start`) and responsive layouts over fixed dimensions.
- Keep specificity low; avoid `!important` unless a documented integration requires it.
- Provide visible `:focus-visible` styles. Respect `prefers-reduced-motion` and avoid motion that obscures content or causes layout shifts.
- Meet the project’s WCAG 2.2 Level AA target for theme-authored styles; check contrast, focus visibility, reflow, and non-color state cues.
- Ensure frontend and editor styles remain consistent where the same blocks appear.

## Before finishing

Check token reuse, responsive states, keyboard focus, reduced motion, and the effect on native WooCommerce controls. Update the token registry only when an approved token is added or changed.
