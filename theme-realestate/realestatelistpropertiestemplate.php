<?php
/**
 * Template Name: RealEstateListProperties 
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
//get_template_part( 'header', 'realestate' ); 
$pubOn = false;
$linkPromoOn = false;
$siteRealestateOn = false;
$siteAgencyOn = true;

if ( get_home_url() == 'http://vps520391.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'http://vps671085.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour la Production

$urlDom = get_home_url();
global $wpdb;
?>
	
<?php
		$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";
?>
	<?php	

			// loop real estate DB
        	global $wpdb;
			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;
			$fieldFilter = 'keyEmailAccount';
			$valueStringField = $result->email_realestate;

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


			$indexTypeProperty = '0';

			global $wp_query;
			
			$type_property = get_query_var('type_property', 'bien');
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
				$indexTypeProperty = '100';
			}

			$roomfull = get_query_var('room', '0');
			$room = str_replace("-pieces","",$roomfull);
			$room = str_replace("-piece","",$room);

			$zipselect = get_query_var('dept', 'dept');
			$zip = get_query_var('dept', 'dept');
			if ($zipselect == 'dept'){
				$zipselectselected = 'dept'; $zipselect = '';
			}
			else{
				$zipselectselected = $zipselect;
			}

			$zipcityselect = get_query_var('zipcity', 'cp-ville');
			$zipcity = get_query_var('zipcity', 'cp-ville');
			if ($zipcityselect == 'cp-ville'){
				$zipcityselectselected = 'Cp ville'; $zipcityselect = '';
			}
			else{
				$zipcityselectselected = $zipcityselect;
				$zipcityselect = substr($zipcityselect,0,5);
			}
			$citylist = substr($zipcityselectselected,6,strlen($zipcityselectselected));

			$pricestart = get_query_var('pricestart', 'mini');
			$pricemini = get_query_var('pricestart', 'mini');
			if ($pricestart == 'mini'){
				$pricestartselected = 'mini'; $pricestart = '';
			}
			else{
				$pricestartselected = $pricestart;
			}

			$priceend = get_query_var('priceend', 'max');
			$pricemax = get_query_var('priceend', 'max');
			if ($priceend == 'max'){
				$priceendselected = 'max'; $priceend = '';
			}
			else{
				$priceendselected = $priceend;
			}

			$pageSelected = get_query_var('pageselected', '1');
			$pageSelectedList = get_query_var('pageselected', '1');
			$pageLandingSelected = get_query_var('pageselected', '');
			$nbPropertiesByPage = 3;


		$listLink = false;

		if ($type_property == 'Bien'){
			if ($room == '0'){
				if ($zipselect == 'dept' or $zipselect == ''){
					if ($zipcityselect == ''){
						if ($pricestart == '' or $pricestart == 'mini'){
							
							if ($pageLandingSelected == ''){
								$listLink = true;
							}
						}
					}
				}
			}
		}

				
// List link type city 

			$indexTypePropertyLinkAll = '0';  
			$roomLinkAll = "0";
			$zipselectLinkAll = "";//$app['dept']; //"74";
			$zipcityselectLinkAll = ''; //$zipcity; //$app['cp']; //$app['lexie5']; //74000
			$pageSelected = "1";
			$nbLinkPropertiesByPage = 80;
		if ($listLink){  

			

			/*  Read cplist zip-city */
			//  , 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => '1', 'numberSize' => $numberSize
 			$data = array('service' => 'readListZip', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypePropertyLinkAll, 'room' => $roomLinkAll, 'dept' => $zipselectLinkAll, 'limit' => $nbLinkPropertiesByPage);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_link = file_get_contents($url, false, $context);
			$app_list_link = json_decode($app_list_link, true);

		//	echo count($app_listA);
		//	print_r($app_listA);
		//	error_reporting(0);
		}
		
		$currentZip = $zipcityselect;
		$nbLinkListTypeZipPrevious = 1;
		/*  Read clist zip-city Previous*/
			//  , 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => '1', 'numberSize' => $numberSize
 			$data = array('service' => 'readListZipPrevious', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypePropertyLinkAll, 'room' => $roomLinkAll, 'dept' => $zipselectLinkAll, 'currentZip' => $currentZip, 'limit' => $nbLinkListTypeZipPrevious);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_link_Previous = file_get_contents($url, false, $context);
			$app_list_link_Previous = json_decode($app_list_link_Previous, true);

		//	echo count($app_listA);
		//	print_r($app_listA);
		//	error_reporting(0);
	//	echo "list data A is: '".implode("','",$data). "  nb " . sizeof($app_list_link_Previous) . "'<br><br>";

		if (sizeof($app_list_link_Previous) < 1 ){
			$data = array('service' => 'readListZipLast', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypePropertyLinkAll, 'room' => $roomLinkAll, 'dept' => $zipselectLinkAll, 'limit' => $nbLinkListTypeZipPrevious);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_link_Previous = file_get_contents($url, false, $context);
			$app_list_link_Previous = json_decode($app_list_link_Previous, true);

		}

		$nbLinkListTypeZipNext = 1;
		/*  Read clist zip-city Previous*/
			//  , 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => '1', 'numberSize' => $numberSize
 			$data = array('service' => 'readListZipNext', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypePropertyLinkAll, 'room' => $roomLinkAll, 'dept' => $zipselectLinkAll, 'currentZip' => $currentZip, 'limit' => $nbLinkListTypeZipNext);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_link_Next = file_get_contents($url, false, $context);
			$app_list_link_Next = json_decode($app_list_link_Next, true);

		//	echo count($app_listA);
		//	print_r($app_listA);
		//	error_reporting(0);
		//echo "list data A is: '".implode("','",$data). "  nb " . sizeof($app_list_link_Next) . "'<br><br>";

		
		if (sizeof($app_list_link_Next) < 1 ){
			$data = array('service' => 'readListZipFirst', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypePropertyLinkAll, 'room' => $roomLinkAll, 'dept' => $zipselectLinkAll, 'limit' => $nbLinkListTypeZipPrevious);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_link_Next = file_get_contents($url, false, $context);
			$app_list_link_Next = json_decode($app_list_link_Next, true);

		}

			/*  End build list zip-city */


		$listLinkTypeCity = false;
		if ($type_property != 'Bien'){
			if ($room == '0'){
				if ($zipselect == 'dept' or $zipselect == ''){
					if ($zipcityselect != ''){
						if ($pricestart == '' or $pricestart == 'mini'){
							
							if ($pageSelected == '1'){
								$listLinkTypeCity = true;
							}
						}
					}
				}
			}
		}

		if ($listLinkTypeCity){  

			// List link type city 
			$indexTypePropertyTypeCity = $indexTypeProperty;  // '1'
			$roomTypeCity = "0";
			$zipselectTypeCity = "";//$app['dept']; //"74";
			$zipcityselectTypeCity = $zipcityselect; //$zipcity; //$app['cp']; //$app['lexie5']; //74000
			$pageSelected = "1";
			$nbLinkPropertiesByPage = 80;

			/*  Read cplist zip-city */
			//  , 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => '1', 'numberSize' => $numberSize
 			$data = array('service' => 'readListZipByTypeProperty', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypePropertyTypeCity, 'room' => $roomTypeCity, 'dept' => $zipselectTypeCity, 'zipcity' => $zipcityselectTypeCity, 'limit' => $nbLinkPropertiesByPage);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_link_type_city = file_get_contents($url, false, $context);
			$app_list_link_type_city = json_decode($app_list_link_type_city, true);

		//	echo count($app_listA);
		//	print_r($app_listA);
		//	error_reporting(0);
		}
			/*  End build list zip-city */




			$urlLogo = plugins_url() . '/real-estate-agency/theme-realestate/realestate-template-parts/image/'. 'Logo-Real-estate-Medium-WP-Comp.jpg';

			
            $data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => 'c', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => '0', 'numberSize' => '0');

			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));

			$context = stream_context_create($options);
			$app_count1 = file_get_contents($url, false, $context);
			$app_count = json_decode($app_count1, true);

			$nbpage = (int)($app_count / $nbPropertiesByPage);	

			
/*
		echo "Login " . sanitize_email($login);
		echo "<br> fieldFilter " . $fieldFilter;
		echo "<br> valueStringField " . sanitize_text_field($valueStringField);
		echo "<br> indexTypeProperty " . $indexTypeProperty;
		echo "<br> room " . $room;
		echo "<br> dept " . $zipselect;
		echo "<br> zipcity " . $zipcityselect;
		echo "<br> priceStart " . $pricestart;
		echo "<br> priceEnd " . $priceend;
		echo "<br> currentPage " . $pageSelected;
		echo "<br> numberSize " . $nbPropertiesByPage;
*/
	//	echo "<br> currentPage " . $pageSelectedList . "<br><br><br>";
 			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => '44'
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelectedList, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app_list = json_decode($app_list, true);

//echo "list data A is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";

			$nbpage = (int)($app_count / $nbPropertiesByPage);	

			if ($app_count < 1) {
				http_response_code(410); 
			}

			get_template_part( 'header', 'realestate' ); 	


?>

<?php
	$urlPageParam = strtolower("/achat/" . get_query_var('type_property', 'bien') . "/" . get_query_var('zipcity', '') . "/");
	$urlPageParam = str_replace(" ","-",$urlPageParam);
	$urlPageCanonical = get_home_url() . $urlPageParam;
	if (is_front_page()){
		$urlPageCanonical = get_home_url() . '/';
	}
