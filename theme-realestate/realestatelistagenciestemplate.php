<?php
/**
 * Template Name: RealEstateListAgencies 
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
$siteAgencyOn = true;

if ( get_home_url() == 'http://vps520391.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'http://vps671085.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour la Production

global $wpdb;

$textDescription = 'Liste des agences proposant des logements, appartements, maisons, fermes, chalets.';
$urlPageCanonical = get_home_url() . '/listeagenceimmo/';
?>
<link rel="canonical" href="<?php echo esc_url_raw($urlPageCanonical) ?>" />
<meta name="description" content="<?php echo strip_tags($textDescription) ?>">

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
.headimage {
   /*top: -10px;*/
}

.width_content-realestate{width:900px;}
</style>

<body <?php body_class(); ?>  onresize="resizeScreenHead()" onclick="rgpd()">

<div id="page" class="site" class="width_content-realestate">

	<header id="masthead" class="site-header" role="banner">

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
  /* padding: 1.5em 0 0 0;*/
}
.button_realestate {
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
}
.button_realestate_mobile {
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
	padding: 0.8em 0.8em;
	text-shadow: none;
	-webkit-transition: background 0.2s;
	transition: background 0.2s;
}
.button_nav {
    background-color: #D8D8D8; 
    border: none;
    color: #585858;
    padding: 4px 6px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    border-radius: 4px;
}
.button_nav2 {
    background-color: #D8D8D8; 
    border: none;
    color: #585858;
    padding: 4px 12px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    border-radius: 4px;
}
.button_nav:hover {
	background-color: ##585858; 
  	color: #D8D8D8;
}
.button_nav2:hover {
	background-color: ##585858; 
  	color: #D8D8D8;
}
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
			echo "width: 1140px;";
		} 
	?>
}
button {
    white-space: nowrap;
}
.text-nowrap {
    white-space: nowrap;
}
.linkUnderline {
    text-decoration: underline;
}
.font-size-small {
    font-size: 0.775rem;
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
<p id="msgt"></p>
	
<?php
		$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";
?>
	
	<div id="primary">
		<main id="main" class="propertiescontent" role="main">

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
			} 
			// pour les tests
			if ( get_home_url() == 'http://35.187.105.166') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
			} 

			// pour la Production
			if ( get_home_url() == 'https://www.immobilier-fr.fr') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
			}

			$indexTypeProperty = '0';

			global $wp_query;
		/*	
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
*/


			$zipselect = get_query_var('dept', 'dept');
			$zip = get_query_var('dept', 'dept');
			if ($zipselect == 'dept'){
				$zipselectselected = 'dept'; $zipselect = '';
				$zip = '';
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
/*
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
			*/


			$pageSelected = get_query_var('pageselected', '1');
			$nbPropertiesByPage = 3;

			$urlLogo = plugins_url() . '/real-estate-agency/theme-realestate/realestate-template-parts/image/'. 'Logo-Real-estate-Medium-WP-Comp.jpg';

            $data = array('service' => 'readListAccount', 'plateform' => '1', 'count' => 'true', 'login' => '', 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'dept' => $zipselect, 'currentPage' => '0', 'numberSize' => '0');

			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));

			$context = stream_context_create($options);
			$app_count1 = file_get_contents($url, false, $context);
			$app_count = json_decode($app_count1, true);
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
		
			echo "<br> zip " . $zip . '<br>';
			echo "<br> pageSelected " . $pageSelected . '<br>';
		echo "<br> numberSize " . $nbPropertiesByPage;
*/
		
		$app_list = '';
		$app_list_full = '';
		
 			$data = array('service' => 'readListAccount', 'plateform' => '1', 'count' => 'false', 'login' => '', 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'dept' => $zipselect, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data) 
						));			

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app_list = json_decode($app_list, true);

			// List complete
			
			$zip = get_query_var('dept', '');
			
			if ($zip == ''){		
				$nbPropertiesFull = 200;
				$data = array('service' => 'readListAccount', 'plateform' => '1', 'count' => 'false', 'login' => '', 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'dept' => $zipselect, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesFull);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data) 
							));			

				$context = stream_context_create($options);
				$app_list_full = file_get_contents($url, false, $context);
				$app_list_full = json_decode($app_list_full, true);
			}

			?>


