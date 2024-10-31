<?php
/**
 * Displays top navigation
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
	
   </style> 

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- </nav>--><!-- #site-navigation -->
		<?php 

			global $wp_query;
			/*
			$type_property = urldecode ( $wp_query->query_vars['type_property']);
			$type_property = ucfirst($type_property);
			$type_property = str_replace("-"," ",$type_property);
			
			if ($type_property == 'Bien'){
				$indexTypeProperty = '0';
			}else if ($type_property == 'Appartement'){
				$indexTypeProperty = '1';
			}else if ($type_property == 'Maison'){
				$indexTypeProperty = '2';
			}else if ($type_property == 'Villa'){
				$indexTypeProperty = '3';
			}else if ($type_property == 'Ferme'){
				$indexTypeProperty = '4';
			}else if ($type_property == 'Propriete'){
				$indexTypeProperty = '5';
			}else if ($type_property == 'Hotel particulier'){
				$indexTypeProperty = '6';
			}else if ($type_property == 'Chateau'){
				$indexTypeProperty = '7';
			}else if ($type_property == 'Chalet'){
				$indexTypeProperty = '8';
			}else if ($type_property == 'Loft'){
				$indexTypeProperty = '9';
			}else if ($type_property == 'Atelier'){
				$indexTypeProperty = '10';
			}else if ($type_property == 'Terrain'){
				$indexTypeProperty = '11';
			}else if ($type_property == 'Bureaux'){
				$indexTypeProperty = '12';
			}else if ($type_property == 'Commerce'){
				$indexTypeProperty = '13';
			}else if ($type_property == 'Locaux'){
				$indexTypeProperty = '14';
			}else if ($type_property == 'Immeuble'){
				$indexTypeProperty = '15';
			}else if ($type_property == 'Parking'){
				$indexTypeProperty = '16';
			}else if ($type_property == 'Viager'){
				$indexTypeProperty = '17';
			}else if ($type_property == 'Autre'){
				$indexTypeProperty = '100';
			}else{
				$indexTypeProperty = '0';
			}


			$roomselect = urldecode ( $wp_query->query_vars['room']);
			if ($roomselect == "") {$roomselect = "0";}
			$room = str_replace("-pieces","",$roomselect);
			$room = str_replace("-piece","",$room);
			*/
			$zipselect = urldecode ( $wp_query->query_vars['dept']);

			if ($zipselect == 'dept'){
				$zipselectselected = 'dept'; $zipselect = '';
			}
			else{
				$zipselectselected = $zipselect;
			}

			$zipcityselect = urldecode ( $wp_query->query_vars['zipcity']);
			
			if ($zipcityselect == 'cp-ville'){
				$zipcityselectselected = 'Cp ville'; $zipcityselect = '';
			}
			else{
				$zipcityselectselected = $zipcityselect;
				$zipcityselect = substr($zipcityselect,0,5);
			}

/*
			$pricestart = urldecode ( $wp_query->query_vars['pricestart']);
			if ($pricestart == 'mini'){
				$pricestartselected = 'mini'; $pricestart = '';
			}
			else{
				$pricestartselected = $pricestart;
			}
			$priceend = urldecode ( $wp_query->query_vars['priceend']);
			if ($priceend == 'max'){
				$priceendselected = 'max'; $priceend = '';
			}
			else{
				$priceendselected = $priceend;
			}
			*/
			
