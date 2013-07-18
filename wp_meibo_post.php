<?php
	require_once("wp_meibo_loader.php");
	$wpwp_classLoader = new WpwpwpClassLoader();
	$wpwp_classLoader->registerDir(dirname(__FILE__));
	
	$postdata = $_POST;
	$wpwp_postsp = new wp_meibo_regit_database();
	$wpwp_postsp->wp_meibo_sanit_chil($postdata);


