# Agent Design Workflow

This is the operational workflow for researching, proposing, and implementing Alice theme UI. The project boundary and technical/design source documents remain authoritative. General principles and constraints are grouped separately from the phases and slice roadmap below.

## Workflow phases

### Phase 1 — Orient to the UI slice

1. Identify the page/template group and customer goal. Use the roadmap below to plan future slices, but detail only the slice that is next.
2. Read relevant sources: project overview, sitemap, customer journeys, technical architecture, UI Registry, design-system reference, and UI tokens. Inspect the current implementation and relevant authored skills before coding.
3. Review the current UI Registry status and identify merchant-editable content, reusable-section candidates, template-part needs, native WordPress/WooCommerce behavior, responsive requirements, accessibility states, and relevant empty/error/availability states.
4. Do not implement an item while its UI Registry status is `SPECIFICATION_PENDING`.

### Phase 2 — Research and sketch options

1. The owner may provide three to five inspiration URLs. Inspect their rendered pages in the authorized Chrome browser at representative compact, medium, and expanded widths. Use DevTools to inspect rendered dimensions, responsive behavior, and interactions where useful. Figma subscription or Figma MCP is not required.
2. Treat observations and measurements from reference sites as research evidence only; do not use their dimensions as Alice's implementation specifications.
3. If inspiration URLs are not provided, research current UX conventions and relevant examples online. Include links, concise findings, and why a pattern may suit Alice.
4. Every proposed layout option must already comply with the project overview, sitemap, customer journeys, technical architecture, UI Registry, design-system reference, UI tokens, media policy, and owner instructions. Treat inclusion in a proposal as confirmation that it fits Alice's requirements and constraints. If the foundation for a decision is missing, flag it for discussion before presenting that layout as implementation-ready. Research-only patterns outside the boundary may be mentioned with a compliant fallback, but do not prototype them as candidate implementations.
5. Present one to three rough layout options as lightweight HTML/CSS prototypes, wireframes, or diagrams. Explain hierarchy, composition, and notable interactions. These are directional estimates, not final specifications. Use placeholder content or project-owner-provided assets from `/assets` only.
6. Save Phase 2 sketch artifacts under `proposal-pg/<slice>/phase-2-sketches/`, with one subdirectory per option (for example, `option-a/`). Keep these files review-only, outside production theme code. Any future theme packaging process must explicitly exclude `proposal-pg/`; no packaging exclusion mechanism is currently configured in this repository.
7. For major or distinctive layouts, show options for owner selection or combination before detailed specification. Simple, system-supported templates such as a functional 404 can proceed directly to implementation without separate design approval; the owner's final validation still applies.
8. For each slice, ask the owner for any useful inputs not already available: inspiration URLs, the desired customer outcome, required content or sections, and relevant project-provided assets. The owner may provide assets as each slice begins.

### Phase 3 — Derive quantitative specifications

After a direction is selected, derive Alice's actual layout from the design system, not from inspiration-site dimensions. Specify as applicable:

- Viewport examples and compact/medium/expanded behavior.
- Content max width, container margins/padding, grid columns/gutters, and component gaps.
- Section dimensions and rhythm; sidebar/content proportions where relevant.
- Typography hierarchy using approved type tokens.
- Responsive breakpoints and content-driven layout transitions.
- Component composition, media treatment using approved assets, and interaction/component states.
- Semantic structure, keyboard/focus behavior, target sizing, contrast, reduced motion, and relevant empty/error/loading states.
- Editing/locking requirements and whether compositions belong in inserter patterns or template parts.

For each significant decision, indicate whether it is defined by an existing token/rule, directly derived from a rule, or needs a new design-system foundation. If the existing design system already supports the decision, proceed independently. If a necessary foundation is missing, present the specific proposed addition for owner review before implementation.

### Phase 4 — Record specifications and propose the responsive UI

1. Write the derived specifications into the relevant UI Registry entry and set it to `SPECIFIED`. This Registry entry is the specification for the visual proposal and the implementation handoff.
2. Create a refined, responsive prototype using HTML and CSS, with JavaScript only when needed to demonstrate a visual interaction. Save it separately under `proposal-pg/<slice>/phase-4-proposal/`; do not overwrite the Phase 2 sketches. Identify which selected or combined sketch informed the refined proposal.
3. Show compact/mobile, medium/tablet, and expanded/desktop contexts, component composition, and important interaction states. Validate the prototype against the quantitative Registry specifications and resolve mismatches before presenting it.
4. For major or distinctive layouts—including the homepage, catalog family, product detail, and single blog post—present the Registry specs and proposal for owner approval before implementation. For simple templates already supported by the design system, such as a basic standard content page or functional 404, a separate design approval is not required.

### Phase 5 — Implement and maintain the specification

