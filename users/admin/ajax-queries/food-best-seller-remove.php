<?php
	require_once '../include/config.php';
	
	$id = $_POST['foodid'];
	
	$link->query("DELETE FROM `tbl_best_seller` WHERE `Food_Item_ID` = '$id'");?>