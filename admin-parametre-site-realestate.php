<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wrap">  
 <h2>Parametre Site Web Real Estate</h2> <b>Paramètrer les couleurs en cliquant sur la zone de couleur et enregistrer</b>
</div> 

<style type="text/css">
	p,
label {
    font: 1rem 'Fira Sans', sans-serif;
}

input {
    margin: .4rem;
    height: 2.5em;
    width: 7em;

}
</style>
<?php
	wp_enqueue_script('script_md5', plugins_url('md5.js', __FILE__));  	
	wp_enqueue_script( 'validationfield', plugins_url( 'validationfield.js', __FILE__ ) ); 
	wp_enqueue_script( 'scriptadmindb', plugins_url( 'scriptadmindb.js', __FILE__ ) );

			// loop real estate DB
	global $wpdb;
	$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
	$login = $result->email_realestate;
	

//    $GLOBALS['h1color'] = '#ff8000';
//    $h1color = '#ff8000';

	$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";
		/*  Read readSiteClientParameter*/

 			$data = array('service' => 'getRecordSiteClientParameter', 'plateform' => '1', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => '');

			$options = array('http' => array(
			    'method'=> 'POST',
			    'header'=>'Content-type: application/x-www-form-urlencoded',
                'content'=> http_build_query($data)
			));

			$context = stream_context_create($options);
			$app_list_site_client_parameter = file_get_contents($url, false, $context);
			$applistsiteclientparameter = json_decode($app_list_site_client_parameter, true);

			if (sizeof($applistsiteclientparameter) > 1 ){
				$bodybackgroundcolor = $applistsiteclientparameter['bodybackgroundcolor'];
				$pcolor = $applistsiteclientparameter['pcolor'];
				$h1color = $applistsiteclientparameter['h1color'];
				$h2color = $applistsiteclientparameter['h2color'];
				$h3color = $applistsiteclientparameter['h3color'];
				$h4color = $applistsiteclientparameter['h4color'];
				$h5color = $applistsiteclientparameter['h5color'];
				$h6color = $applistsiteclientparameter['h6color'];
				$linkcolor = $applistsiteclientparameter['linkcolor'];
				$linkhovercolor = $applistsiteclientparameter['linkhovercolor'];
				$pricecolor = $applistsiteclientparameter['pricecolor'];
				$linkpaginationcolor = $applistsiteclientparameter['linkpaginationcolor'];
				$linkpaginationselectedcolor = $applistsiteclientparameter['linkpaginationselectedcolor'];
				$btpaginationcolor = $applistsiteclientparameter['btpaginationcolor'];
				$btpaginationbackgroundcolor = $applistsiteclientparameter['btpaginationbackgroundcolor'];
				$selectcolor = $applistsiteclientparameter['selectcolor'];
				$selectbackgroundcolor = $applistsiteclientparameter['selectbackgroundcolor'];
				$selecthovercolor = $applistsiteclientparameter['selecthovercolor'];
        		$selecthoverbackgroundcolor = $applistsiteclientparameter['selecthoverbackgroundcolor'];
				$btcolor = $applistsiteclientparameter['btcolor'];
				$btbackgroundcolor = $applistsiteclientparameter['btbackgroundcolor'];
				$bthovercolor = $applistsiteclientparameter['bthovercolor'];
        		$bthoverbackgroundcolor = $applistsiteclientparameter['bthoverbackgroundcolor'];

        		$inputcolor = $applistsiteclientparameter['inputcolor'];
		        $inputbackgroundcolor = $applistsiteclientparameter['inputbackgroundcolor'];

		        $textareacolor = $applistsiteclientparameter['textareacolor'];
		        $textareabackgroundcolor = $applistsiteclientparameter['textareabackgroundcolor'];

			}else{
				resetOrigine();
			}

			if ($bodybackgroundcolor == '') $bodybackgroundcolor = '#ffffff';
			if ($pcolor == '') $pcolor = '#222';
			if ($h1color == '') $h1color = '#222';
			if ($h2color == '') $h2color = '#222';
			if ($h3color == '') $h3color = '#222';
			if ($h4color == '') $h4color = '#222';
			if ($h5color == '') $h5color = '#222';
			if ($h6color == '') $h6color = '#222';
			if ($linkcolor == '') $linkcolor = '#222';
			if ($linkhovercolor == '') $linkhovercolor = '#c0c0c0';

			if ($pricecolor == '') $pricecolor = '#222';
			if ($linkpaginationcolor == '') $linkpaginationcolor = '#222';
			if ($linkpaginationselectedcolor == '') $linkpaginationselectedcolor = '#D8D8D8';
			if ($btpaginationcolor == '') $btpaginationcolor = '#585858';
			if ($btpaginationbackgroundcolor == '') $btpaginationbackgroundcolor = '#D8D8D8';

			if ($selectcolor == '') $selectcolor = '#222';
			if ($selectbackgroundcolor == '') $selectbackgroundcolor = '#ffffff';
			if ($selecthovercolor == '') $selecthovercolor = '#222';
			if ($selecthoverbackgroundcolor == '') $selecthoverbackgroundcolor = '#ffffff';
			if ($btcolor == '') $btcolor = '#ffffff';
			if ($btbackgroundcolor == '') $btbackgroundcolor = '#222';

			if ($bthovercolor == '') $bthovercolor = '#ffffff';
			if ($bthoverbackgroundcolor == '') $bthoverbackgroundcolor = '#767676';

			if ($inputcolor == '') $inputcolor = '#222';
			if ($inputbackgroundcolor == '') $inputbackgroundcolor = '#ffffff';

			if ($textareacolor == '') $textareacolor = '#222';
			if ($textareabackgroundcolor == '') $textareabackgroundcolor = '#ffffff';


	 function resetOrigine() {
	 	$bodybackgroundcolor = '#ffffff';
		$pcolor = '#222';
		$h1color = '#222';
		$h2color = '#222';
		$h3color = '#222';
		$h4color = '#222';
		$h5color = '#222';
		$h6color = '#222';
		$linkcolor = '#222';
		$linkhovercolor = '#c0c0c0';

		$pricecolor = '#222';
		$linkpaginationcolor = '#222';
		$linkpaginationselectedcolor = '#D8D8D8';
		$btpaginationcolor = '#585858';
		$btpaginationbackgroundcolor = '#D8D8D8';

		$selectcolor = '#222';
		$selectbackgroundcolor = '#ffffff';
		$selecthovercolor = '#222';
		$selecthoverbackgroundcolor = '#ffffff';

		$btcolor = '#ffffff';
		$btbackgroundcolor = '#222';

		$bthovercolor = '#ffffff';
        $bthoverbackgroundcolor = '#767676';

        $inputcolor = '#222';
        $inputbackgroundcolor = '#ffffff';

        $textareacolor = '#222';
        $textareabackgroundcolor = '#ffffff';
        
	 }
	

		//	echo '$login B ' . $login . ' $pcolor ' . $pcolor . ' sizeof($applistsiteclientparameter ' . sizeof($applistsiteclientparameter) . '<br>'
