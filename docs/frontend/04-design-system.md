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

Component specifications, component-specific behavior, and exceptions belong in the [UI Registry](09.ui-registry.md). These shared principles apply across components:

- Distinguish primary actions, secondary actions, text links, and icon-only controls. Keep keyboard focus visible and do not rely on hover alone.
- Use clear form labels, comfortable sizing, and legible validation feedback while preserving native control behavior.
- Keep product imagery, name, price, sale price, and native product states easy to scan.
- Do not communicate status through color alone. Retain native disabled, loading, validation, and commerce-feedback behavior unless a UI specification defines a presentation requirement.

### Component states

States describe how an interactable component appears and behaves in response to its condition or user input. Apply the following shared baseline to buttons, navigation, form controls, and other interactable components. A component supports only states that make sense for its role; its UI Registry entry lists applicable states and documents any exception to this baseline.

| State | Meaning and shared rule |
|---|---|
| Default | Ready for interaction; the component's normal presentation. |
| Hover | Pointer is over the component. Use a clear visual cue that fits its role. Where a component uses paired foreground and surface colors, coordinate changes to both colors when applying an inverse treatment; do not make a dark surface brighter while leaving its already-bright foreground unchanged. Hover must not be the only way to identify or operate the component. |
| Focus | Keyboard or other input method has placed focus on the component. Show a visible, sufficiently contrasting indicator; keep it unobscured. |
| Active / Pressed | The component is being activated. Provide feedback where supported without changing its meaning or obscuring content. Preserve the selected surface/foreground pairing and add a distinct pressed cue, such as a small positional change, where appropriate. |
| Disabled | The action is unavailable. Preserve native disabled semantics and behavior; make the unavailable state perceivable without relying on color alone. |
| Loading | An operation is processing. Preserve the native operation's behavior and feedback; do not imply that a component has loading behavior when its underlying operation does not expose it. |

For buttons, the current inverse color treatment is: dark Primary/Fill surfaces invert to Canvas with Primary text; light Secondary/Outline surfaces invert to Primary with inverse text. Hover and pressed retain the same inverse color pairing, while pressed adds a small positional cue. Use existing semantic palette pairs and check contrast on the actual surface. This is a styling rule only; it does not imply new interaction or business behavior.

Do not invent unsupported interaction or business behavior to create a state. Theme-authored state styling must maintain keyboard access, accessible names, and the WCAG 2.2 AA target. Respect reduced-motion preferences when state changes use motion.

## Accessibility and Editor Parity

Target WCAG 2.2 Level AA for theme-authored UI. Preserve keyboard access, semantic hierarchy, readable contrast, visible and unobscured focus, and accessible names for icon-only controls across mobile, tablet, and desktop. Review native WooCommerce controls for regressions caused by theme styling without claiming ownership of plugin markup.

Keep the Site Editor close to the frontend so merchants can understand and customize the layout they will publish. Set meaningful block-level presentation in native attributes or `theme.json` when practical; use CSS for responsive behavior and component details that are awkward or unavailable in native controls. Prioritize parity for structure, colors, spacing, and visible states over exact pixel matching.
