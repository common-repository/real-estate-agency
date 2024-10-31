<?php
/**
 * Template Name: RealEstateProperty
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Real estate
 * @since 1.0
 * @version 1.0
 */
?>
<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php 
	$pubOn = false;
	$linkPromoOn = false;
	$siteRealestateOn = false;
	if ( get_home_url() == 'http://vps520391.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
	if ( get_home_url() == 'http://vps671085.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
	if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
	if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour la Production

        	global $wpdb;
			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;
			$fieldFilter = 'keyEmailAccount';
			$valueStringField = $result->email_realestate;
			$indexTypeProperty = '0';


			// pour les tests
			if ( get_home_url() == 'http://vps520391.ovh.net') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$login = "ppatrick500@yahoo.fr";
			} 
			// pour les tests
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
			$urlDom = get_home_url();

			$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";

			// Read compte pour img
 			$data = array('service' => 'readAccount', 'plateform' => '1', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_img = file_get_contents($url, false, $context);
			$app_img = json_decode($app_list_img, true);



			global $wp_query;
			$id_property = urldecode ( $wp_query->query_vars['idproperty']);
			$keyProperty = $wp_query->query_vars['idproperty'];
			$type_property = ucfirst($type_property);

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
				$indexTypeProperty = '100';
			}

			$room = urldecode ( $wp_query->query_vars['room']);
			$room = str_replace("-pieces","",$room);
			$room = str_replace("-piece","",$room);

			$zipselect = urldecode ( $wp_query->query_vars['dept']);
			if ($zipselect == 'dept'){
				$zipselectselected = 'dept'; $zipselect = '';
			}
			else{
				$zipselectselected = $zipselect;
			}
			$zipcityselect = urldecode ( $wp_query->query_vars['zipcity']);
			if ($zipcityselect == 'cp-ville'){
				$zipcityselectselected = 'Cp ville'; $zipcityselect = '';
			}
			else{
				$zipcityselectselected = $zipcityselect;
				$zipcityselect = substr($zipcityselect,0,5);
			}
			$pricestart = urldecode ( $wp_query->query_vars['pricestart']);
			if ($pricestart == 'mini'){
				$pricestartselected = 'mini'; $pricestart = '';
			}
			else{
				$pricestartselected = $pricestart;
			}
			$priceend = urldecode ( $wp_query->query_vars['priceend']);
			if ($priceend == 'max'){
				$priceendselected = 'max'; $priceend = '';
			}
			else{
				$priceendselected = $priceend;
			}

			$urlLogo = plugins_url() . '/real-estate-agency/theme-realestate/realestate-template-parts/image/'. 'Logo-Real-estate-Medium-WP-Comp.jpg'; //png
			
        //    $url = "https://real-estate-france-DB.appspot.com/managedb";
            $url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";

 			$data = array('service' => 'getRealestate', 'plateform' => '1', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'id' => $id_property, 'currentPage' => '1', 'numberSize' => '5');


			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app = json_decode($app_list, true);


//echo "app A is: '".implode("','",$data). "  nb " . sizeof($app) . "'<br><br><br>";

			$paramcount = '?service=' . 'updatePropertyViewCount' . '&login=' . $login . '&pwdCripted=' . '' . '&keyCustomer=' . '' . '&idc=' . '' . '&keyProperty=' . $id_property;
	
			$urlcount = $url . $paramcount;
			$app_count = file_get_contents($urlcount);			



			$currentCreationDate = $app['creationDate'];
		//	echo '$currentCreationDate ' . $currentCreationDate . '<br><br><br>';
			//	$indexTypeProperty = '0';  
			$room = "0";
			$zipselect = $app['dept']; //"74";
			$zipcityselect = $app['cp']; //$app['lexie5']; //74000
			$pricestart = "";
			$priceend = "";
			$pageSelected = "1";
			$nbPropertiesByPage = 1;


			$data = array('service' => 'readPreviousPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'currentCreationDate' => $currentCreationDate, 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLink = file_get_contents($url, false, $context);
			$app_listLink = json_decode($app_listLink, true);

	//	echo "app_listLink A is: '".implode("','",$data). "  nb " . sizeof($app_listLink) . "'<br><br>";


//readPreviousPropertiesWeb','1','','ppatrick500@yahoo.fr','','','','keyMasterNetWork5','','1542626536689','1','0','73','73100','','','1','1 nb 0
//
	//		echo 'app_listLink s ' . sizeof($app_listLink) . '<br>';
		if (sizeof($app_listLink) < 1 ){	
			$data = array('service' => 'readLastPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'currentCreationDate' => $currentCreationDate, 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLink = file_get_contents($url, false, $context);
			$app_listLink = json_decode($app_listLink, true);
		}
	//	echo "deb";
	//	print_r($app_listLink);
	//	echo "fin<br><br><br><br>";
			
			$data = array('service' => 'readNextPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'currentCreationDate' => $currentCreationDate, 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLinknext = file_get_contents($url, false, $context);
			$app_listLinknext = json_decode($app_listLinknext, true);

		//	echo "app_listLinknext B is: '".implode("','",$data). "  nb " . sizeof($app_listLinknext) . "'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
			
		if (sizeof($app_listLinknext) < 1 ){	
			$data = array('service' => 'readFirstPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'currentCreationDate' => $currentCreationDate, 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLinknext = file_get_contents($url, false, $context);
			$app_listLinknext = json_decode($app_listLinknext, true);
		}


	$nbPropertiesFull = 3;
		$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesFull);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLinknextfull = file_get_contents($url, false, $context);
			$app_listLinknextfull = json_decode($app_listLinknextfull, true);


			if (sizeof($app_listLinknextfull) < 1 ){	
			$data = array('service' => 'readFirstPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'currentCreationDate' => $currentCreationDate, 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLinknextfull = file_get_contents($url, false, $context);
			$app_listLinknextfull = json_decode($app_listLinknextfull, true);

		//	echo "app_listLinknext size B" . sizeof($app_listLinknextfull) . '<br><br><br>';
		}

		//	echo sizeof($app_listLinkFull) . '<br><br>';
/*
		if (sizeof($app_listLink) < 3 ){
			$zipcityselect = '';
			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
		 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLink = file_get_contents($url, false, $context);
			$app_listLink = json_decode($app_listLink, true);
		}
  
		if (sizeof($app_listLink) < 3 ){
			$zipcityselect = '';
			$indexTypeProperty = '0';  
			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
		 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLink = file_get_contents($url, false, $context);
			$app_listLink = json_decode($app_listLink, true);
		}

		if (sizeof($app_listLink) < 3 ){
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
			$app_listLink = file_get_contents($url, false, $context);
			$app_listLink = json_decode($app_listLink, true);
		}
*/

/* link page city cocon */
/*
		$level = '0';$lexie1 = $zipselect;$lexie5 = 'appartement';
		$lexie1 = '73';
		$pageSelected = "1";
		$nbPropertiesByPage = 15;
		$data = array('service' => 'readPageCoconForIndexCityByDept', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'level' => $level, 'lexie1' => $lexie1, 'lexie5' => $lexie5, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data)
							));			

				$context = stream_context_create($options);
				$app_list_citybydept = file_get_contents($url, false, $context);
				$app_list_citybydept = json_decode($app_list_citybydept, true);

			//	echo "list data B is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";
*/

			?>
<?php get_template_part( 'header', 'realestate' ); ?>


<?php 
$title = 'Vente ' . strtolower($app['typeProperty'] . ' ' . $app['city'] . ' ' . $app['cp']);
$urlPageParam = strtolower("/vente/" . $app['typeProperty']  . "/" . $app['city'] . "-" . $app['cp'] . "/" . $app['idRealEstate'] . "/");
$urlPageParam = str_replace(" ","-",$urlPageParam);
$urlPage = get_home_url() . $urlPageParam;
$urlPageCanonical = get_home_url() . $urlPageParam;


$imgFirstCol = "";
$urlphotosnippet = '';

			if ($app['urlphoto1'] != ''){
		 		$imgFirstCol = $app['urlphoto1'];
		 	}elseif ($app['urlphoto2'] != ''){
		 		$imgFirstCol = $app['urlphoto2'];
			}elseif ($app['urlphoto3'] != ''){
				$imgFirstCol = $app['urlphoto3'];
			}elseif ($app['urlphoto4'] != ''){
				$imgFirstCol = $app['urlphoto4'];
			}elseif ($app['urlphoto5'] != ''){
				$imgFirstCol = $app['urlphoto5'];
			}elseif ($app['urlphoto6'] != ''){
				$imgFirstCol = $app['urlphoto6'];
			}else{
				$imgFirstCol = $urlLogo;
			} ?>

<?php 
	$imgFirstCol = esc_url_raw(strtolower($imgFirstCol));
	$urlphotosnippet = $imgFirstCol;
	$info     = pathinfo($urlLogo);

	if ($urlphotosnippet == '') { 
		$urlphotosnippet = "https://storage.googleapis.com/immobilier-fr.fr/img-realestate/img-realestate-44/44-Maison-Annecy-44-1533419284813-1534239244024-s.jpg";
	}else{
		$urlphotosnippet = str_replace(".jpg", "-s.jpg", $urlphotosnippet);
	}

$basename = $info['basename'];

$ext      = $info['extension'];

?>
<link rel="canonical" href="<?php echo esc_url_raw($urlPageCanonical) ?>" />
<meta name="description" content="<?php echo strip_tags(replace_balise_html(substr($app["textDescription"], 0, 200))) ?>">

<?php 
	$determinant = "un ";
		$propertySnippet   = strtolower($app['typeProperty']);
		if ($propertySnippet == 'villa'){
			$determinant = "une ";
		}else if ($propertySnippet == 'maison'){
			$determinant = "une ";
		}else if ($propertySnippet == 'ferme'){
			$determinant = "une ";
		}else if ($propertySnippet == 'propriete'){
			$determinant = "une ";
		}else if ($propertySnippet == 'terrain'){
			$determinant = "une ";
		}else{
			$determinant = "un ";
		}

		if ($propertySnippet == 'locaux'){
			$propertySnippet == 'local';
		}

	$snippet =  'Trouver ' . $determinant . $propertySnippet . ' à ' . $app['city'] . ' ' . $app['cp'];
?>

<!-- Balisage JSON-LD généré par l'outil d'aide au balisage de données structurées de Google --> 
<script type="application/ld+json">
 { 
 "@context" : "http://schema.org", "@type" : "LocalBusiness", "name" : "<?php echo $snippet ?>", 
 "image" : "<?php echo esc_url_raw($urlphotosnippet) ?>", 
 "address" : { "@type" : "PostalAddress", "addressLocality" : "<?php echo $app['city'] ?>" }
}
</script>

<meta property="og:url"           content="<?php echo $urlPage ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $title ?>" />
<meta property="og:description"   content="<?php echo substr($app["textDescription"], 0, 150) . ' ...';?>" />
<meta property="og:image"         content="<?php echo esc_url_raw($imgFirstCol) ?>" />


<?php if ( $pubOn ) { ?>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	     (adsbygoogle = window.adsbygoogle || []).push({
	          google_ad_client: "ca-pub-7351030609964877",
	          enable_page_level_ads: true
	     });
	</script>	
<?php } ?>

</head> 

<style>
.site-header{
	top: -12px;
}
.headcontent {
   padding: 1.5em 0 0 0;
}
.site-header-image{	
	padding: 0 0 0 0;
	<?php 
		if ( wp_is_mobile() ) { 
			echo "margin-top: -700px;";
		} else { 
			echo "margin-top: -600px;";
		} 
	?>
}

.text-description-header{	
	<?php 
		if ( wp_is_mobile() ) { 
			echo "margin-top: -3.5em;";
		} else { 
			echo "margin-top: -3.5em;";
		} 	
	?>
}

.width_content-realestate{width:900px;}
</style>

<body <?php body_class(); ?>  onresize="resizeScreenHead()" onclick="rgpd()">

<!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

 


<!-- Load Facebook SDK for JavaScript -->
  <!--<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>-->

<div id="page" class="site" class="width_content-realestate">
	<header id="masthead" class="site-header" role="banner" valign="top">
		
<div class="site-branding">
<?php
	      				$imgEmpty = false;
	      				if ($app['urlphoto1'] != ''){
	      				 	 $imgFirstCol = $app['urlphoto1']; $imgEmpty = true;
      				 	}elseif ($app['urlphoto2'] != ''){
      				 		$imgFirstCol = $app['urlphoto2']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto3'] != ''){
  				 			$imgFirstCol = $app['urlphoto3']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto4'] != ''){
  				 			$imgFirstCol = $app['urlphoto4']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto5'] != ''){
  				 			$imgFirstCol = $app['urlphoto5']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto6'] != ''){
  				 			$imgFirstCol = $app['urlphoto6']; $imgEmpty = true;
			 			}
			 			$imgFirstCol = strtolower($imgFirstCol);
      				 	?>
		      			<?php if ($imgEmpty == true) : ?>
			      			<img class="showreal site-header-image" style="width:100%;height:800px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaption']) ?>" id="imgheader" src="<?php echo esc_url_raw($imgFirstCol)?>">
		      			<?php else : ?>
		      				<img class="showreal site-header-image" style="width:100%;height:800px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="imgheader" src="<?php echo esc_url_raw($urlLogo) ?>">
	      				<?php endif; ?>
	    <div class="wrap">
		<!--<div class="site-branding-text">-->	
			<?php
			$link_home_nofollow = 'rel="nofollow"';
			$pagetesttitle = get_home_url() . "/listeagenceimmo/";
			if ( get_permalink() == $pagetesttitle){ $link_home_nofollow = ''; }
			$pagename = get_query_var('pagename');
			if ( $pagename == 'listproperties'){ $link_home_nofollow = ''; }
			if ( $pagename == 'contactagence'){ $link_home_nofollow = ''; }
				
			?>		
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title text-description-header"><a <?php echo $link_home_nofollow ?> href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title text-description-header"><a <?php echo $link_home_nofollow ?> href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :
			?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php endif; ?>
		<!--</div> .site-branding-text -->
		</div><!-- .wrap -->
		</div><!-- .site-branding -->

	</header><!-- #masthead <?php wp_title( '', true, 'right' ); ?> position: absolute;-->

	<div class="site-content-contain">
		<div id="content" class="site-content headcontent">
		<p id="msg"></p>




<script type="text/javascript">
	
	function resizeScreenHead() {
		var largScreen = window.innerWidth;
		var largDiv = document.getElementById('firstDiv').clientWidth;
		var left = 0;
		left = (largScreen - largDiv)/2;
		var leftP = (left / largScreen)*100;
		document.getElementById('firstDiv').style.marginLeft = leftP + "%";
		document.getElementById('firstDiv').style.marginRight = leftP + "%";
	//	document.getElementById('msg').innerHTML = 'largScreen ' +  largScreen + '  largDiv ' + largDiv + ' left' + left + '   ' + leftP +'%';
	}
</script>
		





<style>
.propertiescontent {
   padding: 0 0 0 0;
}
.full-realestate{
	margin-top: -3.5em;
	<?php 
		if ( wp_is_mobile() ) { 
			echo "max-width: 610px;";
		} else { 
			echo "width: 1340px;";
		} 	
	?>
}
h1 {
/*	color: #808080;*/
	cursor: pointer;
	display: inline-block;
	font-size: 16px;
	font-size: 1.5rem;
	font-weight: 800;
}
.mobileh1 {
	margin-top: -1em;
/*	color: #808080;*/
	cursor: pointer;
	display: inline-block;
	font-size: 16px;
	font-size: 1.5rem;
	font-weight: 800;
}
.adjust-vertical-realestate{
	margin-top: -1.5em;
}
.pointer {
    cursor:pointer;
}

.button_nav {
    white-space: nowrap;
    padding: 1em 1em;
}
.linkUnderline {
    text-decoration: underline;
}
</style>
<style>
  .fb-share-button
{
	margin-top: -2em;
	padding: 0 0 0 0;
	position:absolute;
transform: scale(2);
-ms-transform: scale(2);
-webkit-transform: scale(2);
-o-transform: scale(2);
-moz-transform: scale(2);
transform-origin: top left;
-ms-transform-origin: top left;
-webkit-transform-origin: top left;
-moz-transform-origin: top left;
-webkit-transform-origin: top left;
}

.margin-top-mobile{
	margin-top: 0.5em;
}

.fb-share-button-mobile
{
	margin-left: 1.0em;
	margin-top: -0.4em;
	position:absolute;
transform: scale(2);
-ms-transform: scale(2);
-webkit-transform: scale(2);
-o-transform: scale(2);
-moz-transform: scale(2);
transform-origin: top left;
-ms-transform-origin: top left;
-webkit-transform-origin: top left;
-moz-transform-origin: top left;
-webkit-transform-origin: top left;
}

.margin-left-small{
	margin-left: 0.7em;
	margin-right: 0.7em;
}

</style>

<div class="full-realestate" id="firstDiv">
	
<?php get_template_part( 'realestate-template-parts/header/rgpd-headerrealestate'); ?>

<?php if ( ! wp_is_mobile() ) { ?>
<script type="text/javascript">
		function resizeScreen() {
		var largScreen = window.innerWidth;
		var largDiv = document.getElementById('firstDiv').clientWidth;
		var left = 0;
		left = (largScreen - largDiv)/2;
		var leftP = (left / largScreen)*100;
		document.getElementById('firstDiv').style.marginLeft = leftP + "%";
		document.getElementById('firstDiv').style.marginRight = leftP + "%";
	}
	resizeScreen();
</script>
<?php } ?>





<?php if ( ! wp_is_mobile() ) { ?>
<p id="msgt"></p>
	<div id="primary">
		<main id="main" role="main">
				
			    <table>
					<tr>
						<td></td>
				      	<td width='1%'></td>
				      	<td valign="top" colspan="4">
					    	<?php 
							/*$room = sanitize_text_field($app["room"]);
							if ($room > 1){
								$room = $room . '-pieces';
							}else {
								$room = $room . '-piece';
							}*/
							$city = sanitize_text_field($app["city"]);
							$zip = sanitize_text_field($app["cp"]);
							$zipcity = $zip . '-' . $city;
						/*	$zip = substr($zip,0,2);
							$linkBackList = "/achat/" . strtolower(sanitize_text_field($app['typeProperty'])) . "/" . $room . "/" . $zip . "/" . $zipcity . "/mini/max/1";
							$linkBackList = str_replace(" ","-",$linkBackList);
							echo '<a href=' . $linkBackList . '><button class="button_nav">Retour à la liste</button></a>';*/
							$linkBackListShort = "/achat/" . strtolower(sanitize_text_field($app['typeProperty'])) . "/" . strtolower($zipcity) . "/";
							$linkBackListShort = str_replace(" ","-",$linkBackListShort);
							echo '<a href=' . $linkBackListShort . '><button class="button_realestate">Liste ' . $type_property . ' ' . $zipcity  . '</button></a>';
							?>
						&nbsp;&nbsp;<a href="#contact"><button class="button_realestate">Envie de visiter ?</button></a>
						 
					</td>
							
						<td>
							<div class="fb-share-button" 
						    data-href="<?php echo $urlPage ?>" 
						    data-layout="button"
						    data-size="small" >
						  </div>
						</td>
						<td></td>
					</tr>
			      <tr>
			      	<td width="300px" align="left" valign="top">	
				    	<!--<img class="showreal" style="width:300px;height:600px;" alt="" id="imgLeft" src="<?php echo esc_url_raw($app_img['urlphotoAccount2']); ?>">-->

				    	<?php $nbProperties = 0;
				    	 foreach ($app_listLink as $applistlink): ?>
				    		<?php
				    		if ($applistlink['idRealEstate'] != $app["idRealEstate"]) {
				    			$nbProperties = $nbProperties + 1;
				    			if ($nbProperties > 3){break;}
							$urlphoto = "";
							$caption = "";
							$imgempty = true;
					    	if ($applistlink['urlphoto1'] != ""){
					    		$urlphoto = $applistlink['urlphoto1'];$caption = $applistlink['caption1'];$imgempty = false;
							}else if ($applistlink['urlphoto2'] != ""){
					    		$urlphoto = $applistlink['urlphoto2'];$caption = $applistlink['applistlink'];$imgempty = false;
							}else if ($applistlink['urlphoto3'] != ""){
					    		$urlphoto = $applistlink['urlphoto3'];$caption = $applistlink['caption3'];$imgempty = false;
							}else if ($applistlink['urlphoto4'] != ""){
					    		$urlphoto = $applistlink['urlphoto4'];$caption = $applistlink['caption4'];$imgempty = false;
							}else if ($applistlink['urlphoto5'] != ""){
					    		$urlphoto = $applistlink['urlphoto5'];$caption = $applistlink['caption5'];$imgempty = false;
							}else if ($applistlink['urlphoto6'] != ""){
					    		$urlphoto = $applistlink['urlphoto6'];$caption = $applistlink['caption6'];$imgempty = false;
							}
							$urlphoto = strtolower($urlphoto);
			 			 	?>

			 			 	<a class="linkUnderline linkCustom" target="_blank" href="/vente/<?php echo prepare_url($applistlink['typeProperty'])?>/<?php echo prepare_url($applistlink['city'])?>-<?php echo prepare_url($applistlink['cp'])?>/<?php echo prepare_url($applistlink['idRealEstate'])?>/">

		 			 	<?php $titleImg = sanitize_text_field($applistlink["typeProperty"]);
		 			 		$titleImg .= ' ' . sanitize_text_field($applistlink["surface"]) . ' m2 ';
		 			 		if (sanitize_text_field($applistlink['room']) > 1) {$titleImg .= $applistlink["room"] . ' pièces '; }else{
		 			 			$titleImg .= $applistlink["room"] . ' pièce ';
		 			 		}
		 			 		$titleImg .= $applistlink["city"];
		 			 	?> 
		      			<?php if ($imgempty == false) : ?>
		      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
			      			<img class="showreal" style="width:250px;height:160px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" src="<?php echo esc_url_raw($urlphoto) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:250px;height:160px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>	  
						<br>
  						<?php echo sanitize_text_field($applistlink["typeProperty"])?> 
			      		<?php echo sanitize_text_field($applistlink["surface"])?> m2 
		      			<?php if (sanitize_text_field($applistlink['room']) > 1) : ?>
		      				<?php echo sanitize_text_field($applistlink["room"])?> pièces
		      			<?php else : ?>
		      				<?php echo sanitize_text_field($applistlink["room"])?> pièce
	      				<?php endif; ?>
	      				<br>
			      		<b>Prix: <?php echo number_format( sanitize_text_field($applistlink["price"]), 0, ',', ' ' )?> €</b>
			      		<br>
			      		<?php echo sanitize_text_field($applistlink["city"])?> <?php echo sanitize_text_field($applistlink["cp"])?>
			      		
						</a>
	      			<!--	<?php if ( wp_is_mobile() ) { ?>
				      		<br>
				      		Ref: <?php echo sanitize_text_field($applistlink["idRealEstate"])?>	
				      		
			      		<?php } ?>-->	
			      		<br>

						<br>
						<?php }
						endforeach; ?>					

						<br>
						
						<?php 
							$nbPropertiesnextfull = 0;
							if (sizeof($app_listLinknextfull) > 2 ){
							
				    	 foreach ($app_listLinknext as $applistlinknext): ?>
				    		<?php
				    		if ($applistlinknext['idRealEstate'] != $app["idRealEstate"]) {
				    			$nbPropertiesnextfull = $nbPropertiesnextfull + 1;
				    			if ($nbPropertiesnextfull > 3){break;}
							$urlphoto = "";
							$caption = "";
							$imgempty = true;
					    	if ($applistlinknext['urlphoto1'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto1'];$caption = $applistlinknext['caption1'];$imgempty = false;
							}else if ($applistlinknext['urlphoto2'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto2'];$caption = $applistlinknext['caption2'];$imgempty = false;
							}else if ($applistlinknext['urlphoto3'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto3'];$caption = $applistlinknext['caption3'];$imgempty = false;
							}else if ($applistlinknext['urlphoto4'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto4'];$caption = $applistlinknext['caption4'];$imgempty = false;
							}else if ($applistlinknext['urlphoto5'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto5'];$caption = $applistlinknext['caption5'];$imgempty = false;
							}else if ($applistlinknext['urlphoto6'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto6'];$caption = $applistlinknext['caption6'];$imgempty = false;
							}
							$urlphoto = strtolower($urlphoto);
			 			 	?>

			 			 	<a class="linkUnderline linkCustom" target="_blank" href="/vente/<?php echo prepare_url($applistlinknext['typeProperty'])?>/<?php echo prepare_url($applistlinknext['city'])?>-<?php echo prepare_url($applistlinknext['cp'])?>/<?php echo prepare_url($applistlinknext['idRealEstate'])?>/">

		 			 	<?php $titleImg = sanitize_text_field($applistlinknext["typeProperty"]);
		 			 		$titleImg .= ' ' . sanitize_text_field($applistlinknext["surface"]) . ' m2 ';
		 			 		if (sanitize_text_field($applistlinknext['room']) > 1) {$titleImg .= $applistlinknext["room"] . ' pièces '; }else{
		 			 			$titleImg .= $applistlinknext["room"] . ' pièce ';
		 			 		}
		 			 		$titleImg .= $applistlinknext["city"];
		 			 	?> 
		      			<?php if ($imgempty == false) : ?>
		      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
			      			<img class="showreal" style="width:250px;height:160px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" src="<?php echo esc_url_raw($urlphoto) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:250px;height:160px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>	  
						<br>
  						<?php echo sanitize_text_field($applistlinknext["typeProperty"])?> 
			      		<?php echo sanitize_text_field($applistlinknext["surface"])?> m2 
		      			<?php if (sanitize_text_field($applistlinknext['room']) > 1) : ?>
		      				<?php echo sanitize_text_field($applistlinknext["room"])?> pièces
		      			<?php else : ?>
		      				<?php echo sanitize_text_field($applistlinknext["room"])?> pièce
	      				<?php endif; ?>
	      				<br>
			      		<b>Prix: <?php echo number_format( sanitize_text_field($applistlinknext["price"]), 0, ',', ' ' )?> €</b>
			      		<br>
			      		<?php echo sanitize_text_field($applistlinknext["city"])?> <?php echo sanitize_text_field($applistlinknext["cp"])?>
			      		
						</a>
	      			<!--	<?php if ( wp_is_mobile() ) { ?>
				      		<br>
				      		Ref: <?php echo sanitize_text_field($applistlinknext["idRealEstate"])?>	
				      		
			      		<?php } ?>	-->
			      		<br>

						<br>
						<?php }
						endforeach; 
						}
						?>		

						<?php
						$nbProperties = $nbProperties + $nbPropertiesnextfull;
						if ($nbProperties == 0) {?>
							<img class="showreal" style="width:300px;height:600px;" alt="" id="imgLeft" src="<?php echo esc_url_raw($app_img['urlphotoAccount2']); ?>">

						<?php } ?>	

				    	</td> 
			      	<td width='1%'></td>
			      	<td valign="top" colspan="3">
			      		<h1 class="h1Custom"> 
			      		<b><?php echo 'Vente ' . sanitize_text_field($app['typeProperty']) . ' '; ?>
			      		<?php if (sanitize_text_field($app['room']) > 1) : ?>
		      				<?php echo sanitize_text_field($app["room"])?> pièces 
		      			<?php else : ?>
		      				<?php echo sanitize_text_field($app["room"])?> pièce 
	      				<?php endif; ?>
	      				<?php echo sanitize_text_field($app["surface"])?> m2
			      		<?php echo sanitize_text_field($app["city"])?> <?php echo sanitize_text_field($app["cp"]) . ' Ref: ' . $id_property?></b>
	      				
	      				</h1>
	      				<?php
	      				$imgEmpty = false;
	      				if ($app['urlphoto1'] != ''){
	      				 	 $imgFirstCol = $app['urlphoto1']; $imgEmpty = true;
      				 	}elseif ($app['urlphoto2'] != ''){
      				 		$imgFirstCol = $app['urlphoto2']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto3'] != ''){
  				 			$imgFirstCol = $app['urlphoto3']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto4'] != ''){
  				 			$imgFirstCol = $app['urlphoto4']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto5'] != ''){
  				 			$imgFirstCol = $app['urlphoto5']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto6'] != ''){
  				 			$imgFirstCol = $app['urlphoto6']; $imgEmpty = true;
			 			}
			 			$imgFirstCol = strtolower($imgFirstCol);
      				 	?>
		      			<?php if ($imgEmpty == true) : ?>
			      			<img class="showreal" style="width:600px;height:400px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaption']) ?>" id="img" src="<?php echo esc_url_raw($imgFirstCol)?>">
		      			<?php else : ?>
		      				<img class="showreal" style="width:600px;height:400px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>">
	      				<?php endif; ?>
	      				<br><br>
	      				<?php if ($app['urlphoto1'] != '') : ?>
		   				<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto1'])) ?>')" alt="<?php echo sanitize_text_field($app['caption1']) ?>" id="img1" src="<?php echo esc_url_raw(strtolower($app['urlphoto1'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto2'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto2'])) ?>')" alt="<?php echo sanitize_text_field($app['caption2']) ?>" id="img2" src="<?php echo esc_url_raw(strtolower($app['urlphoto2'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto3'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto3'])) ?>')" alt="<?php echo sanitize_text_field($app['caption3']) ?>" id="img3" src="<?php echo esc_url_raw(strtolower($app['urlphoto3'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto4'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto4'])) ?>')" alt="<?php echo sanitize_text_field($app['caption4']) ?>" id="img4" src="<?php echo esc_url_raw(strtolower($app['urlphoto4'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto5'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto5'])) ?>')" alt="<?php echo sanitize_text_field($app['caption5']) ?>" id="img5" src="<?php echo esc_url_raw(strtolower($app['urlphoto5'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto6'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto6'])) ?>')" alt="<?php echo sanitize_text_field($app['caption6']) ?>" id="img6" src="<?php echo esc_url_raw(strtolower($app['urlphoto6'])) ?>">
			   			<?php endif; ?>

	      				<?php if ($app['textDescription'] <> '') : ?>
				      		<p class="pCustom" width="550px">
				      		<?php echo substr(sanitize_text_field($app["textDescription"]), 0, 850) . ' ...';?>
				      		</p>
			      		<?php endif; ?>
			      		<b class="priceCustom"><?php echo ' Prix: ' . sanitize_text_field($app['price']) . ' €'; ?></b>
			      		<br>
			      		<p class="pCustom">
			      		<?php 
			      		if (sanitize_text_field($app["indexClassEnergy"]) == 0) echo 'Classe energie: Non renseignée';
		      			if (sanitize_text_field($app["indexClassEnergy"]) == 1) echo 'Classe energie: A';
	      				if (sanitize_text_field($app["indexClassEnergy"]) == 2) echo 'Classe energie: B';
      					if (sanitize_text_field($app["indexClassEnergy"]) == 3) echo 'Classe energie: C';
  						if (sanitize_text_field($app["indexClassEnergy"]) == 4) echo 'Classe energie: D';
						if (sanitize_text_field($app["indexClassEnergy"]) == 5) echo 'Classe energie: E';
						if (sanitize_text_field($app["indexClassEnergy"]) == 6) echo 'Classe energie: F';
						if (sanitize_text_field($app["indexClassEnergy"]) == 7) echo 'Classe energie: G';
			      		?> 
			      		<br>Ref: <?php echo sanitize_text_field($app["idRealEstate"])?>
			      		</p>
      				</td>
      				<td width="1%"></td>
      				
      				<?php if ( $pubOn ) { ?>
      		<!--		<?php if ( ! wp_is_mobile() ) { ?>-->
					<td align="left" valign="top">						
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<ins class="adsbygoogle"
						     style="display:inline-block;width:300px;height:600px"
						     data-ad-client="ca-pub-7351030609964877"
						     data-ad-slot="3770514742"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>						
		 			</td>  
		 	<!--		<?php } ?>-->
		 			<?php } else {?>
	 					<td align="left" valign="top">	
	 						<br>
				    	<img class="showreal" style="width:300px;height:600px;" alt="" id="imgRight" src="<?php echo esc_url_raw($app_img['urlphotoAccount3']); ?>">
				    	</td> 
					<?php } ?>
			   	</tr>

			   	<tr>
			   		<td></td>
			   		<td width='1%'></td>
		   			<td id="contact" colspan="3"><p class="pCustom"><b>Envie de visiter ? Plus d'informations sur ce bien ?</b></p></td> 
		   			<td width='1%'></td>
		   			<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td width='1%'></td>
		   			<td style="min-width: 150px">
		   				<div class="text-placeholder"><input class="inputCustom" type="text" id="nameprospect" placeholder="Nom" value="" onblur="resetColorField('nameprospect', 'msgsendmessage');"/>
		   				</div>
		   			</td>
		   			<td style="min-width: 150px">
		   				<div class="text-placeholder"><input class="inputCustom" type="text" id="emailprospect" placeholder="Email" value="" onblur="resetColorField('emailprospect', 'msgsendmessage');"/>
		   				</div>
		   			</td>
		   			<td style="min-width: 150px">
		   				<div class="text-placeholder"><input class="inputCustom" type="text" id="phoneprospect" placeholder="Téléphone" value="" onblur="resetColorField('phoneprospect', 'msgsendmessage');"/>
		   				</div>
		   			</td>
		   			<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td width='1%'></td>
		   			<td colspan="3" style="width: 20%">
		   				<div class="text-placeholder">
		   					<textarea class="textareaCustom" rows="1" maxlength="500" id="messageprospect" placeholder="Votre demande (facultatif)" onblur="resetColorField('messageprospect', 'msgsendmessage');"></textarea> 
		   				</div>
		   			</td>
		   			<td width='1%'></td>
		   			<td></td>
			   	</tr>
			   	
  				<tr>
			   		<td></td>
			   		<td width='1%'></td>
		   			<td colspan="3">
		   			<div class="checkbox">
					     <input type="checkbox" id="authorisationRgpdProperty" name="" value="">
					     <label for="authorisationRgpdProperty"><span class="pCustom" style="margin-top: 0.7em">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</span></label>
					  </div>
		   			
		   			</td>
		   			<td width='1%'></td>
		   			<td></td>
			   	</tr>


		   		<tr>
		   			<td></td>
			   		<td width='1%'></td>
		   			<td colspan="3"><button class="button_realestate" id="button_validation_account" onclick="send_message();">Contactez l'agence</button>
		   			&nbsp;<button class="button_realestate" id="button_show_phone" onclick="show_phone('<?php echo sanitize_text_field($app["phoneAgency"])?>');">Affichez le tél. de l'agence</button>
		   			<br><p class="pCustom" id="msgsendmessage"></p>
		   			</td>  	
		   			<td width='1%'></td>
		   			<td></td>
			   	</tr>
	   	
	   			<tr>
	   				<td></td>
	   				<td width='1%'></td>
		   			<td colspan="2" class="pCustom">
		   				<b>Agence: <?php echo sanitize_text_field($app["agency"])?></b>
		   				<?php if ( !empty(sanitize_text_field($app["addressAgency"])) ) :?>
		   					<?php echo sanitize_text_field($app["addressAgency"])?>
		   				<?php endif; ?>	
		   				<?php echo ' ' . sanitize_text_field($app["cityAgency"])?> <?php echo ' ' . sanitize_text_field($app["cpAgency"])?>	
		   				<br>	  				
		   				<?php if ( !empty($app["urlBaseSiteWebAgency"]) ) :?>
		   					Site <?php echo $app["agency"]?> :&nbsp;<?php echo esc_url_raw($app["urlBaseSiteWebAgency"])?>
	   					<?php endif; ?>	
	   					<?php if ( !empty($app["urlBasePageFaceBookAgency"]) ) :?>
		   					<br>Page Facebook :&nbsp;<?php echo esc_url_raw($app["urlBasePageFaceBookAgency"])?>
	   					<?php endif; ?>	
	   					<?php if ( !empty($app["urlBaseBlogAgency"]) ) :?>
		   					<br>Blog :&nbsp;<?php echo esc_url_raw($app["urlBaseBlogAgency"])?>
	   					<?php endif; ?>	
	   					<?php if ( !empty(sanitize_text_field($app["syndicateAgency"])) ) :?>
	   						<?php if ( !(sanitize_text_field($app["syndicateAgency"])) == 'Autre' ) :?>
		   						Syndicat: <?php echo sanitize_text_field($app["syndicateAgency"])?>
		   					<?php endif; ?>	
	   					<?php endif; ?>	
	   											
	   				</td>
	   				
	   				<td width='1%'></td>
		   		</tr>
		   		<tr>
		   			<td></td>
		   			<td width='1%'></td>
		   			<td colspan="3">
						 <?php 
						 /*
				    		foreach ($app_listLinknextfull as $applistlinknextfull): 
								?> 
								<a class="linkUnderline" target="_blank" href="/vente/<?php echo prepare_url($applistlinknextfull['typeProperty'])?>/<?php echo prepare_url($applistlinknextfull['city'])?>-<?php echo prepare_url($applistlinknextfull['cp'])?>/<?php echo prepare_url($applistlinknextfull['idRealEstate'])?>/">
								<?php 
								$roomLink = '';
								if ($applistlinknextfull["room"] > 0){
									$roomLink = sanitize_text_field($applistlinknextfull["room"]) . ' pièce(s) ';
								}
								$surfaceLink = sanitize_text_field($applistlinknextfull["surface"]) . ' m2 ';
								$priceLink = sanitize_text_field($applistlinknextfull["price"]) . ' €';
								echo $roomLink . $surfaceLink . $priceLink . '</a>&nbsp;&nbsp;';
					
							endforeach;
							*/
	   				?>
	   			<!--	<br><br>-->
	   				<?php
	   				
						echo '&nbsp;&nbsp;<a rel="nofollow" class="linkUnderline linkCustom" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique de confidentialite</a>';
					?>
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
		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->
<?php } ?>




<?php if ( wp_is_mobile() ) { ?>
<p id="msgt"></p>
	<div id="primary">
		<main id="main" role="main">
				
				<br>
				<div class="margin-left-small">
					    	<?php 
							$room = sanitize_text_field($app["room"]);
							if ($room > 1){
								$room = $room . '-pieces';
							}else {
								$room = $room . '-piece';
							}
							$city = sanitize_text_field($app["city"]);
							$zip = sanitize_text_field($app["cp"]);
							$zipcity = $zip . '-' . $city;
							$zip = substr($zip,0,2);

							$linkBackListShort = "/achat/" . strtolower(sanitize_text_field($app['typeProperty'])) . "/" . strtolower($zipcity) . "/";
							$linkBackListShort = str_replace(" ","-",$linkBackListShort);
							echo '<a href=' . $linkBackListShort . '><button class="button_realestate">Liste ' . $type_property . ' ' . $zipcity  . '</button></a>';
							?>
							&nbsp;&nbsp;<a href="#contact"><button class="button_realestate margin-top-mobile">Envie de visiter ?</button></a>

							<div class="fb-share-button fb-share-button-mobile" 
						    data-href="<?php echo $urlPage ?>" 
						    data-layout="button" >
						  </div>

			      		<h1 class="mobileh1 h1Custom"> 
			      		<b><?php echo 'Vente ' . sanitize_text_field($app['typeProperty']) . ' '; ?></b>
			      		<?php if (sanitize_text_field($app['room']) > 1) : ?>
		      				<b><?php echo sanitize_text_field($app["room"])?> pièces </b>
		      			<?php else : ?>
		      				<b><?php echo sanitize_text_field($app["room"])?> pièce </b>
	      				<?php endif; ?>
	      				<b><?php echo sanitize_text_field($app["surface"])?> m2 </b>
			      		<b><?php echo sanitize_text_field($app["city"])?> <?php echo sanitize_text_field($app["cp"])?></b>
	      				
	      				</h1>
	      				<?php
	      				$imgEmpty = false;
	      				if ($app['urlphoto1'] != ''){
	      				 	 $imgFirstCol = $app['urlphoto1']; $imgEmpty = true;
      				 	}elseif ($app['urlphoto2'] != ''){
      				 		$imgFirstCol = $app['urlphoto2']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto3'] != ''){
  				 			$imgFirstCol = $app['urlphoto3']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto4'] != ''){
  				 			$imgFirstCol = $app['urlphoto4']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto5'] != ''){
  				 			$imgFirstCol = $app['urlphoto5']; $imgEmpty = true;
  				 		}elseif ($app['urlphoto6'] != ''){
  				 			$imgFirstCol = $app['urlphoto6']; $imgEmpty = true;
			 			}
			 			$imgFirstCol = strtolower($imgFirstCol);
      				 	?>
      				</div>
		      			<?php if ($imgEmpty == true) : ?>
			      			<img class="showreal" style="width:600px;height:300px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaption']) ?>" id="img" src="<?php echo esc_url_raw($imgFirstCol)?>">
		      			<?php else : ?>
		      				<img class="showreal" style="width:600px;height:300px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>">
	      				<?php endif; ?>
	      			<div class="margin-left-small">
	      				
	      				<?php if ($app['urlphoto1'] != '') : ?>
		   				<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto1'])) ?>')" alt="<?php echo sanitize_text_field($app['caption1']) ?>" id="img1" src="<?php echo esc_url_raw(strtolower($app['urlphoto1'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto2'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto2'])) ?>')" alt="<?php echo sanitize_text_field($app['caption2']) ?>" id="img2" src="<?php echo esc_url_raw(strtolower($app['urlphoto2'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto3'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto3'])) ?>')" alt="<?php echo sanitize_text_field($app['caption3']) ?>" id="img3" src="<?php echo esc_url_raw(strtolower($app['urlphoto3'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto4'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto4'])) ?>')" alt="<?php echo sanitize_text_field($app['caption4']) ?>" id="img4" src="<?php echo esc_url_raw(strtolower($app['urlphoto4'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto5'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto5'])) ?>')" alt="<?php echo sanitize_text_field($app['caption5']) ?>" id="img5" src="<?php echo esc_url_raw(strtolower($app['urlphoto5'])) ?>">
			   			&nbsp;<?php endif; ?>
			   			<?php if ($app['urlphoto6'] != '') : ?>
			   			<img class="showreal pointer" style="width:91px;height:70px;" onclick="changeImg('<?php echo esc_url_raw(strtolower($app['urlphoto6'])) ?>')" alt="<?php echo sanitize_text_field($app['caption6']) ?>" id="img6" src="<?php echo esc_url_raw(strtolower($app['urlphoto6'])) ?>">
			   			<?php endif; ?>

	      				<!--<?php if ($app['textDescription'] <> '') : ?>-->
				      		<br><p class="pCustom">
				     		<?php echo substr(sanitize_text_field($app["textDescription"]), 0, 850) . ' ...';?>		
				     		<br><b class="priceCustom"><?php echo ' Prix: ' . sanitize_text_field($app['price']) . ' €'; ?></b>	  
				     		    		
			      <!--		<?php endif; ?> -->
			      		
			      		<br>
			      		<?php 
			      		if (sanitize_text_field($app["indexClassEnergy"]) == 0) echo 'Classe energie: Non renseignée';
		      			if (sanitize_text_field($app["indexClassEnergy"]) == 1) echo 'Classe energie: A';
	      				if (sanitize_text_field($app["indexClassEnergy"]) == 2) echo 'Classe energie: B';
      					if (sanitize_text_field($app["indexClassEnergy"]) == 3) echo 'Classe energie: C';
  						if (sanitize_text_field($app["indexClassEnergy"]) == 4) echo 'Classe energie: D';
						if (sanitize_text_field($app["indexClassEnergy"]) == 5) echo 'Classe energie: E';
						if (sanitize_text_field($app["indexClassEnergy"]) == 6) echo 'Classe energie: F';
						if (sanitize_text_field($app["indexClassEnergy"]) == 7) echo 'Classe energie: G';
			      		?> 
			      		<br>Ref: <?php echo sanitize_text_field($app["idRealEstate"])?>
						</p>
			      		
		   				<?php $nbProperties = 0;
				    	 foreach ($app_listLink as $applistlink): ?>
				    		<?php
				    		if ($applistlink['idRealEstate'] != $app["idRealEstate"]) {
				    			$nbProperties = $nbProperties + 1;
				    			if ($nbProperties > 2 ){break;}
							$urlphoto = "";
							$caption = "";
							$imgempty = true;
					    	if ($applistlink['urlphoto1'] != ""){
					    		$urlphoto = $applistlink['urlphoto1'];$caption = $applistlink['caption1'];$imgempty = false;
							}else if ($applistlink['urlphoto2'] != ""){
					    		$urlphoto = $applistlink['urlphoto2'];$caption = $applistlink['applistlink'];$imgempty = false;
							}else if ($applistlink['urlphoto3'] != ""){
					    		$urlphoto = $applistlink['urlphoto3'];$caption = $applistlink['caption3'];$imgempty = false;
							}else if ($applistlink['urlphoto4'] != ""){
					    		$urlphoto = $applistlink['urlphoto4'];$caption = $applistlink['caption4'];$imgempty = false;
							}else if ($applistlink['urlphoto5'] != ""){
					    		$urlphoto = $applistlink['urlphoto5'];$caption = $applistlink['caption5'];$imgempty = false;
							}else if ($applistlink['urlphoto6'] != ""){
					    		$urlphoto = $applistlink['urlphoto6'];$caption = $applistlink['caption6'];$imgempty = false;
							}
							$urlphoto = strtolower($urlphoto);
			 			 	?>
			 			 	<a class="linkUnderline linkCustom" target="_blank" href="/vente/<?php echo prepare_url($applistlink['typeProperty'])?>/<?php echo prepare_url($applistlink['city'])?>-<?php echo prepare_url($applistlink['cp'])?>/<?php echo prepare_url($applistlink['idRealEstate'])?>/">

		 			 	<?php $titleImg = sanitize_text_field($applistlink["typeProperty"]);
		 			 		$titleImg .= ' ' . sanitize_text_field($applistlink["surface"]) . ' m2 ';
		 			 		if (sanitize_text_field($applistlink['room']) > 1) {$titleImg .= $applistlink["room"] . ' pièces '; }else{
		 			 			$titleImg .= $applistlink["room"] . ' pièce ';
		 			 		}
		 			 		$titleImg .= $applistlink["city"];
		 			 	?> 
		      			<?php if ($imgempty == false) : ?>
		      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
			      			<img class="showreal" style="width:300px;height:200px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlphoto) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:300px;height:200px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>	  
						<br>
  						<?php echo sanitize_text_field($applistlink["typeProperty"])?> 
			      		<?php echo sanitize_text_field($applistlink["surface"])?> m2&nbsp; 
		      			<?php if (sanitize_text_field($applistlink['room']) > 1) : ?>
		      				<?php echo sanitize_text_field($applistlink["room"])?> pièces
		      			<?php else : ?>
		      				<?php echo sanitize_text_field($applistlink["room"])?> pièce
	      				<?php endif; ?>
	      				&nbsp; <b class="priceCustom">Prix: <?php echo number_format( sanitize_text_field($applistlink["price"]), 0, ',', ' ' )?> €</b>
	      				<br>
	      				<?php echo substr(sanitize_text_field($applistlink["city"]), 0, 15);?> <?php echo sanitize_text_field($applistlink["cp"])?>	 
						</a>
						<?php }
							endforeach; ?>
	
		   				<br>
		   				<?php $nbProperties = 0;
				    	if (sizeof($app_listLinknextfull) > 2 ){
				    	 foreach ($app_listLinknext as $applistlinknext): ?>
				    		<?php
				    		if ($applistlinknext['idRealEstate'] != $app["idRealEstate"]) {
				    			$nbProperties = $nbProperties + 1;
				    			if ($nbProperties > 2 ){break;}
							$urlphoto = "";
							$caption = "";
							$imgempty = true;
					    	if ($applistlinknext['urlphoto1'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto1'];$caption = $applistlinknext['caption1'];$imgempty = false;
							}else if ($applistlinknext['urlphoto2'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto2'];$caption = $applistlinknext['caption2'];$imgempty = false;
							}else if ($applistlinknext['urlphoto3'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto3'];$caption = $applistlinknext['caption3'];$imgempty = false;
							}else if ($applistlinknext['urlphoto4'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto4'];$caption = $applistlinknext['caption4'];$imgempty = false;
							}else if ($applistlinknext['urlphoto5'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto5'];$caption = $applistlinknext['caption5'];$imgempty = false;
							}else if ($applistlinknext['urlphoto6'] != ""){
					    		$urlphoto = $applistlinknext['urlphoto6'];$caption = $applistlinknext['caption6'];$imgempty = false;
							}
							$urlphoto = strtolower($urlphoto);
			 			 	?>
			 			 	<a class="linkUnderline linkCustom" target="_blank" href="/vente/<?php echo prepare_url($applistlinknext['typeProperty'])?>/<?php echo prepare_url($applistlinknext['city'])?>-<?php echo prepare_url($applistlinknext['cp'])?>/<?php echo prepare_url($applistlinknext['idRealEstate'])?>/">

		 			 	<?php $titleImg = sanitize_text_field($applistlinknext["typeProperty"]);
		 			 		$titleImg .= ' ' . sanitize_text_field($applistlinknext["surface"]) . ' m2 ';
		 			 		if (sanitize_text_field($applistlinknext['room']) > 1) {$titleImg .= $applistlinknext["room"] . ' pièces '; }else{
		 			 			$titleImg .= $applistlinknext["room"] . ' pièce ';
		 			 		}
		 			 		$titleImg .= $applistlinknext["city"];
		 			 	?> 
		      			<?php if ($imgempty == false) : ?>
		      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
			      			<img class="showreal" style="width:200px;height:120px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlphoto) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:200px;height:120px;" title="<?php echo $titleImg; ?>" alt="<?php echo $titleImg; ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>	  
						<br>
  						<?php echo sanitize_text_field($applistlinknext["typeProperty"])?> 
			      		<?php echo sanitize_text_field($applistlinknext["surface"])?> m2 &nbsp; 
		      			<?php if (sanitize_text_field($applistlinknext['room']) > 1) : ?>
		      				<?php echo sanitize_text_field($applistlinknext["room"])?> pièces
		      			<?php else : ?>
		      				<?php echo sanitize_text_field($applistlinknext["room"])?> pièce
	      				<?php endif; ?>
	      				&nbsp; <b class="priceCustom" >Prix: <?php echo number_format( sanitize_text_field($applistlinknext["price"]), 0, ',', ' ' )?> €</b>			      		
			      		<br>
			      		<?php echo substr(sanitize_text_field($applistlinknext["city"]), 0, 15);?> <?php echo sanitize_text_field($applistlinknext["cp"])?>
						</a>
						<?php }
							endforeach; 
						}
						?>
	
		   				<br>
		   				<b class="pCustom" id="contact">Envie de visiter ? Plus d'informations sur ce bien ?</b></td> 

		   				<br>
		   				<div class="text-placeholder">
		   				<input class="inputCustom" type="text" id="nameprospect" placeholder="Nom" value="" onblur="resetColorField('nameprospect', 'msgsendmessage');"/>
		   				</div>
		   				<br>
						<div class="text-placeholder">
		   				<input class="inputCustom" type="text" id="emailprospect" placeholder="Email" value="" onblur="resetColorField('emailprospect', 'msgsendmessage');"/>
		   				</div>
		   				<br>
		   				<div class="text-placeholder">
		   				<input class="inputCustom" type="text" id="phoneprospect" placeholder="Téléphone" value="" onblur="resetColorField('phoneprospect', 'msgsendmessage');"/>
		   				</div>
		   				<br>
		   				<div class="text-placeholder">
		   				<textarea class="textareaCustom" rows="1" maxlength="500" id="messageprospect" placeholder="Votre demande (facultatif)" onblur="resetColorField('messageprospect', 'msgsendmessage');"></textarea>
		   				</div>
		   				
		   				<div class="checkbox">
					     <input type="checkbox" id="authorisationRgpdProperty" name="" value="">
					     <label for="authorisationRgpdProperty"><span class="pCustom" style="margin-top: 0.7em">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</span></label>
					  </div>
					  
		   				<button class="button_realestate" id="button_validation_account" style="margin-top: 0.5em" onclick="send_message();">Contactez l'agence</button>
		   				&nbsp;&nbsp;<button class="button_realestate" id="button_show_phone" onclick="show_phone('<?php echo sanitize_text_field($app["phoneAgency"])?>');">Tél. agence</button> 	
		   				
		   				<p class="pCustom" id="msgsendmessage"></p>
		   				<div class="pCustom">	
			   				<b>Agence: <?php echo sanitize_text_field($app["agency"])?></b>
			   				<?php if ( !empty(sanitize_text_field($app["addressAgency"])) ) :?>
			   					<?php echo sanitize_text_field($app["addressAgency"])?>
			   				<?php endif; ?>	
			   				<?php echo ' ' . sanitize_text_field($app["cityAgency"])?> <?php echo ' ' . sanitize_text_field($app["cpAgency"])?>	
			   				<br>	  				
			   				<?php if ( !empty($app["urlBaseSiteWebAgency"]) ) :?>
			   					Site <?php echo $app["agency"]?> :&nbsp;<?php echo esc_url_raw($app["urlBaseSiteWebAgency"])?>
		   					<?php endif; ?>	
		   					<?php if ( !empty($app["urlBasePageFaceBookAgency"]) ) :?>
			   					<br>Page Facebook :&nbsp;<?php echo esc_url_raw($app["urlBasePageFaceBookAgency"])?>
		   					<?php endif; ?>	
		   					<?php if ( !empty($app["urlBaseBlogAgency"]) ) :?>
			   					<br>Blog :&nbsp;<?php echo esc_url_raw($app["urlBaseBlogAgency"])?>
		   					<?php endif; ?>	
		   					<?php if ( !empty(sanitize_text_field($app["syndicateAgency"])) ) :?>
		   						<?php if ( !(sanitize_text_field($app["syndicateAgency"])) == 'Autre' ) :?>
			   						Syndicat: <?php echo sanitize_text_field($app["syndicateAgency"])?>
			   					<?php endif; ?>	
		   					<?php endif; ?>	
	   					</div>
	   				<?php	   				
						echo '<a  rel="nofollow" class="linkUnderline linkCustom" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a>';
						?>
				</div>

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
		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->
<?php } ?>

<?php function prepare_url($field){
	$field = str_replace(" ","-",strtolower($field));
	return $field;
	} 
?>
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
	/*var imgempty = '<?php echo sanitize_text_field($app['imgempty']) ?>';	
	if (imgempty == 'false' ){
		document.getElementById('img').src = "<?php echo esc_url_raw($app['imgFirstCol']) . '&s=true&w=600&h=400' ?>";
	}*/
	function changeImg(urlImg){
			
			document.getElementById('imgheader').src = urlImg;
			document.getElementById('img').src = urlImg;
			reloadPub();	
	}
	function reloadPub() {	
	   document.getElementById('adsgoogle').contentDocument.location.reload(true);
   	}
   	function show_phone(phone) {
		document.getElementById('button_show_phone').innerHTML = 'Tél. ' + phone;
	}

	function send_message() {
		if (document.getElementById('authorisationRgpdProperty').checked == false){
		//	vmproperty.messageRed = true;
		    var message = 'Vous devez cocher J\’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m\'envoyer des emails.';
		    setMsgError('msgsendmessage', message, 'authorisationRgpdProperty');
			document.getElementById('authorisationRgpdProperty').focus();
			return;
		}
		var nameprospect = document.getElementById('nameprospect').value;
		if (!empty_field(nameprospect)){ setMsgError('msgsendmessage', 'Le nom doit être renseigné', 'nameprospect'); return;}
		if (!sanitize_string(nameprospect)){	setMsgError('msgsendmessage', "Le nom n'est pas valide!", 'nameprospect'); return;}
		if (nameprospect.length < 3) { setMsgError('msgsendmessage', "Le nom est trop court ", 'nameprospect');return;}
		if (nameprospect.length > 30) { setMsgError('msgsendmessage', "Le nom est trop long ", 'nameprospect');return;}

		var emailprospect = document.getElementById('emailprospect').value;
		if (!empty_field(emailprospect)){ setMsgError('msgsendmessage', 'Email doit être renseigné', 'emailprospect'); return;}
		if (!validateEmail(emailprospect)){ setMsgError('msgsendmessage', 'Email invalide ', 'emailprospect'); return;}
	    if (emailprospect.length > 70) { setMsgError('msgsendmessage', 'Email est trop long ', 'emailprospect'); return;}
		emailprospect = emailprospect.trim();

		var phoneprospect = document.getElementById('phoneprospect').value;
		if (!sanitize_string(phoneprospect)){	setMsgError('msgsendmessage', "Le téléphone n'est pas valide!", 'phoneprospect'); return;}
		if (phoneprospect.length > 20) { setMsgError('msgsendmessage', "Le téléphone est trop long ", 'phoneprospect');return;}

		var messageprospect = document.getElementById('messageprospect').value;
		if (!sanitize_string(messageprospect)){	setMsgError('msgsendmessage', "Le texte n'est pas valide!", 'messageprospect'); return;}
		if (messageprospect.length > 100) { setMsgError('msgsendmessage', "Le texte est trop long ", 'messageprospect');return;}

		var to = '';
		var emailAgencyAd = '<?php echo sanitize_email($app["emailAd"])?>';
		var keyEmailAccount = '<?php echo sanitize_email($app["keyEmailAccount"])?>';

		if (emailAgencyAd == ''){
			to = keyEmailAccount;
		}else{
			to = emailAgencyAd;
		}

		var typeProperty = '<?php echo sanitize_text_field($app['typeProperty'])?>';
  		<?php if (sanitize_text_field($app['room']) > 1) : ?>
		var room = '<?php echo sanitize_text_field($app["room"])?> pièces';
		<?php else : ?>
		var room = '<?php echo sanitize_text_field($app["room"])?> pièce';
		<?php endif; ?>
	    var surface = '<?php echo sanitize_text_field($app["surface"])?> m2';
		var city = '<?php echo sanitize_text_field($app["city"])?> <?php echo sanitize_text_field($app["cp"])?>';
		var id = '<?php echo sanitize_text_field($app["idRealEstate"])?>';

		var wordingTo =  "";
		var from = "noreplynewsrealestate@gmail.com";
		var wordingFrom = "immobilier-fr.fr";	;	     
		var subject = "Demande d'information sur un bien";
		var htmlBody = "Bonjour vous avez recu une demande d'information de la part de : " + nameprospect + "<br><br>Email: " + emailprospect + " tél. " + phoneprospect + "<br><br>Conernant le bien " + typeProperty + ' ' + room + ' ' + surface + ' ' + city + ' Ref: ' + id + "<br><br>Message: " + messageprospect + "<br><br><a href='https://www.immobilier-fr.fr'>www.immobilier-fr.fr</a>";
		var msgBody = "Bonjour vous avez recu une demande d'information de la part de : " + nameprospect + " Email: " + emailprospect + "tél. " + phoneprospect + " conernant le bien " + typeProperty + ' ' + room + ' ' + surface + ' ' + city + ' Ref: ' + id + "Message: " + messageprospect + " www.immobilier-fr.fr https://www.immobilier-fr.fr";
	

	  var xmlhttp;  
	  xmlhttp = new XMLHttpRequest();

	  xmlhttp.onreadystatechange = function() {		  	
	    if (this.readyState == 4 && this.status == 200) {
	    	var result = this.responseText;
			var obj = JSON.parse(result); 
			if (obj.exitvalue == "0") {;
				document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
				document.getElementById("msgsendmessage").style.color = "green";
        		document.getElementById("msgsendmessage").style.fontWeight = "bold";
        		putAllCustomerAccountSearhFromWebSite();
        		
			}else{
				document.getElementById("msgsendmessage").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
				document.getElementById("msgsendmessage").style.color = "red";
 				document.getElementById("msgsendmessage").style.fontWeight = "bold";
			}
	    }
	  };

	   var data_string = 'type=multipart' + '&to=' + to + '&wordingto=' + wordingTo + '&from=' + from + '&wordingfrom=' + wordingFrom + '&subject=' + subject + '&htmlbody=' + htmlBody + '&msgbody=' + msgBody;


	//  xmlhttp.open("POST", "http://mailer-realestate.appspot.com/" + "queuemailingservlet?type=multipart", true);
	  xmlhttp.open("POST", "https://mailer-realestate.appspot.com/" + "managemailer", true);
	  
	  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	  xmlhttp.send(data_string);
	}

	function putAllCustomerAccountSearhFromWebSite() {

		var nameprospect = document.getElementById('nameprospect').value;
		if (!empty_field(nameprospect)){ setMsgError('msgsendmessage', 'Le nom doit être renseigné', 'nameprospect'); return;}
		if (!sanitize_string(nameprospect)){	setMsgError('msgsendmessage', "Le nom n'est pas valide!", 'nameprospect'); return;}
		if (nameprospect.length < 3) { setMsgError('msgsendmessage', "Le nom est trop court ", 'nameprospect');return;}
		if (nameprospect.length > 30) { setMsgError('msgsendmessage', "Le nom est trop long ", 'nameprospect');return;}

		var emailprospect = document.getElementById('emailprospect').value;
		if (!empty_field(emailprospect)){ setMsgError('msgsendmessage', 'Email doit être renseigné', 'emailprospect'); return;}
		if (!validateEmail(emailprospect)){ setMsgError('msgsendmessage', 'Email invalide ', 'emailprospect'); return;}
	    if (emailprospect.length > 70) { setMsgError('msgsendmessage', 'Email est trop long ', 'emailprospect'); return;}
		emailprospect = emailprospect.trim();

		var phoneprospect = document.getElementById('phoneprospect').value;
		if (!sanitize_string(phoneprospect)){	setMsgError('msgsendmessage', "Le téléphone n'est pas valide!", 'phoneprospect'); return;}
		if (phoneprospect.length > 20) { setMsgError('msgsendmessage', "Le téléphone est trop long ", 'phoneprospect');return;}

		var to = '';
		var emailAgencyAd = '<?php echo sanitize_email($app["emailAd"])?>';
		var keyEmailAccount = '<?php echo sanitize_email($app["keyEmailAccount"])?>';

	//	emailprospect = emailprospect.trim();
		var emailCustomer = emailprospect.trim();
			

		var typePropertySearch = '<?php echo sanitize_text_field($app['typeProperty'])?>';
		var indexTypePropertySearch = '<?php echo sanitize_text_field($app['indexTypeProperty'])?>';
 		var surfaceSearch = '<?php echo sanitize_text_field($app["surface"])?>';
 		var roomSearch = '<?php echo sanitize_text_field($app["room"])?>';
 		var bedroomSearch = '<?php echo sanitize_text_field($app["bedroom"])?>';
 		var citySearch = '<?php echo sanitize_text_field($app["city"])?>';
 		var cpSearch = '<?php echo sanitize_text_field($app["cp"])?>';
 		var priceSearchMin = '<?php echo sanitize_text_field($app["price"])?>';
 		priceSearchMin = parseInt(priceSearchMin) - Math.round(((priceSearchMin * 20)/100));
 		var priceSearchMax = '<?php echo sanitize_text_field($app["price"])?>';
 		priceSearchMax = parseInt(priceSearchMax) + Math.round(((priceSearchMax * 20)/100));

		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'putAllCustomerAccountSearchFromWeb' + '&login=' + keyEmailAccount + '&keyEmailAccount=' + keyEmailAccount + '&pwdCripted=' + '' + '&keyCustomer=' + '' + '&idc=' + '0' + '&emailCustomer=' + emailCustomer + '&typePropertySearch=' + typePropertySearch + '&indexTypePropertySearch=' + indexTypePropertySearch + '&surfaceSearch=' + surfaceSearch + '&roomSearch=' + roomSearch + '&bedroomSearch=' + bedroomSearch + '&citySearch=' + citySearch + '&cpSearch=' + cpSearch + '&priceSearchMin=' + priceSearchMin + '&priceSearchMax=' + priceSearchMax + '&name=' + '' + '&firstName=' + nameprospect + '&phone=' + phoneprospect;


		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";
	        	//	putCustomerFromWebSite();
				}else if (obj.exitvalue == "2") {
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";   
     			//	putCustomerFromWebSite();
				}else if (obj.exitvalue == "3") {
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";   
     			//	putCustomerFromWebSite();
				}else if (obj.exitvalue == "4") {
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";   
     			//	putCustomerFromWebSite();
				}else {
					document.getElementById("msgsendmessage").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgsendmessage").style.color = "red";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";
				}
		    }
		  };

		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}

	function putCustomerFromWebSite() {

		var nameprospect = document.getElementById('nameprospect').value;
		if (!empty_field(nameprospect)){ setMsgError('msgsendmessage', 'Le nom doit être renseigné', 'nameprospect'); return;}
		if (!sanitize_string(nameprospect)){	setMsgError('msgsendmessage', "Le nom n'est pas valide!", 'nameprospect'); return;}
		if (nameprospect.length < 3) { setMsgError('msgsendmessage', "Le nom est trop court ", 'nameprospect');return;}
		if (nameprospect.length > 30) { setMsgError('msgsendmessage', "Le nom est trop long ", 'nameprospect');return;}

		var emailprospect = document.getElementById('emailprospect').value;
		if (!empty_field(emailprospect)){ setMsgError('msgsendmessage', 'Email doit être renseigné', 'emailprospect'); return;}
		if (!validateEmail(emailprospect)){ setMsgError('msgsendmessage', 'Email invalide ', 'emailprospect'); return;}
	    if (emailprospect.length > 70) { setMsgError('msgsendmessage', 'Email est trop long ', 'emailprospect'); return;}
		emailprospect = emailprospect.trim();

		var phoneprospect = document.getElementById('phoneprospect').value;
		if (!sanitize_string(phoneprospect)){	setMsgError('msgsendmessage', "Le téléphone n'est pas valide!", 'phoneprospect'); return;}
		if (phoneprospect.length > 20) { setMsgError('msgsendmessage', "Le téléphone est trop long ", 'phoneprospect');return;}

		var keyEmailAccount = '<?php echo sanitize_email($app["keyEmailAccount"])?>';
		emailprospect = emailprospect.trim();
			
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'putCustomerFromWebSite' + '&login=' + keyEmailAccount + '&keyEmailAccount=' + keyEmailAccount + '&pwdCripted=' + '' + '&keyCustomer=' + '' + '&idc=' + '0' + '&emailCustomer=' + emailprospect + '&name=' + '' + '&firstName=' + nameprospect + '&phone=' + phoneprospect;

		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";
	        		putSearchCustomerFromWebSite();
				}else if (obj.exitvalue == "2") {
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";   
     				putSearchCustomerFromWebSite();
				}else {
					document.getElementById("msgsendmessage").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgsendmessage").style.color = "red";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";
				}
		    }
		  };

		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}

		function putSearchCustomerFromWebSite() {

		var nameprospect = document.getElementById('nameprospect').value;
		if (!empty_field(nameprospect)){ setMsgError('msgsendmessage', 'Le nom doit être renseigné', 'nameprospect'); return;}
		if (!sanitize_string(nameprospect)){	setMsgError('msgsendmessage', "Le nom n'est pas valide!", 'nameprospect'); return;}
		if (nameprospect.length < 3) { setMsgError('msgsendmessage', "Le nom est trop court ", 'nameprospect');return;}
		if (nameprospect.length > 30) { setMsgError('msgsendmessage', "Le nom est trop long ", 'nameprospect');return;}

		var emailprospect = document.getElementById('emailprospect').value;
		if (!empty_field(emailprospect)){ setMsgError('msgsendmessage', 'Email doit être renseigné', 'emailprospect'); return;}
		if (!validateEmail(emailprospect)){ setMsgError('msgsendmessage', 'Email invalide ', 'emailprospect'); return;}
	    if (emailprospect.length > 70) { setMsgError('msgsendmessage', 'Email est trop long ', 'emailprospect'); return;}
		emailprospect = emailprospect.trim();

		var keyEmailAccount = '<?php echo sanitize_email($app["keyEmailAccount"])?>';
		var emailCustomer = emailprospect.trim();


		var typePropertySearch = '<?php echo sanitize_text_field($app['typeProperty'])?>';
		var indexTypePropertySearch = '<?php echo sanitize_text_field($app['indexTypeProperty'])?>';
 		var surfaceSearch = '<?php echo sanitize_text_field($app["surface"])?>';
 		var roomSearch = '<?php echo sanitize_text_field($app["room"])?>';
 		var bedroomSearch = '<?php echo sanitize_text_field($app["bedroom"])?>';
 		var citySearch = '<?php echo sanitize_text_field($app["city"])?>';
 		var cpSearch = '<?php echo sanitize_text_field($app["cp"])?>';
 		var priceSearchMin = '<?php echo sanitize_text_field($app["price"])?>';
 		priceSearchMin = parseInt(priceSearchMin) - Math.round(((priceSearchMin * 20)/100));
 		var priceSearchMax = '<?php echo sanitize_text_field($app["price"])?>';
 		priceSearchMax = parseInt(priceSearchMax) + Math.round(((priceSearchMax * 20)/100));

		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'putSearchCustomerFromWebSite' + '&login=' + keyEmailAccount + '&keyEmailAccount=' + keyEmailAccount + '&pwdCripted=' + '' + '&keyCustomer=' + '' + '&idc=' + '0' + '&emailCustomer=' + emailCustomer + '&typePropertySearch=' + typePropertySearch + '&indexTypePropertySearch=' + indexTypePropertySearch + '&surfaceSearch=' + surfaceSearch + '&roomSearch=' + roomSearch + '&bedroomSearch=' + bedroomSearch + '&citySearch=' + citySearch + '&cpSearch=' + cpSearch + '&priceSearchMin=' + priceSearchMin + '&priceSearchMax=' + priceSearchMax;

		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";

				}else if (obj.exitvalue == "2") {
					document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à l'agence" + obj.exitvalue;
					document.getElementById("msgsendmessage").style.color = "green";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";
				}else {
					document.getElementById("msgsendmessage").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgsendmessage").style.color = "red";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";
				}
		    }
		  };
		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}

	function updatePropertyViewCount() {
			
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'updatePropertyViewCount' + '&login=' + '<?php echo sanitize_email($login)?>' + '&keyEmailAccount=' + '<?php echo sanitize_email($login)?>' + '&pwdCripted=' + '' + '&keyCustomer=' + '' + '&idc=' + '0' + '&keyProperty=' + '<?php echo sanitize_text_field($app["idRealEstate"])?>';

		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					document.getElementById("msgsendmessage").innerHTML = "update count ok";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";
	        		putCustomerFromWebSite();
				}else {
					document.getElementById("msgsendmessage").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgsendmessage").style.color = "red";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";
				}
		    }
		  };

		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}



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
    //  document.getElementById(idField).style.color = 'black';         
      document.getElementById(idmsg).innerHTML = '';
      document.getElementById(idmsg).style.color = "green";
    }

</script>
		</body>
</html>