?>

	<script type="text/javascript">
		function resetOrigine() {

			setColor('bodybackgroundcolor', '#ffffff');
			setColor('pcolor', '#222');
			setColor('h1color', '#222');
			setColor('h2color', '#222');
			setColor('h3color', '#222');
			setColor('linkcolor', '#222');
			setColor('linkhovercolor', '#c0c0c0');
			setColor('pricecolor', '#222');
			setColor('linkpaginationcolor', '#222');
			setColor('linkpaginationselectedcolor', '#D8D8D8');
			setColor('btpaginationcolor', '#585858');
			setColor('btpaginationbackgroundcolor', '#D8D8D8');
			setColor('selectcolor', '#222');
			setColor('selectbackgroundcolor', '#ffffff');

			setColor('selecthovercolor', '#222');
			setColor('selecthoverbackgroundcolor', '#ffffff');

			setColor('btcolor', '#ffffff');
			setColor('btbackgroundcolor', '#222');
			setColor('bthovercolor', '#ffffff');
			setColor('bthoverbackgroundcolor', '#767676');

			setColor('inputcolor', '#222');
			setColor('inputbackgroundcolor', '#ffffff');

			setColor('textareacolor', '#222');
			setColor('textareabackgroundcolor', '#ffffff');

		}

		function templateSteelBlue() {

    		setColor('bodybackgroundcolor', '#ffffff');
			setColor('pcolor', '#4682B4');
			setColor('h1color', '#4682B4');
			setColor('h2color', '#4682B4');
			setColor('h3color', '#4682B4');
			setColor('linkcolor', '#4682B4');
			setColor('linkhovercolor', '#B0C4DE');
			setColor('pricecolor', '#4682B4');
			setColor('linkpaginationcolor', '#4682B4');
			setColor('linkpaginationselectedcolor', '#B0C4DE');
			setColor('btpaginationcolor', '#B0C4DE');
			setColor('btpaginationbackgroundcolor', '#4682B4');
			setColor('selectcolor', '#ffffff');
			setColor('selectbackgroundcolor', '#4682B4');
			setColor('selecthovercolor', '#ffffff');
			setColor('selecthoverbackgroundcolor', '#B0C4DE');
			setColor('btcolor', '#ffffff');
			setColor('btbackgroundcolor', '#4682B4');
			setColor('bthovercolor', '#ffffff');
			setColor('bthoverbackgroundcolor', '#B0C4DE');

			setColor('inputcolor', '#4682B4');
			setColor('inputbackgroundcolor', '#ffffff');

			setColor('textareacolor', '#4682B4');
			setColor('textareabackgroundcolor', '#ffffff');

		}

		function templateGreen() {

    		setColor('bodybackgroundcolor', '#ffffff');
			setColor('pcolor', '#008000');
			setColor('h1color', '#008000');
			setColor('h2color', '#008000');
			setColor('h3color', '#008000');
			setColor('linkcolor', '#008000');
			setColor('linkhovercolor', '#90EE90');
			setColor('pricecolor', '#008000');
			setColor('linkpaginationcolor', '#008000');
			setColor('linkpaginationselectedcolor', '#90EE90');
			setColor('btpaginationcolor', '#90EE90');
			setColor('btpaginationbackgroundcolor', '#008000');
			setColor('selectcolor', '#ffffff');
			setColor('selectbackgroundcolor', '#008000');
			setColor('selecthovercolor', '#ffffff');
			setColor('selecthoverbackgroundcolor', '#90EE90');
			setColor('btcolor', '#ffffff');
			setColor('btbackgroundcolor', '#008000');
			setColor('bthovercolor', '#ffffff');
			setColor('bthoverbackgroundcolor', '#90EE90');

			setColor('inputcolor', '#008000');
			setColor('inputbackgroundcolor', '#ffffff');

			setColor('textareacolor', '#008000');
			setColor('textareabackgroundcolor', '#ffffff');

		}
		function templateRed() {

    		setColor('bodybackgroundcolor', '#ffffff');
			setColor('pcolor', '#FF0000');
			setColor('h1color', '#FF0000');
			setColor('h2color', '#FF0000');
			setColor('h3color', '#FF0000');
			setColor('linkcolor', '#FF0000');
			setColor('linkhovercolor', '#8B0000');
			setColor('pricecolor', '#FF0000');
			setColor('linkpaginationcolor', '#FF0000');
			setColor('linkpaginationselectedcolor', '#8B0000');
			setColor('btpaginationcolor', '#8B0000');
			setColor('btpaginationbackgroundcolor', '#FF0000');
			setColor('selectcolor', '#ffffff');
			setColor('selectbackgroundcolor', '#FF0000');
			setColor('selecthovercolor', '#ffffff');
			setColor('selecthoverbackgroundcolor', '#8B0000');
			setColor('btcolor', '#ffffff');
			setColor('btbackgroundcolor', '#FF0000');
			setColor('bthovercolor', '#ffffff');
			setColor('bthoverbackgroundcolor', '#8B0000');

			setColor('inputcolor', '#FF0000');
			setColor('inputbackgroundcolor', '#ffffff');

			setColor('textareacolor', '#FF0000');
			setColor('textareabackgroundcolor', '#ffffff');

		}
		function templateDarkSlateGrey() {

    		setColor('bodybackgroundcolor', '#ffffff');
			setColor('pcolor', '#2F4F4F');
			setColor('h1color', '#2F4F4F');
			setColor('h2color', '#2F4F4F');
			setColor('h3color', '#2F4F4F');
			setColor('linkcolor', '#2F4F4F');
			setColor('linkhovercolor', '#778899');
			setColor('pricecolor', '#2F4F4F');
			setColor('linkpaginationcolor', '#2F4F4F');
			setColor('linkpaginationselectedcolor', '#778899');
			setColor('btpaginationcolor', '#778899');
			setColor('btpaginationbackgroundcolor', '#2F4F4F');
			setColor('selectcolor', '#ffffff');
			setColor('selectbackgroundcolor', '#2F4F4F');
			setColor('selecthovercolor', '#ffffff');
			setColor('selecthoverbackgroundcolor', '#778899');
			setColor('btcolor', '#ffffff');
			setColor('btbackgroundcolor', '#2F4F4F');
			setColor('bthovercolor', '#ffffff');
			setColor('bthoverbackgroundcolor', '#778899');

			setColor('inputcolor', '#2F4F4F');
			setColor('inputbackgroundcolor', '#ffffff');

			setColor('textareacolor', '#2F4F4F');
			setColor('textareabackgroundcolor', '#ffffff');

		}


		function setColor(id, codeColor) {
			document.getElementById(id).value = codeColor;
			document.getElementById('code' + id).value = codeColor;
		}


		var colorWell
	//	var defaultColor = "#ffffff";

		window.addEventListener("load", startupInitAll, false);
		function startupInitAll() {
			startupInit('bodybackgroundcolor', "#ffffff");
			startupInit('pcolor', "<?php echo $pcolor?>");
			startupInit('h1color', "<?php echo $h1color?>");
			startupInit('h2color', "<?php echo $h2color?>");
			startupInit('h3color', "<?php echo $h3color?>");
			startupInit('linkcolor', "<?php echo $linkcolor?>");
			startupInit('linkhovercolor', "<?php echo $linkhovercolor?>");
			startupInit('pricecolor', "<?php echo $pricecolor?>");

			startupInit('linkpaginationcolor', "<?php echo $linkpaginationcolor?>");
			startupInit('linkpaginationselectedcolor', "<?php echo $linkpaginationselectedcolor?>");

			startupInit('btpaginationcolor', "<?php echo $btpaginationcolor?>");
			startupInit('btpaginationbackgroundcolor', "<?php echo $btpaginationbackgroundcolor?>");

			startupInit('selectcolor', "<?php echo $selectcolor?>");
			startupInit('selectbackgroundcolor', "<?php echo $selectbackgroundcolor?>");
			startupInit('selecthovercolor', "<?php echo $selecthovercolor?>");
			startupInit('selecthoverbackgroundcolor', "<?php echo $selecthoverbackgroundcolor?>");
			
			startupInit('btcolor', "<?php echo $btcolor?>");
			startupInit('btbackgroundcolor', "<?php echo $btbackgroundcolor?>");

			startupInit('bthovercolor', "<?php echo $bthovercolor?>");
			startupInit('bthoverbackgroundcolor', "<?php echo $bthoverbackgroundcolor?>");
		
			startupInit('inputcolor', "<?php echo $inputcolor?>");
			startupInit('inputbackgroundcolor', "<?php echo $inputbackgroundcolor?>");

			startupInit('textareacolor', "<?php echo $textareacolor?>");
			startupInit('textareabackgroundcolor', "<?php echo $textareabackgroundcolor?>");

		}
		function startupInit(id, defaultColor) {
		  colorWell = document.querySelector('#' + id);
		  colorWell.value = defaultColor;
			if (id == 'bodybackgroundcolor') {
		  		colorWell.addEventListener("change", updatebodybackgroundcolor, false);
		  		document.getElementById('codebodybackgroundcolor').value = defaultColor;
		  	}else if (id == 'pcolor') {
		  		colorWell.addEventListener("change", updatepcolor, false);
		  		document.getElementById('codepcolor').value = defaultColor;
		  	}else if (id == 'h1color') {
		  		colorWell.addEventListener("change", updateh1color, false);
		  		document.getElementById('codeh1color').value = defaultColor;
		  	}else if (id == 'h2color') {
		  		colorWell.addEventListener("change", updateh2color, false);
		  		document.getElementById('codeh2color').value = defaultColor;
		  	}else if (id == 'h3color') {
		  		colorWell.addEventListener("change", updateh3color, false);
		  		document.getElementById('codeh3color').value = defaultColor;
		  	}else if (id == 'linkcolor') {
		  		colorWell.addEventListener("change", updatelinkcolor, false);
		  		document.getElementById('codelinkcolor').value = defaultColor;
		  	}else if (id == 'linkhovercolor') {
		  		colorWell.addEventListener("change", updatelinkhovercolor, false);
		  		document.getElementById('codelinkhovercolor').value = defaultColor;
		  	}else if (id == 'pricecolor') {
		  		colorWell.addEventListener("change", updatepricecolor, false);
		  		document.getElementById('codepricecolor').value = defaultColor;
		  	}else if (id == 'linkpaginationcolor') {
		  		colorWell.addEventListener("change", updatelinkpaginationcolor, false);
		  		document.getElementById('codelinkpaginationcolor').value = defaultColor;
		  	}else if (id == 'linkpaginationselectedcolor') {
		  		colorWell.addEventListener("change", updatelinkpaginationselectedcolor, false);
		  		document.getElementById('codelinkpaginationselectedcolor').value = defaultColor;
		  	}else if (id == 'btpaginationcolor') {
		  		colorWell.addEventListener("change", updatebtpaginationcolor, false);
		  		document.getElementById('codebtpaginationcolor').value = defaultColor;
		  	}else if (id == 'btpaginationbackgroundcolor') {
		  		colorWell.addEventListener("change", updatebtpaginationbackgroundcolor, false);
		  		document.getElementById('codebtpaginationbackgroundcolor').value = defaultColor;
		  	}else if (id == 'selectcolor') {
		  		colorWell.addEventListener("change", updateselectcolor, false);
		  		document.getElementById('codeselectcolor').value = defaultColor;
		  	}else if (id == 'selectbackgroundcolor') {
		  		colorWell.addEventListener("change", updateselectbackgroundcolor, false);
		  		document.getElementById('codeselectbackgroundcolor').value = defaultColor;
		  	}else if (id == 'selecthovercolor') {
		  		colorWell.addEventListener("change", updateselecthovercolor, false);
		  		document.getElementById('codeselecthovercolor').value = defaultColor;
		  	}else if (id == 'selecthoverbackgroundcolor') {
		  		colorWell.addEventListener("change", updateselecthoverbackgroundcolor, false);
		  		document.getElementById('codeselecthoverbackgroundcolor').value = defaultColor;
		  	}else if (id == 'btcolor') {
		  		colorWell.addEventListener("change", updatebtcolor, false);
		  		document.getElementById('codebtcolor').value = defaultColor;
		  	}else if (id == 'btbackgroundcolor') {
		  		colorWell.addEventListener("change", updatebtbackgroundcolor, false);
		  		document.getElementById('codebtbackgroundcolor').value = defaultColor;
		  	}else if (id == 'bthovercolor') {
		  		colorWell.addEventListener("change", updatebthovercolor, false);
		  		document.getElementById('codebthovercolor').value = defaultColor;
		  	}else if (id == 'bthoverbackgroundcolor') {
		  		colorWell.addEventListener("change", updatebthoverbackgroundcolor, false);
		  		document.getElementById('codebthoverbackgroundcolor').value = defaultColor;
		  	}else if (id == 'inputcolor') {
		  		colorWell.addEventListener("change", updateinputcolor, false);
		  		document.getElementById('codeinputcolor').value = defaultColor;
		  	}else if (id == 'inputbackgroundcolor') {
		  		colorWell.addEventListener("change", updateinputbackgroundcolor, false);
		  		document.getElementById('codeinputbackgroundcolor').value = defaultColor;
		  	}else if (id == 'textareacolor') {
		  		colorWell.addEventListener("change", updatetextareacolor, false);
		  		document.getElementById('codetextareacolor').value = defaultColor;
		  	}else if (id == 'textareabackgroundcolor') {
		  		colorWell.addEventListener("change", updatetextareabackgroundcolor, false);
		  		document.getElementById('codetextareabackgroundcolor').value = defaultColor;
		  	}

		  colorWell.select();
		}

		function updatebodybackgroundcolor(event) {			
			document.getElementById('codebodybackgroundcolor').value = event.target.value;
		}
		function updatepcolor(event) {			
			document.getElementById('codepcolor').value = event.target.value;
		}
		function updateh1color(event) {			
			document.getElementById('codeh1color').value = event.target.value;
		}
		function updateh2color(event) {			
			document.getElementById('codeh2color').value = event.target.value;
		}
		function updateh3color(event) {			
			document.getElementById('codeh3color').value = event.target.value;
		}
		function updatelinkcolor(event) {			
			document.getElementById('codelinkcolor').value = event.target.value;
		}
		function updatelinkhovercolor(event) {			
			document.getElementById('codelinkhovercolor').value = event.target.value;
		}
		function updatepricecolor(event) {			
			document.getElementById('codepricecolor').value = event.target.value;
		}
		function updatelinkpaginationcolor(event) {			
			document.getElementById('codelinkpaginationcolor').value = event.target.value;
		}
		function updatelinkpaginationselectedcolor(event) {			
			document.getElementById('codelinkpaginationselectedcolor').value = event.target.value;
		}
		function updatebtpaginationcolor(event) {			
			document.getElementById('codebtpaginationcolor').value = event.target.value;
		}
		function updatebtpaginationbackgroundcolor(event) {			
			document.getElementById('codebtpaginationbackgroundcolor').value = event.target.value;
		}
		function updateselectcolor(event) {			
			document.getElementById('codeselectcolor').value = event.target.value;
		}
		function updateselectbackgroundcolor(event) {			
			document.getElementById('codeselectbackgroundcolor').value = event.target.value;
		}
		function updateselecthovercolor(event) {			
			document.getElementById('codeselecthovercolor').value = event.target.value;
		}
		function updateselecthoverbackgroundcolor(event) {			
			document.getElementById('codeselecthoverbackgroundcolor').value = event.target.value;
		}
		function updatebtcolor(event) {			
			document.getElementById('codebtcolor').value = event.target.value;
		}
		function updatebtbackgroundcolor(event) {			
			document.getElementById('codebtbackgroundcolor').value = event.target.value;
		}
		function updatebthovercolor(event) {			
			document.getElementById('codebthovercolor').value = event.target.value;
		}
		function updatebthoverbackgroundcolor(event) {			
			document.getElementById('codebthoverbackgroundcolor').value = event.target.value;
		}

		function updateinputcolor(event) {			
			document.getElementById('codeinputcolor').value = event.target.value;
		}
		function updateinputbackgroundcolor(event) {			
			document.getElementById('codeinputbackgroundcolor').value = event.target.value;
		}

		function updatetextareacolor(event) {			
			document.getElementById('codetextareacolor').value = event.target.value;
		}
		function updatetextareabackgroundcolor(event) {			
			document.getElementById('codetextareabackgroundcolor').value = event.target.value;
		}

		function lostFocus(idcode) {
			//alert('lostFocus ' + idcode);
			var id = idcode.substr(4, idcode.lenght);
			document.getElementById(id).value = document.getElementById(idcode).value;
		}
	</script>
	<button id="button_reset_couleur-origine" onclick="resetOrigine();">Reset couleur origine</button>
					<button id="button_save_site_client_parameter" onclick="save_site_client_parameter('<?php echo $login ?>');">Enregistrer</button>
					&nbsp;<p id="msgmessage"></p>
	<table align="left">
		<tr>
			<td colspan="5"><button id="button_template_couleur-SteelBlue" style="background: #4682B4; color: #ffffff" onclick="templateSteelBlue();">Modèle SteelBlue</button>
				&nbsp;<button id="button_template_couleur-Green" style="background: #008000; color: #ffffff" onclick="templateGreen();">Modèle Green</button>
				&nbsp;<button id="button_template_couleur-Red" style="background: #FF0000; color: #ffffff" onclick="templateRed();">Modèle Red</button>
				&nbsp;<button id="button_template_couleur-Red" style="background: #2F4F4F; color: #ffffff" onclick="templateDarkSlateGrey();">Modèle SlateGrey</button>
				
				<button id="button_save_site_client_parameter" onclick="save_site_client_parameter('<?php echo $login ?>');">Enregistrer</button>
			</td>		
		</tr>		
		<tr>
			<td align="left"><label for="bodybackgroundcolor"><b>Couleur fond de la page</b></label></td>
			<td><input type="color" id="bodybackgroundcolor" name="bodybackgroundcolor" value="<?php echo $pcolor?>" ></td>
			<td align="left"><label for="codebodybackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codebodybackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="pcolor"><b>Couleur paragraphe</b></label></td>
			<td><input type="color" id="pcolor" name="pcolor" value="<?php echo $pcolor?>" ></td>
			<td align="left"><label for="codepcolor"><b>Code</b></label></td>
			<td><input type="text" id="codepcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="h1color"><b>Couleur h1</b></label></td>
			<td><input type="color" id="h1color" name="h1color" value="<?php echo $h1color?>" ></td>
			<td align="left"><label for="codeh1color"><b>Code</b></label></td>
			<td><input type="text" id="codeh1color" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="h2color"><b>Couleur h2</b></label></td>
			<td><input type="color" id="h2color" name="h2color" value="<?php echo $h2color?>" ></td>
			<td align="left"><label for="codeh2color"><b>Code</b></label></td>
			<td><input type="text" id="codeh2color" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="h3color"><b>Couleur h3</b></label></td>
			<td><input type="color" id="h3color" name="h3color" value="<?php echo $h3color?>" ></td>
			<td align="left"><label for="codeh3color"><b>Code</b></label></td>
			<td><input type="text" id="codeh3color" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="linkcolor"><b>Couleur lien</b></label></td>
			<td><input type="color" id="linkcolor" name="linkcolor" value="<?php echo $linkcolor?>" ></td>
			<td align="left"><label for="codelinkcolor"><b>Code</b></label></td>
			<td><input type="text" id="codelinkcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="linkhovercolor"><b>Couleur lien survol</b></label></td>
			<td><input type="color" id="linkhovercolor" name="linkhovercolor" value="<?php echo $linkhovercolor?>" ></td>
			<td align="left"><label for="codelinkhovercolor"><b>Code</b></label></td>
			<td><input type="text" id="codelinkhovercolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="pricecolor"><b>Couleur du Prix</b></label></td>
			<td><input type="color" id="pricecolor" name="pricecolor" value="<?php echo $pricecolor?>" ></td>
			<td align="left"><label for="codepricecolor"><b>Code</b></label></td>
			<td><input type="text" id="codepricecolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="linkpaginationcolor"><b>Couleur lien pagination</b></label></td>
			<td><input type="color" id="linkpaginationcolor" name="linkpaginationcolor" value="<?php echo $linkpaginationcolor?>" ></td>
			<td align="left"><label for="codelinkpaginationcolor"><b>Code</b></label></td>
			<td><input type="text" id="codelinkpaginationcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="linkpaginationselectedcolor"><b>Couleur lien pagination selectionné</b></label></td>
			<td><input type="color" id="linkpaginationselectedcolor" name="linkpaginationselectedcolor" value="<?php echo $linkpaginationselectedcolor?>" ></td>
			<td align="left"><label for="codelinkpaginationselectedcolor"><b>Code</b></label></td>
			<td><input type="text" id="codelinkpaginationselectedcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="btpaginationcolor"><b>Couleur bouton pagination</b></label></td>
			<td><input type="color" id="btpaginationcolor" name="btpaginationcolor" value="<?php echo $btpaginationcolor?>" ></td>
			<td align="left"><label for="codebtpaginationcolor"><b>Code</b></label></td>
			<td><input type="text" id="codebtpaginationcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="btpaginationbackgroundcolor"><b>Couleur fond bouton pagination</b></label></td>
			<td><input type="color" id="btpaginationbackgroundcolor" name="btpaginationbackgroundcolor" value="<?php echo $btpaginationbackgroundcolor?>" ></td>
			<td align="left"><label for="codebtpaginationbackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codebtpaginationbackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="selectcolor"><b>Couleur liste déroulante</b></label></td>
			<td><input type="color" id="selectcolor" name="selectcolor" value="<?php echo $selectcolor?>" ></td>
			<td align="left"><label for="codeselectcolor"><b>Code</b></label></td>
			<td><input type="text" id="codeselectcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="selectbackgroundcolor"><b>Couleur fond liste déroulante</b></label></td>
			<td><input type="color" id="selectbackgroundcolor" name="selectbackgroundcolor" value="<?php echo $selectbackgroundcolor?>" ></td>
			<td align="left"><label for="codeselectbackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codeselectbackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="selecthovercolor"><b>Couleur liste déroulante survol</b></label></td>
			<td><input type="color" id="selecthovercolor" name="selecthovercolor" value="<?php echo $selecthovercolor?>" ></td>
			<td align="left"><label for="codeselecthovercolor"><b>Code</b></label></td>
			<td><input type="text" id="codeselecthovercolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="selecthoverbackgroundcolor"><b>Couleur fond liste déroulante survol</b></label></td>
			<td><input type="color" id="selecthoverbackgroundcolor" name="selecthoverbackgroundcolor" value="<?php echo $selecthoverbackgroundcolor?>" ></td>
			<td align="left"><label for="codeselecthoverbackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codeselecthoverbackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="btcolor"><b>Couleur bouton</b></label></td>
			<td><input type="color" id="btcolor" name="btcolor" value="<?php echo $btcolor?>" ></td>
			<td align="left"><label for="codebtcolor"><b>Code</b></label></td>
			<td><input type="text" id="codebtcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="btbackgroundcolor"><b>Couleur fond bouton</b></label></td>
			<td><input type="color" id="btbackgroundcolor" name="btbackgroundcolor" value="<?php echo $btbackgroundcolor?>" ></td>
			<td align="left"><label for="codebtbackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codebtbackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>
			<td></td>	
		</tr>
		<tr>
			<td align="left"><label for="bthovercolor"><b>Couleur bouton survol</b></label></td>
			<td><input type="color" id="bthovercolor" name="bthovercolor" value="<?php echo $bthovercolor?>" ></td>
			<td align="left"><label for="codebthovercolor"><b>Code</b></label></td>
			<td><input type="text" id="codebthovercolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>	
			<td></td>
		</tr>
		<tr>
			<td align="left"><label for="bthoverbackgroundcolor"><b>Couleur fond bouton survol</b></label></td>
			<td><input type="color" id="bthoverbackgroundcolor" name="bthoverbackgroundcolor" value="<?php echo $bthoverbackgroundcolor?>" ></td>
			<td align="left"><label for="codebthoverbackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codebthoverbackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>
			<td></td>	
		</tr>
		<tr>
			<td align="left"><label for="inputcolor"><b>Couleur input</b></label></td>
			<td><input type="color" id="inputcolor" name="inputcolor" value="<?php echo $inputcolor?>" ></td>
			<td align="left"><label for="codeinputcolor"><b>Code</b></label></td>
			<td><input type="text" id="codeinputcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>
			<td></td>	
		</tr>
		<tr>
			<td align="left"><label for="inputbackgroundcolor"><b>Couleur fond input</b></label></td>
			<td><input type="color" id="inputbackgroundcolor" name="inputbackgroundcolor" value="<?php echo $inputbackgroundcolor?>" ></td>
			<td align="left"><label for="codeinputbackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codeinputbackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>
			<td></td>	
		</tr>
		<tr>
			<td align="left"><label for="textareacolor"><b>Couleur textarea</b></label></td>
			<td><input type="color" id="textareacolor" name="textareacolor" value="<?php echo $textareacolor?>" ></td>
			<td align="left"><label for="codetextareacolor"><b>Code</b></label></td>
			<td><input type="text" id="codetextareacolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>
			<td></td>	
		</tr>
		<tr>
			<td align="left"><label for="textareabackgroundcolor"><b>Couleur fond textarea</b></label></td>
			<td><input type="color" id="textareabackgroundcolor" name="textareabackgroundcolor" value="<?php echo $textareabackgroundcolor?>" ></td>
			<td align="left"><label for="codetextareabackgroundcolor"><b>Code</b></label></td>
			<td><input type="text" id="codetextareabackgroundcolor" placeholder="" value="" onblur="lostFocus(this.id)"/></td>
			<td></td>	
		</tr>

		<tr>
			<td colspan="5"><br><button id="button_save_site_client_parameter" onclick="save_site_client_parameter('<?php echo $login ?>');">Enregistrer</button>
			&nbsp;<p id="msgmessagebottom"></p></td> 		
		</tr>
	</table>