?>

<link rel="canonical" href="<?php echo esc_url_raw($urlPageCanonical) ?>" />
<?php
	$cpCityDescription = str_replace("-"," ",get_query_var('zipcity', ''));
	$cpDescription = substr($cpCityDescription, 0,5);
	$cityDescription =  ucwords(substr($cpCityDescription, 6));
	$cityDescription = str_replace(" ","-",$cityDescription);
	$cpCityDescription = $cityDescription . " " . $cpDescription;
	$textDescription = "Achat ". get_query_var('type_property', 'bien') . " " . $cpCityDescription  . ". Découvrer nos annonces de vente ou d'achat d'un(e) " . get_query_var('type_property', 'bien') . " aux alentours de ". $cityDescription . ". Agences immobilières déposer vos annonces immobilières gratuitement."
?>
<meta name="description" content="<?php echo strip_tags(substr($textDescription, 0, 300)) ?>">



<style>
.site-header{
	top: -12px;
}
.headcontent {
   padding: 1.5em 0 0 0;
}
.headimage {
   /*top: -10px;*/
}

.width_content-realestate{width:900px;}


.propertiescontent {
   padding: -0.5em 0 0 0;
}
.propertiescontentmobile {
   padding: 0.5em 0 0 0;
}
/*.button_realestate {
	background-color: #222;
	border: 0;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	-webkit-box-shadow: none;
	box-shadow: none;
	color: #fff;
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
}*/
/*.button_nav {
    background-color: #D8D8D8; 
    border: none;
    color: #585858;
    padding: 4px 6px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
}*/
/*.button_nav2 {
    background-color: #D8D8D8; 
    border: none;
    color: #585858;
    padding: 4px 12px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
}*/
/*.button_nav:hover {
	background-color: #585858; 
  	color: #D8D8D8;
}*/
/*.button_nav2:hover {
	background-color: ##585858; 
  	color: #D8D8D8;
}*/
.td_nav {
	vertical-align:center;
}

.page-template-full-width .content-area {
 
    border: 0px;
    padding: 0px;
    margin-left: auto;
	margin-right: auto;
	max-width: 1000px;
}


.page-template-full-width .site {
margin:0px;float: left;
}
.full-realestate{
	<?php if (is_front_page()){ 
		echo 'margin-top: -1.0em;';
	} else {
		echo 'margin-top: -3.5em;';
	} ?>
	
	<?php 
		if ( wp_is_mobile() ) { 
			echo "max-width: 610px;";
		} else { 
			echo "width: 1340px;";
		} 
	?>
}
.margin-top-small{
	margin-top: 0.5em;
}
.margin-left-small{
	margin-left: 0.7em;
	margin-right: 0.7em;
}
   
.pading-property {
	top: -1.5em;
}
.pading-property-small {
	padding-top: 1.5em;
}
button {
    white-space: nowrap;
}
.margin-top-midle{
	margin-top: -2em;
}
h1 {
    font-size: 0.975rem;
    font-weight: 800;
    margin-bottom: 0.2em;
}
h2 {
    font-size: 0.975rem;
    font-weight: 800;
    margin-bottom: -1.5em;
    padding-bottom: 0em;
}
.titleh2 {
    font-size: 0.975rem;
    font-weight: 800;
    border: none;
    /*color: black; */
    margin-bottom: -1.5em;
    padding-bottom: 0em;
}
.titlemobileh1 {
    font-size: 1.3rem;
    font-weight: 900;
    border: none;
    margin-top: -2.0em;
    margin-bottom: -0.9em;
    padding-bottom: 0em;
}
.titlemobileh2 {
    font-size: 1.1rem;
    font-weight: 900;
    border: none;
    margin-bottom: -0.5em;
    padding-bottom: 0em;
}

.marginH2 {
	margin-top: -1.0em;
	margin-bottom: -0.0em;
}
.marginTopH2{
	margin-top: -2.0em;
}

</style>

	<?php

			if ($app_count < 1) {
				?><br><br><br><br>
				<h1><p align="center" style="color: red">Désolé cette page n'existe pas.<?php echo http_response_code(); ?></p></h1>
				<?php
				exit;
			}		    	

//	echo "app_list data readPropertiesWeb is: '".implode("','",$data) . "<br><br>";

	/* Chapeau list page city  from cocon Realestate */

	$hatListProperties = '';
	$hatListPropertiesB = '';
	$urlpagecocon = '';
	$propertycocon = '';
	$citycocon = '';

	$nofollow = ' rel="nofollow"';
	
	$coconOk = false;
	if ($type_property != 'Bien'){
		if ($room == '0'){
			if ($zipselect == 'dept' or $zipselect == ''){
				if ($zipcityselect != ''){
					if ($pricestart == '' or $pricestart == 'mini'){
						
						if ($pageLandingSelected == ''){
							$nofollow = '';
							$coconOk = true;
						}
					}
				}
			}
		}
	}

	if ($coconOk){   
	if ($siteRealestateOn == true){
		if ( ! is_front_page() ) {
			$typepropertycocon = get_query_var('type_property', '');
			$zipcitycocon = get_query_var('zipcity', '');
			$zipcocon = substr($zipcitycocon,0,5);

 			$data = array('service' => 'getRecordPageCoconSiteWeb', 'plateform' => '1', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => '', 'typeProperty' => $typepropertycocon, 'zip' => $zipcocon
 				);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_cocon = file_get_contents($url, false, $context);
			$appCocon = json_decode($app_list_cocon, true);
	

	//	echo "appCocon data D is: '".implode("','",$data) . "<br><br>";

			// liste des biens

			$hatListProperties = $appCocon['hatListProperties'];
			$hatListPropertiesB = $appCocon['hatListPropertiesB'];
			$urlpagecocon = $appCocon['idUrlPageCocon'];
			$propertycocon = $appCocon['lexie5'];
			$citycocon = $appCocon['lexie4'];
			$anchor1 = $appCocon['anchor1'];
			$anchor2 = $appCocon['anchor2'];
			$anchor3 = $appCocon['anchor3'];
			$anchor4 = $appCocon['anchor4'];
			$anchor5 = $appCocon['anchor5'];
			$anchor6 = $appCocon['anchor6'];
			$anchor7 = $appCocon['anchor7'];
			$anchor8 = $appCocon['anchor8'];
			$anchor9 = $appCocon['anchor9'];
			$anchor10 = $appCocon['anchor10'];
			$subTitle1 = $appCocon['subTitle1'];
			$subTitle2 = $appCocon['subTitle2'];
			$subTitle3 = $appCocon['subTitle3'];
			$subTitle4 = $appCocon['subTitle4'];
			$subTitle5 = $appCocon['subTitle5'];
			$subTitle6 = $appCocon['subTitle6'];
			$subTitle7 = $appCocon['subTitle7'];
			$subTitle8 = $appCocon['subTitle8'];
			$subTitle9 = $appCocon['subTitle9'];
			$subTitle10 = $appCocon['subTitle10'];


		//	echo 'hatListProperties ' . $hatListProperties . '<br><br>';
		}
	}
	}
		/*	if ( is_front_page() ) {
		$data = array('service' => 'readCountCpCityRealestate', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField));

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data)
							));			

				$context = stream_context_create($options);
				$app_count_zipcitylinkrealestate = file_get_contents($url, false, $context);
				$app_count_zipcitylinkrealestate = json_decode($app_count_zipcitylinkrealestate, true);

			//	echo "Count list data D is: '".implode("','",$data). "  nb " . sizeof($app_count_zipcitylinkrealestate) . "<br><br>";

			 	$countPropertiesCpCity = json_encode($app_count_zipcitylinkrealestate);
			 //	echo "count " . $countPropertiesCpCity . "<br><br>";

 				// link front page city Realestate 


			$nbPropertiesByPageLink = 5;
			$restPlageLinkCity = $countPropertiesCpCity % $nbPropertiesByPageLink;
			$numberPlageLinkCity = ($countPropertiesCpCity - $restPlageLinkCity) / $nbPropertiesByPageLink;
			$numberPlageLinkCity = $numberPlageLinkCity -1;

			$startLinkCity = ($nbPropertiesByPageLink * $numberPlageLinkCity) + $restPlageLinkCity;
			$startLinkCity = ($nbPropertiesByPageLink * $numberPlageLinkCity) + $restPlageLinkCity;
			if (($countPropertiesCpCity - $nbPropertiesByPageLink) < 1){
				$startLinkCity = 0;
			}

		$pageSelectedLink = "1";
		$data = array('service' => 'readListCpCityRealestatePosNumber', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'pos' => $startLinkCity, 'numberSize' => $nbPropertiesByPageLink);  

	 			$options = array('http' => array( 'method'=> 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> http_build_query($data)));			
				$context = stream_context_create($options);
				$app_list_zipcitylinkrealestate = file_get_contents($url, false, $context);
				$app_list_zipcitylinkrealestate = json_decode($app_list_zipcitylinkrealestate, true);

			//	echo "list data C is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";

		}  */


		/* link page city of page Realestate */
	/*	if ( ! is_front_page() ) {

			$zipPage = $zipcityselect; 
			$limitLink = 3;

				$data = array('service' => 'readNextListCpCityRealestate', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'zip' => $zipPage, 'limit' => $limitLink, 'pageSelected' => $pageSelected, 'nbpage' => $nbpage);

	 			$options = array('http' => array( 'method'=> 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> http_build_query($data)));			
				$context = stream_context_create($options);
				$app_next_list_zipcitylinkrealestate = file_get_contents($url, false, $context);
				$app_next_list_zipcitylinkrealestate = json_decode($app_next_list_zipcitylinkrealestate, true);

		//		echo "list link data C is: '".implode("','",$data). "  nb " . sizeof($app_list_nextzipcitylinkrealestate) . "'<br><br>";

				if (sizeof($app_next_list_zipcitylinkrealestate) < $limitLink) { 
					$zipPage = '00000';
					$data = array('service' => 'readNextListCpCityRealestate', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'zip' => $zipPage, 'limit' => $limitLink, 'pageSelected' => $pageSelected, 'nbpage' => $nbpage);

		 			$options = array('http' => array( 'method'=> 'POST', 'header'=>'Content-type: application/x-www-form-urlencoded', 'content'=> http_build_query($data)));			
					$context = stream_context_create($options);
					$app_next_list_zipcitylinkrealestate = file_get_contents($url, false, $context);
					$app_next_list_zipcitylinkrealestate = json_decode($app_next_list_zipcitylinkrealestate, true);

				}	

		}  */


			?>


