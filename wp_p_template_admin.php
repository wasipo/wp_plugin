         <script>

         jQuery(function()
         {


              jQuery("#main").keypress(function(ev) {
                if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
                  return false;
                } else {
                  return true;
                }
              });

              jQuery("form#main").submit(function()
              {

                // return false;

              });
              


               jQuery("input").eq(0).bind("keypress change", function()
               {
              
                 jQuery("#main div").remove();

                  var num = 0;
                  var num = jQuery("input").eq(0).val();
                  
                  //10以下の条件分岐。いつか外したいなぁ。

                  if(num <= 10)
                  {
                    jQuery("#f_error").remove();
                    for(var i = 0; i < num; i++)
                    {
                      jQuery("#main").append('<div id="name'+i+'"><span id="natext'+i+'">チェック！</span><input type="checkbox" /></div>');
                    }
                  } else {
                      jQuery("#main").after('<p id="f_error">10以下の半角数字を入力してください。</p>');
                  }

                  jQuery("input[type=checkbox]").change(function(e)
                  {

                    if(jQuery(this).attr("checked") !== "checked")
                    {
                      jQuery(this).parent().remove();
                    }

                    if(jQuery(this).next("input").attr("type") !== "text")
                    {
                      jQuery(this).parent().children("span").text("タイトルを決めてください。");
                       var d_id = jQuery(this).parent("div").attr("id");
                       var eleid = jQuery(this).parent("div").attr("id").substr(-2);
                       var reg = new RegExp(/e\d/);
                       var res = eleid.match(reg);
                       if(res)
                       {
                          var eleid = jQuery(this).parent("div").attr("id").substr(-1);
                       }

                       jQuery(this).after('<input id="title_box'+eleid+'" type="text" name="title'+eleid+'" placeholder="タイトル" /><br />');
                       addelement.radio(eleid,d_id);

                    } else {
                       jQuery(this).next("input").remove();
                    }

                  });

              });

         });


        var addelement = {};

        addelement.radio = function(num,id)
        {
           jQuery("#title_box"+num).bind("keypress change",function()
           {

              if(num <= 10 && num.length !== 2)
              {
                num = 0+num;
              }

              //増えまくるのをブロックid_ele中身が無ければ
              var id_ele = jQuery("#elenum"+num).attr("id");

              if(!id_ele)
              {
               jQuery(this).after('<div id="elenum'+num+'"><span id="elenum_t'+num+'">項目の属性を選んでください。</span><select id="sel'+num+'" name="type'+num+'"><option value="1">text</option><option value="2">radio</option><option value="3">checkbox</option><option value="4">select</option></select><input id="colum_'+num+'" type="text" placeholder="何個？" size="3"></div>');
               var selectid = jQuery(this).next("div").children("select").attr("id");
               var colum = jQuery(this).next("div").children("input[type=text]").attr("id");
                jQuery("#sel"+num).change(function()
                { 
                    if(jQuery('#colum_'+num))
                    {
                      jQuery("#elenum_t"+num).text("項目数を入力してください。"); 
                    }
                });
              }


              jQuery("#"+colum).change(selectid,function()
              {

                  jQuery(this).parent().children("span").text("項目名を決めてください。");
                  var num = jQuery(this).val();
                 
                  if(num <= 10)
                  {
                    jQuery("#f_error").remove();
                    for(var i = 0; i < num; i++)
                    {

                        jQuery(this).before('<input type="text" placeholder="項目名" name="'+selectid+'_col_0'+i+'" />');
                      
                    }
                    jQuery(this).remove();
                  } else {
                      jQuery(this).after('<p id="f_error">10以下の数字を入力してください。</p>');
                  }
              });
              
                  jQuery('#'+id).children("p,span,input[type=radio]").remove();

           });
        }

        addelement.repeatradio = function(obj)
        {
          // jQuery("#'+obj+'").
        }


        var checks = {};

        checks.check = function(foo)
        {
              return foo;
        }


        </script>
        <style>

        .wp_view_cat
        {
          margin-bottom: 40px;
        }
        #cat_0
        {
          margin-top: 200px;
        }
        #wwp_form
        {
          font-size: 100%;
        }


        </style>


        <form action="#" method="post" id="main">
              <br />
              <br />
              <br />
              設問数を入力してください。<input placeholder="半角" type="text" name="meibo_colum" size="3" />
              <input id="sub" type="submit" value="送信" />
        </form>


<?php
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
          echo '<input type="checkbox" name="ID'.$val.'" value="'.$val.'" />このフォームを削除';
          break;
          case "post_title":
          echo '<div style="margin-bottom:20px">'.$val.'</div>';          
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
<script>
jQuery(".wp_post_content").find("input[type=submit]").attr("disabled","disabled");
</script>

