---
name: php-html-writing
description: PHP and block markup conventions for the Alice WordPress Block Theme.
---

# PHP and HTML Writing

Use this skill for theme setup, guarded presentation hooks, block patterns, and native block template markup.

## Project constraints

- Follow the presentation-only project boundary in `docs/00.project-overview.md` and the relevant specification in `docs/frontend/09.ui-registry.md`.
- Check WooCommerce APIs and hooks before use. When WooCommerce is inactive, do not fatal; keep general WordPress pages usable.
- Follow WordPress APIs; use `alice-theme` for WordPress slugs/handles and `alice_theme_` for PHP identifiers.

## Block markup

- Keep `templates/*.html` and `parts/*.html` as serialized WordPress block markup; do not include PHP.
- Use native core and WooCommerce blocks. Keep block comment attributes consistent with the saved HTML markup.
- Use template parts for recurring structural regions and patterns for reusable native block compositions.
- Use semantic landmarks and native controls. Keep nesting purposeful and manageable; follow the accessibility guidance in `docs/frontend/04-design-system.md`.
- Match template locking to the UI specification: preserve fixed composition while allowing intended content and navigation editing.

## PHP safety

- Guard direct access where appropriate and check optional files, functions, classes, and return values before use.
- Escape output for its context (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`) and sanitize applicable input.
- Keep functions focused. Avoid direct database operations, custom persistence, raw debug output, and logging personal or payment data.
- Use the project text domain `alice-theme` for translatable theme strings.

## Patterns

Use a PHP pattern only when needed for a reusable native block composition. Include WordPress pattern metadata and translate/escape PHP-rendered text and attributes. Patterns must not provide runtime data or business behavior.

## Before finishing

Review block validity, editor parity, escaping, translation, WooCommerce guards, and whether the change stays within the presentation-only boundary. Run relevant existing lint/build/validation checks by default, provide manual editor/browser review steps, and do not create a new test suite without approval.
