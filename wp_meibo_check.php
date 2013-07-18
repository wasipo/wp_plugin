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

	protected function wp_meibo_sanit($data = "")
	{
	
	//========postdata===========
	//このメソッドは出力後も使う
	var_dump($data);

		foreach($data as $key => $val)
		{

			$this->pattern = '/^type\d|type\d{2}/';
			if(preg_match($this->pattern,$key))
			{	
				$this->wp_meibo_type($key,$val);
			}

			$this->pattern = '/^[a-z]{5}[0-9]{1}/';
			if(preg_match($this->pattern,$key))
			{
				$this->wp_meibo_midasi($key,$val);
			}

			$this->pattern = '/sel\d_col_\d|sel\d{2}_col_\d{2}/';
			if(preg_match($this->pattern,$key))
			{	
				$this->wp_meibo_naiyou($key,$val);	
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

	private function wp_meibo_naiyou($key,$val)
	{
		$this->wp_meibo_naiyou[$key] = $val;
	}


	
}