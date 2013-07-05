<?php

require_once("wp_meibo_loader.php");
$wpwp_classLoader = new WpwpwpClassLoader();
$wpwp_classLoader->registerDir(dirname(__FILE__));
$wpwp_set = new wp_meibo_setting;
$wpwp_check = new wp_meibo_check;
$wpwpwp_db = new wp_meibo_regit_database;
global $current_user;
get_currentuserinfo();
$user = $current_user->get("user_login");

//なんか、ユーザメタ取得できない。


if(!empty($wpwp_check->wp_meibo_midasi))
{
	
	$wpwp_set->wp_meibo_inst($user);


	$wpwpwp_db->wp_meibo_add($wpwp_check->wp_meibo_midasi);
}


?>