<?php
$imgFirstCol = "";
$urlphotosnippet = '';
if ($app_count > 0) {  ?>
	<?php foreach ($app_list as $app): ?>
	<?php	if ($app['urlphoto1'] != ''){
		 	$imgFirstCol = $app['urlphoto1'];break;
		 	}elseif ($app['urlphoto2'] != ''){
		 		$imgFirstCol = $app['urlphoto2'];break;
			}elseif ($app['urlphoto3'] != ''){
				$imgFirstCol = $app['urlphoto3'];break;
			}elseif ($app['urlphoto4'] != ''){
				$imgFirstCol = $app['urlphoto4'];break;
			}elseif ($app['urlphoto5'] != ''){
				$imgFirstCol = $app['urlphoto5'];break;
			}elseif ($app['urlphoto6'] != ''){
				$imgFirstCol = $app['urlphoto6'];break;
			}else{
				$imgFirstCol = $urlLogo;break;
			} ?>

<?php endforeach; ?>
<?php }
	
	$imgFirstCol = esc_url_raw(strtolower($imgFirstCol));
	$urlphotosnippet = $imgFirstCol;

	$info     = pathinfo($urlLogo);

	if ($urlphotosnippet == '') { 
		$urlphotosnippet = "https://storage.googleapis.com/immobilier-fr.fr/img-realestate/img-realestate-44/44-Maison-Annecy-44-1533419284813-1534239244024-s.jpg";
	}else{
		$urlphotosnippet = str_replace(".jpg", "-s.jpg", $urlphotosnippet);
	}
?>

<?php 
	$determinant = "un ";
		$propertySnippet   = strtolower(get_query_var('type_property', 'bien'));
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

	$snippet = strip_tags(substr($textDescription, 0, 300)); //'Trouver ' . $determinant . $propertySnippet . ' à ' . $cpCityDescription; 
?>

<!-- Balisage JSON-LD généré par l'outil d'aide au balisage de données structurées de Google --> 
<script type="application/ld+json">
 { 
 "@context" : "http://schema.org", "@type" : "LocalBusiness", "name" : "<?php echo $snippet ?>", 
 "image" : "<?php echo esc_url_raw($urlphotosnippet) ?>", 
 "address" : { "@type" : "PostalAddress", "addressLocality" : "<?php echo $app['city'] ?>" }
}
</script>

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





<body <?php body_class(); ?>  onresize="resizeScreenHead()" onclick="rgpd()">

<div id="page" class="site" class="width_content-realestate">

	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'realestate-template-parts/header/header', 'imagerealestate' ); ?>
		
	</header><!-- #masthead <?php wp_title( '', true, 'right' ); ?> position: absolute;-->


	<div class="site-content-contain">
		<div id="content" class="site-content headcontent">

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
		
	<div class="full-realestate" id="firstDiv">
	
		<?php get_template_part( 'realestate-template-parts/header/rgpd-headerrealestate'); ?>
		
