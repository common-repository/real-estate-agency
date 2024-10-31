<?php if ( ! defined( 'ABSPATH' ) ) exit;?>

<div class="wrap">  
 <h2>Administration mot de passe oublié Real Estate</h2> Merci de renseigner l'email du compte
</div> 

<?php
	wp_enqueue_script('script_md5', plugins_url('md5.js', __FILE__));  
	wp_enqueue_script( 'validationfield', plugins_url( 'validationfield.js', __FILE__ ) ); 
?>
<div>
<!--	<form >
-->
	<table align="left">
		<tr>
			<th align="left">Email</th> <!--<th align="left">Email annonce web</th><th align="left"></th>-->
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="email" id="email" value="<?php echo $email ?>" onkeydown="resetColorField('email');" /></td>	
		</tr>

		<tr id="ele_save_account">
			<td><br><button id="button_password_forget" onclick="password_account_forget();">Envoyer nouveau mot de passe</button></td><td colspan="2"><br><p id="msg"></p></td> 		
		</tr>
		<tr id="ele_update_password" style="visibility:hidden">
			<td  align="left"><br><input type="text" id="pwd" value="" placeholder="Votre mot de passe" onkeydown="resetColorField('pwd');" />&nbsp;&nbsp;<button id="button_update_dbwp" onclick="update_dbwp_account();">Mis à jour du mot de passe</button></td><td colspan="2"><br><p id="msgpwd"></p></td> 		
		</tr>
		<tr>
					
		</tr>
	</table>
<!--</form>-->
</div>

<script type="text/javascript">
	var pwdCripted = '';
	var url_plugins = <?php echo json_encode(plugins_url()); ?>;
	
	function password_account_forget(){
		if (!validation_field('email', 'email', 'msg', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;

		login = login.trim();

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
					document.getElementById("email").setAttribute("readonly", true);	
					var id = "button_password_forget"; 
					document.getElementById(id).disabled = true;
					var id = "ele_update_password";
					show_ele(id);	
					document.getElementById("msg").innerHTML = "Votre mot de passe vous a été envoyé sur votre email " + login;
					document.getElementById("msg").style.color = "green";
	         		document.getElementById("msg").style.fontWeight = "bold";
				}else if (obj.exitvalue == '1') {
					document.getElementById("msg").innerHTML = "Une erreur est survenue dans la mise à jour de votre nouveau mot de passe " + login;
					document.getElementById("msg").style.color = "red";
	        		document.getElementById("msg").style.fontWeight = "bold";
				}else if (obj.exitvalue == '3') {
					document.getElementById("msg").innerHTML = "Ce compte n'existe pas " + login;
					document.getElementById("msg").style.color = "red";
	        		document.getElementById("msg").style.fontWeight = "bold";
				}else if (obj.exitvalue == '9') {
					document.getElementById("msg").innerHTML = "Une erreur dans l'envoi de votre mot de passe et survenue " + login;
					document.getElementById("msg").style.color = "red";
	        		document.getElementById("msg").style.fontWeight = "bold";
				}else if (obj.exitvalue == '11') {
					document.getElementById("msg").innerHTML = "Une erreur dans l'envoi de votre mot de passe et survenue " + login;
					document.getElementById("msg").style.color = "red";
	        		document.getElementById("msg").style.fontWeight = "bold";
				}else if (obj.exitvalue == '12') {
					document.getElementById("msg").innerHTML = "Une erreur est survenue, merci de recommencer " + login;
					document.getElementById("msg").style.color = "red";
	        		document.getElementById("msg").style.fontWeight = "bold";
				}				
		    }
		  };

		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?&service=getNewPwd&login=" + login + "&s=softwarerealestate", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send();
		}


	function update_dbwp_account() {
		if (!validation_field('email', 'email', 'msg', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;
		email = login.trim();

		if (!validation_field('password', 'pwd', 'msgpwd', 'Le password doit être renseigné', 'Le password n\'est pas valide! uniquement des lettres et des chiffres', 'Le password est trop court', 'Le password est trop long', 7, 20)) return;
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
		}
</script>
	