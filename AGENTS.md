# Agent Instructions

## Project boundary

Alice is a WordPress Block Theme for WooCommerce stores. It is a presentation layer: use WordPress and WooCommerce for data, commerce, and business behavior. Do not add custom blocks, business logic, persistent data, or external services.

Use native WordPress and WooCommerce blocks and templates, template parts, patterns, `theme.json`, CSS, and narrowly scoped Interactivity API enhancements for progressive visual interactions (for example, navigation state). Shopping behavior remains native to WordPress/WooCommerce.

## Reusable merchant components

Treat portability as a design principle. Build reusable merchant-facing page sections from native blocks and expose them as inserter patterns so merchants can add and edit independent copies in other pages or content. Use template parts for recurring site structure such as the shared header and footer. Reuse the same pattern in templates where it is the source composition; do not duplicate block markup or create custom blocks just to package a component.

If a requirement cannot be met within that boundary, stop and present the native fallback and any existing-plugin option. The project owner decides whether to use a fallback, defer the work, or record it in [the Custom Block Consideration List](docs/consideration-list.md). Do not implement a custom block or install a plugin without that decision.

## Media assets

Act only as the theme developer. Do not create, generate, draw, source, or download media assets, including images, illustrations, icons, logos, audio, video, or fonts. Do not create SVG artwork or use image-generation tools. Use project-owner-provided assets as supplied; do not crop, resize, compress, convert, or otherwise edit the media files. CSS may control display size, positioning, and cropping. Prefer visuals rendered by native WordPress/WooCommerce blocks and text labels over theme-authored icon artwork. If a required asset is missing, stop and ask the project owner to provide or approve it. Record source and license details supplied by the owner before shipping media.

## Read the relevant source of truth

- [Project overview](docs/00.project-overview.md): scope, product decisions, and palette.
- [Sitemap](docs/architecture/02-sitemap.md): pages and templates.
- [User journeys](docs/frontend/03-user-journeys.md): customer goals.
- [Design foundations](docs/frontend/design-system-reference.html) and [UI tokens](docs/frontend/08.ui-tokens.md): visual rules and approved values. The HTML reference is the design-system source of truth; the UI Tokens document defines approved values.
- [Technical architecture](docs/architecture/05.technical-architecture.md): WordPress implementation boundaries.
- [UI registry](docs/frontend/09.ui-registry.md): UI specifications and status.
- [Project tracker](docs/07.project-tracker.md): implementation progress.
- [Agent toolkit](toolkit.md): project-approved tools, workflows, and access limits.

### Design-system section map

- Follow the separate [Visual direction](docs/frontend/design-system-reference.html#visual-direction), [Icons](docs/frontend/design-system-reference.html#icons), [Interaction](docs/frontend/design-system-reference.html#interaction), and [Component states](docs/frontend/design-system-reference.html#component-states) sections in the HTML design-system source of truth.
- Use supplied SVG icons from `assets/svg/icons/` for compact, unambiguous affordances; preserve visible text or an accessible name. Prefer `currentColor` strokes. Existing `light/` and `dark/` assets are context variants, not a requirement to hard-code those strokes.
- If a design specification needs an icon slug that is not present, request the slug and usage context from the project owner before implementation. Do not create or source icon artwork.
- Desktop hover may add feedback but cannot be the sole way to discover controls or information. Mobile has no hover; ordinary links/buttons activate on the first tap. For expandable parent navigation, follow the documented first-tap expansion, subsequent toggle, and double-tap parent navigation model while preserving clear accessible names and keyboard operation.
- Apply the shared state guidance and visual examples in `docs/frontend/design-system-reference.html` to buttons, variation selectors, and inputs. Retain native WordPress/WooCommerce semantics and behavior; do not add interaction or commerce logic for documentation or styling.

Read the relevant authored skill before coding:

- [CSS](.agents/skills/css-writing/SKILL.md)
- [JavaScript](.agents/skills/js-writing/SKILL.md)
- [PHP and HTML](.agents/skills/php-html-writing/SKILL.md)
- [WordPress asset versioning and cache busting](.agents/skills/wordpress-asset-versioning-cache-busting/SKILL.md): read when adding or changing CSS/JavaScript assets or their PHP registrations.

Installed WordPress skills under `.agents/skills/` provide technical guidance. Project documentation is authoritative if a skill recommendation conflicts with the agreed project boundary.

## Workflow

1. Read relevant documentation and inspect the existing implementation.
2. If requirements conflict or are unclear, stop and ask the project owner.
3. Before UI implementation, create or confirm its specification in `docs/frontend/09.ui-registry.md`.
4. Propose the smallest native presentation change, then implement it.
5. Keep edits limited to the task. Run relevant existing lint, build, and validation checks by default; provide manual browser/editor review steps for behavior that needs the WordPress environment. Do not create a new test suite without approval.
6. Update `docs/07.project-tracker.md` when implementation progress changes.
7. Report changes, how they work, verification, incomplete work, and deviations.

## Tool permissions

Follow [the Agent Toolkit](toolkit.md) for tool availability, usage, approval, Git-check, and live-review rules.