<?php if ( !wp_is_mobile() ) { ?>
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

	<script type="text/javascript">
	function callPage(urlPage) {
		urlPage = urlPage.replace(/ /g, "-");
		urlPage = location.protocol + '//' + location.hostname + urlPage.toLowerCase();
	    location.replace(encodeURI(urlPage));
	}
</script>
<?php
	$nofollowheader = '';
	if ( ! is_front_page() ) {
		$nofollowheader = ' rel="nofollow"';
	}
?>
<?php if ( ! wp_is_mobile() ) { ?>
	<div id="primary">
		<main id="main" class="propertiescontent" role="main">
			<br>
			 <table align="center" width="100%">
				<tr valign="top">
			 	<!--	<?php if ( wp_is_mobile() ) { ?>
			 			<td></td>
		 			<?php } ?>-->
			      	<td colspan="3" valign="top">
			      		<?php if ($siteAgencyOn ) { ?>  
							<a href='/contactagence/'><button class="button_realestate">Contact Agence <?php echo $app_img["agency"] ?></button></a>
						<?php } else {?>  
								<a <?php echo $nofollowheader ?> href='/listeagenceimmo/'><button class="button_realestate">Liste Agences immobilières</button></a>&nbsp;&nbsp;<a <?php echo $nofollowheader ?> href='/deposeruneannonceimmobiliere/'><button class="button_realestate">Déposer une Annonce gratuite en Express</button></a>&nbsp;&nbsp;<a <?php echo $nofollowheader ?> href='/agenceimmo/'><button class="button_realestate">Infos pour les agences</button></a>
						<?php }?>
			      	</td>
			      	<td align="left" valign="center" style="display:inline-block;white-space: nowrap">
			      		<a <?php echo $nofollowheader ?> href='/comptevisitor/'><button class="button_realestate">Connexion à votre Compte</button></a>
			      	</td>			      	
		      	</tr>

			 	<tr valign="top">			 		
			      	<td colspan="3" valign="top"><?php get_template_part( 'realestate-template-parts/navigation/navigation-toprealestate'); ?></td>
			     </tr>
			 	<tr>
			 	<td valign="top">
			 <!--		<?php if ( ! wp_is_mobile() ) { ?>-->
			 		<table>
			 			<tr width="300px" align="left" valign="top"><td width="300px">			 				
		 				<?php if ( ! $listLink ) { ?>
		 					<?php if ( ! $listLinkTypeCity ) { ?>
		    					<img class="showreal" style="width:300px;height:600px;" alt="" id="imgLeft" src="<?php echo esc_url_raw($app_img['urlphotoAccount2']); ?>">
		    				<?php } ?>
		    			<?php } ?>

		    			<?php
				    		$paramUrlListLinkAnchorBase = $urlDom . "/achat/" . strtolower(sanitize_text_field($type_property)) . "/" . sanitize_text_field($zipcityselect) . "-" . sanitize_text_field($citylist) . "/";
				    			$paramUrlListLinkAnchorBase = strtolower($paramUrlListLinkAnchorBase);
				    	?>
		    			<?php if ($anchor1 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor1;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle1) . '</strong></a><br>';	
					    } ?>
						<?php if ($anchor2 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor2;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle2) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor3 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor3;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle3) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor4 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor4;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle4) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor5 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor5;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle5) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor6 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor6;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle6) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor7 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor7;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle7) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor8 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor8;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle8) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor9 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor9;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle9) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor10 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor10;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle10) . '</strong></a><br>';	
					    } ?>

		    			<?php if ( $listLink ) {
		    				echo "<br>";
				    		foreach ($app_list_link as $applistlink): 

								$paramUrlListLink = "/achat/" . strtolower(sanitize_text_field($applistlink['typeProperty'])) . "/" . sanitize_text_field($applistlink['cp']) . "-" . sanitize_text_field($applistlink["city"]) . "/";
									$paramUrlListLink = str_replace(" ","-",$paramUrlListLink);
								?> 
								<a class="linkUnderline linkCustom" target="_blank" href="<?php echo prepare_url($paramUrlListLink)?>">
								<?php 
								echo sanitize_text_field($applistlink["typeProperty"]) . ' ';
						      	echo sanitize_text_field($applistlink["city"]) . '</a><br>';	
					
							endforeach;
						 } 
					?>

					<?php if ( $listLinkTypeCity ) { 
							echo "<br>";
				    		foreach ($app_list_link_type_city as $applistlinktypecity): 

								$paramUrlListLink = "/vente/" . strtolower(sanitize_text_field($applistlinktypecity['typeProperty'])) . "/" . sanitize_text_field($applistlinktypecity['city']) . "-" . sanitize_text_field($applistlinktypecity["cp"]) . "/" . sanitize_text_field($applistlinktypecity["idRealEstate"]) . "/";
									$paramUrlListLink = str_replace(" ","-",$paramUrlListLink);
								?> 
								<a class="linkUnderline linkCustom" target="_blank" href="<?php echo prepare_url($paramUrlListLink)?>">
								<?php 
								$roomLink = '';
								if ($applistlinktypecity["room"] > 0){
									$roomLink = sanitize_text_field($applistlinktypecity["room"]) . ' pièce(s) ';
								}
								$surfaceLink = sanitize_text_field($applistlinktypecity["surface"]) . ' m2 ';
								$priceLink = sanitize_text_field($applistlinktypecity["price"]) . ' €';
								echo $roomLink . $surfaceLink . $priceLink . '</a><br>';

						     // 	echo sanitize_text_field($applistlinktypecity["typeProperty"]) . ' ' . $roomLink . sanitize_text_field($applistlinktypecity["city"]) . '</a><br>';	
					
							endforeach;
						 } 
					?>



			 			</td></tr>
		 			</table>
		 		<!--	<?php } ?>-->

			<!--		<?php
						$hardCodeAnchor = false;

						$pageSelectForLink = urldecode ( $wp_query->query_vars['pageselected']);
					//	echo '$type_property ' . $type_property . ' $zipcityselect ' . $zipcityselect . ' $room ' . $room . ' $zipselect ' . $zipselect . ' $pricestart ' . $pricestart . ' $priceend ' . $priceend. ' $pageSelected ' . $pageSelectForLink . '<br>';
						
						if ($type_property == '' or $zipcityselect == 'cp ville' or $room != '0' or $zipselect != '' or $pricestart != '' or $priceend != ''){
						// or $pageSelectForLink != '' 
							$hardCodeAnchor = false;
						}else{
							$hardCodeAnchor = true;
						}

						if ($hardCodeAnchor == true){
							if ( is_front_page() ) {
						   	//	echo ' is_front_page <br>';
						   		
						   		foreach ($app_list_zipcitylinkrealestate as $applistzipcitylinkrealestate): 
						   			$urlLinkPageZipCity = $urlDom.'/achat/' .$applistzipcitylinkrealestate["typeProperty"] .'/'.$applistzipcitylinkrealestate["cp"] . '-' .$applistzipcitylinkrealestate["city"] .'/';
						   			$urlLinkPageZipCity = str_replace(" ","-",$urlLinkPageZipCity);
						   			$urlLinkPageZipCity = strtolower($urlLinkPageZipCity);
						   			?>
									<a class="linkUnderline" href='<?php echo esc_url_raw($urlLinkPageZipCity)?>'><?php echo ucwords($applistzipcitylinkrealestate["typeProperty"]) . ' ' . ucwords($applistzipcitylinkrealestate["city"])?> </a><br>
								<?php endforeach; 

							}else{
								foreach ($app_next_list_zipcitylinkrealestate as $app_listnextzipcitylinkrealestate): 
						   			$urlLinkPageZipCity = $urlDom.'/achat/' .$app_listnextzipcitylinkrealestate["typeProperty"] .'/'.$app_listnextzipcitylinkrealestate["cp"] . '-' .$app_listnextzipcitylinkrealestate["city"] .'/';
						   			$urlLinkPageZipCity = str_replace(" ","-",$urlLinkPageZipCity);
						   			$urlLinkPageZipCity = strtolower($urlLinkPageZipCity);
						   			?>
									<a class="linkUnderline" href='<?php echo esc_url_raw($urlLinkPageZipCity)?>'><?php echo ucwords($app_listnextzipcitylinkrealestate["typeProperty"]) . ' ' . ucwords($app_listnextzipcitylinkrealestate["city"])?> </a><br>
								<?php endforeach; 
								
							}
							echo '<br>';
						}
					?>

				-->


			 	</td>
		<!--	 	<?php if ( ! wp_is_mobile() ) { ?>	-->
		 			<td width='1%'></td>
		<!-- 		<?php } ?>-->
			 	<td valign="top">
			    <table>
			    	<?php if ($hatListProperties != '' ) { ?>
			    	<tr>
			      		<td valign="top" style="text-align:left;" colspan="3" width='500px'>
			      			<p class="pCustom">
			    			<?php echo sanitize_text_field($hatListProperties); ?>
			    			<?php echo sanitize_text_field($hatListPropertiesB); ?>	
			    			</p>		    			
				    	</td>
				     </tr>
				     <?php } ?>
			     <tr>
			      <td valign="top" style="text-align:left;" colspan="3">
			      	<h1 class="h1Custom"><strong>Achat <?php 
			      	if (strtolower($zipcity) == 'cp-ville'){
			      		$zipCityH1 = '';
			      	}else{$zipCityH1 = str_replace("-", " ", $zipcity);}
			      	echo $type_property . ' ' . strtoupper($zipCityH1);
			      	?></strong></h1>			      	
			      </td>
			     </tr>

			    <?php if ($app_count > 0) { ?>
			    <?php foreach ($app_list as $app): ?>
			      <tr>
			      <td valign="top" style="text-align:left;" width='350px'>
		      			<a <?php echo $nofollow ?> href="/vente/<?php echo prepare_url(sanitize_text_field($app['typeProperty']))?>/<?php echo prepare_url(sanitize_text_field($app['city']))?>-<?php echo prepare_url(sanitize_text_field($app['cp']))?>/<?php echo prepare_url(sanitize_text_field($app['idRealEstate']))?>/">

						<?php
						$urlphoto = "";
						$caption = "";
						$imgempty = true;
			      			//	boolean imgempty = true;
				    	if ($app['urlphoto1'] != ""){
				    		$urlphoto = $app['urlphoto1'];$caption = $app['caption1'];$imgempty = false;
						}else if ($app['urlphoto2'] != ""){
				    		$urlphoto = $app['urlphoto2'];$caption = $app['caption2'];$imgempty = false;
						}else if ($app['urlphoto3'] != ""){
				    		$urlphoto = $app['urlphoto3'];$caption = $app['caption3'];$imgempty = false;
						}else if ($app['urlphoto4'] != ""){
				    		$urlphoto = $app['urlphoto4'];$caption = $app['caption4'];$imgempty = false;
						}else if ($app['urlphoto5'] != ""){
				    		$urlphoto = $app['urlphoto5'];$caption = $app['caption5'];$imgempty = false;
						}else if ($app['urlphoto6'] != ""){
				    		$urlphoto = $app['urlphoto6'];$caption = $app['caption6'];$imgempty = false;
						}
						$urlphoto = strtolower($urlphoto);
		 			 	?>

		 		<!--	 	<?php if ( ! wp_is_mobile() ) { ?>-->
			      			<?php if ($imgempty == false) : ?>
			      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
				      			<img class="showreal" style="width:350px;height:250px;" alt="<?php echo sanitize_text_field($caption1) ?>" id="img" src="<?php echo esc_url_raw($urlphoto) ?>"/>
			      			<?php else : ?>
			      				<img class="showreal" style="width:350px;height:250px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
		      				<?php endif; ?>
	      		<!--		<?php } else {?>
	      						<?php if ($imgempty == false) : ?>
			      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
				      			<img class="showreal" style="width:250px;height:200px;" alt="<?php echo sanitize_text_field($caption1) ?>" id="img" src="<?php echo esc_url_raw($urlphoto) ?>"/>
			      			<?php else : ?>
			      				<img class="showreal" style="width:250px;height:200px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
		      				<?php endif; ?>
  						<?php } ?>-->
						</a>
      				</td>
      		<!--		<?php if ( ! wp_is_mobile() ) { ?>-->
      					<td width='1%'></td>
      		<!--		<?php } else {?>

  					<?php } ?>-->
  					<td style="text-align:left;" valign="top" width="250px">
  						<a <?php echo $nofollow ?> href="/vente/<?php echo prepare_url(sanitize_text_field($app['typeProperty']))?>/<?php echo prepare_url(sanitize_text_field($app['city']))?>-<?php echo prepare_url(sanitize_text_field($app['cp']))?>/<?php echo prepare_url(sanitize_text_field($app['idRealEstate']))?>/">
			      		<h2 class="titleh2 h2Custom"><strong><?php echo sanitize_text_field($app["typeProperty"])?> 
	      				<?php if (sanitize_text_field($app['room']) > 1) : ?>
		      				<?php echo sanitize_text_field($app["room"])?> pièces
		      			<?php else : ?>
		      				<?php echo sanitize_text_field($app["room"])?> pièce
	      				<?php endif; ?>
	      				<?php echo ucfirst(sanitize_text_field($app["city"]))?> <?php echo sanitize_text_field($app["cp"])?>
	      				</strong>
	      				</h2>
			      		<?php if (sanitize_text_field($app['textDescription']) <> '') : ?>
				      		<br><p class="pCustom">
				      		<?php echo substr(sanitize_text_field($app["textDescription"]), 0, 185) . ' ...';?>
				      	</p>
			      		<?php endif; ?>
			      		
				      	<b style="text-decoration: underline" class="linkCustom">Détail du bien</b>
				      	<b class="priceCustom">Prix: <?php echo number_format( sanitize_text_field($app["price"]), 0, ',', ' ' )?> €</b>
				      	</a>
				    <!--  	<?php if ($type_property == 'Bien'){?>
				      	<a <?php echo $nofollow ?> class="linkUnderline" href="/achat/<?php echo prepare_url(sanitize_text_field($app['typeProperty']))?>/<?php echo prepare_url(sanitize_text_field($app['cp']))?>-<?php echo prepare_url(sanitize_text_field($app['city']))?>/">
				      		Achat&nbsp;<?php echo sanitize_text_field($app["typeProperty"])?>&nbsp;<?php echo ucfirst(sanitize_text_field($app["city"]))?>&nbsp;<?php echo sanitize_text_field($app["cp"])?>
			      		</a>
			      		<?php }?>-->
		      		</td>

			   	</tr>
			    <?php endforeach; ?>
			    <?php }else { ?>

			    	 <tr>
			    	 	<td>
			    	 		<br>
			    	 		<h2><p style="color: red">Cette page n'existe pas.<?php echo http_response_code(); ?></p></h2>
			    	 		
			    	 		<br><br><br><br><br><br><br><br><br><br>
		    	 		</td>
			    	 </tr>	
			 	<?php }?>
			      <tr>
				<?php
					$nbPageNav = 7;
					$pageSelectedNext =  $pageSelectedList + 1;
					$pageSelectedPrevious =  $pageSelectedList - 1;
					$nbpage = (int)($app_count / $nbPropertiesByPage);	
					if ((int)($app_count % $nbPropertiesByPage) > 0) $nbpage = $nbpage + 1;
			//		echo ' nbpage ' . $nbpage . '  ' . $app_count . ' / ' . $nbPropertiesByPage;
			//		echo ' % nbpage ' . ($app_count % $nbPropertiesByPage);

					$startPage = 0;
					if ($pageSelectedList <= $nbPageNav){
						$startPage = $startPage + 1;
					}else{
						$startPage = ($nbPageNav * ((int)($pageSelectedList /  $nbPageNav))); 
						if (($pageSelectedList % $nbPageNav) > 0){
							$startPage = ($nbPageNav * ((int)($pageSelectedList /  $nbPageNav))) + 1; 
						}else{
							$startPage = ($nbPageNav * ((int)(($pageSelectedList /  $nbPageNav) -1))) + 1;
						}
					}
					$endPage = $startPage + $nbPageNav;
					if ($zip == '') {$zip = 'dept';}
				//	$paramUrlList = "/achat/bien/0-piece/dept/cp-ville/mini/max/";
					$paramUrlList = "/achat/" . strtolower(sanitize_text_field($type_property)) . "/" . sanitize_text_field($room) . "/" . sanitize_text_field($zip) . "/" . sanitize_text_field($zipcity) . "/" . sanitize_text_field($pricemini) . "/" . sanitize_text_field($pricemax) . "/";
					$paramUrlList = str_replace(" ","-",$paramUrlList);

					if ($endPage > $nbpage){
						$endPage = $nbpage + 1;
					}
					if ($pageSelectedPrevious < 1){
						$pageSelectedPrevious = 1;
					}
					
					if ($pageSelectedNext > $nbpage){
						$pageSelectedNext = $nbpage;
					}
			//		echo 'pnext ' . $pageSelectedNext . ' nbpage ' . $nbpage  . ' pageSelected ' . $pageSelectedList;
					$linkNext = $paramUrlList . $pageSelectedNext . '/';
					$linkPrevious = $paramUrlList . $pageSelectedPrevious . '/';

					$linkStart = $paramUrlList . 1 . '/';
					$linkEnd = $paramUrlList . $nbpage . '/';

				//	$hardCodeAnchor = false;

					//	$pageSelectForLink = urldecode ( $wp_query->query_vars['pageselected']);
					//	echo '$type_property ' . $type_property . ' $zipcityselect ' . $zipcityselect . ' $room ' . $room . ' $zipselect ' . $zipselect . ' $pricestart ' . $pricestart . ' $priceend ' . $priceend. ' $pageSelected ' . $pageSelectForLink . '<br>';
				/*		
					if ($type_property == '' or $zipcityselect == 'cp ville' or $room != '0' or $zipselect != '' or $pricestart != '' or $priceend != ''){
					// or $pageSelectForLink != '' 
						$hardCodeAnchor = false;
					}else{
						$hardCodeAnchor = true;
					}

				if ($hardCodeAnchor == true){
				*/
					$nofollow = ' rel="nofollow"';
					if ($app_count > 0) { 						 
					echo '<td colspan="3" align="left"><a href=' . esc_url_raw($linkStart) . $nofollow . '><button class="button_nav btPaginationCustom"><<</button></a>&nbsp;&nbsp;<a href=' . esc_url_raw($linkPrevious) . $nofollow . '><button class="button_nav btPaginationCustom button_nav_padding_large"><</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				
					  for( $page = $startPage ; $page < $endPage ; $page++ )
						{
							if ($page == $pageSelectedList){
								echo '<a class="linkPaginationSelectedCustom" href=' . esc_url_raw($paramUrlList . $page . '/') . $nofollow . '><b>' . $page . '</b></a>';
							}else{
								echo '<a class="linkPaginationCustom" href=' . esc_url_raw($paramUrlList . $page . '/') . $nofollow . '><b>' . $page . '</b></a>';
							}	
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';					
						}
						echo '<a href=' . esc_url_raw($linkNext) . $nofollow . '><button class="button_nav btPaginationCustom button_nav_padding_large">></button></a>&nbsp;&nbsp;<a href=' . esc_url_raw($linkEnd) . $nofollow . '><button class="button_nav btPaginationCustom">>></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
					}

			/*	}else {
				
					if ($app_count > 0) { 
					echo '<td colspan="3" align="left"><button class="button_nav" onclick="callPage(\''. $linkStart .'\')"><<</button>&nbsp;&nbsp;<button class="button_nav2" onclick="callPage(\''. $linkPrevious .'\')"><</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				//	echo '<td align="left" class="td_nav">';
					  for( $page = $startPage ; $page < $endPage ; $page++ )
						{
							if ($page == $pageSelected){
								echo '<b style="color:grey;cursor: pointer" onclick="callPage(\''. $paramUrlList . $page .'\')">' . $page . '</b>';
							}else{
								echo '<b style="cursor: pointer" onclick="callPage(\''. $paramUrlList . $page .'\')">' . $page . '</b>';
							}
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';					
						}
					//	echo '</td>';
						echo '<button class="button_nav2" onclick="callPage(\''. $linkNext .'\')">></button>&nbsp;&nbsp;<button class="button_nav" onclick="callPage(\''. $linkEnd .'\')">>></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
					}
				}	*/
				?>	
							
			   	</tr>
			    </table>
			</td>
		<!--	<?php if ( ! wp_is_mobile() ) { ?>-->
			<td align="left" valign="top" style="display:inline-block;white-space: nowrap">			
				<table>
	 			<tr valign="top"><td>	
				<?php if ( $pubOn ) { ?>
				
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<ins class="adsbygoogle"
						     style="display:inline-block;width:300px;height:600px"
						     data-ad-client="ca-pub-7351030609964877"
						     data-ad-slot="3770514742"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>	

				<?php } else {?>
			<!--		<?php if ( ! wp_is_mobile() ) { ?>-->
				    	<img class="showreal" style="width:300px;height:600px;" alt="" id="imgRight" src="<?php echo esc_url_raw($app_img['urlphotoAccount3']); ?>">
			<!--    	<?php } ?>-->
				<?php } ?>
				</td></tr>
				</table>
			</td>
	<!--		<?php } ?>-->

			<td width='2%'></td>
			</tr>
	
			</table>
			<table>
							<tr>
				<td>	
						<?php if ( $listLinkTypeCity ) {
				    		foreach ($app_list_link_Previous as $applistlinkprevious): 

								$paramUrlListLinkPrevious = "/achat/" . strtolower(sanitize_text_field($applistlinkprevious['typeProperty'])) . "/" . sanitize_text_field($applistlinkprevious['cp']) . "-" . sanitize_text_field($applistlinkprevious["city"]) . "/";
									$paramUrlListLinkPrevious = str_replace(" ","-",$paramUrlListLinkPrevious);
								?> 
								<a class="linkUnderline linkCustom" target="_blank" href="<?php echo prepare_url($paramUrlListLinkPrevious)?>">
								<?php 
								echo sanitize_text_field($applistlinkprevious["typeProperty"]) . ' ';
						      	echo sanitize_text_field($applistlinkprevious["city"]) . '</a>';	
					
							endforeach;
							?>
							&nbsp;&nbsp;
							<?php 
				    		foreach ($app_list_link_Next as $applistlinknext): 

								$paramUrlListLinkNext = "/achat/" . strtolower(sanitize_text_field($applistlinknext['typeProperty'])) . "/" . sanitize_text_field($applistlinknext['cp']) . "-" . sanitize_text_field($applistlinknext["city"]) . "/";
									$paramUrlListLinkNext = str_replace(" ","-",$paramUrlListLinkNext);
								?> 
								<a class="linkUnderline linkCustom" target="_blank" href="<?php echo prepare_url($paramUrlListLinkNext)?>">
								<?php 
								echo sanitize_text_field($applistlinknext["typeProperty"]) . ' ';
						      	echo sanitize_text_field($applistlinknext["city"]) . '</a>';	
					
							endforeach;
							}
							?> 
					
				</td>
			</tr>
				<tr>
					<td>
						<?php if ($appCocon['hatArticle'] != "") {
							echo '<p class="pCustom">'.replace_balise_html($appCocon['hatArticle']) . '</p>';
						} 
						?>
						<?php if (sanitize_text_field($appCocon['anchor1']) != "") { ?>
				    		<span id="<?php echo sanitize_text_field($appCocon['anchor1']); ?>"></span>
				    	<?php }?>
				    	<img title="<?php echo $appCocon['imageAlt1']; ?>" alt="<?php echo $appCocon['imageAlt1']; ?>" id="img" src="<?php echo esc_url_raw($appCocon['urlImage1']); ?>">

				    	<br>
				    	<?php if (sanitize_text_field($appCocon['subTitle1']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle1']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA1']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA1']); }?>
					    <?php if ($appCocon['urlLinkP1'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor1'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP1']) . '/#' . $appCocon['urlTargetAnchor1'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP1']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom. '/immo/' .$appCocon['urlLinkP1']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP1']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA1']) != "") { echo replace_balise_html($appCocon['paragraphB1'] . '</p>');
					     }?>

					     <?php if (sanitize_text_field($appCocon['anchor2']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor2']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle2']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle2']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA2']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA2']); }?>
					    <?php if ($appCocon['urlLinkP2'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor2'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP2']) . '/#' . $appCocon['urlTargetAnchor2'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP2']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP2']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP2']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA2']) != "") { echo replace_balise_html($appCocon['paragraphB2'] . '</p>');
					     }?>


					    <?php if (sanitize_text_field($appCocon['anchor3']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor3']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle3']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle3']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA3']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA3']); }?>
					    <?php if ($appCocon['urlLinkP3'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor3'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP3']) . '/#' . $appCocon['urlTargetAnchor3'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP3']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP3']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP3']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA3']) != "") { echo replace_balise_html($appCocon['paragraphB3'] . '</p>');
					     }?>

					    <?php if (sanitize_text_field($appCocon['anchor4']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor4']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle4']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle4']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA4']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA4']); }?>
					    <?php if ($appCocon['urlLinkP4'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor4'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP4']) . '/#' . $appCocon['urlTargetAnchor4'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP4']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP4']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP4']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA4']) != "") { echo replace_balise_html($appCocon['paragraphB4'] . '</p>');
					     }?>

					     <?php if (sanitize_text_field($appCocon['anchor5']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor5']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle5']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle5']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA5']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA5']); }?>
					    <?php if ($appCocon['urlLinkP5'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor5'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP5']) . '/#' . $appCocon['urlTargetAnchor5'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP5']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP5']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP5']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA5']) != "") { echo replace_balise_html($appCocon['paragraphB5'] . '</p>');
					     }?>

					     <?php if (sanitize_text_field($appCocon['anchor6']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor6']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle6']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle6']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA6']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA6']); }?>
					    <?php if ($appCocon['urlLinkP6'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor6'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP6']) . '/#' . $appCocon['urlTargetAnchor6'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP6']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP6']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP6']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA6']) != "") { echo replace_balise_html($appCocon['paragraphB6'] . '</p>');
					     }?>

					     <?php if (sanitize_text_field($appCocon['anchor7']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor7']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle7']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle7']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA7']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA7']); }?>
					    <?php if ($appCocon['urlLinkP7'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor7'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP7']) . '/#' . $appCocon['urlTargetAnchor7'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP7']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP7']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP7']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA7']) != "") { echo replace_balise_html($appCocon['paragraphB7'] . '</p>');
					     }?>

					     <?php if (sanitize_text_field($appCocon['anchor8']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor8']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle8']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle8']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA8']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA8']); }?>
					    <?php if ($appCocon['urlLinkP8'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor8'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP8']) . '/#' . $appCocon['urlTargetAnchor8'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP8']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP8']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP8']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA8']) != "") { echo replace_balise_html($appCocon['paragraphB8'] . '</p>');
					     }?>

						<?php if (sanitize_text_field($appCocon['anchor9']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor9']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle9']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle9']); ?></Strong></h2>
					    <?php } ?>
					    <?php if (sanitize_text_field($appCocon['paragraphA9']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA9']); }?>
					    <?php if ($appCocon['urlLinkP9'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor9'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP9']) . '/#' . $appCocon['urlTargetAnchor9'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP9']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP9']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP9']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA9']) != "") { echo replace_balise_html($appCocon['paragraphB9'] . '</p>');
					     }?>

					     <?php if (sanitize_text_field($appCocon['anchor10']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor10']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle10']) != "") { ?>
					    	<h2 class="marginH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle10']); ?></Strong></h2>
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA10']) != "") { echo '<p class="pCustom">'. replace_balise_html($appCocon['paragraphA10']); }?>
					    <?php if ($appCocon['urlLinkP10'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor10'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP10']) . '/#' . $appCocon['urlTargetAnchor10'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP10']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP10']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP10']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphA10']) != "") { echo replace_balise_html($appCocon['paragraphB10'] . '</p>');
					     }?>					     




					</td>
				</tr>
				<?php if ( $linkPromoOn) { ?> 
				<tr>
				<!--	<?php if ( wp_is_mobile() ) { ?>
      					<td></td>
  					<?php } ?>-->
					<td>	

				</td>
				</tr>
				<?php } ?>
				<tr>
			<!--	<?php if ( wp_is_mobile() ) { ?>
  					<td></td>
				<?php } ?>-->
				<td>
				<?php	
				/*	if (get_the_title() == 'homelistrealestate'){
						if (home_url( $wp->request ) == 'http://vps520391.ovh.net') { 
								$linkPageCocon = '<a class="linkUnderline" href="http://vps520391.ovh.net/pageindex/dept/zip/">Index des pages</a>';
								echo $linkPageCocon;
						}
						if (home_url( $wp->request ) == 'https://www.immobilier-fr.fr') { 	
							$linkPageCocon = '<a class="linkUnderline" href="https://www.immobilier-fr.fr/pageindex/dept/zip/">Plan des pages du site</a>&nbsp;&nbsp;&nbsp;';
							echo $linkPageCocon;
							
						}

					}else if (get_the_title() == 'listproperties'){
						
					}*/
					
					if ( is_front_page() ) {
						echo '&nbsp;&nbsp;<a class="linkUnderline linkCustom" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a>';
						echo '&nbsp;&nbsp;<a  rel="nofollow" class="linkUnderline linkCustom" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a>';
						$linkImmobilierfr = '&nbsp;&nbsp;<a  rel="nofollow" class="linkUnderline linkCustom" href="https://www.immobilier-fr.fr">Propulsé par immobilier-fr.fr</a>';
						echo $linkImmobilierfr;
					}
					?>
				</td></tr>
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
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
</div>
</div>
</div>
<?php //get_footer(); ?>

