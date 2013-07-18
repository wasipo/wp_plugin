<?php

class wp_meibo_regit_database
{

    private $db_serch;
    private $sanitdata;
    private $pattern;
    public $text;
    public $checkbox;
    public $radio;
    public $select;
    public $midasi;

    function wp_meibo_add($midasi = "",$data) 
    {
  
      	wp_insert_post($data);
 
    }

	public function wp_meibo_sanit_chil($postdata) 
    {

    	foreach($postdata as $key => $val)
    	{

    		htmlspecialchars($val,ENT_QUOTES);

			$this->pattern = '/sel\d{2}_col_\d{2}$/';
			if(preg_match($this->pattern,$key))
			{	
				$text[$key] = $val;
			}

			$this->pattern = '/checkbox\d/';
			if(preg_match($this->pattern,$key))
			{	
				$checkbox[$key] = $val;
			}			

			$this->pattern = '/radio\d/';
			if(preg_match($this->pattern,$key))
			{	
				$radio[$key] = $val;
			}			

			$this->pattern = '/select\d/';
			if(preg_match($this->pattern,$key))
			{	
				$select[$key] = $val;
			}			


			$this->pattern = '/sel\d{2}_col_\d{3}$/';
			if(preg_match($this->pattern,$key))
			{	
				$midasi[$key] = $val;
			}

    	}

    	$this->wp_sanit_template();
    }

    public function wp_sanit_template()
    {
    	
    }

}