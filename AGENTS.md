# Agent Instructions

## Project boundary

Alice is a WordPress Block Theme for WooCommerce stores. It is a presentation layer: use WordPress and WooCommerce for data, commerce, and business behavior. Do not add custom blocks, business logic, persistent data, or external services.

Use native WordPress and WooCommerce blocks and templates, template parts, patterns, `theme.json`, CSS, and narrowly scoped Interactivity API enhancements for progressive visual interactions (for example, navigation state). Shopping behavior remains native to WordPress/WooCommerce.

If a requirement cannot be met within that boundary, stop and present the native fallback and any existing-plugin option. The project owner decides whether to use a fallback, defer the work, or record it in [the Custom Block Consideration List](docs/consideration-list.md). Do not implement a custom block or install a plugin without that decision.

## Media assets

Act only as the theme developer. Do not create, generate, draw, source, or download media assets, including images, illustrations, icons, logos, audio, video, or fonts. Do not create SVG artwork or use image-generation tools. Use project-owner-provided assets as supplied; do not crop, resize, compress, convert, or otherwise edit the media files. CSS may control display size, positioning, and cropping. Prefer visuals rendered by native WordPress/WooCommerce blocks and text labels over theme-authored icon artwork. If a required asset is missing, stop and ask the project owner to provide or approve it. Record source and license details supplied by the owner before shipping media.

## Read the relevant source of truth

- [Project overview](docs/00.project-overview.md): scope, product decisions, and palette.
- [Sitemap](docs/architecture/02-sitemap.md): pages and templates.
- [User journeys](docs/frontend/03-user-journeys.md): customer goals.
- [Design system](docs/frontend/04-design-system.md) and [UI tokens](docs/frontend/08.ui-tokens.md): visual rules and approved values.
- [Technical architecture](docs/architecture/05.technical-architecture.md): WordPress implementation boundaries.
- [UI registry](docs/frontend/09.ui-registry.md): UI specifications and status.
- [Project tracker](docs/07.project-tracker.md): implementation progress.

Read the relevant authored skill before coding:

- [CSS](.agents/skills/css-writing/SKILL.md)
- [JavaScript](.agents/skills/js-writing/SKILL.md)
- [PHP and HTML](.agents/skills/php-html-writing/SKILL.md)

Installed WordPress skills under `.agents/skills/` provide technical guidance. Project documentation is authoritative if a skill recommendation conflicts with the agreed project boundary.

## Workflow

1. Read relevant documentation and inspect the existing implementation.
2. If requirements conflict or are unclear, stop and ask the project owner.
3. Before UI implementation, create or confirm its specification in `docs/frontend/09.ui-registry.md`.
4. Propose the smallest native presentation change, then implement it.
5. Keep edits limited to the task. Run relevant existing lint, build, and validation checks by default; provide manual browser/editor review steps for behavior that needs the WordPress environment. Do not create a new test suite without approval.
6. Update `docs/07.project-tracker.md` when implementation progress changes.
7. Report changes, how they work, verification, incomplete work, and deviations.

## Live review

Run live review when requested only.

The project owner authorized Chrome browser control and DevTools inspection for live testing. Use the connected Chrome browser at <http://localhost:8080/>; this resolves on the owner's machine, unlike a remote browser. Use Chrome DevTools Protocol network events to verify resource request status/completion, then inspect visible behavior in the page. Do not use TinyFish for live-site verification.
