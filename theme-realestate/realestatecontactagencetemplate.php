<?php
/**
 * Template Name: RealEstateContactAgence
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

if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'http://vps671085.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour les tests
if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true; $siteAgencyOn = false;} // pour la Production

$urlLogo = plugins_url() . '/real-estate-agency/theme-realestate/realestate-template-parts/image/'. 'Logo-Real-estate-Medium-WP-Comp.jpg';

global $wp_query;
			
			$idc = get_query_var('idc', '');

$urlDom = get_home_url();

global $wpdb;
	
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

			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;

			$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";

 			$data = array('service' => 'readAccount', 'plateform' => '1', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => $idc
 				);


			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app = json_decode($app_list, true);


/*
			// Read next agency 
				$nbAccount = 1;
				$data = array('service' => 'readNextAccountWeb', 'plateform' => '1', 'login' => '', 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => $idc, 'numberSize' => $nbAccount);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data) 
							));			

				$context = stream_context_create($options);
				$app_next_account = file_get_contents($url, false, $context);
				$app_next_account = json_decode($app_next_account, true);


			if (sizeof($app_next_account) < 1 ){
				$data = array('service' => 'readFirstAccountWeb', 'plateform' => '1', 'login' => '', 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => '', 'numberSize' => $nbAccount);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data) 
							));			

				$context = stream_context_create($options);
				$app_next_account = file_get_contents($url, false, $context);
				$app_next_account = json_decode($app_next_account, true);

			}

			// Read previous agency 
				$nbAccount = 1;
				$data = array('service' => 'readPreviousAccountWeb', 'plateform' => '1', 'login' => '', 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => $idc, 'numberSize' => $nbAccount);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data) 
							));			

				$context = stream_context_create($options);
				$app_previous_account = file_get_contents($url, false, $context);
				$app_previous_account = json_decode($app_previous_account, true);


			if (sizeof($app_previous_account) < 1 ){
				$data = array('service' => 'readLastAccountWeb', 'plateform' => '1', 'login' => '', 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => '', 'numberSize' => $nbAccount);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data) 
							));			

				$context = stream_context_create($options);
				$app_previous_account = file_get_contents($url, false, $context);
				$app_previous_account = json_decode($app_previous_account, true);

			}
*/
/*
			$indexTypeProperty = '1';  // Appartement

			$room = "0";
			$zipselect = ''; //$app['dept']; //"74";
			$zipcityselect = $app['cp']; //$app['lexie5']; //74000
			$pricestart = "";
			$priceend = "";
			$pageSelected = "1";
			$nbPropertiesByPage = 1;

			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLink1 = file_get_contents($url, false, $context);
			$app_listLink1 = json_decode($app_listLink1, true);



			$indexTypeProperty = '2';  // Maison

			$room = "0";
			$zipselect = ''; //$app['dept']; //"74";
			$zipcityselect = $app['cp']; //$app['lexie5']; //74000
			$pricestart = "";
			$priceend = "";
			$pageSelected = "1";
			$nbPropertiesByPage = 1;


			$data = array('service' => 'readPropertiesWeb', 'plateform' => '1', 't' => '', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'indexTypeProperty' => $indexTypeProperty, 'room' => $room, 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'priceStart' => $pricestart, 'priceEnd' => $priceend, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

 			$options = array('http' => array(
						    'method'=> 'POST',
						    'header'=>'Content-type: application/x-www-form-urlencoded',
			                'content'=> http_build_query($data)
						));			

			$context = stream_context_create($options);
			$app_listLink2 = file_get_contents($url, false, $context);
			$app_listLink2 = json_decode($app_listLink2, true);

			*/

	//	echo "list data B is: '".implode("','",$data). "  nb " . sizeof($app_listLink2) . "'<br><br>";
?>


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

<body <?php body_class(); ?>  onresize="resizeScreenHead()" onclick="rgpd()">

