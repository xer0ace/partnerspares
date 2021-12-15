<?php
	require_once '../include/config.php';
	
	$id = $_POST['tablenumber'];
	
	$link->query("DELETE FROM `tbl_dine_table` WHERE `Table_Number` = '$id'");
?>