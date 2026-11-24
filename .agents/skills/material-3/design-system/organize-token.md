# Token Organization

Keep approved design values in one source of truth and let component styles consume semantic aliases. Do not copy Material’s sample palettes, typefaces, or generated CSS into the theme.

## Project layers

- `theme.json` defines WordPress presets and editor-facing global styles.
- `assets/css/theme.css` maps approved WordPress presets to the theme’s semantic CSS custom properties and shared variables.
- Component and pattern styles consume those semantic properties; they should not redefine project palette, type, or spacing values locally without a documented reason.

Keep the light values active in the shared token layer. Preserve an inactive dark-theme context as an integration point, but leave its values empty and do not add a toggle, automatic theme detection, or dark-mode styles until requested.

If a token value or role changes, update the approved token documentation and the WordPress preset or semantic alias that implements it. Avoid parallel token catalogs and utility classes that duplicate these layers.
