<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<?php 
	$pagename = get_query_var('pagename');
	if ( $pagename != 'property'){
	?>
	<div class="custom-header">

			<div class="custom-header-media">
				<?php 
				if ( ! defined( 'ABSPATH' ) ) exit;	
					 the_custom_header_markup();			
			//	?>
			</div>

		<?php
			if ( ! defined( 'ABSPATH' ) ) exit;
		 	get_template_part( 'realestate-template-parts/header/site', 'brandingrealestate' ); ?>

	</div><!-- .custom-header -->
<?php } ?>