<?php
	session_start();
	if(!isset($_SESSION['us_ct_id'])){
		if(isset($_COOKIE['us_ct_id']){
			$_SESSION['us_ct_id'] = $_COOKIE['us_ct_id'];
		}
	}
?>

