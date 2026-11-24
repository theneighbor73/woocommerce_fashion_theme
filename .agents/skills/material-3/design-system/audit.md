# Design System Audit

Use when asked to audit or review a theme page, pattern, template, or design-system implementation. Review the supplied source or live page within the available environment; do not claim to have tested a WordPress editor or live site that was not provided.

## Review

- Check that project palette and font families are preserved and styles use approved semantic tokens.
- Review hierarchy, typography, shape, surfaces, borders, and restrained use of elevation and motion against the project UI specification.
- Check the compact/medium/expanded 4/8/12-column rulers, 320px page overflow, intrinsic reflow, isolated horizontal scrollers, prose measure, and Site Editor parity.
- Check 44px touch targets, card-action alignment, section/gap proximity, safe-area use, short-landscape/200% text zoom behavior, and the strict base/sticky/backdrop/pane/toast z-index order.
- Confirm that a grouping uses one visual boundary mechanism, full-bleed sections keep their inner content on the grid, and no component adds a local density or spatial-token system.
- Review native block behavior, keyboard access, accessible names, visible focus, state clarity, reduced motion, and WCAG 2.2 AA contrast.
- Confirm the implementation stays within the WordPress theme boundary: native blocks and templates, no custom blocks, commerce logic, persistent data, external services, or imported Material component library.

## Report

List actionable findings first, with severity, file and line when source is available, user impact, and a concrete fix. Separate verified findings from items that need browser or editor review. Finish with concise passing observations and any checks that could not be performed. Do not assign an overall “Material compliant” score.
