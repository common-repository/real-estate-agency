<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wrap">  
 <h2>Administration création compte Real Estate</h2> Merci de renseigner les informations
</div> 

<?php
	wp_enqueue_script('script_md5', plugins_url('md5.js', __FILE__));  
	wp_enqueue_script( 'validationfield', plugins_url( 'validationfield.js', __FILE__ ) ); 
?>
<div>
<!--	<form >  DELETE FROM `wp_realestate` WHERE `wp_realestate`.`id` = 1 -->
	<table width="60%" align="left">
		<tr align="left"><th align="left">Agence</th><th align="left">Nom</th><th align="left">Prénom</th></tr>
		<tr>
			<td align="left"><input style="width: 100%" type="text" title="Three letter country code" id="agency" onkeydown="resetColorField('agency');" value="<?php echo $agency ?>"/></td>
			<td align="left"><input style="width: 100%" type="text" id="lastName" onkeydown="resetColorField('lastName');" value="<?php echo $lastName ?>"/></td>
			<td align="left"><input style="width: 100%" type="text" id="firstName" onkeydown="resetColorField('firstName');" value="<?php echo $firstName ?>"/></td>		
		</tr>
		<tr>
			<th colspan="2" align="left">Addresse</th>			
		</tr>
		<tr>
			<td colspan="2" align="left"><input style="width: 100%" type="text" id="address" onkeydown="resetColorField('address');" value="<?php echo $address ?>"/></td>
		</tr>
		<tr>
			<th align="left">Ville</th><th align="left">Cp</th><th align="left">Pays</th><th align="left"></th>				
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="text" id="city" onkeydown="resetColorField('city');" value="<?php echo $city ?>"/></td>
			<td align="left"><input style="width: 100%" type="text" id="cp" onkeydown="resetColorField('cp');" value="<?php echo $cp ?>"/></td>
			<td align="left"><input style="width: 100%" type="text" id="country" readonly value="France"/></td>					
		</tr>
		<tr>
			<th align="left">Email</th><th align="left">Mot de passe</th><th align="left">Téléphone</th><th align="left"></th> <!--<th align="left">Email annonce web</th><th align="left"></th>-->
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="email" id="email" onkeydown="resetColorField('email');" value="<?php echo $email ?>"/></td>
			<td align="left"><input style="width: 100%" type="email" id="pwd" onkeydown="resetColorField('pwd');" value="<?php echo $pwd ?>"/></td>
			<td align="left"><input style="width: 100%" type="text" id="phone" onkeydown="resetColorField('phone');" value="<?php echo $phone ?>"/></td>						
		</tr>


		<tr id="ele_save_account">
			<td><br><button id="button_save_account" onclick="save_account();">Enregistrer</button></td><td colspan="2"><br><p id="msgaccount"></p></td> 		
		</tr>
		<tr id="ele_validation_account" style="visibility:hidden">
			<td  align="left"><br><input type="text" id="code" placeholder="Votre code" value=""/>&nbsp;&nbsp;<button id="button_validation_account" onclick="test_code_ok();">Validation</button></td><td colspan="2"><br><p id="msgaccountvalidation"></p></td> 		
		</tr>
		<tr>
					
		</tr>
	</table>
<!--</form>-->
</div>

