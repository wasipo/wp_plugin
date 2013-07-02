<?php
/*
Plugin name: wp_MeiboMan
Plugin URI: http://mikaduki.info/
Description: meibo
Version: 0.0.1
Author: kouhei
Author URI: http://mikaduki.info/
License : GPL
*/

require_once("wp_meibo_loader.php");
$classLoader = new ClassLoader();
$classLoader->registerDir(dirname(__FILE__));
$showtext = new wp_meibo_setting;

?>