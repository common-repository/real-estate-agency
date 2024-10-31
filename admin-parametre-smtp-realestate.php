<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wrap">  
 <h2>Parametre Smtp Real Estate</h2> Merci de renseigner les informations
</div> 

<?php
	wp_enqueue_script('script_md5', plugins_url('md5.js', __FILE__));  	
	wp_enqueue_script( 'validationfield', plugins_url( 'validationfield.js', __FILE__ ) ); 

	global $wpdb;
	$result = $wpdb->get_row(" SELECT smtp_user_realestate, smtp_pass_realestate, smtp_host_realestate, smtp_port_realestate, smtp_secure_realestate, smtp_authentification_realestate, smtp_from_realestate, smtp_name_realestate, smtp_reply_realestate, smtp_autotls_realestate  FROM " . $wpdb->prefix . 'realestate_smtp' . " WHERE id = 1");
	$usernamesmtp = $result->smtp_user_realestate;
	
	$hostsmtp = $result->smtp_host_realestate;
	$portsmtp = $result->smtp_port_realestate;
	if ($portsmtp == '') $portsmtp = '465';
	$securesmtp = $result->smtp_secure_realestate;
	$authsmtp = $result->smtp_authentification_realestate;
	$fromsmtp = $result->smtp_from_realestate;
	$namesmtp = $result->smtp_name_realestate;
	$replysmtp = $result->smtp_reply_realestate;
	$autotlssmtp = $result->smtp_autotls_realestate;
	$passwordsmtp = $result->smtp_pass_realestate;
	
?>
<div>
<!--	<form >
/>
-->
	<table width="60%" align="left">
		<tr align="left"><th style="width: 50%" align="left">SMTP Username</th><th style="width: 50%" align="left">SMTP Password</th></tr>
		<tr>
			<td align="left"><input style="width: 100%" type="text" title="Username" id="usernamesmtp" placeholder="your@email.com" value="<?php echo $usernamesmtp ?>" onkeydown="resetColorField('usernamesmtp')" </td>
			<td align="left"><input style="width: 100%" type="text" id="passwordsmtp" placeholder="*******" value="" onkeydown="resetColorField('passwordsmtp')" onfocus="this.setAttribute('type', 'password')" /></td>	
		</tr>
		<tr>
			<th align="left">SMTP Host</th><th align="left">SMTP Port</th>				
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="text" id="hostsmtp" placeholder="smtp.votresociete.com" onkeydown="resetColorField('hostsmtp')" value="<?php echo $hostsmtp ?>"/></td>
			<td align="left">
				<input id="portsmtp" type="number" value="<?php echo $portsmtp ?>"/>		
		</tr>
		<tr>
			<th align="left">Secure</th><th align="left">Authentification</th> 
		</tr>
		<tr>
			<td align="left">
				None <input type="radio" id="securesmtpnone" name="securesmtp" <?php if ($securesmtp == 'none') {echo ' checked ';} ?> value="none" />
				SSL <input type="radio" id="securesmtpssl" name="securesmtp" <?php if ($securesmtp == 'ssl') {echo ' checked ';} ?> value="ssl" />
				TLS <input type="radio" id="securesmtptls" name="securesmtp" <?php if ($securesmtp == 'tls') {echo ' checked ';} ?> value="tls" />
			</td>
			<td align="left">
				ON <input type="radio" id="authsmtpon" name="authsmtp" <?php if ($authsmtp == 'true') {echo ' checked ';} ?> value="true" >
				OFF <input type="radio" id="authsmtpoff" name="authsmtp" <?php if ($authsmtp == 'false') {echo ' checked ';} ?> value="false" >
			</td>		
		</tr>
		<tr>
			<th align="left">From</th><th align="left">From Name</th> 
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="email" placeholder="votreemail@votresociete.com" id="fromsmtp" onkeydown="resetColorField('fromsmtp')" value="<?php echo $fromsmtp ?>"/></td>
			<td align="left"><input style="width: 100%" type="text" id="namesmtp" placeholder="Prénom Nom" onkeydown="resetColorField('namesmtp')" value="<?php echo $namesmtp ?>"/></td>			
		</tr>
		<tr>
			<th align="left">Reply</th><th align="left"></th> 
		</tr>
		<tr>
			<td align="left"><input style="width: 100%" type="email" id="replysmtp" placeholder="votreemail@votresociete.com" onkeydown="resetColorField('replysmtp')" value="<?php echo $replysmtp ?>"/></td>
			<td align="left"></td>		
		</tr>
		
		<tr>
			<th align="left">Auto TLS</th>
		</tr>
		<tr>
			<td align="left">
				ON <input type="radio" id="autotlssmtpon" name="autotlssmtp" <?php if ($autotlssmtp == 'true') {echo ' checked ';} ?> value="true" >
				OFF <input type="radio" id="autotlssmtpoff" name="autotlssmtp" <?php if ($autotlssmtp == 'false') {echo ' checked ';} ?> value="false" >
			</td>		
		</tr>

		<tr>
			<td><br><button id="button_save_param_smtp" onclick="save_param_smtp();">Enregistrer</button></td><td colspan="2"><br><p id="msgparamsmtp"></p></td> 		
		</tr>

		<tr align="left"><th style="width: 50%" align="left"><br>Test envoi d'email</th></tr>
		<tr align="left"><th style="width: 50%" align="left">To</th></tr>
		<tr>
			<td align="left"><input style="width: 100%" type="email" title="To" id="toemail" placeholder="your@email.com" value="" onkeydown="resetColorField('toemail', 'msgsendmessage');"/></td>	
		</tr>
		<tr align="left"><th style="width: 50%" align="left">Sujet</th></tr>
		<tr>
			<td align="left"><input style="width: 100%" type="text" title="Subject" id="subject" placeholder="sujet du message" value="" onkeydown="resetColorField('subject', 'msgsendmessage');"/></td>	
		</tr>
		<tr align="left"><th style="width: 50%" align="left">Message</th></tr>
		<tr>
			<td align="left"><textarea rows="4" cols="80" title="Message" id="message" placeholder="Votre message" onkeydown="resetColorField('message', 'msgsendmessage');"></textarea></td>	
		</tr>

		<tr>
			<td><br><button id="button_send_message_test" onclick="send_message_test();">Envoyer</button></td><td colspan="2"><br><p id="msgsendmessage"></p></td> 		
		</tr>
	</table>
