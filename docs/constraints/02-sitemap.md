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

This is the planned page baseline. The actual published pages and navigation items are managed by the merchant.

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

Implementation constraints for WordPress and WooCommerce templates, including Cart and Checkout modes, are defined in [Technical Constraints](05.technical-constraints.md).

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

Template structure, pattern/template-part responsibilities, and merchant editing constraints are defined in [Technical Constraints](05.technical-constraints.md). The [UI Registry](../frontend/09.ui-registry.md) records each slice's specific composition and editing requirements.
