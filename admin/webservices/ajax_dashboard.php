<?php

	include('../classes/functions.php');
	$con = new functions();
	session_start(); 

	if($_REQUEST['action'] == 'dashboard_counts'){

		$active = 0;
		$inactive = 0;

		$sql_active = "SELECT id FROM blogs WHERE status = 1";
		$result_active = $con->data_select($sql_active);

		if($result_active !='no'){
			$active = count($result_active);
		}

		$sql_inactive = "SELECT id FROM blogs WHERE status = 0";
		$result_inactive = $con->data_select($sql_inactive);

		if($result_inactive !='no'){
			$inactive = count($result_inactive);
		}
		
		$total = $active+$inactive;

		$count_array = array(
			'active' => $active, 
			'inactive' => $inactive,
			'total' => $total
		);
		
		echo json_encode($count_array);
		exit;

	}


?>