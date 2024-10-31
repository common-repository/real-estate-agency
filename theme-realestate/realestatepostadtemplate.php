<?php
/**
 * Template Name: RealEstatePostAd
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
?>

<?php 
	$pubOn = false;
	$linkPromoOn = false;
	$siteRealestateOn = false;
	if ( get_home_url() == 'http://vps520391.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
	if ( get_home_url() == 'http://vps671085.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
	if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
	if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour la Production

	$ConnectionFB = false;
	$ConnectionStd = false;
	
	if ( $_SERVER['REQUEST_URI'] == "/deposeruneannonceimmobiliere/"){$ConnectionFB = false;$ConnectionStd = true;
		if ( get_home_url() == 'https://www.immobilier-fr.fr') { $ConnectionFB = true;}	
		if ( get_home_url() == 'http://vps671085.ovh.net') { $ConnectionFB = true;}	
	}else if ( $_SERVER['REQUEST_URI'] == "/deposeruneannonceimmobilierewp/"){$ConnectionFB = false;$ConnectionStd = false;
	}else if ( $_SERVER['REQUEST_URI'] == "/deposeruneannonceimmobilierefb/"){$ConnectionFB = true;$ConnectionStd = false;}

 ?>

<?php get_template_part( 'header', 'realestate' ); ?>


<!-- <?php if ( $pubOn ) { ?>

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	     (adsbygoogle = window.adsbygoogle || []).push({
	          google_ad_client: "ca-pub-7351030609964877",
	          enable_page_level_ads: true
	     });
	</script>	

<?php } ?> -->


<?php
	if ( $_SERVER['REQUEST_URI'] == "/deposeruneannonceimmobilierefb/"){ ?>

		<meta name="description" content="Logiciel pour agence immobilière, groupe, franchise immobilière et indépendant intégré à 100% dans Facebook , création d'albums photos sur le journal de votre agence et sur sa page" />
		<meta name="keywords" content="Logiciel immobilier, agence immobilière, franchise immobilière, solution pour les agences immobilières" />
		<link rel="canonical" href="https://apps.facebook.com/logicielimmobilierfr/" />
<?php } ?>
		
<?php
	if ( $_SERVER['REQUEST_URI'] == "/deposeruneannonceimmobiliere/"){ ?>
		<meta name="description" content="Logiciel pour agence immobilière, groupe, franchise immobilière et indépendant intégré à 100% dans Facebook , création d'albums photos sur le journal de votre agence et sur sa page" />
	<link rel="canonical" href="https://www.immobilier-fr.fr/deposeruneannonceimmobiliere/" />
<?php } ?>
<?php
	if ( $_SERVER['REQUEST_URI'] == "/deposeruneannonceimmobilierewp/"){ ?>
	<link rel="canonical" href="https://www.immobilier-fr.fr/deposeruneannonceimmobilierewp/" />
<?php } ?>



</head> 

<style>
.site-header{
	top: -12px;
}
.headcontent {
   padding: 1.5em 0 0 0;
}
.margin-top-mobile{
	margin-top: 0.5em;
}

.width_content-realestate{width:900px;}
</style>

<body <?php body_class(); ?>  onresize="resizeScreenHead()" onclick="rgpd()">

<div id="page" class="site" class="width_content-realestate">

	<header id="masthead" class="site-header" role="banner" valign="top">
		<?php if ( $_SERVER['REQUEST_URI'] != "/wp-admin/admin.php?page=realestate_main_menu_" ) {
		 	get_template_part( 'realestate-template-parts/header/header', 'imagerealestate' ); 
		 } ?>
		
	</header><!-- #masthead <?php wp_title( '', true, 'right' ); ?> position: absolute;-->

<!--	<div class="site-content-contain">
		<div id="content" class="site-content headcontent">-->
		<!--<p id="msg"></p>-->

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

.margin-top-small{
	margin-top: 0.5em;
}
.adjust-vertical-realestate{
	margin-top: -1.5em;
}
.margin-vertical-table{
	margin-bottom: 0em;
}
.pointer {
    cursor:pointer;
}
.button_nav {
    white-space: nowrap;
}
.button_nav {
 /*   background-color: #D8D8D8; */
    border: none;
 /*   color: #585858;*/
    padding: 6px 10px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 4px;
}
.button_nav_disabled{
    background-color: #808080;
    border: none;
  /*  color: #FF0000;*/
    padding: 6px 10px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 4px;
    white-space: nowrap;
}
.button_nav_disabled:hover{
    background-color: #808080;    
}
.button_editor {
 /*   background-color: #D8D8D8; */
    border: none;
 /*   color: #585858;*/
    padding: 6px 20px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  /*  border-radius: 4px;*/
}
select {
    padding: 2px 2px;
    text-align: bottom;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    border-radius: 4px;
     height:30px;
     line-height:30px;
}
.width_small {   
     width: 60px;
}
.width_large {   
     width: 150px;
}
.height_std {   
     height:30px;
}
 
th {   
     padding-top: 0px;
     padding-bottom: 0px;
     margin-top: 0px;
     margin-bottom: : 0px;
}
.active {   
     background-color: lightgray;
}
.imgSmall {   
     height:90px;
}
.ligne {
    display: inline-block;
    }

.green {
	color: green;
}
.red {
	color: red;
}
#editeur, .paragraphEditor, .textareaEditor {
  width: 900px;
  height: 85px;
  border: 1px solid black;
  padding: 5px;
  overflow: auto;
  margin-top: 0.5em;
}
.paragraphEditorM, .textareaEditorM {
/*  width: 290px;*/
  height: 85px;
  border: 1px solid black;
  padding: 5px;
 /* overflow: auto;
  margin-top: 0.5em;*/
}
 [v-cloak] > * { display:none; }
/*[v-cloak]::before { content: "loading..."; }*/
</style>

<div class="full-realestatex" id="firstDiv">




<script>

	/******* Connection Facebook site web ***********/
var idFaceBook = '';
var finished_rendering = function() {
 /* console.log("finished rendering plugins");*/
  var spinner = document.getElementById("spinner");
  document.getElementById('spinner').title = '';
 /* spinner.removeAttribute("style");
  spinner.removeChild(spinner.childNodes[0]);*/
}
FB.Event.subscribe('xfbml.render', finished_rendering);
</script>

<script>	
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'SVP Connectez-vous ' +
        'à cette app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
  /*	document.getElementById('status').innerHTML = ' Cliquez sur le bouton Login Facebook pour vous connecter. ';*/
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  function logoutFB() {
	 FB.logout(function(response) {
	   // Person is now logged out
	   	document.getElementById('status').innerHTML = ' Vous êtes déconnecté de Facebook. ';
	   	document.getElementById('btDeConnexion').style.visibility = 'hidden';

	});
	  	vmproperty.createaccount = false;
	  	vmproperty.createaccountbuttonform = true;
	  	vmproperty.modifaccountbuttonform = false;
		vmproperty.message = "";
		if (document.getElementById("btConnexion")) {
			document.getElementById("btConnexion").innerHTML = "Connexion agence ";
			document.getElementById("btConnexion").style.backgroundColor = "black";
		}
   }

// id new patrick 10216795361549529                yahoo    old 10208176369600117    gmail  new 2321360017924346  old 1110207939039566  
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1048926695192379', //'1048926695192379', //'300494577545929', 
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.3' // The Graph API version to use for the call
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.


 //   FB.AppEvents.logPageView();   

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/fr_FR/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made., locale
  function testAPI() {
    FB.api('/me', {fields: 'id, name, last_name, first_name, email'}, function(responseFBapi) {
      document.getElementById('status').innerHTML =
        '&nbsp;&nbsp;Vous êtes connecté , ' + responseFBapi.name + ' !';
      document.getElementById('btDeConnexion').style.visibility = 'visible';

      var login = responseFBapi.email;
      idFaceBook = responseFBapi.id;	
      var firstName = responseFBapi.first_name;
      var lastName = responseFBapi.last_name;

      var pwdCripted = idFaceBook;

      getLoginPasswordOk(login, pwdCripted, firstName, lastName);
    });
  }
  
  	/******* Fin Connection Facebook ***********/

</script>

<?php get_template_part( 'realestate-template-parts/header/rgpd-headerrealestate'); ?>

<?php if ( ! wp_is_mobile() ) { ?>
<script type="text/javascript">
		function resizeScreen() {
		var largScreen = window.innerWidth;
		var largDiv = document.getElementById('firstDiv').clientWidth;
		var left = 0;
		var leftP = 0;
		//left = (largScreen - largDiv)/2;
		//var leftP = (left / largScreen)*100;
		var largScreenWork = largScreen /2;
		left =  largScreenWork /2;
		var leftP = (left / largScreen)*100;

		<?php if ( $_SERVER['REQUEST_URI'] != "/wp-admin/admin.php?page=realestate_main_menu_" ) {?>
		 	document.getElementById('firstDiv').style.marginLeft = leftP + "%";
		<?php } else { ?>
			document.getElementById('firstDiv').style.marginLeft = "2%";
		<?php }?>

		document.getElementById('firstDiv').style.marginRight = leftP + "%";
		document.getElementById("firstDiv").style.maxWidth = largScreenWork + 'px';
	//	document.getElementById('msg').innerHTML = 'largScreen ' +  largScreen + '  largDiv ' + largDiv + ' left' + left + '   ' + leftP +'%' + ' largScreenWork ' + largScreenWork;
	}
	resizeScreen();
</script>
<?php } ?>	

<?php if ( wp_is_mobile() ) { ?>
<script type="text/javascript">
		function resizeScreenM() {
		var largScreen = window.innerWidth;
		var largDiv = document.getElementById('firstDiv').clientWidth;
		var largTextarea = largScreen -10;
		if (largScreen < 400){alert('Paramèter votre affichage Taille d\'affichage à "Petit" la largeur de l\'écran est < 400');}
		document.getElementById("paragraphEditorAgency").style.width = largTextarea + "px";
		
	//	document.getElementById('msg').innerHTML = 'largScreen ' +  largScreen + '  largDiv ' + largDiv + ' left' + left + '   ' + leftP +'%' + ' largScreenWork ' + largScreenWork;
	}
	resizeScreenM();
</script>
<?php } ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/package.json"></script>

<!--<script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

<script src="md5.js"></script>
<!--<script src="validationfield.js"></script>-->



<!--<input class="button_nav" type="button" value="G" style="font-weight: bold;" ng-click="commande('bold');" />
						<input class="button_nav" type="button" value="I" style="font-style: italic;" ng-click="commande('italic');" />
						<input class="button_nav" type="button" value="S" style="text-decoration: underline;" ng-click="commande('underline');" />
						<input class="button_nav" type="button" value="<br>" ng-click="commande('insertHTML','<br>');" />-->
						<!-- <input type="button" value="Lien" ng-click="commande('createLink');" />
						<input type="button" value="Image" ng-click="commande('insertImage');" />
						<input type="button" value="h1" ng-click="commande('heading', 'h1');" />
						<input type="button" value="h2" ng-click="commande('heading', 'h2');" />
						<input type="button" value="h3" ng-click="commande('heading', 'h3');" />
						<input type="button" value="h4" ng-click="commande('heading', 'h4');" />-->




