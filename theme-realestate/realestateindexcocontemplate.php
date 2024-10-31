<?php
/**
 * Template Name: RealEstateIndexCocon
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Real estate
 * @since 1.0
 * @version 1.0
 */

//get_header();
if ( ! defined( 'ABSPATH' ) ) exit; 
get_template_part( 'header', 'realestate' ); 
$pubOn = false;
$linkPromoOn = false;
$siteRealestateOn = false;
if ( get_home_url() == 'http://vps520391.ovh.net') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
if ( get_home_url() == 'http://35.187.105.166') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour les tests
if ( get_home_url() == 'https://www.immobilier-fr.fr') { $pubOn = true; $linkPromoOn = true; $siteRealestateOn = true;} // pour la Production

$urlLogo = plugins_url() . '/real-estate-agency/theme-realestate/realestate-template-parts/image/'. 'Logo-Real-estate-Medium-WP-Comp.jpg';
$urlDom = get_home_url();

global $wp_query;
			
			$idc = get_query_var('idc', '');

			$level = get_query_var('level', '');
			$zip = get_query_var('zip', '');
		//	echo "level " . $level . "  zip " .$zip ."<br><br>";


global $wpdb;
			
			$result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
			$login = $result->email_realestate;

		// pour les tests
			if ( get_home_url() == 'http://vps520391.ovh.net') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$login = "ppatrick500@yahoo.fr";
			} 
			// pour les tests
			if ( get_home_url() == 'http://35.187.105.166') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
				$login = "ppatrick500@yahoo.fr";
			} 

			// pour la Production
			if ( get_home_url() == 'https://www.immobilier-fr.fr') {
				$fieldFilter = 'keyMasterNetWork5';
				$valueStringField = '';
			}
			
			$url = "https://real-estate-france-db-prod.appspot.com/managedbmysql";

			$pageSelected = "1";
			$nbPropertiesByPage = 300;

			$showDept = false;
			$showListCity = false;
			$showListPage = false;
			$showPage = false;
			if ($level == "dept"){
				$showDept = true;
			}

			$lexie1 = '';
    		$lexie2 = '';
    		$lexie3 = '';
    		$lexie5 = 'appartement';
			if ($level == "0"){
				$showListCity = true;
				$showPage = true;
				$lexie1 = $zip;
			}else if ($level == "1"){
				$showDept = false;
				$showListPage = true;
				$showPage = true;
				$lexie2 = $zip;
			}

    	//	$currentPage = "1";

			if ($showPage){
				$data = array('service' => 'readPageCoconForIndex', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'level' => $level, 'lexie1' => $lexie1, 'lexie2' => $lexie2, 'lexie3' => $lexie3, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data)
							));			

				$context = stream_context_create($options);
				$app_list = file_get_contents($url, false, $context);
				$app_list = json_decode($app_list, true);

			//	echo "list data A is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";

				$data = array('service' => 'readPageCoconForIndexCityByDept', 'plateform' => '1', 't' => '', 'login' => $login, 'pwdCripted' => '', 'keyCustomer' => '', 'idc' => ''
	 				, 'level' => $level, 'lexie1' => $lexie1, 'lexie5' => $lexie5, 'currentPage' => $pageSelected, 'numberSize' => $nbPropertiesByPage);

	 			$options = array('http' => array(
							    'method'=> 'POST',
							    'header'=>'Content-type: application/x-www-form-urlencoded',
				                'content'=> http_build_query($data)
							));			

				$context = stream_context_create($options);
				$app_list_citybydept = file_get_contents($url, false, $context);
				$app_list_citybydept = json_decode($app_list_citybydept, true);

			//	echo "list data B is: '".implode("','",$data). "  nb " . sizeof($app_list) . "'<br><br>";
			}
?>


</head> 

<style>
.site-header{
	top: -12px;
}
.headcontent {
   padding: 1.5em 0 0 0;
}

.width_content-realestate{width:900px;}
</style>

<body <?php body_class(); ?>  onresize="resizeScreenHead()">

<div id="page" class="site" class="width_content-realestate">

	<header id="masthead" class="site-header" role="banner" valign="top">

		<?php get_template_part( 'realestate-template-parts/header/header', 'imagerealestate' ); ?>
		
	</header><!-- #masthead <?php wp_title( '', true, 'right' ); ?> position: absolute;-->

	<div class="site-content-contain">
		<div id="content" class="site-content headcontent">
		<p id="msg"></p>

<script type="text/javascript">
	
	function resizeScreenHead() {
		var largScreen = window.innerWidth;
		var largDiv = document.getElementById('firstDiv').clientWidth;
		var left = 0;
		left = (largScreen - largDiv)/2;
		var leftP = (left / largScreen)*100;
		document.getElementById('firstDiv').style.marginLeft = leftP + "%";
		document.getElementById('firstDiv').style.marginRight = leftP + "%";
	//	document.getElementById('msg').innerHTML = 'largScreen ' +  largScreen + '  largDiv ' + largDiv + ' left' + left + '   ' + leftP +'%';
	}
</script>






<style>
.propertiescontent {
   padding: 0 0 0 0;
}
.full-realestate{
	margin-top: -3.5em;
	<?php 
		if ( wp_is_mobile() ) { 
			echo "max-width: 610px;";
		} else { 
			echo "width: 940px;";
		} 	
	?>
}

