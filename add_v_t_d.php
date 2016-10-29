<?php
require_once('connectvars.php');
if(isset($_POST['v_t_d'])){
	if($_POST['v_t_d'] == 'etov_t_d'){
		$query = "UPDATE `us_pre_debate_d` SET `d_t_vote` = `d_t_vote` + 1";
		$result = $connection->query($query);
	}
}
?>