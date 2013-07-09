<?php



class wp_meibo_setting 
{

    private $meibo_data;
    public $inst_data;
    public $type;
    public $perts_midasi;
    public $perts_type;
    public $perts_naiyou;
    public $html;


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

        echo <<<EOF

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
              


               jQuery("input").eq(0).change(function()
               {
              
                 jQuery("#main div").remove();
                 //jQuery("input[type=checkbox]").remove();


                  var num = 0;
                  var num = jQuery("input").eq(0).val();
                  
                  for(var i = 0; i < num; i++)
                  {
                    jQuery("#main").append('<div id="name'+i+'"><input type="checkbox" /></div>');
                  }

                  jQuery("input[type=checkbox]").change(function(e)
                  {

                    if(jQuery(this).attr("checked") !== "checked")
                    {
                      jQuery(this).parent().remove();
                    }

                    if(jQuery(this).next("input").attr("type") !== "text")
                    {
                       var d_id = jQuery(this).parent("div").attr("id");
                       var eleid = jQuery(this).parent("div").attr("id").substr(-1);
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
          console.log(num);
           jQuery("#title_box"+num).change(function()
           {

              //ラジオ→テキスト変更。（分かりやすいから）

               jQuery(this).after('<div id="elenum'+num+'"><select id="sel'+num+'" name="type'+num+'"><option value="1">text</option><option value="2">radio</option><option value="3">checkbox</option></select><input id="colum_'+num+'" type="text" placeholder="何個？" size="3"></div>');
               var selectid = jQuery(this).next("div").children("select").attr("id");
               var colum = jQuery(this).next("div").children("input[type=text]").attr("id");



              jQuery("#"+colum).change(selectid,function()
              {

                  var num = jQuery(this).val();
                 
                  for(var i = 0; i < num; i++)
                  {
                    jQuery(this).after('<input type="text" placeholder="項目名" name="'+selectid+'_col_'+i+'" />');
                  }

              });
              
                  jQuery('#'+id).children("p,span,input[type=radio]").remove();

           });
        }

        addelement.repeatradio = function(obj)
        {
          // jQuery("#'+obj+'").
        }

        </script>

        <form action="#" method="post" id="main">
              <br />
              <br />
              <br />
              何個項目作る？<input placeholder="半角" type="text" name="meibo_colum" size="3" />
              <input id="sub" type="submit" value="送信" />
        </form>

EOF;
        



    }


    //固定ページに渡すパラメータ
    public function wp_meibo_inst($user,$num,$html="")
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
                  'post_name' => 'wp_form_meibo'.$num,
             );
        } else {
             return false;
        }

    }


    public function wp_meibo_inst_html($data_midasi,$data_naiyou,$data_type)
    {


      $count = 0;
      foreach($data_type as $key => $val)
      {
        $count++;
          switch($val)
          {

            case 1 :
              $val = "text";
              break;
            case 2 :
              $val = "radio";
              break;
            case 3 : 
              $val = "checkbox";
              break;
            default :
              $val = "不正な値";

          }

          $type[$count] = $val;        
      }

      $this->wp_meibo_htmlcontent($type,$data_naiyou,$data_midasi);

    }


    //こっちは固定ページ自動投稿の関数へ渡すパラメータ

    public function wp_meibo_htmlcontent($type,$data_naiyou,$data_midasi)
    {

      //html入れた配列を生成
        $count = 0;
              foreach($data_midasi as $val)
              {
                  $this->perts_midasi[$count] = '<p>'.$val.'</p>';
                  $count++;
              }

        $a_count = 0;
              foreach($data_naiyou as $val)
              {
                if(is_array($val))
                {
                  $c_count = 0;
                  foreach($val as $v)
                  {
                    $this->perts_naiyou[$a_count][$c_count] = '<p>'.$v.'</p>';
                    $c_count++;
                  }
                } 
                $a_count++;
              }

        $b_count = 0;
              foreach($type as $val)
              {
                $this->perts_type[$b_count] = '<input type="'.$val.'" name="form_name'.$b_count.'[]" />';
                $b_count++;
              }


        $this->join_html($this->perts_midasi,$this->perts_naiyou,$this->perts_type);

    }


    //wp_meibo_htmlcontentをリソースにして結合するメソッド。

    public function join_html($midasi,$naiyou,$type)
    {

          for($i = 0; $i <= count($midasi); $i++)
          {
            if($i == 0)
            {
              $this->html .= '<div id="wwp_form_wrap"><form id="wwp_form" method="post" action="'.plugin_dir_url(__FILE__).'wp_meibo_post.php">';
            }
              $this->html .= $midasi[$i];
              if(is_array($naiyou[$i]))
              {
                for($j = 0; $j < count($naiyou); $j++)
                {
                  $this->html .= $naiyou[$i][$j];
                  $this->html .= $type[$i];
                }
              }
            if($i == count($midasi))
            {
              $this->html .= '<input type="submit" value="送信"></form></div>';
            } 
          }


    }


    //このメソッドはセッションでもPOSTでも使う そのうち消えるであろうメソッド
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

