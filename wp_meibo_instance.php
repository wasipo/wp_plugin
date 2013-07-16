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
	$wpwp_res = array();
	$wpwp_post = new wp_meibo_adminpostdata($wpwp_check->wp_meibo_type,$wpwp_check->wp_meibo_midasi,$wpwp_check->wp_meibo_naiyou);

	$wp_rewrite = new WP_Rewrite();
	$wpwpwp_db->wp_meibo_add($wpwp_check->wp_meibo_midasi,$wpwp_set->inst_data);
}


?>