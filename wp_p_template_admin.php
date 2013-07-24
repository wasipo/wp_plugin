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

              jQuery("form#main").find('input[type=submit]').attr("disabled","disabled");

               jQuery("input[name=meibo_colum]").bind("keypress change", function()
               {
              

                 jQuery("#main div").remove();

                  var num = 0;
                  var num = jQuery("input[name=meibo_colum]").val();
                  
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

                  jQuery("#main input[type=checkbox]").change(function(e)
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
               jQuery(this).after('<div id="elenum'+num+'"><span id="elenum_t'+num+'">項目の属性を選んでください。</span><select id="sel'+num+'" name="type'+num+'"><option value="1">text</option><option value="2">radio</option><option value="3">checkbox</option><option value="4">select</option><option value="5">textarea</option></select><input id="colum_'+num+'" type="text" placeholder="何個？" size="3"></div>');
               var selectid = jQuery(this).next("div").children("select").attr("id");
               var colum = jQuery(this).next("div").children("input[type=text]").attr("id");
                jQuery("#sel"+num).change(function()
                { 
                    if(jQuery('#colum_'+num))
                    {
                      jQuery("#elenum_t"+num).text("項目数を入力してください。");
                      jQuery("form#main").find('input[type=submit]').removeAttr("disabled");
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
            <h2>フォーム新規作成</h2>
          <div class="wpform_wrapper">
            <form action="#" method="post" id="main">
                  <p>フォーム名</p><input placeholder="半角" type="text" name="meibo_title" size="40" />
                  <p>設問数を入力してください。</p><input placeholder="半角" type="text" name="meibo_colum" size="3" />
                  <input id="sub" type="submit" class="button-primary" value="送信" />
            </form>
          </div>
        


<div id="edit_wrapper">
  <a href="wp_meibo_setting.php?form_confirm" class="add-new-h2">作成したフォームを表示</a>
<?php



//固定ページ取得のパラメータ

/*$args = array(
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
  'post_status'     => 'publish' );*/

/*$posts_array = get_posts( $args );*/


//var_dump($posts_array);

//フォームのある記事だけスラッグを元にオブジェクトを引っ張ってくる

//展開

/*if(!empty($wp_mail_confirm))
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
}*/
?>
</div>

<script>
  
//  jQuery("#edit_wrapper").hide();
  jQuery(".wp_post_content").find("input[type=submit]").unwrap();
  jQuery(".wp_post_content").find("input[type=hidden]").remove();
  jQuery(".wp_post_content").find("input[type=submit]").attr("disabled","disabled");
  jQuery(".wp_post_content").find("input").attr("disabled","disabled");
  jQuery(".wp_post_content").find("select").attr("disabled","disabled");
  jQuery("#edit_wrapper").wrap('<form id="wpp_edit_form" action="#" method="post" />');
  
  var roop = jQuery("div").filter(function()
             {
                return this.id.match(/[cat]_\d$/);
             });

  var idget = [];

  if(roop.length !== 0)
  {
      jQuery("#edit_wrapper").before('<div class="title_wrapwp"><h2>出力済みフォーム</h2></div>');
      jQuery("#edit_wrapper").append('<input type="submit" class="button-primary" value="チェックをしたフォームを削除する" name="edit_form" />');
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

</script>
       <!-- /.wrap --></div>
        <div>