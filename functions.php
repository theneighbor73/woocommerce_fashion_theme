<?php
/**
 * Alice theme setup and presentation assets.
 *
 * @package Alice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configure theme supports and editor styles.
 *
 * @return void
 */
function alice_theme_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 360,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_editor_style( 'assets/css/theme.css' );
}
add_action( 'after_setup_theme', 'alice_theme_setup' );

/**
 * Use the bundled favicon when the merchant has not configured a Site Icon.
 *
 * @param string $url Site Icon URL returned by WordPress.
 * @return string
 */
function alice_theme_site_icon_fallback( $url ) {
	if ( '' !== $url || get_option( 'site_icon' ) ) {
		return $url;
	}

	$icon_path = 'assets/images/site-icon/fallback-favicon.png';

	if ( ! file_exists( get_theme_file_path( $icon_path ) ) ) {
		return $url;
	}

	return get_theme_file_uri( $icon_path );
}
add_filter( 'get_site_icon_url', 'alice_theme_site_icon_fallback' );

/**
 * Provide the theme logo when the header Site Logo block has no merchant logo.
 *
 * @param string $block_content Rendered Site Logo block markup.
 * @param array  $block         Parsed block data.
 * @return string
 */
function alice_theme_render_header_site_logo_fallback( $block_content, $block ) {
	$class_names = preg_split( '/\s+/', trim( $block['attrs']['className'] ?? '' ), -1, PREG_SPLIT_NO_EMPTY );

	if ( ! in_array( 'site-header__logo', $class_names, true ) || has_custom_logo() ) {
		return $block_content;
	}

	$width = absint( $block['attrs']['width'] ?? 144 );
	$width = $width > 0 ? $width : 144;
	$classes = array_merge( array( 'wp-block-site-logo' ), $class_names );
	$site_name = get_bloginfo( 'name' );

	if ( '' === $site_name ) {
		$site_name = __( 'Home', 'alice-theme' );
	}

	return sprintf(
		'<div class="%1$s"><a class="custom-logo-link" href="%2$s" rel="home"><img class="custom-logo" src="%3$s" alt="%4$s" width="%5$d" /></a></div>',
		esc_attr( implode( ' ', $classes ) ),
		esc_url( home_url( '/' ) ),
		esc_url( get_theme_file_uri( '/assets/images/logo/fallback-site-logo.png' ) ),
		esc_attr( $site_name ),
		$width
	);
}
add_filter( 'render_block_core/site-logo', 'alice_theme_render_header_site_logo_fallback', 10, 2 );

/**
 * Check parsed block content for an insertable editorial hero image gallery.
 *
 * @param array $blocks Parsed block list.
 * @return bool
 */