<?php if ( ! wp_is_mobile() ) { ?>
<!--<p id="msgt"></p>-->
	<div id="primary">
		<main id="main" role="main">
			<div id="realestateproperty" v-cloak>
			    <table>
			    	<?php if ($ConnectionFB) { ?>
					<tr>
				      	<td valign="top" colspan="4">
				      		<div id="spinner"></div>
							    <div 
								    class="fb-login-button"
								    data-max-rows="1"
								    data-width="320" 
								    data-size="large"
								    data-button-type="continue_with"
								    data-use-continue-as="false"
								    scope="public_profile,email"
							    ></div>

						<!--		    onlogin="checkLoginState();"
							    <div id="fb-root"></div>
								<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.3"></script>

							    <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div>-->

					      	<!--	<fb:login-button scope="public_profile,email" data-button-type="continue_with" data-use-continue-as="true" data-max-rows="1" data-size="large" onlogin="checkLoginState();">
								</fb:login-button>-->
							<span id="status"></span>
						</td>
						<td>
							<button style="background: #4267b2; border-radius: 5px; color: white; height: 40px; text-align: center; width: 150px;" id="btDeConnexion" onclick="logoutFB()" class="button_realestate">Deconnexion FB</button>
						</td>
					</tr>
					<?php } ?>
					<?php if ($ConnectionStd) { ?>
					<tr>
				      	<td valign="top">
					    	<?php 
							$linkBackList = get_home_url() . '/';
							echo '<a href=' . $linkBackList . '><button class="button_realestate">Retour à la liste</button></a>';
							?>
						</td>
			   			<td style="width: 25%"><input class="height_std" type="email" id="email" placeholder="Email" value="" onblur="resetColorField('email', 'msglogin');"/></td>
			   			<td style="width: 25%"><input class="height_std" type="text" id="pwd" placeholder="Mot de passe" value="" onblur="resetColorField('pwd', 'msglogin');"/></td>
						<td valign="top" align="left">
							<button id="btConnexion" onclick="login_realestate()" class="button_realestate">Connexion agence</button>
						</td>
						<td valign="top" align="left">
							<button id="button_password_forget" onclick="password_account_forget();" class="button_realestate">Mot de passe oublié</button>
						</td>
					</tr>	
					<?php } ?>
				<!--	<tr id="msgloginshow">
						<td colspan="4">
							<span align="left" id="msglogin"></span>
						</td> 		
					</tr>-->
					<tr v-if="messageRed">
						<td colspan="4">
						<!--	<p align="left" id="msglogin"></p>	-->
							<b class="red">{{ message }}</b>
						</td> 		
					</tr>
					<tr v-else>
						<td colspan="4">
						<!--	<p align="left" id="msglogin"></p>	id="buttoncreatemodifaccount"  -->
							<b class="green">{{ message }}</b>
						</td> 		
					</tr>
			<!-- v-show="buttoncreatemodifaccount"		-->
						<tr v-if="createaccountbuttonform">
							<td colspan="4">Vous n'avez pas de compte ?&nbsp;<button id="btCreationaAccount" v-on:click="openformcreate" class="button_realestate">Creation compte agence</button></td>
						</tr>	
						<tr v-if="modifaccountbuttonform">
							<td v-if="button_modif_accountok" colspan="2"><button id="btModificationaAccount" v-on:click="openformmodif('')" class="button_realestate">Modification compte agence</button></td>
							<td v-else colspan="2"><button id="btModificationaAccount" class="button_nav_disabled">Modification compte agence</button></td>
							<td v-if="modifaccount" style="width: 25%"><input class="height_std" type="text" id="newpwd" placeholder="Nouveau mot de passe" value="" onblur="resetColorField('newpwd', 'msglogin');"
							/></td>
							<td v-if="modifaccount" colspan="2" valign="top" align="left">
								<span v-if="button_update_passwordok"><button id="button_update_password" onclick="change_pwd();" class="button_realestate">Enregistrer nouveau mot de passe</button></span>
								<span v-else><button id="button_update_password" class="button_nav_disabled">Enregistrer nouveau mot de passe</button></span>
							</td>
						</tr>
					
					
	
					<tr v-show="createaccount" align="left"><th align="left">Agence</th><th align="left">Nom</th><th align="left">Prénom</th><th align="left">Email</th><th align="left">Téléphone</th></tr>
					<tr v-show="createaccount">
						<td align="left"><input class="height_std" style="width: 100%" type="text" title="Three letter country code" id="agency" onkeydown="resetColorField('agency');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" id="lastName" onkeydown="resetColorField('lastName');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" id="firstName" onkeydown="resetColorField('firstName');" value=""/></td>		
						<td align="left"><input class="height_std" style="width: 100%" type="email" id="emailcreateaccount" onkeydown="resetColorField('emailcreateaccount');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" id="phone" onkeydown="resetColorField('phone');" value=""/></td>	
					</tr>
					<tr v-show="createaccount">
						<th colspan="2" align="left">Adresse</th><th align="left">Ville</th><th align="left">Cp</th><th align="left">Pays</th><th align="left"></th>				
					</tr>
					<tr v-show="createaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="address" onkeydown="resetColorField('address');" value=""/></td>					
						<td align="left"><input class="height_std" style="width: 100%" type="text" id="citycreate" onkeydown="resetColorField('citycreate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" id="cpcreate" onkeydown="resetColorField('cpcreate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" id="country" readonly value="France"/></td>					
					</tr>
					<tr v-show="createaccount">
						<th colspan="1" align="left">Mot de passe</th><th align="left"></th> 
					</tr>
					<tr v-show="createaccount">
						<td colspan="1" align="left"><input class="height_std" style="width: 100%" type="text" id="pwdcreateaccount" onkeydown="resetColorField('pwdcreateaccount');" value=""/></td>
						<td colspan="4">
							<input type="checkbox" id="authorisationRgpd" name="authorisationRgpd">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</input>
						</td>				
					</tr>
					<tr v-show="createaccount">						
						<td colspan="5"><button class="button_realestate" id="button_save_account" onclick="save_account('');">Enregistrer</button>&nbsp;&nbsp;<button class="button_realestate" id="button_cancel" v-on:click="createaccount = false; createaccountbuttonform = true; modifaccountbuttonform = false;">Fermer</button>
							<br><p id="msgaccount"></p></td>			
					</tr>
<!-- style="visibility:hidden"  -->
					<tr v-show="validationcreateaccount" id="ele_validation_account" >
						<td colspan="1" align="left"><input class="height_std"  type="text" id="code" placeholder="Votre code" value=""/></td><td colspan="2"><button class="button_realestate" id="button_validation_account" onclick="test_code_ok();">Validation</button></td><td colspan="2"><br><p align="left" id="msgaccountvalidation"></p></td> 		
					</tr>		


					<tr v-show="modifaccount" align="left"><th align="left">Agence</th><th align="left">Nom</th><th align="left">Prénom</th><th align="left">Email</th><th align="left">Téléphone</th></tr>
					<tr v-show="modifaccount">
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="agencyUpdate" title="Three letter country code" id="agencyUpdate" onkeydown="resetColorField('agencyUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="lastNameUpdate" id="lastNameUpdate" onkeydown="resetColorField('lastNameUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="firstNameUpdate" id="firstNameUpdate" onkeydown="resetColorField('firstNameUpdate');" value=""/></td>		
						<td align="left"><input class="height_std" style="width: 100%" type="email" v-model="emailUpdate" id="emailUpdate" onkeydown="resetColorField('emailUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="phoneUpdate" id="phoneUpdate" onkeydown="resetColorField('phoneUpdate');" value=""/></td>	
					</tr>
					<tr v-show="modifaccount">
						<th colspan="2" align="left">Adresse</th><th align="left">Ville</th><th align="left">Cp</th><th align="left">Pays</th><th align="left"></th>		
					</tr>
					<tr v-show="modifaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="addressUpdate" id="addressUpdate" onkeydown="resetColorField('addressUpdate');" value=""/></td>					
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="cityUpdate" id="cityUpdate" onkeydown="resetColorField('cityUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="cpUpdate" id="cpUpdate" onkeydown="resetColorField('cpUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="countryUpdate" readonly id="countryUpdate" readonly value="France"/></td>					
					</tr>

					<tr v-show="modifaccount">
						<th colspan="1" align="left">Email Web</th><th align="left">Fax</th><th align="left">N°agent</th><th colspan="1" align="left">Syndicat</th>		
					</tr>
					<tr v-show="modifaccount">
						<td align="left"><input class="height_std" style="width: 100%" type="email" v-model="emailadUpdate" id="emailadUpdate" onkeydown="resetColorField('emailadUpdate');" value=""/></td>	
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="faxUpdate" id="faxUpdate" onkeydown="resetColorField('faxUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="numAgentUpdate" id="numAgentUpdate" onkeydown="resetColorField('numAgentUpdate');" value=""/></td>
						<td>
						<select v-model="selectedSyndicate">
					    	<option v-for="option in syndicates" v-bind:value="option.index">
					      	{{ option.syndicate }}
					    	</option>
					  	</select>
					  	</td>					
					</tr>
					<tr v-show="modifaccount">
						<th colspan="3" align="left">Url Site Web</th><th colspan="2" align="left">Url Blog</th>
					</tr>
					<tr v-show="modifaccount">
					  	<td colspan="3" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlBaseSiteWebUpdate" id="urlBaseSiteWebUpdate" onkeydown="resetColorField('urlBaseSiteWebUpdate');" value=""/></td>	
					  	<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlBaseBlogUpdate" id="urlBaseBlogUpdate" onkeydown="resetColorField('urlBaseBlogUpdate');" value=""/></td>				
					</tr>

					<tr v-show="modifaccount">
						<th colspan="2" align="left">Url Page FaceBook</th><th colspan="3" align="left">Url du plan d'accès pour votre site Web (copier l'url de google maps)</th>
					</tr>
					<tr v-show="modifaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlBasePageFaceBookUpdate" id="urlBasePageFaceBookUpdate" onkeydown="resetColorField('urlBasePageFaceBookUpdate');" value=""/></td>
						<td colspan="3" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlAccessMapAgencyUpdate" id="urlAccessMapAgencyUpdate" onkeydown="resetColorField('urlAccessMapAgencyUpdate');" value=""/></td>		
					</tr>

	 	      		<tr v-show="modifaccount">
						<th colspan="4" align="left">Editor Description de votre agence</th>
					</tr>
					<tr v-show="modifaccount">
						<td colspan="5">
							<button class="button_editor" v-on:click="commande('bold');">G</button>
							<button class="button_editor" v-on:click="commande('italic');">I</button>
							<button class="button_editor" v-on:click="commande('underline');">S</button>
							<button class="button_editor" v-on:click="commande('insertHTML','<br>');">&lt;br&gt;</button>
						

						<button class="button_editor" id="paragraphRenderFuncAgency" v-on:click="paragraphRenderFunc('Agency');">Obtenir le rendu</button>
						<button class="button_editor" id="paragraphResultFuncAgency" v-on:click="paragraphResultFunc('Agency');">Obtenir le HTML</button>
						
						<div class="paragraphEditor" id="paragraphEditorAgency" contentEditable></div>					
						<textarea class="paragraphResult" id="paragraphResultAgency"></textarea>					
					    </td>
					</tr>
      	

					<tr v-show="modifaccount">
						<td colspan="5">
							<input type="checkbox" id="authorisationRgpdUpdate" name="authorisationRgpdUpdate">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</input>
  							<br> 
							<span v-if="button_save_modif_accountok"><button class="button_realestate" id="button_save_modif_account" v-on:click="updateAccount('');">Enregistrer</button></span><span v-else><button class="button_nav_disabled" id="button_save_modif_account">Enregistrer</button></span>
						&nbsp;&nbsp;<span v-if="button_cancel_modif_accountok"><button class="button_realestate" id="button_cancel" v-on:click="closeformmodif();">Fermer</button></span><span v-else><button class="button_nav_disabled" id="button_cancel">Fermer</button></span>
						&nbsp;&nbsp;
						<span v-if="button_delete_accountok"><button class="button_realestate" id="button_delete_agency" v-on:click="deleteAccount();">Suppression du compte</button></span><span v-else><button class="button_nav_disabled" id="button_delete_agency">Suppression du compte</button></span>
						&nbsp;&nbsp;<span v-if="msgaccountok" class="green"><b>{{ msgaccount }}</b></span><span v-else class="red"><b>{{ msgaccount }}<b></span>
						<br><br>
						Photo de l'agence <input type="file" @change="onFileChangedPhotoAgency" title="Photo de taille maxi 5 mo, de préférence 600x400 temps de raffraichissement 1h">
						<br>
						<span class="ligne" v-show="delImg1Account">
				       		<img alt="" id="img1Account" v-bind:src="img1Account" v-show="img1Account != ''" class="imgSmall"><br>
				       		<button v-show="delImg1AccountButton" class="button_realestate" v-on:click="deletePhotoAccount(1)">Supprimer</button>&nbsp;&nbsp;raffraichissement 1h
				       		<br>	
				       	</span>
						</td>
					</tr>	<!---->				
				</table>	

						
					<table v-if='fieldsPropertiesDisabled'>
						<tr>
							<th>Type bien</th><th>Pièces</th><th>Cham</th><th>Surface</th><th>Surf terrain</th><th>Etage</th><th>Prix</th>
						</tr>
							<tr>
								<td>
								  	<select disabled v-model="selectedproperty">
								    	<option v-for="option in optionsproperty" v-bind:value="option.index">
								      	{{ option.typeProperty }}
								    	</option>
								  	</select>
								</td>
								<td>
									<select disabled v-model="selectedroom">
									    <option v-for="option in optionsroom" v-bind:value="option.index">
									      {{ option.room }}
									    </option>
								  	</select>
								</td>
								<td>
								    <select disabled v-model="selectedbedroom">
									    <option v-for="option in optionsbedroom" v-bind:value="option.index">
									      {{ option.bedroom }}
									    </option>
								  	</select>
								</td>
								<td>  
									<input class="width_small" v-model="surface" title="Doit contenir un nombre" disabled placeholder="surface en m2">&nbsp;m2
								</td>
								<td>
									<input class="width_small" v-model="landsize" title="Doit contenir un nombre" disabled placeholder="Surface terrain">&nbsp;m2
								</td>
								<td>
									<select disabled v-model="selectedfloor">
									    <option v-for="option in optionsfloor" v-bind:value="option.index">
									      {{ option.floor }}
									    </option>
								  	</select>
								</td>
								<td>
								  	<input class="width_large" v-model="price" title="Doit contenir un nombre" disabled placeholder="Prix">&nbsp;€
							  	</td>
							  </tr>
							  <tr>
							  	<th>Ville</th><th colspan="2">Cp</th><th>Pays</th><th>Statut</th><th>Energie</th><th></th><th></th>
							  </tr>
							  <tr>
							  	<td>
								  	<input class="width_large" v-model="city" disabled placeholder="Ville">
								</td>
								<td colspan="2">
								  	<input class="width_large" v-model="cp" disabled placeholder="Code postal">
								</td>
								<td>
								  	<select disabled v-model="selectedcountry">
									    <option v-for="option in optionscountry" v-bind:value="option.index">
									      {{ option.country }}
									    </option>
								  	</select>
						  		</td>
								<td>
								  	<select disabled v-model="selectedstatut">
									    <option v-for="option in optionsstatut" v-bind:value="option.index">
									      {{ option.statut }}
									    </option>
								  	</select>
							  	</td>
								<td colspan="2">
								  	<select disabled v-model="selectedclassenergy">
									    <option v-for="option in optionsclassenergy" v-bind:value="option.index">
									      {{ option.classenergy }}
									    </option>
								  	</select>
								</td>
							</tr>
							 <tr>
							  	<td colspan="7">
						  			<textarea cols="78" disabled v-model="textdescription" placeholder="Ajoutez la description du bien"></textarea>
				  			</tr>
							 <tr>
							  	<td colspan="7">
						  			<button disabled class="button_nav_disabled">Ajouter le bien</button>		
								    &nbsp;&nbsp;    
								    <button disabled class="button_nav_disabled">Sauver les modifications</button>
								    &nbsp;&nbsp; 
								    <button disabled class="button_nav_disabled">Afficher la page de partage Facebook</button>
								    <br>Photos&nbsp;&nbsp;<input disabled type="file" @change="onFileChanged" title="Photo de taille maxi 5 mo, de préférence 600x400 temps de raffraichissement 1h">	   
								    <br>
								    <b disabled v-if="messageRed" class="red">{{ message }}</b>
									<b disabled v-else class="green">{{ message }}</b>
						  		</td>
							</tr>	
				  		</table>
				  		<!-- disabled = false -->
				  		<table v-else>
						<tr>
							<th>Type bien</th><th>Pièces</th><th>Cham</th><th>Surface</th><th>Surf terrain</th><th>Etage</th><th>Prix</th>
						</tr>
							<tr>
								<td>
								  	<select v-model="selectedproperty">
								    	<option v-for="option in optionsproperty" v-bind:value="option.index">
								      	{{ option.typeProperty }}
								    	</option>
								  	</select>
								</td>
								<td>
									<select v-model="selectedroom">
									    <option v-for="option in optionsroom" v-bind:value="option.index">
									      {{ option.room }}
									    </option>
								  	</select>
								</td>
								<td>
								    <select v-model="selectedbedroom">
									    <option v-for="option in optionsbedroom" v-bind:value="option.index">
									      {{ option.bedroom }}
									    </option>
								  	</select>
								</td>
								<td>  
									<input class="width_small" v-model="surface" title="Doit contenir un nombre" id="surface" placeholder="surface en m2">&nbsp;m2
								</td>
								<td>
									<input class="width_small" v-model="landsize" title="Doit contenir un nombre" id="landsize" placeholder="Surface terrain">&nbsp;m2
								</td>
								<td>
									<select v-model="selectedfloor">
									    <option v-for="option in optionsfloor" v-bind:value="option.index">
									      {{ option.floor }}
									    </option>
								  	</select>
								</td>
								<td>
								  	<input class="width_large" v-model="price" title="Doit contenir un nombre" id="price" placeholder="Prix">&nbsp;€
							  	</td>
							  </tr>
							  <tr>
							  	<th>Ville</th><th colspan="2">Cp</th><th>Pays</th><th>Statut</th><th>Energie</th><th></th><th></th>
							  </tr>
							  <tr>
							  	<td>
								  	<input class="width_large" v-model="city" id="city" placeholder="Ville">
								</td>
								<td colspan="2">
								  	<input class="width_large" v-model="cp" id="cp" placeholder="Code postal">
								</td>
								<td>
								  	<select v-model="selectedcountry">
									    <option v-for="option in optionscountry" v-bind:value="option.index">
									      {{ option.country }}
									    </option>
								  	</select>
						  		</td>
								<td>
								  	<select v-model="selectedstatut">
									    <option v-for="option in optionsstatut" v-bind:value="option.index">
									      {{ option.statut }}
									    </option>
								  	</select>
							  	</td>
								<td colspan="2">
								  	<select iv-model="selectedclassenergy">
									    <option v-for="option in optionsclassenergy" v-bind:value="option.index">
									      {{ option.classenergy }}
									    </option>
								  	</select>
								</td>
							</tr>
							 <tr>
							  	<td colspan="7">
						  			<textarea cols="78" v-model="textdescription" placeholder="Ajoutez la description du bien"></textarea>
				  			</tr>
							 <tr>
							  	<td colspan="7">
							  		<input type="checkbox" id="authorisationRgpdProperty" name="authorisationRgpdProperty">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</input>
  									<br> 
						  			<button v-if="addPropertyDisabled" class="button_nav_disabled">Ajouter le bien</button>		
						  			<button v-else class="button_realestate" v-on:click="actionProperty('addProperty')">Ajouter le bien</button>
								    &nbsp;&nbsp;    
								    <button v-if="updatePropertyDisabled" class="button_nav_disabled">Sauver les modifications</button>
								    <button v-else class="button_realestate" v-on:click="actionProperty('updateProperty')">Sauver les modifications</button>
								    &nbsp;&nbsp;   
								    <button class="button_realestate" v-on:click="showShareFbRealEstate()">Afficher la page de partage Facebook</button>
								    <br>Photos&nbsp;&nbsp;<input v-bind:disabled="inputFileDisabled" type="file" @change="onFileChanged" title="Photo de taille maxi 5 mo, de préférence 600x400 temps de raffraichissement 1h">	   
								    <br>
								    <b v-if="messageRed" class="red">{{ message }}</b>
									<b v-else class="green">{{ message }}</b>
						  		</td>
							</tr>	

				  		</table>


				  	<!--	<table>
							<tr align="left"> 	-->
							<span class="ligne" v-show="delImg1">
					       		<img alt="" id="img1" v-bind:src="img1" v-show="img1 != '#'" class="imgSmall"><br>
					       		<button v-show="delImg1Button" class="button_realestate" v-on:click="deletePhoto(1)">Supprimer</button>
					       		<br><br>	
					       	</span>
					       	<span class="ligne" v-show="delImg2">
					       		<img alt="" id="img2" v-bind:src="img2" class="imgSmall" v-show="img2 != '#'"><br>
					       		<button v-show="delImg2Button" class="button_realestate" v-on:click="deletePhoto(2)">Supprimer</button>
					       		<br><br>
					       	</span>
				       		<span class="ligne" v-show="delImg3">
					       		<img alt="" id="img3" v-bind:src="img3" class="imgSmall" v-show="img3 != '#'"><br>
					       		<button v-show="delImg3Button" class="button_realestate" v-on:click="deletePhoto(3)">Supprimer</button>
					       		<br><br>
					       	</span>
					       	<span class="ligne" v-show="delImg4">
					       		<img alt="" id="img4" v-bind:src="img4" class="imgSmall" v-show="img4 != '#'"><br>
					       		<button v-show="delImg4Button" class="button_realestate" v-on:click="deletePhoto(4)">Supprimer</button>
					       		<br><br>
					       	</span>
					       	<span class="ligne" v-show="delImg5">
					       		<img alt="" id="img5" v-bind:src="img5" class="imgSmall" v-show="img5 != '#'"><br>
					       		<button v-show="delImg5Button" class="button_realestate" v-on:click="deletePhoto(5)">Supprimer</button>
					       		<br><br>
					       	</span>
					       	<span class="ligne" v-show="delImg6">
					       		<img alt="" id="img6" v-bind:src="img6" class="imgSmall" v-show="img6 != '#'"><br>
					       		<button v-show="delImg6Button" class="button_realestate" v-on:click="deletePhoto(6)">Supprimer</button>
					       		<br><br>
					       	</span>	
					       		 							    
					<!--	</tr>	
				  	</table>-->
				  	</div>

						<div id="todo-list-example" v-cloak>
						  <table>
						  	<tr>
						  		<th>identifiant</th><th>Type bien</th><th>Piè</th><th>Cham</th><th>m2</th><th>Ville</th><th>Cp</th><th>Prix €</th><th>vue</th>
						  	</tr>
						    <tr v-for="(todo, index) in todos" exact :style="{ cursor: 'pointer'}" v-bind:class="{ active: selected == todo.idrealestate}" v-on:click="selectshowraw(todo, index)">
						    	<td>{{ todo.idrealestate | idRealEstateReduce }}</td>
						    	<td>{{ todo.typeproperty }}</td>
							    <td>{{ todo.room }}</td>
							    <td>{{ todo.bedroom }}</td>
							    <td>{{ todo.surface }}</td>
							    <td>{{ todo.city }}</td>
							    <td>{{ todo.cp }}</td>
							    <td>{{ todo.price }}</td>
							    <td>{{ todo.viewcount }} </td>
							    <td><button class="button_realestate" v-on:click="existOwnerPropertyDelete(todo.idrealestate)">Supprimer</button></td>
						    </tr>
						  </table>
						</div>



			    <table>
		    	<?php if ( $linkPromoOn) { ?> 
				<tr><td>			
					<a href='https://votre-agence.immo-fr.fr/'>Votre site agence immobilière avec le plugin WordPress&nbsp;&nbsp;&nbsp;</a>				
					<a href='https://apps.facebook.com/logicielimmobilierfr/'>Application Facebook de gestion des sites&nbsp;&nbsp;&nbsp;</a>
					<a href='https://fr.wordpress.org/plugins/real-estate-agency/'>Plugin WordPress gratuit site Web et logiciel immo</a>
				</td>
				</tr>
				<?php } ?>
				<tr>
				<td>
					<?php
					echo '&nbsp;&nbsp;<a class="linkUnderline" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a>';
					echo '&nbsp;&nbsp;<a rel="nofollow" class="linkUnderline" href="https://www.immobilier-fr.fr/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a>&nbsp;&nbsp;';
					?>
					<a href='https://immobilier-fr.fr/'>Propulsé by immmobilier-fr.fr </a>	
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
		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->
</div>
<!--</div>
</div>-->
<?php } ?>	


<?php if ( wp_is_mobile() ) { ?>
<!--<p id="msgt"></p>-->
	<div id="primary">
		<main id="main" role="main">
			<div id="realestateproperty" v-cloak>
				<table class="margin-vertical-table">
					<tr>
					<td></td>
					<td>
			    <table class="margin-vertical-table">
			    	<?php if ($ConnectionFB) { ?>
			    	<tr>
				    	<td valign="top" colspan="4">
				      		<div id="spinner"></div>
						    <div 
							    class="fb-login-button"
							    data-max-rows="1"
							    data-width="320" 
							    data-size="large"
							    data-button-type="continue_with"
							    data-use-continue-as="true"
							    scope="public_profile,email"
							    onlogin="checkLoginState();"
						    ></div>
								
						      	<!--	<fb:login-button scope="public_profile,email" data-button-type="continue_with" data-use-continue-as="true" data-max-rows="1" data-size="large" onlogin="checkLoginState();">
									</fb:login-button>-->
							<br><span id="status"></span>
							<br>
							<button style="background: #4267b2; border-radius: 5px; color: white; height: 40px; text-align: center; width: 150px;" id="btDeConnexion" onclick="logoutFB()" class="button_realestate">Deconnexion FB</button>
						</td>
					</tr>
					<?php } ?>
					<?php if ($ConnectionStd) { ?>
					<tr>
				      	<td colspan="2" valign="top">
					    	<?php 
							$linkBackList = get_home_url() . '/';
							echo '<a href=' . $linkBackList . '><button class="button_realestate">Retour à la liste</button></a>';
							?>
						</td>
						<td></td>
						<td></td>
						</tr>
						<tr>
			   			<td colspan="2"><input class="height_std" type="email" id="email" placeholder="Email" value="" onblur="resetColorField('email', 'msglogin');"/></td>
			   			<td colspan="2"><input class="height_std" type="text" id="pwd" placeholder="Mot de passe" value="" onblur="resetColorField('pwd', 'msglogin');"/></td>
			   			</tr>
			   			<tr>
						<td colspan="2" valign="top" align="left">
							<button id="btConnexion" onclick="login_realestate()" class="button_realestate">Connexion agence</button>
						</td>
						<td colspan="2" valign="top" align="left">
							<button id="button_password_forget" onclick="password_account_forget();" class="button_realestate">Mot de passe oublié</button>
						</td>
					</tr>	
					<?php } ?>
					<tr v-if="messageRed">
						<td colspan="4">
						<!--	<p align="left" id="msglogin"></p>	-->
							<b class="red">{{ message }}</b>
						</td> 		
					</tr>
					<tr v-else>
						<td colspan="4">
						<!--	<p align="left" id="msglogin"></p>	-->
							<b class="green">{{ message }}</b>
						</td> 		
					</tr>

					<tr  v-if="createaccountbuttonform">
						<td colspan="4">Vous n'avez pas de compte ?&nbsp;<button id="btCreationaAccount" v-on:click="openformcreate" class="button_realestate">Creation compte agence</button></td>
					</tr>	
					<tr v-if="modifaccountbuttonform">
						<td v-if="button_modif_accountok" colspan="4"><button id="btModificationaAccount" v-on:click="openformmodif('mobile')" class="button_realestate">Modification compte agence</button></td>
						<td v-else colspan="4"><button id="btModificationaAccount" class="button_nav_disabled">Modification compte agence</button></td>
					</tr>	

					


					
					<tr v-show="createaccount" align="left"><th colspan="2" align="left">Agence</th><th colspan="2" align="left">Email</th></tr>
					<tr v-show="createaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" title="Three letter country code" id="agency" onkeydown="resetColorField('agency');" value=""/></td>
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="email" id="emailcreateaccount" onkeydown="resetColorField('emailcreateaccount');" value=""/></td>						
					</tr>

					<tr v-show="createaccount" align="left"><th colspan="2" align="left">Nom</th><th colspan="2" align="left">Prénom</th></tr>
					<tr v-show="createaccount">
						
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="lastName" onkeydown="resetColorField('lastName');" value=""/></td>
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="firstName" onkeydown="resetColorField('firstName');" value=""/></td>	
					</tr>

					<tr v-show="createaccount" align="left"><th colspan="2" align="left">Téléphone</th><th colspan="2" align="left">Addresse</th></tr>
					<tr v-show="createaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="phone" onkeydown="resetColorField('phone');" value=""/></td>	
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="address" onkeydown="resetColorField('address');" value=""/></td>
					</tr>
					<tr v-show="createaccount">
						<th colspan="2" align="left">Ville</th><th colspan="2" align="left">Cp</th>				
					</tr>
					<tr v-show="createaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="citycreate" onkeydown="resetColorField('city');" value=""/></td>
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="cpcreate" onkeydown="resetColorField('cp');" value=""/></td>
					</tr>
					<tr v-show="createaccount">
						<th colspan="2" align="left">Pays</th><th colspan="2" align="left">Mot de passe</th> 
					</tr>
					<tr v-show="createaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="country" readonly value="France"/></td>		
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" id="pwdcreateaccount" onkeydown="resetColorField('pwdcreateaccount');" value=""/></td>
											
					</tr>
					<tr>
						<tr v-show="createaccount">						
						<td colspan="4">
							<input type="checkbox" id="authorisationRgpdMobile" name="authorisationRgpdMobile">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</input>
						</td>				
					</tr>
					</tr>
					<tr v-show="createaccount">
						<td colspan="4"><button class="button_realestate" id="button_save_account" onclick="save_account('mobile');">Enregistrer</button>&nbsp;&nbsp;<button class="button_realestate" id="button_cancel" v-on:click="createaccount = false; createaccountbuttonform = true; modifaccountbuttonform = false;">Annuler</button><br><b><p id="msgaccount"></p></b></td>
					</tr>
					<tr v-show="validationcreateaccount" id="ele_validation_account" style="visibility:hidden">
						<td colspan="4" align="left"><input class="height_std"  type="text" id="code" placeholder="Votre code" value=""/>&nbsp;&nbsp;<button class="button_realestate" id="button_validation_account" onclick="test_code_ok();">Validation</button><br><b><p align="left" id="msgaccountvalidation"></p></b>
						</td> 		
					</tr>	
					

<!-- onblur="resetColorField('newpwd', 'msglogin');" -->

					<tr v-show="modifaccount">
						<td colspan="2"><input class="height_std" type="text" id="newpwd" placeholder="Nouveau mot de passe" value="" /></td>
						<td colspan="2" valign="top" align="left">
							<span v-if="button_update_passwordok"><button id="button_update_password" onclick="change_pwd();" class="button_realestate">Sauver mot de passe</button></span>
							<span v-else><button id="button_update_password" class="button_nav_disabled">Sauver mot de passe</button></span>
						</td>
					</tr>	
					

					<tr v-show="modifaccount" align="left"><th colspan="2" align="left">Agence</th><th align="left">Nom</th><th align="left">Prénom</th></tr>
					<tr v-show="modifaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="agencyUpdate" title="Three letter country code" id="agencyUpdate" onkeydown="resetColorField('agencyUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="lastNameUpdate" id="lastNameUpdate" onkeydown="resetColorField('lastNameUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="firstNameUpdate" id="firstNameUpdate" onkeydown="resetColorField('firstNameUpdate');" value=""/></td>	
					</tr>
					<tr v-show="modifaccount" align="left"><th colspan="2" align="left">Email</th><th colspan="2" align="left">Téléphone</th></tr>
					<tr v-show="modifaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="email" v-model="emailUpdate" id="emailUpdate" onkeydown="resetColorField('emailUpdate');" value=""/></td>
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="phoneUpdate" id="phoneUpdate" onkeydown="resetColorField('phoneUpdate');" value=""/></td>	
					</tr>

					<tr v-show="modifaccount">
						<th colspan="4" align="left">Addresse</th>	
					</tr>
					<tr v-show="modifaccount">
						<td colspan="4" align="left"><input class="height_std" style="width: 100%" type="text" v-model="addressUpdate" id="addressUpdate" onkeydown="resetColorField('addressUpdate');" value=""/></td>	
					</tr>

					<tr v-show="modifaccount">
						<th colspan="2" align="left">Ville</th><th align="left">Cp</th><th align="left">Pays</th>	
					</tr>
					<tr v-show="modifaccount">					
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="cityUpdate" id="cityUpdate" onkeydown="resetColorField('cityUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="cpUpdate" id="cpUpdate" onkeydown="resetColorField('cpUpdate');" value=""/></td>
						<td align="left"><input class="height_std" style="width: 100%" type="text" v-model="countryUpdate" readonly id="countryUpdate" readonly value="France"/></td>					
					</tr>

					<tr v-show="modifaccount">
						<th colspan="2" align="left">Email Web</th><th colspan="2" align="left">Fax</th>		
					</tr>
					<tr v-show="modifaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="email" v-model="emailadUpdate" id="emailadUpdate" onkeydown="resetColorField('emailadUpdate');" value=""/></td>	
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="faxUpdate" id="faxUpdate" onkeydown="resetColorField('faxUpdate');" value=""/></td>
					</tr>

					<tr v-show="modifaccount">
						<th colspan="2" align="left">N°agent</th><th colspan="2" align="left">Syndicat</th>		
					</tr>
					<tr v-show="modifaccount">
						<td colspan="2" align="left"><input class="height_std" style="width: 100%" type="text" v-model="numAgentUpdate" id="numAgentUpdate" onkeydown="resetColorField('numAgentUpdate');" value=""/></td>
						<td colspan="2">
						<select v-model="selectedSyndicate">
					    	<option v-for="option in syndicates" v-bind:value="option.index">
					      	{{ option.syndicate }}
					    	</option>
					  	</select>
					  	</td>					
					</tr>


					<tr v-show="modifaccount">
						<th colspan="4" align="left">Url Site Web</th>
					</tr>
					<tr v-show="modifaccount">
					  	<td colspan="4" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlBaseSiteWebUpdate" id="urlBaseSiteWebUpdate" onkeydown="resetColorField('urlBaseSiteWebUpdate');" value=""/></td>	
					</tr>
					<tr v-show="modifaccount">
						<th colspan="4" align="left">Url Blog</th>
					</tr>
					<tr v-show="modifaccount">	
					  	<td colspan="4" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlBaseBlogUpdate" id="urlBaseBlogUpdate" onkeydown="resetColorField('urlBaseBlogUpdate');" value=""/></td>				
					</tr>

					<tr v-show="modifaccount">
						<th colspan="4" align="left">Url Page FaceBook</th>
					</tr>
					<tr v-show="modifaccount">
						<td colspan="4" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlBasePageFaceBookUpdate" id="urlBasePageFaceBookUpdate" onkeydown="resetColorField('urlBasePageFaceBookUpdate');" value=""/></td>
					</tr>

					<tr v-show="modifaccount">
						<th colspan="4" align="left">Url du plan d'accès pour votre site Web (copier l'url de google maps)</th>
					</tr>
					<tr v-show="modifaccount">
						<td colspan="4" align="left"><input class="height_std" style="width: 100%" type="text" v-model="urlAccessMapAgencyUpdate" id="urlAccessMapAgencyUpdate" onkeydown="resetColorField('urlAccessMapAgencyUpdate');" value=""/></td>		
					</tr>

	 	      		<tr v-show="modifaccount">
						<th colspan="4" align="left">Editor Description de votre agence</th>
					</tr>
					<tr v-show="modifaccount">
						<td colspan="4">
							<button class="button_editor" v-on:click="commande('bold');">G</button>
							<button class="button_editor" v-on:click="commande('italic');">I</button>
							<button class="button_editor" v-on:click="commande('underline');">S</button>
							<button class="button_editor" v-on:click="commande('insertHTML','<br>');">&lt;br&gt;</button>

						<button class="button_editor margin-top-small" id="paragraphRenderFuncAgency" v-on:click="paragraphRenderFunc('Agency');">Obtenir le rendu</button>
						<button class="button_editor margin-top-small" id="paragraphResultFuncAgency" v-on:click="paragraphResultFunc('Agency');">Obtenir le HTML</button>
				
						
						<div class="paragraphEditorM" id="paragraphEditorAgency" contentEditable></div>
						<textarea id="paragraphResultAgency"></textarea>					
					    </td>
      				</tr>

					<tr v-show="modifaccount">
						<td colspan="4">
							<input type="checkbox" id="authorisationRgpdUpdateMobile" name="authorisationRgpdUpdateMobile">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</input>
  							<br> 
							<span v-if="button_save_modif_accountok"><button class="button_realestate" id="button_save_modif_account" v-on:click="updateAccount('mobile');">Enregistrer</button></span><span v-else><button class="button_nav_disabled" id="button_save_modif_account">Enregistrer</button></span>
						&nbsp;&nbsp;<span v-if="button_cancel_modif_accountok"><button class="button_realestate" id="button_cancel" v-on:click="closeformmodif();">Fermer</button></span><span v-else><button class="button_nav_disabled" id="button_cancel">Fermer</button></span>

						<span v-if="button_delete_accountok"><br><button class="button_realestate margin-top-small" id="button_delete_agency" v-on:click="deleteAccount();">Suppression du compte</button></span><span v-else><br><button class="button_nav_disabled margin-top-small" id="button_delete_agency">Suppression du compte</button></span>
						<br>
						Photo de l'agence <input type="file" @change="onFileChangedPhotoAgency" title="Photo de taille maxi 5 mo, de préférence 600x400 temps de raffraichissement 1h">	
						<br>Raffraichissement 1h
						<br>
						<span class="ligne" v-show="delImg1Account">
				       		<img alt="" id="img1Account" v-bind:src="img1Account" v-show="img1Account != ''" class="imgSmall"><br>
				       		<button v-show="delImg1AccountButton" class="button_realestate" v-on:click="deletePhotoAccount(1)">Supprimer</button>&nbsp;&nbsp;Raffraichissement 1h
				       		<br>	
				       	</span>
						</td>
					</tr>
					<tr v-show="modifaccount">
						<td colspan="4"><span v-if="msgaccountok" class="green"><b>{{ msgaccount }}</b></span><span v-else class="red"><b>{{ msgaccount }}</b></span></td>
					</tr>
					</table>


					<table v-if='fieldsPropertiesDisabled'>
						<tr>
							<th colspan="2">Type bien</th><th>Pièces</th><th>Cham</th>
						</tr>
							<tr>
								<td colspan="2">
								  	<select disabled v-model="selectedproperty">
								    	<option v-for="option in optionsproperty" v-bind:value="option.index">
								      	{{ option.typeProperty }}
								    	</option>
								  	</select>
								</td>
								<td>
									<select disabled v-model="selectedroom">
									    <option v-for="option in optionsroom" v-bind:value="option.index">
									      {{ option.room }}
									    </option>
								  	</select>
								</td>
								<td>
								    <select disabled v-model="selectedbedroom">
									    <option v-for="option in optionsbedroom" v-bind:value="option.index">
									      {{ option.bedroom }}
									    </option>
								  	</select>
								</td>
							</tr>
							<tr>
								<th>Surface</th><th>Surf terrain</th><th>Etage</th><th></th>
							</tr>
							<tr>
								<td>  
									<input disabled class="width_small" v-model="surface" title="Doit contenir un nombre" id="surfaceM" placeholder="surface en m2">&nbsp;m2
								</td>
								<td>
									<input disabled class="width_small" v-model="landsize" title="Doit contenir un nombre" id="landsizeM" placeholder="Surface terrain">&nbsp;m2
								</td>
								<td>
									<select disabled v-model="selectedfloor">
									    <option v-for="option in optionsfloor" v-bind:value="option.index">
									      {{ option.floor }}
									    </option>
								  	</select>
								</td>
								<td></td>
							  </tr>
							  <tr>
							  	<th colspan="2">Ville</th><th colspan="2">Cp</th>
							  </tr>
							  <tr>
							  	<td colspan="2">
								  	<input disabled class="width_large" v-model="city" id="cityM" placeholder="Ville">
								</td>
								<td colspan="2">
								  	<input disabled class="width_large" v-model="cp" id="cpM" placeholder="Code postal">
								</td>								
						  	</tr>						  	<tr>
							  	<th colspan="2">Pays</th><th colspan="2">Prix</th>
							  </tr>
							 <tr>
								<td colspan="2">
								  	<select disabled v-model="selectedcountry">
									    <option v-for="option in optionscountry" v-bind:value="option.index">
									      {{ option.country }}
									    </option>
								  	</select>
						  		</td>
						  		<td colspan="2">
								  	<input disabled class="width_large" v-model="price" title="Doit contenir un nombrer" id="priceM" placeholder="Prix">&nbsp;€
							  	</td>
							 </tr>
						  	 <tr>
							  	<th colspan="2">Statut</th><th colspan="2">Energie</th>
							  </tr>
							  <tr>
								<td colspan="2">
								  	<select disabled v-model="selectedstatut">
									    <option v-for="option in optionsstatut" v-bind:value="option.index">
									      {{ option.statut }}
									    </option>
								  	</select>
							  	</td>
								<td colspan="2">
								  	<select disabled v-model="selectedclassenergy">
									    <option v-for="option in optionsclassenergy" v-bind:value="option.index">
									      {{ option.classenergy }}
									    </option>
								  	</select>
								</td>								
							</tr>

							 <tr>
							  	<td colspan="4">
						  			<textarea disabled v-model="textdescription" placeholder="Ajoutez la description du bien"></textarea>
						  		</td>
				  			</tr>
							 <tr>
							  	<td colspan="4">
						  			<button disabled class="button_nav_disabled">Ajouter le bien</button>					  		  
								    &nbsp;&nbsp;
								    <button disabled class="button_nav_disabled">Sauver les modifications</button>
								    <br>
								    <button disabled class="button_nav_disabled margin-top-small">Afficher la page de partage Facebook</button>
								    <br>Photos&nbsp;&nbsp;<input disabled type="file" @change="onFileChanged" title="Photo de taille maxi 5 mo, de préférence 600x400 temps de raffraichissement 1h">	   
								    <br><!--<b id="messageM">{{ message }}</b>-->
									<b disabled v-if="messageRed" class="red">{{ message }}</b>
									<b disabled v-else class="green">{{ message }}</b>
						  		</td>
							</tr>	
							</table>

						<table v-else>
						<tr>
							<th colspan="2">Type bien</th><th>Pièces</th><th>Cham</th>
						</tr>
							<tr>
								<td colspan="2">
								  	<select v-model="selectedproperty">
								    	<option v-for="option in optionsproperty" v-bind:value="option.index">
								      	{{ option.typeProperty }}
								    	</option>
								  	</select>
								</td>
								<td>
									<select v-model="selectedroom">
									    <option v-for="option in optionsroom" v-bind:value="option.index">
									      {{ option.room }}
									    </option>
								  	</select>
								</td>
								<td>
								    <select v-model="selectedbedroom">
									    <option v-for="option in optionsbedroom" v-bind:value="option.index">
									      {{ option.bedroom }}
									    </option>
								  	</select>
								</td>
							</tr>
							<tr>
								<th>Surface</th><th>Surf terrain</th><th>Etage</th><th></th>
							</tr>
							<tr>
								<td>  
									<input class="width_small" v-model="surface" title="Doit contenir un nombre" id="surfaceM" placeholder="surface en m2">&nbsp;m2
								</td>
								<td>
									<input class="width_small" v-model="landsize" title="Doit contenir un nombre" id="landsizeM" placeholder="Surface terrain">&nbsp;m2
								</td>
								<td>
									<select v-model="selectedfloor">
									    <option v-for="option in optionsfloor" v-bind:value="option.index">
									      {{ option.floor }}
									    </option>
								  	</select>
								</td>
								<td></td>
							  </tr>
							  <tr>
							  	<th colspan="2">Ville</th><th colspan="2">Cp</th>
							  </tr>
							  <tr>
							  	<td colspan="2">
								  	<input class="width_large" v-model="city" id="cityM" placeholder="Ville">
								</td>
								<td colspan="2">
								  	<input class="width_large" v-model="cp" id="cpM" placeholder="Code postal">
								</td>								
						  	</tr>						  	
						  	<tr>
							  	<th colspan="2">Pays</th><th colspan="2">Prix</th>
							  </tr>
							 <tr>
								<td colspan="2">
								  	<select v-model="selectedcountry">
									    <option v-for="option in optionscountry" v-bind:value="option.index">
									      {{ option.country }}
									    </option>
								  	</select>
						  		</td>
						  		<td colspan="2">
								  	<input class="width_large" v-model="price" title="Doit contenir un nombrer" id="priceM" placeholder="Prix">&nbsp;€
							  	</td>
							 </tr>
						  	 <tr>
							  	<th colspan="2">Statut</th><th colspan="2">Energie</th>
							  </tr>
							  <tr>
								<td colspan="2">
								  	<select v-model="selectedstatut">
									    <option v-for="option in optionsstatut" v-bind:value="option.index">
									      {{ option.statut }}
									    </option>
								  	</select>
							  	</td>
								<td colspan="2">
								  	<select v-model="selectedclassenergy">
									    <option v-for="option in optionsclassenergy" v-bind:value="option.index">
									      {{ option.classenergy }}
									    </option>
								  	</select>
								</td>								
							</tr>

							 <tr>
							  	<td colspan="4">
						  			<textarea v-model="textdescription" placeholder="Ajoutez la description du bien"></textarea>
						  		</td>
				  			</tr>
							 <tr>
							  	<td colspan="4">
							  		<input type="checkbox" id="authorisationRgpdProperty" name="authorisationRgpdProperty">J’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m'envoyer des emails.</input>
  									<br> 
								    <button v-if="addPropertyDisabled" class="button_nav_disabled">Ajouter le bien</button>		
						  			<button v-else class="button_realestate" v-on:click="actionProperty('addProperty')">Ajouter le bien</button>
								    &nbsp;&nbsp; 
								    <button v-if="updatePropertyDisabled" class="button_nav_disabled">Sauver les modifications</button>
								    <button v-else class="button_realestate" v-on:click="actionProperty('updateProperty')">Sauver les modifications</button>
								    <br>
								    <button class="button_realestate margin-top-small" v-on:click="showShareFbRealEstate()">Afficher la page de partage Facebook</button>
								    <br>Photos&nbsp;&nbsp;<input v-bind:disabled="inputFileDisabled" type="file" @change="onFileChanged" title="Photo de taille maxi 5 mo, de préférence 600x400 temps de raffraichissement 1h">	   
								    <br>Raffraichissement 1h
								    <br>
									<b v-if="messageRed" class="red">{{ message }}</b>
									<b v-else class="green">{{ message }}</b>
						  		</td>
							</tr>	
							</table>





							<table>
							<tr>
							  	<td colspan="4">
							<span class="ligne" v-show="delImg1">
					       		<img alt="" id="img1" v-bind:src="img1" v-show="img1 != '#'" class="imgSmall"><br>
					       		<button v-show="delImg1Button" class="button_realestate" v-on:click="deletePhoto(1)">Supprimer</button>
					       	</span>
					       	<span class="ligne" v-show="delImg2">
					       		<img alt="" id="img2" v-bind:src="img2" class="imgSmall" v-show="img2 != '#'"><br>
					       		<button v-show="delImg2Button" class="button_realestate" v-on:click="deletePhoto(2)">Supprimer</button>
					       	</span>
				       		<span class="ligne" v-show="delImg3">
					       		<img alt="" id="img3" v-bind:src="img3" class="imgSmall" v-show="img3 != '#'"><br>
					       		<button v-show="delImg3Button" class="button_realestate" v-on:click="deletePhoto(3)">Supprimer</button>
					       	</span>
					       	<span class="ligne" v-show="delImg4">
					       		<img alt="" id="img4" v-bind:src="img4" class="imgSmall" v-show="img4 != '#'"><br>
					       		<button v-show="delImg4Button" class="button_realestate" v-on:click="deletePhoto(4)">Supprimer</button>
					       	</span>
					       	<span class="ligne" v-show="delImg5">
					       		<img alt="" id="img5" v-bind:src="img5" class="imgSmall" v-show="img5 != '#'"><br>
					       		<button v-show="delImg5Button" class="button_realestate" v-on:click="deletePhoto(5)">Supprimer</button>
					       	</span>
					       	<span class="ligne" v-show="delImg6">
					       		<img alt="" id="img6" v-bind:src="img6" class="imgSmall" v-show="img6 != '#'"><br>
					       		<button v-show="delImg6Button" class="button_realestate" v-on:click="deletePhoto(6)">Supprimer</button>					       		
					       	</span>
					   </td>
					</tr><!--	-->
					       		 							    
					</table>
				  		</td>
					<td></td>
					</tr>
					</table>
				  	</div>
				  	
						<div id="todo-list-example" v-cloak>
						  <table>
						  	<tr>
						  		<th></th><th>Type bien</th><th>Piè</th><th>m2</th><th>Ville</th><th>Prix €</th><th></th>
						  	</tr>
						    <tr v-for="(todo, index) in todos" exact :style="{ cursor: 'pointer'}" v-bind:class="{ active: selected == todo.idrealestate}" v-on:click="selectshowraw(todo, index)">
						    	<td></td>
						    <!--	<td>{{ todo.idrealestate }}</td>-->
						    	<td>{{ todo.typeproperty }}</td>
							    <td>{{ todo.room }}</td>
							<!--    <td>{{ todo.bedroom }}</td>-->
							    <td>{{ todo.surface }}</td>
							    <td>{{ todo.city }}</td>
							 <!--   <td>{{ todo.cp }}</td>-->
							    <td>{{ todo.price }}</td>
							<!--    <td>{{ todo.viewcount }} </td>-->
							    <td><button class="button_realestate" v-on:click="existOwnerPropertyDelete(todo.idrealestate)">Sup</button></td>
							    <td></td>
						    </tr>
						  </table>
						</div>



			    <table>
		    	<?php if ( $linkPromoOn) { ?> 
				<tr><td></td>
					<td align="left">			
					<a href='https://votre-agence.immo-fr.fr/'>Votre site agence WordPress gratuit&nbsp;&nbsp;&nbsp;</a>				
					<a href='https://apps.facebook.com/logicielimmobilierfr/'>Application Facebook de gestion des sites&nbsp;&nbsp;&nbsp;</a>
					<a href='https://fr.wordpress.org/plugins/real-estate-agency/'>Plugin WordPress site Web et logiciel immo</a>
					</td>
				<td></td>
				</tr>
				<?php } ?>
				<tr><td></td>
				<td>
					<?php
						echo '&nbsp;&nbsp;<a class="linkUnderline" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a>';
						echo '&nbsp;&nbsp;<a rel="nofollow" class="linkUnderline" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a><br>';
					?>
					<a href='https://immobilier-fr.fr/'>Propulsé by immmobilier-fr.fr </a>	
				</td><td></td></tr>
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
</div>
<!--</div>
</div>-->
<?php } ?>	



<script type="text/javascript">
	//	vmproperty.delImg1 = true;
/*	document.getElementById("idSelectedproperty").disabled = true;
	document.getElementById("idSelectedroom").disabled = true;
	document.getElementById("idSelectedbedroom").disabled = true;
	document.getElementById("surface").disabled = true;
	document.getElementById("landsize").disabled = true;
	document.getElementById("idSelectedfloor").disabled = true;
	document.getElementById("price").disabled = true;
	document.getElementById("city").disabled = true;
	document.getElementById("cp").disabled = true;
	document.getElementById("idSelectedcountry").disabled = true;
	document.getElementById("idSelectedstatut").disabled = true;
	document.getElementById("idSelectedclassenergy").disabled = true;
	document.getElementById("idtextdescription").disabled = true;
*/
/*	document.getElementById("idSelectedpropertyM").disabled = true;
	document.getElementById("idSelectedroomM").disabled = true;
	document.getElementById("idSelectedbedroomM").disabled = true;
	document.getElementById("surfaceM").disabled = true;
	document.getElementById("landsizeM").disabled = true;
	document.getElementById("idSelectedfloorM").disabled = true;
	document.getElementById("priceM").disabled = true;
	document.getElementById("cityM").disabled = true;
	document.getElementById("cpM").disabled = true;
	document.getElementById("idSelectedcountryM").disabled = true;
	document.getElementById("idSelectedstatutM").disabled = true;
	document.getElementById("idSelectedclassenergyM").disabled = true;
	document.getElementById("idtextdescriptionM").disabled = true;
*/
//	document.getElementById("message").style.color = "red";
//	document.getElementById("messageMobileHead").style.color = "red";
//	document.getElementById("messageM").style.color = "red";

	document.getElementById("paragraphResultAgency").style.display = "none";
  	document.getElementById("paragraphRenderFuncAgency").disabled = true;

 // 	document.getElementById("msgloginshow").style.display = 'none';

		var keyImageMsc = "";
	     var numImageSelected = '';
	     var maxWidth = 600, maxHeight = 400;
	     var fileReaderPhotoAgency = new FileReader();
	     var filterType = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

	     fileReaderPhotoAgency.onload = function (event) {
	       var image = new Image();

	       image.onload=function(){
	        //   document.getElementById("img1").src=image.src;
	           var canvas=document.createElement("canvas");
	           var context=canvas.getContext("2d");

	           var imageWidth = image.width,
	               imageHeight = image.height;         
	           
	     	    if (imageWidth > imageHeight) {
	     	      if (imageWidth > maxWidth) {
	     	        imageHeight *= maxWidth / imageWidth;
	     	        imageWidth = maxWidth;
	     	      }
	     	    }
	     	    else {
	     	      if (imageHeight > maxHeight) {
	     	        imageWidth *= maxHeight / imageHeight;
	     	        imageHeight = maxHeight;
	     	      }
	     	    }
	           canvas.width=imageWidth;
	           canvas.height=imageHeight;
	           
	           context.drawImage(image,
	               0,
	               0,
	               canvas.width,
	               canvas.height
	           );

	        //   document.getElementById("img1").src = canvas.toDataURL('image/jpeg', 0.5);
	          
	           canvas.toBlob(function(blob) {
	         	    var file = new File([blob], "realestate.jpg", {
	         	    	  type: "image/jpeg",
	         	    	});
	                 vmproperty.uploadPhotoAgency(file);
	         	  }, 'image/jpeg', 0.5);
	           
	       }
	       image.src=event.target.result;
	     };
	     
	     


		 var keyImageMsc = "";
	     var numImageSelected = '';
	     var maxWidth = 600, maxHeight = 400;
	     var fileReader = new FileReader();
	     var filterType = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

	     fileReader.onload = function (event) {
	       var image = new Image();

	       image.onload=function(){
	        //   document.getElementById("img1").src=image.src;
	           var canvas=document.createElement("canvas");
	           var context=canvas.getContext("2d");

	           var imageWidth = image.width,
	               imageHeight = image.height;         
	           
	     	    if (imageWidth > imageHeight) {
	     	      if (imageWidth > maxWidth) {
	     	        imageHeight *= maxWidth / imageWidth;
	     	        imageWidth = maxWidth;
	     	      }
	     	    }
	     	    else {
	     	      if (imageHeight > maxHeight) {
	     	        imageWidth *= maxHeight / imageHeight;
	     	        imageHeight = maxHeight;
	     	      }
	     	    }
	           canvas.width=imageWidth;
	           canvas.height=imageHeight;
	           
	           context.drawImage(image,
	               0,
	               0,
	               canvas.width,
	               canvas.height
	           );

	        //   document.getElementById("img1").src = canvas.toDataURL('image/jpeg', 0.5);
	          
	           canvas.toBlob(function(blob) {
	         	    var file = new File([blob], "realestate.jpg", {
	         	    	  type: "image/jpeg",
	         	    	});
	                 vmproperty.uploadPhoto(file);
	         	  }, 'image/jpeg', 0.5);
	           
	       }
	       image.src=event.target.result;
	     };
	     
	     
	     
	     var maxWidthSmall = 350, maxHeightSmall = 250;
	     var fileReaderSmall = new FileReader();
	  //   var filterType = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

	     fileReaderSmall.onload = function (event) {
	       var image = new Image();
	       
	       image.onload=function(){
	       //    document.getElementById("original-Img").src=image.src;
	           var canvas=document.createElement("canvas");
	           var context=canvas.getContext("2d");
	           
	           var imageWidth = image.width,
	               imageHeight = image.height;         
	           
	     	    if (imageWidth > imageHeight) {
	     	      if (imageWidth > maxWidthSmall) {
	     	        imageHeight *= maxWidthSmall / imageWidth;
	     	        imageWidth = maxWidthSmall;
	     	      }
	     	    }
	     	    else {
	     	      if (imageHeight > maxHeightSmall) {
	     	        imageWidth *= maxHeightSmall / imageHeight;
	     	        imageHeight = maxHeightSmall;
	     	      }
	     	    }

	           canvas.width=imageWidth;
	           canvas.height=imageHeight;
	           
	           context.drawImage(image,
	               0,
	               0,
	               canvas.width,
	               canvas.height
	           );
	                   
	       //    document.getElementById("upload-Preview").src = canvas.toDataURL('image/jpeg', 0.5);
	          
	           canvas.toBlob(function(blob) {
	         	    var file = new File([blob], "realestate.jpg", {
	         	    	  type: "image/jpeg",
	         	    	});
	                 vmproperty.uploadPhotoSmall(file);
	         	  }, 'image/jpeg', 0.5);
	           
	       }
	       image.src=event.target.result;
	     };
	
</script>

<script type="text/javascript">

	var example1 = new Vue({
	  el: '#example-1',
	  data: {
	    items: [
	      { message: 'Foo' },
	      { message: 'Bar' }
	    ]
	  }
	})

vmproperty = new Vue({
  el: '#realestateproperty',
  data: {
  	fieldsPropertiesDisabled: true,
  	message: 'Connectez-vous pour ajouter un bien',
  	msgaccount: "",
  	msgaccountok: true,
  	connected: false,
  	button_save_modif_accountok: true,
  	button_cancel_modif_accountok: true,
  	button_modif_accountok: true,
  	button_update_passwordok: true,
  	button_delete_accountok: true,
  	validationcreateaccount: false,
  	buttoncreatemodifaccount: true,
  	createaccountbuttonform: true,
  	modifaccountbuttonform: false,
  	createaccount: false,
  	modifaccount:false,
  	msgloginshow: false,
  	msgloginshowM: false,
  	messageRed: true,
  	addPropertyDisabled: true,
  	updatePropertyDisabled: true,
  	inputFileDisabled: true,
  	selectedSyndicate: '0',
  	img1Account: '',
  	delImg1Account: false,
  	delImg1AccountButton: false,
  	account:
	  {idClient: '',
	   idc: '',
	   agency: "",
	   lastName: "",
	   firstName: "",
	   email: "",
	   phone: "",
	   address: "",
	   city: "",
	   cp: "",
	   country: "",
	   pwd: "",
	   emailad: "",
	   fax: "",
	   numAgent: "",
	   urlBaseSiteWeb: "",
	   urlBaseBlog: "",
	   urlBasePageFaceBook:"",
	   urlAccessMapAgency:"",
	   descriptionAgency: "",
	   urlBaseServerApp: '',
	   urlBaseAccount: '',
	   masterAgency: '',
	   groupAgency: '',
	   netWork1: '',
	   netWork2: '',
	   netWork3: '',
	   idPageAgency: '',
	   idGroupAgency: '',
	   idPageNetWork1: '',
	   urlphotoAccount1: '',
	   keyImage1: ''
	},
  	syndicates: [
	  {syndicate: "Autre", index: 0},
	  {syndicate: "SNPI", index: 1},
      {syndicate: "Fnaim", index: 2}
    ],
  	selectedproperty: '1',
    optionsproperty: [
      {typeProperty: "Choisissez", index: 0},
		 {typeProperty: "Appartement", index: 1},
		 {typeProperty: "Maison", index: 2},
		 {typeProperty: "Villa", index: 3},
		 {typeProperty: "Ferme", index: 4},
		 {typeProperty: "Propriété", index: 5},
		 {typeProperty: "Hôtel particulier", index: 6},
		 {typeProperty: "Château", index: 7},
		 {typeProperty: "Chalet", index: 8},
		 {typeProperty: "Loft", index: 9},
		 {typeProperty: "Atelier", index: 10},
		 {typeProperty: "Terrain", index: 11},
		 {typeProperty: "Bureaux", index: 12},
		 {typeProperty: "Commerce", index: 13},
		 {typeProperty: "Locaux", index: 14},
		 {typeProperty: "Immeuble", index: 15},
		 {typeProperty: "Parking", index: 16},
		 {typeProperty: "Viager", index: 17},
		 {typeProperty: "Autre", index: 100}
    ],
    surface: '1',
    optionsroom: [
      	{room: "0", index: 0},
        {room: "1", index: 1},
	    {room: "2", index: 2},
	    {room: "3", index: 3}, 
		{room: "4", index: 4},
		{room: "5", index: 5},
		{room: "6", index: 6},
		{room: "7", index: 7},
		{room: "8", index: 8},
		{room: "9", index: 9},
		{room: "10", index: 10},
		{room: "11", index: 11},
		{room: "12", index: 12},
		{room: "13", index: 13},
		{room: "14", index: 14},
		{room: "15", index: 15},
		{room: "16", index: 16},
		{room: "17", index: 17},
		{room: "18", index: 18},
		{room: "19", index: 19},
		{room: "20", index: 20},
		{room: ">20", index: 100}
    ],
    selectedroom: '0',
    optionsbedroom: [
      	{bedroom: "0", index: 0},
        {bedroom: "1", index: 1},
	    {bedroom: "2", index: 2},
	    {bedroom: "3", index: 3}, 
		{bedroom: "4", index: 4},
		{bedroom: "5", index: 5},
		{bedroom: "6", index: 6},
		{bedroom: "7", index: 7},
		{bedroom: "8", index: 8},
		{bedroom: "9", index: 9},
		{bedroom: "10", index: 10},
		{bedroom: "11", index: 11},
		{bedroom: "12", index: 12},
		{bedroom: "13", index: 13},
		{bedroom: "14", index: 14},
		{bedroom: "15", index: 15},
		{bedroom: "16", index: 16},
		{bedroom: "17", index: 17},
		{bedroom: "18", index: 18},
		{bedroom: "19", index: 19},
		{bedroom: "20", index: 20},
		{bedroom: ">20", index: 100}
    ],
    selectedbedroom: '0',
    city: '',
    cp: '',
    price: '',
    landsize: '',
    optionsfloor: [
      	{floor: "0", index: 0},
        {floor: "1", index: 1},
	    {floor: "2", index: 2},
	    {floor: "3", index: 3}, 
		{floor: "4", index: 4},
		{floor: "5", index: 5},
		{floor: "6", index: 6},
		{floor: "7", index: 7},
		{floor: "8", index: 8},
		{floor: "9", index: 9},
		{floor: "10", index: 10},
		{floor: "11", index: 11},
		{floor: "12", index: 12},
		{floor: "13", index: 13},
		{floor: "14", index: 14},
		{floor: "15", index: 15},
		{floor: "16", index: 16},
		{floor: "17", index: 17},
		{floor: "18", index: 18},
		{floor: "19", index: 19},
		{floor: "20", index: 20},
		{floor: ">20", index: 100}
    ],
    selectedfloor: '0',
    optionscountry: [
      	{country: "France", index: 0}
    ],
    selectedcountry: '0',
    optionsstatut: [
      	{statut: "A vendre", index: 0},
     	{statut: "Vendu", index: 1}
    ],
    selectedstatut: '0',
    optionsclassenergy: [
      	{classenergy: "Classe Energie", index: 0},
	    {classenergy: "0 - 50 classe A", index: 1},
		{classenergy: "51 - 90 classe B", index: 2},
		{classenergy: "91 - 150 classe C", index: 3},
		{classenergy: "151 - 230 classe D", index: 4},
		{classenergy: "231 - 330 classe E", index: 5},
		{classenergy: "331 - 450 classe F", index: 6},
		{classenergy: "> 450 classe G", index: 7}
    ],
    selectedclassenergy: '0',
    textdescription: '',
    keyImageMsc: '',
    selectedFile: null,
    delImg1: null,
    delImg2: null,
    delImg3: null,
    delImg4: null,
    delImg5: null,
    delImg6: null,
    delImg1Button: null,
    delImg2Button: null,
    delImg3Button: null,
    delImg4Button: null,
    delImg5Button: null,
    delImg6Button: null,
    img1: '#',
    img2: '#',
    img3: '#',
    img4: '#',
    img5: '#',
    img6: '#',
    urlphoto1: '',
    urlphoto2: '',
    urlphoto3: '',
    urlphoto4: '',
    urlphoto5: '',
    urlphoto6: '',
    keyimage1: '',
    keyimage2: '',
    keyimage3: '',
    keyimage4: '',
    keyimage5: '',
    keyimage6: '',
    img1FB: '',
    img2FB: '',
    img3FB: '',
    img4FB: '',
    img5FB: '',
    img6FB: '',
    keyimage1: '',
    keyimage2: '',
    keyimage3: '',
    keyimage4: '',
    keyimage5: '',
    keyimage6: '',
    dataProperty: 
      	{service : 'putProperty',
      		keyProperty: '',
			login : '',
			emailAd : '', //profile.emailAd,
			pwdCripted : '', //profile.pwdCripted,
			keyCustomer : '', //profile.keyCustomer,
			idc : '', //profile.idc,
			urlBaseServerApp : '', //profile.urlBaseServerApp,
			urlBaseAccount : '', //profile.urlBaseAccount,
			account : '', //profile.lastName + " " + profile.firstName,
			agency : '', //profile.agency,
			phoneAgency : '', //profile.phone,
			cityAgency : '', //profile.city,
			cpAgency : '', //profile.cp,
			nameAgency : '', //profile.lastName,
			firstNameAgency : '', //profile.firstName,
			idFacebookAccount : '', //profile.idFacebook,
			addressAgency : '', //profile.address,
			faxAgency : '', //profile.fax,
			urlBaseBlogAgency : '', //profile.urlBaseBlog,
			urlBasePageFaceBookAgency : '', //profile.urlBasePageFaceBook,
			urlBaseSiteWebAgency : '', //profile.urlBaseSiteWeb,
			syndicateAgency : '', //profile.syndicate,
		
			agencyGroup : '', //profile.agencyGroup,	
			keyMasterAgency : '', //keyMasterAgency,
			keyMasterGroup : '', //keyMasterGroup,
			keyMasterNetWork1 : '', //keyMasterNetWork1,
			keyMasterNetWork2 : '', //profile.keyMasterNetWork2,
			keyMasterNetWork3 : '', //profile.keyMasterNetWork3,			
			typeProperty : '', //this.optionsproperty[this.selectedproperty].typeProperty, //$scope.typeProperty,
			indexTypeProperty : '0', //this.selectedproperty, //$scope.indexTypeProperty,
			surface : '0', //surface, //$scope.surface,
			room : '0', //this.optionsroom[this.selectedroom].room, //$scope.room,
			bedroom : '0', //this.optionsbedroom[this.selectedbedroom].bedroom, //$scope.bedroom,
			city : '', //city, //$scope.city,
			cp : '', //cp, //$scope.cp,
			price : '0', //price, //$scope.price,
			currency : 'Euro', //$scope.currency,
			indexCurrency : '0', //$scope.indexCurrency,
			bid : '0', //$scope.bid,
			landsize : '0', //landsize, //$scope.landsize,
			floors : '0', //this.selectedfloor.toString(), //$scope.indexFloor,
			country : '', //this.optionscountry[this.selectedcountry].country, //$scope.country,
			indexCountry : '0', //this.selectedcountry, // $scope.indexCountry
			typemandate : 'Simple', //$scope.typemandate,
			indexTypemandate : '0', //$scope.indexTypemandate,
			nummandate : '0', //$scope.nummandate,
			honorary : '0', //$scope.honorary,
			annuity : '0', //$scope.annuity,
			status : '', //this.optionsstatut[this.selectedstatut].statut, //$scope.status,
			indexListstatus : '0', //this.selectedstatut, //$scope.indexListstatus,
			typeBusiness : 'Vente', //$scope.typeBusiness,
			indexListsTypeBusiness : '0', //$scope.indexListsTypeBusiness,
			indexState : '0', //$scope.indexState,
			state : 'Standard', //$scope.state,
			indexOccupied : '0', //$scope.indexOccupied,		Libre		
			indexClassEnergy : '0', //this.selectedclassenergy.toString(), //$scope.indexClassEnergy,
			saledate : '0', //$scope.saledate,
				
			transfert1 : 'false', //$scope.transfert1,
			transfert2 : 'false', //$scope.transfert2,
			transfert3 : 'false', //$scope.transfert3,
			transfert4 : 'false', //$scope.transfert4,
			transfert5 : 'false', //$scope.transfert5,
			equippedkitchen : 'false', //$scope.equippedkitchen,
			cellar : 'false', //$scope.cellar,
			garage : 'false', //$scope.garage,
			parking : 'false', //$scope.parking,
			closedparking : 'false', //$scope.closedparking,
			balcony : 'false', //$scope.balcony,
			atticfittedout : 'false', //$scope.atticfittedout,
			attic : 'false', //$scope.attic,
			terrace : 'false', //$scope.terrace,
			garden : 'false', //$scope.garden,
			swimmingpool : 'false', //$scope.swimmingpool,
			chimney : 'false', //$scope.chimney,
			parquet : 'false', //$scope.parquet,
			independenttoilet : 'false', //$scope.independenttoilet,
			airconditioning : 'false', //$scope.airconditioning,
			elevator : 'false', //$scope.elevator,
			renovated : 'false', //$scope.renovated,
			cupboard : 'false', //$scope.cupboard,
			bathroom : 'false', //$scope.bathroom,
			shower : 'false', //$scope.shower,
			attica : 'false', //$scope.attica,
			keeper : 'false', //$scope.keeper,
			intercom : 'false', //$scope.intercom,
			digicode : 'false', //$scope.digicode,
			alarm : 'false', //$scope.alarm,
			gas : 'false', //$scope.gas,
			floorheating : 'false', //$scope.floorheating,
			fuel : 'false', //$scope.fuel,
			centralcollective : 'false', //$scope.centralcollective,
			individual : 'false', //$scope.individual,
			electric : 'false', //$scope.electric,
			solar : 'false', //$scope.solar,
			geothermal : 'false', //$scope.geothermal,
			aerothermal : 'false', //$scope.aerothermal,
			south : 'false', //$scope.south,
			east : 'false', //$scope.east,
			north : 'false', //$scope.north,
			west : 'false', //$scope.west,
			beautifulview : 'false', //$scope.beautifulview,
			withoutopposite : 'false', //$scope.withoutopposite,
			textDescription : '', //this.textdescription, //$scope.textDescription,
			favorite : 'false', //$scope.favorite,
			addressProperty : '', //$scope.addressProperty,
			keyDoorProperty : '', //$scope.keyDoorProperty,
			digiCodeProperty : '' //$scope.digiCodeProperty
		}

  },
	
    methods: {  //selectedproperty

		showShareFbRealEstate (){  
			try{
				var typeProperty = this.optionsproperty[this.selectedproperty].typeProperty;
				var city = this.city;
				var cp = this.cp;
				
				var urlPage = '/vente/' + typeProperty + '/' + city + '-' + cp + '/' + vmproperty.dataProperty.keyProperty +  '/';
			
				 ///vente/chalet/courcheval-73120/315-1552904642904/				 

				urlPage = urlPage.replace(/ /g, "-");
				urlPage = location.protocol + '//' + location.hostname + urlPage.toLowerCase();
			//	alert('urlPage ' + urlPage);
				window.open(urlPage, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes");
			    //location.replace(encodeURI(urlPage));
				
			}catch (e) {
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'shareFbRealEstate ' + e.message;
			}
    	},
    	paragraphResultFunc (paragrah){	
		  var x = document.getElementById("paragraphEditor" + paragrah);
		  x.style.display = "none";
		  document.getElementById("paragraphResultFunc" + paragrah).disabled = true;
		  var x = document.getElementById("paragraphResult" + paragrah);
		  x.style.display = "block";
		  document.getElementById("paragraphRenderFunc"  + paragrah).disabled = false;
		  document.getElementById("paragraphResult" + paragrah).value = document.getElementById("paragraphEditor" + paragrah).innerHTML;
		},
		paragraphRenderFunc (paragrah){	
		  var x = document.getElementById("paragraphResult" + paragrah);
		  x.style.display = "none";
		  document.getElementById("paragraphRenderFunc" + paragrah).disabled = true;
		  var x = document.getElementById("paragraphEditor" + paragrah);
		  x.style.display = "block";
		  document.getElementById("paragraphResultFunc" + paragrah).disabled = false;
		  document.getElementById("paragraphEditor" + paragrah).innerHTML = document.getElementById("paragraphResult" + paragrah).value;
		},
		commande (nom, argument){	
		  if (typeof argument === 'undefined') {
			    argument = '';
			  }
			  switch (nom) {
			    case "createLink":
			      argument = prompt("Quelle est l'adresse du lien ?");
			      break;
			    case "insertImage":
			      argument = prompt("Quelle est l'adresse de l'image ?");
			      break;
			  }
			  // Exécuter la commande
			  document.execCommand(nom, false, argument);
		},
		updateAccount (mobile) {
			
			if (mobile == 'mobile'){
				if (document.getElementById('authorisationRgpdUpdateMobile').checked == false){
					vmproperty.msgaccountok = false;
					vmproperty.msgaccount = 'Vous devez cocher J\’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m\'envoyer des emails.';
					return;
				}
			}else{
				if (document.getElementById('authorisationRgpdUpdate').checked == false){
					vmproperty.msgaccountok = false;
					vmproperty.msgaccount = 'Vous devez cocher J\’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m\'envoyer des emails.';
					return;
				}
			}
			vmproperty.msgaccountok = true;
    		vmproperty.msgaccount = '';
    		var patternNum = /^\d+$/;
    		var patternString = /[|<|,|>|\/|"|{|\[|}|\]|\||\\|~|`|!|@|#|\$|%|\^|&|\*|\(|\)|_|=]+/;
    		if (this.agencyUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom de l\'agence doit être renseigné ';
				return;
			}
			if (this.agencyUpdate.length < 3){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom de l\'agence doit comporter 3 cars minimum ';
				return;
			}
			if (this.agencyUpdate.length > 30){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom de l\'agence doit comporter 30 cars maximum ';
				return;
			}			
			if( this.agencyUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom de l\'agence doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.lastNameUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom doit être renseigné ';
				return;
			}
			if (this.lastNameUpdate.length < 3){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom doit comporter 3 cars minimum ';
				return;
			}
			if (this.lastNameUpdate.length > 30){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom doit comporter 30 cars maximum ';
				return;
			}			
			if( this.lastNameUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le nom doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.firstNameUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le prénom doit être renseigné ';
				return;
			}
			if (this.firstNameUpdate.length < 3){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le prénom doit comporter 3 cars minimum ';
				return;
			}
			if (this.firstNameUpdate.length > 30){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le prénom doit comporter 30 cars maximum ';
				return;
			}			
			if( this.firstNameUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le prénom doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.emailUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email doit être renseigné ';
				return;
			}
			if (this.emailUpdate.length < 6){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email doit comporter 3 cars minimum ';
				return;
			}
			if (this.emailUpdate.length > 70){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email doit comporter 70 cars maximum ';
				return;
			}			
			if (!validateEmail(this.emailUpdate)) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email n\'est pas valide';
				return;
		    }

		    if (this.phoneUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le téléphone doit être renseigné ';
				return;
			}
			if (this.phoneUpdate.length < 10){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le téléphone doit comporter 10 digits ';
				return;
			}
			if (this.phoneUpdate.length > 14){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le téléphone doit comporter 10 digits ';
				return;
			}			
			
			if (this.addressUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'adresse doit être renseigné ';
				return;
			}
			if (this.addressUpdate.length < 3){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'adresse doit comporter 3 cars minimum ';
				return;
			}
			if (this.addressUpdate.length > 70){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'adresse doit comporter 70 cars maximum ';
				return;
			}			
			if( this.addressUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'adresse doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.cityUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'La ville doit être renseigné ';
				return;
			}
			if (this.cityUpdate.length < 3){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'La ville doit comporter 3 cars minimum ';
				return;
			}
			if (this.cityUpdate.length > 30){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'La ville doit comporter 30 cars maximum ';
				return;
			}			
			if( this.cityUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'La ville doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.cpUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le code postal doit être renseigné ';
				return;
			}
			if (this.cpUpdate.length < 5){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le code postal doit comporter 5 cars minimum ';
				return;
			}
			if (this.cpUpdate.length > 5){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le code postal doit comporter 5 cars maximum ';
				return;
			}			
			if( patternNum.test( this.cpUpdate ) == false ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le code postal doit être numérique';
				return;
		    }

		    if (this.emailadUpdate == ''){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email doit être renseigné ';
				return;
			}
			if (this.emailadUpdate.length < 6){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email doit comporter 3 cars minimum ';
				return;
			}
			if (this.emailadUpdate.length > 70){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email doit comporter 70 cars maximum ';
				return;
			}			
			if (!validateEmail(this.emailadUpdate)) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'email n\'est pas valide';
				return;
		    }


		
			if (this.faxUpdate.length > 14){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le fax doit comporter 14 cars maximum ';
				return;
			}			
			if( this.faxUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le fax doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.numAgentUpdate.length > 10){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le numéro d\'agent doit comporter 20 cars maximum ';
				return;
			}			
			if( this.numAgentUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le numéro d\'agent doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.urlBaseSiteWebUpdate.length > 200){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url site web doit comporter 200 cars maximum ';
				return;
			}			
			if( this.urlBaseSiteWebUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url site web doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.urlBaseBlogUpdate.length > 200){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url blog doit comporter 200 cars maximum ';
				return;
			}			
			if( this.urlBaseBlogUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url blog doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.urlBasePageFaceBookUpdate.length > 200){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url page Facebook doit comporter 200 cars maximum ';
				return;
			}			
			if( this.urlBasePageFaceBookUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url page Facebook doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    if (this.urlAccessMapAgencyUpdate.length > 200){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url access map agence doit comporter 200 cars maximum ';
				return;
			}			
			if( this.urlAccessMapAgencyUpdate.match( patternString ) != null ) {
		        vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'L\'url access map agence doit être une chaine caractères sans caractères spéciaux';
				return;
		    }

		    var textDescriptionAgency = document.getElementById("paragraphEditorAgency").innerHTML;
		     if (textDescriptionAgency.length > 1500){
				vmproperty.msgaccountok = false;
				vmproperty.msgaccount = 'Le text description doit comporter 1500 cars maximum ';
				return;
			}	


		    textDescriptionAgency = textDescriptionAgency.replace(/<br>/g, '< br >');
	    	textDescriptionAgency = textDescriptionAgency.replace(/<b>/g, '< b >');
	    	textDescriptionAgency = textDescriptionAgency.replace(/<\/b>/g, '< / b >');
	    		
	    	textDescriptionAgency = textDescriptionAgency.replace(/<i>/g, '< i >');
	    	textDescriptionAgency = textDescriptionAgency.replace(/<\/i>/g, '< / i >');
	    		
	    	textDescriptionAgency = textDescriptionAgency.replace(/<u>/g, '< u >');
	    	textDescriptionAgency = textDescriptionAgency.replace(/<\/u>/g, '< / u >');
	    	
	  		var dataObjectUpdateAccount = {
	 			service : 'updateAccount',
				login : vmproperty.dataProperty.login,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.dataProperty.idc,			
					
				emailAd : this.emailadUpdate,
				agency : this.agencyUpdate,
				address : this.addressUpdate,
				city : this.cityUpdate,
				cp : this.cpUpdate,

				country: this.optionscountry[this.selectedcountry].country,
				indexCountry: this.selectedcountry.toString(),
			
				firstName : this.firstNameUpdate,
				lastName : this.lastNameUpdate,
				fax : this.faxUpdate,
				phone : this.phoneUpdate,
				numAgent : this.numAgentUpdate,

				urlBaseBlog : this.urlBaseBlogUpdate,
				urlBasePageFaceBook : this.urlBasePageFaceBookUpdate,
				urlBaseSiteWeb : this.urlBaseSiteWebUpdate,

				syndicate : this.syndicates[this.selectedSyndicate].syndicate,
				indexSyndicate : this.selectedSyndicate.toString(),

				urlBaseServerApp : vmproperty.account.urlBaseServerApp,
				urlBaseAccount : vmproperty.account.urlBaseAccount,
				
				masterAgency : vmproperty.account.masterAgency,

				group : vmproperty.account.groupAgency,
				netWork1 : vmproperty.account.netWork1,
				netWork2 : vmproperty.account.netWork2,
				netWork3 : vmproperty.account.netWork3,

				descriptionAgency : textDescriptionAgency,
				urlAccessMapAgency : this.urlAccessMapAgencyUpdate,

				idPageAgency : vmproperty.account.idPageAgency,
				idPageGroup : vmproperty.account.idGroupAgency,

				idPageNetWork1 : vmproperty.account.idPageNetWork1,
				idPageNetWork2 : "", 
				idPageNetWork3 : "" 

     		};

	      	var config = {
	                headers : {
	                    'Content-Type': 'application/x-www-form-urlencoded'
	                }
	            }

	      	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
	      	var param = JSON.stringify(dataObjectUpdateAccount);

	        axios.post(urldb, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
		    	if (exitvalue == '0'){
		    		vmproperty.msgaccountok = true;
			    	vmproperty.msgaccount = 'Les modifications de votre compte sont enregistrées ';
			    }else{
			    	vmproperty.msgaccountok = false;
			    	vmproperty.msgaccount = 'Une erreur est survenue, les modifications de votre compte ne sont pas enregistrées ';
			    }
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd field raz." + error;
	          perty.msgaccountok = false;
	          vmproperty.msgaccount = answer;
	        })


    	},
    	openformcreate () {
    		this.createaccount = true;
    		document.getElementById('msgaccount').innerHTML = '';
    	},
    	openformmodif (mobile) {
    		if (mobile == 'mobile'){    			
    			document.getElementById('authorisationRgpdUpdateMobile').checked = false;
    		}else{
    			document.getElementById('authorisationRgpdUpdate').checked = false;
    		}
    		this.modifaccount = true;
    		document.getElementById('msgaccount').innerHTML = '';

    		this.agencyUpdate = vmproperty.account.agency;
    		this.lastNameUpdate = vmproperty.account.lastName;
    		this.firstNameUpdate = vmproperty.account.firstName;
    		this.emailUpdate = vmproperty.account.email;
    		this.phoneUpdate = vmproperty.account.phone;

    		this.addressUpdate = vmproperty.account.address;
    		this.cityUpdate = vmproperty.account.city;
    		this.cpUpdate = vmproperty.account.cp;
    		this.countryUpdate = vmproperty.account.country;
    		 
    		this.emailadUpdate = vmproperty.account.emailad;
    		this.faxUpdate = vmproperty.account.fax;
    		this.numAgentUpdate = vmproperty.account.numAgent;

    		this.urlBaseSiteWebUpdate = vmproperty.account.urlBaseSiteWeb;
    		this.urlBaseBlogUpdate = vmproperty.account.urlBaseBlog;
    		this.urlBasePageFaceBookUpdate = vmproperty.account.urlBasePageFaceBook;
    		this.urlAccessMapAgencyUpdate = vmproperty.account.urlAccessMapAgency;
    		
    		document.getElementById("paragraphEditorAgency").innerHTML = vmproperty.account.descriptionAgency;

    	},
    	closeformmodif () {
    		this.modifaccount = false;
    		this.msgloginshow = false;
    		//document.getElementById("msgloginshow").style.display = 'none';
    		
    	},
    	deleteAccount () {
    		if (vm.todos.length > 0) {
    			vmproperty.msgaccountok = false;
    			vmproperty.msgaccount = 'Vous devez d\'abord supprimer les biens avant de supprimer votre compte';
    			return;
    		}else{
    			if (confirm("Voulez-vous supprimer votre compte agence ?")) { 
           			vmproperty.deleteAccountRecordDb(vmproperty.dataProperty.login);
       			}else{
       				vmproperty.msgaccountok = true;
	    			vmproperty.msgaccount = 'La suppression de votre compte agence est annulée';
       			}
	    		
    		}   		
    	},
    	 deleteAccountRecordDb (idClient) {
	    	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';

	    	var dataObjectDeleteAccount = {
    			service : "deleteAccountPwdAdmin",
				login : vmproperty.dataProperty.login,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.dataProperty.idc,
    			idClient : idClient
    		};

	    	 // axios post
	    	var param = JSON.stringify(dataObjectDeleteAccount);
	        axios.post(urldb, param,
	          {
	            headers: {
	//              'Content-Type': 'application/json'
	//            'Content-Type': 'multipart/form-data'
	            'Content-Type': 'application/x-www-form-urlencoded'
	            }
	          }
	        )
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
		    	if (exitvalue == '0'){
		    		vmproperty.msgaccountok = true;
	    			vmproperty.msgaccount = 'Votre compte agence est supprimé, rafraichissez la page pour créer une nouvelle agence';
	    			if (document.getElementById("btConnexion")) {
	    				document.getElementById("btConnexion").innerHTML = "Vous êtes déconnecté ";
						document.getElementById("btConnexion").style.backgroundColor = "red";
	        			document.getElementById("btConnexion").style.fontWeight = "bold";	
	        		}
	        		vmproperty.addPropertyDisabled = true;
	        		vmproperty.updatePropertyDisabled = true;
	        		vmproperty.inputFileDisabled = true;
	        		vmproperty.connected = false;

	        		vmproperty.dataProperty.login = '';
			    	vmproperty.dataProperty.emailAd = '';
			    	vmproperty.dataProperty.pwdCripted = '';
			    	vmproperty.dataProperty.keyCustomer = '';
			    	vmproperty.dataProperty.idc = '';
			    	vmproperty.dataProperty.urlBaseServerApp = '';
			    	vmproperty.dataProperty.urlBaseAccount = '';
			    	vmproperty.dataProperty.account = '';
			    	vmproperty.dataProperty.agency = '';
			    	vmproperty.dataProperty.phoneAgency = '';
			    	vmproperty.dataProperty.cityAgency = '';
			    	vmproperty.dataProperty.cpAgency = '';
			    	vmproperty.dataProperty.nameAgency = '';
			    	vmproperty.dataProperty.firstNameAgency = '';
			   
			    	vmproperty.dataProperty.addressAgency = '';
			    	vmproperty.dataProperty.faxAgency = '';
			    	vmproperty.dataProperty.urlBaseBlogAgency = '';
			    	vmproperty.dataProperty.urlBasePageFaceBookAgency = '';
			    	vmproperty.dataProperty.urlBaseSiteWebAgency = '';
			    	vmproperty.dataProperty.syndicateAgency = '';
			    	vmproperty.dataProperty.agencyGroup = '';
			    	vmproperty.dataProperty.keyMasterAgency = '';
			    	vmproperty.dataProperty.keyMasterGroup = '';
			    	vmproperty.dataProperty.keyMasterNetWork1 = '';
			    	vmproperty.dataProperty.keyMasterNetWork2 = '';
			    	vmproperty.dataProperty.keyMasterNetWork3 = '';

			    	// Account
			    	vmproperty.account.agency = '';
		    		vmproperty.account.lastName = '';
		    		vmproperty.account.firstName = '';
		    		vmproperty.account.email = '';
		    		vmproperty.account.phone = '';

		    		vmproperty.account.address = '';
		    		vmproperty.account.city = '';
		    		vmproperty.account.cp = '';
		    		vmproperty.account.country = '';
		    		
		    		vmproperty.account.emailad = '';
		    		vmproperty.account.fax = '';
		    		vmproperty.account.numAgent = '';

		    		vmproperty.selectedSyndicate = '';

		    		vmproperty.account.urlBaseServerApp = '';
			    	vmproperty.account.urlBaseAccount = '';

					vmproperty.account.masterAgency = '';

					vmproperty.account.groupAgency = '';
					vmproperty.account.netWork1 = '';
					vmproperty.account.netWork2 = '';
					vmproperty.account.netWork3 = '';

					vmproperty.account.idPageAgency = '';
					vmproperty.account.idGroupAgency = '';
					vmproperty.account.idPageNetWork1 = '';
			    	

		    		vmproperty.account.urlBaseSiteWeb = '';
		    		vmproperty.account.urlBaseBlog = '';
		    		vmproperty.account.urlBasePageFaceBook = '';
		    		vmproperty.account.urlAccessMapAgency = '';

		    		vmproperty.account.descriptionAgency = '';
		    		
		    		vmproperty.button_modif_accountok = false;
		    		vmproperty.button_update_passwordok = false;
		    		vmproperty.button_delete_accountok = false;

	        		vmproperty.button_save_modif_accountok = false;
	        		vmproperty.button_cancel_modif_accountok = false;
			    }else{
			    	vmproperty.messageRed = false;
			    	vmproperty.msgaccount = 'Une erreur est survenue, votre compte n\'est pas supprimé ';
			    }
	        })
	        .catch(function (error) {
	        	vmproperty.msgaccountok = false;
	          	var answer = "Erreur ! Impossible d'accéder à l'API." + error;
	          	vmproperty.msgaccount = answer;
	        })
	    },
    	onFileChanged (event) {
    		var addPhotoOk = false;
    		if (vm.todos[vm.indexselected].urlphoto1 == ''){addPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto2 == ''){addPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto3 == ''){addPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto4 == ''){addPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto5 == ''){addPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto6 == ''){addPhotoOk = true;}

    		if (addPhotoOk == true){
			    this.selectedFile = event.target.files[0];
			    var fileNameSelected = this.selectedFile.name;
	            var fileSizeSelected = this.selectedFile.size;
	            fileReader.readAsDataURL(this.selectedFile);
		    }else{
		    	vmproperty.messageRed = true;
			   	vmproperty.message = 'Vous avez atteint le maximum de 6 photos';
		    }
		  },
		  onFileChangedPhotoAgency (event) {
    		var addPhotoAgencyOk = false;
    		if (vmproperty.account.urlphotoAccount1 == ''){addPhotoAgencyOk = true;}
    		if (addPhotoAgencyOk == true){
			    this.selectedFile = event.target.files[0];
			    var fileNameSelected = this.selectedFile.name;
	            var fileSizeSelected = this.selectedFile.size;
	            fileReaderPhotoAgency.readAsDataURL(this.selectedFile);
		    }else{
		    	vmproperty.msgaccountok = true;
			   	vmproperty.msgaccount = 'Vous avez atteint le maximum de 1 photo';
		    }
		  },
		  updatePhotoRecord(keyimage, urlPhoto){
				if (vm.todos[vm.indexselected].urlphoto1 == ''){vm.todos[vm.indexselected].urlphoto1 = urlPhoto;vm.todos[vm.indexselected].keyimage1 = keyimage;}
				else if (vm.todos[vm.indexselected].urlphoto2 == ''){vm.todos[vm.indexselected].urlphoto2 = urlPhoto;vm.todos[vm.indexselected].keyimage2 = keyimage;}
				else if (vm.todos[vm.indexselected].urlphoto3 == ''){vm.todos[vm.indexselected].urlphoto3 = urlPhoto;vm.todos[vm.indexselected].keyimage3 = keyimage;}
				else if (vm.todos[vm.indexselected].urlphoto4 == ''){vm.todos[vm.indexselected].urlphoto4 = urlPhoto;vm.todos[vm.indexselected].keyimage4 = keyimage;}
				else if (vm.todos[vm.indexselected].urlphoto5 == ''){vm.todos[vm.indexselected].urlphoto5 = urlPhoto;vm.todos[vm.indexselected].keyimage5 = keyimage;}
				else if (vm.todos[vm.indexselected].urlphoto6 == ''){vm.todos[vm.indexselected].urlphoto6 = urlPhoto;vm.todos[vm.indexselected].keyimage6 = keyimage;}
				vm.selectshowraw(vm.todos[vm.indexselected], vm.indexselected);
		  },
		  imageLoad(keyimage, urlPhoto, urlbase) {
		  //	var id = $scope.indexSelectedProperty;
		  	var urlPhoto_s = urlPhoto.replace(/.jpg/g, "-s.jpg");
			if (this.img1 == "#"){
				this.urlphoto1 = urlPhoto;
				this.keyimage1 = keyimage;
				this.img1 = urlPhoto_s;
				this.img1FB = urlPhoto;
			//	$scope.urlBaseImageServer1 = urlBaseImageServer;
				this.keyimage1 = keyimage;
				this.delImg1 = true;
				this.delImg1Button = true;		

				/*
				if (profile.email == "ppatrick500@yahoo.fr"){
					$scope.delImg1Button = true;
		    	}else{
				if ($scope.selectedtypeNetwork.index > 0){   		    		 
					$scope.delImg1Button = false;
		    	 }else{
		 			$scope.delImg1Button = true;	    		 
		    	 }
		    	}*/
				
			}else if (vmproperty.data.img2 == "#"){
				this.urlphoto2 = urlPhoto;
				this.keyimage2 = keyimage;
				this.img2 = urlPhoto_s;
				this.img2FB = urlPhoto;
				this.keyimage2 = keyimage;
				this.delImg2 = true;	
				this.delImg2Button = true;	  
			}else if (vmproperty.data.img3 == "#"){
				this.urlphoto3 = urlPhoto;
				this.keyimage3 = keyimage;
				this.img3 = urlPhoto_s;
				this.img3FB = urlPhoto;
				this.keyimage3 = keyimage;
				this.delImg3 = true;	  
				this.delImg3Button = true;	
			}else if (vmproperty.data.img4 == "#"){
				this.urlphoto4 = urlPhoto;
				this.keyimage4 = keyimage;
				this.img4 = urlPhoto_s;
				this.img4FB = urlPhoto;
				this.keyimage4 = keyimage;
				this.delImg4 = true;	  
				this.delImg4Button = true;	
			}else if (vmproperty.data.img5 == "#"){
				this.urlphoto5 = urlPhoto;
				this.keyimage5 = keyimage;
				this.img5 = urlPhoto_s;
				this.img5FB = urlPhoto;
				this.keyimage5 = keyimage;
				this.delImg5 = true;	  
				this.delImg5Button = true;	
			}else if (vmproperty.data.img6 == "#"){
				this.urlphoto6 = urlPhoto;
				this.keyimage6 = keyimage;
				this.img6 = urlPhoto_s;
				this.img6FB = urlPhoto;
				this.keyimage6 = keyimage;
				this.delImg6 = true;	
				this.delImg6Button = true;	  
			}
			

		  },
		  imageLoadAccount(urlPhoto) {
		  //	var urlPhoto_s = urlPhoto.replace(/.jpg/g, "-s.jpg");
			if (urlPhoto != ""){
				this.img1Account = urlPhoto;
			//	this.keyimage1 = keyimage;
				this.delImg1Account = true;
				this.delImg1AccountButton = true;	
/*

<span class="ligne" v-show="delImg1Account">
				       		<img alt="" id="img1Account" v-bind:src="img1Account" v-show="img1Account != '#'" class="imgSmall"><br>
				       		<button v-show="delImg1AccountButton" class="button_nav" v-on:click="deletePhotoAccount(1)">Supprimer</button>

*/	  	 						
			}

		  },
		  setFalseRazFieldImage(numimg) {

			if (numimg == 1){vm.todos[vm.indexselected].urlphoto1 = '';vm.todos[vm.indexselected].keyimage1 = '';}
			else if (numimg == 2){vm.todos[vm.indexselected].urlphoto2 = '';vm.todos[vm.indexselected].keyimage2 = '';}
			else if (numimg == 3){vm.todos[vm.indexselected].urlphoto3 = '';vm.todos[vm.indexselected].keyimage3 = '';}
			else if (numimg == 4){vm.todos[vm.indexselected].urlphoto4 = '';vm.todos[vm.indexselected].keyimage4 = '';}
			else if (numimg == 5){vm.todos[vm.indexselected].urlphoto5 = '';vm.todos[vm.indexselected].keyimage5 = '';}
			else if (numimg == 6){vm.todos[vm.indexselected].urlphoto6 = '';vm.todos[vm.indexselected].keyimage6 = '';}			
			vm.selectshowraw(vm.todos[vm.indexselected], vm.indexselected);



			/*	if (numimg == 1){
				this.img1 = "#";
				this.urlphoto1 = '';
				this.keyimage1 = '';
				this.img1FB = '';
				this.keyimage1 = '';
				this.delImg1 = false;
				this.delImg1Button = false;			
			}else if (numimg == 2){
				this.img2 = "#";
				this.urlphoto2 = '';
				this.keyimage2 = '';
				this.img2FB = '';
				this.keyimage2 = '';
				this.delImg2 = false;
				this.delImg2Button = false;			
			}else if (numimg == 3){
				this.img3 = "#";
				this.urlphoto3 = '';
				this.keyimage3 = '';
				this.img3FB = '';
				this.keyimage3 = '';
				this.delImg3 = false;
				this.delImg3Button = false;			
			}else if (numimg == 4){
				this.img4 = "#";
				this.urlphoto4 = '';
				this.keyimage4 = '';
				this.img4FB = '';
				this.keyimage4 = '';
				this.delImg4 = false;
				this.delImg4Button = false;			
			}else if (numimg == 5){
				this.img5 = "#";
				this.urlphoto5 = '';
				this.keyimage5 = '';
				this.img5FB = '';
				this.keyimage5 = '';
				this.delImg5 = false;
				this.delImg5Button = false;			
			}else if (numimg == 6){
				this.img6 = "#";
				this.urlphoto6 = '';
				this.keyimage6 = '';
				this.img6FB = '';
				this.keyimage6 = '';
				this.delImg6 = false;
				this.delImg6Button = false;			
			}
			*/

		  },
		  deletePhotoAccount(numimg) {
		  	var keyimage = '';
		  	if (numimg == 1){
			  	keyimage = vmproperty.account.keyImage1;
			}else if (numimg == 2){
			  	keyimage = vmproperty.account.keyImage2;
			}else if (numimg == 3){
			  	keyimage = vmproperty.account.keyImage3;
			}
		  	var pathImg = "";			    	
			pathImg = "img-account/img-account-" + vmproperty.account.idc + "/";
		  	var dataObjectDeletePhoto ={
    	    		keyImage : keyimage,
    	    		typeImage : "typeImageAccount",
   	    		 	idc : vmproperty.account.idc,
   	    		 	keyProperty : "",
   	    		 	pathImg : pathImg
   		      }; 
   	 	   	    		
   	    	var config = {
	                 headers : {
	                     'Content-Type': 'application/x-www-form-urlencoded'
	                 }
	             }
	    	var	urlBaseAccount = "https://real-estate-france-db-prod.appspot.com";
	    	var urldbdel = urlBaseAccount + "/deleteimagecloudstoragejson";
	    	var param = JSON.stringify(dataObjectDeletePhoto);

		//	alert('deleteimagecloudstorage B ' + keyimage + ' idc ' + vmproperty.dataProperty.idc);

	    	axios.post(urldbdel, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
			   	var keyimage = response.data.keyimage;
		    	if (exitvalue == '0'){
		    		
		    		vmproperty.msgaccountok = true;
			    	vmproperty.msgaccount = 'La photo à été supprimée';
			    }else{
			    	vmproperty.msgaccountok = false;
			    	vmproperty.msgaccount = 'Une erreur est survenue, la photo n\'est pas supprimée ';
			    }

			    vmproperty.updateRazUrlImageAccount(numimg);
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd." + error;
	          vmproperty.msgaccountok = false;
	          vmproperty.msgaccount = answer;
	        })   	 

		  },		  
		  deletePhoto(numimg) {
		  	var keyimage = '';
		  	if (numimg == 1){
			  	keyimage = vmproperty.keyimage1;
			}else if (numimg == 2){
			  	keyimage = vmproperty.keyimage2;
			}else if (numimg == 3){
			  	keyimage = vmproperty.keyimage3;
			}else if (numimg == 4){
			  	keyimage = vmproperty.keyimage4;
			}else if (numimg == 5){
			  	keyimage = vmproperty.keyimage5;
			}else if (numimg == 6){
			  	keyimage = vmproperty.keyimage6;
			}

		  	var pathImg = "";			    	
			pathImg = "img-realestate/img-realestate-" + vmproperty.dataProperty.idc + "/";
		  	var dataObjectDeletePhoto ={
    	    		keyImage : keyimage,
    	    		typeImage : "typeImageRealestate",
   	    		 	idc : vmproperty.dataProperty.idc,
   	    		 	keyProperty : "",
   	    		 	pathImg : pathImg
   		      }; 
   	 	   	    		
   	    	var config = {
	                 headers : {
	                     'Content-Type': 'application/x-www-form-urlencoded'
	                 }
	             }
	    	var	urlBaseAccount = "https://real-estate-france-db-prod.appspot.com";
	    	var urldbdel = urlBaseAccount + "/deleteimagecloudstoragejson";
	    	var param = JSON.stringify(dataObjectDeletePhoto);

		//	alert('deleteimagecloudstorage B ' + keyimage + ' idc ' + vmproperty.dataProperty.idc);

	    	axios.post(urldbdel, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
			   	var keyimage = response.data.keyimage;
		    	if (exitvalue == '0'){
		    		
		    		vmproperty.messageRed = false;
			    	vmproperty.message = 'La photo à été supprimée';
			    }else{
			    	vmproperty.messageRed = true;
			    	vmproperty.message = 'Une erreur est survenue, la photo n\'est pas supprimée ';
			    }

			    vmproperty.deletePhotoSmall(numimg);
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd." + error;
	          vmproperty.messageRed = true;
	          vmproperty.message = answer;
	        })   	 

		  },
		  deletePhotoSmall(numimg) {
		  	var keyimage = '';
		  	if (numimg == 1){
			  	keyimage = vmproperty.keyimage1;
			}else if (numimg == 2){
			  	keyimage = vmproperty.keyimage2;
			}else if (numimg == 3){
			  	keyimage = vmproperty.keyimage3;
			}else if (numimg == 4){
			  	keyimage = vmproperty.keyimage4;
			}else if (numimg == 5){
			  	keyimage = vmproperty.keyimage5;
			}else if (numimg == 6){
			  	keyimage = vmproperty.keyimage6;
			}

			keyimage = keyimage.replace(/.jpg/g, "-s.jpg");
		  	var pathImg = "";			    	
			pathImg = "img-realestate/img-realestate-" + vmproperty.dataProperty.idc + "/";
		  	var dataObjectDeletePhoto ={
    	    		keyImage : keyimage,
    	    		typeImage : "typeImageRealestate",
   	    		 	idc : vmproperty.dataProperty.idc,
   	    		 	keyProperty : "",
   	    		 	pathImg : pathImg
   		      }; 
   	 	   	    		
   	    	var config = {
	                 headers : {
	                     'Content-Type': 'application/x-www-form-urlencoded'
	                 }
	             }
	    	var	urlBaseAccount = "https://real-estate-france-db-prod.appspot.com";
	    	var urldbdel = urlBaseAccount + "/deleteimagecloudstoragejson";
	    	var param = JSON.stringify(dataObjectDeletePhoto);

	    	axios.post(urldbdel, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
			   	var keyimage = response.data.keyimage;
		    	if (exitvalue == '0'){
		    		vmproperty.messageRed = false;
			    	vmproperty.message = 'La photo à été supprimée';
			    }else{
			    	vmproperty.messageRed = true;
			    	vmproperty.message = 'Une erreur est survenue, la photo n\'est pas supprimée ';
			    }
			  	vmproperty.updateRealEstateFieldsPhoto(vmproperty.dataProperty.keyProperty, numimg);
			    
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd." + error;
	          vmproperty.messageRed = true;
	          vmproperty.message = answer;
	        })   	 

		  },
		  updateUrlImageAccount(keyimage, urlPhoto, numImage) {
		  	var dataObjectUpdateUrlPhoto = {
				service : "updateUrlImageAccount",
				idClient : vmproperty.account.idClient,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.account.idc,	
				numImage: numImage,
				keyimageAccount: keyimage,
				urlphotoAccount: urlPhoto
     		};
	      	var config = {
	                headers : {
	                    'Content-Type': 'application/x-www-form-urlencoded'
	                }
	            }
	      	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
	      	var param = JSON.stringify(dataObjectUpdateUrlPhoto);
	        axios.post(urldb, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
		    	if (exitvalue == '0'){
		    		vmproperty.msgaccountok = true;
			    	vmproperty.msgaccount = 'La photo est enregistrée update url';
			    	vmproperty.account.urlphotoAccount1 = urlPhoto;
			    	vmproperty.account.keyImage1 = keyimage;
			    	vmproperty.imageLoadAccount(urlPhoto);
			    }else if (exitvalue == "3"){  	    		
	  	    		vmproperty.msgaccountok = false;
	  	    		vmproperty.msgaccount = "Vous avez atteint le maximum de photo ";
	  	    	}else{
			    	vmproperty.msgaccountok = false;
			    	vmproperty.msgaccount = 'Une erreur est survenue, la photo n\'est pas enregistrée ';
			    }
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd." + error;
	          vmproperty.msgaccountok = false;
	          vmproperty.msgaccount = answer;
	        })

		  },
		  updateRazUrlImageAccount(numImage) {
		  	var dataObjectUpdateUrlPhoto = {
				service : "updateUrlImageAccount",
				idClient : vmproperty.account.idClient,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.account.idc,	
				numImage: String(numImage),
				keyimageAccount: '',
				urlphotoAccount: ''
     		};
	      	var config = {
	                headers : {
	                    'Content-Type': 'application/x-www-form-urlencoded'
	                }
	            }
	      	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
	      	var param = JSON.stringify(dataObjectUpdateUrlPhoto);
	        axios.post(urldb, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
		    	if (exitvalue == '0'){
		    		vmproperty.msgaccountok = true;
			    	vmproperty.msgaccount = 'La photo et l\'url sont supprimées ';
			    	vmproperty.account.urlphotoAccount1 = '';
			    	vmproperty.account.keyImage1 = '';
			    	vmproperty.delImg1AccountButton = false;
			    	vmproperty.delImg1Account = false;
			    }else{
			    	vmproperty.msgaccountok = false;
			    	vmproperty.msgaccount = 'Une erreur est survenue, la photo n\'est pas supprimée ';
			    }
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd." + error;
	          vmproperty.msgaccountok = false;
	          vmproperty.msgaccount = answer;
	        })

		  },
		  updateUrlPhoto(keyProperty, keyimage, urlPhoto) {
		  	var dataObjectUpdateUrlPhoto = {
     			service : 'updateUrlPhoto',
				login : vmproperty.dataProperty.login,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.dataProperty.idc,			
				keyProperty: keyProperty,
				keyimage: keyimage,
				urlPhoto: urlPhoto,	
				urlBaseImageServer : ""
     		};
	      	var config = {
	                headers : {
	                    'Content-Type': 'application/x-www-form-urlencoded'
	                }
	            }

	      	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
	      	var param = JSON.stringify(dataObjectUpdateUrlPhoto);
	        axios.post(urldb, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
		    	if (exitvalue == '0'){
		    		vmproperty.updatePhotoRecord(keyimage, urlPhoto);
		    	//	vmproperty.imageLoad(keyimage, urlPhoto, "");
		    		vmproperty.messageRed = false;
			    	vmproperty.message = 'La photo est enregistrée url ';
			    }else if (exitvalue == "3"){  	    		
	  	    		vmproperty.messageRed = true;
	  	    		vmproperty.message = "Vous avez atteint le maximum de 6 photos ";
	  	    	}else{
			    	vmproperty.messageRed = true;
			    	vmproperty.message = 'Une erreur est survenue, le bien n\'est pas enregistré ';
			    }
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd." + error;
	          vmproperty.messageRed = true;
	          vmproperty.message = answer;
	        })

	      	/*
	      	$http.post(url, dataObject, config)	    
	      	.success(function(data, status) {
	     		var msgReturn = data.message;
	  	    	var exitvalue = data.exitvalue;	 
	  	    	if (exitvalue == "0"){  
	  	    		$scope.imageLoad(keyimage, urlPhoto, "");
	  	    		$scope.messageclass = "green";
	  	    		$scope.message = "L'image à été enregistrée";  	    		
	  	    	}else if (exitvalue == "3"){  	    		
	  	    		$scope.messageclass = "red";
	  	    		$scope.message = $scope.langtitle.erroroccuredtrylater + " 6 photos maximum ";
	  	    		alert("6 photos maximum");
	  	    	}else{
	  	    		$scope.messageclass = "red";
	  	    		$scope.message = $scope.langtitle.erroroccuredtrylater;
	  	    	}
	  	    })
	  	    .error(function(data, status, headers, config) {
	  	    	$scope.messageclass = "red";
	  	    	 $scope.message = $scope.langtitle.erroroccuredtrylater + " " + status;
	  	    }); */

		  },
		  updateRealEstateFieldsPhoto(keyProperty, numimg) {  
		  //	alert('updateRealEstateFieldsPhoto ' + keyProperty + '  ' + numimg);
		  		var dataObjectUpdateRealEstateFieldsPhoto = {
     			service : 'updateRealEstateFieldsPhoto',
				login : vmproperty.dataProperty.login,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.dataProperty.idc,			
				keyProperty: keyProperty,
				numImage: numimg.toString()				
     		};
	      	var config = {
	                headers : {
	                    'Content-Type': 'application/x-www-form-urlencoded'
	                }
	            }

	      	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
	      	var param = JSON.stringify(dataObjectUpdateRealEstateFieldsPhoto);
	        axios.post(urldb, param, config)
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
		    	if (exitvalue == '0'){
					vmproperty.setFalseRazFieldImage(numimg);
		    		vmproperty.messageRed = false;
			    	vmproperty.message = 'La photo est supprimée ';
			    }else if (exitvalue == "3"){  	    		
	  	    		vmproperty.messageRed = true;
	  	    		vmproperty.message = "Vous avez atteint le maximum de 6 photos ";
	  	    	}else{
			    	vmproperty.messageRed = true;
			    	vmproperty.message = 'Une erreur est survenue, le bien n\'est pas enregistré ';
			    }
	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API upd field raz." + error;
	          vmproperty.messageRed = true;
	          vmproperty.message = answer;
	        })


		  },
		  uploadPhotoAgency(fileImageData) {
		   vmproperty.msgaccount = '';
		    var	urlBaseAccount = "https://real-estate-france-db-prod.appspot.com";// profile.urlBaseAccount; 	
				var numImage = '1';
				var idc = vmproperty.account.idc;
				idc = idc.replace(/ /g, '-');
	    	    try{     		 
			    	 var url = urlBaseAccount + "/uploadimagecloudstorage";
			    	 var urlBaseCloudStorage = "https://storage.googleapis.com/";
			    	 var bucket = "immobilier-fr.fr";
			  //  	 alert("url " + url);
			    	 var keyImage =idc + "-" + numImage;
			    	 keyImage = keyImage.replace(/ /g, "-");
			    	 var pathImg = "";			    	
			    	 pathImg = "img-account/img-account-" + idc + "/";
			    	 var fd = new FormData();        
			    	 fd.append("file",fileImageData);   
			    	 fd.append("keyImage",keyImage);
			    	 fd.append("typeImage","typeImageAccount");
			    	 fd.append("idc",idc);
			    	 fd.append("keyProperty","");
			    	 fd.append("pathImg",pathImg);

					  axios.post(url, fd)
					  .then(function (response) {
				    	var exitvalue = response.data.exitvalue;
			   	    	var keyimage = response.data.keyimage;
			   	    //	vmproperty.keyImageMsc = response.data.keyImageMsc;
				    	if (exitvalue == '0'){
					    	vmproperty.msgaccountok = true;
					    	var urlPhoto = urlBaseCloudStorage + bucket + "/" + pathImg + keyimage;
					    	vmproperty.msgaccount = 'La photo est enregistrée ' + urlPhoto;

					    	vmproperty.updateUrlImageAccount(keyimage, urlPhoto, numImage);
						}else if (exitvalue == "2"){
			   	    		$scope.msgaccountok = false;
			   	    		$scope.msgaccount = "une photo existe déjà, veillez la supprimer avant de télécharher une nouvelle photo";
					    }else{
					    	vmproperty.msgaccountok = false;
					    	vmproperty.msgaccount = 'Une erreur est survenue, la photo n\'est pas enregistré ';
					    }
				        })
			        .catch(function (error) {
			          var answer = "Erreur ! Impossible d'accéder à l'API updateUrlPhoto. " + error;
			          vmproperty.msgaccountok = false;
			          vmproperty.msgaccount = answer;
			        })

		    	 }catch(err){
		    	 		vmproperty.msgaccountok = false;
		 				vmproperty.msgaccount = "err uploadPhoto " + err.message;
		 			}

		  },
		  uploadPhoto(fileImageData) {
		   vmproperty.message = '';
		    var	urlBaseAccount = "https://real-estate-france-db-prod.appspot.com";// profile.urlBaseAccount; 	
				
    			var typeProperty  = this.optionsproperty[this.selectedproperty].typeProperty;
				typeProperty = typeProperty.replace(/ /g, '-');
				var city = this.city;;
				city = city.replace(/ /g, '-');
				var idc = vmproperty.dataProperty.idc;
				idc = idc.replace(/ /g, '-');
				var keyProperty = vmproperty.dataProperty.keyProperty;
	    	    try{     		 
			    	 var url = urlBaseAccount + "/uploadimagecloudstorage";
			    	 var urlBaseCloudStorage = "https://storage.googleapis.com/";
			    	 var bucket = "immobilier-fr.fr";
			  //  	 alert("url " + url);
			    	 var keyImage = idc + "-" + typeProperty + "-" + city + "-" + keyProperty;
			    	 keyImage = keyImage.replace(/ /g, "-");
			    	 var pathImg = "";			    	
			    	 pathImg = "img-realestate/img-realestate-" + idc + "/";
			    	 var fd = new FormData();        
			    	 fd.append("file",fileImageData);   
			    	 fd.append("keyImage",keyImage);
			    	 fd.append("typeImage","typeImageRealestate");
			    	 fd.append("idc",idc);
			    	 fd.append("keyProperty","");
			    	 fd.append("pathImg",pathImg);

					  axios.post(url, fd)
					  .then(function (response) {
				    	var exitvalue = response.data.exitvalue;
			   	    	var keyimage = response.data.keyimage;
			   	    	vmproperty.keyImageMsc = response.data.keyImageMsc;
				    	if (exitvalue == '0'){
				    		fileReaderSmall.readAsDataURL(vmproperty.selectedFile);
					    	vmproperty.messageRed = false;
					    	var urlPhoto = urlBaseCloudStorage + bucket + "/" + pathImg + keyimage;
					    	vmproperty.message = 'La photo est enregistrée ';
					    	vmproperty.updateUrlPhoto(keyProperty, keyimage, urlPhoto);

					    }else{
					    	vmproperty.messageRed = true;
					    	vmproperty.message = 'Une erreur est survenue, la photo n\'est pas enregistré ';
					    }
				        })
			        .catch(function (error) {
			          var answer = "Erreur ! Impossible d'accéder à l'API updateUrlPhoto. " + error;
			          vmproperty.messageRed = true;
			          vmproperty.message = answer;
			        })

		    	 }catch(err){
		    	 		vmproperty.messageRed = true;
		 				vmproperty.message = "err uploadPhoto " + err.message;
		 			}


		  },
		  uploadPhotoSmall(fileImageData) {
		   vmproperty.message = '';
		    var	urlBaseAccount = "https://real-estate-france-db-prod.appspot.com";// profile.urlBaseAccount; 	

    			var typeProperty  = this.optionsproperty[this.selectedproperty].typeProperty;
				typeProperty = typeProperty.replace(/ /g, '-');
				var city = this.city;;
				city = city.replace(/ /g, '-');
				var idc = vmproperty.dataProperty.idc;
				idc = idc.replace(/ /g, '-');
				var keyProperty = vmproperty.dataProperty.keyProperty;
	    	    try{     		 
			    	 var url = urlBaseAccount + "/uploadimagecloudstorage";
			    	 var urlBaseCloudStorage = "https://storage.googleapis.com/";
			    	 var bucket = "immobilier-fr.fr";
			  //  	 alert("url " + url);
			    	 var keyImage = vmproperty.keyImageMsc; //idc + "-" + typeProperty + "-" + city + "-" + keyProperty;
			    	 keyImage = keyImage.replace(/ /g, "-");
			    	 var pathImg = "";			    	
			    	 pathImg = "img-realestate/img-realestate-" + idc + "/";
			    	 var fd = new FormData();        
			    	 fd.append("file",fileImageData);   
			    	 fd.append("keyImage",keyImage);
			    	 fd.append("typeImage","typeImageRealestateSmall");
			    	 fd.append("idc",idc);
			    	 fd.append("keyProperty","");
			    	 fd.append("pathImg",pathImg);

					  axios.post(url, fd)
					  .then(function (response) {
				    	var exitvalue = response.data.exitvalue;
			   	    	var keyimage = response.data.keyimage;
			   	    	var keyImageMsc = response.data.keyImageMsc;
				    	if (exitvalue == '0'){
					    	vmproperty.messageRed = false;
					    	vmproperty.message = 'La photo est enregistrée s';
					    }else{
					    	vmproperty.messageRed = true;
					    	vmproperty.message = 'Une erreur est survenue, la photo n\'est pas enregistré ';
					    }
				        })
			        .catch(function (error) {
			          var answer = "Erreur ! Impossible d'accéder à l'API updateUrlPhoto. " + error;
			          vmproperty.messageRed = true;
			          vmproperty.message = answer;
			        })

		    	 }catch(err){
		    	 		vmproperty.messageRed = true;
		 				vmproperty.message = "err uploadPhoto " + err.message;
		 			}

		  },
		  onUpload() {
		   
		 //   alert('onUpload ' + this.selectedFile);
		  },
	    actionProperty: function (action) {
	    	
	    	if (document.getElementById('authorisationRgpdProperty').checked == false){
				vmproperty.messageRed = true;
			    vmproperty.message = 'Vous devez cocher J\’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m\'envoyer des emails.';
				document.getElementById('authorisationRgpdProperty').focus();
				return;
			}

	    	var surface = this.surface;

	    	var city = this.city;

	    	var cp = this.cp;

	    	var price = this.price ;

	    	var landsize = this.landsize ;

	    	

	    //	alert("keyProperty " + this.dataProperty.keyProperty + "property " + this.selectedproperty + " property " + this.optionsproperty[this.selectedproperty].typeProperty + " surface " + this.surface + " description " + this.textdescription + " room " + this.optionsroom[this.selectedroom].room + " bedroom " + this.optionsbedroom[this.selectedbedroom].bedroom + " city " +this.city + " cp " + cp + " price " + price + " landsize " + landsize + " floor " + this.selectedfloor+ " country " + this.optionscountry[this.selectedcountry].country+ " statut " + this.optionsstatut[this.selectedstatut].statut + " selectedclassenergy " + this.selectedclassenergy);
	    	
	    	
/*
	    	var dataProperty = {
     			service : 'putProperty',
				login : 'ppatrick500@yahoo.fr',
				emailAd : 'ppatrick500@yahoo.fr', //profile.emailAd,
				pwdCripted : '', //profile.pwdCripted,
				keyCustomer : '', //profile.keyCustomer,
				idc : '44', //profile.idc,
				urlBaseServerApp : '', //profile.urlBaseServerApp,
				urlBaseAccount : '', //profile.urlBaseAccount,
				account : 'Patrick Petit', //profile.lastName + " " + profile.firstName,
				agency : 'Annecy', //profile.agency,
				phoneAgency : '06 24 40 13 84', //profile.phone,
				cityAgency : 'Annecy', //profile.city,
				cpAgency : '74000', //profile.cp,
				nameAgency : 'Petit', //profile.lastName,
				firstNameAgency : 'Patrick', //profile.firstName,
				idFacebookAccount : '', //profile.idFacebook,
				
				addressAgency : 'chemin des fins', //profile.address,
				faxAgency : '', //profile.fax,
				urlBaseBlogAgency : '', //profile.urlBaseBlog,
				urlBasePageFaceBookAgency : '', //profile.urlBasePageFaceBook,
				urlBaseSiteWebAgency : '', //profile.urlBaseSiteWeb,
				syndicateAgency : '', //profile.syndicate,
			
				agencyGroup : '', //profile.agencyGroup,	
				keyMasterAgency : '', //keyMasterAgency,
				keyMasterGroup : '', //keyMasterGroup,
				keyMasterNetWork1 : '', //keyMasterNetWork1,
				keyMasterNetWork2 : '', //profile.keyMasterNetWork2,
				keyMasterNetWork3 : '', //profile.keyMasterNetWork3,			
				typeProperty : this.optionsproperty[this.selectedproperty].typeProperty, //$scope.typeProperty,
				indexTypeProperty : this.selectedproperty, //$scope.indexTypeProperty,
				surface : surface, //$scope.surface,
				room : this.optionsroom[this.selectedroom].room, //$scope.room,
				bedroom : this.optionsbedroom[this.selectedbedroom].bedroom, //$scope.bedroom,
				city : city, //$scope.city,
				cp : cp, //$scope.cp,
				price : price, //$scope.price,
				currency : 'Euro', //$scope.currency,
				indexCurrency : '0', //$scope.indexCurrency,
				bid : '0', //$scope.bid,
				landsize : landsize, //$scope.landsize,
				floors : this.selectedfloor.toString(), //$scope.indexFloor,
				country : this.optionscountry[this.selectedcountry].country, //$scope.country,
				indexCountry : this.selectedcountry, // $scope.indexCountry
				typemandate : 'Simple', //$scope.typemandate,
				indexTypemandate : '0', //$scope.indexTypemandate,
				nummandate : '0', //$scope.nummandate,
				honorary : '0', //$scope.honorary,
				annuity : '0', //$scope.annuity,
				status : this.optionsstatut[this.selectedstatut].statut, //$scope.status,
				indexListstatus : this.selectedstatut, //$scope.indexListstatus,
				typeBusiness : 'Vente', //$scope.typeBusiness,
				indexListsTypeBusiness : '0', //$scope.indexListsTypeBusiness,
				indexState : '0', //$scope.indexState,
				state : 'Standard', //$scope.state,
				indexOccupied : '0', //$scope.indexOccupied,		Libre		
				indexClassEnergy : this.selectedclassenergy.toString(), //$scope.indexClassEnergy,
				
				
				saledate : '0', //$scope.saledate,
				
				transfert1 : 'false', //$scope.transfert1,
				transfert2 : 'false', //$scope.transfert2,
				transfert3 : 'false', //$scope.transfert3,
				transfert4 : 'false', //$scope.transfert4,
				transfert5 : 'false', //$scope.transfert5,
				equippedkitchen : 'false', //$scope.equippedkitchen,
				cellar : 'false', //$scope.cellar,
				garage : 'false', //$scope.garage,
				parking : 'false', //$scope.parking,
				closedparking : 'false', //$scope.closedparking,
				balcony : 'false', //$scope.balcony,
				atticfittedout : 'false', //$scope.atticfittedout,
				attic : 'false', //$scope.attic,
				terrace : 'false', //$scope.terrace,
				garden : 'false', //$scope.garden,
				swimmingpool : 'false', //$scope.swimmingpool,
				chimney : 'false', //$scope.chimney,
				parquet : 'false', //$scope.parquet,
				independenttoilet : 'false', //$scope.independenttoilet,
				airconditioning : 'false', //$scope.airconditioning,
				elevator : 'false', //$scope.elevator,
				renovated : 'false', //$scope.renovated,
				cupboard : 'false', //$scope.cupboard,
				bathroom : 'false', //$scope.bathroom,
				shower : 'false', //$scope.shower,
				attica : 'false', //$scope.attica,
				keeper : 'false', //$scope.keeper,
				intercom : 'false', //$scope.intercom,
				digicode : 'false', //$scope.digicode,
				alarm : 'false', //$scope.alarm,
				gas : 'false', //$scope.gas,
				floorheating : 'false', //$scope.floorheating,
				fuel : 'false', //$scope.fuel,
				centralcollective : 'false', //$scope.centralcollective,
				individual : 'false', //$scope.individual,
				electric : 'false', //$scope.electric,
				solar : 'false', //$scope.solar,
				geothermal : 'false', //$scope.geothermal,
				aerothermal : 'false', //$scope.aerothermal,
				south : 'false', //$scope.south,
				east : 'false', //$scope.east,
				north : 'false', //$scope.north,
				west : 'false', //$scope.west,
				beautifulview : 'false', //$scope.beautifulview,
				withoutopposite : 'false', //$scope.withoutopposite,
				textDescription : this.textdescription, //$scope.textDescription,
				favorite : 'false', //$scope.favorite,
				addressProperty : '', //$scope.addressProperty,
				keyDoorProperty : '', //$scope.keyDoorProperty,
				digiCodeProperty : '' //$scope.digiCodeProperty
				
     		};  
     		*/

// alprazolam venlafaxine
			vmproperty.message = '';

			if (this.selectedproperty == 0){
				vmproperty.messageRed = true;
				vmproperty.message = 'Vous devez choisir un type de propriété.';
				return;
			}
			
			if (vmproperty.connected == false){
				vmproperty.messageRed = true;
			    vmproperty.message = 'Veuillez vous connecter svp !';
			    return;
			}


		//	document.getElementById("message").style.color = "green";
		//	surface = Math.abs(surface.toString());
		//	surface = Number.parseInt(surface.toString());
			var pattern = /^\d+$/;
			if (!pattern.test(surface.toString())){
				vmproperty.messageRed = true;
				vmproperty.message = 'La surface doit être un nombre sans décimale ';
				return;
			}
			if (!pattern.test(landsize.toString())){
				vmproperty.messageRed = true;
				vmproperty.message = 'La surface terrain doit être un nombre sans décimale ';
				return;
			}
			if (!pattern.test(price.toString())){
				vmproperty.messageRed = true;
				vmproperty.message = 'Le prix doit être un nombre sans décimale ';
				return;
			}
			if (price < 10){
				vmproperty.messageRed = true;
				vmproperty.message = 'Le prix doit être > 0 ';
				return;
			}
			if (city == ''){
				vmproperty.messageRed = true;
				vmproperty.message = 'La ville doit être renseigné ';
				return;
			}
			if (city.length > 50){
				vmproperty.messageRed = true;
				vmproperty.message = 'La ville doit comporter 50 cars maximum ';
				return;
			}
			if (!pattern.test(cp.toString())){
				vmproperty.messageRed = true;
				vmproperty.message = 'Le code postal doit être un nombre sans décimale ';
				return;
			}
			if (cp.length < 5){
				vmproperty.messageRed = true;
				vmproperty.message = 'Le code postal doit être renseigné ';
				return;
			}
			if (this.textdescription.length < 50){
				vmproperty.messageRed = true;
				vmproperty.message = 'La description doit être renseigné avec un minimum de 50 caractères';
				return;
			}
			var textdescription = this.textdescription.replace(/'/g, "\\'");
			var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
			if (action == 'updateProperty'){
				vmproperty.dataProperty.service = "updateProperty";				
			}else{
				vmproperty.dataProperty.service = "putProperty";		
				vmproperty.dataProperty.keyProperty = '';
			}

     		vmproperty.dataProperty.typeProperty = this.optionsproperty[this.selectedproperty].typeProperty; //$scope.typeProperty,
			vmproperty.dataProperty.indexTypeProperty = this.selectedproperty.toString(); //$scope.indexTypeProperty,
			vmproperty.dataProperty.surface = surface.toString(); //$scope.surface,
			vmproperty.dataProperty.room = this.selectedroom.toString(); //$scope.room,
			vmproperty.dataProperty.bedroom = this.selectedbedroom.toString(); //$scope.bedroom,
			vmproperty.dataProperty.city = city; //$scope.city,
			vmproperty.dataProperty.cp = cp; //$scope.cp,
			vmproperty.dataProperty.price = price; //$scope.price,
			vmproperty.dataProperty.currency = 'Euro'; //$scope.currency,
			vmproperty.dataProperty.indexCurrency = '0'; //$scope.indexCurrency,
			vmproperty.dataProperty.bid = '0'; //$scope.bid,
			vmproperty.dataProperty.landsize = landsize.toString(); //$scope.landsize,
			vmproperty.dataProperty.floors = this.selectedfloor.toString(); //$scope.indexFloor,
			vmproperty.dataProperty.country = this.optionscountry[this.selectedcountry].country; //$scope.country,
			vmproperty.dataProperty.indexCountry = this.selectedcountry.toString(); // $scope.indexCountry
			vmproperty.dataProperty.typemandate = 'Simple'; //$scope.typemandate,
			vmproperty.dataProperty.indexTypemandate = '0'; //$scope.indexTypemandate,
			vmproperty.dataProperty.nummandate = '0'; //$scope.nummandate,
			vmproperty.dataProperty.honorary = '0'; //$scope.honorary,
			vmproperty.dataProperty.annuity = '0'; //$scope.annuity,
			vmproperty.dataProperty.status = this.optionsstatut[this.selectedstatut].statut; //$scope.status,
			vmproperty.dataProperty.indexListstatus = this.selectedstatut.toString(); //$scope.indexListstatus,
			vmproperty.dataProperty.typeBusiness = 'Vente'; //$scope.typeBusiness,
			vmproperty.dataProperty.indexListsTypeBusiness = '0'; //$scope.indexListsTypeBusiness,
			vmproperty.dataProperty.indexState = '0'; //$scope.indexState,
			vmproperty.dataProperty.state = 'Standard'; //$scope.state,
			vmproperty.dataProperty.indexOccupied = '0'; //$scope.indexOccupied,		Libre		
			vmproperty.dataProperty.indexClassEnergy = this.selectedclassenergy.toString(); //$scope.indexClassEnergy,
			vmproperty.dataProperty.textDescription = textdescription; //$scope.textDescription,
			
     	//	alert('cp ' + vmproperty.dataProperty.cp + "  this.cp " + this.dataProperty.cp + "  idFacebookAccount " + vmproperty.dataProperty.idFacebookAccount);
     		vmproperty.message = '';
     		
	    // axios post
	    var param = JSON.stringify(vmproperty.dataProperty);
        axios.post(urldb, param,
          {
            headers: {
//              'Content-Type': 'application/json'
//            'Content-Type': 'multipart/form-data'
            'Content-Type': 'application/x-www-form-urlencoded'
            }
          }
        )
	    .then(function (response) {
	    	var exitvalue = response.data.exitvalue;
	    	if (exitvalue == '0'){
	    		if (action == 'updateProperty'){
					vmproperty.dataProperty.service = "updateProperty";		
					vm.todos[vm.indexselected].typeproperty = vmproperty.optionsproperty[vmproperty.selectedproperty].typeProperty;
					vm.todos[vm.indexselected].indextypeproperty = parseInt(vmproperty.selectedproperty.toString(),10);
					vm.todos[vm.indexselected].room = parseInt(vmproperty.selectedroom.toString(),10);
					vm.todos[vm.indexselected].bedroom = parseInt(vmproperty.selectedbedroom.toString(),10);
					vm.todos[vm.indexselected].surface	= surface.toString();
					vm.todos[vm.indexselected].landsize	= landsize.toString();
					vm.todos[vm.indexselected].floors = parseInt(vmproperty.selectedfloor.toString(),10);
					vm.todos[vm.indexselected].price	= price.toString();
					vm.todos[vm.indexselected].city	= city.toString();
					vm.todos[vm.indexselected].cp	= cp.toString();
					vm.todos[vm.indexselected].currency	= 'Euro'; 
					vm.todos[vm.indexselected].indexcurrency = '0';
					vm.todos[vm.indexselected].bid = '0';
				
					vm.todos[vm.indexselected].country = vmproperty.optionscountry[vmproperty.selectedcountry].country;
					vm.todos[vm.indexselected].indexcountry = parseInt(vmproperty.selectedcountry.toString(),10);
			
					vm.todos[vm.indexselected].typemandate = 'Simple';
					vm.todos[vm.indexselected].indextypemandate = '0';
					vm.todos[vm.indexselected].nummandate = '0';
					vm.todos[vm.indexselected].honorary = '0';
					vm.todos[vm.indexselected].annuity = '0';

					vm.todos[vm.indexselected].status = vmproperty.optionsstatut[vmproperty.selectedstatut].statut;					
					vm.todos[vm.indexselected].indexliststatus = parseInt(vmproperty.selectedstatut.toString(),10);

					vm.todos[vm.indexselected].typebusiness = 'Vente';
					vm.todos[vm.indexselected].indexliststypebusiness = '0';
					vm.todos[vm.indexselected].indexstate = '0';
					vm.todos[vm.indexselected].state = 'Standard';
					vm.todos[vm.indexselected].indexoccupied = '0';

					vm.todos[vm.indexselected].indexclassenergy = parseInt(vmproperty.selectedclassenergy.toString(),10);

					vm.todos[vm.indexselected].textdescription	= vmproperty.textdescription.toString();
				}else{
					vm.showListProperties(vmproperty.account.email);
				  	/*vm.todos.push({
			        idrealestate: response.data.keyproperty,
			        typeproperty: vmproperty.optionsproperty[vmproperty.selectedproperty].typeProperty,
			        indextypeproperty: parseInt(vmproperty.selectedproperty.toString(),10),
			        room: parseInt(vmproperty.selectedroom.toString(),10),
			        bedroom: parseInt(vmproperty.selectedbedroom.toString(),10),
			        surface: surface.toString(),
			        landsize: landsize.toString(),
			        floors: parseInt(vmproperty.selectedfloor.toString(),10),
			        price: price.toString(),
			        city: city.toString(),
			        cp: cp.toString(),
			        currency: 'Euro',
			        indexcurrency: '0',
			        bid: '0',
			        country: vmproperty.optionscountry[vmproperty.selectedcountry].country,
			        indexcountry: parseInt(vmproperty.selectedcountry.toString(),10),
			        typemandate: 'Simple',
			        indextypemandate: '0',
			        nummandate: '0',
			        honorary: '0',
			        annuity: '0',
			        status: vmproperty.optionsstatut[vmproperty.selectedstatut].statut,
			        indexliststatus: parseInt(vmproperty.selectedstatut.toString(),10),
			        typebusiness: 'Vente',
			        indexliststypebusiness: '0',
			        indexstate: '0',
			        state: 'Standard',
			        indexoccupied: '0',
			        indexclassenergy: '0',
			        annuity: parseInt(vmproperty.selectedclassenergy.toString(),10),
			        textdescription: vmproperty.textdescription.toString(),
			        viewcount: '0'
	      			});
	      			*/
	      			vmproperty.updatePropertyDisabled = false;
  					vmproperty.inputFileDisabled = false;
				}
	    		vmproperty.messageRed = false;
		    	vmproperty.message = 'Le bien est enregistré ';
		    }else{
		    	vmproperty.messageRed = true;
		    	vmproperty.message = 'Une erreur est survenue, le bien n\'est pas enregistré ';
		    }
        })
        .catch(function (error) {
          var answer = "Erreur ! Impossible d'accéder à l'API." + error;
          vmproperty.messageRed = true;
          vmproperty.message = answer;
        })


		

		/*
        // Post a property XMLHttpRequest
		var url = "https://real-estate-france-db-prod.appspot.com/managedbjsonmysql";

		var data = {};
		data.service = "putProperty";
		data.login  = "ppatrick500@yahoo.fr";
		//var json = JSON.stringify(data);

		var json = JSON.stringify({"service":"putProperty","name":"LaraCroft"});

		var xhr = new XMLHttpRequest();
		xhr.open("POST", url, true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  //application/json
		xhr.onload  = function () { 
			var response = JSON.parse(xhr.responseText);
			if (xhr.readyState == 4 && xhr.status == "200") {
				alert('Ok ' + response.exitvalue);
			} else {
				alert('error ' + response.exitvalue);
			}
		}
		xhr.send(json);

		*/

        

	    }
	}    
})


	Vue.component('todo-item', {
	  template: '\
	    <tr>\
	      <td>{{ id }}</td>\
	      <td>{{ idrealestate }}</td>\
	      <td>{{ typeproperty }}</td>\
	      <td>{{ room }}</td>\
	      <td>{{ bedroom }}</td>\
	      <td>{{ surface }}</td>\
	      <td>{{ city }}</td>\
	      <td>{{ cp }}</td>\
	      <td>{{ price }}</td>\
	      <td>{{ viewcount }}</td>\
	      <td><button class="button_realestate" onclick="inputListeners">Select</button></td\
	      <td><button class="button_realestate" v-on:click="$emit(\'remove\')">Supprimer</button></td\
	    </tr>\
	  ',
	  props: ['id', 'idrealestate', 'typeproperty', 'room', 'bedroom', 'surface', 'city', 'cp', 'price', 'viewcount', 'selected'],
	  computed: {
	    inputListeners: function () {
	    	//alert('wwwww');
	    }
	}
	})

	

	var vm = new Vue({
	  el: '#todo-list-example',
	  data: {
	  	selected: '',
	  	indexselected: 0,
	    todos: [],
	    todosx: [
	      {
	        id: 1,
	        idrealestate: '44-1342666',
	        typeproperty: 'Maison',
	        room: '2',
	        bedroom: '1',
	        surface: '100',
	        city: 'Annecy',
	        cp: '74000',
	        price: '100000',
	        viewcount: '23',
	      },
	      {
	        id: 2,
	        idrealestate: '44-1342667',
	        typeproperty: 'Appartement',
	        room: '4',
	        bedroom: '2',
	        surface: '120',
	        city: 'Cluses',
	        cp: '74300',
	        price: '200000',
	        viewcount: '43',
	      },
	      {
	        id: 3,
	        idrealestate: '44-1342688',
	        typeproperty: 'Ferme',
	        room: '3',
	        bedroom: '2',
	        surface: '80',
	        city: 'Sallanches',
	        cp: '74500',
	        price: '300000',
	        viewcount: '25'
	      }
	    ],
	    nextTodoId: 5
	  },
	  filters: {
    idRealEstateReduce: function(str) {
    	var s = str.indexOf("-") + 2;
    	var str1 = str.substring(s, (str.length - 2));
      return str1;
        }
  
  	},
	  methods: {
	    addNewTodo: function () {
	    //	alert("addNewTodo A " );
	      this.todos.push({
	        id: this.nextTodoId++,
	        idrealestate: 'testid',
	        typeproperty: 'Ferme',
	        room: '3',
	        bedroom: '2',
	        surface: '80',
	        city: 'Sallanches',
	        cp: '74500',
	        price: '300000',
	        viewcount: '256'
	      })
	    },
	    existOwnerPropertyDelete: function (id) {
	    	var existPhotoOk = false;
    		if (vm.todos[vm.indexselected].urlphoto1 != ''){existPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto2 != ''){existPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto3 != ''){existPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto4 != ''){existPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto5 != ''){existPhotoOk = true;}
    		else if  (vm.todos[vm.indexselected].urlphoto6 != ''){existPhotoOk = true;}
    		if (existPhotoOk == true){
    			vmproperty.messageRed = true;
    			vmproperty.message = 'Veuillez supprimer la ou les photos avant de supprimer votre bien';
    			return;
    		}

	    	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
	    	// test si propietaire owner a supprimer existOwnerProperty
	    	// test si image a supprimer

	    	var dataObject = {
    			service : "existOwnerProperty",
				login : vmproperty.dataProperty.login,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.dataProperty.idc,
    			idProperty : id
    		};

	    	 // axios post
	    	var param = JSON.stringify(dataObject);
	        axios.post(urldb, param,
	          {
	            headers: {
	//              'Content-Type': 'application/json'
	//            'Content-Type': 'multipart/form-data'
	            'Content-Type': 'application/x-www-form-urlencoded'
	            }
	          }
	        )
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
			    if (response.data.numberRecord < 1){
			    	vmproperty.messageRed = false;
			    	vmproperty.message = 'numberRecord ' + response.data.numberRecord;
		     		vm.deleteProperty(vm.todos[vm.indexselected].idrealestate);
		     	}else{
		     		vmproperty.messageRed = true;
		     		vmproperty.message = "Supprimez les propriétaires pour supprimer le bien vous devez utiliser la version Facebook ou le plugin WP";
		     	}

	        })
	        .catch(function (error) {
	          var answer = "Erreur ! Impossible d'accéder à l'API." + error;
	          vmproperty.messageRed = true;
	          vmproperty.message = answer;
	        })

	    //	alert('existOwnerProperty ' + id);
    	},
	    deleteProperty: function (id) {
	    	var urldb = 'https://real-estate-france-db-prod.appspot.com/managedbjsonmysql';
	    	// test si propietaire owner a supprimer existOwnerProperty
	    	// test si image a supprimer

	    	var dataObject = {
    			service : "deleteProperty",
				login : vmproperty.dataProperty.login,
				pwdCripted : vmproperty.dataProperty.pwdCripted,
				keyCustomer : vmproperty.dataProperty.keyCustomer,
				idc : vmproperty.dataProperty.idc,
    			idProperty : id
    		};

	    	 // axios post
	    	var param = JSON.stringify(dataObject);
	        axios.post(urldb, param,
	          {
	            headers: {
	//              'Content-Type': 'application/json'
	//            'Content-Type': 'multipart/form-data'
	            'Content-Type': 'application/x-www-form-urlencoded'
	            }
	          }
	        )
		    .then(function (response) {
		    	var exitvalue = response.data.exitvalue;
		    	if (exitvalue == '0'){
		    		vm.todos.splice(vm.indexselected, 1);
		    		vmproperty.messageRed = false;
			    	vmproperty.message = 'Le bien est supprimé ';
			    }else{
			    	vmproperty.messageRed = true;
			    	vmproperty.message = 'Une erreur est survenue, le bien n\'est pas supprimé ';
			    }
	        })
	        .catch(function (error) {
	        	vmproperty.messageRed = true;
	          	var answer = "Erreur ! Impossible d'accéder à l'API." + error;
	          	vmproperty.message = answer;
	        })



	    //	alert('idProperty ' + id);
    	},
    	selectshowraw: function (todo, index){
    		this.indexselected = index;    		
    		this.selected = todo.idrealestate;
    		vmproperty.dataProperty.keyProperty = todo.idrealestate;  
    		vmproperty.selectedproperty = todo.indextypeproperty;    	
    		vmproperty.surface = todo.surface;
    		vmproperty.selectedroom = todo.room;
    		vmproperty.selectedbedroom = todo.bedroom;
    		vmproperty.landsize = todo.landsize;
    		vmproperty.selectedfloor = todo.floors;
    		vmproperty.price = todo.price;
    		vmproperty.city = todo.city;
    		vmproperty.cp = todo.cp;
			vmproperty.selectedcountry = todo.indexcountry;
			vmproperty.selectedstatut = todo.indexliststatus;
			vmproperty.selectedclassenergy = todo.indexclassenergy;		

			var textdescription = todo.textdescription;
			var textdescription = textdescription.replace(/\'/g, "'");
			vmproperty.textdescription = textdescription;
    		

			if (todo.urlphoto1 == ""){vmproperty.img1FB = "#";}else{vmproperty.img1FB = todo.urlphoto1;}
			if (todo.urlphoto2 == ""){vmproperty.img2FB = "#";}else{vmproperty.img2FB = todo.urlphoto2;}
			if (todo.urlphoto3 == ""){vmproperty.img3FB = "#";}else{vmproperty.img3FB = todo.urlphoto3;}
			if (todo.urlphoto4 == ""){vmproperty.img4FB = "#";}else{vmproperty.img4FB = todo.urlphoto4;}
			if (todo.urlphoto5 == ""){vmproperty.img5FB = "#";}else{vmproperty.img5FB = todo.urlphoto5;}
			if (todo.urlphoto6 == ""){vmproperty.img6FB = "#";}else{vmproperty.img6FB = todo.urlphoto6;}		
			
			
			if (todo.urlphoto1 == ""){
				vmproperty.img1 = "#";vmproperty.keyimage1 = '';vmproperty.delImg1 = false;vmproperty.delImg1Button = false;	
			}else{
				vmproperty.img1 = todo.urlphoto1;
				vmproperty.keyimage1 = todo.keyimage1;
				vmproperty.delImg1 = true;vmproperty.delImg1Button = true;
			}		
			if (todo.urlphoto2 == ""){
				vmproperty.img2 = "#";vmproperty.keyimage2 = '';vmproperty.delImg2 = false;vmproperty.delImg2Button = false;	
			}else{
				vmproperty.img2 = todo.urlphoto2;
				vmproperty.keyimage2 = todo.keyimage2;
				vmproperty.delImg2 = true;vmproperty.delImg2Button = true;	
			}	
			if (todo.urlphoto3 == ""){
				vmproperty.img3 = "#";vmproperty.keyimage3 = '';vmproperty.delImg3 = false;vmproperty.delImg3Button = false;
			}else{
				vmproperty.img3 = todo.urlphoto3;
				vmproperty.keyimage3 = todo.keyimage3;
				vmproperty.delImg3 = true;vmproperty.delImg3Button = true;
			}	
			if (todo.urlphoto4 == ""){
				vmproperty.img4 = "#";vmproperty.keyimage4 = '';vmproperty.delImg4 = false;vmproperty.delImg4Button = false;
			}else{
				vmproperty.img4 = todo.urlphoto4;
				vmproperty.keyimage4 = todo.keyimage4;
				vmproperty.delImg4 = true;vmproperty.delImg4Button = true;
			}
			if (todo.urlphoto5 == ""){
				vmproperty.img5 = "#";vmproperty.keyimage5 = '';vmproperty.delImg5 = false;vmproperty.delImg5Button = false;
			}else{
				vmproperty.img5 = todo.urlphoto5;
				vmproperty.keyimage5 = todo.keyimage5;
				vmproperty.delImg5 = true;vmproperty.delImg5Button = true;
			}
			if (todo.urlphoto6 == ""){
				vmproperty.img6 = "#";vmproperty.keyimage6 = '';vmproperty.delImg6 = false;vmproperty.delImg6Button = false;
			}else{
				vmproperty.img6 = todo.urlphoto6;
				vmproperty.keyimage6 = todo.keyimage6;
				vmproperty.delImg6 = true;vmproperty.delImg6Button = true;
			}
    		
    		//alert('selectshowraw ' + todo.indextypeproperty);
    	},
	  
	    showListProperties: function (login) {
	   //   this.todos = this.todosx 

	      const params = {
			service: 'readProperties',
			plateform : "3",
			t: '',
			login: login,
			pwdCripted: '',
			keyCustomer: '',
			idc: '',
			fieldFilter: 'keyEmailAccount',
			valueStringField: login,
			indexTypeProperty: '0',
			room: '0',
			codepostal : '',
			currentPage: '1',
			numberSize: '50'

		};
	    axios({ method: "GET", "url": "https://real-estate-france-db-prod.appspot.com/managedbmysql" ,
	      params: params})
	    .then(function (response) {
	    	vm.todos = response.data;
	    	if (response.data.length > 0){
		    	vm.selectshowraw(response.data[0], 0);
		    	vmproperty.updatePropertyDisabled = false;
				vmproperty.inputFileDisabled = false;
		    }
        })
        .catch(function (error) {
          var answer = "Erreur ! Impossible d'accéder à l'API." + error;
        //  alert(answer);
        })

	    }
	  }
	 

	})

	//vm.showListProperties();


