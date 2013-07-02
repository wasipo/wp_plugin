<?php

class wp_meibo_setting 
{

    function __construct() {
      add_action('admin_menu', array($this, 'add_pages'));
    }
    
    public function add_pages() 
    {
      add_menu_page(
        'テキスト設定','テキスト設定',  'level_8', __FILE__, 
        array($this,'show_text_option_page'), '', 26
        );
    }

    public function show_text_option_page() 
    {
        



    }

}