<?php



class wp_meibo_setting 
{

    public $inst_data;

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


    //管理画面のHTML
    public function wp_meibo_add_html_pages() 
    {

      include("wp_p_template_admin.php");

    }


    //固定ページに渡すパラメータ
    public function wp_meibo_inst($user,$html="")
    {
        if(!empty($html))
        {
            $this->inst_data = array(
                  'comment_status' => 'closed',
                  'ping_status' => 'closed',
                  'post_author' => $user,
                  'post_type' => 'page',
                  'post_title' => 'form',
                  'post_content' => $html,
                  'tags_input' => 'form',
               //   'post_name' => 'wp_form_meibo'.$num,
             );
        } else {
             return false;
        }
    }

}