<div id="page" class="site" class="width_content-realestate">

	<header id="masthead" class="site-header" role="banner" valign="top">

		<?php get_template_part( 'realestate-template-parts/header/header', 'imagerealestate' ); ?>
		<?php 
			$textDescription = 'Agence ' . $app["agency"] . ' ' . $app["city"] . ' ' . $app["cp"] . ' ' . $app["numClient"] . ' proposant des logements, appartements, maisons, fermes, chalets.';
			
	   		$linkAgency = '/agence/' . $app["agency"] . '-' . $app["city"] . '-' . $app["cp"] . '/' . $app["numClient"] . '/';
	   		$linkAgency = strtolower(str_replace(" ","-",$linkAgency));
	   						
			$urlPageCanonical = get_home_url() . $linkAgency;
		?>
		<link rel="canonical" href="<?php echo esc_url_raw($urlPageCanonical) ?>" />
		<meta name="description" content="<?php echo strip_tags($textDescription) ?>">
		
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
/*
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
	 white-space: nowrap;
	 margin-bottom: 1em;
}
*/

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

	function openWin(url) {
		    window.open(url);
		}
	  
</script>
<?php } ?>

<script type="text/javascript">
	function openWin(url) {
		    window.open(url);
		}
	  
</script>

<?php if ( ! wp_is_mobile() ) { ?>
<div id="primary">
		<main id="main" role="main">
			    <table align="center">
					<tr>
				      	<td width='1%'></td>
				      	<td valign="top" colspan="3">
					    	<H2 class="h2Custom" ><Strong><?php echo sanitize_text_field($app['agency']); ?></Strong></H2>
						</td>
						<td width='1%'></td>
						<td>
							<?php if ($siteAgencyOn ) { ?>  
					    		<?php 
								$linkBackList = get_home_url();
								echo '<a rel="nofollow" href=' . $linkBackList . '><button class="button_realestate">Liste des biens</button></a>';	
								?>
					    	<?php } else {?>  
								<?php 
								$linkBackList = get_home_url() . '/listeagenceimmo/';
								echo '<a rel="nofollow" href=' . $linkBackList . '><button class="button_realestate">Liste des agences</button></a>';
								?>
							<?php }?>
						</td>
					</tr>
					<tr>
				      	<td width='1%'></td>
				      	<td valign="top" width='600px'  colspan="3">
					    	
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
			      			<img class="showreal" style="width:600px;height:400px;" alt="<?php echo sanitize_text_field($caption1) ?>" id="img" src="<?php echo esc_url_raw($app['urlphotoAccount1']) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:600px;height:400px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>


						</td>
						<td width='1%'></td>
						<td class="pCustom" width="300px" align="left" valign="top">
							<Strong><?php echo sanitize_text_field($app['phone']); ?></Strong>
							<br>
							<Strong><?php echo sanitize_text_field($app['agency']); ?></Strong>
							<br>
							<?php echo sanitize_text_field($app['address']) . ' ' . sanitize_text_field($app['cp']) . ' ' . sanitize_text_field($app['city']); ?>
							
		   					<br>
		   					<?php if ( !empty($app["urlBaseSiteWeb"]) ) :?>
			   					Site <?php echo $app["agency"]?> :<br><?php echo esc_url_raw($app["urlBaseSiteWeb"])?>
		   					<?php endif; ?>	
		   					<?php if ( !empty($app["urlBasePageFaceBook"]) ) :?>
			   					<br>Page Facebook :<br><?php echo esc_url_raw($app["urlBasePageFaceBook"])?>
		   					<?php endif; ?>	
		   					<?php if ( !empty($app["urlBaseBlog"]) ) :?>
			   					<br>Blog :<br><?php echo esc_url_raw($app["urlBaseBlog"])?>
		   					<?php endif; ?>
		   					
		   					<?php if ( !empty($app["urlAccessMapAgency"]) ) :?>
		   						<br><br>
								<button onclick="openWin('<?php echo $app['urlAccessMapAgency']; ?>')" class="button_realestate">Plan d'accès</button>
							<?php endif; ?>

							<br>
							<a href="#contact">
								<button class="button_realestate">Contactez nous</button>
							</a>
							<br>
							<?php 
							$cityLink = sanitize_text_field($app['city']);
							$cityLink = str_replace(" ","-",$cityLink);
							if ( sizeof($app_listLink1) > 0 ) :
								$linkListAppartement = get_home_url() . '/achat/appartement/' . $app['cp'] . '-' . $cityLink . '/';
								echo '<a rel="nofollow" href=' . $linkListAppartement . '><button class="button_realestate">Trouvez un appartement</button></a><br>';
								endif;
							?>
							<?php 
							if ( sizeof($app_listLink2) > 0 ) :
								$linkListHouse = get_home_url() . '/achat/maison/' . $app['cp'] . '-' . $cityLink . '/';
								echo '<a rel="nofollow" href=' . $linkListHouse . '><button class="button_realestate">Trouvez une maison</button></a><br>';
							endif;
							?>
							<?php
							$existproperties = sizeof($app_listLink1)  + sizeof($app_listLink2);
							if ( $existproperties > 0 ) :
								$linkBackList = get_home_url() . '/achat/bien/' . $app['cp'] . '-' . $cityLink . '/';
								echo '<a rel="nofollow" href=' . $linkBackList . '><button class="button_realestate">Trouvez un bien</button></a>';
							endif;
							?>
						</td>
					</tr>
			      <tr>
				      <td width='1%'></td>
				      <td valign="top" colspan="3">
				      	<div class="pCustom" style="width:600px;">
				      	<?php 
				      	
				      	$descriptionAgency = $app['descriptionAgency'];
				      	$descriptionAgency = str_replace("< br >","<br>",$descriptionAgency);

				      	$descriptionAgency = str_replace("< b >","<b>",$descriptionAgency);
				      	$descriptionAgency = str_replace("< / b >","</b>",$descriptionAgency);

				      	$descriptionAgency = str_replace("< i >","<i>",$descriptionAgency);
				      	$descriptionAgency = str_replace("< / i >","</i>",$descriptionAgency);

				      	$descriptionAgency = str_replace("< u >","<u>",$descriptionAgency);
				      	$descriptionAgency = str_replace("< / u >","</u>",$descriptionAgency);

				      	echo $descriptionAgency; ?>
				      	</div>
			      	</td>
			      	<td width='1%'></td>
					<td align="left" valign="top">
					</td>
			     </tr>
			     <tr>
			   		<td width='1%'></td>
		   			<td id="contact" valign="top" class="pCustom" colspan="3"><b>Contactez-nous</b></td> 
		   			<td align="left" valign="top"></td>
	   				<td align="left" valign="top"></td>
		   			<td width='1%'></td>
		   			<td align="left" valign="top"></td>
			   	</tr>
			   	<tr>
			   		<td width='1%'></td>
		   			<td style="width: 33%">
		   				<div class="text-placeholder"><input class="inputCustom" type="text" id="nameprospect" placeholder="Nom" value="" onblur="resetColorField('nameprospect', 'msgsendmessage');"/>
		   				</div>
		   				</td>
		   			<td style="width: 33%">
		   				<div class="text-placeholder"><input class="inputCustom" type="text" id="emailprospect" placeholder="Email" value="" onblur="resetColorField('emailprospect', 'msgsendmessage');"/>
		   				</div>
		   			</td>
		   			<td style="width: 33%">
		   				<div class="text-placeholder"><input class="inputCustom" type="text" id="phoneprospect" placeholder="Téléphone" value="" onblur="resetColorField('phoneprospect', 'msgsendmessage');"/>
		   				</div>
		   			</td>
		   			<td></td>
		   			<td width='1%'></td>
		   			<td align="left" valign="top"></td>
			   	</tr>
			   	<tr>
			   		<td width='1%'></td>
		   			<td colspan="3" style="width: 20%">
		   				<div class="text-placeholder"><textarea class="textareaCustom" rows="1" maxlength="500" id="messageprospect" placeholder="Votre demande (facultatif)" onblur="resetColorField('messageprospect', 'msgsendmessage');"></textarea> 
		   				</div>
		   			</td>
		   			<td width='1%'></td>
			   	</tr>
		   		<tr>
			   		<td width='1%'></td>
		   			<td colspan="3">		   				

		   				<div class="checkbox">
					     <input type="checkbox" id="authorisationRgpd" name="" value="">
					     <label for="authorisationRgpd"><span class="pCustom" style="margin-top: 0.7em">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</span></label>
					  </div>

  						<br> 
		   				<button class="button_realestate" id="button_validation_account" onclick="send_message();">Contactez l'agence</button>		   				
		   			</td>  	
		   			<td width='1%'></td>
			   	</tr>

			   	<tr>
			   		<td width='1%'></td>
		   			<td colspan="3"><p id="msgsendmessage"></p></td>
		   			<td width='1%'></td>
			   	</tr>	
			</table>

			<?php foreach ($app_previous_account as $apppreviousaccount): ?>			    
	    		<?php 
					$linkNextAgency = $apppreviousaccount["agency"] . '-' . $apppreviousaccount["city"] . '-' . $apppreviousaccount["cp"] . '/' . $apppreviousaccount["numClient"] . '/';
					$linkNextAgency = strtolower(str_replace(" ","-",$linkNextAgency));
					?>
	    		<a class="linkUnderline font-size-small linkCustom" href='/agence/<?php echo $linkNextAgency ?>' ><?php echo sanitize_text_field($apppreviousaccount["agency"])?>&nbsp;<?php echo sanitize_text_field($apppreviousaccount["city"])?></a>
      		
			<?php endforeach; ?>	

			&nbsp;&nbsp;
			<?php foreach ($app_next_account as $appnextaccount): ?>
			    
	    		<?php 
					$linkNextAgency = $appnextaccount["agency"] . '-' . $appnextaccount["city"] . '-' . $appnextaccount["cp"] . '/' . $appnextaccount["numClient"] . '/';
					$linkNextAgency = strtolower(str_replace(" ","-",$linkNextAgency));
					?>
	    		<a class="linkUnderline font-size-small linkCustom" href='/agence/<?php echo $linkNextAgency ?>' ><?php echo sanitize_text_field($appnextaccount["agency"])?>&nbsp;<?php echo sanitize_text_field($appnextaccount["city"])?></a><br>
      		
			<?php endforeach; ?>	
			<?php
				echo '&nbsp;&nbsp;<a class="linkUnderline linkCustom" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a>';
				echo '&nbsp;&nbsp;<a rel="nofollow" class="linkUnderline linkCustom" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a>';
			?>
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
	</div>
</div>
</div>
</div>
</div>
<?php }//get_footer();  ?>