<?php if (! wp_is_mobile() ) { ?>

			 <table align="center">
			 	<tr valign="top">
			      	<td colspan="1" valign="top" align="center"><?php get_template_part( 'realestate-template-parts/navigation/navigation-topclient'); ?></td>
			      	<td colspan="2" valign="top" align="left" style="font-size: 1.7em;"><b>Liste des agences immobilières</b></td>
			      	<td align="left" valign="center" style="display:inline-block;white-space: nowrap">
			      		<?php if ($siteAgencyOn ) { ?>  
							<a href='/contactagence/'><button>Contact</button></a><a href='/comptevisitor/'>&nbsp;&nbsp;<button>Compte</button></a>
						<?php } else {?>
							<?php 
							$linkBackList = get_home_url();
							echo '<a href=' . $linkBackList . '><button>Liste des biens</button></a>';
							?>
						<?php } ?>
			      	</td><td></td>
			     </tr>
			 	<tr>
			 	<td valign="top">
			 		<table>
			 		<?php if (sizeof($app_list_full) < 1 ){ ?>
			 			<tr valign="top"><td>
			    		<img class="showreal" style="width:300px;height:600px;" alt="" id="imgLeft" src="<?php echo esc_url_raw($app_img['urlphotoAccount2']); ?>">			    		
			 			</td>
			 			</tr>
			 		<?php } else { ?>
			 			<tr>		
						<td>
			 			<?php foreach ($app_list_full as $appfull): ?>
						    <br>
				    		<?php 
	   						$linkAgencyFull = $appfull["agency"] . '-' . $appfull["city"] . '-' . $appfull["cp"] . '/' . $appfull["numClient"] . '/';
	   						$linkAgencyFull = strtolower(str_replace(" ","-",$linkAgencyFull));
	   						?>
				    		<a class="linkUnderline font-size-small" href='/agence/<?php echo $linkAgencyFull ?>' ><?php echo sanitize_text_field($appfull["agency"])?>&nbsp;<?php echo sanitize_text_field($appfull["city"])?></a>
			      		
						<?php endforeach; ?>
						</td>
						</tr>
					<?php } ?>
		 			</table>
			 	</td>	
		 		<td></td>
			 	<td valign="top">
			    <table>
			    
			     <?php if ($app_count > 0) { ?>
			    <?php foreach ($app_list as $app): ?>
			    <tr>
			      	<td style="text-align:left;" colspan="3">
		      			<strong>Agence: <?php echo sanitize_text_field($app["agency"])?></strong>
	      			</td>
	      		</tr>
			      <tr>
			      <td style="text-align:left;" width='250px'>
						<?php
						$urlphoto = "";
						$caption = "";
						$imgempty = true;
			      			//	boolean imgempty = true;
				    	if ($app['urlphotoAccount1'] != ""){
				    		$imgempty = false;
						}
		 			 	?>

		      			<?php if ($imgempty == false) : ?>
			      			<img class="showreal" style="width:250px;height:200px;" alt="<?php echo sanitize_text_field($caption1) ?>" id="img" src="<?php echo esc_url_raw($app['urlphotoAccount1']) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:250px;height:200px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>
      				</td>
      				<td></td>
  					<td style="text-align:left;" valign="top">
			      		<b><?php echo sanitize_text_field($app["city"])?></b>
			      		<br><?php echo sanitize_text_field($app["cp"])?>
			      		<br>Tél. <?php echo sanitize_text_field($app["phone"])?>
			      		<br>	  						   				
	   					<?php 
	   						$linkAgency = $app["agency"] . '-' . $app["city"] . '-' . $app["cp"] . '/' . $app["numClient"];
	   						$linkAgency = strtolower(str_replace(" ","-",$linkAgency));
	   					?>
	   					<br><a rel="nofollow" href='/agence/<?php echo $linkAgency?>' ><button>Contact agence</button></a>
			      		
		      		</td>

			   	</tr>
			    <?php endforeach; ?>
			    <?php }else { ?>
			    	 <tr>
			    	 	<td>
			    	 		<br>
			    	 		<h2><p style="color: red">Elargissez votre selection aucun bien n'a été trouvé.</p></h2>
			    	 		<br><br><br><br><br><br><br><br><br><br>
		    	 		</td>
			    	 </tr>	
			 	<?php }?>
			      <tr>
				<?php
					$nbPageNav = 7;
					$pageSelectedNext =  $pageSelected + 1;
					$pageSelectedPrevious =  $pageSelected - 1;
					$nbpage = (int)($app_count / $nbPropertiesByPage);	
					if ((int)($app_count % $nbPropertiesByPage) > 0) $nbpage = $nbpage + 1;
			//		echo ' nbpage ' . $nbpage . '  ' . $app_count . ' / ' . $nbPropertiesByPage;
			//		echo ' % nbpage ' . ($app_count % $nbPropertiesByPage);

					$startPage = 0;
					if ($pageSelected <= $nbPageNav){
						$startPage = $startPage + 1;
					}else{
						$startPage = ($nbPageNav * ((int)($pageSelected /  $nbPageNav))); 
						if (($pageSelected % $nbPageNav) > 0){
							$startPage = ($nbPageNav * ((int)($pageSelected /  $nbPageNav))) + 1; 
						}else{
							$startPage = ($nbPageNav * ((int)(($pageSelected /  $nbPageNav) -1))) + 1;
						}
					}
					$endPage = $startPage + $nbPageNav;
					if ($zip == ''){
						$paramUrlList = "/listeagenceimmo/";
					}else{
						$paramUrlList = "/listeagenceimmo/" . sanitize_text_field($zip) . "/";
					}			
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
			//		echo 'pnext ' . $pageSelectedNext . ' nbpage ' . $nbpage  . ' pageSelected ' . $pageSelected;
					$linkNext = $paramUrlList . $pageSelectedNext . '/';
					$linkPrevious = $paramUrlList . $pageSelectedPrevious . '/';

					$linkStart = $paramUrlList . 1 . '/';
					$linkEnd = $paramUrlList . $nbpage . '/';

					if ($app_count > 0) { 
					echo '<td colspan="3" align="left"><a rel="nofollow" href=' . esc_url_raw($linkStart) . '><button class="button_nav"><<</button></a>&nbsp;&nbsp;<a rel="nofollow" href=' . esc_url_raw($linkPrevious) . '><button class="button_nav2"><</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				//	echo '<td align="left" class="td_nav">';
					  for( $page = $startPage ; $page < $endPage ; $page++ )
						{
							if ($page == $pageSelected){
								echo '<a rel="nofollow" href=' . esc_url_raw($paramUrlList . $page) . '/' . '><b style="color:grey">' . $page . '</b></a>';
							}else{
								echo '<a rel="nofollow" href=' . esc_url_raw($paramUrlList . $page) . '/' . '><b>' . $page . '</b></a>';
							}	
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';					
						}
					//	echo '</td>';
						echo '<a rel="nofollow" href=' . esc_url_raw($linkNext) . '><button class="button_nav2">></button></a>&nbsp;&nbsp;<a rel="nofollow" href=' . esc_url_raw($linkEnd) . '><button class="button_nav">>></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
					}
				?>				
			   	</tr>
			   					    
			    </table>
			</td>
			<td align="left" valign="top" style="display:inline-block;white-space: nowrap">		
				<table>
	 			<tr valign="top"><td>
				<?php if ( $pubOn ) { ?>
			<!--	<?php if ( ! wp_is_mobile() ) { ?>-->
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<ins class="adsbygoogle"
						     style="display:inline-block;width:300px;height:600px"
						     data-ad-client="ca-pub-7351030609964877"
						     data-ad-slot="3770514742"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>		
			<!--	<?php } ?>-->
				<?php } else {?>
			<!--		<?php if ( ! wp_is_mobile() ) { ?>-->
				    	<img class="showreal" style="width:300px;height:600px;" alt="" id="imgRight" src="<?php echo esc_url_raw($app_img['urlphotoAccount3']); ?>">
			<!--    	<?php } ?>-->
				<?php } ?>
				</td></tr>
				</table>
			</td>
			
			<td width='2%'></td>
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
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
</div>
</div>
</div>
<?php } // End desktop?> 


