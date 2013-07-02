<?php

class wp_meibo_setting 
{

    function __construct() {
      add_action('admin_menu', array($this, 'add_pages'));
    }
    
    public function add_pages() 
    {
      add_menu_page(
        'フォーム設定','フォーム設定',  'level_8', __FILE__, 
        array($this,'meibo_setting_html'), '', 26
        );
    }

}