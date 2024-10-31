<?php
/**
 * Template Name: RealEstateAgenceImmo
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

global $wpdb;

			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;

			$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";

 			$data = array('service' => 'readAccount', 'plateform' => '1', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				);


			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app = json_decode($app_list, true);

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
	top: -32px;
}
.headcontent {
   padding: 1.5em 0 0 0;
}
.inputText{
    margin: 0 0 -8px 0;
    box-sizing: border-box;
}

.width_content-realestate{width:900px;}
</style>

<body <?php body_class(); ?>  onresize="resizeScreenHead()" onclick="rgpd()">

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
	margin-top: -4.5em;
	<?php 
		if ( wp_is_mobile() ) { 
			echo "max-width: 610px;";
		} else { 
			echo "width: 960px;";
		} 	
	?>
}
/*style="font-size:0.7vw;"*/
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
}
.font-size-a {
	  font-size:0.8vw;
}
.text-color-a {
	  color: LightGray;
}
.inputText-margin-a {
	  margin: 10px 0 -4px 0;
    box-sizing: border-box;
}
.adjust-vertical-realestate-c{
	margin-top: -1.7em;
}
.adjust-vertical-realestate-a{
	margin-top: -2.0em;
}
.adjust-vertical-realestate-b{
	margin-top: -2.5em;
}
.pointer {
    cursor:pointer;
}
.button_nav {
    white-space: nowrap;
}
.text-nowrap {
    white-space: nowrap;
}
.button_margin {
    margin: 5px 0 0 0;
}
th, td {
    word-wrap: break-word;   
}

.contact {
    width:600px;
    table-layout:fixed;
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
					<tr><td colspan="3">
						<table>
						<tr>
				      	<td valign="top">
					    	<H2><Strong>Agences immobilières déposez vos annonces</Strong></H2>
						</td>
						<td align="right"><?php 
							$linkBackList = get_home_url() . '/';
							echo '<a href=' . $linkBackList . '><button class="button_realestate">Retour à la liste</button></a>';
							?>
						</td>
						</tr>
						<tr>
							<td valign="top">
								Déposez vos annonces <strong>immobilières gratuites</strong> sur immobilier-fr.fr et créez votre <strong>site Web immobilier</strong> WordPress <strong>sans pub à l'aide de notre <a href='https://fr.wordpress.org/plugins/real-estate-agency/'><u style="color: green">Plugin WordPress gratuit</u></a>.	</strong> 		 
								<br><strong>C'est rapide et entièrement gratuit!</strong> 
								<br><strong>Réservé aux professionnels</strong>: Agences et réseaux immobiliers – Négociateurs – Mandataires – Conseillers en gestion de patrimoine – Promoteurs – Notaires
								<div id="msgsendmessage"></div>								
							</td>
							
							<td valign="top">
						    	<img class="showreal" style="width:130px;height:130px;" alt="" id="img" src="https://storage.googleapis.com/immobilier-fr.fr/img-site-soft/PatrickGilbert.jpg">
						    	<br><div class="adjust-vertical-realestate-c text-color-a font-size-a">Patrick Petit</div>
							</td>
						</tr>
						</table></td>
					</tr>
					<tr>
						<td colspan="3">
							<table class="adjust-vertical-realestate-a">
							<tr>
					      	<td valign="top">
						    	<img class="showreal" style="width:450px;height:310px;" alt="" id="img" src="https://storage.googleapis.com/immobilier-fr.fr/img-site-soft/demoSiteAgenceProB.PNG">
						    	<br>
						    	<a href='https://votre-agence.immo-fr.fr/' target="_blank"><button class="button_margin" style="width: 100%">Créez votre site avec le Plugin WP</button></a>
							</td>
							<td valign="top" align="left">
						    	<img class="showreal" style="width:450px;height:310px;" alt="" id="img" src="https://storage.googleapis.com/immobilier-fr.fr/img-site-soft/softListproperties.PNG">
						    	<br> 
						    	<a href='https://apps.facebook.com/logicielimmobilierfr/' target="_blank"><button class="button_margin" style="width: 100%">Application pour déposer vos annonces</button></a>
							</td>
							<td id="contact" class="text-nowrap" valign="top">
								<b>Contactez-nous</b>
								<br><input class="inputText-margin-a" type="text" id="nameprospect" placeholder="Nom" value="" onblur="resetColorField('nameprospect', 'msgsendmessage');"/>
								<br><input class="inputText" type="text" id="emailprospect" placeholder="Email" value="" onblur="resetColorField('emailprospect', 'msgsendmessage');"/>
								<br><input class="inputText" type="text" id="phoneprospect" placeholder="Téléphone" value="" onblur="resetColorField('phoneprospect', 'msgsendmessage');"/>
								<br><textarea class="inputText" rows="2" maxlength="500" id="messageprospect" placeholder="Votre demande (facultatif)" onblur="resetColorField('messageprospect', 'msgsendmessage');"></textarea>
								<br><button class="inputText" id="button_validation_account" style="width: 100%" onclick="send_message();">Contactez-nous</button>
							</td> 
							</tr>
							
								<?php if ( $linkPromoOn) { ?> 
								<tr><td colspan="3">						
									<a href='https://apps.facebook.com/logicielimmobilierfr/'><u>Application Facebook de gestion des sites</u>&nbsp;&nbsp;&nbsp;</a>
									<a href='https://fr.wordpress.org/plugins/real-estate-agency/'><u>Créez votre site agence avec notre Plugin WordPress gratuit</u></a>
								</td>
								</tr>
								<?php } ?>
								<tr>
									<td colspan="3">
										<?php
										echo '&nbsp;&nbsp;<a class="linkUnderline" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a>';
											echo '&nbsp;&nbsp;<a class="linkUnderline" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a>&nbsp;&nbsp;';
										?>
										<a href='https://immobilier-fr.fr/'>Propulsé by immmobilier-fr.fr </a>	
									</td>
								</tr>
							</table>
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
	</div>
</div>
</div>
</div>
</div>
<?php } ?>