<?php if ( wp_is_mobile() ) { ?>
			      	<div class="margin-left-small" valign="top" align="left" style="font-size: 1.7em;"><b>Liste des agences immobilières</b></div>			
			      	<div class="margin-left-small" valign="top" align="center" style="display:inline-block;white-space: nowrap"><?php get_template_part( 'realestate-template-parts/navigation/navigation-topclient'); ?>
			  
			      		<?php if ($siteAgencyOn ) { ?>  
							<a href='/contactagence/'><button>Contact</button></a><a href='/comptevisitor/'>&nbsp;&nbsp;<button>Compte</button></a>
						<?php } else {?>
							<?php 
							$linkBackList = get_home_url();
							echo '&nbsp;&nbsp;<a href=' . $linkBackList . '><button>Liste des biens</button></a>';
							?>
						<?php } ?>
					</div>
			    
			     <?php if ($app_count > 0) { ?>
			     <br>
			    <?php foreach ($app_list as $app): ?>
			      		
			      		<p class="margin-left-small">
		      			<strong>Agence: <?php echo sanitize_text_field($app["agency"])?></strong>
			      	
						<?php
						$urlphoto = "";
						$caption = "";
						$imgempty = true;
			      			//	boolean imgempty = true;
				    	if ($app['urlphotoAccount1'] != ""){
				    		$imgempty = false;
						}
		 			 	?>

		      			<?php if ($imgempty == false) : ?>
			      			<img class="showreal" style="width:400px;height:200px;" alt="<?php echo sanitize_text_field($caption1) ?>" id="img" src="<?php echo esc_url_raw($app['urlphotoAccount1']) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:400px;height:200px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>
  						
			      		<b><?php echo sanitize_text_field($app["city"])?>
			      		&nbsp;&nbsp;<?php echo sanitize_text_field($app["cp"])?></b>
			      		<br>
			      		<?php 
	   						$linkAgency = $app["agency"] . '-' . $app["city"] . '-' . $app["cp"] . '/' . $app["numClient"];
	   						$linkAgency = strtolower(str_replace(" ","-",$linkAgency));
	   					?>
	   					<a rel="nofollow" href='/agence/<?php echo $linkAgency?>'><button class="button_realestate_mobile">Contact agence téléphone</button></a>
	   					</p>

			   	</tr>
			    <?php endforeach; ?>
			    <?php }else { ?>
			    	 		<br>
			    	 		<h2><p align="center" style="color: red">Elargissez votre selection aucun bien n'a été trouvé.</p></h2>
			    	 		<br><br><br><br><br><br><br><br><br><br>
			 	<?php }?>
				<?php
					$nbPageNav = 6;
					$pageSelectedNext =  $pageSelected + 1;
					$pageSelectedPrevious =  $pageSelected - 1;
					$nbpage = (int)($app_count / $nbPropertiesByPage);	
					if ((int)($app_count % $nbPropertiesByPage) > 0) $nbpage = $nbpage + 1;
			//		echo ' nbpage ' . $nbpage . '  ' . $app_count . ' / ' . $nbPropertiesByPage;
			//		echo ' % nbpage ' . ($app_count % $nbPropertiesByPage);

					$startPage = 0;
					if ($pageSelected <= $nbPageNav){
						$startPage = $startPage + 1;
					}else{
						$startPage = ($nbPageNav * ((int)($pageSelected /  $nbPageNav))); 
						if (($pageSelected % $nbPageNav) > 0){
							$startPage = ($nbPageNav * ((int)($pageSelected /  $nbPageNav))) + 1; 
						}else{
							$startPage = ($nbPageNav * ((int)(($pageSelected /  $nbPageNav) -1))) + 1;
						}
					}
					$endPage = $startPage + $nbPageNav;
				//	$paramUrlList = "/achat/bien/0-piece/dept/cp-ville/mini/max/";
					if ($zip == ''){
						$paramUrlList = "/listeagenceimmo/";
					}else{
						$paramUrlList = "/listeagenceimmo/" . sanitize_text_field($zip) . "/";
					}					
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
			//		echo 'pnext ' . $pageSelectedNext . ' nbpage ' . $nbpage  . ' pageSelected ' . $pageSelected;
					$linkNext = $paramUrlList . $pageSelectedNext . '/';
					$linkPrevious = $paramUrlList . $pageSelectedPrevious . '/';

					$linkStart = $paramUrlList . 1 . '/';
					$linkEnd = $paramUrlList . $nbpage . '/';

					if ($app_count > 0) { 
					echo '<div class="margin-left-small" colspan="3" align="left"><a rel="nofollow" href=' . esc_url_raw($linkStart) . '><button class="button_nav"><<</button></a>&nbsp;&nbsp;<a rel="nofollow" href=' . esc_url_raw($linkPrevious) . '><button class="button_nav2"><</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				//	echo '<td align="left" class="td_nav">';
					  for( $page = $startPage ; $page < $endPage ; $page++ )
						{
							if ($page == $pageSelected){
								echo '<a rel="nofollow" href=' . esc_url_raw($paramUrlList . $page) . '/' . '><b style="color:grey">' . $page . '</b></a>';
							}else{
								echo '<a rel="nofollow" href=' . esc_url_raw($paramUrlList . $page) . '/' . '><b>' . $page . '</b></a>';
							}	
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';					
						}
					//	echo '</td>';
						echo '<a rel="nofollow" href=' . esc_url_raw($linkNext) . '><button class="button_nav2">></button></a>&nbsp;&nbsp;<a rel="nofollow" href=' . esc_url_raw($linkEnd) . '><button class="button_nav">>></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>';
					}
				?>			
						<br>
					<div class="margin-left-small">
		 			<?php foreach ($app_list_full as $appfull): ?>
					    
			    		<?php 
   						$linkAgencyFull = $appfull["agency"] . '-' . $appfull["city"] . '-' . $appfull["cp"] . '/' . $appfull["numClient"] . '/';
   						$linkAgencyFull = strtolower(str_replace(" ","-",$linkAgencyFull));
   						?>
			    		<a class="linkUnderline font-size-small" href='/agence/<?php echo $linkAgencyFull ?>' ><?php echo sanitize_text_field($appfull["agency"])?>&nbsp;<?php echo sanitize_text_field($appfull["city"])?></a><br>
		      		
					<?php endforeach; ?>
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
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
</div>
</div>
</div>
<?php } // End mobile?> 
<?php //get_footer(); ?>
<?php function prepare_url($field){
	$field = str_replace(" ","-",strtolower($field));
	return $field;
	} 
?>
		</body>
</html>