</script>


<script type="text/javascript">
	
	function login_realestate(){
		vmproperty.msgloginshow = true;
	//	document.getElementById("msgloginshow").style.display = '';
		vmproperty.validationcreateaccount = false;
		vmproperty.selected = '';
		vmproperty.dataProperty.keyProperty = '';  
		vmproperty.selectedproperty = 0;    	
		vmproperty.surface = '0';
		vmproperty.selectedroom = 0;
		vmproperty.selectedbedroom = 0;
		vmproperty.landsize = '0';
		vmproperty.selectedfloor = 0;
		vmproperty.price = '';
		vmproperty.city = '';
		vmproperty.cp = '';
		vmproperty.selectedcountry = 0;
		vmproperty.selectedstatut = 0;
		vmproperty.selectedclassenergy = 0;			
		vmproperty.textdescription = '';
    		
    	vmproperty.delImg1 = false;vmproperty.delImg2 = false;vmproperty.delImg3 = false;vmproperty.delImg4 = false;vmproperty.delImg5 = false;vmproperty.delImg6 = false;
	
		var login = document.getElementById('email').value;
		login = login.trim();
		if(login == ''){
			vmproperty.messageRed = true;
			vmproperty.message = 'L\'email doit être renseigné';
     		return;
		}else if(!validateEmail(login)){
			vmproperty.messageRed = true;
			vmproperty.message = 'Email invalide';
     		return;
		}else if(login.length > 70){
			vmproperty.messageRed = true;
			vmproperty.message = 'Email est trop long';
     		return;
		}  
		
		var pwd = document.getElementById('pwd').value;
		pwd = pwd.trim();
		if(pwd == ''){
			vmproperty.messageRed = true;
			vmproperty.message = 'Le mot de passe doit être renseigné';
     		return;
		}else if(!sanitize_string(pwd)){
			vmproperty.messageRed = true;
			vmproperty.message = 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres';
     		return;
		}else if(pwd.length > 20){
			vmproperty.messageRed = true;
			vmproperty.message = 'Le mot de passe est trop long';
     		return;
		}else if(pwd.length < 7){
			vmproperty.messageRed = true;
			vmproperty.message = 'Le mot de passe est trop court';
     		return;
		}   

	    try{
		    pwdCripted = MD5(pwd);
	    }catch(err) {
	    	vmproperty.messageRed = true;
			vmproperty.message = 'Mot de passe ' + err.message;
	    	return;
	    }
		getLoginPasswordOk(login, pwdCripted, "", "");
	}

	function getLoginPasswordOk(login, pwdCripted, firstName, lastName) {
			vmproperty.validationcreateaccount = false;
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    	result = result.replace('(', '');
				result = result.replace(');', '');
			//	lock_fields_pwd();
				var obj = JSON.parse(result); 
				    //  alert('getLoginPasswordOk C ' + login + '  ' + pwdCripted + ' ' + obj.exitvalue);
				if (obj.exitvalue == '0' || obj.exitvalue == '3') {	
					vmproperty.fieldsPropertiesDisabled = false;
					vmproperty.dataProperty.idFacebookAccount = obj.idFaceBook;
					readAccount(login);
					vmproperty.createaccountbuttonform = false;
					vmproperty.modifaccountbuttonform = true;
					vmproperty.createaccount = false;
					vmproperty.msgloginshow = false;
					vmproperty.addPropertyDisabled = false;

		    		vmproperty.button_modif_accountok = true;
		    		vmproperty.button_update_passwordok = true;
		    		vmproperty.button_delete_accountok = true;

	        		vmproperty.button_save_modif_accountok = true;
	        		vmproperty.button_cancel_modif_accountok = true;

				//	document.getElementById("msgloginshow").style.display = 'none';
					if (document.getElementById("btConnexion")) {
						if (obj.exitvalue == '0') {
							document.getElementById("btConnexion").innerHTML = "Vous êtes connecté ";
						}else {
							document.getElementById("btConnexion").innerHTML = "Vous êtes connecté FB";
						}

						document.getElementById("btConnexion").style.backgroundColor = "green";
		        		document.getElementById("btConnexion").style.fontWeight = "bold";	
		        	}	
				
				}else if (obj.exitvalue == '1'){
					vmproperty.messageRed = true;
					vmproperty.message = "Votre mot de passe est invalide ";
				}else if (obj.exitvalue == '2'){
					//document.getElementById('buttoncreatemodifaccount').style.visibility = 'hidden';
					document.getElementById('firstName').value = firstName;
					document.getElementById('lastName').value = lastName;
					document.getElementById('emailcreateaccount').value = login;
					
					vmproperty.modifaccountbuttonform = false;
					vmproperty.createaccountbuttonform = false;
					vmproperty.createaccount = true;
					vmproperty.messageRed = false;
					vmproperty.message = "Merci de créer votre compte ci-dessous ! ";
				}else if (obj.exitvalue == '9'){
					vmproperty.messageRed = true;
					vmproperty.message = "Une erreur est survenue, merci de recommencer avec les bons identifiants";
				}else if (obj.exitvalue == '10'){
					vmproperty.messageRed = true;
					vmproperty.message = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
				}				
	  		};
  		}
		  var data_string = '&service=' + 'getEmailAndPwdOk' + '&login=' + login + "&pwdCripted=" + pwdCripted;
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		
	}





	function readAccount(login){
		var dataAccount = {
     			service : 'readAccount',
				login : login //'ppatrick500@yahoo.fr'
			}
		 axios.post('https://real-estate-france-db-prod.appspot.com/managedbjsonmysql', dataAccount,
          {
            headers: {
//              'Content-Type': 'application/json'
//            'Content-Type': 'multipart/form-data'
            'Content-Type': 'application/x-www-form-urlencoded'
            }
          }
        )
	    .then(function (response) {
	    //	alert('login ' + response.data.idClient);
	    	vmproperty.connected = true;
	    	vmproperty.dataProperty.login = response.data.idClient;
	    	vmproperty.dataProperty.emailAd = response.data.emailAd;
	    	vmproperty.dataProperty.pwdCripted = '';
	    	vmproperty.dataProperty.keyCustomer = '';
	    	vmproperty.dataProperty.idc = response.data.numClient;
	    	vmproperty.dataProperty.urlBaseServerApp = '';
	    	vmproperty.dataProperty.urlBaseAccount = response.data.urlBaseAccount;
	    	vmproperty.dataProperty.account = response.data.lastName + " " + response.data.firstName;
	    	vmproperty.dataProperty.agency = response.data.agency;
	    	vmproperty.dataProperty.phoneAgency = response.data.phone;
	    	vmproperty.dataProperty.cityAgency = response.data.city;
	    	vmproperty.dataProperty.cpAgency = response.data.cp;
	    	vmproperty.dataProperty.nameAgency = response.data.lastName;
	    	vmproperty.dataProperty.firstNameAgency = response.data.firstName;
	   
	    	vmproperty.dataProperty.addressAgency = response.data.address;
	    	vmproperty.dataProperty.faxAgency = response.data.fax;
	    	vmproperty.dataProperty.urlBaseBlogAgency = response.data.urlBaseBlog;
	    	vmproperty.dataProperty.urlBasePageFaceBookAgency = response.data.urlBasePageFaceBook;
	    	vmproperty.dataProperty.urlBaseSiteWebAgency = response.data.urlBaseSiteWeb;
	    	vmproperty.dataProperty.syndicateAgency = response.data.syndicate;
	    	vmproperty.dataProperty.agencyGroup = response.data.idGroupAgency;
	    	vmproperty.dataProperty.keyMasterAgency = response.data.keyMasterAgency;
	    	vmproperty.dataProperty.keyMasterGroup = response.data.keyMasterGroup;
	    	vmproperty.dataProperty.keyMasterNetWork1 = response.data.keyMasterNetWork1;
	    	vmproperty.dataProperty.keyMasterNetWork2 = response.data.keyMasterNetWork2;
	    	vmproperty.dataProperty.keyMasterNetWork3 = response.data.keyMasterNetWork3;

	    	// Account
	    	vmproperty.account.idClient = response.data.idClient;
	    	vmproperty.account.idc = response.data.numClient;
	    	vmproperty.account.agency = response.data.agency;
    		vmproperty.account.lastName = response.data.lastName;
    		vmproperty.account.firstName = response.data.firstName;
    		vmproperty.account.email = response.data.idClient;
    		vmproperty.account.phone = response.data.phone;

    		vmproperty.account.address = response.data.address;
    		vmproperty.account.city = response.data.city;
    		vmproperty.account.cp = response.data.cp;
    		vmproperty.account.country = response.data.country;
    		
    		vmproperty.account.emailad = response.data.emailAd;
    		vmproperty.account.fax = response.data.fax;
    		vmproperty.account.numAgent = response.data.numAgent;

    		vmproperty.selectedSyndicate = response.data.indexSyndicate;

    		vmproperty.account.urlBaseServerApp = '';
	    	vmproperty.account.urlBaseAccount = response.data.urlBaseAccount;

			vmproperty.account.masterAgency = response.data.masterAgency;

			vmproperty.account.groupAgency = response.data.groupAgency;
			vmproperty.account.netWork1 = response.data.netWork1;
			vmproperty.account.netWork2 = response.data.netWork2;
			vmproperty.account.netWork3 = response.data.netWork3;

			vmproperty.account.idPageAgency = response.data.idPageAgency;
			vmproperty.account.idGroupAgency = response.data.idGroupAgency;
			vmproperty.account.idPageNetWork1 = response.data.idPageNetWork1;
	    	

    		vmproperty.account.urlBaseSiteWeb = response.data.urlBaseSiteWeb;
    		vmproperty.account.urlBaseBlog = response.data.urlBaseBlog;
    		vmproperty.account.urlBasePageFaceBook = response.data.urlBasePageFaceBook;
    		vmproperty.account.urlAccessMapAgency = response.data.urlAccessMapAgency;
    		vmproperty.account.urlphotoAccount1 = response.data.urlphotoAccount1;
    		vmproperty.account.keyImage1 =  response.data.keyimageAccount1;
			vmproperty.imageLoadAccount(vmproperty.account.urlphotoAccount1);

    		var textDescriptionAgency = response.data.descriptionAgency;
	        	  	
    	  	textDescriptionAgency = textDescriptionAgency.replace(/< br >/g, '<br>');
    		textDescriptionAgency = textDescriptionAgency.replace(/< b >/g, '<b>');
    		textDescriptionAgency = textDescriptionAgency.replace(/< \/ b >/g, '</b>');
    		
    		textDescriptionAgency = textDescriptionAgency.replace(/< i >/g, '<i>');
    		textDescriptionAgency = textDescriptionAgency.replace(/< \/ i >/g, '</i>');
    		
    		textDescriptionAgency = textDescriptionAgency.replace(/< u >/g, '<u>');
    		textDescriptionAgency = textDescriptionAgency.replace(/< \/ u >/g, '</u>');

    		vmproperty.account.descriptionAgency = textDescriptionAgency;
    		

		
	    	vm.showListProperties(login);
	    	vmproperty.messageRed = false;
	    	vmproperty.message = 'Vous êtes connecté agence: ' + response.data.agency;
        })
        .catch(function (error) {
          var answer = "Erreur account ! Impossible d'accéder à l'API." + error;
          vmproperty.messageRed = true;
          vmproperty.message = answer;
        })

	}

