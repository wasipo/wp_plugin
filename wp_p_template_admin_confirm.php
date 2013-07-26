<script>

  jQuery(function(){

  //  jQuery("#edit_wrapper").hide();
    jQuery(".wp_post_content").find("input[type=submit]").unwrap();
    jQuery(".wp_post_content").find("input[type=hidden]").remove();
    jQuery(".wp_post_content").find("input[type=submit]").attr("disabled","disabled");
    
    var roop = jQuery("div").filter(function()
               {
                  return this.id.match(/[cat]_\d$/);
               });

    var idget = [];

    if(roop.length !== 0)
    {
        jQuery("#edit_wrapper").wrap('<form id="wpp_edit_form" action="#" method="post" />');
        jQuery("#edit_wrapper").before('<div class="title_wrapwp"><h2>出力済みフォーム</h2></div>');
        jQuery("#edit_wrapper").append('<input type="submit" class="button-primary" value="チェックをしたフォームを削除する" name="edit_form" />');
    } else {
        jQuery("#edit_wrapper").append('<p>まだ投稿がありません！</p>');
    }

    roop.each(function(e)
    {
      idget[e] = jQuery(this).attr("id");
    });


    var checkele = [];

    jQuery("#wp_erase_submit").click(idget,function(e)
    {
            jQuery.each(idget,function(ev,v){

              if(jQuery("#"+idget[ev]).find("input[type=checkbox]").eq(0).attr("checked") == "checked")
              {
                  checkele[v] = jQuery("#"+idget[ev]).find("input[type=checkbox]").eq(0).val();
              }

            });
    });

  /*  
    jQuery("#show_logs").toggle(function(e)
    {
      jQuery(this).attr("value","隠す");
      jQuery("#edit_wrapper").show();
    },function(){
      jQuery(this).attr("value","表示する");
      jQuery("#edit_wrapper").hide();
    });
  */
});
</script>
        <style>
        .wp_view_cat
        {
          margin-bottom: 40px;
          margin-top: 40px;
          width: 500px;
        }
        .wp_view_cat input[type=radio]
        {
          margin-right: 10px;
          margin-left: 5px;
        }
        .wp_view_cat input[type=text]
        {
          width: 200px;
          margin-left: 10px;
          margin-right: 5px;
          margin-bottom: 10px;
        }
        #cat_0
        {
          
        }
        #wwp_form
        {
          font-size: 100%;
        }
        </style>
        <style>


        .wpform_wrapper
        {
          width: 600px;
        }

        #show_logs_button
        {
          margin-top: 30px;
        }

        .title_wrapwp
        {
          margin-top:50px;
        }

        .strike_title
        {
          font-size: 130%;
          font-weight: bold;
        }
        </style>
        <div class="wrap">
          <div id="icon-options-general" class="icon32"><br /></div>
            <h2>フォーム確認</h2>
            <div id="edit_wrapper">
<?php



//固定ページ取得のパラメータ

$args = array(
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
  'post_status'     => 'publish' );

$posts_array = get_posts( $args );


//var_dump($posts_array);

//フォームのある記事だけスラッグを元にオブジェクトを引っ張ってくる

 $j = 0;
        for($i = 0; $i < count($posts_array); $i++)
        {

          $wp_mb_pattern = '/wwp_form_mail|wwp_form_mail-\d$/';
          if(preg_match($wp_mb_pattern,$posts_array[$i]->post_name))
          {
            $wp_mail_confirm[$j] = $posts_array[$i];
            $j++;
          }

        }


//展開

if(!empty($wp_mail_confirm))
{
  foreach($wp_mail_confirm as $num => $obj)
  {
    echo '<div id="cat_'.$num.'" class="wp_view_cat">';
    foreach($obj as $key => $val)
    {
      switch($key)
      {
        //固定ページ取得中　増えるかも知れないので、すいっち。
          case "ID":
          echo '<span class="strike_title">'.$obj->post_title.'</span>を削除';
          echo '<input type="checkbox" name="ID'.$val.'" value="'.$val.'" />';
          break;
          case "post_content":
          echo '<div class="wp_post_content">'.$val.'</div>';
          break;
      }
    }
    echo '</div>';
  }
}
?>


       <!-- /.wrap --></div>
</div>