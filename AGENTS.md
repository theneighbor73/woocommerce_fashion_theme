# Agent Instructions

## Project-wide guidance

- Alice is a reusable WordPress Block Theme for WooCommerce fashion stores. The [Project Overview](docs/00.project-overview.md) is the source of truth for product purpose, approved scope, and visual direction.
- [Technical Constraints](docs/architecture/05.technical-constraints.md) is the source of truth for implementation boundaries, required WordPress/WooCommerce mechanisms, compatibility, and technical quality requirements.
- The [Agent Toolkit](toolkit.md) is the source of truth for approved tools, tool use, access, and approval limits. If a listed tool fails or is unavailable, report the tool and error to the owner.
- Follow the [Toolkit's media rules](toolkit.md#project-media-and-icon-assets) for asset use and the design system's [Icons](docs/frontend/design-system-reference.html#icons) guidance for icon use. Request owner-provided assets when something is missing.

## Find slice-specific guidance

- [Sitemap](docs/architecture/02-sitemap.md): pages, page relationships, and template mapping.
- [User Journeys](docs/frontend/03-user-journeys.md): customer goals and experience needs.
- [UI Registry](docs/frontend/09.ui-registry.md): slice-level UI specifications, editing requirements, and implementation status.
- [Design foundations](docs/frontend/design-system-reference.html) and [UI Tokens](docs/frontend/08.ui-tokens.md): visual rules and approved values. The HTML reference is the design-system source of truth; UI Tokens defines approved values.
- [Project Tracker](docs/07.project-tracker.md): implementation progress.
- [Media Asset Inventory](docs/media-assets.md): supplied media and source/license details.

For a task, read the project-wide sources that apply and the specific slice guidance relevant to the change. Do not read every slice document by default.

## Relevant authored skills

Read the applicable project skill before coding:

- [CSS](.agents/skills/css-writing/SKILL.md) for CSS changes.
- [JavaScript](.agents/skills/js-writing/SKILL.md) for JavaScript changes.
- [PHP and HTML](.agents/skills/php-html-writing/SKILL.md) for PHP, templates, patterns, and block markup.
- [WordPress asset versioning and cache busting](.agents/skills/wordpress-asset-versioning-cache-busting/SKILL.md) when adding or changing CSS/JavaScript assets or their PHP registrations.

Installed WordPress skills under `.agents/skills/` provide technical guidance. Project documentation is authoritative if a skill conflicts with an agreed project decision.

## Workflow

1. Read applicable project-wide and slice-specific sources, then inspect the implementation and relevant authored skills.
2. If requirements conflict or are unclear, stop and ask the project owner.
3. Before UI implementation, create or confirm its specification in the UI Registry.
4. Propose and implement the smallest change that meets the approved specification and Technical Constraints.
5. Run relevant existing checks by default. For behavior requiring WordPress, provide manual review steps. Do not create a new test suite without approval.
6. Update the Project Tracker when implementation progress changes.
7. Report changes, verification, incomplete work, and deviations.

## Tool permissions

Follow the [Agent Toolkit](toolkit.md) for tool availability, invocation, approval, Git-check, and live-review rules.