/*
		$typePropertieshead = array( '0' => 'Bien', '1' => 'Appartement', '2' => 'Maison', '3' => 'Villa', '4' => 'Ferme', '5' => 'Propriete', '6' => 'Hotel particulier', '7' => 'Chateau', '8' => 'Chalet', '9' => 'Loft', '10' => 'Atelier', '11' => 'Terrain', '12' => 'Bureaux', '13' => 'Commerce', '14' => 'Locaux', '15' => 'Immeuble', '16' => 'Parking', '17' => 'Viager', '100' => 'Autre'	);

		$typePiecehead = array( '0-piece', '1-piece', '2-pieces', '3-pieces', '4-pieces', '5-pieces', '6-pieces', '7-pieces', '8-pieces', '9-pieces', '10-pieces'
								, '11-pieces', '12-pieces', '13-pieces', '14-pieces', '15-pieces', '16-pieces', '17-pieces', '18-pieces', '19-pieces', '20-pieces', '>20-pieces');
		*/

		$typeDepthead = array('Dept', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23',	'24'					, '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47',	'48', '49					', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71','72', '73', '74'					, '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95', '96', '971', '972', 				'973', '974', '975', '976', '977', '978', '986', '987', '988');
	
		/*
		$typePriceStarthead = array(  'mini'=>'Mini', '1000'=>'1 000', '2000'=>'2 000', '5000'=>'5 000', '10000'=>'10 000', '20000'=>'20 000', '50000'=>'50 000', '100000'=>'100 000', '200000'=>'200 000', '300000'=>'300 000', '400000'=>'400 000', '500000'=>'500 000', '700000'=>'700 000', '1000000'=>'1 000 000'	);

		$typePriceEndthead = array( 'max'=>'Max', '10000000'=>'10 000 000', '5000000'=>'5 000 000', '4000000'=>'4 000 000', '3000000'=>'3 000 000', '2000000'=>'2 000 000', '1000000'=>'1 000 000', '700000'=>'700 0000', '500000'=>'500 000', '400000'=>'400 000', '300000'=>'300 000', '200000'=>'200 000', '150000'=>'150 000', '100000'=>'100 000', '50000'=>'50 000');
		*/

		/*  Start build list zip dept */  
		global $wpdb;
			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;
			$fieldFilter = 'keyEmailAccount';
			$valueStringField = $result->email_realestate;

			$numberSize = '30';
			// pour les tests
			if ( get_home_url() == 'http://vps520391.ovh.net') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$numberSize = '300';
			} 
			if ( get_home_url() == 'http://vps671085.ovh.net') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$numberSize = '300';
			} 

			// pour la Production
			if ( get_home_url() == 'https://www.immobilier-fr.fr') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$numberSize = '300';
			}
			

		//	$url = "https://real-estate-france-DB.appspot.com/managedb";
			$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";
 			$data = array('service' => 'readListAccount', 'plateform' => '1', 'count' => 'false', 'login' => sanitize_email($login), 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
 				, 'fieldFilter' => $fieldFilter, 'valueStringField' => sanitize_text_field($valueStringField), 'dept' => $zipselect, 'zipcity' => $zipcityselect, 'currentPage' => '1', 'numberSize' => $numberSize);

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list = file_get_contents($url, false, $context);
			$app_listA = json_decode($app_list, true);

			$stackZip = array('Dept');

			$zip_city = '';
			$stackZipCity = array('Cp ville');
		//	echo count($app_listA);
		//	print_r($app_listA);
		//	error_reporting(0);
			foreach ($app_listA as $app): 

					$zip = ltrim(sanitize_text_field($app["cp"]));
					$zip = rtrim($zip);
					$zip = substr($zip,0,2);
					if (is_numeric($zip)) {
						if (!in_array($zip, $stackZip)) {
						    array_push($stackZip, $zip);
						}
					}
				endforeach;

				arsort($stackZip);
				$typeDepthead = $stackZip; 

				foreach ($app_listA as $app): 

					$zip = ltrim(sanitize_text_field($app["cp"]));
					$zip = rtrim($zip);
					$city = ltrim(sanitize_text_field($app["city"]));
					$city = rtrim($city);
					$zip_city = $zip . '-' . $city;
					$zip_city = str_replace(' ','-',$zip_city);
					if (substr($zip,0,2) == $zipselect){
						if (!in_array($zip_city, $stackZipCity)) {
						    array_push($stackZipCity, $zip_city);
						}
					}else if ('' == $zipselect){
						if (!in_array($zip_city, $stackZipCity)) {
						    array_push($stackZipCity, $zip_city);
						}
					}
				endforeach;

				arsort($stackZipCity);
				
			/*  End build list zip-city */

		?>
		<!--	<?php
			$name_select = 'propertyrealestate';
			$terms = $typePropertieshead;
			$selected_term = $type_property;
			load_dropdown_terms($name_select, $terms, $selected_term); 
			?> 
			&nbsp;
			<?php
			$name_select = 'piecerealestate';
			$terms = $typePiecehead;
			$selected_term = $roomselect;
			load_dropdown_terms($name_select, $terms, $selected_term); 
			?> 
			&nbsp;-->
			<?php
			$name_select = 'ziprealestate';
			$terms = $typeDepthead;
			$selected_term = $zipselectselected;
			load_dropdown_terms($name_select, $terms, $selected_term); 
			?> 
	<!--		&nbsp;
			<?php
			$name_select = 'zipcityrealestate';
			$terms = $stackZipCity;
			$selected_term = $zipcityselectselected;
			load_dropdown_terms($name_select, $terms, $selected_term); 
			?> -->
	<!--		&nbsp;
			<?php
			$name_select = 'pricestartrealestate';
			$terms = $typePriceStarthead;
			$selected_term = $pricestartselected;
			load_dropdown_terms_key($name_select, $terms, $selected_term); 
			?> 
			&nbsp;
			<?php
			$name_select = 'priceendrealestate';
			$terms = $typePriceEndthead;
			$selected_term = $priceendselected;
			load_dropdown_terms_key($name_select, $terms, $selected_term); 
			?> 
		-->

