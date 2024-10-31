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

session_start ();
?><!DOCTYPE html>
<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.h1Custom {    
    color: <?php echo $GLOBALS['h1color'] ?>;
}
.h2Custom {    
    color: <?php echo $GLOBALS['h1color'] ?>;
}
.h3Custom {    
    color: <?php echo $GLOBALS['h1color'] ?>;
}
.h4Custom {    
    color: <?php echo $GLOBALS['h1color'] ?>;
}
.h5Custom {    
    color: <?php echo $GLOBALS['h1color'] ?>;
}
.h6Custom {    
    color: <?php echo $GLOBALS['h1color'] ?>;
}

.pCustom {    
    color: <?php echo $GLOBALS['pcolor'] ?>;
}
.linkCustom {    
    color: <?php echo $GLOBALS['linkcolor'] ?>;
}
.linkCustom:hover {    
    color: <?php echo $GLOBALS['linkhovercolor'] ?>;
}
.priceCustom {    
    color: <?php echo $GLOBALS['pricecolor'] ?>;
}
.linkPaginationCustom {    
    color: <?php echo $GLOBALS['linkpaginationcolor'] ?>;
}
.linkPaginationCustom:hover {    
    color: <?php echo $GLOBALS['linkpaginationselectedcolor'] ?>;
}
.linkPaginationSelectedCustom {    
    color: <?php echo $GLOBALS['linkpaginationselectedcolor'] ?>;
}
.button_nav {
    background-color: #D8D8D8; 
    border: none;
    color: #585858;
    padding: 4px 6px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
}
.button_nav:hover {
	background-color: #585858; 
  	color: #D8D8D8;
}
.btPaginationCustom {    
    background-color: <?php echo $GLOBALS['btpaginationbackgroundcolor'] ?>;
    color: <?php echo $GLOBALS['btpaginationcolor'] ?>;
}
.btPaginationCustom:hover {    
	background-color: <?php echo $GLOBALS['btpaginationcolor'] ?>;
    color: <?php echo $GLOBALS['btpaginationbackgroundcolor'] ?>;
}
.btPaginationCustom:focus  {    
	background-color: <?php echo $GLOBALS['btpaginationcolor'] ?>;
    color: <?php echo $GLOBALS['btpaginationbackgroundcolor'] ?>;
}
.button_nav_padding_large {
	padding: 4px 12px;
}
.select-right {
	background-color: <?php echo $GLOBALS['selectbackgroundcolor'] ?>;
  	color: <?php echo $GLOBALS['selectcolor'] ?>;
}
.select-right:hover {
	background-color: <?php echo $GLOBALS['selecthoverbackgroundcolor'] ?>; 
  	color: <?php echo $GLOBALS['selecthovercolor'] ?>;
}


.button_realestate {
	background-color: <?php echo $GLOBALS['btbackgroundcolor'] ?>; /*#222;*/
	border: 0;
	-webkit-border-radius: 2px;
	border-radius: 4px;
	-webkit-box-shadow: none;
	box-shadow: none;
	color: <?php echo $GLOBALS['btcolor'] ?>; /*#fff;*/
	cursor: pointer;
	display: inline-block;
	font-size: 12px;
	font-size: 0.875rem;
	font-weight: 800;
	line-height: 1;
	padding: 0.7em 0.7em;
	text-shadow: none;
	-webkit-transition: background 0.2s;
	transition: background 0.2s;
	white-space: nowrap;
}
.button_realestate:hover {
	background-color: <?php echo $GLOBALS['bthoverbackgroundcolor'] ?>; /*#222;*/
	color: <?php echo $GLOBALS['bthovercolor'] ?>; /*#fff;*/
}
.inputCustom {
	background-color: <?php echo $GLOBALS['inputbackgroundcolor'] ?> !important;
  	color: <?php echo $GLOBALS['inputcolor'] ?> !important;
  	border: 1px solid <?php echo $GLOBALS['inputcolor'] ?> !important;
  	padding: 0.5em 0.5em !important;
}; 

.inputCustomxx input.text {
   color: red;
}

.inputCustomxx input.text:-moz-placeholder { /* Firefox 18- */
   color: red;  
}

.inputCustomxx input.text::-moz-placeholder {  /* Firefox 19+ */
   color: red;  
}

.inputCustomxx input.text:-ms-input-placeholder {  
   color: red;  
}


.textareaCustom {
	background-color: <?php echo $GLOBALS['textareabackgroundcolor'] ?> !important;
  	color: <?php echo $GLOBALS['textareacolor'] ?> !important;
  	border: 1px solid <?php echo $GLOBALS['textareacolor'] ?> !important;
  }
/*input[type="text"] {
  background-color: #d1d1d1;
  color: #008000;
}*/

