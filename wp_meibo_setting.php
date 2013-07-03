<?php

class wp_meibo_setting 
{

    function __construct() {
      add_action('admin_menu', array($this, 'wp_meibo_add_pages'));
    }
    
    public function wp_meibo_add_pages() 
    {
      add_menu_page(
        'form設定','form設定',  'level_8', __FILE__, 
        array($this,'wp_meibo_add_html_pages'), '', 26
        );
    }

    public function wp_meibo_add_html_pages() 
    {
        echo <<<EOF


        <script>
            jQuery(function()
            {

            });
        </script>

        <form action="" method="post">
              <input type="radio" /><Br />
              <input type="radio" /><Br />
              <input type="radio" /><Br />
              <input type="radio" /><Br />
              <input type="submit" value="送信" />
        </form>


EOF;


    }

}

