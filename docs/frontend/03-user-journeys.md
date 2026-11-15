# User Journeys

These journeys describe customer goals and the presentation needed to support them. WordPress and WooCommerce provide the underlying behavior; the theme must not recreate it.

## Primary journeys

| Journey | Typical path | Presentation needs |
|---|---|---|
| Discover the store | Home → editorial/collection content → shop or product | Clear brand identity, prominent imagery, understandable navigation and calls to action |
| Browse products | Shop/category → product grid → product detail | Readable product names and prices, consistent images, responsive grid, native search/filter controls where available |
| Find a product | Search or category → results → product detail | Search easy to find, native sorting/filter states clear, useful empty-result feedback |
| Evaluate a product | Product detail → inspect images and details → choose available variation/quantity → add to cart | Product information and price visible, native variation/quantity controls clear, WooCommerce feedback and validation visible |
| Purchase | Cart → checkout → order confirmation | Cart contents and totals readable; native checkout fields, payment/shipping choices, validation, processing, and confirmation remain usable |
| Return as a customer | My Account → sign in → dashboard, orders, addresses, or account details | Native account navigation and forms remain clear and accessible |
| Read editorial content | Blog/archive → article → relevant product | Readable article layout and photography; product links should feel relevant and unobtrusive |

## Shared experience requirements

- Keep navigation, forms, buttons, and status feedback consistent.
- Make important actions and product information easy to find.
- Design essential tasks for mobile, tablet, and desktop.
- Preserve keyboard operation, accessible names, focus visibility, semantic structure, and reduced-motion preferences.
- Consider default, hover, focus, active, selected, disabled, loading, success, error, and empty states when the native control provides them.
- Do not add visual interactions that hide content, interfere with shopping, or replace native navigation and form behavior.

## Manual review scenarios

The project owner can review representative journeys after implementation:

1. Visit the home page and find a route to a product.
2. Browse a product archive and open a product.
3. Select an available product variation and add it to the cart.
4. Review and update the cart, then proceed through checkout.
5. Open account pages and navigate order/account sections.
6. Search for a product and review results, including empty results where available.
7. Repeat essential navigation and shopping steps on mobile.

Check that theme presentation does not interfere with WordPress or WooCommerce behavior. Detailed component-specific states belong in the UI registry.
