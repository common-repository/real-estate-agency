<?php
/**
 * Displays rgpd header
 *
 * @package Realestate
 * @subpackage 
 * @since 1.0
 * @version 1.0
 */

?>
 <style type="text/css"> 
   .select-right {
  		text-align: right;
	}
.rgpd {
	/*text-align: center;*/
    font-size: 1.1rem;
    font-weight: 900;
    border: none;
    color: cornflowerblue;
    margin-left: 0.7em;
    margin-right: : 0.7em;
}
.rgpdButton {
    background-color: cornflowerblue;
}
</style>

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
	// On récupère nos variables de session
	//echo $_SESSION['rgpd'];
	if (! isset($_SESSION['rgpd'])) {
		$br = '';
		if ( ! wp_is_mobile() ) {
			$br = '<br>';
		}
		$pagetesttitle = get_home_url() . "/postad/";
		if ( get_permalink() == $pagetesttitle){
			$br = '';
		}
		$pagetesttitle = get_home_url() . "/accountvisitor/";
		if ( get_permalink() == $pagetesttitle){
			$br = '';
		}
		$_SESSION['rgpd'] = 'rgpdok';
		echo '<div id="rgpd" class="rgpd">';
		echo '<br />En continuant votre navigation sur ce site, vous acceptez l\'utilisation de cookies afin de mesurer l\'audience du site '. $br .'et vous proposer des contenus et publicités personnalisés adaptés à vos centres d\'intérêts.';
		echo '&nbsp;&nbsp;<button class="rgpdButton" onclick="rgpdok()">Ok tout accepter</button>';
		echo '</div>';
	}
?>
<script type="text/javascript">
	
	function rgpd() {
		document.getElementById('rgpd').style.display = "none";
	}
	
	function rgpdok() {
		document.getElementById('rgpdok').style.display = "none";
		//call api set var session
	}
	function setVarSessionRgpd() {
			
		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
			var data_string = 'service=' + 'setVarSessionRgpd' + '&login=' + keyEmailAccount + '&keyEmailAccount=' + keyEmailAccount + '&pwdCripted=' + '' + '&keyCustomer=' + '' + '&idc=' + '0' + '&emailCustomer=' + emailCustomer + '&name=' + '' + '&firstName=' + nameprospect + '&phone=' + phoneprospect;


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
</script>