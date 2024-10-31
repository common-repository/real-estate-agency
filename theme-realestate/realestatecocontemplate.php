<?php
/**
 * Template Name: RealEstateCocon
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Real estate
 * @since 1.0
 * @version 1.0
 */

//get_header();
if ( ! defined( 'ABSPATH' ) ) exit; 
get_template_part( 'header', 'realestate-cocon' ); 
$pubOn = false;
$linkPromoOn = false;
$siteRealestateOn = false;
if ( get_home_url() == 'http://vps520391.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
if ( get_home_url() == 'http://vps671085.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests

if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour la Production

$urlLogo = plugins_url() . '/real-estate-agency/theme-realestate/realestate-template-parts/image/'. 'Logo-Real-estate-Medium-WP-Comp.jpg';

$urlDom = get_home_url().'/immo/';
$urlDomBase = get_home_url();


global $wp_query;
			
			$urlPage = get_query_var('urlpagecocon', '');
		//	echo '$urlPage ' . $urlPage . '<br>';
			$urlPageImmo = '/immo/' . $urlPage . '/';
		//	echo '$urlPage ' . $urlPageImmo . '<br>';
			$uriPage = $_SERVER[REQUEST_URI];
		//	echo '$urlPage ' . $uriPage . '<br><br><br><br><br>';
			if ($urlPageImmo != $uriPage){ 
				http_response_code(410); ?>
				<h2><p style="color: red">Cette page n'existe pas. <?php echo http_response_code(); ?></p></h2>
			<?php return;} ?>
<?php 
global $wpdb;

			// loop real estate DB

			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;
			$fieldFilter = 'keyEmailAccount';
			$valueStringField = $result->email_realestate;

			// pour les tests
			if ( get_home_url() == 'http://vps520391.ovh.net') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$login = "ppatrick500@yahoo.fr";
			} 
			if ( get_home_url() == 'http://vps671085.ovh.net') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$login = "ppatrick500@yahoo.fr";
			}
			// pour les tests
			if ( get_home_url() == 'http://35.187.105.166') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$login = "ppatrick500@yahoo.fr";
			} 

			// pour la Production
			if ( get_home_url() == 'https://www.immobilier-fr.fr') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
			}

			$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";

 			$data = array('service' => 'getRecordPageCocon', 'plateform' => '1', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => '', 'urlPage' => $urlPage
 				);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app = json_decode($app_list, true);

			if (sizeof($app) < 1){ 
				http_response_code(410); ?>
				<h2><p style="color: red">Cette page n'existe pas. <?php echo http_response_code(); ?></p></h2>
			<?php return;} ?>
			<?php

			// liste des biens

			$type_property = $app['lexie5'];
			$type_property = ucfirst($type_property);
			$type_property = str_replace("-"," ",$type_property);

			if ($type_property == 'Bien'){
				$indexTypeProperty = '0';
			}else if ($type_property == 'Appartement'){
				$indexTypeProperty = '1';
			}else if ($type_property == 'Maison'){
				$indexTypeProperty = '2';
			}else if ($type_property == 'Villa'){
				$indexTypeProperty = '3';
			}else if ($type_property == 'Ferme'){
				$indexTypeProperty = '4';
			}else if ($type_property == 'Propriete'){
				$indexTypeProperty = '5';
			}else if ($type_property == 'Hotel particulier'){
				$indexTypeProperty = '6';
			}else if ($type_property == 'Chateau'){
				$indexTypeProperty = '7';
			}else if ($type_property == 'Chalet'){
				$indexTypeProperty = '8';
			}else if ($type_property == 'Loft'){
				$indexTypeProperty = '9';
			}else if ($type_property == 'Atelier'){
				$indexTypeProperty = '10';
			}else if ($type_property == 'Terrain'){
				$indexTypeProperty = '11';
			}else if ($type_property == 'Bureaux'){
				$indexTypeProperty = '12';
			}else if ($type_property == 'Commerce'){
				$indexTypeProperty = '13';
			}else if ($type_property == 'Locaux'){
				$indexTypeProperty = '14';
			}else if ($type_property == 'Immeuble'){
				$indexTypeProperty = '15';
			}else if ($type_property == 'Parking'){
				$indexTypeProperty = '16';
			}else if ($type_property == 'Viager'){
				$indexTypeProperty = '17';
			}else if ($type_property == 'Autre'){
				$indexTypeProperty = '0';
			}

		//	echo "type_property   " .  $type_property . "   " . $indexTypeProperty . " lexie6 " . $app['lexie6'] . "   " . $app['lexie5'] . "<br><br>";

		//	$indexTypeProperty = '0';  
			$room = "0";
			$zipselect = $app['lexie1']; //"74";
			$zipcityselect = $app['lexie2']; //74000
			$pricestart = "";
			$priceend = "";
			$pageSelected = "1";

			$nbPropertiesByPage = 3;
			if ( wp_is_mobile() ) { $nbPropertiesByPage = 2;}


			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app_list = json_decode($app_list, true);

	//	echo "list data A is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";
	
	/*
		if (sizeof($app_list) < 1 ){
			$zipcityselect = '';
			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
		 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app_list = json_decode($app_list, true);

		//	echo "list data B is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";
		}

		
		if (sizeof($app_list) < 1 ){
			$indexTypeProperty = '0';
			$zipcityselect = '';
			$zipselect = '';
			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
		 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app_list = json_decode($app_list, true);

		//	echo "list data D is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";
		}
		*/


		// image snippet

		$urlphotosnippet = "";
				$caption = "";
				$imgempty = true;
				foreach ($app_list as $applist):
			    	if ($applist['urlphoto1'] != ""){
			    		$urlphotosnippet = $applist['urlphoto1'];$caption = $applist['caption1'];$imgempty = false;
					}else if ($applist['urlphoto2'] != ""){
			    		$urlphotosnippet = $applist['urlphoto2'];$caption = $applist['caption2'];$imgempty = false;
					}else if ($applist['urlphoto3'] != ""){
			    		$urlphotosnippet = $applist['urlphoto3'];$caption = $applist['caption3'];$imgempty = false;
					}else if ($applist['urlphoto4'] != ""){
			    		$urlphotosnippet = $applist['urlphoto4'];$caption = $applist['caption4'];$imgempty = false;
					}else if ($applist['urlphoto5'] != ""){
			    		$urlphotosnippet = $applist['urlphoto5'];$caption = $applist['caption5'];$imgempty = false;
					}else if ($applist['urlphoto6'] != ""){
			    		$urlphotosnippet = $applist['urlphoto6'];$caption = $applist['caption6'];$imgempty = false;
					}
					/*
	 			 	$titleImg = sanitize_text_field($applist["typeProperty"]);
	 			 		$titleImg .= ' ' . sanitize_text_field($applist["surface"]) . ' m2 ';
	 			 		if (sanitize_text_field($applist['room']) > 1) {$titleImg .= $applist["room"] . ' pièces '; }else{
	 			 			$titleImg .= $applist["room"] . ' pièce ';
	 			 		}
	 			 		$titleImg .= $applist["city"];
	 			 		*/
	 			 	
	      			if ($imgempty == false) { 
	      				$urlphotosnippet = str_replace(".jpg", "-s.jpg", $urlphotosnippet);
	      				break;
	      			}
	      			 
	      		endforeach;

	      		if ($imgempty != false) { 
	      				$urlphotosnippet = "https://storage.googleapis.com/immobilier-fr.fr/img-realestate/img-realestate-44/44-Maison-Annecy-44-1533419284813-1534239244024-s.jpg";
	      			}


