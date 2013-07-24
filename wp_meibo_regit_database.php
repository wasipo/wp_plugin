<?php

class wp_meibo_regit_database
{

    private $db_serch;
    private $sanitdata;

    public $patterntext;
    public $patternradio;
    public $patterncheckbox;
    public $patternmidasi;
    public $patternselect;

    public $text;
    public $checkbox;
    public $radio;
    public $select;
    public $midasi;
    public $form_title;

    function wp_meibo_add($midasi = "",$data) 
    {
  
      	wp_insert_post($data);
 
    }

	public function wp_meibo_sanit_chil($postdata) 
    {

    	foreach($postdata as $key => $val)
    	{

    		
    		if(!is_array($val))
    		{
    			htmlspecialchars($val,ENT_QUOTES);
    		}

			$this->patterntext = '/sel\d{2}_col_\d{2}$/';
			if(preg_match($this->patterntext,$key))
			{	
				$this->text[$key] = $val;
			}

			$this->patterncheckbox = '/check\d/';
			if(preg_match($this->patterncheckbox,$key))
			{	
				$this->checkbox[$key] = $val;
			}			

			$this->patternradio = '/radio\d/';
			if(preg_match($this->patternradio,$key))
			{	
				$this->radio[$key] = $val;
			}			

			$this->patternselect = '/select\d/';
			if(preg_match($this->patternselect,$key))
			{	
				$this->select[$key] = $val;
			}			


			$this->patternmidasi = '/sel\d{2}_col_\d{3}$/';
			if(preg_match($this->patternmidasi,$key))
			{	
				$this->midasi[$key] = $val;
			}

    	}

    }



}