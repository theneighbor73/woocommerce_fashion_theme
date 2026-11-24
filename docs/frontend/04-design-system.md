# Design System

This document provides shared visual guidance. [UI Tokens](08.ui-tokens.md) is the source of approved design values; the [UI Registry](09.ui-registry.md) owns page, template, and component specifications. Project scope and platform decisions are in the [Project Overview](../00.project-overview.md).

## Visual Principles

- Keep hierarchy clear and product information easy to scan.
- Use intentional whitespace and strong editorial compositions.
- Let lifestyle and product photography lead; do not distort or modify merchant-provided image files.
- Keep product cards clean and consistent, with imagery prominent and name and price readable.
- Use subtle borders and restrained decoration. Avoid generic boxed layouts, excessive shadows, or decorative rounding.
- Use asymmetry, split imagery, and alternating compositions selectively rather than repeating one editorial layout everywhere.

## Space and Layout

The [UI Tokens](08.ui-tokens.md#spacing-and-layout) define the canonical spatial values. Use its compact, medium, and expanded width classes, universal grid rulers, and one low-density presentation across the system. The short role names used in component discussion are references to those `--md-sys-*` tokens, not alternate values.

This foundation is LTR only. Use left/right and top/bottom terms in component specifications; do not add RTL mirroring rules or logical-property abstractions.

- Keep all standard templates and pervasive components inside the class margins and grid. The prose measure stays independently constrained; the expanded grid does not make paragraphs or controls stretch to the container edge.
- Keep section rhythm at least twice internal component spacing, container padding at least as large as internal grid/flex gaps, targets at least `44px × 44px`, and card actions aligned across a row.
- At `320px`, prevent page-level horizontal overflow. Isolate intentionally wide data or pill content in its own horizontal scroller. Use intrinsic sizing and wrapping instead of fixed layout widths.
- Use safe-area insets for the top bar, toast region, and full-bleed sections. Follow the shared layer scale for sticky regions, backdrops, temporary panes, and toasts.
- Choose one grouping treatment: an external container border, internal dividers, tonal surface shift/whitespace, or no border. Do not combine an outer border and internal dividers for the same grouping. Dense checkout/order summary tables may use both only when each boundary communicates distinct structure.
- Full-bleed merchandising may extend to `100vw`; keep its inner copy and actions on the grid margins. Local spatial properties are reserved for bespoke editorial sections, never standardized templates/components.

There is one density level throughout the system. Do not add a density switcher or compact-density mode. Alice’s responsive classes describe available space, not alternate density settings.

## Imagery

- Choose image framing for its context. Product imagery uses the documented 3:4 aspect ratio where applicable; editorial frames follow their UI specification.
- Use cover cropping only when essential subject details remain visible across supported viewport sizes and any specified safe area is respected.
- Preserve merchant-provided media files; use native blocks and CSS for display size, position, and crop.
- Provide meaningful alt text for informative images; avoid redundant spoken content for decorative images.

## Color and Shade Usage

The nine-step shade ramps are available throughout the design system. Use shades for any appropriate visual role, including surfaces, text, borders, icons, and feedback. Pair shades to create clear hierarchy and cohesive contrast within the established palette; semantic base colors remain useful defaults, not exclusive choices. There is no universal shade-to-role mapping: choose combinations for the component and context, then verify contrast and meaning. A feedback surface may, for example, use different steps from its palette family for its background, boundary, and text; that is an illustration, not a required recipe.

## Shape and Depth

Square corners are the baseline. Use existing small or full-radius tokens only where a component specification calls for them. Keep most layouts flat; use borders for necessary boundaries and reserve overlay shadows for floating layers.

## Shared Component Guidance

Component specifications, component-specific behavior, and exceptions belong in the [UI Registry](09.ui-registry.md). These shared principles apply across components:

- Distinguish primary actions, secondary actions, text links, and icon-only controls. Keep keyboard focus visible and do not rely on hover alone.
- Use clear form labels, comfortable sizing, and legible validation feedback while preserving native control behavior.
- Keep product imagery, name, price, sale price, and native product states easy to scan.
- Do not communicate status through color alone. Retain native disabled, loading, validation, and commerce-feedback behavior unless a UI specification defines a presentation requirement.

## Icons

Use supplied assets from `assets/svg/icons/` for compact controls when their meaning is unambiguous (cart, search, account, close, filter, quantity steppers, and arrows). Keep the accessible name through visible text or an accessible label; decorative icons are hidden from assistive technology. Prefer the icon’s `currentColor` stroke so it follows the active semantic foreground. The supplied `light/` and `dark/` variants use `#222222` and `#F9F8F6` respectively when a fixed-color asset is needed. Do not invent or draw artwork. If planning needs an icon that is not supplied, request its slug and usage context from the project owner before build.

## Interaction

- Desktop click activates controls and toggles expandable menus. Pointer hover may reveal a subtle state or desktop dropdown; it never carries essential information by itself.
- Mobile taps activate ordinary buttons and links immediately. For a parent item with a submenu, the first tap expands/folds the submenu; after a pause, a subsequent tap toggles/folds it, while a double tap navigates to the parent destination. Keep the expansion affordance and parent link clearly named and operable by keyboard and assistive technology.
- There is no mobile hover state. All essential controls and information remain available without hover.
- Preserve native WordPress/WooCommerce navigation, link, form, and commerce semantics. This model specifies presentation and input expectations, not new behavior.

## Component states

The shared state baseline below is extended by these role-specific rules. The applicable component entry in the [UI Registry](09.ui-registry.md) identifies supported states and any native-control limits.

- **Buttons:** default uses the documented Primary/Secondary or Fill/Outline pairing. Desktop hover makes a subtle token-based change; focus uses a high-contrast `:focus-visible` outline with offset; pressed adds a small tactile cue while preserving foreground/surface contrast. Pressed and loading appearances use the normal cursor, even if the pointer remains over the button. Disabled uses native `disabled` or `aria-disabled="true"` semantics and has no action. Loading is shown only when the underlying operation exposes it; preserve width where possible, expose busy status, and prevent duplicate submission through native behavior.
- **Product variation options:** available options can be selected by click/tap and have a subtle hover treatment on desktop. The selected option uses a warm fill and inset underline indicator rather than an outer box, and exposes native selected semantics (such as `aria-checked` or `aria-pressed` when appropriate). Out-of-stock or invalid combinations are visibly unavailable, cannot be purchased, and expose disabled semantics. Focus is distinct from selection.
- **Input fields:** use actual labeled input controls so examples can be focused and edited. Default uses semantic text and outline tokens with readable placeholder/value and comfortable padding. Focus has a clear accent/primary border or ring. Errors use the error role plus a concise, programmatically associated message with sufficient spacing and `aria-invalid="true"`. Disabled fields use native semantics. A valid cue may be subtle and must not clutter the minimalist form or rely on color alone.

The [HTML Design Foundations](design-system-reference.html#component-states) visualizes button, variation-option, and input states. Its input examples are interactive frontend-only controls; they do not submit data or implement validation logic. The separate [Icons](design-system-reference.html#icons) and [Interaction](design-system-reference.html#interaction) sections show the icon contrast and pointer/touch guidance. Glyph examples communicate light/inverse foreground contrast only; they are not production artwork.

Do not invent loading, validation, or purchase logic. Native WordPress/WooCommerce controls remain responsible for those conditions; theme guidance covers their visual expression and accessible presentation only.

### Shared state baseline

States describe how an interactable component appears and behaves in response to its condition or user input. Apply the following shared baseline to buttons, navigation, form controls, and other interactable components. A component supports only states that make sense for its role; its UI Registry entry lists applicable states and documents any exception to this baseline.

| State            | Meaning and shared rule                                                                                                                                                                                                                                                                                                                                                      |
| ---------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Default          | Ready for interaction; the component's normal presentation.                                                                                                                                                                                                                                                                                                                  |
| Hover            | Pointer is over the component. Use a clear visual cue that fits its role. Where a component uses paired foreground and surface colors, coordinate changes to both colors when applying an inverse treatment; do not make a dark surface brighter while leaving its already-bright foreground unchanged. Hover must not be the only way to identify or operate the component. |
| Focus            | Keyboard or other input method has placed focus on the component. Show a visible, sufficiently contrasting indicator; keep it unobscured.                                                                                                                                                                                                                                    |
| Active / Pressed | The component is being activated. Provide feedback where supported without changing its meaning or obscuring content. Preserve the selected surface/foreground pairing and add a distinct pressed cue, such as a small positional change, where appropriate.                                                                                                                 |
| Disabled         | The action is unavailable. Preserve native disabled semantics and behavior; make the unavailable state perceivable without relying on color alone.                                                                                                                                                                                                                           |
| Loading          | An operation is processing. Preserve the native operation's behavior and feedback; do not imply that a component has loading behavior when its underlying operation does not expose it.                                                                                                                                                                                      |

For buttons, the current inverse color treatment is: dark Primary/Fill surfaces invert to Canvas with Primary text; light Secondary/Outline surfaces invert to Primary with inverse text. Hover and pressed retain the same inverse color pairing, while pressed adds a small positional cue. Use existing semantic palette pairs and check contrast on the actual surface. This is a styling rule only; it does not imply new interaction or business behavior.

Do not invent unsupported interaction or business behavior to create a state. Theme-authored state styling must maintain keyboard access, accessible names, and the WCAG 2.2 AA target. Respect reduced-motion preferences when state changes use motion.

## Accessibility and Editor Parity

Target WCAG 2.2 Level AA for theme-authored UI. Preserve keyboard access, semantic hierarchy, readable contrast, visible and unobscured focus, and accessible names for icon-only controls across mobile, tablet, and desktop. Review native WooCommerce controls for regressions caused by theme styling without claiming ownership of plugin markup.

Keep the Site Editor close to the frontend so merchants can understand and customize the layout they will publish. Set meaningful block-level presentation in native attributes or `theme.json` when practical; use CSS for responsive behavior and component details that are awkward or unavailable in native controls. Prioritize parity for structure, colors, spacing, and visible states over exact pixel matching.