<?php if ( wp_is_mobile() ) { ?>
<div id="primary">
		<main id="main" role="main">
			    <table align="center">
					<tr><td colspan="3">
						<table>
						<tr>
							<td></td>
					      	<td valign="top">
						    	<H2><Strong>Agences immobilières déposez vos annonces</Strong></H2>
							</td>
							<td align="right"><?php 
								$linkBackList = get_home_url() . '/';
								echo '<a href=' . $linkBackList . '><button class="button_realestate">Retour à la liste</button></a>';
								?>
							</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td valign="top">
								Déposez vos annonces <strong>immobilières gratuites</strong> sur immobilier-fr.fr et créez votre <strong>site Web immobilier</strong> WordPress <strong>sans pub</strong> à l'aide de notre <a href='https://fr.wordpress.org/plugins/real-estate-agency/'><u>Plugin WordPress gratuit</u></a>.			 
								<br><strong>C'est rapide et entièrement gratuit!</strong> 
								<br><strong>Réservé aux professionnels</strong>: Agences et réseaux immobiliers – Négociateurs – Mandataires – Conseillers en gestion de patrimoine – Promoteurs – Notaires
								<div id="msgsendmessage"></div>								
							</td>
							
							<td valign="top">
						    	<img class="showreal" style="width:130px;height:130px;" alt="" id="img" src="https://storage.googleapis.com/immobilier-fr.fr/img-site-soft/PatrickGilbert.jpg">
						    	<br><div class="adjust-vertical-realestate-c text-color-a font-size-a">Patrick Petit</div>
							</td>
							<td></td>
						</tr>
						</table></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">
							<table class="adjust-vertical-realestate-a">
							<tr>
					      	<td valign="top">
						    	<img class="showreal" style="width:450px;height:310px;" alt="" id="img" src="https://storage.googleapis.com/immobilier-fr.fr/img-site-soft/demoSiteAgenceProB.PNG">
						    	<br>
						    	<a href='https://votre-agence.immo-fr.fr/vente/maison/annecy-74000/44-1533419284813/' target="_blank"><button class="button_margin" style="width: 100%">Créez votre site avec le Plugin WP</button></a>
							</td>
							</tr>
							<tr>
							<td valign="top" align="left">
						    	<img class="showreal" style="width:450px;height:310px;" alt="" id="img" src="https://storage.googleapis.com/immobilier-fr.fr/img-site-soft/softListproperties.PNG">
						    	<br> 
						    	<a href='https://apps.facebook.com/logicielimmobilierfr/' target="_blank"><button class="button_margin" style="width: 100%">Application pour déposer vos annonces</button></a>
							</td>
							</tr>
							<tr>
							<td id="contact" class="text-nowrap" valign="top">
								<b>Contactez-nous</b>
								<br><input class="inputText-margin-a" type="text" id="nameprospect" placeholder="Nom" value="" onblur="resetColorField('nameprospect', 'msgsendmessage');"/>
								<br><input class="inputText" type="text" id="emailprospect" placeholder="Email" value="" onblur="resetColorField('emailprospect', 'msgsendmessage');"/>
								<br><input class="inputText" type="text" id="phoneprospect" placeholder="Téléphone" value="" onblur="resetColorField('phoneprospect', 'msgsendmessage');"/>
								<br><textarea class="inputText" rows="2" maxlength="500" id="messageprospect" placeholder="Votre demande (facultatif)" onblur="resetColorField('messageprospect', 'msgsendmessage');"></textarea>
								<br><button class="inputText" id="button_validation_account" style="width: 100%" onclick="send_message();">Contactez-nous</button>
							</td> 
							</tr>
							
								<?php if ( $linkPromoOn) { ?> 
								<tr><td colspan="3">						
									<a href='https://apps.facebook.com/logicielimmobilierfr/'><u>Application Facebook de gestion des sites</u>&nbsp;&nbsp;&nbsp;</a>
									<a href='https://fr.wordpress.org/plugins/real-estate-agency/'><u>Créez votre site agence avec notre Plugin WordPress gratuit</u></a>
								</td>
								</tr>
								<?php } ?>
								<tr>
									<td>
										<?php
											echo '&nbsp;&nbsp;<a class="linkUnderline" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a><br>';
											echo '<a class="linkUnderline" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a><br>';
										?>
										<a href='https://immobilier-fr.fr/'>Propulsé by immmobilier-fr.fr </a>	
									</td>
								</tr>
							</table>
						</td>
						<td></td>
						
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
	</div>
</div>
</div>
</div>
</div>
<?php } ?>


	<script type="text/javascript">

	function send_message() {
	
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

		var to = 'patrick@immobilier-fr.fr';

		var wordingTo =  "Contact commercial";
		var from = "noreplynewsrealestate@gmail.com";
		var wordingFrom = nameprospect;	     
		var subject = "Demande d'information sur les annonces gratuites et soft";
		var htmlBody = "Demande d'information de la part de : " + nameprospect + "<br><br>Email: " + emailprospect + " tél. " + phoneprospect + "<br><br>Message: " + messageprospect;
		var msgBody = "Demande d'information sur les annonces gratuites et soft : " + nameprospect + " Email: " + emailprospect + "tél. " + phoneprospect + " Message: " + messageprospect;

	  var xmlhttp;  
	  xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {		  	
	    if (this.readyState == 4 && this.status == 200) {
	    	var result = this.responseText;
	    	
			var obj = JSON.parse(result); 
			if (obj.exitvalue == "0") {;
				document.getElementById("msgsendmessage").innerHTML = "Votre email a été envoyé à immobilier-fr.fr";
				document.getElementById("msgsendmessage").style.color = "green";
        		document.getElementById("msgsendmessage").style.fontWeight = "bold";        		
			}else{
				document.getElementById("msgsendmessage").innerHTML = "Une erreur est survenue, merci de recommencer ";
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
