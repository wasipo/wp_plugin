<?php

require_once("wp_meibo_loader.php");
$wpwp_classLoader = new WpwpwpClassLoader();
$wpwp_classLoader->registerDir(dirname(__FILE__));
$wpwp_set = new wp_meibo_setting;
$wpwp_check = new wp_meibo_check;
$wpwpwp_db = new wp_meibo_regit_database;

require_once ABSPATH . WPINC . '/pluggable.php';
global $current_user;
get_currentuserinfo();

if(!empty($wpwp_check->wp_meibo_midasi))
{
	$wpwp_set->wp_meibo_inst($current_user->user_login);
	$wpwp_set->wp_meibo_inst_html($wpwp_check->wp_meibo_midasi,$current_user->user_login);
	$wp_rewrite = new WP_Rewrite();
	$wpwpwp_db->wp_meibo_add($wpwp_check->wp_meibo_midasi,$wpwp_set->inst_data);
}


?>