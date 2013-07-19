<?php
	require_once("wp_meibo_loader.php");
	$wpwp_classLoader = new WpwpwpClassLoader();
	$wpwp_classLoader->registerDir(dirname(__FILE__));
	
	$postdata = $_POST;
	$wpwp_postsp = new wp_meibo_regit_database();
	$wpwp_postsp->wp_meibo_sanit_chil($postdata);

/*    public $text;
    public $checkbox;
    public $radio;
    public $select;
    public $midasi;	*/

var_dump($wpwp_postsp->text);
var_dump($wpwp_postsp->radio);


    for($i = 0; $i < count($wpwp_postsp->midasi); $i++)
    {
    	$incflg = $i;
    	strval($incflg);
    	echo "<div>".$wpwp_postsp->midasi["sel0".$incflg."_col_000"]."</div>";
    	if(!empty($wpwp_postsp->text["sel0".$incflg."_col_00"]))
    	{
    		echo "<div>".$wpwp_postsp->text["sel0".$incflg."_col_00"]."</div>";
    	}
    }
