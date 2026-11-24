# Native Components and Patterns

Use Material 3 to guide visual hierarchy and state styling. Build with the native WordPress and WooCommerce blocks already responsible for structure and commerce behavior; do not import Material components or create custom blocks.

## Reuse

- Package reusable merchant-facing page sections as inserter patterns made from native blocks. Keep each inserted copy independently editable.
- Use template parts for recurring site structure such as the shared header and footer. Compose templates from the same registered patterns when the pattern is the source composition.
- Keep product, cart, checkout, account, and form behavior native to WordPress or WooCommerce. CSS may refine presentation but must not introduce new business behavior.

## Styling and states

- Use project semantic color, type, spacing, shape, and motion tokens. Apply the same visual rules in the frontend and Site Editor where practical.
- Keep standardized components within the class grid and margin rulers; use intrinsic sizing and wrapping at all widths. Keep container padding at least as large as the internal gap, targets at least 44px square, and card actions aligned across grid rows without fixed card heights.
- Choose one grouping treatment per component: outer border, internal dividers, tonal shift, or whitespace. A dense checkout/order summary may combine boundaries only when each serves a distinct structural purpose.
- Preserve native semantics, accessible names, keyboard operation, and focus behavior. Keep a visible, sufficiently contrasting focus indicator.
- Style only states that the underlying component supports: default, hover, focus, active/pressed, disabled, selected, validation, or loading as applicable.
- Keep foreground and surface pairings legible in every state. Do not rely on color alone to convey status, selection, availability, or errors.
- Respect reduced-motion preferences and do not create interactions that imitate app-only Material components when a native block already provides the needed behavior.

## CSS example: native button block

Style the block’s existing link and states instead of replacing it with a Material Web element:

```css
.wp-block-button__link {
  min-height: var(--control-height-base);
  padding-left: var(--button-padding-x);
  padding-right: var(--button-padding-x);
  border: var(--border-width-thin) solid var(--color-action-primary);
  border-radius: var(--radius-none);
  background: var(--color-action-primary);
  color: var(--color-text-inverse);
}

.wp-block-button__link:hover,
.wp-block-button__link:active {
  background: var(--color-action-primary-hover);
  border-color: var(--color-action-primary-hover);
  color: var(--color-action-primary);
}

.wp-block-button__link:focus-visible {
  outline: 2px solid var(--color-focus-ring);
  outline-offset: 3px;
}
```

This is a styling pattern only. Keep the block’s native link destination, keyboard operation, and semantics. Apply state selectors only where the project’s component specification calls for them.

## Pattern composition example

```html
<!-- wp:group {"className":"editorial-feature"} -->
<div class="wp-block-group editorial-feature">
  <!-- wp:heading {"level":2} -->
  <h2 class="wp-block-heading">Collection title</h2>
  <!-- /wp:heading -->
  <!-- wp:paragraph -->
  <p>Merchant-editable supporting copy.</p>
  <!-- /wp:paragraph -->
  <!-- wp:buttons -->
  <div class="wp-block-buttons">
    <!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link" href="/shop/">Explore collection</a></div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
```

Register reusable sections as patterns so merchants can insert and edit copies. Use actual links and native product blocks in implementation; this markup illustrates composition, not a custom block or commerce action.
