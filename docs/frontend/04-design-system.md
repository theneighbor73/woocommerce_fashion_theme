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

Use Cormorant Garamond for editorial display and Plus Jakarta Sans for body and interface text. Bundle free/open-licensed font files locally; verify and record each exact source and license before shipping. Use the approved scale and typography tokens in [UI Tokens](08.ui-tokens.md).

## Spacing and layout

Use the spacing scale, widths, breakpoints, and grid columns in [UI Tokens](08.ui-tokens.md). Support readable content width, wide layouts, and full-width editorial sections. Product grids should have balanced gaps and consistent image treatment.

## Components

- **Buttons and links:** distinguish primary actions, secondary actions, text links, and icon-only controls. Provide default, hover, focus, active, disabled, and native loading states where applicable.
- **Forms:** use clear labels, comfortable sizing, visible focus, and legible native validation feedback. Style WooCommerce forms without changing their behavior.
- **Product cards:** show product imagery, name, price, sale price, and native product states. Any extra interaction needs an approved UI specification.
- **Header and navigation:** preserve the specified fixed composition across viewport sizes while allowing merchants to edit navigation content and structure.

## Interaction, responsive design, and accessibility

Use interaction only when it helps users understand state or complete a task. Keep motion subtle, avoid layout shifts and blocking transitions, and respect `prefers-reduced-motion`. Native WordPress/WooCommerce controls own functionality; theme enhancements are limited to visual/interface state.

Target WCAG 2.2 Level AA for theme-authored UI. Design and review mobile, tablet, and desktop presentations; preserve keyboard access, semantic hierarchy, readable contrast, visible and unobscured focus, and accessible names for icon-only controls. Do not rely on hover alone. Review native WooCommerce controls for regressions caused by theme styling without claiming ownership of plugin markup.

## Header behavior

Use the same three equal columns at all widths: site logo aligned left, centered search, and the hamburger/navigation plus account and cart utilities aligned right. The header scrolls out of view while scrolling down and reappears while scrolling up on mobile and desktop. The hamburger opens a native navigation panel that slides in from the left, occupying about one third of the viewport with a minimum usable width and a `24rem` maximum. Keep the panel keyboard accessible and dismissible; honor reduced motion. At narrow widths, allow the search field to shrink while keeping its submit button and utility controls usable.

The header scrolls out of view while scrolling down and slides back into view while scrolling up. Any script may control only this visual show/hide state; the header and navigation remain usable without the enhancement.
