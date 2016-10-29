<?php

if(isset($_POST['v_t_d'])){
	if($_POST['v_t_d'] == 'etov_t_d'){
		$handled = fopen("counterd.txt", "r"); 
		if($handled){ 
			$counterd = ( int ) fread ($handled,30) ; 
			fclose ($handled) ; 
			$counterd++ ;
			$handled = fopen("counterd.txt", "w" ) ; 
			fwrite($handled,$counterd) ; 
			fclose ($handled); 
		}
	}
}
?>  