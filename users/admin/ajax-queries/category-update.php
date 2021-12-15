<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['foodid'])){
		$foodid = $_POST['foodid'];
		$name = $_POST['name'];
		
		$link->query("UPDATE `tbl_category` SET `Category_Name` = '$name' WHERE `tbl_category`.`Category_ID` = '$foodid'");
	}
	
?>