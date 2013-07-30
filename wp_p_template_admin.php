         <script>

         //入力側

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
                      jQuery("#main").append('<div id="name'+i+'"><span id="natext'+i+'">チェック！</span><input id="check'+i+'" type="checkbox" /></div>');
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


//出力側
         jQuery(function()
         {

            jQuery('input[name=meibo_title]').bind("keypress change blur",function()
            {
              var title = jQuery('input[name=meibo_title]').val();
              jQuery("#wp_view").find("#wp_form_title").remove();
              jQuery("#wp_view").append('<div id="wp_form_title">'+title+'</div>');
            });

            var conum = jQuery("input[name=meibo_colum]");

            var checkfg = 0;
            conum.bind("keypress change blur",function(event)
            {
              //wp_form_titleのエラー出す
              
                  jQuery("#wp_view").children().filter(function(){return this.id.match(/colums/);}).remove();
                  var colum = jQuery(this).val();
                  for(var i = 0; i < colum; i++)
                  {
                    if(i == 0)
                    {
                      jQuery("#wp_form_title").after('<div id="view_colums'+i+'"></div>');
                    } else {
                      var j = i-1;
                      jQuery('#view_colums'+j).after('<div id="view_colums'+i+'"></div>');
                    }
                  }

            });


          });




        var addelement = {};

        addelement.view_title = function(ele)
        {

          var number = ele.getAttribute("id").substr(-1);
          var contents = ele.value;
          console.log(contents);

          jQuery("#view_colums"+number).text(contents);

        }


        addelement.radio = function(num,id)
        {
           jQuery("#title_box"+num).bind("keypress change",function(e)
           {

            
              var v_cont = e.target;

              addelement.view_title(v_cont);


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
          <div id="wp_view">
           

          </div>
       <!-- /.wrap --></div>