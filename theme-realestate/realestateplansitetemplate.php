<?php
/**
 * Template Name: RealEstatePlansite
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
get_template_part( 'header', 'realestate' ); 
$pubOn = false;
$linkPromoOn = false;
$siteRealestateOn = false;
if ( get_home_url() == 'http://vps520391.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour la Production

$urlLogo = plugins_url() . '/real-estate-agency/theme-realestate/realestate-template-parts/image/'. 'Logo-Real-estate-Medium-WP-Comp.jpg';
$urlDom = get_home_url();

global $wp_query;
			
			$idc = '';

			$typeproperty = get_query_var('typepropertyplan', '');
			$typeProperty = strtolower($typeproperty);
			$zip = get_query_var('zipplan', '');
		//	echo "  zip " . $zip . "  typepropertyplan " . $typeproperty ."<br><br>";


global $wpdb;
			
			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;

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
/*
			$pageSelected = "1";
			$nbPropertiesByPage = 300;

			$showDept = false;
			$showListCity = false;
			$showListPage = false;
			$showPage = false;
			if ($level == "dept"){
				$showDept = true;
			}

			$lexie1 = '';
    		$lexie2 = '';
    		$lexie3 = '';
    		$lexie5 = 'appartement';
			if ($level == "0"){
				$showListCity = true;
				$showPage = true;
				$lexie1 = $zip;
			}else if ($level == "1"){
				$showDept = false;
				$showListPage = true;
				$showPage = true;
				$lexie2 = $zip;
			}

*/

// Debut readListZipPlanSite liste des departements
		//	sanitize_email($login)
			$nbLinkZip = 110;
			if ($zip == '') { 
		//		echo 'app_list_linkZipPlanSite A <br><br>';
				$data = array('service' => 'readListZipPlanSite', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'limit' => $nbLinkZip);

				$options = array('http' => array(
				    'method'=> 'POST',
				    'header'=>'Content-type: application/x-www-form-urlencoded',
	                'content'=> http_build_query($data)
				));

				$context = stream_context_create($options);
				$app_list_linkZipPlanSite = file_get_contents($url, false, $context);
				$app_list_linkZipPlanSite = json_decode($app_list_linkZipPlanSite, true);
			}
		//	echo "list data is: '".implode("','",$data). "  nb " . sizeof($app_list_linkZipPlanSite) . "'<br><br>";
// Fin readListZipPlanSite liste des departements


		// Debut List link type city 
	
			$indexTypePropertyLinkAll = '0';  
			$roomLinkAll = "0";
			$zipselectLinkAll = $zip;//$app['dept']; //"74";
			$zipcityselectLinkAll = ''; //$zipcity; //$app['cp']; //$app['lexie5']; //74000
			$pageSelected = "1";
			$nbLinkzipCity = 100;
			

			/*  Read cplist zip-city */
			if ((strlen($zip) == 2) Or (strlen($zip) == 3)) { 
			//  , 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => '1', 'numberSize' => $numberSize
	 			$data = array('service' => 'readListZip', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypePropertyLinkAll, 'room' => $roomLinkAll, 'dept' => $zipselectLinkAll, 'limit' => $nbLinkzipCity);

				$options = array('http' => array(
				    'method'=> 'POST',
				    'header'=>'Content-type: application/x-www-form-urlencoded',
	                'content'=> http_build_query($data)
				));

				$context = stream_context_create($options);
				$app_list_link = file_get_contents($url, false, $context);
				$app_list_link = json_decode($app_list_link, true);

//echo "list data is: '".implode("','",$data). "  nb " . sizeof($app_list_link) . "'<br><br>";
//print_r($app_list_link);
		//	echo count($app_listA);
		//	print_r($app_listA);
		//	error_reporting(0);
			}
		
// fin List link type city 


