<?php
	require_once '../include/config.php';
	
	$id = $_POST['foodid'];
	
	$link->query("DELETE FROM `tbl_food_item_list` WHERE `Food_Item_ID` = '$id'");
	$link->query("UPDATE `tbl_food_grid_display` SET `Food_Item_ID` = '' WHERE `tbl_food_grid_display`.`Food_Item_ID` = '$id'");
	$link->query("UPDATE `tbl_menu_list` SET `Food_Item_ID` = '' WHERE `tbl_menu_list`.`Food_Item_ID` = '$id'");
?>