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
	<?php global $wpdb; $result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' ); ?> 
 <h2>Administration Déconnexion Real Estate</h2>
</div> 

<?php
	wp_enqueue_script('script_md5', plugins_url('md5.js', __FILE__));  
?>
<div>
	<table align="left">
		<tr id="ele_save_account">
			<td><br><button id="button_logout" onclick="logout_realestate();">Déconnexion</button></td><td colspan="2"><br><p id="msglogout"></p></td> 	
		</tr>
		
	</table>
</div>

<script type="text/javascript">
	var pwdCripted = '';
	var url_plugins = <?php echo json_encode(plugins_url()); ?>;
	
	function logout_realestate(){
        var email = "<?php echo sanitize_email($result->email_realestate) ?>";
		document.getElementById("msglogout").innerHTML = email;	
		logout_wp_db(email);	
	} 

</script>
	