---
name: material-3
description: >
  Apply baseline Material Design 3 guidance to this WordPress and WooCommerce
  block theme. Use for design-system refactors, native block styling, responsive
  layouts, and visual audits; do not use it to add a component library or
  commerce behavior.
---

# Material Design 3 for Alice

Use Material 3 as a design reference for the theme’s visual system. Implement presentation with WordPress and WooCommerce blocks, templates, template parts, patterns, `theme.json`, and CSS.

## Project decisions

- Preserve Alice’s palette direction and approved font families in `docs/frontend/08.ui-tokens.md`. Existing palette values are the starting point; tune a value or its role mapping when Material role clarity or accessible contrast requires it. Do not generate a dynamic palette or replace the typefaces.
- Use baseline Material 3 guidance. Do not apply M3 Expressive components, shape morphing, or spring-based expressive motion.
- Use the standard contrast scheme and keep the project’s WCAG 2.2 AA accessibility target.
- Keep the light theme active. Structure light tokens so a dark theme can be added later, but do not add dark values, theme detection, or a user-facing switch now.
- Use Alice’s single-density, LTR-only Space and Layout foundation. The project’s three width classes, reflow guardrails, and spatial tokens are defined in the UI Tokens and Responsive Layout references.
- Keep the theme a presentation layer. Do not add custom blocks, commerce or business logic, persistent data, external services, or Material component libraries.
- Build reusable merchant-facing sections as native block patterns. Use template parts for recurring site structure and compose templates from the same patterns where applicable.

## Use the references

- [Foundations](design-system/foundations.md): map Material roles to project tokens; shape, depth, and motion.
- [Material token model](design-system/tokens.md): reference, system, and component token layers with CSS examples.
- [Color system](design-system/color-system.md): color roles, `on-*` pairings, surfaces, and mapping the fixed project palette.
- [Responsive layout](design-system/layout-and-responsive.md): web layout and responsive behavior.
- [Native components](design-system/components.md): WordPress and WooCommerce presentation patterns.
- [Token organization](design-system/organize-token.md): where project values live and how styles consume them.
- [Audit](design-system/audit.md): review an implementation when asked to audit or review it.

Before changing theme UI, check the approved values in `docs/frontend/08.ui-tokens.md` and component requirements in `docs/frontend/09.ui-registry.md`. Follow the project’s authored CSS, PHP/HTML, and asset-versioning guidance when editing those implementation files.
