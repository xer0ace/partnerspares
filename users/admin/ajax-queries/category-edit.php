<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['foodid'])){
		$id = $_POST['foodid'];
		
		$query = $link->query("SELECT * FROM `tbl_category` WHERE `Category_ID` ='$id'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'foodid' => $fetch['Category_ID'],
			'name' => $fetch['Category_Name']
		);
		
		echo json_encode($array);
	}
?>