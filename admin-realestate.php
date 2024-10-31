	<?php 
	if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;
	$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
	 if ($result->email_realestate == '') {
		require_once('admin-account-realestate.php');
	 }else if ($result->pwd_realestate == ''){
	 	require_once('admin-login-realestate.php');
	 }else{	 
		?>
		<div>
		<table align="center">
			<tr id="ele_save_account">
				<td>
					<br><br><br><br>
					<?php echo "<H1><a  target='_blank' href='https://real-estate-france-front-end.appspot.com/indexwp.html#?front=wp&id=" . $result->email_realestate . "&p=" . $result->pwd_realestate . "' >Administration des biens</a></H1>"; ?>
				</td>	
			</tr>
			
		</table>
		</div>
		<?php
	 }
	?>