</script>


<script type="text/javascript">
	
	function password_account_forget(){
		var login = document.getElementById('email').value;
		login = login.trim();
		if(login == ''){
			vmproperty.messageRed = true;
          	vmproperty.message = 'L\'email doit être renseigné';
     		return;
		}else if(!validateEmail(login)){
			vmproperty.messageRed = true;
          	vmproperty.message = 'Email invalide';
     		return;
		}else if(login.length > 70){
			vmproperty.messageRed = true;
          	vmproperty.message = 'Email est trop long';
     		return;
		}  
		

		getExistAccountPassword(login);
	}

	function getExistAccountPassword(login) {
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;	    	
		    	result = result.replace('(', '');
				result = result.replace(');', '');
				var obj = JSON.parse(result); 
				if (obj.exitvalue == '0') {	
					vmproperty.messageRed = false;
          			vmproperty.message = "Votre mot de passe vous a été envoyé sur votre email " + login;		
				}else if (obj.exitvalue == '1') {
					vmproperty.messageRed = true;
          			vmproperty.message = "Une erreur est survenue dans la mise à jour de votre nouveau mot de passe " + login;
				}else if (obj.exitvalue == '3') {
					vmproperty.messageRed = true;
          			vmproperty.message = "Ce compte n'existe pas " + login;
				}else if (obj.exitvalue == '9') {
					vmproperty.messageRed = true;
          			vmproperty.message = "Une erreur dans l'envoi de votre mot de passe et survenue " + login;
				}else if (obj.exitvalue == '11') {
					vmproperty.messageRed = true;
          			vmproperty.message = "Une erreur dans l'envoi de votre mot de passe et survenue " + login;
				}else if (obj.exitvalue == '12') {
					vmproperty.messageRed = true;
          			vmproperty.message = "Une erreur est survenue, merci de recommencer " + login;
				}				
		    }
		  };

		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?&service=getNewPwd&login=" + login + "&s=softwarerealestate", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send();
		}

