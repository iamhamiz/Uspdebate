<?php
require_once('connectvars.php');
if(isset($_POST['v_c_h'])){
	if($_POST['v_c_h'] == 'etov_c_h'){
		$query = "UPDATE `us_pre_debate_h` SET `h_c_vote` = `h_c_vote` + 1";
		$result = $connection->query($query);
	}
}
?>