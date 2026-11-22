# Design System Audit

Use when asked to audit or review a theme page, pattern, template, or design-system implementation. Review the supplied source or live page within the available environment; do not claim to have tested a WordPress editor or live site that was not provided.

## Review

- Check that project palette and font families are preserved and styles use approved semantic tokens.
- Review hierarchy, typography, shape, surfaces, borders, and restrained use of elevation and motion against the project UI specification.
- Check responsive reflow, readable content widths, product presentation, and Site Editor parity.
- Review native block behavior, keyboard access, accessible names, visible focus, state clarity, reduced motion, and WCAG 2.2 AA contrast.
- Confirm the implementation stays within the WordPress theme boundary: native blocks and templates, no custom blocks, commerce logic, persistent data, external services, or imported Material component library.

## Report

List actionable findings first, with severity, file and line when source is available, user impact, and a concrete fix. Separate verified findings from items that need browser or editor review. Finish with concise passing observations and any checks that could not be performed. Do not assign an overall “Material compliant” score.
