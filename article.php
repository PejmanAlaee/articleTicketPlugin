<?php

/*
Plugin Name: article
Plugin URI: www.pejman.com/
Description: .
Author: pejman
Author URI: /
Text Domain: wordpress-auth
Domain Path: /languages/
Version: 5.6.1
*/

define('WF_aricle_DIR', plugin_dir_path(__FILE__));
define('WF_aricle_URL', plugin_dir_url(__FILE__));
define('WF_aricle_INC', WF_aricle_DIR . '/inc/');
define('WF_aricle_tpl', WF_aricle_DIR . '/tpl/');


include WF_aricle_INC . "articleShortCode.php";
include WF_aricle_INC . "articleAjax.php";
include WF_aricle_INC . "setArticleCssAndJs.php";
if (is_admin()) {

    include WF_aricle_INC . 'admin/menu.php';
}