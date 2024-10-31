<?php if ( ! defined( 'ABSPATH' ) ) exit;?>
<?php
global $wpdb;
	$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
	 if ($result->email_realestate == '') {
		require_once('admin-account-realestate.php');
		return;
	 }else if ($result->pwd_realestate == ''){
	 	require_once('admin-login-realestate.php');
	 	return;
	 }	 
?>
<div class="wrap">  
 <h2>Administration changer le mot de passe Real Estate</h2> Merci de renseigner les informations
</div> 

<?php
	wp_enqueue_script('script_md5', plugins_url('md5.js', __FILE__));  
	wp_enqueue_script( 'validationfield', plugins_url( 'validationfield.js', __FILE__ ) ); 
//	 
 
?>
<div>
	<table align="left">
		<tr>
			<th align="left">Email</th><th align="left">Ancien mot de passe</th><th align="left">Nouveau mot de passe</th>
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="email" id="email" value="" onkeydown="resetColorField('email');" /></td>
			<td align="left"><input style="width: 100%" type="text" id="oldpwd" value="" onkeydown="resetColorField('oldpwd');" /></td>	
			<td align="left"><input style="width: 100%" type="text" id="newpwd" value="" onkeydown="resetColorField('newpwd');" /></td>					
		</tr>

		<tr id="ele_save_account">
			<td><br><button id="button_change_pwd" onclick="change_pwd();">Enregistrer nouveau mot de passe</button></td><td colspan="2"><br><p id="msgpwd"></p></td> 	
		</tr>
		
	</table>
</div>

<script type="text/javascript">
	var pwdCripted = '';
	var url_plugins = <?php echo json_encode(plugins_url()); ?>;
	
	function change_pwd(){
		// save in db

        var url = 'https://real-estate-france-db-prod.appspot.com/managedbmysql';

		if (!validation_field('email', 'email', 'msgpwd', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;
		login = login.trim();

		if (!validation_field('password', 'oldpwd', 'msgpwd', 'L\'ancien mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var oldpwd = document.getElementById('oldpwd').value;
		oldpwd = oldpwd.trim();

		var newpwd = document.getElementById('newpwd').value;
		if (!validation_field('password', 'newpwd', 'msgpwd', 'Le nouveau mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var newpwd = document.getElementById('newpwd').value;
		newpwd = newpwd.trim();

		var newPwdCripted = "";

		 try{
		    oldPwdCripted = MD5(oldpwd);
	    }catch(err) {
	    	document.getElementById('msgpwd').innerHTML = 'Ancien mot de passe ' + err.message;
	        document.getElementById("msgpwd").style.color = "red";
	        document.getElementById("msgpwd").style.fontWeight = "bold";
	    	return;
	    }
	    try{
		    newPwdCripted = MD5(newpwd);
	    }catch(err) {
	    	document.getElementById('msgpwd').innerHTML = 'Nouveau mot de passe ' + err.message;
	        document.getElementById("msgpwd").style.color = "red";
	        document.getElementById("msgpwd").style.fontWeight = "bold";
	    	return;
	    }
	  
		changePwd(login, oldPwdCripted, newPwdCripted);
	        document.getElementById("msgpwd").style.color = "green";
	        document.getElementById("msgpwd").style.fontWeight = "bold";

	}

	function changePwd(login, oldPwdCripted, newPwdCripted) {
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    	document.getElementById("msgpwd").innerHTML = result;
		    	result = result.replace('(', '');
				result = result.replace(');', '');
				lock_fields_pwd();
				var obj = JSON.parse(result); 
				if (obj.exitvalue == '0') {	
					changePwd_wp_db(login, newPwdCripted);
					document.getElementById("msgpwd").innerHTML = "Votre mot de passe a été changé pour le login " + login;
					document.getElementById("msgpwd").style.color = "green";
	         		document.getElementById("msgpwd").style.fontWeight = "bold";
				}else if (obj.exitvalue == '2'){
					document.getElementById("msgpwd").innerHTML = "Votre ancien mot de passe est erroné " + login;
					document.getElementById("msgpwd").style.color = "red";
	        		document.getElementById("msgpwd").style.fontWeight = "bold";
				}else if (obj.exitvalue == '1'){
					document.getElementById("msgpwd").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgpwd").style.color = "red";
	        		document.getElementById("msgpwd").style.fontWeight = "bold";
				}else if (obj.exitvalue == '3'){
					document.getElementById("msgpwd").innerHTML = "Ce compte n'existe pas, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgpwd").style.color = "red";
	        		document.getElementById("msgpwd").style.fontWeight = "bold";
				}
				else if (obj.exitvalue == '9'){
					document.getElementById("msgpwd").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgpwd").style.color = "red";
	        		document.getElementById("msgpwd").style.fontWeight = "bold";
				}else if (obj.exitvalue == '10'){
					document.getElementById("msgpwd").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgpwd").style.color = "red";
	        		document.getElementById("msgpwd").style.fontWeight = "bold";
				}					
		    }
		  };
		  var data_string = '&service=' + 'changePwd' + '&login=' + login + "&oldPwdCripted=" + oldPwdCripted + "&newPwdCripted=" + newPwdCripted;
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		}
		

	function lock_fields_pwd() {
		document.getElementById("email").setAttribute("readonly", true);
		document.getElementById("oldpwd").setAttribute("readonly", true);
		document.getElementById("newpwd").setAttribute("readonly", true);
	}

</script>
	