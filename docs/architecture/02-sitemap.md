# 02 — Sitemap and Template Architecture

## 1. Purpose

This document defines the initial storefront information architecture and the templates required by the theme.

The sitemap identifies the pages customers can access.

The template architecture identifies the reusable layouts responsible for rendering those pages.

A WordPress template is not necessarily equivalent to a single WordPress page.

Multiple pages may share the same template.

## 2. Site Structure

Initial proposed sitemap:

```text
Storefront
│
├── Home
│
├── Shop
│   ├── All Products
│   ├── Product Category
│   ├── Product Tag
│   └── Single Product
│
├── Cart
│
├── Checkout
│
├── My Account
│   ├── Login / Registration
│   ├── Dashboard
│   ├── Orders
│   ├── Addresses
│   └── Account Details
│
├── Blog
│   ├── Blog Archive
│   ├── Category Archive
│   └── Single Post
│
├── Standard Pages
│   ├── About
│   ├── Contact
│   ├── Shipping Information
│   ├── Returns Policy
│
├── Product Search Results
│
└── 404
```

This is the planned page baseline. Core shopping pages are implemented first; blog, editorial, and secondary content pages follow. The actual published pages and navigation items are managed by the merchant.

Not every sitemap entry requires a separate template.

## 3. WordPress Template Inventory

Initial proposed template inventory:

| Template      | WordPress template file | Purpose                       |
| ------------- | ----------------------- | ----------------------------- |
| Index         | `index.html`            | Required fallback template    |
| Homepage      | `front-page.html`       | Prebuilt native-block editorial composition and product collection |
| Standard Page | `page.html`             | General content pages         |
| Single Post   | `single.html`           | Individual blog posts         |
| Blog Archive  | `home.html`             | Posts index, where applicable |
| Archive       | `archive.html`          | General archive fallback      |
| Search        | `search.html`           | Search results                |
| 404           | `404.html`              | Not-found page                |

Additional templates may be needed depending on the final hierarchy and design.

## 4. WooCommerce Template Inventory

The following templates are required or should be evaluated for the initial WooCommerce experience.

| Template                 | Purpose                        |
| ------------------------ | ------------------------------ |
| Product Catalog          | Main product listing           |
| Product Category Archive | Products within a category     |
| Product Tag Archive      | Products associated with a tag |
| Single Product           | Individual product details     |
| Cart                     | Shopping cart                  |
| Checkout                 | Checkout experience            |
| My Account               | Customer account               |

Important:

WooCommerce functionality can be rendered through WooCommerce blocks, WordPress block templates, and supported WooCommerce integration mechanisms.

Do not assume that every WooCommerce page requires a separate HTML template.

Cart and Checkout must be styled for both WooCommerce blocks and classic shortcode-backed pages. Prefer blocks for new/default setups; do not replace either mode's behavior.

Use the correct WordPress and WooCommerce template hierarchy.

## 5. Page-to-Template Mapping

| Customer-facing page | Expected rendering                                     |
| -------------------- | ------------------------------------------------------ |
| Home                 | `front-page.html`, with editorial content and a native WooCommerce product collection |
| Shop                 | Product Catalog template or WooCommerce shop rendering |
| Product Category     | Product category archive                               |
| Product Tag          | Product tag archive                                    |
| Product Detail       | Single Product template                                |
| Cart                 | WooCommerce Cart block or classic shortcode page       |
| Checkout             | WooCommerce Checkout block or classic shortcode page  |
| Account              | My Account page and account endpoints                  |
| Blog                 | Posts index                                            |
| Blog Category        | Category archive                                       |
| Blog Post            | Single Post template                                   |
| About                | Standard Page                                          |
| Contact              | Standard Page                                          |
| Policy Pages         | Standard Page                                          |
| Search               | Search template                                        |
| Invalid URL          | 404 template                                           |

## 6. Layout Strategy

The initial theme uses fixed layouts.

Each template has a predetermined structure.

Merchants may change intended content but should not freely rearrange the structural layout.

The initial locking approach is `contentOnly` wherever appropriate.

The theme must provide appropriate editable areas for:

- Text.
- Images.
- Site logo.
- Navigation.

Do not expose arbitrary template composition controls in the initial version.

## 7. Template Parts vs Patterns vs Components

Use the correct WordPress abstraction.

### Template Parts

Use for recurring structural areas such as:

- Header.
- Footer.

### Block Patterns

Use for reusable compositions such as:

- Hero sections.
- Editorial banners.
- Promotional sections.

Patterns should be used when they simplify implementation or provide useful reusable structures.

### CSS and JavaScript Components

Reusable visual and interaction elements do not necessarily need to be WordPress blocks.

Use the simplest appropriate implementation.
