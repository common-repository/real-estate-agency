<?php

/*
Plugin Name: Real Estate Agency
Plugin URI : http://immobilier-fr.fr
Description: Affiche les biens d'une agence, la gestion des biens peux se faire depuis l'administration de Wordpress ou de l'application Facebook
Version: 1.0.0
Author: Patrick Petit
License: Free
 */

// http://real-estate-france-front-end.appspot.com/realestateagency.zip

/**
 * Real Estate only works in WordPress 4.7 or later.
 */
ini_set('display_errors','off');


function remove_canonical_init()
{
   remove_action('wp_head', 'rel_canonical');
}
add_action('init', 'remove_canonical_init', 15);


$theme = wp_get_theme();
if ($theme != 'Twenty Seventeen') {
  echo '<script type="text/javascript">alert("Le thème ' . $theme . ' n\'est pas adapté au plugin Real Estate Agency. Veuillez activer le thème officiel \"Twenty Seventeen\" et réinstaller le plugin Real Estate Agency. Merci.' . '")</script>';
}

if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
    $message = 'Real estate nécessite au moins la version WordPress 4.7. Vous utilisez la version ' . $GLOBALS['wp_version'] . '. Veuillez la mettre à jour et réessayer.';
    echo '<script type="text/javascript">alert("' . $message . '")</script>';
    return;
}

function userinfo_global() {
    global $bodybackgroundcolor;
    global $pcolor;
    global $h1color;
    global $linkcolor;
    global $linkhovercolor;
    global $pricecolor;
    global $linkpaginationcolor;
    global $linkpaginationselectedcolor;
    global $btpaginationcolor;
    global $btpaginationbackgroundcolor;
    global $selectcolor;
    global $selectbackgroundcolor;
    global $selecthovercolor;
    global $selecthoverbackgroundcolor;
    global $btcolor;
    global $btbackgroundcolor;
    global $bthovercolor;
    global $bthoverbackgroundcolor;
    global $inputcolor;
    global $inputbackgroundcolor;
    global $textareacolor;
    global $textareabackgroundcolor;

    global $wpdb;
    $result = $wpdb->get_row(" SELECT email_realestate, pwd_realestate  FROM " . $wpdb->prefix . 'realestate' );
    $login = $result->email_realestate;
  

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

          $inputcolor = '#008000';
          $inputbackgroundcolor = '#ffffff';

          $textareacolor = '#008000';
          $textareabackgroundcolor = '#ffffff';
          
      }

}
add_action( 'init', 'userinfo_global' );

function realestate_install_account_db(){  
             global $wpdb;  
             $table_realestate = $wpdb->prefix.'realestate'; 
            if($wpdb->get_var("SHOW TABLES LIKE '$table_realestate'")!= $table_realestate){ 
                 $sql="CREATE TABLE " . $table_realestate . "( 
                 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,  
                 email_realestate VARCHAR(100) NOT NULL,
                 pwd_realestate VARCHAR(50) NOT NULL
                 )ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci 
                 ;"; 

                 require_once(ABSPATH.'wp-admin/includes/upgrade.php'); 
                 dbDelta($sql); 
              
                  $wpdb->query( $wpdb->prepare( "INSERT INTO " . $wpdb->prefix . 'realestate' . "( email_realestate ) VALUES (%s ) ",  ''  )); 
            }
             
} 
register_activation_hook( __FILE__, 'realestate_install_account_db' );

