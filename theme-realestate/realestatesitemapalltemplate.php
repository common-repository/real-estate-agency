<?php
/**
 * Template Name: RealEstateSitemapAll
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
			
			$idc = get_query_var('idc', '');

global $wpdb;
			
			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;

		// pour les tests
			if ( get_home_url() == 'http://vps520391.ovh.net') {
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

			// list properties
			$fieldId = '';
			$dept = "";
			$limit = 500;

			//	echo "list data A is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";

			$data = array('service' => 'getSitemapListProperties', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'fieldId' => $fieldId, 'dept' => $dept, 'limit' => $limit);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app_list = json_decode($app_list, true);

			echo "getSitemapListProperties " . sizeof($app_list) . "<br><br>";

			// Properties avec id
			$fieldId = 'true';
			$dept = "";
			$limit = 500;

			$data = array('service' => 'getSitemapListProperties', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'fieldId' => $fieldId, 'dept' => $dept, 'limit' => $limit);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list_properties = file_get_contents($url, false, $context);
			$app_list_properties = json_decode($app_list_properties, true);
			
			
	echo "getSitemapListProperties id  " . sizeof($app_list_properties) . "'<br><br>";


				// getSitemapListPageCocon 
			$fieldId = 'true';
			$dept = "";
			$limit = 500;
			$level = "0";

			$data = array('service' => 'getSitemapListPageCocon', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'dept' => $dept, 'level' => $level, 'limit' => $limit);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list_pagecoconlevel0 = file_get_contents($url, false, $context);
			$app_list_pagecoconlevel0 = json_decode($app_list_pagecoconlevel0, true);
			
			
		echo "getSitemapListPageCocon0 ". sizeof($app_list_pagecoconlevel0) . "'<br><br>";

					// getSitemapListPageCocon 
			$fieldId = 'true';
			$dept = "";
			$limit = 500;
			$level = "1";

			$data = array('service' => 'getSitemapListPageCocon', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'dept' => $dept, 'level' => $level, 'limit' => $limit);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_list_pagecoconlevel1 = file_get_contents($url, false, $context);
			$app_list_pagecoconlevel1 = json_decode($app_list_pagecoconlevel1, true);
			
			
		echo "getSitemapListPageCocon1 ". sizeof($app_list_pagecoconlevel1) . "'<br><br>";

?>


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

			

				<?php 
					// all typeProperty

					$sitmaplistachat = '<?xml version="1.0" encoding="UTF-8"?>'; 
					$sitmaplistachat.="\n";
					$sitmaplistachat .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
				?>
				<?php foreach ($app_list as $applist): ?>
					<?php $urlAchat = $urlDom.'/achat/'.$applist["typeProperty"]. '/'. $applist["cp"] . "-" . $applist["city"] . '/';
					$urlAchat = strtolower($urlAchat);
					$urlAchat = str_replace(" ", "-", $urlAchat);
					$urlAchat = esc_url_raw($urlAchat);
					echo $urlAchat;
				//	$sitmaplistachat.="<url>\n";
    			//	$sitmaplistachat.="<loc>".$urlAchat."</loc>\n";
    			//	$sitmaplistachat.="</url>\n";
				//  filtrer sur les pages listes landing qui sont éligible cocon
					?>
					<br>
				<?php endforeach; ?>
				<?php $sitmaplistachat .= '</urlset>'; 
			    $fp = fopen( ABSPATH . "sitmaplistachat.xml", 'w' );
			    fwrite( $fp, $sitmaplistachat );
			    fclose( $fp );


			    // bien

			    $sitmaplistachatBien = '<?xml version="1.0" encoding="UTF-8"?>'; 
				$sitmaplistachatBien.="\n";
				$sitmaplistachatBien .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
				?><br><br>
				<?php foreach ($app_list as $applist): ?>
					<?php $urlAchatBien = $urlDom.'/achat/bien' . '/'. $applist["cp"] . "-" . $applist["city"] . '/';
					$urlAchatBien = strtolower($urlAchatBien);
					$urlAchatBien = str_replace(" ", "-", $urlAchatBien);
					$urlAchatBien = esc_url_raw($urlAchatBien);
					echo $urlAchatBien;
				//	$sitmaplistachatBien.="<url>\n";
    			//		$sitmaplistachatBien.="<loc>".$urlAchatBien."</loc>\n";
    			//	$sitmaplistachatBien.="</url>\n";
    				//  filtrer sur les pages listes landing qui sont éligible cocon
					?>
					<br>
				<?php endforeach; ?>
				<?php $sitmaplistachatBien .= '</urlset>'; 
			    $fp = fopen( ABSPATH . "sitmaplistachatbien.xml", 'w' );
			    fwrite( $fp, $sitmaplistachatBien );
			    fclose( $fp );



			   // app_list_properties
			    $sitmaplistventeproperty = '<?xml version="1.0" encoding="UTF-8"?>'; 
				$sitmaplistventeproperty.="\n";
				$sitmaplistventeproperty .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
				?><br><br>
				<?php foreach ($app_list_properties as $applistproperties): ?>
					<?php $urlVenteProperty = $urlDom.'/vente/' . $applistproperties["typeProperty"]. '/'. $applistproperties["city"] . "-" . $applistproperties["cp"]. "/" . $applistproperties["idRealEstate"] . '/';
					$urlVenteProperty = strtolower($urlVenteProperty);
					$urlVenteProperty = str_replace(" ", "-", $urlVenteProperty);
					$urlVenteProperty = esc_url_raw($urlVenteProperty);
					echo $urlVenteProperty;
					$sitmaplistventeproperty.="<url>\n";
    				$sitmaplistventeproperty.="<loc>".$urlVenteProperty."</loc>\n";
    				$sitmaplistventeproperty.="</url>\n";
					?>
					<br>
				<?php endforeach; ?>
				<?php $sitmaplistventeproperty .= '</urlset>'; 
			    $fp = fopen( ABSPATH . "sitmaplistventeproperty.xml", 'w' );
			    fwrite( $fp, $sitmaplistventeproperty );
			    fclose( $fp );


			    // app_list_properties   /immo/achat-maison-saint-leu-la-foret/
			    $sitmaplistpagecoconlevel0 = '<?xml version="1.0" encoding="UTF-8"?>'; 
				$sitmaplistpagecoconlevel0.="\n";
				$sitmaplistpagecoconlevel0 .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
				?><br><br>
				<?php foreach ($app_list_pagecoconlevel0 as $applistpagecoconlevel0): ?>
					<?php $urlPageCoconLevel0 = $urlDom.'/immo/' . $applistpagecoconlevel0["idUrlPageCocon"] . '/';
					$urlPageCoconLevel0 = strtolower($urlPageCoconLevel0);
					$urlPageCoconLevel0 = str_replace(" ", "-", $urlPageCoconLevel0);
					$urlPageCoconLevel0 = esc_url_raw($urlPageCoconLevel0);
					echo $urlPageCoconLevel0;
					$sitmaplistpagecoconlevel0.="<url>\n";
    				$sitmaplistpagecoconlevel0.="<loc>".$urlPageCoconLevel0."</loc>\n";
    				$sitmaplistpagecoconlevel0.="</url>\n";
					?>
					<br>
				<?php endforeach; ?>
				<?php $sitmaplistpagecoconlevel0 .= '</urlset>'; 
			//    $fp = fopen( ABSPATH . "sitmaplistpagecoconlevel0.xml", 'w' );
			//    fwrite( $fp, $sitmaplistpagecoconlevel0 );
			//    fclose( $fp );


			    // app_list_properties   /immo/achat-maison-saint-leu-la-foret/
			    $sitmaplistpagecoconlevel1 = '<?xml version="1.0" encoding="UTF-8"?>'; 
				$sitmaplistpagecoconlevel1.="\n";
				$sitmaplistpagecoconlevel1 .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
				?><br><br>
				<?php foreach ($app_list_pagecoconlevel1 as $applistpagecoconlevel1): ?>
					<?php $urlPageCoconLevel1 = $urlDom.'/immo/' . $applistpagecoconlevel1["idUrlPageCocon"] . '/';
					$urlPageCoconLevel1 = strtolower($urlPageCoconLevel1);
					$urlPageCoconLevel1 = str_replace(" ", "-", $urlPageCoconLevel1);
					$urlPageCoconLevel1 = esc_url_raw($urlPageCoconLevel1);
					echo $urlPageCoconLevel1;
					$sitmaplistpagecoconlevel1.="<url>\n";
    				$sitmaplistpagecoconlevel1.="<loc>".$urlPageCoconLevel1."</loc>\n";
    				$sitmaplistpagecoconlevel1.="</url>\n";
					?>
					<br>
				<?php endforeach; ?>
				<?php $sitmaplistpagecoconlevel1 .= '</urlset>'; 
			    $fp = fopen( ABSPATH . "sitmaplistpagecoconlevel1.xml", 'w' );
			    fwrite( $fp, $sitmaplistpagecoconlevel1 );
			    fclose( $fp );


				?>

		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div>
</div>
</div>
</div>
</div>

		</body>
</html>