1. Begin implementation only when the Registry entry is `SPECIFIED`. At the moment implementation starts, set its status to `IN_PROGRESS`. For major layouts, first obtain approval of the visual proposal; for straightforward system-supported layouts, proceed after specification.
2. Implement the smallest native presentation change that meets the agreed design. Track reusable section candidates and intended contexts. Keep merchant-facing compositions independently editable as native patterns, use template parts for recurring site structure, and reuse source patterns in templates rather than duplicating markup.
3. If implementation or owner feedback changes the planned specifications, update the UI Registry to match the revised design. Present consequential changes for owner review; do not silently diverge from an approved major layout.
4. If a requirement cannot be met within the project boundary, stop that implementation path and present a native fallback plus a suitable existing-plugin option when available. Do not create/install plugins or implement custom blocks without a separate owner decision. Discard custom recreations of out-of-boundary features.

### Phase 6 — Verify and hand off

1. Run relevant existing lint, build, and validation checks. Report exactly what ran and the result. Do not create a new test suite without approval. Run PHP lint on changed PHP files when relevant, using `PHP_EXECUTABLE` from the local `.env.local`; if the executable/check is unavailable or fails to launch, report that clearly.
2. Once code is complete and applicable code checks pass, set the Registry status to `IMPLEMENTED`.
3. After a major UI page/slice is complete, use the already authorized Chrome/CDP browser at `http://localhost:8080/` to inspect network request completion where appropriate and visible frontend behavior at relevant widths. This review is not routine for small components or refactors.
4. The owner checks block/pattern editing and usability in the WordPress Site Editor and gives final approval. After the required reviews pass and the owner approves, set the Registry status to `ESTABLISHED`.
5. The owner performs any final validation and pushes changes to Git manually. Follow repository authorization rules before running Git checks through WSL.
6. Update the Project Tracker when implementation progress changes. Reserve broad accessibility and WordPress Theme Check passes for meaningful milestones or pre-release. CI is deferred for future consideration.

## Planned UI slice order

Plan major slices ahead so the owner can prepare inspiration URLs. Work in connected slices so shared layouts and patterns can be evaluated across related templates, reducing isolated page decisions, inconsistent treatments, and expensive retrofits. Planning the roadmap does not mean fully specifying the site up front; detail each slice when it becomes next, and adjust order for dependencies or customer journeys.

1. **Homepage completion** — remaining product/editorial sections around the existing hero.
2. **Catalog and Search** — shop, product category, product tag, and product search results; share product-grid/card foundations where appropriate.
3. **Product Detail** — its own slice.
4. **Cart and Checkout** — connected flow; retain supported WooCommerce block and classic shortcode modes.
5. **Account** — customer account page and endpoints.
6. **Blog Archive** — posts index and blog category/archive.
7. **Single Blog Post** — its own slice, separate from the archive.
8. **Standard Pages** — ordinary merchant-authored WordPress Pages such as About, Contact, Shipping Information, and Returns Policy. Give a page its own slice if it needs a distinctive composition.
9. **404** — simple and functional, based on the existing design system unless a material gap emerges.

The shared header and footer are established. Recheck them in context during relevant reviews; treat them as separate slices only if they need substantive redesign.

## General guardrails and principles

- **Alice's boundary:** This is a presentation-only WordPress/WooCommerce block theme. Use native blocks, templates, template parts, patterns, `theme.json`, CSS, and narrowly scoped Interactivity API enhancements for progressive visual interactions. WordPress/WooCommerce own data, commerce, and business behavior.
- **No out-of-scope implementation:** Do not add custom blocks, business logic, persistent data, external services, or plugins. Research patterns beyond the boundary as findings only. Explain a native fallback and a suitable existing-plugin option when one exists; the owner decides whether to preserve the pattern's essence in the final direction. Discard options requiring custom blocks/plugins or prohibited behavior.
- **Reusable merchant UI:** Treat portability as a design principle. Use inserter patterns for reusable merchant-facing compositions that produce independent editable copies. Use template parts for recurring site structure. Do not duplicate pattern markup when the pattern is the source composition.
- **Media:** Use only project-owner-provided assets as supplied. Do not create, generate, source, download, crop, resize, compress, convert, or otherwise edit media. Ask the owner to provide a missing required asset.
- **Sources of truth:** `docs/frontend/design-system-reference.html` is the visual design-system source; `docs/frontend/09.ui-registry.md` is the source for UI specifications and status. Consult the other project documents and skills named in `AGENTS.md` for each task.
- **Local PHP configuration:** `.env.local` may contain non-secret, machine-specific tool paths such as `PHP_EXECUTABLE`; it is Git-ignored. Never put credentials there or inspect credential-bearing files.
- **Owner and agent roles:** The agent carries research through implementation and technical verification within approved constraints. The owner provides design direction where requested, validates in the Site Editor and final review, and pushes manually. The planned major documentation refactor is separate future work.