?>

<?php 
	if ( get_home_url() == 'http://vps520391.ovh.net') { 
		echo '<meta name="robots" content="noindex,nofollow">';
	}
?>
<?php 
	if ( get_home_url() == 'http://vps671085.ovh.net') { 
	//	echo '<meta name="robots" content="noindex,nofollow">';
	}
?>
<?php 
	$title = $app['title'];
	if (empty($title)){
		$title = 'Vente appartement maison immobilier';
	}
?>

<title><?php echo apply_filters('the_title', $title);?></title>
<meta name="description" content="<?php echo replace_balise_html($app['hatArticle']) ?>">
<?php 
	//get_home_url()
	$linkBack =  get_home_url() . '/immo/' . $app['idUrlPageCocon'] .'/';
	$linkBack = str_replace(' ', '-', $linkBack);
?>
<link rel="canonical" href="<?php echo $linkBack ?>" />

<?php 
	$determinant = "un ";
		if ($app['lexie5'] == 'appartement'){
			$determinant = "un ";
		}else if ($app['lexie5'] == 'logement'){
			$determinant = "un ";
		}else if ($app['lexie5'] == 'chalet'){
			$determinant = "un ";
		}else if ($app['lexie5'] == 'terrain'){
			$determinant = "un ";
		}else{
			$determinant = "une ";
		}

	$snippet =  'Trouver ' . $determinant . $app['lexie5'] . ' à ' . $app['lexie4'] . ' ' . $app['lexie2'];
?>

<!-- Balisage JSON-LD généré par l'outil d'aide au balisage de données structurées de Google --> 
<script type="application/ld+json">
 { 
 "@context" : "http://schema.org", "@type" : "LocalBusiness", "name" : "<?php echo $snippet ?>", 
 "image" : "<?php echo esc_url_raw($urlphotosnippet) ?>", 
 "address" : { "@type" : "PostalAddress", "addressLocality" : "<?php echo $app['lexie4'] ?>" }
}
</script>

<?php 
wp_head();
?>



<style>
.site-header{
	top: -12px;
}
.headcontent {
   padding: 1.5em 0 0 0;
}
.propertiescontent {
   padding: 0 0 0 0;
}

.marginH1 {
	margin-bottom: -0.5em;
}
.marginH2 {
	margin-top: -1.0em;
	margin-bottom: -0.0em;
}

.marginMfirsth2 {
	margin-bottom: -0.0em;
}
.marginMh2 {
	margin-top: -1.2em;
	margin-bottom: -0.0em;
}
.marginA {
	margin-top: -0.8em;
	margin-bottom: -1.0em;
}

.full-realestate{
	margin-top: -3.5em;
	<?php 
		if ( wp_is_mobile() ) { 
			echo "max-width: 600px;";
		} else { 
			echo "width: 1240px;";
		} 	
	?>
}

