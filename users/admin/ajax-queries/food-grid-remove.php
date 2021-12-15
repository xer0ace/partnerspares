<?php
	require_once '../include/config.php';
	
		$menu_id = $_POST['menu_id'];
		
		$link->query("UPDATE `tbl_food_grid_display` SET `Food_Item_ID` = '' WHERE `tbl_food_grid_display`.`Menu_ID` = '$menu_id'");
	
	
?>