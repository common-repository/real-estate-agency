<?php
/**
 * Template Name: RealEstateAccountVisitor
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
	if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
	if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour la Production

 ?>

<?php get_template_part( 'header', 'realestate' ); ?>



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

<?php if (! wp_is_mobile() ) { ?>
<p id="msgt"></p>
	<div id="primary">
		<main id="main" role="main">
			    <table>
					<tr>
				      	<td valign="top">
					    	<?php 
							$linkBackList = get_home_url() . '/';
							echo '<a href=' . $linkBackList . '><button class="button_realestate">Retour à la liste</button></a>';
							?>
						</td>
			   			<td style="width: 25%">
			   				<div class="text-placeholder"><input class="inputCustom" type="text" id="emailvisitor" placeholder="Email" value="" onblur="resetColorField('emailvisitor', 'msgsendmessage');"/>
			   				</div>
			   				</td>
			   			<td style="width: 25%">
			   				<div class="text-placeholder"><input class="inputCustom" type="text" id="pwdvisitor" placeholder="Mot de passe" value="" onblur="resetColorField('pwdvisitor', 'msgsendmessage');"/>
							</div>
			   				</td>
						<td valign="top" align="left">
							<button onclick="getExitPwdOkCustomerAccountFromWeb()" class="button_realestate">Connexion</button>
						</td>
						<td valign="top" align="left">
							<button onclick="send_pwd_forget()" class="button_realestate">Mot de passe oublié</button>
						</td>
					</tr>
					<tr>
				   		<td width='1%'></td>
			   			<td colspan="4"><p class="pCustom" id="msgaccountvisitor"></p></td>
			   			<td width='1%'></td>
			   		</tr>	
				</table>
				<table>
			      <tr valign="top">
			      	<td colspan="3">
			      		<p class="pCustom"><b>Liste de vos citères de recherche &nbsp;&nbsp;&nbsp;</b><button onclick="deleteCustomerAccountFromWeb()" class="button_realestate">Suppression du compte</button></p>
			      		<p class="pCustom" id="listcriteria"></p>

			      	</td>

      				<td width="1%"></td>
      		<!--		<?php if ( $pubOn ) { ?>
      				<?php if ( ! wp_is_mobile() ) { ?>
					<td align="left" valign="top" colspan="2">						
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<ins class="adsbygoogle"
							     style="display:inline-block;width:300px;height:600px"
							     data-ad-client="ca-pub-7351030609964877"
							     data-ad-slot="3770514742"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>						
		 			</td>  
		 			<?php } ?>	
		 			<?php } ?>-->
			   	</tr>

			    </table>
			    <table>
		    	<?php if ( $linkPromoOn) { ?> 
				<tr><td class="linkUnderline linkCustom">			
					<a href='https://votre-agence.immo-fr.fr/'>Votre site agence WordPress gratuit&nbsp;&nbsp;&nbsp;</a>				
					<a href='https://apps.facebook.com/logicielimmobilierfr/'>Application Facebook de gestion des sites&nbsp;&nbsp;&nbsp;</a>
					<a href='https://fr.wordpress.org/plugins/real-estate-agency/'>Plugin WordPress site Web et logiciel immo</a>
				</td>
				</tr>
				<?php } ?>
				<tr>
				<td>
					<?php
					echo '&nbsp;&nbsp;<a class="linkUnderline linkCustom" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a>';
					echo '&nbsp;&nbsp;<a class="linkUnderline linkCustom" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a>&nbsp;&nbsp;';
					?>
					<a class="linkUnderline linkCustom" href='https://immobilier-fr.fr/'>Propulsé by immmobilier-fr.fr </a>	
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
</div>
</div>
<?php } ?>	


<?php if ( wp_is_mobile() ) { ?>
<p id="msgt"></p>
	<div id="primary">
		<main id="main" role="main">
			    <table>
					<tr>
						<td></td>
				      	<td valign="top">
					    	<?php 
							$linkBackList = get_home_url() . '/';
							echo '<a href=' . $linkBackList . '><button class="button_realestate" style="width: 100%">Retour à la liste</button></a>';
							?>
						</td>
						<td>
			      		<button style="width: 100%" onclick="deleteCustomerAccountFromWeb()" class="button_realestate">Suppression du compte</button>
			      		</td>		
						<td></td>	   			
					</tr>

					<tr>
						<td></td>
			   			<td>
			   				<div class="text-placeholder"><input class="inputCustom" type="text" id="emailvisitor" placeholder="Email" value="" onblur="resetColorField('emailvisitor', 'msgsendmessage');"/>
			   				</div>
			   			</td>
			   			<td>
			   				<div class="text-placeholder"><input class="inputCustom" type="text" id="pwdvisitor" placeholder="Mot de passe" value="" onblur="resetColorField('pwdvisitor', 'msgsendmessage');"/>
			   				</div>
			   			</td>	
			   			<td></td>	
					</tr>
					<tr>
						<td></td>
						<td valign="top" align="left">
							<button style="width: 100%" onclick="getExitPwdOkCustomerAccountFromWeb()" class="button_realestate">Connexion</button>
						</td>
						<td valign="top" align="left">
							<button style="width: 100%" onclick="send_pwd_forget()" class="button_realestate">Mot de passe oublié</button>
						</td>
						<td></td>
					</tr>


					<tr>
				   		<td></td>
			   			<td colspan="2"><p class="pCustom" width="250px"id="msgaccountvisitor"></p></td>
			   			<td></td>
			   		</tr>	
				</table>
				<table>
			      <tr valign="top">
			      	<td></td>
			      	<td colspan="2" width="350px">
			      		<p class="pCustom"><b>Liste de vos citères de recherche &nbsp;&nbsp;&nbsp;</b></p>
			      		<p class="pCustom" id="listcriteria"></p>
			      	</td>
			      	<td></td>
			   	</tr>

			    </table>
			    <table>
		    	<?php if ( $linkPromoOn) { ?> 
				<tr>
					<td></td>
					<td colspan="2">			
					<a class="linkUnderline linkCustom" href='https://votre-agence.immo-fr.fr/'>Votre site agence WordPress gratuit&nbsp;&nbsp;&nbsp;</a>				
					<br><a class="linkUnderline linkCustom" href='https://apps.facebook.com/logicielimmobilierfr/'>Application Facebook de gestion des sites&nbsp;&nbsp;&nbsp;</a>
					<br><a class="linkUnderline linkCustom" href='https://fr.wordpress.org/plugins/real-estate-agency/'>Plugin WordPress site Web et logiciel immo</a>
					</td>
					<td></td>
				</tr>
				<?php } ?>
				<tr>
					<td></td>
					<td colspan="2">
					<?php
					echo '<a class="linkUnderline linkCustom" href="' . $urlDom . '/plansite/" target="_blank">Plan du site</a><br>';
						echo '<a class="linkUnderline linkCustom" href="' . $urlDom . '/politique-de-confidentialite/" target="_blank">Politique-de-confidentialite</a><br>';
					?>
					<a class="linkUnderline linkCustom" href='<?php echo $urlDom?>'>Propulsé by immmobilier-fr.fr </a>	
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
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->
</div>
</div>
</div>
<?php } ?>	


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
				document.getElementById("msgaccountvisitor").innerHTML = "Veuillez supprimer vos recherches pour supprimer votre compte";
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
			    	
			    		listcriteria = listcriteria + "<td>" + "<button class='button_realestate' onclick='delSearchCustomerVisitor(" + "\"" + obj[i].idCustomerSearch + "\"" + ",\"" + emailvisitor  + "\"" + ")'>Supp</button>" + "</td>"; 
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
			    	
			    		listcriteria = listcriteria + "<td>" + "<button class='button_realestate' onclick='delSearchCustomerVisitor(" + "\"" + obj[i].idCustomerSearch + "\"" + ",\"" + emailvisitor  + "\"" + ")'>Supp</button>" + "</td>"; 
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
