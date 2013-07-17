<?php

class wp_meibo_check
{

	public $wp_meibo_midasi;
	public $wp_meibo_naiyou;
	public $wp_meibo_type;
	private $count;
	private $p_count;
	public $data;
	private $pattern;


	function __construct()
	{
		$this->p_data = $_POST;
		$this->wp_meibo_check_main($this->p_data);
		session_start();
	}

	private function wp_meibo_check_main($data = "")
	{
		
		$this->wp_meibo_sanit($data);

	}

	private function wp_meibo_sanit($data = "")
	{
		$this->count = 0;
		$bcount = 0;
		$this->p_count = 0;

	var_dump($data);		

		foreach($data as $key => $val)
		{

			//$a = substr($key,-2);

			$this->pattern = '/^type\d|\d{2}/';
			if(preg_match($this->pattern,$key))
			{	
				$this->wp_meibo_type($key,$val);
				$this->count++;
			}

			$this->pattern = '/^[a-z]{5}[0-9]{1}/';
			if(preg_match($this->pattern,$key))
			{
				$this->wp_meibo_midasi($key,$val);
				$bcount++;
			}

			$this->pattern = '/sel\d_col_\d|sel\d{2}_col_\d{2}/';
			if(preg_match($this->pattern,$key))
			{	
				$this->wp_meibo_naiyou($this->p_count,$key,$val);
				$this->p_count++;
			} else {
				$this->p_count = 0;
			}
			
		}
	}


	private function wp_meibo_type($key,$val)
	{
		$this->wp_meibo_type[$key] = $val;
	}

	private function wp_meibo_midasi($key,$val)
	{
		$this->wp_meibo_midasi[$key] = $val;
	}

	private function wp_meibo_naiyou($int,$key,$val)
	{
		$this->wp_meibo_naiyou[$key] = $val;
	}


	
}