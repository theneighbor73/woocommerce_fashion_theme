# Agent Design Workflow

This is the operational workflow for researching, proposing, and implementing Alice theme UI. It consolidates the ways-of-working decisions discussed by the project owner and agent. The project boundary and technical/design source documents remain authoritative. If a workflow step conflicts with them, stop at the conflict and present a compliant option for the owner.

## 1. Understand the slice

1. Identify the page/template group and customer goal. Use the slice roadmap below as a planning guide, not a fixed release schedule.
2. Read relevant source documents: project overview, sitemap, customer journeys, technical architecture, UI Registry, design-system reference, and UI tokens. Inspect the current implementation and relevant authored skills before coding.
3. Confirm the UI Registry entry is `SPECIFIED` before implementation. If a material requirement is unresolved, resolve it in the design process first.
4. Identify merchant-editable content, likely reusable sections, template-part needs, native WordPress/WooCommerce behavior, responsive requirements, accessibility states, and relevant empty/error/availability states.

## 2. Research and sketch options

1. The owner may provide three to five inspiration URLs. Inspect their rendered pages in the authorized Chrome browser at selected compact, medium, and expanded viewport examples. Use DevTools to inspect rendered dimensions and responsive behavior where useful. A Figma subscription or Figma MCP is not required.
2. Treat observations and measurements from reference sites as research evidence only. Do not copy their layout dimensions into Alice's implementation specifications.
3. If no inspiration URLs are provided, research current UX conventions and relevant examples online. Include direct links, concise observations, and why each pattern may suit Alice.
4. Keep recommendations inside the theme boundary. If a useful reference pattern exceeds it, report it only and explain the native fallback and any suitable existing-plugin option. The owner decides whether the pattern's essence remains in the final visual direction. Discard options requiring custom blocks, creating plugins, or prohibited business behavior.
5. Produce one to three rough options as lightweight HTML/CSS prototypes, wireframes, or diagrams. Explain hierarchy, composition, and notable interactions. These are directional estimates, not final build specs. Use placeholder content and project-owner-provided media only. Do not create, generate, source, download, or edit media.
6. Present options for owner selection or combination before detailed specification when the layout is major or distinctive.

## 3. Derive Alice specifications

After a direction is selected, define the actual layout from Alice's design system, not from the inspiration site's dimensions. For each page/slice, specify as applicable:

- Viewport examples and compact/medium/expanded layout behavior.
- Content max width, horizontal margins/padding, column count, grid/flex gutters, and component gaps.
- Section dimensions and vertical rhythm; sidebar/content proportions where applicable.
- Typography roles and hierarchy using approved type tokens.
- Responsive breakpoints and content-driven transitions.
- Component composition, treatment of approved media, and important interaction/component states.
- Semantic structure, keyboard/focus behavior, target sizing, contrast, reduced motion, and relevant empty/error/loading states.
- Editing and locking expectations; which compositions should be inserter patterns versus template parts.

For each significant value or decision, identify whether it is an existing design-system value, a direct application of a rule, or an estimate requiring a new foundation. If the design system lacks a needed foundation, present the proposed addition and get owner review before implementation. If it already supports the design, proceed independently. Keep the UI Registry aligned with the agreed specification. Selecting a rough direction is not itself approval to implement a major layout: present its quantitative specifications and responsive visual proposal for review first.

## 4. Visual proposal, approval, and implementation

1. Create a responsive proposal for compact/mobile, medium/tablet, and expanded/desktop contexts, including component composition and important interaction states.
2. Validate the proposal against the written quantitative specifications and correct mismatches before presenting it.
3. For major or distinctive layouts, present the specs and proposal for owner approval. Examples include the homepage, catalog family, product detail, and single blog post. For simple, system-supported templates (such as a functional 404 page or basic standard content page), skip separate design approval and implement directly.
4. Implement the smallest native presentation change that meets the agreed design. Track reusable section candidates during the visual pass, including intended contexts. Keep merchant-facing compositions independently editable as native patterns and use template parts for shared site structure. Reuse source patterns in templates rather than duplicating markup.
5. If a requirement cannot be met within the project boundary, stop that implementation path and present a native fallback plus an existing-plugin option when suitable. Do not create/install plugins or implement custom blocks without a separate owner decision. Custom recreations of out-of-boundary features are discarded.
6. Raise only genuine ambiguity, missing owner-provided assets, technical-boundary conflicts, unsupported design-system decisions, or consequential choices needing owner direction.

## 5. Planned UI slice order

Plan major slices ahead so the owner can prepare inspiration URLs, then adjust order as dependencies and customer journeys warrant. The roadmap does not require specifying the entire site in advance; work in connected slices so shared layouts and patterns are checked across related templates.

1. **Homepage completion** — remaining product/editorial sections around the existing hero.
2. **Catalog and Search** — shop, product category, product tag, and product search results; share product-grid/card foundations where appropriate.
3. **Product Detail** — its own slice.
4. **Cart and Checkout** — connected flow; retain supported WooCommerce block and classic shortcode modes.
5. **Account** — customer account page and endpoints.
6. **Blog Archive** — posts index and blog category/archive.
7. **Single Blog Post** — its own slice, separate from the archive.
8. **Standard Pages** — ordinary merchant-authored WordPress Pages such as About, Contact, Shipping Information, and Returns Policy. Give any page its own slice if it needs a distinctive composition.
9. **404** — simple, functional, and based on the existing design system unless a material gap emerges.

The shared header and footer are established. Recheck them in context during relevant work; they are not new slices unless they need substantive redesign.

## 6. Review and verification responsibilities

- The agent owns research, design proposals, implementation, and technical verification within approved constraints.
- After completing a major UI page/slice, the agent is authorized to review frontend behavior in the owner's Chrome/CDP browser without per-run approval. Use `http://localhost:8080/`; inspect resource request completion through DevTools where appropriate and visible behavior at relevant widths. Do not run this expensive end-to-end review routinely for small components or refactors.
- The owner checks block/pattern editing and usability in the WordPress Site Editor, performs final validation, and pushes changes to Git manually.
- Run relevant existing lint, build, and validation checks for implementation work; report exactly what ran and the result. Do not create a new test suite without approval. Run PHP lint on changed PHP files when relevant using the local `PHP_EXECUTABLE` value. If the executable/check is unavailable, report that and ask for a corrected path or setting.
- Use lightweight checks during development; reserve broad accessibility and WordPress Theme Check passes for meaningful milestones or pre-release. CI is deferred for future consideration.
- Follow the repository's authorization requirements before running Git checks through WSL.
- Update the UI Registry for UI specification/implementation changes and the Project Tracker when progress changes. The planned major documentation refactor is separate future work.

## 7. Project boundaries and sources of truth

- Alice is a presentation-only WordPress/WooCommerce block theme. Use native blocks, templates, template parts, patterns, `theme.json`, CSS, and narrowly scoped Interactivity API enhancements for progressive visual interactions. WordPress/WooCommerce own data, commerce, and business behavior.
- Do not add custom blocks, business logic, persistent data, external services, or plugins. If a requirement falls outside scope, offer native and existing-plugin options for the owner's decision.
- Follow the media policy: use only project-owner-provided assets as supplied. Do not create, generate, source, download, crop, resize, compress, convert, or otherwise edit media. Ask the owner to provide a missing required asset.
- Treat `docs/frontend/design-system-reference.html` as the visual design-system source of truth and `docs/frontend/09.ui-registry.md` as the source of truth for UI specifications and status. Consult other project sources and skills identified in `AGENTS.md` for each task.
