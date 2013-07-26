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

if($_POST["form_confirm"])
{
	$wpwp_confirm = new wp_form_template;
}

if(!empty($_POST["edit_form"]))
{
	$editdata = $_POST;
	foreach($editdata as $key => $val)
	{
		if($key !== "edit_form")
		{
			wp_delete_post($val);
		}
	}
}

if(!empty($wpwp_check->wp_meibo_midasi))
{
	$wpwp_res = array();
	$wpwp_post = new wp_meibo_adminpostdata($wpwp_check->wp_meibo_type,$wpwp_check->wp_meibo_midasi,$wpwp_check->wp_meibo_naiyou);
	$wpwp_set->wp_meibo_inst($current_user->ID,$wpwp_check->wp_meibo_title,$wpwp_post->html);

	$wp_rewrite = new WP_Rewrite();
	if(!empty($wpwp_set->inst_data))
	{
		$wpwpwp_db->wp_meibo_add($wpwp_check->wp_meibo_midasi,$wpwp_set->inst_data);
	} else {
		echo "エラーが発生しました。何らかの理由でHTMLが作れませんでした。";
	}
}



?>