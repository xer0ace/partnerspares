<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['idnumber'])){
		$id = $_POST['idnumber'];
		
		$query = $link->query("SELECT * FROM `tbl_admin` WHERE `id` ='$id'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'idnumber' => $fetch['id'],
			'username' => $fetch['Username'],
			'lastname' => $fetch['Last_Name'],
			'firstname' => $fetch['First_Name'],
			'picturePic' => $fetch['picture']
		);
		
		echo json_encode($array);
	}
?>