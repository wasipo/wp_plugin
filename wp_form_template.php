<?php

class wp_form_temlate
{

    private $resouce_obj;
    public $wp_mail_confirm;

    public function __construct()
    {
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
                        );
                );
        Open_resource($this->resouce_obj);
    }


    public function Open_resource($posts_array)
    {

        $j = 0;
        for($i = 0; $i < count($posts_array); $i++)
        {

          $wp_mb_pattern = '/wwp_form_mail|wwp_form_mail-\d$/';
          if(preg_match($wp_mb_pattern,$posts_array[$i]->post_name))
          {
            $this->wp_mail_confirm[$j] = $posts_array[$i];
            $j++;
          }

        }

    }





}