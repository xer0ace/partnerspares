<?php
	require_once '../include/config.php';
	
	$Client_ID = $_POST['Client_ID'];
	$cart_id = $_POST['cart_id'];
	
	$link->query("DELETE FROM `tbl_cart` WHERE `Cart_ID` = '$cart_id' AND Client_ID = '$Client_ID'");
?>