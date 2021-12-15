<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['table_number'])){
		$id = $_POST['table_number'];
		
		$query = $link->query("SELECT * FROM `tbl_dine_table` WHERE `Table_Number` ='$id'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'tablenumber' => $fetch['Table_Number'],
			'capacity' => $fetch['Capacity'],
			'status' => $fetch['Status']
		);
		
		echo json_encode($array);
	}
?>