/*
	function update_dbwp_account() {
	//	if (!validation_field('email', 'email', 'msg', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;
		email = login.trim();

	//	if (!validation_field('password', 'pwd', 'msgpwd', 'Le password doit être renseigné', 'Le password n\'est pas valide! uniquement des lettres et des chiffres', 'Le password est trop court', 'Le password est trop long', 7, 20)) return;
		var pwd = document.getElementById('pwd').value;
		pwd = pwd.trim();

		var newPwdCripted = "";
		    try{
			    newPwdCripted = MD5(pwd);
			    changePwd_wp_db(email, newPwdCripted);
		    }catch(err) {
		    	document.getElementById('msgpwd').innerHTML = 'Mot de passe ' + err.message;
		        document.getElementById("msgpwd").style.color = "red";
		        document.getElementById("msgpwd").style.fontWeight = "bold";
		    	return;
		    }
		}

	function show_ele(id)
		{		
		    document.getElementById(id).style.visibility="visible";
		    return true;
		}
	function hidden_ele(id)
		{
		    document.getElementById(id).style.visibility="hidden";
		    return true;
		}*/
</script>
	




<script src= '<?php echo plugins_url() . "/real-estate-agency/md5.js" ?>'></script>

<script type="text/javascript">    

	/*var imgempty = '<?php echo sanitize_text_field($app['imgempty']) ?>';	
	if (imgempty == 'false' ){
		document.getElementById('img').src = "<?php echo esc_url_raw($app['imgFirstCol']) . '&s=true&w=600&h=400' ?>";
	}*/

	var pathmd5 = '<?php echo plugins_url() . "/real-estate-agency/md5.js" ?>';

	var connected = false;
	var nbRecordsearch = 1;
	var emailCustomerForDel = "";

	function deleteCustomerAccountFromWeb() {
		if (connected == true){
			if (nbRecordsearch == 0){
				deleteCustomerAndCustomerAccountByVisitor();
			}else{
				document.getElementById("msgaccountvisitor").style.color = "red";
				document.getElementById("msgaccountvisitor").innerHTML = "Veuillez spprimer vos recherches pour supprimer votre compte";
			}
		}else{
			document.getElementById("msgaccountvisitor").style.color = "red";
			document.getElementById("msgaccountvisitor").innerHTML = "Merci de vous connecter pour supprimer votre compte";
		}
	}

	function deleteCustomerAndCustomerAccountByVisitor() {
		
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'deleteCustomerAndCustomerAccountByVisitor' + '&login=' + '&keyEmailAccount=' + '&pwdCripted=' + '&keyCustomer=' + '&idc=' + '&emailCustomer=' + emailCustomerForDel;
		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;			    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					readSearchCustomerVisitor(emailvisitor);
					document.getElementById("msgaccountvisitor").innerHTML = "Votre compte a été supprimé";
					document.getElementById("msgaccountvisitor").style.color = "green";
	        		document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
				}else if (obj.exitvalue == "1") {
					document.getElementById("msgaccountvisitor").innerHTML = "Une erreur est survenue, merci de recommencer";
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";   
				}else {
					document.getElementById("msgaccountvisitor").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
				}
		    }
		  };
		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		  
		}

	function send_pwd_forget() {
		var emailvisitor = document.getElementById('emailvisitor').value;
		if (!empty_field(emailvisitor)){ setMsgError('msgaccountvisitor', 'Email doit être renseigné', 'emailvisitor'); return;}
		if (!validateEmail(emailvisitor)){ setMsgError('msgaccountvisitor', 'Email invalide ', 'emailvisitor'); return;}
	    if (emailvisitor.length > 70) { setMsgError('msgaccountvisitor', 'Email est trop long ', 'emailvisitor'); return;}
		emailvisitor = emailvisitor.trim();

		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'getSendPwdCustomerAccountFromWeb' + '&login=' + emailvisitor + '&keyEmailAccount=' + '&pwdCripted=' + '&keyCustomer=' + '&idc=';
		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;			    	
				var obj = JSON.parse(result); 

				if (obj.exitvalue == "0") {;
					document.getElementById("msgaccountvisitor").innerHTML = "Votre mot de passe vous a été envoyé sur votre email " + emailvisitor;
					document.getElementById("msgaccountvisitor").style.color = "green";
	        		document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
				}else if (obj.exitvalue == "9") {
					document.getElementById("msgaccountvisitor").innerHTML = "Ce compte n'existe pas !";
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";   
				}else {
					document.getElementById("msgaccountvisitor").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
				}
		    }
		  };
		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
	}
	

	function readSearchCustomerVisitor(emailvisitor) {
			
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'readSearchCustomerVisitor' + '&login=' + '&keyEmailAccount=' + '&pwdCripted=' + '&keyCustomer=' + '&idc=' + '&emailCustomer=' + emailvisitor + '&currentPage=1' + '&numberSize=5';
		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		
		    
		   /// 	document.getElementById("msgaccountvisitor").innerHTML = result;    
		    	var listcriteria = "";

		    	var obj = JSON.parse(result);
		    	<?php if ( ! wp_is_mobile() ) { ?>
		    		listcriteria = "<table><tr><td><b>Type</b></td><td><b>Ville</b></td><td><b>Cp</b></td><td><b>Pièce(s)</b></td><td><b>Min</b></td><td><b>Max</b></td><td><b>Supp</b></td></tr>";
		    	<?php } ?>
		    	<?php if ( wp_is_mobile() ) { ?>
		    		listcriteria = "<table><tr><td><b>Type</b></td><td><b>Ville</b></td><td><b>Cp</b></td></tr>";
		    	<?php } ?>
		    	var i;
		    	var iMax = 5;
		    	var nbEle = obj.length;

				nbRecordsearch = obj.length;

		    	if (nbEle >= iMax ) {nbEle = iMax};
				for (i = 0; i < nbEle; i++) {
					<?php if ( ! wp_is_mobile() ) { ?>
				    	listcriteria = listcriteria + "<tr>";
				    	listcriteria = listcriteria + "<td>" + obj[i].typePropertySearch + "</td>";
				    	listcriteria = listcriteria + "<td>" + obj[i].citySearch + "</td>";
				    	listcriteria = listcriteria + "<td>" + obj[i].cpSearch + "</td>";   
			    	
				    	listcriteria = listcriteria + "<td>" + obj[i].roomSearch + "</td>"; 
				    	listcriteria = listcriteria + "<td>" + obj[i].priceSearchMin + "</td>"; 
				    	listcriteria = listcriteria + "<td>" + obj[i].priceSearchMax + "</td>"; 	
			    	
			    		listcriteria = listcriteria + "<td>" + "<button onclick='delSearchCustomerVisitor(" + "\"" + obj[i].idCustomerSearch + "\"" + ",\"" + emailvisitor  + "\"" + ")'>Supp</button>" + "</td>"; 
			    		listcriteria = listcriteria + "</tr>";
					<?php } ?>
					<?php if ( wp_is_mobile() ) { ?>
				    	listcriteria = listcriteria + "<tr>";
				    	listcriteria = listcriteria + "<td>" + obj[i].typePropertySearch + "</td>";
				    	listcriteria = listcriteria + "<td>" + obj[i].citySearch + "</td>";
				    	listcriteria = listcriteria + "<td>" + obj[i].cpSearch + "</td>";   
			    		listcriteria = listcriteria + "</tr>";
			    		listcriteria = listcriteria + "<tr><td><b>Pièce(s)</b></td><td><b>Min</b></td><td><b>Max</b></td><td><b>Supp</b></td></tr>";
			    		listcriteria = listcriteria + "<tr>";
				    	listcriteria = listcriteria + "<td>" + obj[i].roomSearch + "</td>"; 
				    	listcriteria = listcriteria + "<td>" + obj[i].priceSearchMin + "</td>"; 
				    	listcriteria = listcriteria + "<td>" + obj[i].priceSearchMax + "</td>"; 	
			    	
			    		listcriteria = listcriteria + "<td>" + "<button onclick='delSearchCustomerVisitor(" + "\"" + obj[i].idCustomerSearch + "\"" + ",\"" + emailvisitor  + "\"" + ")'>Supp</button>" + "</td>"; 
			    		listcriteria = listcriteria + "</tr>";
					<?php } ?>

		    	}

		    	listcriteria = listcriteria + "</table>";
				document.getElementById("listcriteria").innerHTML = listcriteria;  
		    }
		  };
		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		  
		}

		function delSearchCustomerVisitor(idCustomerSearch, emailvisitor) {
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'deleteSearchCustomer' + '&login=' + '&keyEmailAccount=' + '&pwdCripted=' + '&keyCustomer=' + '&idc=' + '&keySearchCustomer=' + idCustomerSearch;
		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;			    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					readSearchCustomerVisitor(emailvisitor);
					document.getElementById("msgaccountvisitor").innerHTML = "Cette recherche a été supprimée";
					document.getElementById("msgaccountvisitor").style.color = "green";
	        		document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
				}else if (obj.exitvalue == "1") {
					document.getElementById("msgaccountvisitor").innerHTML = "Une erreur est survenue, merci de recommencer";
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";   
				}else {
					document.getElementById("msgaccountvisitor").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
				}
		    }
		  };
		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		  
		}


	function getExitPwdOkCustomerAccountFromWeb() {
		var emailvisitor = document.getElementById('emailvisitor').value;
		if (!empty_field(emailvisitor)){ setMsgError('msgaccountvisitor', 'Email doit être renseigné', 'emailvisitor'); return;}
		if (!validateEmail(emailvisitor)){ setMsgError('msgaccountvisitor', 'Email invalide ', 'emailvisitor'); return;}
	    if (emailvisitor.length > 70) { setMsgError('msgaccountvisitor', 'Email est trop long ', 'emailvisitor'); return;}
		emailvisitor = emailvisitor.trim();


		var pwdvisitor = document.getElementById('pwdvisitor').value;
		if (!sanitize_string(pwdvisitor)){	setMsgError('msgaccountvisitor', "Le mote de passe n'est pas valide!", 'pwdvisitor'); return;}

		pwdvisitor = pwdvisitor.trim();
		var pwdCripted = "";
		try{
		    pwdCripted = MD5(pwdvisitor);
	    }catch(err) {
	    	document.getElementById('msgaccountvisitor').innerHTML = 'Mot de passe ' + err.message;
	        document.getElementById("msgaccountvisitor").style.color = "red";
	        document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
	    	return;
	    }

		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'getExitPwdOkCustomerAccountFromWeb' + '&login=' + emailvisitor + '&keyEmailAccount=' + '&pwdCripted=' + pwdCripted + '&keyCustomer=' + '&idc=';
		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		    	
				var obj = JSON.parse(result); 
				
				if (obj.exitvalue == "0") {;
					connected = true;
					emailCustomerForDel = emailvisitor;
					document.getElementById("msgaccountvisitor").innerHTML = "Vous êtes connecté";
					document.getElementById("msgaccountvisitor").style.color = "green";
	        		document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
	        		readSearchCustomerVisitor(emailvisitor);
				}else if (obj.exitvalue == "1") {
					document.getElementById("msgaccountvisitor").innerHTML = "Ce compte n'existe pas";
					document.getElementById("msgaccountvisitor").style.color = "green";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";   
				}else if (obj.exitvalue == "2") {
					document.getElementById("msgaccountvisitor").innerHTML = "Le mot de passe est invalide";
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";   
				}else {
					document.getElementById("msgaccountvisitor").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgaccountvisitor").style.color = "red";
     				document.getElementById("msgaccountvisitor").style.fontWeight = "bold";
				}
		    }
		  };
		   
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}


	function changeImg(urlImg){
			document.getElementById('img').src = urlImg + '&s=true&w=600&h=400';
			reloadPub();	
	}
	function reloadPub() {	
	   document.getElementById('adsgoogle').contentDocument.location.reload(true);
   	}
   	function show_phone(phone) {
		document.getElementById('button_show_phone').innerHTML = 'Tél. ' + phone;
	}

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
		var wordingFrom = "immobilier-fr.fr";     
		var subject = "Demande d'information sur un bien";
		var htmlBody = "Bonjour vous avez recu une demande d'information de la part de : " + nameprospect + "<br><br>Email: " + emailprospect + " tél. " + phoneprospect + "<br><br>Conernant le bien " + typeProperty + ' ' + room + ' ' + surface + ' ' + city + ' Ref: ' + id + "<br><br>Message: " + messageprospect + "<br><br><a href='https://www.immobilier-fr.fr'>www.immobilier-fr.fr</a>  <a href='https://apps.facebook.com/logicielimmobilierfr'>logicielimmobilierfr sur Facebook</a>";


		var msgBody = "Bonjour vous avez recu une demande d'information de la part de : " + nameprospect + " Email: " + emailprospect + "tél. " + phoneprospect + " conernant le bien " + typeProperty + ' ' + room + ' ' + surface + ' ' + city + ' Ref: ' + id + "Message: " + messageprospect + " immobilier-fr https://apps.facebook.com/logicielimmobilierfr/";
	

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
        		putCustomerAccountFromWebSite();
        		
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

	function putCustomerAccountFromWebSite() {

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

		emailprospect = emailprospect.trim();
			
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'putCustomerAccount' + '&login=' + keyEmailAccount + '&keyEmailAccount=' + keyEmailAccount + '&pwdCripted=' + '' + '&keyCustomer=' + '' + '&idc=' + '0' + '&emailCustomer=' + emailprospect + '&name=' + '' + '&firstName=' + nameprospect + '&phone=' + phoneprospect;

		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;		    	
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {;
					document.getElementById("msgsendmessage").innerHTML = "Votre compte a été enregistré";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";
	        		putCustomerFromWebSite();
				}else if (obj.exitvalue == "2") {
					document.getElementById("msgsendmessage").innerHTML = "Votre compte est déjà enregistré." + obj.exitvalue;
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
					document.getElementById("msgsendmessage").innerHTML = "Votre demande a été enregistré et votre message est envoyé";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";
	        		putSearchCustomerFromWebSite();
				}else if (obj.exitvalue == "2") {
					document.getElementById("msgsendmessage").innerHTML = "Votre demande a été enregistré et votre message est envoyé." + obj.exitvalue;
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
					document.getElementById("msgsendmessage").innerHTML = "Votre recherche a été enregistrée et envoyée";
					document.getElementById("msgsendmessage").style.color = "green";
	        		document.getElementById("msgsendmessage").style.fontWeight = "bold";

				}else if (obj.exitvalue == "2") {
					document.getElementById("msgsendmessage").innerHTML = "Votre recherche a été enregistrée et envoyée." + obj.exitvalue;
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

	function validation_field(typefield, idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax){  
    	if (typefield == 'email'){
    		return validation_field_email(idField, idmsg, msgempty, msginvalid, toolong, lgmax);
    	}else if (typefield == 'password'){
    		return validation_field_password(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax);
    	}else if (typefield == 'domain'){
    		return validation_field_domain(idField, idmsg, msgempty, msginvalid);
    	}else if (typefield == 'text'){
    		return validation_field_string(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax);
    	}
	}

	function validation_field_email(idField, idmsg, msgempty, msginvalid, toolong, lgmax){    
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg);
    	if (msgempty != ''){
  			if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}
  		}
  		if (field_validation != ''){
  			if (!validateEmail(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}
  		}
      if (field_validation.length > parseInt(lgmax)) { setMsgError(idmsg, toolong, idField); return false;}
      return true;
    }
    function validation_field_password(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax){    	
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg); 
  		if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}
  		if (!sanitize_string(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}
  		if (field_validation.length < parseInt(lgmin)) { setMsgError(idmsg, tooshort, idField); return false;}
  		if (field_validation.length > parseInt(lgmax)) { setMsgError(idmsg, toolong, idField); return false;}
      return true;		
    }
    function validation_field_domain(idField, idmsg, msgempty, msginvalid){    	
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg);
  		if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}
  		if (!CheckIsValidDomain(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}
      return true;    
    }
    function validation_field_string(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax){    	
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg);
    	if (msgempty != ''){
    		if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}	
    	}		
  		if (!sanitize_string(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}   
  		if (field_validation.length < parseInt(lgmin)) { setMsgError(idmsg, tooshort, idField);return false;}
      if (field_validation.length > parseInt(lgmax)) { setMsgError(idmsg, toolong, idField);return false;}
      return true;    
	}


    function setMsgError(idmsg, msgError, idField){
    	if (idmsg == 'msglogin'){  
	    	vmproperty.messageRed = true;
			vmproperty.message = msgError;  
		} 
    /*  document.getElementById(idmsg).innerHTML = msgError;
      document.getElementById(idmsg).style.color = "red";
      document.getElementById(idmsg).style.fontWeight = "bold";
      document.getElementById(idField).focus();
      document.getElementById(idField).style.color = "red";*/
    }

    function resetColorField(idField, idmsg){
    	if (idmsg == 'msglogin'){  
	    	vmproperty.messageRed = false;
			vmproperty.message = '';  
		} 
    /*  document.getElementById(idField).style.color = 'black';         
      document.getElementById(idmsg).innerHTML = '';
      document.getElementById(idmsg).style.color = "green";*/
    }

    function resetColorFieldMsg(idmsg){ 
    	if (idmsg == 'msglogin'){    
	    	vmproperty.messageRed = false;
			vmproperty.message = '';  
		}  
    /*  document.getElementById(idmsg).innerHTML = '';
      document.getElementById(idmsg).style.color = "green";*/
    }

