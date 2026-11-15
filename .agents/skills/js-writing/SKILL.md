---
name: js-writing
description: Project JavaScript constraints for the Alice WordPress Block Theme.
---

# JavaScript Writing

JavaScript is exceptional in this theme. WordPress and WooCommerce provide all shopping behavior. Theme scripts may progressively enhance visual/interface state only, such as opening and closing navigation. They must not implement search, filtering, cart, checkout, product selection, account, or other commerce behavior.

## Decision order

1. Use native WordPress/WooCommerce blocks and controls.
2. Use HTML and CSS when they provide the required presentation and state.
3. Use the WordPress Interactivity API only for a visual/interface interaction that cannot be achieved with the first two options.
4. Do not add custom blocks, React, jQuery, REST/Store API calls, or a client-side storefront.

If a requirement cannot be achieved within these limits, stop and follow the escalation process in `docs/00.project-overview.md`. Do not implement or log a custom block without the project owner's direction.

## Progressive enhancement

- Preserve native links, forms, and controls. The interface should remain understandable if enhancement code does not run.
- Keep scripts small, scoped to the affected interface, and loaded only where needed.
- Use semantic HTML and native keyboard behavior. Manage focus only when the interaction requires it.
- Meet the project’s WCAG 2.2 Level AA target for any theme-authored interaction; verify keyboard access, focus visibility, names/state exposure, and reduced motion.
- Avoid unnecessary DOM changes, dependencies, global state, and event handlers.
- Handle reduced motion in CSS; JavaScript should not create essential motion or hide essential content.
- Do not send network requests or change commerce state from theme scripts.

## Before finishing

State why native block behavior and CSS alone do not meet the visual interaction requirement. Confirm fallback behavior, keyboard use, focus, and that no commerce behavior was added. Run relevant existing lint/build/validation checks by default, provide manual browser review steps, and do not create a new test suite without approval.
