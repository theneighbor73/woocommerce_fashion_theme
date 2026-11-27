# Agent Toolkit

This document lists tools and capabilities approved for use throughout the project, when to use them, and the permissions or limits that apply. These approvals are project-wide; they do not depend on which task introduced the tool.

- If an approved tool or capability fails, is unavailable, or returns an access error, report the tool and error to the owner so its setup or access can be resolved. Do not silently work around the failure by using a restricted path or an unapproved substitute.

## Browser research and design prototypes

- Inspect owner-provided inspiration URLs in the authorized Chrome browser at compact, medium, and expanded widths. Use DevTools to understand rendered dimensions, responsive behavior, and interactions where useful.
- Treat reference-site observations as research evidence, not Alice specifications. If no inspiration URLs are provided, research current UX conventions and relevant examples online; include links, concise findings, and why a pattern may suit Alice.
- Figma subscription or Figma MCP is not required or assumed available.
- Create directional sketches as lightweight HTML/CSS prototypes, wireframes, or diagrams. Use JavaScript only when needed to demonstrate a visual interaction. Use placeholder content or project-owner-provided assets from `/assets` only.
- Save review-only artifacts under `proposal-pg/<slice>/`, separating Phase 2 sketches by option and Phase 4 proposals from sketches. Do not treat proposal files as production theme code.
- No packaging exclusion for `proposal-pg/` is currently configured. Any future theme packaging process must explicitly exclude it.
- Keep proposal artifacts review-only and outside production theme code.

## Project media and icon assets

- Use only project-owner-provided assets, as supplied. Do not create, generate, draw, source, download, crop, resize, compress, convert, or otherwise edit media files.
- Use native blocks and CSS to control media presentation. If a required asset is missing, ask the owner to provide or approve it.
- Record supplied source and license details before shipping theme-bundled media. The current inventory is in [Media Asset Inventory](docs/media-assets.md).
- Use supplied SVG icons from `assets/svg/icons/`. If a needed icon is missing, request its slug and usage context; do not create or source artwork.

## Live-site browser inspection

- Review major completed UI slices by default. Review small changes only when requested. The owner authorized Chrome browser control and DevTools inspection at `http://localhost:8080/`; use the connected Chrome because that address resolves on the owner's machine.
- For an authorized review, use Chrome DevTools Protocol network events to verify resource request status/completion, then inspect visible behavior at relevant widths. Review network completion where appropriate for the task.
- Do not use TinyFish for live-site verification.
- The owner performs Site Editor usability, visual, and end-to-end review and gives final approval. The agent may provide manual review steps for WordPress behavior that cannot be verified by code checks.
- For checkout review, use a non-production payment gateway; do not run test purchases through a production gateway.

## WordPress runtime and WP-CLI

- Invoke WP-CLI through `wsl.exe` from the Docker Compose directory configured by `DOCKER_COMPILE_DIR` in the root `.env.local`. Use that directory only to reach the approved `wpcli` service. Docker command execution still requires approval for the specific command.
- Limit WP-CLI to targeted, theme-related checks and read-only database queries. Do not dump the database, query customer/order data, or make database, site-setting, or Docker configuration changes without separate authorization.
- Do not browse or edit the surrounding WordPress installation, Docker configuration, database files, or other plugins/themes. Do not request or store database credentials or inspect credential-bearing configuration files.
- If Redis prevents a read-only WP-CLI query from bootstrapping, the documented one-invocation workaround is `wp --exec='define("WP_REDIS_DISABLED", true);' <command>`. Do not change persistent Redis or WordPress settings as a workaround.
- The documented local CLI versions are environment details, not the project's minimum supported versions; use the compatibility baseline in the Project Overview for support decisions.

## Local PHP and debug diagnostics

- Run PHP lint on changed PHP files when relevant, using `PHP_EXECUTABLE` from the root `.env.local`. If the executable or check is unavailable or fails to launch, report that clearly.
- `.env.local` may contain non-secret, machine-specific tool paths. It is Git-ignored. Never put credentials there or inspect credential-bearing files.
- `debug.log` is available in this workspace root directory and granted read access for troubleshooting when relevant. Read only the excerpts needed for the task; do not expose secrets or personal data.

## Lint, build, accessibility, and performance tools

- Run relevant existing lint, build, and validation checks by default; report exactly what ran and the result. Do not create a new test suite without approval.
- Run existing lint, build, and validation commands when relevant; report which commands ran and their results. The project docs specify PHP lint setup but do not name the other exact commands.
- Review theme-authored UI against WCAG 2.2 AA and check for styling regressions in native WordPress/WooCommerce controls. Use broad accessibility and WordPress Theme Check passes at meaningful milestones or pre-release.
- No specific performance measurement tool is mandated. When measuring Core Web Vitals on the controlled reference store, record the host, catalog/media fixture, browser, and active plugins. Label lab measurements provisional when field data is unavailable.
- CI is deferred; do not assume a CI service or pipeline is available.

## Git and release

- Before running any Git status, diff, log, or other Git check through `wsl.exe`, ask the owner for permission for that specific check. This applies to read-only checks too.
- The owner performs final validation and pushes changes to Git manually.
