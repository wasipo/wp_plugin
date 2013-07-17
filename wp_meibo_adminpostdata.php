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

    }

    private function merge_cont($type,$title,$columtype)
    {
    	for($i = 0; $i < count($type); $i++)
    	{
    		if($i == 0){ $this->html .= '<div id="wwp_form_wrap"><form id="wwp_form" method="post" action="'.plugin_dir_url(__FILE__).'wp_meibo_post.php">';	}
			$a = "0".$i;
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
    				} else if($type["type".$a] == "3"){
    					$type["type".$a] = "checkbox";
    					$name = "check".$i."[]";
    				}
    				if($type["type".$a] == "text")
    				{
    					$this->html .= '<input type="'.$type["type".$a].'" id="'.$key.'" name="'.$key.'" />';
    				} else {
    					$this->html .= '<input type="'.$type["type".$a].'" id="'.$key.'" name="'.$name.'" />';
    				}

    			}	
    		}
    	}
    	$this->html .= '<input type="submit" value="送信"></form></div>';
    }



}
