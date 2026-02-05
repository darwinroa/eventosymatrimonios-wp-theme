<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( $listing->get_images__id() ) :
	$image_urls = [];

	if ( get_option( 'hp_listing_enable_image_zoom' ) ) :
		$image_urls = $listing->get_images__url( 'large' );
	endif;
	?>

    <div class="swiper hp-listing-slider">
		<div class="swiper-wrapper">
			<?php
			foreach ( $listing->get_images() as $image_index => $image ) :
				$image_url = hivepress()->helper->get_array_value( $image_urls, $image_index, '' );
                ?>
                
                <div class="swiper-slide">
                    <?php if ( strpos( $image->get_mime_type(), 'video' ) === 0 ) : ?>
                        <video controls>
                            <source src="<?php echo esc_url( $image->get_url() ); ?>" type="<?php echo esc_attr( $image->get_mime_type() ); ?>">
                        </video>
                    <?php else : ?>
                        <img src="<?php echo esc_url( $image->get_url( 'hp_landscape_large' ) ); ?>" 
                             data-zoom="<?php echo esc_url( $image_url ); ?>" 
                             alt="<?php echo esc_attr( $listing->get_title() ); ?>" 
                             loading="lazy"
                             style="width: 100%; height: 100%; object-fit: cover;"> <?php endif; ?>
                </div>

			<?php endforeach; ?>
		</div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <div class="swiper-pagination"></div>
	</div>

<?php endif; ?>