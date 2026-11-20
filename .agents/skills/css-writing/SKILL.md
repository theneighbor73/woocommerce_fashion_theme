---
name: css-writing
description: Project CSS conventions for the Alice WordPress Block Theme.
---

# CSS Writing

Use this skill for theme stylesheets, `theme.json` styles, responsive presentation, and design tokens.

## Project constraints

- Follow the theme boundary in `docs/00.project-overview.md`, the visual guidance in `docs/frontend/04-design-system.md`, approved values in `docs/frontend/08.ui-tokens.md`, and component behavior in `docs/frontend/09.ui-registry.md`.
- Prefer `theme.json` for global presets and block defaults. Use CSS for visual details that are not practical in `theme.json`.

## Conventions

- Read the existing `assets/css/theme.css` before adding or changing styles.
- Follow the established stylesheet organization. Keep each component's styles grouped together, update existing rules in place, and avoid duplicate or competing selectors.
- Keep frontend styles and WordPress editor-specific overrides clearly distinguishable while maintaining consistent presentation where the same blocks appear.
- Reuse WordPress preset variables or documented semantic tokens. Avoid repeated literal values and one-off tokens.
- Apply the established design context across color, typography, spacing, layout, and component states: prefer semantic tokens, WordPress presets, and inherited container styles. Avoid one-off hard-coded values or block attributes that bypass that context. Use explicit block attributes for intentional merchant-editable choices, and preserve merchant overrides of theme defaults.
- Before introducing a token, check whether an existing token serves the same purpose. Add tokens for meaningful design choices that should be changed consistently; prioritize colors, typography, spacing, layout dimensions, and common component dimensions. Keep one-off adjustments, resets, and positioning values in CSS.
- Scope component styles to their block or theme component. Avoid broad selectors that alter unrelated WordPress or WooCommerce controls.
- Before modifying a component, inspect its responsive behavior and interaction states. Preserve compatibility with native WordPress and WooCommerce blocks.
- Prefer logical properties (`margin-inline`, `padding-block`, `inset-inline-start`) and responsive layouts over fixed dimensions.
- Keep specificity low; avoid `!important` unless a documented integration requires it.
- Provide visible `:focus-visible` styles. Respect `prefers-reduced-motion` and avoid motion that obscures content or causes layout shifts.
- Apply the accessibility target in the Design System; check contrast, focus visibility, reflow, and non-color state cues.
- Ensure frontend and editor styles remain consistent where the same blocks appear.

## Before finishing

Check token reuse, responsive states, interaction states, keyboard focus, reduced motion, and the effect on native WooCommerce controls. Check for unintended regressions in both the frontend and WordPress Site Editor. Update the token registry only when an approved token is added or changed.