<script type="text/javascript">
	var pwdCripted = '';
	var url_plugins = <?php echo json_encode(plugins_url()); ?>;
	
	function save_account(){
		if (!validation_field('text', 'agency', 'msgaccount', 'L\'agence doit être renseignée', 'L\'agence n\'est pas valide! uniquement des lettres et des chiffres', 'Le nom de l\'agence est trop court', 'Le nom de l\'agence est trop long', 3, 30)) return;
		var agency = document.getElementById('agency').value;
		
		if (!validation_field('text', 'lastName', 'msgaccount', 'Le nom doit être renseigné', 'Le nom n\'est pas valide! uniquement des lettres et des chiffres', 'Le nom est trop court', 'Le nom est trop long', 3, 30)) return;
		var lastName = document.getElementById('lastName').value;

		if (!validation_field('text', 'firstName', 'msgaccount', 'Le prénom doit être renseigné', 'Le prénom n\'est pas valide! uniquement des lettres et des chiffres', 'Le prénom est trop court', 'Le prénom est trop long', 3, 30)) return;
		var firstName = document.getElementById('firstName').value;

		if (!validation_field('text', 'address', 'msgaccount', 'L\'adresse doit être renseignée', 'L\'adresse n\'est pas valide! uniquement des lettres et des chiffres', 'L\'adresse est trop courte', 'L\'adresse est trop longue', 3, 70)) return;
		var address = document.getElementById('address').value;

		if (!validation_field('text', 'city', 'msgaccount', 'La ville doit être renseignée', 'La ville n\'est pas valide! uniquement des lettres et des chiffres', 'Le nom de la ville est trop court', 'Le nom de la ville est trop long', 3, 30)) return;
		var city = document.getElementById('city').value;

		if (!validation_field('text', 'cp', 'msgaccount', 'Le code postal doit être renseigné', 'Le code postal n\'est pas valide! uniquement des lettres et des chiffres', 'Le code postal est trop court', 'Le code postal est trop long', 5, 5)) return;
		var zip = document.getElementById('cp').value;

		if (!validation_field('email', 'email', 'msgaccount', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;

		if (!validation_field('password', 'pwd', 'msgaccount', 'Le mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var pwd = document.getElementById('pwd').value;

		if (!validation_field('text', 'phone', 'msgaccount', 'Le téléphone doit être renseigné', 'Le téléphone n\'est pas valide! uniquement des lettres et des chiffres', 'Le téléphone est trop court', 'Le téléphone est trop long', 10, 20)) return;
		var phone = document.getElementById('phone').value;

		// save in db

     //   var url = 'https://real-estate-france-DB.appspot.com/accountcustomer';

		var login = document.getElementById('email').value;
		var pwd = document.getElementById('pwd').value;
		
		login = login.trim();
		pwd = pwd.trim();

		var firstName = document.getElementById('firstName').value;

		try{
		    pwdCripted = MD5(pwd);
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
					lock_fields_account();	
					document.getElementById("msgaccount").innerHTML = "Ce compte " + login + " existe déjà cliquez sur Realestate v2";
					document.getElementById("msgaccount").style.color = "green";
	         		document.getElementById("msgaccount").style.fontWeight = "bold";
	         		update_pwd_wp_db(login, pwdCriptedMd5);	         		
				}else if (obj.exitvalue == '9'){
					lock_fields_account();
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
					var id = "ele_validation_account";
					show_ele(id);
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
		document.getElementById("email").setAttribute("readonly", true);
		document.getElementById("pwd").setAttribute("readonly", true);
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

		if (!validation_field('text', 'city', 'msgaccount', 'La ville doit être renseignée', 'La ville n\'est pas valide! uniquement des lettres et des chiffres', 'Le nom de la ville est trop court', 'Le nom de la ville est trop long', 3, 30)) return;
		var city = document.getElementById('city').value;

		if (!validation_field('text', 'cp', 'msgaccount', 'Le code postal doit être renseigné', 'Le code postal n\'est pas valide! uniquement des lettres et des chiffres', 'Le code postal est trop court', 'Le code postal est trop long', 5, 5)) return;
		var zip = document.getElementById('cp').value;

		if (!validation_field('email', 'email', 'msgaccount', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;

		if (!validation_field('password', 'pwd', 'msgaccount', 'Le mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var pwd = document.getElementById('pwd').value;

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
				if (obj.exitvalue == "0") {;
					document.getElementById("msgaccountvalidation").innerHTML = "Votre compte a été créé sur Real estate ";
					document.getElementById("msgaccountvalidation").style.color = "green";
	        		document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
	        		var id = "ele_save_account";
					hidden_ele(id);
					update_pwd_wp_db(email, pwdCriptedMd5);
				}else{
					document.getElementById("msgaccountvalidation").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgaccountvalidation").style.color = "red";
     				document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
				}
		    }
		  };

		   var data_string = '&service=' + 'putRegistration' + '&software=WP' + '&login=' + email + '&pwd=' + pwdCriptedMd5 + '&urlBaseAccount=' + 'https://real-estate-france-db-prod.appspot.com' + '&urlBaseServerApp=' + 'https://real-estate-france-db-prod.appspot.com' + '&urlBaseServerBilling=' + 'https://real-estate-france-db-prod.appspot.com' + '&lang=' + 'French' + '&agency=' + agency + '&idc=' + '' + '&keyCustomer=' + '' + '&agency=' + agency + '&agencyGroup=' + '' + '&masterAgency=' + '' + '&firstName=' + firstName + '&lastName=' + lastName + '&address=' + address + '&zip=' + zip + '&city=' + city + '&country=' + country + '&email=' + email + '&phone=' + phone + '&idFaceBook=';


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
	