<?php

require_once("wp_meibo_loader.php");
$classLoader = new ClassLoader();
$classLoader->registerDir(dirname(__FILE__));
$set = new wp_meibo_setting;
$check = new wp_meibo_check;
var_dump($check->wp_meibo_midasi);
var_dump($check->wp_meibo_naiyou);

?>