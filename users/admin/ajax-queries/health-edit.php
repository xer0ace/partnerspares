<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['healthid'])){
		$id = $_POST['healthid'];
		
		$query = $link->query("SELECT * FROM `tbl_health_declaration` WHERE `Details_ID` ='$id'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'topic' => $fetch['Topic'],
			'description' => $fetch['Description']
		);
		
		echo json_encode($array);
	}
?>