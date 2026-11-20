# Design System

This document provides shared visual guidance. [UI Tokens](08.ui-tokens.md) is the source of approved design values; the [UI Registry](09.ui-registry.md) owns page, template, and component specifications. Project scope and platform decisions are in the [Project Overview](../00.project-overview.md).

## Visual Principles

- Keep hierarchy clear and product information easy to scan.
- Use intentional whitespace and strong editorial compositions.
- Let lifestyle and product photography lead; do not distort or modify merchant-provided image files.
- Keep product cards clean and consistent, with imagery prominent and name and price readable.
- Use subtle borders and restrained decoration. Avoid generic boxed layouts, excessive shadows, or decorative rounding.
- Use asymmetry, split imagery, and alternating compositions selectively rather than repeating one editorial layout everywhere.

## Imagery

- Choose image framing for its context. Product imagery uses the documented 3:4 aspect ratio where applicable; editorial frames follow their UI specification.
- Use cover cropping only when essential subject details remain visible across supported viewport sizes and any specified safe area is respected.
- Preserve merchant-provided media files; use native blocks and CSS for display size, position, and crop.
- Provide meaningful alt text for informative images; avoid redundant spoken content for decorative images.

## Shape and Depth

Square corners are the baseline. Use existing small or full-radius tokens only where a component specification calls for them. Keep most layouts flat; use borders for necessary boundaries and reserve overlay shadows for floating layers.

## Shared Component Guidance

Page-specific structure, states, and behavior belong in the [UI Registry](09.ui-registry.md). These shared principles apply across components:

- Distinguish primary actions, secondary actions, text links, and icon-only controls. Keep keyboard focus visible and do not rely on hover alone.
- Use clear form labels, comfortable sizing, and legible validation feedback while preserving native control behavior.
- Keep product imagery, name, price, sale price, and native product states easy to scan.
- Do not communicate status through color alone. Retain native disabled, loading, validation, and commerce-feedback behavior unless a UI specification defines a presentation requirement.

## Accessibility and Editor Parity

Target WCAG 2.2 Level AA for theme-authored UI. Preserve keyboard access, semantic hierarchy, readable contrast, visible and unobscured focus, and accessible names for icon-only controls across mobile, tablet, and desktop. Review native WooCommerce controls for regressions caused by theme styling without claiming ownership of plugin markup.

Keep the Site Editor close to the frontend so merchants can understand and customize the layout they will publish. Set meaningful block-level presentation in native attributes or `theme.json` when practical; use CSS for responsive behavior and component details that are awkward or unavailable in native controls. Prioritize parity for structure, colors, spacing, and visible states over exact pixel matching.