function alice_theme_blocks_contain_editorial_hero_image_gallery( $blocks ) {
	foreach ( $blocks as $block ) {
		$class_names = preg_split( '/\s+/', trim( $block['attrs']['className'] ?? '' ), -1, PREG_SPLIT_NO_EMPTY );

		if ( 'core/group' === $block['blockName'] && in_array( 'editorial-hero-image-gallery', $class_names, true ) ) {
			return true;
		}

		if ( ! empty( $block['innerBlocks'] ) && alice_theme_blocks_contain_editorial_hero_image_gallery( $block['innerBlocks'] ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Determine whether the current view can contain the editorial hero image gallery.
 *
 * @return bool
 */
function alice_theme_view_contains_editorial_hero_image_gallery() {
	if ( is_front_page() ) {
		return true;
	}

	if ( ! is_singular() ) {
		return false;
	}

	$post = get_queried_object();

	return $post instanceof WP_Post && alice_theme_blocks_contain_editorial_hero_image_gallery( parse_blocks( $post->post_content ) );
}

/**
 * Get a theme asset version from its modification time, with a theme-version fallback.
 *
 * @param string $relative_path Theme-relative asset path.
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

/**
 * Enqueue the theme stylesheet and progressive visual enhancements.
 *
 * @return void
 */
function alice_theme_enqueue_assets() {
	wp_enqueue_style(
		'alice-theme',
		get_theme_file_uri( '/assets/css/theme.css' ),
		array(),
		alice_theme_get_asset_version( 'assets/css/theme.css' )
	);

	wp_enqueue_script_module(
		'alice-theme-header-interactivity',
		get_theme_file_uri( '/assets/js/header-interactivity.js' ),
		array( '@wordpress/interactivity' ),
		alice_theme_get_asset_version( 'assets/js/header-interactivity.js' )
	);

	if ( alice_theme_view_contains_editorial_hero_image_gallery() ) {
		wp_enqueue_script_module(
			'alice-theme-editorial-hero-image-gallery-interactivity',
			get_theme_file_uri( '/assets/js/editorial-hero-image-gallery-interactivity.js' ),
			array( '@wordpress/interactivity' ),
			alice_theme_get_asset_version( 'assets/js/editorial-hero-image-gallery-interactivity.js' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'alice_theme_enqueue_assets' );

/**
 * Enable native blocks that host the theme's Interactivity API directives.
 *
 * @param array  $args       Block registration arguments.
 * @param string $block_name Block name.
 * @return array
 */
function alice_theme_interactivity_block_support( $args, $block_name ) {
	if ( in_array( $block_name, array( 'core/template-part', 'core/group' ), true ) ) {
		$interactivity_support = isset( $args['supports']['interactivity'] ) ? (array) $args['supports']['interactivity'] : array();
		$args['supports']['interactivity'] = array_merge( $interactivity_support, array( 'interactive' => true ) );
	}

	return $args;
}
add_filter( 'register_block_type_args', 'alice_theme_interactivity_block_support', 10, 2 );

/**
 * Add fixed overlay-position choices to the native Group block.
 *
 * @return void
 */
function alice_theme_register_editorial_hero_image_gallery_overlay_styles() {
	$positions = array(
		'top-left'     => __( 'Top left', 'alice-theme' ),
		'top-right'    => __( 'Top right', 'alice-theme' ),
		'center-left'  => __( 'Center left', 'alice-theme' ),
		'center-right' => __( 'Center right', 'alice-theme' ),
		'bottom-left'  => __( 'Bottom left', 'alice-theme' ),
		'bottom-right' => __( 'Bottom right', 'alice-theme' ),
	);

	foreach ( $positions as $position => $label ) {
		register_block_style(
			'core/group',
			array(
				'name'  => 'hero-overlay-' . $position,
				'label' => $label,
			)
		);
	}
}
add_action( 'init', 'alice_theme_register_editorial_hero_image_gallery_overlay_styles' );

/**
 * Register reusable presentation styles for the native Button block.
 *
 * @return void
 */
function alice_theme_register_button_styles() {
	$styles = array(
		'alice-primary'   => __( 'Primary', 'alice-theme' ),
		'alice-secondary' => __( 'Secondary', 'alice-theme' ),
	);

	foreach ( $styles as $name => $label ) {
		register_block_style(
			'core/button',
			array(
				'name'  => $name,
				'label' => $label,
			)
		);
	}
}
add_action( 'init', 'alice_theme_register_button_styles' );

/**
 * Add scroll-driven slide directives to hero pattern instances.
 *
 * @param string $block_content Rendered block markup.
 * @param array  $block         Parsed block.
 * @return string
 */
function alice_theme_add_editorial_hero_image_gallery_interactivity( $block_content, $block ) {
	if ( ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $block_content;
	}

	$processor = new WP_HTML_Tag_Processor( $block_content );

	if (
		'core/group' === $block['blockName'] &&
		in_array( 'editorial-hero-image-gallery', explode( ' ', $block['attrs']['className'] ?? '' ), true )
	) {
		if ( ! $processor->next_tag() ) {
			return $block_content;
		}

		$processor->set_attribute( 'data-wp-interactive', 'alice/editorial-hero-image-gallery' );
		$processor->set_attribute( 'data-wp-init', 'callbacks.initialize' );
		$processor->set_attribute( 'data-wp-on-window--scroll', 'actions.queueUpdate' );
		$processor->set_attribute( 'data-wp-on-window--resize', 'actions.resizeHeroes' );
		return $processor->get_updated_html();
	}

	return $block_content;
}
add_filter( 'render_block', 'alice_theme_add_editorial_hero_image_gallery_interactivity', 10, 2 );

/**
 * Add scoped directives to the shared header template part.
 *
 * @param string $block_content Rendered template-part markup.
 * @param array  $block         Parsed template-part block.
 * @return string
 */
function alice_theme_add_header_interactivity( $block_content, $block ) {
	if (
		'header' !== ( $block['attrs']['slug'] ?? '' ) ||
		! function_exists( 'wp_interactivity_state' ) ||
		! class_exists( 'WP_HTML_Tag_Processor' )
	) {
		return $block_content;
	}

	wp_interactivity_state(
		'alice/header',
		array(
			'isHidden'  => false,
			'lastScrollY' => 0,
		)
	);

	$processor = new WP_HTML_Tag_Processor( $block_content );
	if ( $processor->next_tag( array( 'tag_name' => 'header', 'class_name' => 'site-header' ) ) ) {
		$processor->set_attribute( 'data-wp-interactive', 'alice/header' );
		$processor->set_attribute( 'data-wp-class--is-hidden', 'state.isHidden' );
		$processor->set_attribute( 'data-wp-on-window--scroll', 'actions.queueHeaderUpdate' );
		$processor->set_attribute( 'data-wp-on-window--resize', 'actions.queueHeaderUpdate' );
		$processor->set_attribute( 'data-wp-on--focusin', 'actions.revealHeader' );
	}

	return $processor->get_updated_html();
}
add_filter( 'render_block_core/template-part', 'alice_theme_add_header_interactivity', 10, 2 );

/**
 * Let administrators know when store features are unavailable.
 *
 * @return void
 */
function alice_theme_woocommerce_admin_notice() {
	if ( class_exists( 'WooCommerce' ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="notice notice-warning">
		<p><?php echo esc_html__( 'Alice provides the general WordPress theme layout without WooCommerce. Install and activate WooCommerce to use the store features.', 'alice-theme' ); ?></p>
	</div>
	<?php
}
add_action( 'admin_notices', 'alice_theme_woocommerce_admin_notice' );
