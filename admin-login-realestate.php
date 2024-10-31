<?php if ( ! defined( 'ABSPATH' ) ) exit;?>
<?php
global $wpdb;
	$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
	 if ($result->email_realestate == '') {
		require_once('admin-account-realestate.php');
		return;
	 }
?>
<div class="wrap"> 
 <h2>Administration Login Real Estate</h2> Merci de renseigner les informations
</div> 

<?php
	wp_enqueue_script('script_md5', plugins_url('md5.js', __FILE__));  
	wp_enqueue_script( 'validationfield', plugins_url( 'validationfield.js', __FILE__ ) ); 
?>
<div>
	<table align="left">
		<tr>
			<th align="left">Email</th><th align="left">Mot de passe</th>
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="email" id="email" value="" onkeydown="resetColorField('email', 'msglogin');" /></td>
			<td align="left"><input style="width: 100%" type="text" id="pwd" value="" onkeydown="resetColorField('pwd', 'msglogin');" /></td>			
		</tr>

		<tr id="ele_save_account">
			<td><br><button id="button_login" onclick="login_realestate();">Connexion</button></td><td colspan="2"><br><p id="msglogin"></p></td> 	
		</tr>
		
	</table>
</div>

<script type="text/javascript">
	var pwdCripted = '';
	var url_plugins = <?php echo json_encode(plugins_url()); ?>;
	
	function login_realestate(){
		
        if (!validation_field('email', 'email', 'msglogin', 'L\'email doit être renseigné', 'Email invalide', '', 'Email est trop long', 0, 70)) return;
		var login = document.getElementById('email').value;
		login = login.trim();

		if (!validation_field('password', 'pwd', 'msglogin', 'Le mot de passe doit être renseigné', 'Le mot de passe n\'est pas valide! uniquement des lettres et des chiffres', 'Le mot de passe est trop court', 'Le mot de passe est trop long', 7, 20)) return;
		var pwd = document.getElementById('pwd').value;
		pwd = pwd.trim();

	    try{
		    pwdCripted = MD5(pwd);
	    }catch(err) {
	    	document.getElementById('msglogin').innerHTML = 'Mot de passe ' + err.message;
	        document.getElementById("msglogin").style.color = "red";
	        document.getElementById("msglogin").style.fontWeight = "bold";
	    	return;
	    }
		getLoginPasswordOk(login, pwdCripted);
	}

	function getLoginPasswordOk(login, pwdCripted) {
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    	result = result.replace('(', '');
				result = result.replace(');', '');
			//	lock_fields_pwd();
				var obj = JSON.parse(result); 
				if (obj.exitvalue == '0') {	
					login_wp_db(login, pwdCripted);			
				}else if (obj.exitvalue == '1'){
					document.getElementById("msglogin").innerHTML = "Votre mot de passe est invalide ";
					document.getElementById("msglogin").style.color = "red";
	        		document.getElementById("msglogin").style.fontWeight = "bold";
				}else if (obj.exitvalue == '2'){
					document.getElementById("msglogin").innerHTML = "Ce compte n'existe pas ";
					document.getElementById("msglogin").style.color = "red";
	        		document.getElementById("msglogin").style.fontWeight = "bold";
				}else if (obj.exitvalue == '9'){
					document.getElementById("msglogin").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msglogin").style.color = "red";
	        		document.getElementById("msglogin").style.fontWeight = "bold";
				}else if (obj.exitvalue == '10'){
					document.getElementById("msglogin").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msglogin").style.color = "red";
	        		document.getElementById("msglogin").style.fontWeight = "bold";
				}				
	  		};
  		}
		  var data_string = '&service=' + 'getEmailAndPwdOk' + '&login=' + login + "&pwdCripted=" + pwdCripted;
		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		
	}

</script>
	