.adjust-vertical-realestate{
	margin-top: -1.5em;
}
.pointer {
    cursor:pointer;
}
.button_nav {
    white-space: nowrap;
}

th, td {
    word-wrap: break-word;   
}

.contact {
    width:600px;
    table-layout:fixed;
}
.linkUnderline {
    text-decoration: underline;
}
</style>

<div class="full-realestate" id="firstDiv">
<script type="text/javascript">
		function resizeScreen() {
		var largScreen = window.innerWidth;
		var largDiv = document.getElementById('firstDiv').clientWidth;
		var left = 0;
		left = (largScreen - largDiv)/2;
		var leftP = (left / largScreen)*100;
		document.getElementById('firstDiv').style.marginLeft = leftP + "%";
		document.getElementById('firstDiv').style.marginRight = leftP + "%";
	}
	resizeScreen();

	function openWin(url) {
		    window.open(url);
		}
	  
</script>


<?php if ( ! wp_is_mobile() ) { ?>
<div id="primary">
		<main id="main" role="main">

			<?php if ($showDept){ ?>
				<br>Liste des départements
				<br><a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/pageindex/0/73/")?>'>73 Savoie </a>
			<!--	<br><a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/pageindex/0/74/")?>'>74 Haute-Savoie </a>-->
			<?php }	?>

			<?php if ($showListCity){ ?>
				<br>Liste des villes du département <?php echo $zip ?> 
				<br>
				<?php foreach ($app_list_citybydept as $applistcitybydept): ?>
					<br><a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/pageindex/1/".$applistcitybydept["lexie2"]."/")?>'><?php echo $applistcitybydept["lexie4"] . " " . $applistcitybydept["lexie3"] . " " . $applistcitybydept["lexie2"]?> </a>
					

				<?php endforeach; ?>
			<?php }	?>
			<?php if ($showListPage){ ?>
				<br>Liste des pages de la villes code postal <?php echo $zip ?> 
				<br>
				<?php foreach ($app_list as $applist): ?>
					<br><a class="linkUnderline" href='<?php echo esc_url_raw($urlDom.'/immo/'.$applist["idUrlPageCocon"])?>'><?php echo $applist["idUrlPageCocon"] . " " . $applist["lexie2"] ?> </a>

				<?php endforeach; ?>
			<?php }	?>

		    <?php if ( $siteRealestateOn) { ?> 
				<!-- Global site tag (gtag.js) - Google Analytics -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-99021046-1"></script>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', 'UA-99021046-1');
				</script>
			<?php } ?>	
		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div>
</div>
</div>
</div>
</div>
<?php }//get_footer();  ?>


<?php if ( wp_is_mobile() ) { ?>
<div id="primary">
		<main id="main" role="main">

			<?php if ($showDept){ ?>
				<br>&nbsp;&nbsp;Liste des départements
				<br>&nbsp;&nbsp;<a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/pageindex/0/73/")?>'>73 Savoie </a>
			<!--	<br><a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/pageindex/0/74/")?>'>74 Haute-Savoie </a>-->
			<?php }	?>

			<?php if ($showListCity){ ?>
				<br>&nbsp;&nbsp;Liste des villes du département <?php echo $zip ?> 
				<br>
				<?php foreach ($app_list_citybydept as $applistcitybydept): ?>
					<br>&nbsp;&nbsp;<a class="linkUnderline" href='<?php echo esc_url_raw($urlDom."/pageindex/1/".$applistcitybydept["lexie2"]."/")?>'><?php echo $applistcitybydept["lexie4"] . " " . $applistcitybydept["lexie3"] . " " . $applistcitybydept["lexie2"]?> </a>
					

				<?php endforeach; ?>
			<?php }	?>
			<?php if ($showListPage){ ?>
				<br>&nbsp;&nbsp;Liste des pages de la villes code postal <?php echo $zip ?> 
				<br>
				<?php foreach ($app_list as $applist): ?>
					<br>&nbsp;&nbsp;<a class="linkUnderline" href='<?php echo esc_url_raw($urlDom.'/immo/'.$applist["idUrlPageCocon"])?>'><?php echo $applist["idUrlPageCocon"] . " " . $applist["lexie2"] ?> </a>

				<?php endforeach; ?>
			<?php }	?>

		    <?php if ( $siteRealestateOn) { ?> 
				<!-- Global site tag (gtag.js) - Google Analytics -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=UA-99021046-1"></script>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', 'UA-99021046-1');
				</script>
			<?php } ?>	
		</main><!-- #main <?php echo get_template_directory() . '/adsgoogle'?>-->
	</div>
</div>
</div>
</div>
</div>
<?php }//get_footer();  ?>



	<script type="text/javascript">


function empty_field(string) {

      var validity = true;

      if( string == '' ) { validity = false; }

      return validity;
    }
    function sanitize_string(string) {

      var validity = true;

      if( string.match( /[|<|,|>|\/|"|{|\[|}|\]|\||\\|~|`|!|@|#|\$|%|\^|&|\*|\(|\)|_|=]+/ ) != null ) {
          validity = false;
      }

      return validity;
    }

    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    function is_url(str) {
	  regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
	        if (regexp.test(str))
	        {
	          return true;
	        }
	        else
	        {
	          return false;
	        }
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

	</script>
		</body>
</html>