// Debut List link type city 
			$zipcityselect = $zip; //'74000';

			$indexTypePropertyTypeCity = '0'; //$indexTypeProperty;  // '1'
			$roomTypeCity = "0";
			$zipselectTypeCity = "";//$app['dept']; //"74";
			$zipcityselectTypeCity = $zipcityselect; //$zipcity; //$app['cp']; //$app['lexie5']; //74000
			$pageSelected = "1";
			$nbLinkPropertiesByPage = 100;

			if (strlen($zip) == 5) { 
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


// Fin List link type city






    	//	$currentPage = "1";
			$nbPagecocon = 20;
			$level = '1';
			$lexie1 = '';
    		$lexie2 = $zip;
    		$lexie3 = '';
    		$lexie5 = $typeproperty;


				$data = array('service' => 'readPageCoconForIndex', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'level' => $level, 'lexie1' => $lexie1, 'lexie2' => $lexie2, 'lexie3' => $lexie3, 'currentPage' => $pageSelected, 'numberSize' => $nbPagecocon);

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
?>

<?php
	$urlPageParam = strtolower("/plansite/");
	if ($zipplan == '') {$urlPageParam = strtolower("/plansite/");}
	if ((strlen($zip) == 2) Or (strlen($zip) == 3)) {$urlPageParam = strtolower("/plansite/") . $zip . '/';}
	if (strlen($zip) == 5) {$urlPageParam = strtolower("/plansite/") . $zip . '/' . $typepropertyplan . '/';}

	$urlPageParam = str_replace(" ","-",$urlPageParam);
	$urlPageCanonical = get_home_url() . $urlPageParam;
	
?>

<link rel="canonical" href="<?php echo esc_url_raw($urlPageCanonical) ?>" />
<?php

	$textDescription = "Liste des departements ayant des biens ";
?>
<!--<meta name="description" content="<?php echo strip_tags(substr($textDescription, 0, 300)) ?>">-->


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

.width_content-realestate{width:900px;}
</style>

<body <?php body_class(); ?>  onresize="resizeScreenHead()">

<div id="page" class="site" class="width_content-realestate">

	<header id="masthead" class="site-header" role="banner" valign="top">

		<?php get_template_part( 'realestate-template-parts/header/header', 'imagerealestate' ); ?>
		
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
			echo "width: 940px;";
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
}
</style>

<div class="full-realestate" id="firstDiv">
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

	function openWin(url) {
		    window.open(url);
		}
	  
</script>


<div id="primary">
		<main id="main" role="main">
			<?php if ($zip == '') { ?>
			<H1>Liste des départements</h1>
			<?php foreach ($app_list_linkZipPlanSite as $applistlinkZipPlanSite): ?>
				<?php if ($applistlinkZipPlanSite["dept"] != '00'){?>
					<a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/plansite/".$applistlinkZipPlanSite["dept"]."/")?>'>Liste des biens dans le département <?php echo $applistlinkZipPlanSite["dept"]?> </a><br>
				<?php }
				endforeach; 
			}
			?>

				
			<?php if ((strlen($zip) == 2) Or (strlen($zip) == 3)) { ?>
				<H1>Liste des villes du département <?php echo $zip ?> par type de bien</H1>

				<?php
		    		foreach ($app_list_link as $applistlink): 

						$paramUrlListLink = $urlDom . "/achat/" . strtolower(sanitize_text_field($applistlink['typeProperty'])) . "/" . sanitize_text_field($applistlink['cp']) . "-" . sanitize_text_field($applistlink["city"]) . "/";
							$paramUrlListLink = str_replace(" ","-",$paramUrlListLink);
						?> 
						<a class="linkUnderline" target="_blank" href="<?php echo prepare_url($paramUrlListLink)?>">
						<?php 
						echo sanitize_text_field($applistlink["typeProperty"]) . ' ';
				      	echo sanitize_text_field($applistlink["city"]) . '</a><br>';	
						?> 
						<a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/plansite/".$applistlink["cp"]."/" . strtolower($applistlink['typeProperty']))?>/'>
							Liste 
						<?php 
						echo sanitize_text_field(strtolower($applistlink["typeProperty"])) . ' ';
				      	echo sanitize_text_field($applistlink["city"]). $applistlink["cp"] . '</a><br>';	
			
					endforeach;
				}	
				?>
					
				<?php if (strlen($zip) == 5) { ?>
				<H1>Liste des <?php echo $typeproperty ?>(s) de la ville <?php echo $zip ?></H1>

				<?php 
				foreach ($app_list_link_type_city as $applistlinktypecity): 
					$paramUrlListLink = $urlDom . "/vente/" . strtolower(sanitize_text_field($applistlinktypecity['typeProperty'])) . "/" . sanitize_text_field($applistlinktypecity['city']) . "-" . sanitize_text_field($applistlinktypecity["cp"]) . "/" . sanitize_text_field($applistlinktypecity["idRealEstate"]) . "/";
						$paramUrlListLink = str_replace(" ","-",$paramUrlListLink);
					?> 
					<a class="linkUnderline" target="_blank" href="<?php echo prepare_url($paramUrlListLink)?>">
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
				
				?>
				<?php $first = true; ?>
				<?php foreach ($app_list as $applist): ?>
					<?php if ($first == true){ ?><H1>Liste des pages de la villes code postal <?php echo $zip ?> </H1><?php $first = false; } ?>
					<a class="linkUnderline" href='<?php echo esc_url_raw($urlDom.'/immo/'.$applist["idUrlPageCocon"])?>/'><?php echo $applist["idUrlPageCocon"] . " " . $applist["lexie2"] ?> </a><br>
				<?php endforeach; 
				}
				?>

		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div>
</div>
</div>
</div>
</div>




<?php function prepare_url($field){
	$field = str_replace(" ","-",strtolower($field));
	return $field;
	} 
?>

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
		</body>
</html>
