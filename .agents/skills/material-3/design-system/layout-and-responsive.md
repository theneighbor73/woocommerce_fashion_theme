# Responsive Layout

Apply Material 3’s compact, medium, and expanded width classes to Alice’s web layouts. The canonical web thresholds are 600px and 840px, aligned to Material width classes; treat device types as examples rather than detection targets. See [UI Tokens](../../../../docs/frontend/08.ui-tokens.md#spacing-and-layout) for the approved values.

## Layout rules

- Use a 4/8/12-column grid at compact (`<600px`), medium (`600–839px`), and expanded (`≥840px`) widths, with the approved 16/24/32px margins and gutters. Keep the prose measure independent of the grid and cap the expanded container at 85rem.
- Build layout containers with intrinsic sizing and let content reflow between class thresholds. Use container queries when a component’s available width matters more than the viewport; do not introduce additional named density modes.
- At 320px, page-level horizontal overflow is zero. Isolate necessary wide data or pill strips in a horizontal scroller. Set flexible children to shrink, wrap labels/actions, and fit media to their containers.
- Make an intentional horizontal scroller keyboard accessible, give it a clear accessible name, and retain visible focus; the rest of the page still scrolls vertically without overflow.
- Do not set fixed pixel widths on layout containers. Prefer `minmax(min(100%, …), 1fr)`, `min(100%, …)`, `flex-wrap`, and `min-width: 0` where needed.
- Keep section rhythm at least twice internal component spacing, container padding at least as large as its internal gap, and controls at least 44px square. Align card footers/actions across each grid row without fixed card heights.
- Use the shared safe-area insets and z-index roles for the top bar, toast region, fixed/temporary panes, and full-bleed sections. Compact panes are temporary; do not add bottom navigation or a navigation rail.
- Keep sticky top bars within the compact/short-landscape cap at 200% text zoom. The bar must not clip its contents or prevent access to the page viewport.
- Keep standard templates/components within the grid. Permit full-bleed merchandising only with grid-aligned inner copy/actions; bespoke spatial properties belong only to one-off editorial compositions.
- Use either a container border or internal dividers for a grouping, not both. Whitespace or a tonal surface shift may replace either treatment; reserve exceptions for genuinely dense structures with distinct boundaries.
- Preserve hierarchy across product grids, forms, editorial sections, and account or commerce content. Do not impose bottom navigation or navigation rail patterns on the storefront.

## Web examples

Use project breakpoints when a layout change is needed, and use `minmax()`/`auto-fit` for content that can adapt without a breakpoint:

```css
:root {
  --md-sys-layout-margin: var(--md-sys-layout-margin-compact);
  --md-sys-layout-gutter: var(--md-sys-layout-gutter-compact);
  --md-sys-space-section-y: var(--md-sys-space-section-y-compact);
}

@media (min-width: 600px) {
  :root {
    --md-sys-layout-margin: var(--md-sys-layout-margin-medium);
    --md-sys-layout-gutter: var(--md-sys-layout-gutter-medium);
    --md-sys-space-section-y: var(--md-sys-space-section-y-medium);
  }
}

@media (min-width: 840px) {
  :root {
    --md-sys-layout-margin: var(--md-sys-layout-margin-expanded);
    --md-sys-layout-gutter: var(--md-sys-layout-gutter-expanded);
    --md-sys-space-section-y: var(--md-sys-space-section-y-expanded);
  }
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(min(100%, 14rem), 1fr));
  gap: var(--md-sys-layout-gutter);
}

.page-content {
  width: min(calc(100% - 2 * var(--md-sys-layout-margin)), var(--md-sys-layout-container-max));
  margin-left: auto;
  margin-right: auto;
  min-width: 0;
}
```

Use the approved named breakpoint for a class transition. This split spans half of the 4/8/12-column ruler at each class; the full-width child layout must still reflow at narrow and intermediate widths:

```css
.editorial-split {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: var(--md-sys-space-lg);
}

.editorial-split > * { grid-column: 1 / -1; }

@media (min-width: 600px) {
  .editorial-split {
    grid-template-columns: repeat(8, minmax(0, 1fr));
    align-items: center;
  }

  .editorial-split > * { grid-column: span 4; }
}

@media (min-width: 840px) {
  .editorial-split {
    grid-template-columns: repeat(12, minmax(0, 1fr));
  }

  .editorial-split > * { grid-column: span 6; }
}
```

The examples illustrate mechanics; use the complete token values and page-specific UI Registry requirements. Do not use logical properties or add RTL mirroring for this LTR theme.

## Editor and accessibility

- Keep the Site Editor presentation close to the published page so merchants can understand and customize the result.
- Review at 320px, immediately below/at/above 600px and 840px, and at wide widths. Check 200% text zoom and short landscape, including unobscured access to content under the sticky header.
- Confirm zero page-level horizontal overflow at 320px, isolated scroller behavior, touch target size, wrapping, and focus visibility.
- Keep interactive controls operable and visible at all supported widths. Do not rely on hover or motion to reveal essential information.
