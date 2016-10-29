<?php

if(isset($_POST['v_c_h'])){
	if($_POST['v_c_h'] == 'etov_c_h'){
		$handleh = fopen("counterh.txt", "r"); 
		if($handleh){ 
			$counterh = ( int ) fread ($handleh,30) ; 
			fclose ($handleh) ; 
			$counterh++ ;
			$handleh = fopen("counterh.txt", "w" ) ; 
			fwrite($handleh,$counterh) ; 
			fclose ($handleh); 
		}
	}
}
?>