</div>

<script type="text/javascript">
	var pwdCripted = '';
	document.getElementById('usernamesmtp').focus();

	function send_message_test(){
		if (!validation_field('email', 'toemail', 'msgsendmessage', 'L\'email doit être renseigné', 'Email invalide', '', 'L\'email est trop long', 0, 70)) return;
		var toemail = document.getElementById('toemail').value;

		if (!validation_field('text', 'subject', 'msgsendmessage', 'Le sujet doit être renseigné', 'Le sujet n\'est pas valide! uniquement des lettres et des chiffres', 'Le sujet trop court', 'Le sujet trop long', 0, 40)) return;
		var subject = document.getElementById('subject').value;

		if (!validation_field('text', 'message', 'msgsendmessage', 'Le message doit être renseigné', 'Le message n\'est pas valide! uniquement des lettres et des chiffres', 'Le message trop court', 'Le message est trop long', 0, 200)) return;
		var message = document.getElementById('message').value;
		
		send_message(toemail, subject, message);
	}
	

	function save_param_smtp(){
		resetColorFieldMsg('msgparamsmtp');

		if (!validation_field('email', 'usernamesmtp', 'msgparamsmtp', 'L\'email doit être renseigné', 'Email invalide', '', 'L\'email est trop long', 0, 70)) return;
		var usernamesmtp = document.getElementById('usernamesmtp').value;
		var passwordsmtpdb = '<?php echo $passwordsmtp ?>';
		var passwordsmtp = document.getElementById('passwordsmtp').value;
		if ( passwordsmtpdb == ''){
			if (!validation_field('password', 'passwordsmtp', 'msgparamsmtp', 'Le password doit être renseigné', 'Le password n\'est pas valide! uniquement des lettres et des chiffres', 'Le password est trop court', 'Le password est trop long', 7, 20)) return;
		}else if (passwordsmtp != ''){
			if (!validation_field('password', 'passwordsmtp', 'msgparamsmtp', 'Le password doit être renseigné', 'Le password n\'est pas valide! uniquement des lettres et des chiffres', 'Le password est trop court', 'Le password est trop long', 7, 20)) return;
		}
		
		var passwordsmtpnew = '';
		if (passwordsmtp != ''){
			passwordsmtpnew = passwordsmtp;
		}else{
			passwordsmtpnew = passwordsmtpdb;
		}

		if (!validation_field('text', 'hostsmtp', 'msgparamsmtp', 'Le host smtp doit être renseigné', 'Le host smtp n\'est pas valide!','','', 0, 70)) return;
		var hostsmtp = document.getElementById('hostsmtp').value;

		if (!validation_field('email', 'fromsmtp', 'msgparamsmtp', 'L\'email doit être renseigné', 'Email invalide', '', 'L\'email est trop long', 0, 70)) return;
		var fromsmtp = document.getElementById('fromsmtp').value;		

		if (!validation_field('text', 'namesmtp', 'msgparamsmtp', '', 'Le nom n\'est pas valide! uniquement des lettres et des chiffres', '', 'Le nom est trop long', 4, 40)) return;
		var namesmtp = document.getElementById('namesmtp').value;

		if (!validation_field('email', 'replysmtp', 'msgparamsmtp', 'L\'email doit être renseigné', 'Email invalide', '', 'L\'email est trop long', 0, 70)) return;
		var replysmtp = document.getElementById('replysmtp').value;
		

		var portsmtp = document.getElementById('portsmtp').value;

		var securesmtp = 'none';
		if (document.getElementById('securesmtpnone').checked) {
		 	securesmtp = document.getElementById('securesmtpnone').value;
		}
		if (document.getElementById('securesmtpssl').checked) {
		 	securesmtp = document.getElementById('securesmtpssl').value;
		}
		if (document.getElementById('securesmtptls').checked) {
		 	securesmtp = document.getElementById('securesmtptls').value;
		}

		var authsmtp = 'false';
		if (document.getElementById('authsmtpon').checked) {
		 	authsmtp = document.getElementById('authsmtpon').value;
		}
		if (document.getElementById('authsmtpoff').checked) {
		 	authsmtp = document.getElementById('authsmtpoff').value;
		}

		var autotlssmtp = 'false';
		if (document.getElementById('autotlssmtpon').checked) {
		 	autotlssmtp = document.getElementById('autotlssmtpon').value;
		}
		if (document.getElementById('autotlssmtpoff').checked) {
		 	autotlssmtp = document.getElementById('autotlssmtpoff').value;
		}

		// save in db
		var debugsmtp = "0";
		update_smtp_wp_db(usernamesmtp, passwordsmtpnew, hostsmtp, portsmtp, securesmtp, authsmtp, autotlssmtp, fromsmtp, namesmtp, replysmtp, debugsmtp);

	}


</script>
	