<?php } // End desktop?> 


<?php if ( wp_is_mobile() ) { ?>
	<div id="primary">
		<main id="main" class="propertiescontentmobile" align="left" role="main">
			<br>
		

			    <div align="left" class="margin-left-small">
			      		<?php if ($siteAgencyOn ) { ?>   
								<a href='/contactagence/'><button class="button_realestate">Contact Agence <?php echo substr($app_img["agency"],0,20) ?></button></a><a href='/comptevisitor/'><br><button  class="button_realestate">Compte</button></a>
						<?php } else {?> 
								<a <?php echo $nofollowheader ?> href='/comptevisitor/'><button class="button_realestate">Compte</button></a>&nbsp;&nbsp;<a <?php echo $nofollowheader ?> href='/listeagenceimmo/'><button class="button_realestate">Liste Agences immobilières</button></a><br><a <?php echo $nofollowheader ?> href='/deposeruneannonceimmobiliere/'><button class="button_realestate margin-top-small">Déposer une Annonce gratuite en Express</button></a><br><a <?php echo $nofollowheader ?> href='/agenceimmo/'><button class="button_realestate margin-top-small">Infos pour les agences</button></a>
						<?php } ?>
			   
			   			<br>
			   		<div align="left">
			      		<?php get_template_part( 'realestate-template-parts/navigation/navigation-toprealestate'); ?>
			      	</div>
					<br>
			    	<?php if ($hatListProperties != '' ) { ?>
			      			<p class="pCustom">
			    			<?php echo sanitize_text_field($hatListProperties); ?>
			    			<?php echo sanitize_text_field($hatListPropertiesB); ?>
			    			</p>			    			

				     <?php } ?>

			      	<h1 class="titlemobileh1 h1Custom"><strong>Achat <?php 
			      	if (strtolower($zipcity) == 'cp-ville'){
			      		$zipCityH1 = '';
			      	}else{$zipCityH1 = str_replace("-", " ", $zipcity);}
			      	echo $type_property . ' ' . strtoupper($zipCityH1);
			      	?></strong></h1>

			     </div>
			     <?php if ($app_count > 0) { ?>
			     	<br>
			    <?php foreach ($app_list as $app): ?>
			    	
		      			<a <?php echo $nofollow ?> href="<?php echo $urlDom?>/vente/<?php echo prepare_url(sanitize_text_field($app['typeProperty']))?>/<?php echo prepare_url(strtolower(sanitize_text_field($app['city'])))?>-<?php echo prepare_url(sanitize_text_field($app['cp']))?>/<?php echo prepare_url(sanitize_text_field($app['idRealEstate']))?>/">
		      			<?php $priceFormat = number_format( sanitize_text_field($app["price"]), 0, ',', ' ' )?>
		      			<h2 class="titlemobileh2 margin-left-small h2Custom"><strong>
			      		<?php echo sanitize_text_field($app["typeProperty"])?> 
			      		<?php if (sanitize_text_field($app['room']) > 1) : ?>
		      				<?php echo sanitize_text_field($app["room"])?> pièces
		      			<?php else : ?>
		      				<?php echo sanitize_text_field($app["room"])?> pièce
	      				<?php endif; ?>
			      		<?php echo ucfirst(sanitize_text_field($app["city"]))?> <?php echo sanitize_text_field($app["cp"])?>
			      		</strong>
			      		</h2>			      		
			      		<br>
						<?php
						$urlphoto = "";
						$caption = "";
						$imgempty = true;
			      			//	boolean imgempty = true;
				    	if ($app['urlphoto1'] != ""){
				    		$urlphoto = $app['urlphoto1'];$caption = $app['caption1'];$imgempty = false;
						}else if ($app['urlphoto2'] != ""){
				    		$urlphoto = $app['urlphoto2'];$caption = $app['caption2'];$imgempty = false;
						}else if ($app['urlphoto3'] != ""){
				    		$urlphoto = $app['urlphoto3'];$caption = $app['caption3'];$imgempty = false;
						}else if ($app['urlphoto4'] != ""){
				    		$urlphoto = $app['urlphoto4'];$caption = $app['caption4'];$imgempty = false;
						}else if ($app['urlphoto5'] != ""){
				    		$urlphoto = $app['urlphoto5'];$caption = $app['caption5'];$imgempty = false;
						}else if ($app['urlphoto6'] != ""){
				    		$urlphoto = $app['urlphoto6'];$caption = $app['caption6'];$imgempty = false;
						}
						$urlphoto = strtolower($urlphoto);
		 			 	?>

      					<?php if ($imgempty == false) : ?>
		      				<?php $urlphoto = str_replace(".jpg", "-s.jpg", $urlphoto) ?>
			      			<img class="showreal" style="width:100%;height:250px;" alt="<?php echo sanitize_text_field($caption1) ?>" id="img" src="<?php echo esc_url_raw($urlphoto) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:100%;height:250px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>
	      				<br>
			      		<p class="margin-left-small pCustom">
			      		<?php if (sanitize_text_field($app['textDescription']) <> '') : ?>			      			
				      			<?php echo substr(sanitize_text_field($app["textDescription"]), 0, 180) . ' ...';?>
				      			<br>
			      		<?php endif; ?>
			      		<b style="text-decoration: underline" class="linkCustom">Détail du bien</b>&nbsp;&nbsp;<b>Prix: <?php echo $priceFormat;?> €</b>
			      		</p>
						</a>					
			
			    <?php endforeach; ?>

			    <?php }else { ?>
			    	 		<br>
			    	 		<h2><p style="color: red" align="center" >Elargissez votre selection aucun bien n'a été trouvé.</p></h2>
			    	 		<br><br><br><br><br><br><br><br><br><br>

			 	<?php }?>

			      	<?php
					$nbPageNav = 7;
					$pageSelectedNext =  $pageSelectedList + 1;
					$pageSelectedPrevious =  $pageSelectedList - 1;
					$nbpage = (int)($app_count / $nbPropertiesByPage);	
					if ((int)($app_count % $nbPropertiesByPage) > 0) $nbpage = $nbpage + 1;
			//		echo ' nbpage ' . $nbpage . '  ' . $app_count . ' / ' . $nbPropertiesByPage;
			//		echo ' % nbpage ' . ($app_count % $nbPropertiesByPage);

					$startPage = 0;
					if ($pageSelectedList <= $nbPageNav){
						$startPage = $startPage + 1;
					}else{
						$startPage = ($nbPageNav * ((int)($pageSelectedList /  $nbPageNav))); 
						if (($pageSelectedList % $nbPageNav) > 0){
							$startPage = ($nbPageNav * ((int)($pageSelectedList /  $nbPageNav))) + 1; 
						}else{
							$startPage = ($nbPageNav * ((int)(($pageSelectedList /  $nbPageNav) -1))) + 1;
						}
					}
					$endPage = $startPage + $nbPageNav;
					if ($zip == '') {$zip = 'dept';}
				//	$paramUrlList = "/achat/bien/0-piece/dept/cp-ville/mini/max/";
					$paramUrlList = "/achat/" . strtolower(sanitize_text_field($type_property)) . "/" . sanitize_text_field($room) . "/" . sanitize_text_field($zip) . "/" . sanitize_text_field($zipcity) . "/" . sanitize_text_field($pricemini) . "/" . sanitize_text_field($pricemax) . "/";
					$paramUrlList = str_replace(" ","-",$paramUrlList);

					if ($endPage > $nbpage){
						$endPage = $nbpage + 1;
					}
					if ($pageSelectedPrevious < 1){
						$pageSelectedPrevious = 1;
					}
					
					if ($pageSelectedNext > $nbpage){
						$pageSelectedNext = $nbpage;
					}
			//		echo 'pnext ' . $pageSelectedNext . ' nbpage ' . $nbpage  . ' pageSelected ' . $pageSelectedList;
					$linkNext = $paramUrlList . $pageSelectedNext . '/';
					$linkPrevious = $paramUrlList . $pageSelectedPrevious . '/';

					$linkStart = $paramUrlList . 1 . '/';
					$linkEnd = $paramUrlList . $nbpage . '/';




		      	$nofollow = ' rel="nofollow"';
				if ($app_count > 0) { ?>
					<div align="left" class="margin-top-midle margin-left-small">
				<?php
				echo '<br><a href=' . esc_url_raw($linkStart) . $nofollow . '><button class="button_nav btPaginationCustom"><<</button></a>&nbsp;&nbsp;<a href=' . esc_url_raw($linkPrevious) . $nofollow . '><button class="button_nav btPaginationCustom"><</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			
				  for( $page = $startPage ; $page < $endPage ; $page++ )
					{
						if ($page == $pageSelectedList){
							echo '<a class="linkPaginationSelectedCustom" href=' . esc_url_raw($paramUrlList . $page . '/') . $nofollow . '><b>' . $page . '</b></a>';
						}else{
							echo '<a class="linkPaginationCustom" href=' . esc_url_raw($paramUrlList . $page . '/') . $nofollow . '><b>' . $page . '</b></a>';
						}	
						echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';					
					}
					echo '<a href=' . esc_url_raw($linkNext) . $nofollow . '><button class="button_nav btPaginationCustom">></button></a>&nbsp;&nbsp;<a href=' . esc_url_raw($linkEnd) . $nofollow . '><button class="button_nav btPaginationCustom">>></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';  // </td>
				?>
				</div>
				<?php }	?>

				<br>
				<div class="margin-left-small">
						<?php
				    		$paramUrlListLinkAnchorBase = $urlDom . "/achat/" . strtolower(sanitize_text_field($type_property)) . "/" . sanitize_text_field($zipcityselect) . "-" . sanitize_text_field($citylist) . "/";
				    		$paramUrlListLinkAnchorBase = strtolower($paramUrlListLinkAnchorBase);
				    	?>
		    			<?php if ($anchor1 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor1;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle1) . '</strong></a><br>';	
					    } ?>
						<?php if ($anchor2 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor2;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle2) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor3 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor3;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle3) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor4 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor4;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle4) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor5 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor5;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle5) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor6 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor6;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle6) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor7 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor7;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle7) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor8 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor8;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle8) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor9 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor9;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle9) . '</strong></a><br>';	
					    } ?>
					    <?php if ($anchor10 != '' ) {
			    			$paramUrlListLinkAnchor = $paramUrlListLinkAnchorBase. "#" . $anchor10;
							$paramUrlListLinkAnchor = str_replace(" ","-",$paramUrlListLinkAnchor);
							?> 
							<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkAnchor)?>">
							<?php
						      echo '<strong>' . sanitize_text_field($subTitle10) . '</strong></a><br>';	
					    } ?>

						<?php if ( $listLinkTypeCity ) {
				    		foreach ($app_list_link_Previous as $applistlinkprevious): 

								$paramUrlListLinkPrevious = "/achat/" . strtolower(sanitize_text_field($applistlinkprevious['typeProperty'])) . "/" . sanitize_text_field($applistlinkprevious['cp']) . "-" . sanitize_text_field(strtolower($applistlinkprevious["city"])) . "/";
									$paramUrlListLinkPrevious = str_replace(" ","-",$paramUrlListLinkPrevious);
								?> 
								<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkPrevious)?>">
								<?php 
								echo sanitize_text_field($applistlinkprevious["typeProperty"]) . ' ';
						      	echo sanitize_text_field($applistlinkprevious["city"]) . '</a><br>';	
					
							endforeach;
							?>
							<?php 
				    		foreach ($app_list_link_Next as $applistlinknext): 

								$paramUrlListLinkNext = "/achat/" . strtolower(sanitize_text_field($applistlinknext['typeProperty'])) . "/" . sanitize_text_field($applistlinknext['cp']) . "-" . sanitize_text_field(strtolower($applistlinknext["city"])) . "/";
									$paramUrlListLinkNext = str_replace(" ","-",$paramUrlListLinkNext);
								?> 
								<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLinkNext)?>">
								<?php 
								echo sanitize_text_field($applistlinknext["typeProperty"]) . ' ';
						      	echo sanitize_text_field($applistlinknext["city"]) . '</a><br>';	
					
							endforeach;
							}
							?> 

						<?php if ($appCocon['hatArticle'] != "") {
							echo '<br><p class="pCustom">'.replace_balise_html($appCocon['hatArticle']) . '</p>';
						} 
						?>
						<?php if (sanitize_text_field($appCocon['anchor1']) != "") { ?>
				    		<span id="<?php echo sanitize_text_field($appCocon['anchor1']); ?>"></span>
				    	<?php }?>
				    	
				    </div>

				    	<img style="width:500px;height:250px;" title="<?php echo $appCocon['imageAlt1']; ?>" alt="<?php echo $appCocon['imageAlt1']; ?>" id="img" src="<?php echo esc_url_raw($appCocon['urlImage1']); ?>">

				    <div class="margin-left-small">
				    	<br>
				    	<?php if (sanitize_text_field($appCocon['subTitle1']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle1']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">					   
					    <?php if (sanitize_text_field($appCocon['paragraphA1']) != "") { echo replace_balise_html($appCocon['paragraphA1']); }?>
					    <?php if ($appCocon['urlLinkP1'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor1'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP1']) . '/#' . $appCocon['urlTargetAnchor1'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP1']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom. '/immo/' .$appCocon['urlLinkP1']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP1']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB1']) != "") { echo replace_balise_html($appCocon['paragraphB1']);
					     }?>
						 </p>
					      <?php }?>

					     <?php if (sanitize_text_field($appCocon['anchor2']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor2']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle2']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle2']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">						   
					    <?php if (sanitize_text_field($appCocon['paragraphA2']) != "") { echo replace_balise_html($appCocon['paragraphA2']); }?>
					    <?php if ($appCocon['urlLinkP2'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor2'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP2']) . '/#' . $appCocon['urlTargetAnchor2'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP2']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP2']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP2']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB2']) != "") { echo replace_balise_html($appCocon['paragraphB2']);
					     }?>
					     </P>
					      <?php }?>

					    <?php if (sanitize_text_field($appCocon['anchor3']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor3']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle3']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle3']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA3']) != "") { echo replace_balise_html($appCocon['paragraphA3']); }?>
					    <?php if ($appCocon['urlLinkP3'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor3'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP3']) . '/#' . $appCocon['urlTargetAnchor3'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP3']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP3']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP3']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB3']) != "") { echo replace_balise_html($appCocon['paragraphB3']);
					     }?>
					    </p>
					    <?php }?>

					    <?php if (sanitize_text_field($appCocon['anchor4']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor4']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle4']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle4']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA4']) != "") { echo replace_balise_html($appCocon['paragraphA4']); }?>
					    <?php if ($appCocon['urlLinkP4'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor4'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP4']) . '/#' . $appCocon['urlTargetAnchor4'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP4']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP4']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP4']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB4']) != "") { echo replace_balise_html($appCocon['paragraphB4']);
					     }?>
					    </p>
					    <?php }?>

					     <?php if (sanitize_text_field($appCocon['anchor5']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor5']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle5']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle5']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA5']) != "") { echo replace_balise_html($appCocon['paragraphA5']); }?>
					    <?php if ($appCocon['urlLinkP5'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor5'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP5']) . '/#' . $appCocon['urlTargetAnchor5'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP5']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP5']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP5']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB5']) != "") { echo replace_balise_html($appCocon['paragraphB5']);
					     }?>
					    </p>
					    <?php }?>

					     <?php if (sanitize_text_field($appCocon['anchor6']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor6']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle6']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle6']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA6']) != "") { echo replace_balise_html($appCocon['paragraphA6']); }?>
					    <?php if ($appCocon['urlLinkP6'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor6'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP6']) . '/#' . $appCocon['urlTargetAnchor6'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP6']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP6']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP6']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB6']) != "") { echo replace_balise_html($appCocon['paragraphB6']);
					     }?>
					    </p>
					    <?php }?>

					     <?php if (sanitize_text_field($appCocon['anchor7']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor7']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle7']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle7']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA7']) != "") { echo replace_balise_html($appCocon['paragraphA7']); }?>
					    <?php if ($appCocon['urlLinkP7'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor7'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP7']) . '/#' . $appCocon['urlTargetAnchor7'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP7']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP7']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP7']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB7']) != "") { echo replace_balise_html($appCocon['paragraphB7']);
					     }?>
					    </p class="pCustom">
					    <?php }?>

					     <?php if (sanitize_text_field($appCocon['anchor8']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor8']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle8']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle8']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA8']) != "") { echo replace_balise_html($appCocon['paragraphA8']); }?>
					    <?php if ($appCocon['urlLinkP8'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor8'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP8']) . '/#' . $appCocon['urlTargetAnchor8'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP8']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP8']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP8']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB8']) != "") { echo replace_balise_html($appCocon['paragraphB8']);
					     }?>
					    </p>
					    <?php }?>

						<?php if (sanitize_text_field($appCocon['anchor9']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor9']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle9']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle9']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA9']) != "") { echo replace_balise_html($appCocon['paragraphA9']); }?>
					    <?php if ($appCocon['urlLinkP9'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor9'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP9']) . '/#' . $appCocon['urlTargetAnchor9'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP9']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP9']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP9']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB9']) != "") { echo replace_balise_html($appCocon['paragraphB9']);
					     }?>
					    </p>
					    <?php }?>

					     <?php if (sanitize_text_field($appCocon['anchor10']) != "") { ?>
					    	<span id="<?php echo sanitize_text_field($appCocon['anchor10']); ?>"></span>
					    <?php }?>
						<?php if (sanitize_text_field($appCocon['subTitle10']) != "") { ?>
					    	<h2 class="marginTopH2 h2Custom"><Strong><?php echo sanitize_text_field($appCocon['subTitle10']); ?></Strong></h2>
					    	<br>					    	
					    	<p class="pCustom">	
					    <?php if (sanitize_text_field($appCocon['paragraphA10']) != "") { echo replace_balise_html($appCocon['paragraphA10']); }?>
					    <?php if ($appCocon['urlLinkP10'] != "") { ?>
					    	<?php if ($appCocon['urlTargetAnchor10'] != "") { ?>
					    			<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP10']) . '/#' . $appCocon['urlTargetAnchor10'] ?>"><?php echo sanitize_text_field($appCocon['labelLinkP10']); ?></a>
			    			<?php } else { ?>	
			    					<a class="linkUnderline linkCustom" href="<?php echo strtolower($urlDom . '/immo/' .$appCocon['urlLinkP10']) ?>/"><?php echo sanitize_text_field($appCocon['labelLinkP10']); ?></a>   
			    			<?php }?> 	
					    <?php }?>
					    <?php if (sanitize_text_field($appCocon['paragraphB10']) != "") { echo replace_balise_html($appCocon['paragraphB10']);
					     }?>					     
						</p>
					    <?php }?>
				</div>

			<div class="margin-left-small">
				<?php if ( $linkPromoOn) { ?> 
		 				
		 				<?php if ( $listLink ) {
				    		foreach ($app_list_link as $applistlink): 
								$paramUrlListLink = $urlDom . "/achat/" . strtolower(sanitize_text_field($applistlink['typeProperty'])) . "/" . sanitize_text_field($applistlink['cp']) . "-" . sanitize_text_field($applistlink["city"]) . "/";
									$paramUrlListLink = strtolower(str_replace(" ","-",$paramUrlListLink));
								?>								 
								<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLink)?>">
								<?php 
								echo sanitize_text_field($applistlink["typeProperty"]) . ' ';
						      	echo sanitize_text_field($applistlink["city"]) . '</a><br>';	
					
							endforeach;
						 } 
					?>

					<?php if ( $listLinkTypeCity ) { 
				    		foreach ($app_list_link_type_city as $applistlinktypecity): 
								$paramUrlListLink = $urlDom . "/vente/" . strtolower(sanitize_text_field($applistlinktypecity['typeProperty'])) . "/" . sanitize_text_field($applistlinktypecity['city']) . "-" . sanitize_text_field($applistlinktypecity["cp"]) . "/" . sanitize_text_field($applistlinktypecity["idRealEstate"]) . '/';
									$paramUrlListLink = strtolower(str_replace(" ","-",$paramUrlListLink));
								?> 
								<a class="linkUnderline linkCustom" href="<?php echo prepare_url($paramUrlListLink)?>">
								<?php 
								$roomLink = '';
								if ($applistlinktypecity["room"] > 0){
									$roomLink = sanitize_text_field($applistlinktypecity["room"]) . ' pièce(s) ';
								}
								$surfaceLink = sanitize_text_field($applistlinktypecity["surface"]) . ' m2 ';
								$priceLink = sanitize_text_field($applistlinktypecity["price"]) . ' €';
								echo $roomLink . $surfaceLink . $priceLink . '</a><br>';
					
							endforeach;
						 } 
					} ?>
				</div>

			<div class="margin-left-small">
					<?php	
					if ( is_front_page() ) {
						echo '&nbsp;&nbsp;<a class="linkUnderline" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a>';
						echo '&nbsp;&nbsp;<a rel="nofollow" class="linkUnderline" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a><br>';
						$linkImmobilierfr = '&nbsp;&nbsp;<a rel="nofollow" class="linkUnderline" href="' . $urlDom . '">Propulsé par immobilier-fr.fr</a>';
						echo $linkImmobilierfr;
					}
					?>
			</div>
				
			<?php if ( $siteRealestateOn) { ?> 
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-99021046-1"></script>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', 'UA-99021046-1');
				</script>
			<?php } ?>	
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
</div>
</div>
</div>
<?php //get_footer(); ?>

<?php } // End Mobile?> 


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

		</body>
</html>

