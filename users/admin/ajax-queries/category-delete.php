<?php
	require_once '../include/config.php';
	
	$id = $_POST['foodid'];
	
	$link->query("DELETE FROM `tbl_category` WHERE `Category_ID` = '$id'");
?>