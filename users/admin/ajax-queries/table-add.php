<?php
	require_once '../include/config.php';

	$tablenumber = $_POST['tablenumber'];
	$status = $_POST['status'];
	$capacity = $_POST['capacity'];
	
	$link->query("INSERT INTO `tbl_dine_table` VALUES ('$tablenumber', '$status' , '$capacity')");
             
	
?>
