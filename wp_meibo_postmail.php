<?php
	require_once("wp_meibo_loader.php");
	$wpwp_classLoader = new WpwpwpClassLoader();
	$wpwp_classLoader->registerDir(dirname(__FILE__));

	session_start();

	$wpwp_postsp = new wp_meibo_regit_database();
	$wpwp_postsp->wp_meibo_sanit_chil($_SESSION["postdata"]);

	echo "以下の内容を送信しました。";

    for($i = 0; $i < count($wpwp_postsp->midasi); $i++)
    {
    	$incflg = $i;
    	strval($incflg);
    	echo '<div class="colum_confirm confirm_colum_line'.$i.'">'.$wpwp_postsp->midasi["sel0".$incflg."_col_000"]."</div>";
    	if(!empty($wpwp_postsp->text["sel0".$incflg."_col_00"]))
    	{
    		echo '<div class="confirm_text text_line'.$i.'">'.$wpwp_postsp->text["sel0".$incflg."_col_00"]."</div>";
    	} else if(!empty($wpwp_postsp->radio["radio".$incflg])) {
    		echo '<div class="confirm_radio radio_line'.$i.'">'.$wpwp_postsp->radio["radio".$incflg]."</div>";
    	} else if(!empty($wpwp_postsp->select["select".$incflg])) {
    		echo '<div class="confirm_select select_line'.$i.'">'.$wpwp_postsp->checkbox["select".$incflg]."</div>";
    	} else if(!empty($wpwp_postsp->checkbox["check".$incflg])) {
    		for($j = 0; $j < count($wpwp_postsp->checkbox["check".$incflg]); $j++)
    		{
    			if($j == 0){ echo '<div class="confirm_checkbox checkbox_line'.$i.'">'; }
    			echo '<span>'.$wpwp_postsp->checkbox["check".$incflg][$j].'</span>';
    			if($j == $j < count($wpwp_postsp->checkbox["check".$incflg])){ echo '</div>'; }
    		}
    	}
    }