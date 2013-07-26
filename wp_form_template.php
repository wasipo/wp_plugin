<?php

class wp_form_template
{

    private $resouce_obj;
    public $wp_mail_confirm;

    function __construct() {
      $this->resouce_obj = get_posts( 
                    array(
                          'numberposts'     => 5,
                          'offset'          => 0,
                          'category'        => "",
                          'orderby'         => 'post_date',
                          'order'           => 'DESC',
                          'include'         => "",
                          'exclude'         => "",
                          'meta_key'        => "",
                          'meta_value'      => "",
                          'post_type'       => 'page',
                          'post_mime_type'  => "",
                          'post_parent'     => "",
                          'post_status'     => 'publish' 
                        )
        );
       
     //   add_action('admin_menu', array($this,'wp_meibo_add_pages_confirm'));
     //   $this->Open_resource($this->resouce_obj);
    }
    
    public function wp_meibo_add_pages_confirm() 
    {
      //add_menu_page( __( 'Trust Form', TRUST_FORM_DOMAIN ), __( 'Trust Form', TRUST_FORM_DOMAIN ), 'edit_posts', $this->edit_page, array( &$this,'add_admin_edit_page' ), TRUST_FORM_PLUGIN_URL . '/images/menu-icon.png' );
      //
      //add_submenu_page('親メニューのファイル名', 'HTML のページタイトル', 'メニュータイトル', '必要なユーザーレベル', 'コンテンツ表示 PHP ファイル', 'コンテンツ表示関数');
    }

    public function wp_meibo_confirm()
    {
      echo "abuo";
    }





}