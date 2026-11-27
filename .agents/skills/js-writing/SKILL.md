---
name: js-writing
description: Project JavaScript constraints for the Alice WordPress Block Theme.
---

# JavaScript Writing

Use JavaScript only for progressive visual/interface enhancements. Follow the project boundary in `docs/00.project-overview.md` and the interaction behavior specified in `docs/frontend/09.ui-registry.md`.

## Decision order

1. Use native WordPress/WooCommerce blocks and controls.
2. Use HTML and CSS when they provide the required presentation and state.
3. Use the WordPress Interactivity API only for a visual/interface interaction that cannot be achieved with the first two options.
4. Do not add custom blocks, React, jQuery, REST/Store API calls, or a client-side storefront.

If a requirement cannot be achieved within these limits, stop and follow the escalation process in `docs/00.project-overview.md`.

## Progressive enhancement

- Preserve native links, forms, and controls. The interface should remain understandable if enhancement code does not run.
- Keep scripts small, scoped to the affected interface, and loaded only where needed.
- Use semantic HTML and native keyboard behavior. Manage focus only when the interaction requires it.
- Apply the accessibility target in `docs/frontend/design-system-reference.html`; verify keyboard access, focus visibility, names/state exposure, and reduced motion.
- Avoid unnecessary DOM changes, dependencies, global state, and event handlers.
- Handle reduced motion in CSS; JavaScript should not create essential motion or hide essential content.
- Do not send network requests or change commerce state from theme scripts.

## Before finishing

State why native block behavior and CSS alone do not meet the visual interaction requirement. Confirm fallback behavior, keyboard use, focus, and that no commerce behavior was added. Run relevant existing lint/build/validation checks by default, provide manual browser review steps, and do not create a new test suite without approval.