.text-placeholder input::placeholder {
        color: <?php echo $GLOBALS['inputcolor'] ?>       
    }
.text-placeholder input::-webkit-input-placeholder {
    color: <?php echo $GLOBALS['inputcolor'] ?>
}
.text-placeholder textarea::placeholder {
        color: <?php echo $GLOBALS['textareacolor'] ?>       
    }
.text-placeholder textarea::-webkit-input-placeholder {
    color: <?php echo $GLOBALS['textareacolor'] ?>
}

.checkbox {
    width: 100%;
    margin: 15px auto;
    position: relative;
    display: block;
}

.checkbox input[type="checkbox"] {
    width: auto;
    opacity: 0.00000001;
    position: absolute;
    left: 0;
    margin-left: -20px;
}
.checkbox label {
    position: relative;
}
.checkbox label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    margin: 4px;
    width: 22px;
    height: 22px;
    transition: transform 0.28s ease;
    border-radius: 3px;
    border: 1px solid <?php echo $GLOBALS['inputcolor'] ?>;
}
.checkbox label:after {
  content: '';
    display: block;
    width: 10px;
    height: 5px;
    border-bottom: 2px solid <?php echo $GLOBALS['inputcolor'] ?>;
    border-left: 2px solid <?php echo $GLOBALS['inputcolor'] ?>;
    -webkit-transform: rotate(-45deg) scale(0);
    -moz-transform: rotate(-45deg) scale(0);
    -ms-transform: rotate(-45deg) scale(0);
    transform: rotate(-45deg) scale(0);
    position: absolute;
    top: 12px;
    left: 10px;
}
.checkbox input[type="checkbox"]:checked ~ label::before {
    color: <?php echo $GLOBALS['inputcolor'] ?>;
}

.checkbox input[type="checkbox"]:checked ~ label::after {
    -webkit-transform: rotate(-45deg) scale(1);
    -moz-transform: rotate(-45deg) scale(1);
    -ms-transform: rotate(-45deg) scale(1);
    transform: rotate(-45deg) scale(1);
}

.checkbox label {
    min-height: 34px;
    display: block;
    padding-left: 40px;
    margin-bottom: 0;
    font-weight: normal;
    cursor: pointer;
    vertical-align: sub;
}
.checkbox label span {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}
.checkbox input[type="checkbox"]:focus + label::before {
    outline: 0;
}

.linkUnderline {
    text-decoration: underline;
}
.button_realestate_mobile {
	background-color: <?php echo $GLOBALS['btbackgroundcolor'] ?>;
	border: 0;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	-webkit-box-shadow: none;
	box-shadow: none;
	color: <?php echo $GLOBALS['btcolor'] ?>;
	cursor: pointer;
	display: inline-block;
	font-size: 12px;
	font-size: 0.875rem;
	font-weight: 800;
	line-height: 1;
	padding: 1em 1em;
	text-shadow: none;
	-webkit-transition: background 0.2s;
	transition: background 0.2s;
	 white-space: nowrap;
	 margin-bottom: 0.6em;
	 margin-right: 0.5em;
}
</style>
<?php 
	if ( get_home_url() == 'http://vps520391.ovh.net') { 
		echo '<meta name="robots" content="noindex,nofollow">';
		echo '<meta name="google-site-verification" content="6UOmBGdbJ-9qpznuW6SHd8kPwS4bjPljI0ikQ-WMSxw" />';
	}
	if ( get_home_url() == 'http://vps671085.ovh.net') { 
	//	echo '<meta name="robots" content="noindex,nofollow">';
	//	echo '<meta name="google-site-verification" content="6UOmBGdbJ-9qpznuW6SHd8kPwS4bjPljI0ikQ-WMSxw" />';
	}
	if ( get_home_url() == 'http://vps671338.ovh.net') { 
		echo '<meta name="robots" content="noindex,nofollow">';
	}
	if ( get_home_url() == 'https://votre-agence.immo-fr.fr') { 
		echo '<meta name="google-site-verification" content="z59f9YafWVpD_PJg3ZNsvz0hV96mscrwMPCwJZjYNQM" />';
	}
