<?php
	require_once '../include/config.php';
	
	$id = $_POST['foodid'];
	
	$link->query("DELETE FROM `tbl_discounts` WHERE `Food_Item_ID` = '$id'");
	$link->query("UPDATE `tbl_food_item_list` SET `Discount_Status` = 'No' WHERE `tbl_food_item_list`.`Food_Item_ID` = '$foodID'");
	?>