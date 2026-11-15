# Design System

## Direction

Minimalist contemporary fashion with a lifestyle-editorial experience. The store should feel premium but approachable, with visual interest created through typography, imagery, composition, and whitespace rather than decoration.

## Visual principles

- Keep hierarchy clear and product information easy to scan.
- Use generous, intentional whitespace and strong editorial compositions.
- Let lifestyle and product photography lead; do not distort merchant images.
- Keep product cards clean and consistent, with imagery prominent and name/price readable.
- Use subtle borders and restrained decoration. Avoid generic boxed layouts and excessive shadows or rounded corners.
- Use asymmetry, split imagery, and alternating compositions selectively; do not repeat one editorial layout everywhere.

## Color

Use only the six approved roles and values in [the project overview](../00.project-overview.md). Apply them through the named tokens in [UI Tokens](08.ui-tokens.md). Ensure text and controls remain legible against each surface.

## Typography

Use clean, confident typography with a clear hierarchy for display, page headings, section headings, body copy, metadata, navigation, and controls. Keep font families and weights limited, body copy readable, and heading sizes responsive. Exact families and scale remain undecided; record approved values in UI Tokens.

## Spacing and layout

Use a consistent spacing scale and reusable content widths. Support readable content width, wide layouts, and full-width editorial sections. Product grids should have responsive columns, balanced gaps, and consistent image treatment. Exact widths, breakpoints, and spacing values remain undecided; record approved values in UI Tokens.

## Components

- **Buttons and links:** distinguish primary actions, secondary actions, text links, and icon-only controls. Provide default, hover, focus, active, disabled, and native loading states where applicable.
- **Forms:** use clear labels, comfortable sizing, visible focus, and legible native validation feedback. Style WooCommerce forms without changing their behavior.
- **Product cards:** show product imagery, name, price, sale price, and native product states. Any extra interaction needs an approved UI specification.
- **Header and navigation:** preserve the specified fixed composition across viewport sizes while allowing merchants to edit navigation content and structure.

## Interaction, responsive design, and accessibility

Use interaction only when it helps users understand state or complete a task. Keep motion subtle, avoid layout shifts and blocking transitions, and respect `prefers-reduced-motion`. Native WordPress/WooCommerce controls own functionality; theme enhancements are limited to visual/interface state.

Design and review mobile, tablet, and desktop presentations. Preserve keyboard access, semantic hierarchy, readable contrast, visible focus, and accessible names for icon-only controls. Do not rely on hover alone.

## Open design decisions

| Decision | Status |
|---|---|
| Font families and type scale | TBD |
| Spacing scale and content widths | TBD |
| Breakpoints and product grid columns | TBD |
| Button and form dimensions | TBD |
| Border radius, shadows, and motion values | TBD |
