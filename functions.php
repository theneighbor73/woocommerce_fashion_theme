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
 * Enqueue the small theme stylesheet and progressive header enhancement.
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
}
add_action( 'wp_enqueue_scripts', 'alice_theme_enqueue_assets' );

/**
 * Enable the template-part block as a server-processed interactivity root.
 *
 * @param array  $args       Block registration arguments.
 * @param string $block_name Block name.
 * @return array
 */
function alice_theme_template_part_interactivity_support( $args, $block_name ) {
	if ( 'core/template-part' === $block_name ) {
		$interactivity_support = isset( $args['supports']['interactivity'] ) ? (array) $args['supports']['interactivity'] : array();
		$args['supports']['interactivity'] = array_merge( $interactivity_support, array( 'interactive' => true ) );
	}

	return $args;
}
add_filter( 'register_block_type_args', 'alice_theme_template_part_interactivity_support', 10, 2 );

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