<?php 
	function load_dropdown_terms($name_select, $terms, $selected_term) {
	// Display filter HTML  echo "<select name='" . $name_select . "' id='" . $name_select . "' class='postform'  onChange='reloadPage(this.value)' >";
	echo "<select class='select-right' name='" . $name_select . "' id='" . $name_select . "' class='postform'  onChange='replacePageWithParam(this)' >";
	foreach ( $terms as $term=>$term_value ) {
	//	echo "<option class='select-right' value='" .  $term . "' >" .  $term . "</option>";
		printf(	'<option class="select-right" value="%1$s" %2$s>%3$s</option>', $term, ( ( $term_value == $selected_term ) ? 'selected' : '' ), $term_value );
	}
	echo '</select>';
	}
	function load_dropdown_terms_key($name_select, $terms, $selected_term) {
	// Display filter HTML  echo "<select name='" . $name_select . "' id='" . $name_select . "' class='postform'  onChange='reloadPage(this.value)' >";
	echo "<select class='select-right' name='" . $name_select . "' id='" . $name_select . "' class='postform'  onChange='replacePageWithParam(this)' >";
	foreach ( $terms as $term=>$term_value ) {
	//	echo "<option class='select-right' value='" .  $term . "' >" .  $term . "</option>";
		printf(	'<option class="select-right" value="%1$s" %2$s>%3$s</option>', $term, ( ( $term == $selected_term ) ? 'selected' : '' ), $term_value );
	}
	echo '</select>';
	}
?>
<script type="text/javascript">
	function replacePageWithParam(name_select) {
	/*	var e = document.getElementById("propertyrealestate");
		var property = e.options[e.selectedIndex].text;
		var e = document.getElementById('piecerealestate');
		var piece = e.options[e.selectedIndex].text;
		*/
		var e = document.getElementById('ziprealestate');
		var zip = e.options[e.selectedIndex].text;
	//	var e = document.getElementById('zipcityrealestate');
	//	var zipcity = 'cp-ville';
		//if (name_select.name == 'zipcityrealestate'){
		//	zipcity = e.options[e.selectedIndex].text;
		//	if (zipcity == 'Cp ville'){zipcity = 'cp-ville';}
		//}
	//	zipcity = zipcity.replace(' ', '-');
/*
		var e = document.getElementById('pricestartrealestate');
		var pricestart = e.options[e.selectedIndex].value;
		var e = document.getElementById('priceendrealestate');
		var priceend = e.options[e.selectedIndex].value;
		*/
		//Raz derriere la derniere non-selection 
/*
			if (name_select.id == 'propertyrealestate'){
				piece = '0-piece';
				zip = 'dept';
				zipcity = 'cp-ville';
				pricestart = 'mini';
				priceend = 'max';
			}	
			if (name_select.id == 'piecerealestate'){
				zip = 'dept';
				zipcity = 'cp-ville';
			}*/
					
		/*	if (name_select.id == 'ziprealestate'){
				zipcity = 'cp-ville';
			}	*/
		/*	if (name_select.id == 'zipcityrealestate'){
				pricestart = 'mini';
				priceend = 'max';
			}
			if (name_select.id == 'pricestartrealestate'){
				priceend = 'max';
			}*/

	    var url = location.protocol + '//' + location.hostname + '/listeagenceimmo/' + zip.toLowerCase() + '/1'; // + '/' + zipcity;
	     url = url.replace(/ /g, "-");
	     location.replace(encodeURI(url));

	}

function empty_field(string) {

      var validity = true;

      if( string == '' ) { validity = false; }

      return validity;
    }
    function sanitize_string(string) {

      var validity = true;

      if( string.match( /[|<|,|>|\.|\?|\/|:|;|"|'|{|\[|}|\]|\||\\|~|`|!|@|#|\$|%|\^|&|\*|\(|\)|_|\-|\+|=]+/ ) != null ) {
          validity = false;
      }

      return validity;
    }

    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
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
	//  http://vps443570.ovh.net/achat/bien/0-piece/dept/cp-ville/mini/max/1
</script>