function realestate_install_smtp_db(){  
          global $wpdb;
          $table_realestate_smtp = $wpdb->prefix.'realestate_smtp'; 
            if($wpdb->get_var("SHOW TABLES LIKE '$table_realestate_smtp'")!= $table_realestate_smtp){ 
                 $sqlsmtp="CREATE TABLE " . $table_realestate_smtp . "( 
                 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,  
                 smtp_user_realestate VARCHAR(100) NOT NULL,
                 smtp_pass_realestate VARCHAR(50) NOT NULL,
                 smtp_host_realestate VARCHAR(100) NOT NULL,
                 smtp_port_realestate INT UNSIGNED NOT NULL,
                 smtp_secure_realestate VARCHAR(5) NOT NULL,
                 smtp_authentification_realestate VARCHAR(5) NOT NULL,
                 smtp_debug_realestate INT UNSIGNED NOT NULL,
                 smtp_autotls_realestate VARCHAR(5) NOT NULL,
                 smtp_from_realestate VARCHAR(100) NOT NULL,
                 smtp_name_realestate VARCHAR(100) NOT NULL,
                 smtp_reply_realestate VARCHAR(100) NOT NULL
                 )ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci 
                 ;"; 

                 require_once(ABSPATH.'wp-admin/includes/upgrade.php'); 
                 dbDelta($sqlsmtp); 
              
             $wpdb->query( $wpdb->prepare( "INSERT INTO " . $wpdb->prefix . 'realestate_smtp' . "( smtp_user_realestate, smtp_pass_realestate, smtp_host_realestate, smtp_port_realestate, smtp_secure_realestate, smtp_authentification_realestate, smtp_debug_realestate, smtp_autotls_realestate, smtp_from_realestate, smtp_name_realestate, smtp_reply_realestate) VALUES (%s, %s, %s, %d, %s, %s, %d, %s, %s, %s, %s ) ",  '', '', '', 465, 'ssl', 'true', 0, 'false', '', '', '' )); 
            }
}
register_activation_hook( __FILE__, 'realestate_install_smtp_db' );


    function create_home_page_realestate_template(){
        $new_page_title = 'homelistrealestate'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatelistpropertiestemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
            update_option( 'page_on_front', $new_page_id );
            update_option( 'show_on_front', 'page' );
        }
    }

     function create_page_list_realestate_template(){
        $new_page_title = 'listproperties'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatelistpropertiestemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_property_realestate_template(){
        $new_page_title = 'property'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatepropertytemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_account_visitor_template(){
        $new_page_title = 'accountvisitor'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestateaccountvisitortemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_contactagence_template(){
        $new_page_title = 'contactagence'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatecontactagencetemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_agence_immo_template(){
        $new_page_title = 'agenceimmo'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestateagenceimmotemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_list_agencies_template(){
        $new_page_title = 'listeagenceimmo'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatelistagenciestemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_cocon_template(){
        $new_page_title = 'cocon'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatecocontemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_index_cocon_template(){
        $new_page_title = 'indexcocon'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestateindexcocontemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }
    
    function create_page_realestate_plan_site_template(){
        $new_page_title = 'plansite'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestateplansitetemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_sitemap_all_template(){
        $new_page_title = 'sitemapall'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatesitemapalltemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }

    function create_page_realestate_post_ad_template(){
        $new_page_title = 'postad'; 
        $new_page_content = 'Real estate';
        $current_user = wp_get_current_user();
        $option = 'Ne pas supprimer cette page ';

        $new_page = array(
                    'post_type' => 'page',
                    'post_title' => $new_page_title,
                    'post_content' => $option . $new_page_content,
                    'post_status' => 'publish',
                    'post_author' => $current_user->ID,
                    'page_template' => 'realestatepostadtemplate.php'
          ); 

        $page = get_page_by_title( $new_page_title );

        if ( !$page->post_title == $new_page_title ){
           $new_page_id = wp_insert_post($new_page); 
        }
    }


add_action('admin_menu', 'admin_realestate_menu');  
function admin_realestate_menu() { 
// Add to admin_menu function
    add_menu_page('My Menu Page', 'Realestate v2', 'manage_options', 'realestate_main_menu_', 'realestate_admin_menu_render', '', 7); 
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page0', 'Realestate v1', 'manage_options', 'realestate_oldadmin_menu', 'realestate_submenu_oldadmin_render');
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page1', 'Mot de passe oublié', 'manage_options', 'realestate_submenu_forget_pwd', 'realestate_submenu_forget_pwd_render');
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page2', 'Changer mot de passe', 'manage_options', 'realestate_submenu_change_pwd', 'realestate_submenu_Change_pwd_render');
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page3', 'Login', 'manage_options', 'realestate_submenu_login', 'realestate_submenu_login_render');
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page4', 'Deconnexion', 'manage_options', 'realestate_submenu_deconnexion_login', 'realestate_submenu_deconnexion_login_render');
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page5', 'Parametre Smtp', 'manage_options', 'realestate_submenu_parametre_smtp', 'realestate_submenu__parametre_smtp_render');
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page6', 'Parametre Site', 'manage_options', 'realestate_submenu_parametre_site', 'realestate_submenu__parametre_site_render');
    add_submenu_page('realestate_main_menu_', 'My SubMenu Page7', 'Créer maj Compte', 'manage_options', 'realestate_submenu_create_update_account', 'realestate_submenu_create_update_account_render');
 }

function realestate_admin_menu_render() {
     require_once(get_template_directory() . '/' . 'realestatepostadtemplate.php'); 
}

function realestate_submenu_oldadmin_render() {
     require_once('admin-realestate.php'); 
}

function realestate_submenu_forget_pwd_render() {
    require_once('admin-password-realestate.php'); 
}

function realestate_submenu_Change_pwd_render() {
    require_once('admin-change-pwd-realestate.php'); 
}

function realestate_submenu_login_render() {
    require_once('admin-login-realestate.php'); 
}

function realestate_submenu_deconnexion_login_render() {
    require_once('admin-logout-realestate.php');   
}

function realestate_submenu__parametre_smtp_render() {
    require_once('admin-parametre-smtp-realestate.php'); 
}
function realestate_submenu__parametre_site_render() {
    require_once('admin-parametre-site-realestate.php'); 
}
function realestate_submenu_create_update_account_render() {
    require_once('admin-account-realestate.php'); 
}


function detect_plugin_realestate_deactivation() {
    remove_submenu_page( 'realestate_main_menu_', 'realestate_submenu_forget_pwd' );
    remove_submenu_page( 'realestate_main_menu_', 'realestate_submenu_change_pwd' );
    remove_submenu_page( 'realestate_main_menu_', 'realestate_submenu_login' );
    remove_submenu_page( 'realestate_main_menu_', 'realestate_submenu_deconnexion_login' );
    remove_submenu_page( 'realestate_main_menu_', 'realestate_submenu_parametre_smtp' );
    remove_menu_page( 'realestate_main_menu_' );   
}
add_action( 'deactivated_plugin', 'detect_plugin_realestate_deactivation', 10, 2 );


add_filter('the_title','set_page_title', 10, 1);
function set_page_title($title){
    $page_title_realestate = $title;
    return $page_title_realestate;
}

add_action( 'after_setup_theme', 'child_after_setup_theme', 11 ); 
function child_after_setup_theme()
{
    remove_theme_support('title-tag');
}

class Realestate_Plugin
{
    public function __construct()
    {
    	 register_activation_hook( __FILE__, array( 'Realestate_Plugin', 'add_home_page' ) );
    }

    function add_home_page() {
        $plugin_dir = plugin_dir_path( __FILE__ ) . 'theme-realestate/';
        $theme_dir  = get_template_directory() . '/';
       
        if (! file_exists($theme_dir . 'realestatelistpropertiestemplate.php')){
            copy_directory_realestate_backup();
            }

        global $wp_filesystem;
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        $msg = '';

        $skip_list = array();
        $result = copy_dir($plugin_dir, $theme_dir, $skip_list);
               if (!$result == true ){
                  //  $msg = $result; 
                }else{
                  //  $msg = "copy ok $plugin_dir to $theme_dir...\n";
                }
              create_home_page_realestate_template();
              create_page_list_realestate_template();
              create_page_property_realestate_template();
              create_page_realestate_account_visitor_template();
              create_page_realestate_contactagence_template();
              create_page_realestate_agence_immo_template();
              create_page_realestate_list_agencies_template();
              create_page_realestate_cocon_template();
              create_page_realestate_index_cocon_template();
              create_page_realestate_plan_site_template();
              create_page_realestate_sitemap_all_template();
              create_page_realestate_post_ad_template();
              copy_directory_root_www();
    } 


}

new Realestate_Plugin();

function copy_directory_realestate_backup() {
  //  $date_backup = date('Y-m-d-H:i:s');
    $theme_dir  = get_template_directory() . '/';
    $theme_dir_backup = get_theme_root() . '/backup-realestate';

    if (file_exists($theme_dir_backup)){
          return;
        }

    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once (ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    $msg = '';
    mkdir( $theme_dir_backup);

    $skip_list = array();
    $result = copy_dir($theme_dir, $theme_dir_backup, $skip_list);
           if (!$result == true ){
            //    $msg = $result; 
            }else{
              //  $msg = "copy ok $plugin_dir to $theme_dir...\n";
            }
    }

    function copy_directory_root_www() {

      $themeRoot_dir = plugin_dir_path( __FILE__ ) . 'theme-realestate/realestate-template-parts/root/'; 
      $pathWP = get_home_path();

    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once (ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    $msg = '';
    mkdir( $theme_dir_backup);

    $skip_list = array();
    $result = copy_dir($themeRoot_dir, $pathWP, $skip_list);
           if (!$result == true ){
             //   $msg = $result; 
            }else{
                $msg = "copy ok $themeRoot_dir to $pathWP...\n";
            }
    }

    add_action('init', 'add_realestate_list_rewrite');
    function add_realestate_list_rewrite() {
      global $wp_rewrite;
      add_rewrite_tag('%type_property%','([^&]+)');
      add_rewrite_tag('%room%','([^&]+)');
      add_rewrite_tag('%dept%','([^&]+)');
      add_rewrite_tag('%zipcity%','([^&]+)');
      add_rewrite_tag('%pricestart%','([^&]+)');
      add_rewrite_tag('%priceend%','([^&]+)');
      add_rewrite_tag('%pageselected%','([^&]+)');

    //  $wp_rewrite->add_rule('achat/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)','index.php?pagename=listproperties&type_property=$matches[1]&room=$matches[2]&dept=$matches[3]&zipcity=$matches[4]&pricestart=$matches[5]&priceend=$matches[6]&pageselected=$matches[7]','top');

      $wp_rewrite->add_rule('achat/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)','index.php?pagename=listproperties&type_property=$matches[1]&room=$matches[2]&dept=$matches[3]&zipcity=$matches[4]&pricestart=$matches[5]&priceend=$matches[6]&pageselected=$matches[7]','top');

      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_list_short_rewrite');
    function add_realestate_list_short_rewrite() {
      global $wp_rewrite;
      add_rewrite_tag('%type_property%','([^&]+)');
   //   add_rewrite_tag('%room%','([^&]+)');
   //   add_rewrite_tag('%dept%','([^&]+)');
      add_rewrite_tag('%zipcity%','([^&]+)');
  //    add_rewrite_tag('%pricestart%','([^&]+)');
  //    add_rewrite_tag('%priceend%','([^&]+)');
  //    add_rewrite_tag('%pageselected%','([^&]+)');

      $wp_rewrite->add_rule('achat/([^/]+)/([^/]+)','index.php?pagename=listproperties&type_property=$matches[1]&zipcity=$matches[2]','top');

      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_property_rewrite');
    function add_realestate_property_rewrite() {
      global $wp_rewrite;
      add_rewrite_tag('%type_property%','([^&]+)');
      add_rewrite_tag('%zipcity%','([^&]+)');
        add_rewrite_tag('%idproperty%','([^&]+)');
        
      $wp_rewrite->add_rule('vente/([^/]+)/([^/]+)/([^/]+)','index.php?pagename=property&type_property=$matches[1]&zipcity=$matches[2]&idproperty=$matches[3]','top');

      $wp_rewrite->flush_rules();
    }


    add_action('init', 'add_realestate_account_visitor_rewrite');
    function add_realestate_account_visitor_rewrite() {
      global $wp_rewrite;
        
      $wp_rewrite->add_rule('comptevisitor','index.php?pagename=accountvisitor','top');

      $wp_rewrite->flush_rules();
    }

  /* add_action('init', 'add_realestate_contact_agence_rewrite');
    function add_realestate_contact_agence_rewrite() {
      global $wp_rewrite;
      add_rewrite_tag('%idc%','([^&]+)');
      $wp_rewrite->add_rule('contactagence/([^/]+)','index.php?pagename=contactagence&idc=$matches[1]','top');

      $wp_rewrite->flush_rules();
    }*/
     add_action('init', 'add_realestate_contact_agence_rewrite');
    function add_realestate_contact_agence_rewrite() {
      global $wp_rewrite;
      add_rewrite_tag('%agencycitycp%','([^&]+)');
      add_rewrite_tag('%idc%','([^&]+)');
      $wp_rewrite->add_rule('agence/([^/]+)/([^/]+)','index.php?pagename=contactagence&agencycitycp=$matches[1]&idc=$matches[2]','top');

      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_agence_immo_rewrite');
    function add_realestate_agence_immo_rewrite() {
      global $wp_rewrite;
        
      $wp_rewrite->add_rule('agenceimmo','index.php?pagename=agenceimmo','top');

      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_list_agencies_immo_rewrite');
    function add_realestate_list_agencies_immo_rewrite() {
      global $wp_rewrite;
      add_rewrite_tag('%dept%','([^&]+)');
      add_rewrite_tag('%pageselected%','([^&]+)');      
      $wp_rewrite->add_rule('listeagenceimmo/([^/]+)/([^/]+)','index.php?pagename=listeagenceimmo&dept=$matches[1]&pageselected=$matches[2]','top');
      $wp_rewrite->add_rule('listeagenceimmo/([^/]+)','index.php?pagename=listeagenceimmo&pageselected=$matches[1]','top');
      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_cocon_rewrite');
    function add_realestate_cocon_rewrite() {
      global $wp_rewrite;
        
      add_rewrite_tag('%urlpagecocon%','([^&]+)');
      $wp_rewrite->add_rule('immo/([^/]+)','index.php?pagename=cocon&urlpagecocon=$matches[1]','top');

      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_index_cocon_rewrite');
    function add_realestate_index_cocon_rewrite() {
      global $wp_rewrite;
      add_rewrite_tag('%level%','([^&]+)');
      add_rewrite_tag('%zip%','([^&]+)');  
      $wp_rewrite->add_rule('pageindex/([^/]+)/([^/]+)','index.php?pagename=indexcocon&level=$matches[1]&zip=$matches[2]','top');

      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_plan_site_rewrite');
    function add_realestate_plan_site_rewrite() {
      global $wp_rewrite;      
      add_rewrite_tag('%zipplan%','([^&]+)');  
      add_rewrite_tag('%typepropertyplan%','([^&]+)');
      
      $wp_rewrite->add_rule('plansite/([^/]+)/([^/]+)','index.php?pagename=plansite&zipplan=$matches[1]&typepropertyplan=$matches[2]','top');
      $wp_rewrite->add_rule('plansite/([^/]+)','index.php?pagename=plansite&zipplan=$matches[1]','top');
      
      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_sitemap_all_rewrite');
    function add_realestate_sitemap_all_rewrite() {
      global $wp_rewrite; 
      $wp_rewrite->add_rule('sitemapall','index.php?pagename=sitemapall','top');

      $wp_rewrite->flush_rules();
    }

    add_action('init', 'add_realestate_post_ad_rewrite');
    function add_realestate_post_ad_rewrite() {
      global $wp_rewrite; 
      $wp_rewrite->add_rule('deposeruneannonceimmobiliere','index.php?pagename=postad','top');
      $wp_rewrite->add_rule('deposeruneannonceimmobilierewp','index.php?pagename=postad','top');
      $wp_rewrite->add_rule('deposeruneannonceimmobilierefb','index.php?pagename=postad','top');
      $wp_rewrite->flush_rules();
    }




    add_action('admin_init', 'update_permalink_structure_realestate', 300 );
    function update_permalink_structure_realestate() {
          global $wp_rewrite;
          $wp_rewrite->set_permalink_structure('/%postname%/');
          $wp_rewrite->flush_rules();
    }

    register_activation_hook( __FILE__, 'plugin_realestate_activate' );
    function plugin_realestate_activate() {
        flush_rewrite_rules();
    } 

    register_deactivation_hook( __FILE__, 'plugin_realestate_deactivate' );
    function plugin_realestate_deactivate() {
        flush_rewrite_rules();
    }
    
    function themeslug_filter_front_page_templatee_realestate( $template ) {
        return is_front_page() ? '' : $template;
    }
    add_filter( 'frontpage_template', 'themeslug_filter_front_page_templatee_realestate' );



    // Set config mailer

     require_once( ABSPATH . WPINC . '/class-phpmailer.php' );
   //  $phpmailer = new PHPMailer();
     add_action( 'phpmailer_init', 'phpmailer_init_smtp' );
   //  add_action( 'phpmailer_init', array( &$this, 'phpmailer_init_smtp' ) , 10 );

  function phpmailer_init_smtp( PHPMailer $phpmailer ) {

    global $wpdb;
  $result = $wpdb->get_row(" SELECT smtp_user_realestate, smtp_pass_realestate, smtp_host_realestate, smtp_port_realestate, smtp_secure_realestate, smtp_authentification_realestate, smtp_from_realestate, smtp_name_realestate, smtp_reply_realestate, smtp_autotls_realestate  FROM " . $wpdb->prefix . 'realestate_smtp' . " WHERE id = 1");

    $SMTP_USER = $result->smtp_user_realestate;
    
    $SMTP_HOST = $result->smtp_host_realestate;
    $SMTP_PORT = $result->smtp_port_realestate;
    if ($SMTP_PORT == '') $SMTP_PORT = '465';
    $SMTP_SECURE = $result->smtp_secure_realestate;
    $SMTP_AUTH = $result->smtp_authentification_realestate;
    $FROM_SMTP = $result->smtp_from_realestate;
    $FROM_NAME_SMTP = $result->smtp_name_realestate;
    $SMTP_REPLY = $result->smtp_reply_realestate;
    $SMTPAUTOTLS = $result->smtp_autotls_realestate;
    $SMTP_PASS = $result->smtp_pass_realestate;
    

    // Set the mailer type as per config above, this overrides the already called isMail method 
    
   // $SMTP_NAME = $namesmtp; 
   // $SMTP_REPLY = $replysmtp;
   // $SMTP_SECURE = 'ssl'; //$securesmtp; //'ssl';
  //  $SMTP_HOST = $hostsmtp; 
  //  $SMTP_PORT = 465; //$portsmtp; //465;
  //  $SMTP_AUTH = true; // $authsmtp; //true;
  //  $SMTP_USER = 'ppatrick500@gmail.com'; //$usernamesmtp; 
  //  $SMTP_PASS = 'Julien74'; //$passwordsmtp; 
 //   $SMTPAUTOTLS = $autotlssmtp; //false;
/*
    $phpmailer->isSMTP();

    $from_email = $SMTP_USER; 
    $from_name = $SMTP_NAME;
    $phpmailer->From = $from_email;
    $phpmailer->FromName = $from_name;

    //set Reply-To option if needed
      $phpmailer->addReplyTo( $SMTP_REPLY, $phpmailer->FromName );

    $phpmailer->SetFrom( $phpmailer->From, $phpmailer->FromName );
    $phpmailer->addCustomHeader('X-SMTP-BY', "WordPress Real estate SMTP");

    // Set the SMTPSecure value 
      $phpmailer->SMTPSecure = $SMTP_SECURE;

    // Set the other options 
    $phpmailer->Host        = $SMTP_HOST;
    $phpmailer->Port        = $SMTP_PORT;
    $phpmailer->SMTPOptions = array(
       'ssl' => array(
         'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true 
      ) 
    );

      $phpmailer->SMTPAuth = $SMTP_AUTH;
      $phpmailer->Username = $SMTP_USER;
      $phpmailer->Password = $SMTP_PASS;
    
      */


    //PHPMailer 5.2.10 introduced this option. However, this might cause issues if the server is advertising TLS with an invalid certificate.
    $phpmailer->SMTPAutoTLS = false;


     // Define that we are sending with SMTP
    $phpmailer->isSMTP();

    // The hostname of the mail server
    $phpmailer->Host = $SMTP_HOST; // "smtp.gmail.com";

    // Use SMTP authentication (true|false)
    $phpmailer->SMTPAuth = $SMTP_AUTH; //true;

    // SMTP port number - likely to be 25, 465 or 587
    $phpmailer->Port = $SMTP_PORT; //"465";

    // Username to use for SMTP authentication
    $phpmailer->Username = $SMTP_USER; //"ppatrick500@gmail.com";

    // Password to use for SMTP authentication
    $phpmailer->Password = $SMTP_PASS; //"JulienFalconnet";

    // Encryption system to use - ssl or tls
    $phpmailer->SMTPSecure = $SMTP_SECURE; //"ssl";

    $phpmailer->From = $FROM_SMTP; //"ppatrick500@gmail.com";
    $phpmailer->FromName = $FROM_NAME_SMTP; //"Patrick Realestate";

  }
    // Script Ajax
   
    function add_js_scripts() {
      wp_enqueue_script( 'scriptadmindb', plugins_url( 'scriptadmindb.js', __FILE__ ) );  
  //    wp_enqueue_script( 'scriptadmindb', plugins_url( '/scriptadmindb.js', __FILE__ ), array('jquery') );
    // pass Ajax Url to script.js
      wp_localize_script('scriptadmindb', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
    }
      
      add_action('admin_enqueue_scripts', 'add_js_scripts');
      add_action( 'wp_ajax_update_pwd_wp', 'update_pwd_wp' );
      add_action( 'wp_ajax_logout_wp_db', 'update_pwd_wp' );
      add_action( 'wp_ajax_login_wp_db', 'update_pwd_wp' );
      add_action( 'wp_ajax_update_pwd_wp_db', 'update_pwd_wp' );
      add_action( 'wp_ajax_update_smtp_wp_db', 'update_smtp_wp_db' );
      add_action( 'wp_ajax_send_message', 'send_message' );

    //  add_action( 'wp_ajax_nopriv_update_pwd_wp', 'update_pwd_wp' );
    

    function update_pwd_wp() {
      global $wpdb;
      $email = sanitize_email($_POST['e']);
      $pwd = $_POST['p'];
      if ( $pwd != ''){
         $pwdSanitize = sanitize_text_field($_POST['e']);
      }

      if  ( $email == ''){
        echo json_encode('{"exitvalue":9}');
      }else{         
        $codeReturn = $wpdb->update( $wpdb->prefix.'realestate', array('email_realestate' => $email, 'pwd_realestate' => $pwd), array('id' => '1'));
        $arr_response = array('exitvalue' => $codeReturn);
        echo json_encode($arr_response);
      }
      die();
    }
    
    function update_smtp_wp_db() {
      global $wpdb;
      
      $usernamesmtp = sanitize_email($_POST['usernamesmtp']);
      if (empty($usernamesmtp)) {$usernamesmtp = "";}

      $passwordsmtp = sanitize_text_field($_POST['passwordsmtp']);  
      if (empty($passwordsmtp)) {$passwordsmtp = "";}
    
      $hostsmtp = sanitize_text_field($_POST['hostsmtp']);
      if (empty($hostsmtp)) {$hostsmtp = "";}

      $portsmtp = sanitize_text_field($_POST['portsmtp']);
      $portsmtp = intval($portsmtp); 
      if(!is_int($portsmtp)){$portsmtp = "0";}


      $securesmtp = sanitize_text_field($_POST['securesmtp']);
      if (empty($securesmtp)) {$securesmtp = "none";}

      $authsmtp = sanitize_text_field($_POST['authsmtp']);
      if (empty($authsmtp)) {$authsmtp = "true";}

      $autotlssmtp = sanitize_text_field($_POST['autotlssmtp']);
      if (empty($autotlssmtp)) {$autotlssmtp = "false";}

      $fromsmtp = sanitize_email($_POST['fromsmtp']);
      if (empty($fromsmtp)) {$fromsmtp = "";}

      $namesmtp = sanitize_text_field($_POST['namesmtp']);
      if (empty($namesmtp)) {$namesmtp = "";}

      $replysmtp = sanitize_email($_POST['replysmtp']);
      if (empty($replysmtp)) {$replysmtp = "";}

      $debugsmtp = sanitize_text_field($_POST['debugsmtp']);
      $debugsmtp = intval($debugsmtp); 
      if(!is_int($debugsmtp)){$debugsmtp = "0";}

      if  ( $hostsmtp == ''){
        echo json_encode('{"exitvalue":9}');
      }else{         

        $codeReturn = $wpdb->update( $wpdb->prefix.'realestate_smtp', array('smtp_user_realestate' => $usernamesmtp, 'smtp_pass_realestate' => $passwordsmtp, 'smtp_host_realestate' => $hostsmtp, 'smtp_port_realestate' => $portsmtp, 'smtp_secure_realestate' => $securesmtp, 'smtp_authentification_realestate' => $authsmtp, 'smtp_debug_realestate' => $debugsmtp, 'smtp_autotls_realestate' => $autotlssmtp, 'smtp_from_realestate' => $fromsmtp, 'smtp_name_realestate' => $namesmtp, 'smtp_reply_realestate' => $replysmtp ), array('id' => '1'));
        $arr_response = array('exitvalue' => $codeReturn);
        echo json_encode($arr_response);
      }
      die();
    }

    function send_message() {
      $errors = '';
     // require_once( ABSPATH . WPINC . '/class-phpmailer.php' );
      $mail = new PHPMailer();

      $charset       = get_bloginfo( 'charset' );
      $mail->CharSet = $charset;

      $from_name    = 'Real estate test smtp';
      $from_email   = 'support@immo-mail-fr-a.ovh'; 

      $mail->IsSMTP();
    
      $mail->SMTPAuth = true;
      $mail->Username = 'support@immo-mail-fr-a.ovh'; 
      $mail->Password = 'Julien1200'; 

      $mail->SMTPSecure = 'ssl';

      $mail->SMTPAutoTLS = false;

      // Set the other options 
      $mail->Host = 'smtp.immo-mail-fr-a.ovh';
      $mail->Port = 465; 

      $mail->addReplyTo( 'ppatrick500@yahoo.fr', $from_name );    

      $mail->SetFrom( $from_email, $from_name );
      $mail->isHTML( true );

      $to = sanitize_email($_POST['to']);
      if (empty($to)) {$to = "";}

      $subject = sanitize_text_field($_POST['subject']);  
      if (empty($subject)) {$subject = "";}

      $message = sanitize_text_field($_POST['message']);  
      if (empty($message)) {$message = "";}

      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->AddAddress( $to );
      $mail->SMTPDebug   = 0;
      $mail->SMTPOptions = array(
         'ssl' => array(
           'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true 
        ) 
      );
      $mail->addCustomHeader('X-SMTP-BY', "WordPress real estate");
      
      // Send mail and return result 
      $codeReturn = 9; 
      if ( !$mail->Send() ){
        $errors = $mail->ErrorInfo;
        $codeReturn = 1;
      }else{
        $codeReturn = 0; 
      }
      
      $mail->ClearAddresses();
      $mail->ClearAllRecipients();
      
      $arr_response = array('exitvalue' => $codeReturn, 'error' => $errors);
      echo json_encode($arr_response);

      die();
  }

  

?>
