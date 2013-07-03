<?php

class wp_meibo_setting 
{

    private $meibo_data;


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

/*    
      $this->meibo_data = $_POST;
      
      if($this->wp_meibo_postdata())
      {
        $_SESSION["meibo_post_data"] = $_POST;
        $this->meibo_data = $_SESSION["meibo_post_data"];
        $this->wp_meibo_postdata();
      }
*/

        echo <<<EOF


         <script>

         jQuery(function()
         {

               jQuery("input").eq(0).change(function()
               {

                  jQuery("input[type=checkbox]").remove();

                  var num = 0;
                  var num = jQuery("input").eq(0).val();
                  
                  for(var i = 0; i < num; i++)
                  {
                    jQuery("#main").after('<div id="name'+i+'"><input type="checkbox" ></div>');
                  }

                  jQuery("input[type=checkbox]").change(function(e)
                  {

                    if(jQuery(this).next("input").attr("type") !== "text")
                    {
                       var eleid = jQuery(this).parent("div").attr("id").substr(-1);
                       jQuery(this).after('<input type="text" name="" placeholder="アンケート項目" /><br /><p>詳細聞きたい？</p>いらない<input type="radio" value="1" name="shosai'+eleid+'" checked="checked">聞きたい<input name="shosai'+eleid+'" type="radio" value="2" />');
                    } else {
                       jQuery(this).next("input").remove();
                    }

                  });


              });


         });

        </script>

        <form action="#" method="post" id="main">
              <br />
              <br />
              <br />
              何個項目作る？<input type="text" name="meibo_colum" size="2" />
              <!--DBどうする？
              &nbsp;&nbsp;&nbsp;使わない<input type="radio" name="meibo_db_use" checked="checked" value="1" />
              使いたい<input type="radio" name="meibo_db_use" value="2" /> -->
              <input type="submit" value="送信" />
        </form>

EOF;
        



    }

    //このメソッドはセッションでもPOSTでも使う
    public function wp_meibo_postdata()
    {
        foreach($this->meibo_data as $val)
        {

            if(!empty($val))
            {
                return true;
            }

        }

    }



}