?>

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php 
global $wp_query;
	$type_property = urldecode ( $wp_query->query_vars['type_property']);
	//$type_property = ucfirst($type_property);$zipselect = urldecode ( $wp_query->query_vars['dept']);
	$zipselect = urldecode ( $wp_query->query_vars['dept']);
	$zipcityselect = urldecode ( $wp_query->query_vars['zipcity']);
	$zipcityselect = str_replace("-"," ",$zipcityselect);

	$pagesitemapall = get_home_url() . "/sitemapall/";
	if ( get_permalink() == $pagesitemapall){
		echo '<meta name="robots" content="noindex">';
	}

	$title = 'Annonces immobilieres gratuites | Vente appartement maison immobilier';
	if (!empty($zipcityselect)){
		$title = 'Vente ' . $type_property . ' ' . $zipcityselect . ' ' . $zipselect;
	}
	$pagetesttitle = get_home_url() . "/listeagenceimmo/";
	if ( get_permalink() == $pagetesttitle){
		$title = 'Liste des agences immobilieres';
		$zip = get_query_var('dept', '');
			if ($zip != ''){
				echo '<meta name="robots" content="noindex,nofollow">';
			}
	}

	$pagetesttitle = get_home_url() . "/agenceimmo/";
	if ( get_permalink() == $pagetesttitle){
		$title = 'Deposer une annonce immobiliere';
	}
	$pagetesttitle = get_home_url() . "/postad/";
	if ( get_permalink() == $pagetesttitle){
		$title = 'Deposer une annonce immobiliere';
	}

	$pagename = get_query_var('pagename');
	if ( $pagename == 'plansite'){
		$typeproperty = get_query_var('typepropertyplan', '');
		$typeProperty = strtolower($typeproperty);
		$zip = get_query_var('zipplan', '');
		if ($zip == '' and $typeproperty == '') {$title = 'plan du site';}
		if ($zip != '' and $typeproperty == '') {$title = 'plan du site pour le departement ou le cp ' . $zip;}
		if ($zip != '' and $typeproperty != '') {$title = 'plan du site pour les ' . $typeProperty . '(s) de la ville ' . $zip;}
	}
	
	if ( $pagename == 'property'){
		$id_property = urldecode ( $wp_query->query_vars['idproperty']);
		$room = urldecode ( $wp_query->query_vars['room']);
		if ($room > 1){
			$room = str_replace("-pieces","",$room);
		}else{
			$room = str_replace("-piece","",$room);
		}
		
		$title = 'Vente ' . $type_property . ' ' . $room . ' ' . $zipcityselect . ' ' . $zipselect . ' Ref ' . $id_property;
	}
	if ( $pagename == 'listproperties'){
		$id_property = urldecode ( $wp_query->query_vars['idproperty']);
		$room = urldecode ( $wp_query->query_vars['room']);
		$pricestart = urldecode ( $wp_query->query_vars['pricestart']);
		$priceend = urldecode ( $wp_query->query_vars['priceend']);
		$pageSelected = urldecode ( $wp_query->query_vars['pageselected']);

		$cpCityTitle = str_replace("-"," ",get_query_var('zipcity', ''));
		$cpTitle = substr($cpCityTitle, 0,5);
		$cityTitle =  ucwords(substr($cpCityTitle, 6));
		$cityTitle = str_replace(" ","-",$cityTitle);
		$cpCityTitle = $cityTitle . " " . $cpTitle;

		$title = 'Achat ' . $type_property . ' ' . $cpCityTitle .' | Vente ' . $type_property . 's a ' . $cpCityTitle;
	//	echo '$type_property ' . $type_property . '$zipcityselect ' . $zipcityselect . '$room ' . $room . '$zipselect ' . $zipselect . '$pricestart ' . $pricestart . '$priceend ' . $priceend . '$pageSelected ' . $pageSelected . '<br><br><br>';
		
		/*if (($type_property == '' or $type_property == 'Bien') or ($zipcityselect == 'cp ville' or $zipcityselect == '') or ($room != '' and $room != '0') or ($zipselect != '' and $zipselect != 'dept') or ($pricestart != ''  and $pricestart != 'mini') or ($priceend != '' and $priceend != 'max') ){
			//or $pageSelected != '' 
			echo '<meta name="robots" content="noindex,nofollow">';
		}  
		*/
		$noindex = false;
		if ($type_property == '' or $type_property == 'bien') {
		//	echo 'noindex ok type_property<br>';
			$noindex = true;
		}
		if ($room != '' and $room != '0'){
		//	echo 'noindex ok room<br>';
			$noindex = true;
		}
		if ($zipselect != '' and $zipselect != 'dept'){
		//	echo 'noindex ok zipselect<br>';
			$noindex = true;
		}
		if ($zipcityselect == 'cp ville' or $zipcityselect == ''){
		//	echo 'noindex ok zipcityselect<br>';
			$noindex = true;
		}
		if ($pricestart != ''  and $pricestart != 'mini'){
		//	echo 'noindex ok pricestart<br>';
			$noindex = true;
		}
		if ($noindex == true){
		//	echo 'noindex ok final<br><br>';
			echo '<meta name="robots" content="noindex,nofollow">';
		}
	}
?>

<title><?php echo apply_filters('the_title', $title);?></title>
<?php 
wp_head();
?>


