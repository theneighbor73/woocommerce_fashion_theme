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
 * Enqueue the theme stylesheet and progressive visual enhancements.
 *
 * @return void
 */
function alice_theme_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'alice-theme',
		get_theme_file_uri( '/assets/css/theme.css' ),
		array(),
		$theme_version
	);

	wp_enqueue_script_module(
		'alice-theme-header-interactivity',
		get_theme_file_uri( '/assets/js/header-interactivity.js' ),
		array( '@wordpress/interactivity' ),
		$theme_version
	);

	if ( is_front_page() ) {
		wp_enqueue_script_module(
			'alice-theme-home-hero-interactivity',
			get_theme_file_uri( '/assets/js/home-hero-interactivity.js' ),
			array( '@wordpress/interactivity' ),
			$theme_version
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
function alice_theme_register_home_hero_overlay_styles() {
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
add_action( 'init', 'alice_theme_register_home_hero_overlay_styles' );

/**
 * Add scroll-driven slide directives to the homepage hero.
 *
 * @param string $block_content Rendered block markup.
 * @param array  $block         Parsed block.
 * @return string
 */
function alice_theme_add_home_hero_interactivity( $block_content, $block ) {
	$image_url = $block['attrs']['url'] ?? '';
	if ( 'core/image' === $block['blockName'] && is_string( $image_url ) && str_starts_with( $image_url, '/alice-theme-assets/' ) ) {
		$asset_name = basename( $image_url );
		$asset_path = '/assets/images/' . $asset_name;
		if ( file_exists( get_theme_file_path( $asset_path ) ) && class_exists( 'WP_HTML_Tag_Processor' ) ) {
			$image = new WP_HTML_Tag_Processor( $block_content );
			if ( $image->next_tag( 'IMG' ) ) {
				$image->set_attribute( 'src', get_theme_file_uri( $asset_path ) );
				return $image->get_updated_html();
			}
		}
	}

	if (
		! is_front_page() ||
		! function_exists( 'wp_interactivity_state' ) ||
		! class_exists( 'WP_HTML_Tag_Processor' )
	) {
		return $block_content;
	}

	$processor = new WP_HTML_Tag_Processor( $block_content );

	if (
		'core/group' === $block['blockName'] &&
		in_array( 'home-hero', explode( ' ', $block['attrs']['className'] ?? '' ), true )
	) {
		$processor->next_tag();
		$processor->set_attribute( 'data-wp-interactive', 'alice/home-hero' );
		$processor->set_attribute( 'data-wp-class--is-enhanced', 'state.isEnhanced' );
		$processor->set_attribute( 'data-wp-init', 'callbacks.initialize' );
		$processor->set_attribute( 'data-wp-on-window--scroll', 'actions.queueUpdate' );
		$processor->set_attribute( 'data-wp-on-window--resize', 'actions.resizeHero' );
		return $processor->get_updated_html();
	}

	if ( 'core/gallery' !== $block['blockName'] || ! str_contains( $block['attrs']['className'] ?? '', 'home-hero__slides' ) ) {
		return $block_content;
	}

	$count = 0;
	while ( $processor->next_tag( array( 'tag_name' => 'figure', 'class_name' => 'wp-block-image' ) ) ) {
		++$count;
	}

	wp_interactivity_state(
		'alice/home-hero',
		array(
			'activeSlide' => 0,
			'isEnhanced'  => false,
			'slideCount'  => $count,
		)
	);

	return $processor->get_updated_html();
}
add_filter( 'render_block', 'alice_theme_add_home_hero_interactivity', 10, 2 );

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
