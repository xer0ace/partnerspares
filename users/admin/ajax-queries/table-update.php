<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['tablenumber'])){
		$tablenumber = $_POST['tablenumber'];
		$status = $_POST['status'];
		$capacity = $_POST['capacity'];
		
		$link->query("UPDATE `tbl_dine_table` SET `Status` = '$status', `Capacity` = '$capacity' WHERE `tbl_dine_table`.`Table_Number` = '$tablenumber'");
	}
	
?>