.adjust-vertical-realestate{
	margin-top: -1.5em;
}
.pointer {
    cursor:pointer;
}
.button_nav {
    white-space: nowrap;
}

th, td {
    word-wrap: break-word;   
}

.contact {
    width:600px;
    table-layout:fixed;
}
.linkUnderline {
    text-decoration: underline;
    white-space: nowrap;
}

.width_content-realestate{width:900px;}
</style>

</head> 

<body <?php body_class(); ?>  <?php if ( ! wp_is_mobile() ) { ?>onresize="resizeScreen()"<?php } ?> onclick="rgpd()">
<!--width_content-realestate-->
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner" valign="top">

		<?php get_template_part( 'realestate-template-parts/header/header', 'imagerealestate' ); ?>
		
	</header><!-- #masthead <?php wp_title( '', true, 'right' ); ?> position: absolute;-->

	<div class="site-content-contain">
		<div id="content" class="site-content headcontent">
		<p id="msg"></p>


<div class="full-realestate" id="firstDiv">

<?php get_template_part( 'realestate-template-parts/header/rgpd-headerrealestate'); ?>

<?php if ( ! wp_is_mobile() ) { ?>
<div id="primary">
		<main id="main" role="main">
		    <table id="tablecontenu">
		    <tr>
		    	<td valign="top" colspan="5">
					  <H1 class="marginH1"><Strong><?php echo sanitize_text_field($app['title']); ?></Strong></H1>
				</td>
		    </tr>
		    <tr>
				<td style="width:300px;" valign="top">	
					<br>
		    	<?php foreach ($app_list as $applist): ?>
		   			<br>
		   			<a class="linkUnderline" target="_blank" href="<?php echo $urlDomBase?>/vente/<?php echo prepare_url(sanitize_text_field($applist['typeProperty']))?>/<?php echo prepare_url(sanitize_text_field($applist['city']))?>-<?php echo prepare_url(sanitize_text_field($applist['cp']))?>/<?php echo prepare_url(sanitize_text_field($applist['idRealEstate']))?>/">

		   		<?php
					$urlphoto = "";
					$caption = "";
					$imgempty = true;
			    	if ($applist['urlphoto1'] != ""){
			    		$urlphoto = $applist['urlphoto1'];$caption = $applist['caption1'];$imgempty = false;
					}else if ($applist['urlphoto2'] != ""){
			    		$urlphoto = $applist['urlphoto2'];$caption = $applist['caption2'];$imgempty = false;
					}else if ($applist['urlphoto3'] != ""){
			    		$urlphoto = $applist['urlphoto3'];$caption = $applist['caption3'];$imgempty = false;
					}else if ($applist['urlphoto4'] != ""){
			    		$urlphoto = $applist['urlphoto4'];$caption = $applist['caption4'];$imgempty = false;
					}else if ($applist['urlphoto5'] != ""){
			    		$urlphoto = $applist['urlphoto5'];$caption = $applist['caption5'];$imgempty = false;
					}else if ($applist['urlphoto6'] != ""){
			    		$urlphoto = $applist['urlphoto6'];$caption = $applist['caption6'];$imgempty = false;
					}
	 			 	?>
	 			 	<?php $titleImg = sanitize_text_field($applist["typeProperty"]);
	 			 		$titleImg .= ' ' . sanitize_text_field($applist["surface"]) . ' m2 ';
	 			 		if (sanitize_text_field($applist['room']) > 1) {$titleImg .= $applist["room"] . ' pièces '; }else{
	 			 			$titleImg .= $applist["room"] . ' pièce ';
	 			 		}
	 			 		$titleImg .= $applist["city"];
	 			 	?> 
	      			<?php if ($imgempty == false) : ?>
	      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
		      			<img class="showreal" style="width:300px;height:190px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlphoto) ?>"/>
	      			<?php else : ?>
	      				<img class="showreal" style="width:300px;height:190px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
      				<?php endif; ?>	  
					<br>
						<?php echo sanitize_text_field($applist["typeProperty"])?> 
		      		<?php echo sanitize_text_field($applist["surface"])?> m2 
	      			<?php if (sanitize_text_field($applist['room']) > 1) : ?>
	      				<?php echo sanitize_text_field($applist["room"])?> pièces
	      			<?php else : ?>
	      				<?php echo sanitize_text_field($applist["room"])?> pièce
      				<?php endif; ?>
      				<br>
		      		<b>Prix: <?php echo number_format( sanitize_text_field($applist["price"]), 0, ',', ' ' )?> €</b>
		      		<br>
		      		<?php echo sanitize_text_field($applist["city"])?> <?php echo sanitize_text_field($applist["cp"])?>
		      		
					</a>
		      	
			<?php endforeach; ?>

		<!--	<?php if ($app['level'] == "0") {?>
				<?php if ($app['pageSisterPrevious'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["pageSisterPrevious"])?>'><?php echo $app["labelPageSisterPrevious"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['pageSisterNext'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["pageSisterNext"])?>'><?php echo $app["labelPageSisterNext"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
			<?php } ?>-->
			<?php if ($app['level'] > "0") {?>
				<?php if ($app['urlPageSister1'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister1"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister1"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister2'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister2"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister2"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister3'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister3"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister3"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister4'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister4"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister4"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister5'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister5"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister5"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister6'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister6"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister6"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister7'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister7"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister7"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister8'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister8"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister8"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister9'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister9"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister9"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister10'] != "") { ?>
					<?php $urlPageSiter = $urlDom . $app["urlPageSister10"]; ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlPageSiter)?>/'><?php echo $app["labelPageSister10"]?> </a>
				<?php } ?>
			<?php } ?>

			</td>
			<td width="1%"></td>
			<td>	
	    	<table> 
					<tr>
				      	<td valign="top">
				      		<?php if ($app['level'] == "1") {?>
						    	<?php 
								//	$linkBackList = get_home_url() . '/achat/' . $app['lexie5'] . '/0-piece/' . $app['lexie1'] . '/' . $app['lexie2'] . '-' . $app['lexie4'] . '/mini/max/1/';
									$linkBackList = get_home_url() . '/achat/' . $app['lexie5'] . '/' . $app['lexie2'] . '-' . $app['lexie4'] . '/';
									$linkBackList = str_replace(' ', '-', $linkBackList);
									$linkBackList = strtolower($linkBackList);
									$s_a_befor_city = ' ';
									if (sanitize_text_field($app['lexie4']) != "") { $s_a_befor_city = 's à ';}
									echo '<a href=' . $linkBackList . ' target="_blank"><button class="button_nav">Trouver des ' . $app['lexie5'] . $s_a_befor_city . $app['lexie4'] . '</button></a>';
	 							?>
	 						<?php } ?>
							<?php if ($app['level'] == "2") {?>
								<div class="marginA">
								<?php 
								$linkBack = get_home_url() . '/immo/' . $app['urlPageTarget']. '/';
								$linkBack = str_replace(' ', '-', $linkBack);
								echo '<br><a class="linkUnderline" href=' . $linkBack . '>Retour à ' . $app['labelPageTarget'] . '</a>';
								?>
								</div>
							<?php } ?>

							<?php if ($app['hatArticle'] != "") {
								echo '<br>'.replace_balise_html($app['hatArticle']);
								} ?>
						</td>
					</tr>
					<tr>
				      	<td valign="top">
				      		<?php if (sanitize_text_field($app['anchor1']) != "") { ?>
					    		<span id="<?php echo sanitize_text_field($app['anchor1']); ?>"></span>
					    	<?php }?><!--style="width:500px;height:300px;"-->
					   	<img class="showreal"  title="<?php echo $app['imageAlt1']; ?>" alt="<?php echo $app['imageAlt1']; ?>" id="img" src="<?php echo esc_url_raw($app['urlImage1']); ?>">
					    	
					    
						<?php if (sanitize_text_field($app['subTitle1']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle1']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA1']) != "") { echo replace_balise_html($app['paragraphA1']); }?>
					    <?php if ($app['urlLinkP1'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor1'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP1'] . '/#' . $app['urlTargetAnchor1'] ?>"><?php echo sanitize_text_field($app['labelLinkP1']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP1'] ?>/"><?php echo sanitize_text_field($app['labelLinkP1']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB1']) != "") { echo replace_balise_html($app['paragraphB1']);
					     }?>

					    <?php if (sanitize_text_field($app['anchor2']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor2']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle2']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle2']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA2']) != "") { echo replace_balise_html($app['paragraphA2']); }?>
					    <?php if ($app['urlLinkP2'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor2'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP2'] . '/#' . $app['urlTargetAnchor2'] ?>"><?php echo sanitize_text_field($app['labelLinkP2']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP2'] ?>/"><?php echo sanitize_text_field($app['labelLinkP2']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB2']) != "") { echo replace_balise_html($app['paragraphB2']);
					     }?>

					    <?php if (sanitize_text_field($app['anchor3']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor3']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle3']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle3']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA3']) != "") { echo replace_balise_html($app['paragraphA3']); }?>
					    <?php if ($app['urlLinkP3'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor3'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP3'] . '/#' . $app['urlTargetAnchor3'] ?>"><?php echo sanitize_text_field($app['labelLinkP3']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP3'] ?>/"><?php echo sanitize_text_field($app['labelLinkP3']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB3']) != "") { echo replace_balise_html($app['paragraphB3']);
					     }?>

					    <?php if (sanitize_text_field($app['anchor4']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor4']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle4']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle4']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA4']) != "") { echo replace_balise_html($app['paragraphA4']); }?>
					    <?php if ($app['urlLinkP4'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor4'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP4'] . '/#' . $app['urlTargetAnchor4'] ?>"><?php echo sanitize_text_field($app['labelLinkP4']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP4'] ?>/"><?php echo sanitize_text_field($app['labelLinkP4']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB4']) != "") { echo replace_balise_html($app['paragraphB4']);
					     }?>

					    <?php if (sanitize_text_field($app['anchor5']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor5']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle5']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle5']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA5']) != "") { echo replace_balise_html($app['paragraphA5']); }?>
					    <?php if ($app['urlLinkP5'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor5'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP5'] . '/#' . $app['urlTargetAnchor5'] ?>"><?php echo sanitize_text_field($app['labelLinkP5']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP5'] ?>/"><?php echo sanitize_text_field($app['labelLinkP5']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB5']) != "") { echo replace_balise_html($app['paragraphB5']);
					     }?>

					     <?php if (sanitize_text_field($app['anchor6']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor6']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle6']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle6']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA6']) != "") { echo replace_balise_html($app['paragraphA6']); }?>
					    <?php if ($app['urlLinkP6'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor6'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP6'] . '/#' . $app['urlTargetAnchor6'] ?>"><?php echo sanitize_text_field($app['labelLinkP6']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP6'] ?>/"><?php echo sanitize_text_field($app['labelLinkP6']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB6']) != "") { echo replace_balise_html($app['paragraphB6']);
					     }?>

					     <?php if (sanitize_text_field($app['anchor7']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor7']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle7']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle7']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA7']) != "") { echo replace_balise_html($app['paragraphA7']); }?>
					    <?php if ($app['urlLinkP7'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor7'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP7'] . '/#' . $app['urlTargetAnchor7'] ?>"><?php echo sanitize_text_field($app['labelLinkP7']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP7'] ?>/"><?php echo sanitize_text_field($app['labelLinkP7']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB7']) != "") { echo replace_balise_html($app['paragraphB7']);
					     }?>

					     <?php if (sanitize_text_field($app['anchor8']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor8']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle8']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle8']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA8']) != "") { echo replace_balise_html($app['paragraphA8']); }?>
					    <?php if ($app['urlLinkP8'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor8'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP8'] . '/#' . $app['urlTargetAnchor8'] ?>"><?php echo sanitize_text_field($app['labelLinkP8']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP8'] ?>/"><?php echo sanitize_text_field($app['labelLinkP8']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB8']) != "") { echo replace_balise_html($app['paragraphB8']);
					     }?>
					     
					     <?php if (sanitize_text_field($app['anchor9']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor9']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle9']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle9']); ?></Strong></h2>
					    <?php } ?>
					    <?php if (sanitize_text_field($app['paragraphA9']) != "") { echo replace_balise_html($app['paragraphA9']); }?>
					    <?php if ($app['urlLinkP9'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor9'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP9'] . '/#' . $app['urlTargetAnchor9'] ?>"><?php echo sanitize_text_field($app['labelLinkP9']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP9'] ?>/"><?php echo sanitize_text_field($app['labelLinkP9']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB9']) != "") { echo replace_balise_html($app['paragraphB9']);
					     }?>

					     <?php if (sanitize_text_field($app['anchor10']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($app['anchor10']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($app['subTitle10']) != "") { ?>
					    	<h2 class="marginH2"><Strong><?php echo sanitize_text_field($app['subTitle10']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphA10']) != "") { echo replace_balise_html($app['paragraphA10']); }?>
					    <?php if ($app['urlLinkP10'] != "") { ?>
					    	<?php if ($app['urlTargetAnchor10'] != "") { ?>
					    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP10'] . '/#' . $app['urlTargetAnchor10'] ?>"><?php echo sanitize_text_field($app['labelLinkP10']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP10'] ?>/"><?php echo sanitize_text_field($app['labelLinkP10']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($app['paragraphB10']) != "") { echo replace_balise_html($app['paragraphB10']);
					     }?>
						</td>					
				</tr>
			</table>
			</td>
			<td width="1%"></td>

				<?php if ( $pubOn ) { ?>
      		<!--		<?php if ( ! wp_is_mobile() ) { ?>-->
					<td align="left" valign="top">
					<br><br>						
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						 <!--EmailingSkyscraper300x600 -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:300px;height:600px"
						     data-ad-client="ca-pub-7351030609964877"
						     data-ad-slot="3770514742"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>						
		 			</td>  
		 		<!--	<?php } ?>	-->
		 			<?php } else {?>
	 					<td align="left" valign="top">	
 						<br>
				    	<img class="showreal" style="width:300px;height:600px;" alt="" id="imgRight" src="<?php echo esc_url_raw($app_img['urlphotoAccount3']); ?>">
				    	</td> 
					<?php } ?>

			</tr>
			</table>


		    <?php if ( $siteRealestateOn) { ?> 
				<!-- Global site tag (gtag.js) - Google Analytics -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-99021046-1"></script>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', 'UA-99021046-1');
				</script>
			<?php } ?>	
		</main>
	</div>
</div>
</div>
</div>
</div>
<?php }  ?>



<?php if ( wp_is_mobile() ) { ?>
<div id="primary">
		<main id="main" role="main" align="left">	
			<H1><Strong><?php echo sanitize_text_field($app['title']); ?></Strong></H1>
			<?php if ($app['level'] == "1") { ?>
				<?php
			//	$linkBackList = get_home_url() . '/achat/' . $app['lexie5'] . '/0-piece/' . $app['lexie1'] . '/' . $app['lexie2'] . '-' . $app['lexie2'] . '/mini/max/1/';
				$linkBackList = get_home_url() . '/achat/' . $app['lexie5'] . '/' . $app['lexie2'] . '-' . $app['lexie4'] . '/';
				$linkBackList = str_replace(' ', '-', $linkBackList);
				$linkBackList = strtolower($linkBackList);
				 
				$s_a_befor_city = ' ';
				if (sanitize_text_field($app['lexie4']) != "") { $s_a_befor_city = 's à ';}
				echo '<a href=' . $linkBackList . ' target="_blank"><button class="button_nav">Trouver des ' . $app['lexie5'] . $s_a_befor_city . $app['lexie4'] . '</button></a>';?>
			<?php } ?>
			<?php if ($app['level'] == "2") { ?>
				<div class="marginA">
				<?php
				$linkBack = get_home_url() . '/immo/' . $app['urlPageTarget']. '/';
				$linkBack = str_replace(' ', '-', $linkBack);
				echo '<br><a class="linkUnderline" href=' . $linkBack . '>Retour à ' . $app['labelPageTarget'] . '</a>';
				?>
				</div>
			<?php } ?>

			<?php if ($app['hatArticle'] != "") {
				echo '<br>'.replace_balise_html($app['hatArticle']);
				} ?>


				<?php if (sanitize_text_field($app['anchor1']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor1']); ?>"></span>
			    <?php }?>
			    	<br><img class="showreal" style="width:600px;height:400px;" title="<?php echo $app['imageAlt1']; ?>" alt="<?php echo $app['imageAlt1']; ?>" id="img" src="<?php echo esc_url_raw($app['urlImage1']); ?>">

		    	  <br>
		<!--	<?php if ($app['level'] == "0") {?>
				<?php if ($app['pageSisterPrevious'] != "") { ?>
					<a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["pageSisterPrevious"])?>'><?php echo $app["labelPageSisterPrevious"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['pageSisterNext'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["pageSisterNext"])?>'><?php echo $app["labelPageSisterNext"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
			<?php } ?>
		-->
			<?php if ($app['level'] > "0") {?>
				<?php if ($app['urlPageSister1'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister1"])?>/'><?php echo $app["labelPageSister1"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister2'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister2"])?>/'><?php echo $app["labelPageSister2"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister3'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister3"])?>/'><?php echo $app["labelPageSister3"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister4'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister4"])?>/'><?php echo $app["labelPageSister4"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister5'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister5"])?>/'><?php echo $app["labelPageSister5"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister6'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister6"])?>/'><?php echo $app["labelPageSister6"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister7'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister7"])?>/'><?php echo $app["labelPageSister7"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister8'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister8"])?>/'><?php echo $app["labelPageSister8"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister9'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister9"])?>/'><?php echo $app["labelPageSister9"]?> </a>&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<?php if ($app['urlPageSister10'] != "") { ?>
					<br><a class="linkUnderline" target="_blank" href='<?php echo esc_url_raw($urlDom.$app["urlPageSister10"])?>/'><?php echo $app["labelPageSister10"]?> </a>
				<?php } ?>
			<?php } ?>
					

				<?php if (sanitize_text_field($app['subTitle1']) != "") { ?>
						<h2><Strong><?php echo sanitize_text_field($app['subTitle1']); ?></Strong></h2>
				    <?php }?>
				    <?php if (sanitize_text_field($app['paragraphA1']) != "") { echo replace_balise_html($app['paragraphA1']); }?>
				    <?php if ($app['urlLinkP1'] != "") { ?>
				    	<?php if ($app['urlTargetAnchor1'] != "") { ?>
				    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP1'] . '/#' . $app['urlTargetAnchor1'] ?>"><?php echo sanitize_text_field($app['labelLinkP1']); ?></a>
		    			<?php } else { ?>	
		    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP1'] ?>/"><?php echo sanitize_text_field($app['labelLinkP1']); ?></a>   
		    			<?php }?> 	
				    <?php }?>
				    <?php if (sanitize_text_field($app['paragraphB1']) != "") { echo replace_balise_html($app['paragraphB1']);
			     }?>	




			     <?php $nbcol = 0; ?>
			     <table>
			     	<tr>
			     <?php foreach ($app_list as $applist): ?>	
			     	<td>	   			
		   			<a class="linkUnderline" target="_blank" href="<?php echo $urlDomBase?>/vente/<?php echo prepare_url(sanitize_text_field($applist['typeProperty']))?>/<?php echo prepare_url(sanitize_text_field($applist['city']))?>-<?php echo prepare_url(sanitize_text_field($applist['cp']))?>/<?php echo prepare_url(sanitize_text_field($applist['idRealEstate']))?>/">

		   		<?php
		   			$nbcol += 1;
					$urlphoto = "";
					$caption = "";
					$imgempty = true;
			    	if ($applist['urlphoto1'] != ""){
			    		$urlphoto = $applist['urlphoto1'];$caption = $applist['caption1'];$imgempty = false;
					}else if ($applist['urlphoto2'] != ""){
			    		$urlphoto = $applist['urlphoto2'];$caption = $applist['caption2'];$imgempty = false;
					}else if ($applist['urlphoto3'] != ""){
			    		$urlphoto = $applist['urlphoto3'];$caption = $applist['caption3'];$imgempty = false;
					}else if ($applist['urlphoto4'] != ""){
			    		$urlphoto = $applist['urlphoto4'];$caption = $applist['caption4'];$imgempty = false;
					}else if ($applist['urlphoto5'] != ""){
			    		$urlphoto = $applist['urlphoto5'];$caption = $applist['caption5'];$imgempty = false;
					}else if ($applist['urlphoto6'] != ""){
			    		$urlphoto = $applist['urlphoto6'];$caption = $applist['caption6'];$imgempty = false;
					}
	 			 	?>
	 			 	<?php $titleImg = sanitize_text_field($applist["typeProperty"]);
	 			 		$titleImg .= ' ' . sanitize_text_field($applist["surface"]) . ' m2 ';
	 			 		if (sanitize_text_field($applist['room']) > 1) {$titleImg .= $applist["room"] . ' pièces '; }else{
	 			 			$titleImg .= $applist["room"] . ' pièce ';
	 			 		}
	 			 		$titleImg .= $applist["city"];
	 			 	?> 
	      			<?php if ($imgempty == false) : ?>
	      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
		      			<img class="showreal" style="width:250px;height:130px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlphoto) ?>"/>
	      			<?php else : ?>
	      				<img class="showreal" style="width:250px;height:130px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
      				<?php endif; ?>	  
					<br>
						<?php echo sanitize_text_field($applist["typeProperty"])?> 
		      		<?php echo sanitize_text_field($applist["surface"])?> m2 
	      		<!--	<?php if (sanitize_text_field($applist['room']) > 1) : ?>
	      				<?php echo sanitize_text_field($applist["room"])?> pièces
	      			<?php else : ?>
	      				<?php echo sanitize_text_field($applist["room"])?> pièce
      				<?php endif; ?>-->
      				<br>
		      		<b>Prix: <?php echo number_format( sanitize_text_field($applist["price"]), 0, ',', ' ' )?> €</b>
		      		<br>
		      		<?php echo sanitize_text_field($applist["city"])?> <?php echo sanitize_text_field($applist["cp"])?>
					</a>
		      	</td>
				<?php endforeach; ?>
				</tr>
				

				<?php if ($nbcol == 0){$nbcol = 1;} ?>
				<tr><td colspan="<?php echo $nbcol ?>"> 

				<?php if (sanitize_text_field($app['anchor2']) != "") { ?>
				    	<span id="<?php echo sanitize_text_field($app['anchor2']); ?>"></span>
				    <?php }?>
				<?php if (sanitize_text_field($app['subTitle2']) != "") { ?>					
			    	<h2 class="marginMfirsth2"><Strong><?php echo sanitize_text_field($app['subTitle2']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA2']) != "") { echo replace_balise_html($app['paragraphA2']); }?>
			    <?php if ($app['urlLinkP2'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor2'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP2'] . '/#' . $app['urlTargetAnchor2'] ?>"><?php echo sanitize_text_field($app['labelLinkP2']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP2'] ?>/"><?php echo sanitize_text_field($app['labelLinkP2']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB2']) != "") { echo replace_balise_html($app['paragraphB2']);
			     }?>

				<?php if (sanitize_text_field($app['anchor3']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor3']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle3']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle3']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA3']) != "") { echo replace_balise_html($app['paragraphA3']); }?>
			    <?php if ($app['urlLinkP3'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor3'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP3'] . '/#' . $app['urlTargetAnchor3'] ?>"><?php echo sanitize_text_field($app['labelLinkP3']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP3'] ?>/"><?php echo sanitize_text_field($app['labelLinkP3']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB3']) != "") { echo replace_balise_html($app['paragraphB3']);
			     }?>

			    <?php if (sanitize_text_field($app['anchor4']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor4']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle4']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle4']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA4']) != "") { echo replace_balise_html($app['paragraphA4']); }?>
			    <?php if ($app['urlLinkP4'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor4'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP4'] . '/#' . $app['urlTargetAnchor4'] ?>"><?php echo sanitize_text_field($app['labelLinkP4']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP4'] ?>/"><?php echo sanitize_text_field($app['labelLinkP4']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB4']) != "") { echo replace_balise_html($app['paragraphB4']);
			     }?>

			    <?php if (sanitize_text_field($app['anchor5']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor5']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle5']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle5']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA5']) != "") { echo replace_balise_html($app['paragraphA5']); }?>
			    <?php if ($app['urlLinkP5'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor5'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP5'] . '/#' . $app['urlTargetAnchor5'] ?>"><?php echo sanitize_text_field($app['labelLinkP5']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP5'] ?>/"><?php echo sanitize_text_field($app['labelLinkP5']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB5']) != "") { echo replace_balise_html($app['paragraphB5']);
			     }?>

			     <?php if (sanitize_text_field($app['anchor6']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor6']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle6']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle6']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA6']) != "") { echo replace_balise_html($app['paragraphA6']); }?>
			    <?php if ($app['urlLinkP6'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor6'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP6'] . '/#' . $app['urlTargetAnchor6'] ?>"><?php echo sanitize_text_field($app['labelLinkP6']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP6'] ?>/"><?php echo sanitize_text_field($app['labelLinkP6']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB6']) != "") { echo replace_balise_html($app['paragraphB6']);
			     }?>

			     <?php if (sanitize_text_field($app['anchor7']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor7']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle7']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle7']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA7']) != "") { echo replace_balise_html($app['paragraphA7']); }?>
			    <?php if ($app['urlLinkP7'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor7'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP7'] . '/#' . $app['urlTargetAnchor7'] ?>"><?php echo sanitize_text_field($app['labelLinkP7']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP7'] ?>/"><?php echo sanitize_text_field($app['labelLinkP7']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB7']) != "") { echo replace_balise_html($app['paragraphB7']);
			     }?>

			     <?php if (sanitize_text_field($app['anchor8']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor8']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle8']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle8']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA8']) != "") { echo replace_balise_html($app['paragraphA8']); }?>
			    <?php if ($app['urlLinkP8'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor8'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP8'] . '/#' . $app['urlTargetAnchor8'] ?>"><?php echo sanitize_text_field($app['labelLinkP8']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP8'] ?>/"><?php echo sanitize_text_field($app['labelLinkP8']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB8']) != "") { echo replace_balise_html($app['paragraphB8']);
			     }?>

			     <?php if (sanitize_text_field($app['anchor9']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor9']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle9']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle9']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA9']) != "") { echo replace_balise_html($app['paragraphA9']); }?>
			    <?php if ($app['urlLinkP9'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor9'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP9'] . '/#' . $app['urlTargetAnchor9'] ?>"><?php echo sanitize_text_field($app['labelLinkP9']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP9'] ?>/"><?php echo sanitize_text_field($app['labelLinkP9']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB9']) != "") { echo replace_balise_html($app['paragraphB9']);
			     }?>

			     <?php if (sanitize_text_field($app['anchor10']) != "") { ?>
			    	<span id="<?php echo sanitize_text_field($app['anchor10']); ?>"></span>
			    <?php }?>
				<?php if (sanitize_text_field($app['subTitle10']) != "") { ?>
			    	<h2 class="marginMh2"><Strong><?php echo sanitize_text_field($app['subTitle10']); ?></Strong></h2>
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphA10']) != "") { echo replace_balise_html($app['paragraphA10']); }?>
			    <?php if ($app['urlLinkP10'] != "") { ?>
			    	<?php if ($app['urlTargetAnchor10'] != "") { ?>
			    			<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP10'] . '/#' . $app['urlTargetAnchor10'] ?>"><?php echo sanitize_text_field($app['labelLinkP10']); ?></a>
	    			<?php } else { ?>	
	    					<a class="linkUnderline" href="<?php echo $urlDom.$app['urlLinkP10'] ?>/"><?php echo sanitize_text_field($app['labelLinkP10']); ?></a>   
	    			<?php }?> 	
			    <?php }?>
			    <?php if (sanitize_text_field($app['paragraphB10']) != "") { echo replace_balise_html($app['paragraphB10']);
			     }?>
			 </td>
			</tr>
			</table>
			


		    <?php if ( $siteRealestateOn) { ?> 
				<!-- Global site tag (gtag.js) - Google Analytics -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-99021046-1"></script>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', 'UA-99021046-1');
				</script>
			<?php } ?>	
		</main>
	</div>
</div>
</div>
</div>
</div>
<?php }  ?>


<?php function replace_balise_html($text){
	if($text != ""){
		$text = str_replace('< br >', '<br>', $text);
		$text = str_replace('< b >', '<b>', $text);
		$text = str_replace('< / b >', '</b>', $text);

		$text = str_replace('< i >', '<i>', $text);
		$text = str_replace('< / i >', '</i>', $text);

		$text = str_replace('< u >', '<u>', $text);
		$text = str_replace('< / u >', '</u>', $text);
	}
	return $text;
	} 
?>

<script type="text/javascript">
		function resizeScreen() {
		var largScreen = window.innerWidth;
		var largDiv = document.getElementById('firstDiv').clientWidth -20;
		var left = 0;
		left = (largScreen - largDiv)/2;
		var leftP = (left / largScreen)*100;
		document.getElementById('firstDiv').style.marginLeft = leftP + "%";
		document.getElementById('firstDiv').style.marginRight = leftP + "%";
		document.getElementById("tablecontenu").style.width = largDiv + "px";

	}
	resizeScreen();

	function openWin(url) {
		    window.open(url);
		}
	  
</script>

<script type="text/javascript">

function empty_field(string) {

      var validity = true;

      if( string == '' ) { validity = false; }

      return validity;
    }
    function sanitize_string(string) {

      var validity = true;

      if( string.match( /[|<|,|>|\/|"|{|\[|}|\]|\||\\|~|`|!|@|#|\$|%|\^|&|\*|\(|\)|_|=]+/ ) != null ) {
          validity = false;
      }

      return validity;
    }

    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    function is_url(str) {
	  regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
	        if (regexp.test(str))
	        {
	          return true;
	        }
	        else
	        {
	          return false;
	        }
	}


    function setMsgError(idmsg, msgError, idField){
      document.getElementById(idmsg).innerHTML = msgError;
      document.getElementById(idmsg).style.color = "red";
      document.getElementById(idmsg).style.fontWeight = "bold";
      document.getElementById(idField).focus();
      document.getElementById(idField).style.color = "red";
    }

    function resetColorField(idField, idmsg){
      document.getElementById(idField).style.color = 'black';         
      document.getElementById(idmsg).innerHTML = '';
      document.getElementById(idmsg).style.color = "green";
    }

	</script>
<?php function prepare_url($field){
	$field = str_replace(" ","-",strtolower($field));
	return $field;
	} 
?>
		</body>
</html>
