---
name: css-writing
description: Project CSS conventions for the Alice WordPress Block Theme.
---

# CSS Writing

Use this skill for theme stylesheets, `theme.json` styles, responsive presentation, and design tokens.

## Project constraints

- Follow the theme boundary in `docs/00.project-overview.md`, the visual guidance in `docs/frontend/design-system-reference.html`, approved values in `docs/frontend/08.ui-tokens.md`, and component behavior in `docs/frontend/09.ui-registry.md`. These project documents are authoritative for design decisions and supersede this skill whenever guidance conflicts; ask for permission to remove the conflicting skill guidance if you detect it.
- Prefer `theme.json` for global presets and block defaults. Use CSS for visual details that are not practical in `theme.json`.

## Design tokens and custom properties

- Treat `assets/css/variables.css` as the single source of truth for concrete reference values. Define raw/base reference tokens there, including palette, typeface, and any underlying primitive required by an Alice system extension.
- Define semantic system tokens and downstream system/component aliases in `theme.css` or the appropriate token layer by referencing `--md-ref-*` tokens from `variables.css`; do not duplicate raw reference values in those layers.
- Use the canonical `--md-ref-*` and `--md-sys-*` names in CSS and in JavaScript/PHP that read, pass, or consume CSS custom properties. Keep the names and roles aligned with `docs/frontend/08.ui-tokens.md`.
- Prefer design tokens for colors, typography, spacing scales, radii, and recurring component states.
- One-off custom CSS values are permitted for optical alignment, `aspect-ratio`, viewport and safe-area units (`dvh`, `svh`, `env(safe-area-inset-*)`), `calc()`/`clamp()` expressions, specific WordPress or WooCommerce block overrides where core/block specificity requires them, and other sparse edge cases where tokens are unavailable or ineffective.
- Add a brief inline comment explaining why a non-self-evident one-off value is needed (for example, `/* optical baseline alignment for serif label */`). Treat any one-off value used more than twice as a candidate for a token.

### Promoting recurring one-off values

When refactoring or implementing, check whether a non-token literal appears at least three times across separate components or patterns and represents a clear visual role, such as spacing, border radius/width, elevation/z-index, or transition timing. Do not promote purely asset-specific values (such as a `4 / 5` photo ratio) or isolated optical nudges unless they become a repeated pattern. Put a promoted primitive in `variables.css`, alias it from `theme.css` or the appropriate system/component layer, and update CSS, JavaScript, PHP, and documentation consumers. Refactor existing rules and documentation to use the promoted token consistently. Use the special-case allowance sparingly.

## Conventions

- Read the existing `assets/css/theme.css` before adding or changing styles.
- Follow the established stylesheet organization. Keep each component's styles grouped together, update existing rules in place, and avoid duplicate or competing selectors.
- Keep frontend styles and WordPress editor-specific overrides clearly distinguishable while maintaining consistent presentation where the same blocks appear.
- Reuse WordPress preset variables or documented semantic tokens, and avoid repeated literals or one-off tokens. The palette's documented shade ramps are approved WordPress presets for any appropriate design-system role; semantic base tokens do not limit shade use to component states or to a single role.
- Apply the established design context across color, typography, spacing, layout, and component states: prefer semantic tokens, WordPress presets, and inherited container styles. Avoid one-off hard-coded values or block attributes that bypass that context. Use explicit block attributes for intentional merchant-editable choices, and preserve merchant overrides of theme defaults.
- Before introducing a token, check whether an existing token serves the same purpose. Add tokens for meaningful design choices that should be changed consistently; prioritize colors, typography, spacing, layout dimensions, and common component dimensions. Keep one-off adjustments, resets, and positioning values in CSS.
- Scope component styles to their block or theme component. Avoid broad selectors that alter unrelated WordPress or WooCommerce controls.
- Before modifying a component, inspect its responsive behavior and interaction states. Preserve compatibility with native WordPress and WooCommerce blocks.
- This theme is LTR only. Use physical left/right and top/bottom properties; do not add RTL mirroring rules or logical-property abstractions. Prefer responsive layouts over fixed dimensions.
- Follow the Space and Layout rules and canonical `--md-sys-*` tokens in `docs/frontend/08.ui-tokens.md`: three width classes, grid margins/gutters, independent prose measure, 320px reflow, safe areas, and the shared scaffold z-index scale.
- Use intrinsic sizing (`minmax(min(100%, …), 1fr)`, `min(100%, …)`, and wrapping) for containers and grids. Never create page-level horizontal overflow at 320px; isolate necessary horizontal scrolling within the relevant region.
- Keep section rhythm at least twice internal component spacing, container padding at least as large as its internal gap, interactive targets at least 44px square, and card actions aligned across grid rows. Use the border/divider/whitespace grouping rule from the Design System.
- Keep specificity low; avoid `!important` unless a documented integration requires it.
- Provide visible `:focus-visible` styles. Respect `prefers-reduced-motion` and avoid motion that obscures content or causes layout shifts.
- Apply the accessibility target in the Design System; check contrast, focus visibility, reflow, and non-color state cues.
- Ensure frontend and editor styles remain consistent where the same blocks appear.

## Before finishing

Check token reuse, responsive states, interaction states, keyboard focus, reduced motion, and the effect on native WooCommerce controls. Check for unintended regressions in both the frontend and WordPress Site Editor. Update the token registry only when an approved token is added or changed.
