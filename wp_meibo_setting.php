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
        'フォーム設定','フォーム設定','8', __FILE__, 
        array(&$this,'wp_meibo_add_html_pages'), '', 26
        );
      add_submenu_page(__FILE__,'フォーム一覧', 'フォーム一覧','8','wp_p_template_admin.php',array(&$this,'wp_meibo_confirm'));
    }


    //管理画面のHTML
    public function wp_meibo_add_html_pages() 
    {

      include("wp_p_template_admin.php");

    }

    public function wp_meibo_confirm()
    {
     include("wp_p_template_admin_confirm.php");
    }


    //固定ページに渡すパラメータ
    public function wp_meibo_inst($user,$title,$html="")
    {
        if(!empty($html))
        {
            $this->inst_data = array(
                  'comment_status' => 'closed',
                  'ping_status' => 'closed',
                  'post_author' => $user,
                  'post_type' => 'page',
                  'post_title' => $title["meibo_title"],
                  'post_content' => $html,
                  'tags_input' => 'form',
                  'post_name' => 'wwp_form_mail',
                  'post_status' => 'publish',

             );
        } else {
             return false;
        }
    }

}