</script>


<script type="text/javascript">
	var pwdCripted = '';
	
	function save_account(mobile){
		var regex = /[|<|,|>|\/|"|{|\[|}|\]|\||\\|~|`|!|@|#|\$|%|\^|&|\*|\(|\)|_|=]+/;
		var regexEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		document.getElementById('msgaccount').innerHTML = '';

		if (mobile == 'mobile'){
			if (document.getElementById('authorisationRgpdMobile').checked == false){
				set_message('msgaccount', 'red', 'bold', 'Vous devez cocher J\’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m\'envoyer des emails.');
				document.getElementById('authorisationRgpdMobile').focus();
				return;
			}
		}else{
			if (document.getElementById('authorisationRgpd').checked == false){
				set_message('msgaccount', 'red', 'bold', 'Vous devez cocher J\’autorise immobilier-fr.fr et ses partenaires à enregistrer mes données et m\'envoyer des emails.');
				document.getElementById('authorisationRgpd').focus();
				return;
			}
		}
		var agency = document.getElementById('agency').value;
		if (agency == ''){ set_message('msgaccount', 'red', 'bold', 'L\'agence doit être renseignée');	document.getElementById('agency').focus();return;}
		if( agency.match( regex ) != null ) {
          set_message('msgaccount', 'red', 'bold', 'L\'agence n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('agency').focus();	return;
      	}
      	if (agency.length <3){set_message('msgaccount', 'red', 'bold', 'Le nom de l\'agence est trop court');document.getElementById('agency').focus();	return;}
      	if (agency.length >30){set_message('msgaccount', 'red', 'bold', 'Le nom de l\'agence est trop long');document.getElementById('agency').focus();	return;}
		

      	var lastName = document.getElementById('lastName').value;
		if (lastName == ''){ set_message('msgaccount', 'red', 'bold', 'Le nom doit être renseigné');	document.getElementById('lastName').focus();return;}
		if( lastName.match( regex ) != null ) {
          set_message('msgaccount', 'red', 'bold', 'Le nom n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('lastName').focus();	return;
      	}
      	if (lastName.length <3){set_message('msgaccount', 'red', 'bold', 'Le nom est trop court');document.getElementById('lastName').focus();	return;}
      	if (lastName.length >30){set_message('msgaccount', 'red', 'bold', 'Le nom est trop long');document.getElementById('lastName').focus();	return;}
		

		var firstName = document.getElementById('firstName').value;
		if (firstName == ''){ set_message('msgaccount', 'red', 'bold', 'Le prénom doit être renseigné');	document.getElementById('firstName').focus();return;}
		if( firstName.match( regex ) != null ) {
          set_message('msgaccount', 'red', 'bold', 'Le prénom n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('firstName').focus();	return;
      	}
      	if (firstName.length <3){set_message('msgaccount', 'red', 'bold', 'Le prénom est trop court');document.getElementById('firstName').focus();	return;}
      	if (firstName.length >30){set_message('msgaccount', 'red', 'bold', 'Le prénom est trop long');document.getElementById('firstName').focus();	return;}
		

      	var login = document.getElementById('emailcreateaccount').value;
		if (login == ''){ set_message('msgaccount', 'red', 'bold', 'L\'email doit être renseigné');	document.getElementById('login').focus();return;}		
		if( regexEmail.test(login) != true ) {
          set_message('msgaccount', 'red', 'bold', 'Email invalide'); document.getElementById('login').focus();	return;
      	}
      	if (login.length <7){set_message('msgaccount', 'red', 'bold', 'Email est trop court');document.getElementById('firstName').focus();	return;}
      	if (login.length >70){set_message('msgaccount', 'red', 'bold', 'Email est trop long');document.getElementById('firstName').focus();	return;}
		

      	var phone = document.getElementById('phone').value;
		if (phone == ''){ set_message('msgaccount', 'red', 'bold', 'Le téléphone doit être renseigné');	document.getElementById('phone').focus();return;}
		if( phone.match( regex ) != null ) {
          set_message('msgaccount', 'red', 'bold', 'Le téléphone n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('phone').focus();	return;
      	}
      	if (phone.length <10){set_message('msgaccount', 'red', 'bold', 'Le téléphone est trop court');document.getElementById('phone').focus();	return;}
      	if (phone.length >20){set_message('msgaccount', 'red', 'bold', 'Le téléphone est trop long');document.getElementById('phone').focus();	return;}
		

      	var address = document.getElementById('address').value;
		if (address == ''){ set_message('msgaccount', 'red', 'bold', 'L\'adresse doit être renseignée');	document.getElementById('address').focus();return;}
		if( address.match( regex ) != null ) {
          set_message('msgaccount', 'red', 'bold', 'L\'adresse n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('address').focus();	return;
      	}
      	if (address.length <3){set_message('msgaccount', 'red', 'bold', 'L\'adresse est trop courte');document.getElementById('address').focus();	return;}
      	if (address.length >70){set_message('msgaccount', 'red', 'bold', 'L\'adresse est trop longue');document.getElementById('address').focus();	return;}
		
		
		var city = document.getElementById('citycreate').value;
		if (city == ''){ set_message('msgaccount', 'red', 'bold', 'La ville doit être renseignée');	document.getElementById('citycreate').focus();return;}
		if( city.match( regex ) != null ) {
          set_message('msgaccount', 'red', 'bold', 'La ville n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('citycreate').focus();	return;
      	}
      	if (city.length <3){set_message('msgaccount', 'red', 'bold', 'Le nom de la ville est trop court');document.getElementById('citycreate').focus();	return;}
      	if (city.length >30){set_message('msgaccount', 'red', 'bold', 'Le nom de la ville est trop long');document.getElementById('citycreate').focus();	return;}
		

		var zip = document.getElementById('cpcreate').value;
		if (zip == ''){ set_message('msgaccount', 'red', 'bold', 'Le code postal doit être renseigné');	document.getElementById('cpcreate').focus();return;}
		if( zip.match( regex ) != null ) {
          set_message('msgaccount', 'red', 'bold', 'Le code postal n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('cpcreate').focus();	return;
      	}
      	if (zip.length <5){set_message('msgaccount', 'red', 'bold', 'Le code postal est trop court');document.getElementById('cpcreate').focus();	return;}
      	if (zip.length >5){set_message('msgaccount', 'red', 'bold', 'Le code postal est trop long');document.getElementById('cpcreate').focus();	return;}
		

		var pwd = document.getElementById('pwdcreateaccount').value;
		if (pwd == ''){ set_message('msgaccount', 'red', 'bold', 'Le mot de passe doit être renseigné');	document.getElementById('pwdcreateaccount').focus();return;}
		if(! sanitize_string(pwd)) {
          set_message('msgaccount', 'red', 'bold', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres'); document.getElementById('pwdcreateaccount').focus();	return;
      	}
      	if (pwd.length <7){set_message('msgaccount', 'red', 'bold', 'Le mot de passe est trop court');document.getElementById('pwdcreateaccount').focus();	return;}
      	if (pwd.length >20){set_message('msgaccount', 'red', 'bold', 'Le mot de passe est trop long');document.getElementById('pwdcreateaccount').focus();	return;}

		// save in db

     //   var url = 'https://real-estate-france-DB.appspot.com/accountcustomer';
		var login = document.getElementById('emailcreateaccount').value;
		var pwd = document.getElementById('pwdcreateaccount').value;
		
		login = login.trim();
		pwd = pwd.trim();
		var pwd = pwd.substring(0, 8);

		var firstName = document.getElementById('firstName').value;

		try{
		    pwdCripted = MD5(pwd);
		    pwdCripted = pwdCripted.substring(0, 8);
	    }catch(err) {
	    	document.getElementById('msgaccount').innerHTML = 'Mot de passe ' + err.message;
	        document.getElementById("msgaccount").style.color = "red";
	        document.getElementById("msgaccount").style.fontWeight = "bold";
	    	return;
	    }
		getExistAccount(login, pwdCripted, firstName);
	        document.getElementById("msgaccount").style.color = "green";
	        document.getElementById("msgaccount").style.fontWeight = "bold";

	}

	function getExistAccount(login, pwdCriptedMd5, firstName) {
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    //	document.getElementById("msgaccount").innerHTML = result;
		    //	result = result.replace('JSON_CALLBACK(', '');
			//	result = result.replace(');', '');
				var obj = JSON.parse(result); 
				if (obj.exitvalue == '0') {				
					document.getElementById("msgaccount").innerHTML = "Ce compte " + login + " existe déjà vous pouvez vous connecter avec cet email et ce mot de passe";
					document.getElementById("msgaccount").style.color = "green";
	         		document.getElementById("msgaccount").style.fontWeight = "bold";
	         	//	update_pwd_wp_db(login, pwdCriptedMd5);	         		
				}else if (obj.exitvalue == '9'){
				//	lock_fields_account();
					sendValidationCreationAccount(login, pwdCriptedMd5, firstName) ;
					document.getElementById("msgaccount").innerHTML = "Création du compte " + login;
					document.getElementById("msgaccount").style.color = "green";
	        		document.getElementById("msgaccount").style.fontWeight = "bold";
				}else if (obj.exitvalue == '3'){
					document.getElementById("msgaccount").innerHTML = "Le mot de passe est invalide pour ce compte " + login + " cliquez sur Mot de passe oublié dans le menu";
					document.getElementById("msgaccount").style.color = "green";
	        		document.getElementById("msgaccount").style.fontWeight = "bold";
				}				
		    }
		  };
		  var data_string = '&service=' + 'getAuthorisation' + '&login=' + login + "&idFaceBook=" + "&pwd=" + pwdCriptedMd5 + "&software=WP";
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}

	function sendValidationCreationAccount(login, pwdCriptedMd5, firstName) {
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    	result = result.replace('JSON_CALLBACK(', '');
				result = result.replace(');', '');
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {
					var id = "button_save_account"; 
					document.getElementById(id).disabled = true;
					vmproperty.validationcreateaccount = true;
				//	var id = "ele_validation_account";
				//	show_ele(id);
					document.getElementById('code').value = "";
					document.getElementById("msgaccount").innerHTML = "Un email de validation vous a été envoyé avec un code, merci de regarder votre boite mail " + login;
					document.getElementById("msgaccountvalidation").innerHTML = "Entrez le code pour la validation de votre compte, merci de regarder votre boite mail " + login;
					document.getElementById("msgaccountvalidation").style.color = "green";
	        		document.getElementById("msgaccountvalidation").style.fontWeight = "bold";	        		
				}else{					
					document.getElementById("msgaccountvalidation").innerHTML = "Une erreur est survenue, merci de recommencer ";
					document.getElementById("msgaccountvalidation").style.color = "red";
	         		document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
				}
		    }
		  };
		  var data_string = '&service=' + 'validationCreationAccount' + '&login=' + login + '&c=' + pwdCriptedMd5 + '&fn=' + firstName;
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}

	function test_code_ok() {
		if (!validation_field('text', 'code', 'msgaccount', 'Le code doit être renseigné', 'Le code n\'est pas valide! uniquement des lettres et des chiffres', 'Le code est trop court', 'Le code est trop long', 5, 50)) return;
		var code = document.getElementById('code').value;
		code = code.trim();
		if (pwdCripted == code){
			document.getElementById("msgaccountvalidation").innerHTML = "Votre compte est en création";
			document.getElementById("msgaccountvalidation").style.color = "green";
	        document.getElementById("msgaccountvalidation").style.fontWeight = "bold";	  
	        document.getElementById("button_validation_account").disabled = true;
	        postAccount();
		}else{
			document.getElementById("msgaccountvalidation").innerHTML = "Le code n'est pas valide, veuillez copier le code de l'email que vous avez reçu ";
			document.getElementById("msgaccountvalidation").style.color = "red";
     		document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
		}
		
	}
	
	function lock_fields_account() {
		document.getElementById("agency").setAttribute("readonly", true);
		document.getElementById("lastName").setAttribute("readonly", true);
		document.getElementById("firstName").setAttribute("readonly", true);
		document.getElementById("address").setAttribute("readonly", true);
		document.getElementById("city").setAttribute("readonly", true);
		document.getElementById("cp").setAttribute("readonly", true);
		document.getElementById("country").setAttribute("readonly", true);
		document.getElementById("emailcreateaccount").setAttribute("readonly", true);
		document.getElementById("pwdcreateaccount").setAttribute("readonly", true);
		document.getElementById("phone").setAttribute("readonly", true);
	}

	function postAccount() {
		if (!validation_field('text', 'country', 'msgaccount', 'Le pays doit être renseigné', 'Le pays n\'est pas valide! uniquement des lettres et des chiffres', 'Le pays est trop court', 'Le pays est trop long', 3, 30)) return;
		var country = document.getElementById('country').value;
		
		if (!validation_field('text', 'agency', 'msgaccount', 'L\'agence doit être renseignée', 'L\'agence n\'est pas valide! uniquement des lettres et des chiffres', 'Le nom de l\'agence est trop court', 'Le nom de l\'agence est trop long', 3, 30)) return;
		var agency = document.getElementById('agency').value;
		
		if (!validation_field('text', 'lastName', 'msgaccount', 'Le nom doit être renseigné', 'Le nom n\'est pas valide! uniquement des lettres et des chiffres', 'Le nom est trop court', 'Le nom est trop long', 3, 30)) return;
		var lastName = document.getElementById('lastName').value;

		if (!validation_field('text', 'firstName', 'msgaccount', 'Le prénom doit être renseigné', 'Le prénom n\'est pas valide! uniquement des lettres et des chiffres', 'Le prénom est trop court', 'Le prénom est trop long', 3, 30)) return;
		var firstName = document.getElementById('firstName').value;

		if (!validation_field('text', 'address', 'msgaccount', 'L\'adresse doit être renseignée', 'L\'adresse n\'est pas valide! uniquement des lettres et des chiffres', 'L\'adresse est trop courte', 'L\'adresse est trop longue', 3, 70)) return;
		var address = document.getElementById('address').value;

		if (!validation_field('text', 'citycreate', 'msgaccount', 'La ville doit être renseignée', 'La ville n\'est pas valide! uniquement des lettres et des chiffres', 'Le nom de la ville est trop court', 'Le nom de la ville est trop long', 3, 30)) return;
		var city = document.getElementById('citycreate').value;

		if (!validation_field('text', 'cpcreate', 'msgaccount', 'Le code postal doit être renseigné', 'Le code postal n\'est pas valide! uniquement des lettres et des chiffres', 'Le code postal est trop court', 'Le code postal est trop long', 5, 5)) return;
		var zip = document.getElementById('cpcreate').value;

		if (!validation_field('email', 'emailcreateaccount', 'msgaccount', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('emailcreateaccount').value;

		if (!validation_field('password', 'pwdcreateaccount', 'msgaccount', 'Le mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var pwd = document.getElementById('pwdcreateaccount').value;

		if (!validation_field('text', 'phone', 'msgaccount', 'Le téléphone doit être renseigné', 'Le téléphone n\'est pas valide! uniquement des lettres et des chiffres', 'Le téléphone est trop court', 'Le téléphone est trop long', 10, 20)) return;
		var phone = document.getElementById('phone').value;
		
		var	email = login.trim();
			pwd = pwd.trim();
			
		try{
		    pwdCriptedMd5 = MD5(pwd);
	    }catch(err) {
	    	document.getElementById('msgaccount').innerHTML = 'Mot de passe ' + err.message;
	        document.getElementById("msgaccount").style.color = "red";
	        document.getElementById("msgaccount").style.fontWeight = "bold";
	    	return;
	    }

		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();

		  xmlhttp.onreadystatechange = function() {		  	
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    //	result = result.replace('JSON_CALLBACK(', '');
			//	result = result.replace(');', '');
				
				var obj = JSON.parse(result); 
				if (obj.exitvalue == "0") {
					vmproperty.createaccountbuttonform = false;
					vmproperty.modifaccountbuttonform = true;
					vmproperty.createaccount = false;
					
					document.getElementById("msgaccountvalidation").innerHTML = "Votre compte a été créé sur Real estate, vous êtes connecté avec cet email et le mot de passe que vous avez saisi";
					document.getElementById("msgaccountvalidation").style.color = "green";
	        		document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
	        		var id = "ele_save_account";

	        		document.getElementById('email').value = login;
					document.getElementById('pwd').value = pwd;
					login_realestate();
					
				//	hidden_ele(id);
				//	update_pwd_wp_db(email, pwdCriptedMd5);
				}else{
					document.getElementById("msgaccountvalidation").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgaccountvalidation").style.color = "red";
     				document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
				}
		    }
		  };

		   var data_string = '&service=' + 'putRegistration' + '&software=WP' + '&login=' + email + '&pwd=' + pwdCriptedMd5 + '&urlBaseAccount=' + 'https://real-estate-france-db-prod.appspot.com' + '&urlBaseServerApp=' + 'https://real-estate-france-db-prod.appspot.com' + '&urlBaseServerBilling=' + 'https://real-estate-france-db-prod.appspot.com' + '&lang=' + 'French' + '&agency=' + agency + '&idc=' + '' + '&keyCustomer=' + '' + '&agency=' + agency + '&agencyGroup=' + '' + '&masterAgency=' + '' + '&firstName=' + firstName + '&lastName=' + lastName + '&address=' + address + '&zip=' + zip + '&city=' + city + '&country=' + country + '&email=' + email + '&phone=' + phone + '&idFaceBook=' + idFaceBook;


		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}


	function show_ele(id)
		{		
		    document.getElementById(id).style.visibility="visible";
		    return true;
		}
	function hidden_ele(id)
		{
		    document.getElementById(id).style.visibility="hidden";
		    return true;
		}
</script>


<script type="text/javascript">
	var pwdCripted = '';
	
	function change_pwd(){
		// save in db

		vmproperty.msgloginshow = true;
	//	document.getElementById("msgloginshow").style.display = '';
        var url = 'https://real-estate-france-db-prod.appspot.com/managedbmysql';

		if (!validation_field('email', 'email', 'msglogin', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;
		login = login.trim();

		if (!validation_field('password', 'pwd', 'msglogin', 'L\'ancien mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var oldpwd = document.getElementById('pwd').value;
		oldpwd = oldpwd.trim();

		var newpwd = document.getElementById('newpwd').value;
		if (!validation_field('password', 'newpwd', 'msglogin', 'Le nouveau mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var newpwd = document.getElementById('newpwd').value;
		newpwd = newpwd.trim();

		var newPwdCripted = "";

		 try{
		    oldPwdCripted = MD5(oldpwd);
	    }catch(err) {
	    	vmproperty.messageRed = true;
			vmproperty.message = 'Ancien mot de passe ' + err.message; 
	    	return;
	    }
	    try{
		    newPwdCripted = MD5(newpwd);
	    }catch(err) {
	    	vmproperty.messageRed = true;
			vmproperty.message = 'Nouveau mot de passe ' + err.message; 
	    	return;
	    }
		changePwd(login, oldPwdCripted, newPwdCripted);
		vmproperty.messageRed = false;

	}

	function changePwd(login, oldPwdCripted, newPwdCripted) {
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    //	document.getElementById("msglogin").innerHTML = result;
		    	result = result.replace('(', '');
				result = result.replace(');', '');
			//	lock_fields_pwd();
				var obj = JSON.parse(result); 
				if (obj.exitvalue == '0') {	
					vmproperty.messageRed = false;
					vmproperty.message = "Votre mot de passe a été changé pour le login " + login;
				}else if (obj.exitvalue == '2'){
					vmproperty.messageRed = true;
					vmproperty.message = "Votre ancien mot de passe est erroné " + login;
				}else if (obj.exitvalue == '1'){
					property.messageRed = true;
					vmproperty.message = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
				}else if (obj.exitvalue == '3'){
					vmproperty.messageRed = true;
					vmproperty.message = "Ce compte n'existe pas, merci de recommencer " + obj.exitvalue;
				}
				else if (obj.exitvalue == '9'){
					vmproperty.messageRed = true;
					vmproperty.message = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
				}else if (obj.exitvalue == '10'){
					vmproperty.messageRed = true;
					vmproperty.message = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
				}					
		    }
		  };
		  var data_string = '&service=' + 'changePwd' + '&login=' + login + "&oldPwdCripted=" + oldPwdCripted + "&newPwdCripted=" + newPwdCripted;
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}
		

	function lock_fields_pwd() {
	//	document.getElementById("email").setAttribute("readonly", true);
	//	document.getElementById("oldpwd").setAttribute("readonly", true);
	//	document.getElementById("newpwd").setAttribute("readonly", true);
	}
	function set_message(id, color, bold, message) {
		document.getElementById(id).innerHTML = message;
	    document.getElementById(id).style.color = color;
	    if (bold == 'bold'){ document.getElementById(id).style.fontWeight = "bold";}
	}

</script>

<?php if ( $_SERVER['REQUEST_URI'] == "/wp-admin/admin.php?page=realestate_main_menu_" ) { ?>
	<?php global $wpdb;
	$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
	 ?>
	<script>		
		getLoginPasswordOk('<?php echo $result->email_realestate ?>', '<?php echo $result->pwd_realestate ?>', "", "");
	</script>	
<?php } ?>
</body>
</html>