<?php if ( wp_is_mobile() ) { ?>
<div id="primary">
		<main id="main" role="main">
					    	<H2 class="margin-left-small h2Custom" ><Strong><?php echo sanitize_text_field($app['agency']); ?></Strong></H2>					
					    	<?php if ($siteAgencyOn ) { ?>  
					    		<?php 
							$linkBackList = get_home_url();
							echo '<a rel="nofollow" href=' . $linkBackList . '><button class="button_realestate_mobile margin-left-small">Liste des biens</button></a>';						
							?>
					    	<?php } else {?>  
							<?php 
							$linkBackList = get_home_url() . '/listeagenceimmo/';
							echo '<a rel="nofollow" href=' . $linkBackList . '><button class="button_realestate_mobile margin-left-small">Liste des agences</button></a>';						
							?>
							<?php }?>
				      	<br>
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
			      			<img class="showreal" style="width:600px;height:300px;" alt="<?php echo sanitize_text_field($caption1) ?>" id="img" src="<?php echo esc_url_raw($app['urlphotoAccount1']) ?>"/>
		      			<?php else : ?>
		      				<img class="showreal" style="width:600px;height:300px;" alt="<?php echo sanitize_text_field($app['imgFirstColCaptionStd']) ?>" id="img" src="<?php echo esc_url_raw($urlLogo) ?>"/>
	      				<?php endif; ?>

							<br>
							<div class="margin-left-small pCustom">
							<Strong><?php echo sanitize_text_field($app['phone']); ?></Strong>
							<br>
							<Strong><?php echo sanitize_text_field($app['agency']); ?></Strong>
							<br>
							<?php echo sanitize_text_field($app['address']) . ' ' . sanitize_text_field($app['cp']) . ' ' . sanitize_text_field($app['city']); ?>
							<br>
		   					<?php if ( !empty($app["urlBaseSiteWeb"]) ) :?>
			   					Site <?php echo $app["agency"]?> :<br><?php echo esc_url_raw($app["urlBaseSiteWeb"])?>
		   					<?php endif; ?>	
		   					<?php if ( !empty($app["urlBasePageFaceBook"]) ) :?>
			   					<br>Page Facebook :<br><?php echo esc_url_raw($app["urlBasePageFaceBook"])?>
		   					<?php endif; ?>	
		   					<?php if ( !empty($app["urlBaseBlog"]) ) :?>
			   					<br>Blog :<br><?php echo esc_url_raw($app["urlBaseBlog"])?>
		   					<?php endif; ?>

							<br>
							<button onclick="openWin('<?php echo $app['urlAccessMapAgency']; ?>')" class="button_realestate_mobile">Plan d'accès</button>
							<?php
							$cityLink = sanitize_text_field($app['city']);
							$cityLink = str_replace(" ","-",$cityLink);
							$existproperties = sizeof($app_listLink1)  + sizeof($app_listLink2);
							if ( $existproperties > 0 ) :
								$linkBackList = get_home_url() . '/achat/bien/' . $app['cp'] . '-' . $cityLink . '/';
								echo '<a rel="nofollow" href=' . $linkBackList . '><button class="button_realestate_mobile">Trouvez un bien</button></a><br>';
								endif;
							?>
							<?php 
							if ( sizeof($app_listLink1) > 0 ) :
								$linkListAppartement = get_home_url() . '/achat/appartement/' . $app['cp'] . '-' . $cityLink . '/';
								echo '<a rel="nofollow" href=' . $linkListAppartement . '><button class="button_realestate_mobile">Trouvez un appartement</button></a>';
							endif;
							?>
							<?php 
							if ( sizeof($app_listLink2) > 0 ) :
								$linkListHouse = get_home_url() . '/achat/maison/' . $app['cp'] . '-' . $cityLink . '/';
								echo '<a rel="nofollow" href=' . $linkListHouse . '><button class="button_realestate_mobile">Trouvez une maison</button></a><br>';
							endif;
							?>

				      	<div>
				      	<?php 
				      	
				      	$descriptionAgency = $app['descriptionAgency'];
				      	$descriptionAgency = str_replace("< br >","<br>",$descriptionAgency);

				      	$descriptionAgency = str_replace("< b >","<b>",$descriptionAgency);
				      	$descriptionAgency = str_replace("< / b >","</b>",$descriptionAgency);

				      	$descriptionAgency = str_replace("< i >","<i>",$descriptionAgency);
				      	$descriptionAgency = str_replace("< / i >","</i>",$descriptionAgency);

				      	$descriptionAgency = str_replace("< u >","<u>",$descriptionAgency);
				      	$descriptionAgency = str_replace("< / u >","</u>",$descriptionAgency);

				      	echo $descriptionAgency; ?>
				      	</div>

			   		<br>
		   			<div id="contact" valign="top"  colspan="2"><b>Contactez-nous</b></div> 		   			

		   			<br>
		   				<div class="text-placeholder"><input class="inputCustom" type="text" id="nameprospect" placeholder="Nom" value="" onblur="resetColorField('nameprospect', 'msgsendmessage');"/>&nbsp;
			   				<input class="inputCustom" type="text" id="emailprospect" placeholder="Email" value="" onblur="resetColorField('emailprospect', 'msgsendmessage');"/>

			   				<br>
			   				<textarea class="textareaCustom" rows="1" maxlength="500" id="messageprospect" placeholder="Votre demande (facultatif)" onblur="resetColorField('messageprospect', 'msgsendmessage');"></textarea> 

			   				<br>
			   			<input class="inputCustom" type="text" id="phoneprospect" placeholder="Téléphone" value="" onblur="resetColorField('phoneprospect', 'msgsendmessage');"/>
						</div>
		   				<br>
		   				<div class="checkbox">
						     <input type="checkbox" id="authorisationRgpd" name="" value="">
						     <label for="authorisationRgpd"><span class="pCustom" style="margin-top: 0.7em">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</span></label>
					  	</div>
  						<br> 
		   				<button class="button_realestate_mobile" id="button_validation_account" onclick="send_message();">Contactez l'agence</button>	
		   				<br>
		   				<p id="msgsendmessage"></p></td>

			<?php foreach ($app_previous_account as $apppreviousaccount): ?>			    
	    		<?php 
					$linkNextAgency = $apppreviousaccount["agency"] . '-' . $apppreviousaccount["city"] . '-' . $apppreviousaccount["cp"] . '/' . $apppreviousaccount["numClient"] . '/';
					$linkNextAgency = strtolower(str_replace(" ","-",$linkNextAgency));
					?>
	    		&nbsp;<a class="linkUnderline font-size-small" href='/agence/<?php echo $linkNextAgency ?>' ><?php echo sanitize_text_field($apppreviousaccount["agency"])?>&nbsp;<?php echo sanitize_text_field($apppreviousaccount["city"])?></a><br>
      		
			<?php endforeach; ?>	

			<?php foreach ($app_next_account as $appnextaccount): ?>
			    
	    		<?php 
					$linkNextAgency = $appnextaccount["agency"] . '-' . $appnextaccount["city"] . '-' . $appnextaccount["cp"] . '/' . $appnextaccount["numClient"] . '/';
					$linkNextAgency = strtolower(str_replace(" ","-",$linkNextAgency));
					?>
	    		&nbsp;<a class="linkUnderline font-size-small linkCustom" href='/agence/<?php echo $linkNextAgency ?>' ><?php echo sanitize_text_field($appnextaccount["agency"])?>&nbsp;<?php echo sanitize_text_field($appnextaccount["city"])?></a><br>
      		
			<?php endforeach; ?>			


			<?php
			echo '&nbsp;&nbsp;<a class="linkUnderline linkCustom" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a><br>';
				echo '&nbsp;&nbsp;<a rel="nofollow" class="linkUnderline linkCustom" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a>';
			?>
			</div>
			<!-- Global site tag (gtag.js) - Google Analytics -->
		    <?php if ( $siteRealestateOn) { ?> 
				
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-99021046-1"></script>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', 'UA-99021046-1');
				</script>
			<?php } ?>	
		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div>
</div>
</div>
</div>
</div>
<?php }//get_footer();  ?>



	<script type="text/javascript">

	function send_message() {
		if (document.getElementById('authorisationRgpd').checked == false){
			setMsgError('msgsendmessage', "Vous devez cocher J\’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m\'envoyer des emails. ", 'authorisationRgpd');
			return;
		}

		var nameprospect = document.getElementById('nameprospect').value;
		if (!empty_field(nameprospect)){ setMsgError('msgsendmessage', 'Le nom doit être renseigné', 'nameprospect'); return;}
		if (!sanitize_string(nameprospect)){ setMsgError('msgsendmessage', "Le nom n'est pas valide!", 'nameprospect'); return;}
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

		var keyEmailAccount = '<?php echo sanitize_email($app["email"])?>';
		
		if (emailAgencyAd == ''){
			to = keyEmailAccount;
		}else{
			to = emailAgencyAd;
		}

		var agence = '<?php echo $app['agency']; ?>';

		var wordingTo =  "";
		var from = "noreplynewsrealestate@gmail.com";
		var wordingFrom = "immobilier-fr.fr";	;	     
		var subject = "Demande d'information sur votre agence " + agence;
		var htmlBody = "Bonjour vous avez recu une demande d'information de la part de : " + nameprospect + "<br><br>Email: " + emailprospect + " tél. " + phoneprospect + "<br><br>Message: " + messageprospect + "<br><br><a href='https://www.immobilier-fr.fr'>www.immobilier-fr.fr</a> <a href='https://apps.facebook.com/logicielimmobilierfr'>logiciel immobilierfr sur Facebook</a>";
		var msgBody = "Bonjour vous avez recu une demande d'information de la part de : " + nameprospect + " Email: " + emailprospect + "tél. " + phoneprospect + " Message: " + messageprospect + " immobilier-fr https://apps.facebook.com/logicielimmobilierfr/";

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
        		putAllCustomerAccountFromWebSite();
        		
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

	function putAllCustomerAccountFromWebSite() {

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
		var keyEmailAccount = '<?php echo $login?>'; 

	//	emailprospect = emailprospect.trim();
		var emailCustomer = emailprospect.trim();
			
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'putAllCustomerAccountFromWeb' + '&login=' + keyEmailAccount + '&keyEmailAccount=' + keyEmailAccount + '&pwdCripted=' + '' + '&keyCustomer=' + '' + '&idc=' + '0' + '&emailCustomer=' + emailCustomer + '&name=' + '' + '&firstName=' + nameprospect + '&phone=' + phoneprospect;


		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					document.getElementById("msgsendmessage").innerHTML = "Votre message a été envoyé à l'agence";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";
	        	//	putCustomerFromWebSite();
				}else if (obj.exitvalue == "2") {
					document.getElementById("msgsendmessage").innerHTML = "Votre message a été envoyé à l'agence " + obj.exitvalue;
					document.getElementById("msgsendmessage").style.color = "green";
     				document.getElementById("msgsendmessage").style.fontWeight = "bold";   
     			//	putCustomerFromWebSite();
				}else if (obj.exitvalue == "3") {
					document.getElementById("msgsendmessage").innerHTML = "Votre message a été envoyé à l'agence " + obj.exitvalue;
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
