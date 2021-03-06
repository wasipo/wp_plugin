<?php

class wp_meibo_adminpostdata
{

    public $type = array();
    public $title = array();
    public $columtype = array();
    private $pattern;
    public $html;

	public function __construct($type,$title,$columtype)
	{
		$this->splitter($columtype);
		$this->merge_cont($type,$title,$this->columtype);
    }

    private function splitter($columtype)
    {

		$count = "0";
		$flg = array();
        if(is_array($columtype))
        {
    		foreach($columtype as $key => $val)
    		{
    			$this->pattern = substr($key,0,5);
    			$ins = "sel"."0".$count;
    			if($this->pattern == $ins)
    			{
    				$this->columtype["columnum".$this->pattern][$key] = $val;
    			} else {
    				$this->columtype["columnum".$this->pattern][$key] = $val;
    				$count++;
    			}
    		}
        } else {
            return false;
        }

    }

    private function merge_cont($type,$title,$columtype)
    {
        $count = 0;
    	for($i = 0; $i < count($type); $i++)
    	{
    		if($i == 0){ $this->html .= '<div id="wwp_form_wrap"><form id="wwp_form" method="post" action="'.plugin_dir_url(__FILE__).'wp_meibo_post.php">';	}
			$a = "0".$i;
            $titlec = substr($a,1);
            if(is_array($columtype["columnumsel".$a]))
    		{
    			foreach($columtype["columnumsel".$a] as $key => $val)
    			{
    			
    				if($type["type".$a] == "1")
    				{
    					$type["type".$a] = "text";
    				} else if($type["type".$a] == "2") {
    					$type["type".$a] = "radio";
    					$name = "radio".$i;
    				} else if($type["type".$a] == "3") {
    					$type["type".$a] = "checkbox";
    					$name = "check".$i."[]";
    				} else if($type["type".$a] == "4") {
                        $type["type".$a] = "select";
                        $name = "select".$i;                        
                    }

    				if($type["type".$a] == "text")
    				{
                        if($count == 0){ $this->html .= '<div id="post_box'.$i.'"><input type="hidden" name="'.$key.$count.'" value="'.$val.'" /><h2>'.$title["title".$titlec].'</h2>'; }
    					$this->html .= '<p class="wp_label">'.$val.'</p>'.'<input type="'.$type["type".$a].'" id="'.$key.'" name="'.$key.'" />';
                        $count++;
                        if($count == count($columtype["columnumsel".$a])){$this->html .= "</div>"; $count = 0;}
    				} else if($type["type".$a] == "select") {
                        if($count == 0){ $this->html .= '<div id="post_box'.$i.'"><input type="hidden" name="'.$key.$count.'" value="'.$val.'" /><h2>'.$title["title".$titlec].'</h2><select type="'.$type["type".$a].'" id="'.$key.'" name="select'.$i.'"><option value="nonenone">選択してください。</option>'; }
                        $this->html .= '<option value="'.$val.'">'.$val.'</option>';
                        $count++;
                        if($count == count($columtype["columnumsel".$a])){$this->html .= "</select></div>"; $count = 0;}
                    } else {
                        if($count == 0){ $this->html .= '<div id="post_box'.$i.'"><input type="hidden" name="'.$key.$count.'" value="'.$val.'" /><h2>'.$title["title".$titlec].'</h2>'; }
    					$this->html .= ''.$val.''.'<input type="'.$type["type".$a].'" id="'.$key.'" name="'.$name.'" value="'.$val.'" />';
                        $count++;
                        if($count == count($columtype["columnumsel".$a])){ $this->html .= "</div>"; $count = 0;}
    				}

    			}
    		}
    	}
    	$this->html .= '<input type="submit" value="送信"></form></div>';
    }



}
