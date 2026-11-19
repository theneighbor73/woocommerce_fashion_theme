---
name: wordpress-asset-versioning-cache-busting
description: Defines safe file-modification-based cache-busting and asset enqueueing rules for CSS and JavaScript in this project.
---

# Asset Versioning and Cache Busting

When registering a theme CSS or JavaScript asset in PHP, use its file modification time as the version. If the file is absent or `filemtime()` fails, fall back to the active theme version. Do not hardcode an asset version, pass `null` or `false`, or use `time()` or `rand()` in production enqueue logic.

Keep asset loading within the theme's presentation boundary and follow `.agents/skills/php-html-writing/SKILL.md`. Use the existing `functions.php` organization unless the project architecture changes. Do not add an `inc/` directory solely to match examples from other projects.

## Shared version helper

Use one helper in `functions.php` for resolving versions. Match the project's `alice_theme_` function prefix:

```php
/**
 * Get a theme asset version from its modification time, with a theme-version fallback.
 *
 * @param string $relative_path Theme-relative path such as 'assets/css/theme.css'.
 * @return string
 */
function alice_theme_get_asset_version( $relative_path ) {
	$filepath = get_theme_file_path( $relative_path );

	if ( file_exists( $filepath ) ) {
		$modified = filemtime( $filepath );
		if ( false !== $modified ) {
			return (string) $modified;
		}
	}

	$theme_version = wp_get_theme()->get( 'Version' );

	return is_string( $theme_version ) && '' !== $theme_version ? $theme_version : '0.1.0';
}
```