<script type="text/javascript">
	
	function save_site_client_parameter(login){
		
		var codebodybackgroundcolor = document.getElementById('codebodybackgroundcolor').value;
		if (codebodybackgroundcolor === undefined || codebodybackgroundcolor == null || codebodybackgroundcolor == '') {codebodybackgroundcolor = '';}

		var codepcolor = document.getElementById('codepcolor').value;
		if (codepcolor === undefined || codepcolor == null || codepcolor == '') {codepcolor = '';}

		var codeh1color = document.getElementById('codeh1color').value;
		if (codeh1color === undefined || codeh1color == null || codeh1color == '') {codeh1color = '';}
	
		var codeh2color = document.getElementById('codeh2color').value;
		if (codeh2color === undefined || codeh2color == null || codeh2color == '') {codeh2color = '';}
		
		var codeh3color = document.getElementById('codeh3color').value;
		if (codeh3color === undefined || codeh3color == null || codeh3color == '') {codeh3color = '';}
		
		var codeh4color = '';
		var codeh5color = '';
		var codeh6color = '';

		var codelinkcolor = document.getElementById('codelinkcolor').value;
		if (codelinkcolor === undefined || codelinkcolor == null || codelinkcolor == '') {codelinkcolor = '';}
	
		var codelinkhovercolor = document.getElementById('codelinkhovercolor').value;
		if (codelinkhovercolor === undefined || codelinkhovercolor == null || codelinkhovercolor == '') {codelinkhovercolor = '';}
		
		var codepricecolor = document.getElementById('codepricecolor').value;
		if (codepricecolor === undefined || codepricecolor == null || codepricecolor == '') {codepricecolor = '';}
		
		var codelinkpaginationcolor = document.getElementById('codelinkpaginationcolor').value;
		if (codelinkpaginationcolor === undefined || codelinkpaginationcolor == null || codelinkpaginationcolor == '') {codelinkpaginationcolor = '';}
		
		var codelinkpaginationselectedcolor = document.getElementById('codelinkpaginationselectedcolor').value;
		if (codelinkpaginationselectedcolor === undefined || codelinkpaginationselectedcolor == null || codelinkpaginationselectedcolor == '') {codelinkpaginationselectedcolor = '';}
	
		var codebtpaginationcolor = document.getElementById('codebtpaginationcolor').value;
		if (codebtpaginationcolor === undefined || codebtpaginationcolor == null || codebtpaginationcolor == '') {codebtpaginationcolor = '';}
		
		var codebtpaginationbackgroundcolor = document.getElementById('codebtpaginationbackgroundcolor').value;
		if (codebtpaginationbackgroundcolor === undefined || codebtpaginationbackgroundcolor == null || codebtpaginationbackgroundcolor == '') {codebtpaginationbackgroundcolor = '';}
		
		var codeselectcolor = document.getElementById('codeselectcolor').value;
		if (codeselectcolor === undefined || codeselectcolor == null || codeselectcolor == '') {codeselectcolor = '';}
		
		var codeselectbackgroundcolor = document.getElementById('codeselectbackgroundcolor').value;
		if (codeselectbackgroundcolor === undefined || codeselectbackgroundcolor == null || codeselectbackgroundcolor == '') {codeselectbackgroundcolor = '';}
		
		var codeselecthovercolor = document.getElementById('codeselecthovercolor').value;
		if (codeselecthovercolor === undefined || codeselecthovercolor == null || codeselecthovercolor == '') {codeselecthovercolor = '';}
		
		var codeselecthoverbackgroundcolor = document.getElementById('codeselecthoverbackgroundcolor').value;
		if (codeselecthoverbackgroundcolor === undefined || codeselecthoverbackgroundcolor == null || codeselecthoverbackgroundcolor == '') {codeselecthoverbackgroundcolor = '';}
		

		var codebtcolor = document.getElementById('codebtcolor').value;
		if (codebtcolor === undefined || codebtcolor == null || codebtcolor == '') {codebtcolor = '';}
		
		var codebtbackgroundcolor = document.getElementById('codebtbackgroundcolor').value;
		if (codebtbackgroundcolor === undefined || codebtbackgroundcolor == null || codebtbackgroundcolor == '') {codebtbackgroundcolor = '';}

		var codebthovercolor = document.getElementById('codebthovercolor').value;
		if (codebthovercolor === undefined || codebthovercolor == null || codebthovercolor == '') {codebthovercolor = '';}

		var codebthoverbackgroundcolor = document.getElementById('codebthoverbackgroundcolor').value;
		if (codebthoverbackgroundcolor === undefined || codebthoverbackgroundcolor == null || codebthoverbackgroundcolor == '') {codebthoverbackgroundcolor = '';}

		var codeinputcolor = document.getElementById('codeinputcolor').value;
		if (codeinputcolor === undefined || codeinputcolor == null || codeinputcolor == '') {codeinputcolor = '';}
		
		var codeinputbackgroundcolor = document.getElementById('codeinputbackgroundcolor').value;
		if (codeinputbackgroundcolor === undefined || codeinputbackgroundcolor == null || codeinputbackgroundcolor == '') {codeinputbackgroundcolor = '';}
		
		var codetextareacolor = document.getElementById('codetextareacolor').value;
		if (codetextareacolor === undefined || codetextareacolor == null || codetextareacolor == '') {codetextareacolor = '';}
		
		var codetextareabackgroundcolor = document.getElementById('codetextareabackgroundcolor').value;
		if (codetextareabackgroundcolor === undefined || codetextareabackgroundcolor == null || codetextareabackgroundcolor == '') {codetextareabackgroundcolor = '';}
		

	//	alert('login A' + login);
		document.getElementById("msgmessage").innerHTML = "Mise à jour des couleurs ... Patienter ";
		document.getElementById("msgmessage").style.color = "green";
	    document.getElementById("msgmessage").style.fontWeight = "bold";
	    document.getElementById("msgmessagebottom").innerHTML = "Mise à jour des couleurs ... Patienter ";
		document.getElementById("msgmessagebottom").style.color = "green";
	    document.getElementById("msgmessagebottom").style.fontWeight = "bold";
		// save in db

		  var xmlhttp;  
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	var result = this.responseText;
		    //	document.getElementById("msgmessage").innerHTML = result;
		    	result = result.replace('(', '');
				result = result.replace(');', '');
				var obj = JSON.parse(result); 
				if (obj.exitvalue == '0') {	
					document.getElementById("msgmessage").innerHTML = "Les paramètres de votre site sont enregistrés ";
					document.getElementById("msgmessage").style.color = "green";
	         		document.getElementById("msgmessage").style.fontWeight = "bold";
	         		document.getElementById("msgmessagebottom").innerHTML = "Les paramètres de votre site sont enregistrés ";
					document.getElementById("msgmessagebottom").style.color = "green";
	         		document.getElementById("msgmessagebottom").style.fontWeight = "bold";
				}else if (obj.exitvalue == '1'){
					document.getElementById("msgmessage").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgmessage").style.color = "red";
	        		document.getElementById("msgmessage").style.fontWeight = "bold";
	        		document.getElementById("msgmessagebottom").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
					document.getElementById("msgmessagebottom").style.color = "red";
	        		document.getElementById("msgmessagebottom").style.fontWeight = "bold";
				}					
		    }
		  };

		var data_string = '&service=' + 'putSiteClientParameter' + '&idSiteClientParameter=' + login + "&bodybackgroundcolor=" + codebodybackgroundcolor + "&pcolor=" + codepcolor + "&h1color=" + codeh1color + "&h2color=" + codeh2color + "&h3color=" + codeh3color + "&h4color=" + codeh4color + "&h5color=" + codeh5color + "&h6color=" + codeh6color + "&linkcolor=" + codelinkcolor + "&linkhovercolor=" + codelinkhovercolor + "&pricecolor=" + codepricecolor + "&linkpaginationcolor=" + codelinkpaginationcolor + "&linkpaginationselectedcolor=" + codelinkpaginationselectedcolor + "&btpaginationcolor=" + codebtpaginationcolor + "&btpaginationbackgroundcolor=" + codebtpaginationbackgroundcolor + "&selectcolor=" + codeselectcolor + "&selectbackgroundcolor=" + codeselectbackgroundcolor + "&selecthovercolor=" + codeselecthovercolor + "&selecthoverbackgroundcolor=" + codeselecthoverbackgroundcolor + "&btcolor=" + codebtcolor + "&btbackgroundcolor=" + codebtbackgroundcolor + "&bthovercolor=" + codebthovercolor + "&bthoverbackgroundcolor=" + codebthoverbackgroundcolor + "&inputcolor=" + codeinputcolor + "&inputbackgroundcolor=" + codeinputbackgroundcolor + "&textareacolor=" + codetextareacolor + "&textareabackgroundcolor=" + codetextareabackgroundcolor;

		  xmlhttp.open("POST", "https://real-estate-france-db-prod.appspot.com/managedbmysql?callback=JSON_CALLBACK", true);
		  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xmlhttp.send(data_string);
		//login, codebodybackgroundcolor, codepcolor, codeh1color, codeh2color, codeh3color, codelinkcolor, codelinkhovercolor, codepricecolor, codelinkpaginationcolor, codelinkpaginationselectedcolor, codebtpaginationcolor, codebtpaginationbackgroundcolor, codeselectcolor, codeselectbackgroundcolor, codebtcolor, codebtbackgroundcolor);
	}

</script>
	<!--	<form >
/>
	bodybackgroundcolor <br>
    pcolor <br
    h1color  <br>>
    linkcolor  <br>
    linkhovercolor  <br>
    pricecolor  <br>
    linkpaginationcolor  <br>
    linkpaginationselectedcolor  <br>
    btpaginationcolor  <br>
    btpaginationbackgroundcolor  <br>
    selectcolor  <br>
    selectbackgroundcolor  <br>
    btbackgroundcolor <br>
    btcolor  <br>-->

<!--#333   #222
-->