<?php

class wp_meibo_check
{
	public $wp_meibo_midasi;
	public $wp_meibo_naiyou;
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

	public function wp_meibo_check_main($data = "")
	{

		$this->wp_meibo_sanit($data);

	}

	public function wp_meibo_sanit($data = "")
	{
		$this->count = 0;
		$this->p_count = 0;

		foreach($data as $key => $val)
		{
			
			$a = substr($key,-2);
			
			$this->pattern = '/^[a-z]{5}[0-9]{1}/';
			if(preg_match($this->pattern,$key))
			{
				$this->count++;
				$this->wp_meibo_midasi($this->count,$val);
			}

			$this->pattern = '/sel\d_col_\d|sel\d{2}_col_\d{2}/';
			if(preg_match($this->pattern,$key))
			{
				$this->p_count++;
				$this->wp_meibo_naiyou($this->p_count,$val);
			}


		}

	}


	public function wp_meibo_midasi($int,$val)
	{
		$this->wp_meibo_midasi[$int] = $val;
	}

	public function wp_meibo_naiyou($int,$val)
	{
		$this->wp_meibo_naiyou[$int] = $val;
	}


	
}