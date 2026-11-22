# Responsive Layout

Apply Material 3’s adaptive intent to web layouts. Reflow content when the available space or content requires it; do not translate Android window-size classes or foldable-device guidance literally into CSS breakpoints.

## Layout rules

- Use the project’s approved layout values and page specifications as the starting point. If a redesign changes those decisions, update the relevant project documentation before implementation.
- Keep reading measure and product content constrained on wide screens. Let grids gain columns as space allows without stretching controls or text across the full viewport.
- Prefer flexible CSS layout and content-driven breakpoints. Use container queries when a component’s available width matters more than the viewport.
- Keep layouts usable at narrow widths, zoomed text sizes, and intermediate widths; avoid horizontal overflow and clipped controls.
- Preserve a clear hierarchy across product grids, forms, editorial sections, and account or commerce content. Do not impose mobile-app navigation patterns on the storefront.

## Web examples

Use project breakpoints when a layout change is needed, and use `minmax()`/`auto-fit` for content that can adapt without a breakpoint:

```css
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(min(100%, 14rem), 1fr));
  gap: var(--space-md);
}

.page-content {
  width: min(calc(100% - var(--layout-gutter) - var(--layout-gutter)), var(--layout-wide-max));
  margin-inline: auto;
}
```

When a specific composition must change, use the project’s named breakpoint rather than importing a Material `dp` value:

```css
.editorial-split {
  display: grid;
  gap: var(--space-lg);
}

@media (min-width: 64rem) {
  .editorial-split {
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    align-items: center;
  }
}
```

The values are examples of CSS mechanics, not new approved breakpoint or width tokens. Prefer the current values in `docs/frontend/08.ui-tokens.md` and page-specific UI Registry entries.

## Editor and accessibility

- Keep the Site Editor presentation close to the published page so merchants can understand and customize the result.
- Test responsive behavior at the theme’s supported breakpoints and at widths between them. Check keyboard focus, text wrapping, and control visibility as layouts reflow.
- Keep interactive controls operable and visible at all supported widths. Do not rely on hover or motion to reveal essential information.
