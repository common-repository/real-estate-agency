<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
	if ( get_home_url() == 'http://vps520391.ovh.net') { 
		echo '<meta name="robots" content="noindex,nofollow">';
	}
	
	if ( get_home_url() == 'http://vps671338.ovh.net') { 
		echo '<meta name="robots" content="noindex,nofollow">';
	}
?>
<link rel="profile" href="http://gmpg.org/xfn/11">


