<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( $listing->get_description() ) :
	?>
	mdw listing description
	<div class="hp-listing__description"><?php echo $listing->display_description(); ?></div>
	<?php
endif;
