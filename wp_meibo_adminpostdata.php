<?php

class wp_meibo_adminpostdata
{

    public $title = array();
    public $colum = array();
    public $columtype = array();

	public function __construct($title,$colum,$columtype)
	{
		//var_dump($columtype);
		$this->title[] = $title;
		if(is_array($colum))
		{
			$num = count($colum);
			for($i = 0; $i < $num; $i++)
			{
				$this->colum[] = $colum[$i];
				if(isset($columtype))
				{
					for($j = 0; $j < $num; $j++)
					{
						$this->columtype[$i][] = $columtype;
					}
				}
			}

		}
		
//var_dump($this->columtype);

    }




}