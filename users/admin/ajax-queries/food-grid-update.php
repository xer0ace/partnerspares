<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['menuID'])){
		$foodID = $_POST['foodID'];
		$menuID = $_POST['menuID'];
		
		$link->query("UPDATE `tbl_food_grid_display` SET `Food_Item_ID` = '$foodID' WHERE `tbl_food_grid_display`.`Menu_ID` = '$menuID'");
	}
	
?>