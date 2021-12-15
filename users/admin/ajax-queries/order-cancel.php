<?php
	require_once '../include/config.php';
	
	$id = $_POST['Pending_Orders_ID'];
	
	$link->query("UPDATE `tbl_pending_orders` SET `Order_Status` = 'Cancelled', `Payment_Status` = 'Cancelled' WHERE `tbl_pending_orders`.`Pending_Orders_ID` = '$id'");
?>