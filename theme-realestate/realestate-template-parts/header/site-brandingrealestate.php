<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding">
	<div class="wrap">

		<?php 
		if ( ! defined( 'ABSPATH' ) ) exit;
		the_custom_logo(); ?>

		<div class="site-branding-text">	
			<?php
			$link_home_nofollow = 'rel="nofollow"';
			$pagetesttitle = get_home_url() . "/listeagenceimmo/";
			if ( get_permalink() == $pagetesttitle){ $link_home_nofollow = ''; }
			$pagename = get_query_var('pagename');
			if ( $pagename == 'listproperties'){ $link_home_nofollow = ''; }
			if ( $pagename == 'contactagence'){ $link_home_nofollow = ''; }
		//	if ( $pagename == 'plansitexx'){ $link_home_nofollow = ''; }
				
			?>		
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a <?php echo $link_home_nofollow ?> href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a <?php echo $link_home_nofollow ?> href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :
			?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php endif; ?>
		</div><!-- .site-branding-text -->

	</div><!-- .wrap -->
</div><!-- .site-branding -->
