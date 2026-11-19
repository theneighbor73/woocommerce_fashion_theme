<?php
/**
 * Title: Editorial Hero Image Gallery
 * Slug: alice/editorial-hero-image-gallery
 * Categories: banner, call-to-action
 * Description: A full-width fashion image hero with editable copy and a shop call to action.
 * Viewport Width: 1600
 * Keywords: hero, fashion, editorial, gallery, banner
 * Text Domain: alice-theme
 */
$hero_image_two = esc_url( get_theme_file_uri( '/assets/images/desktop-hero-image2.jpg' ) );
$hero_image_one = esc_url( get_theme_file_uri( '/assets/images/desktop-hero-image1.jpg' ) );
?>
<!-- wp:group {"align":"full","tagName":"section","className":"editorial-hero-image-gallery","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull editorial-hero-image-gallery">
  <!-- wp:group {"className":"editorial-hero-image-gallery__stage","layout":{"type":"default"},"lock":{"move":true,"remove":true}} -->
  <div class="wp-block-group editorial-hero-image-gallery__stage">
    <!-- wp:gallery {"columns":1,"linkTo":"none","className":"editorial-hero-image-gallery__slides","lock":{"move":true,"remove":true}} -->
    <figure class="wp-block-gallery has-nested-images columns-1 is-cropped editorial-hero-image-gallery__slides">
      <!-- wp:image {"url":"<?php echo $hero_image_two; ?>","alt":"<?php esc_attr_e( 'Fashion models wearing layered contemporary clothing outdoors', 'alice-theme' ); ?>","sizeSlug":"full","linkDestination":"none"} -->
      <figure class="wp-block-image size-full">
        <img src="<?php echo $hero_image_two; ?>" alt="<?php esc_attr_e( 'Fashion models wearing layered contemporary clothing outdoors', 'alice-theme' ); ?>" />
      </figure>
      <!-- /wp:image -->
      <!-- wp:image {"url":"<?php echo $hero_image_one; ?>","alt":"<?php esc_attr_e( 'Fashion models walking through a city street in autumn clothing', 'alice-theme' ); ?>","sizeSlug":"full","linkDestination":"none"} -->
      <figure class="wp-block-image size-full">
        <img src="<?php echo $hero_image_one; ?>" alt="<?php esc_attr_e( 'Fashion models walking through a city street in autumn clothing', 'alice-theme' ); ?>" />
      </figure>
      <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->

    <!-- wp:group {"className":"editorial-hero-image-gallery__overlay is-style-hero-overlay-bottom-left","layout":{"type":"constrained"},"lock":{"move":true,"remove":true}} -->
    <div class="wp-block-group editorial-hero-image-gallery__overlay is-style-hero-overlay-bottom-left">
      <!-- wp:paragraph {"className":"editorial-hero-image-gallery__eyebrow has-canvas-color has-text-color","textColor":"canvas","lock":{"move":true,"remove":true}} -->
      <p class="editorial-hero-image-gallery__eyebrow has-canvas-color has-text-color"><?php esc_html_e( 'The new season', 'alice-theme' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":1,"className":"editorial-hero-image-gallery__title has-canvas-color has-text-color","textColor":"canvas","lock":{"move":true,"remove":true}} -->
      <h1 class="wp-block-heading editorial-hero-image-gallery__title has-canvas-color has-text-color"><?php esc_html_e( 'A quieter kind of statement.', 'alice-theme' ); ?></h1>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"className":"editorial-hero-image-gallery__description has-canvas-color has-text-color","textColor":"canvas","lock":{"move":true,"remove":true}} -->
      <p class="editorial-hero-image-gallery__description has-canvas-color has-text-color"><?php esc_html_e( 'Thoughtful silhouettes and considered details for everyday dressing.', 'alice-theme' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons {"className":"editorial-hero-image-gallery__actions","lock":{"move":true,"remove":true}} -->
      <div class="wp-block-buttons editorial-hero-image-gallery__actions">
        <!-- wp:button {"lock":{"move":true,"remove":true}} -->
        <div class="wp-block-button">
          <a class="wp-block-button__link wp-element-button" href="/shop/"><?php esc_html_e( 'Shop the collection', 'alice-theme' ); ?></a>
        </div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
