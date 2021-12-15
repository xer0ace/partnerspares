<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['menuID'])){
		$foodID = $_POST['foodID'];
		$menuID = $_POST['menuID'];
		
		$link->query("UPDATE `tbl_menu_list` SET `Food_Item_ID` = '$foodID' WHERE `tbl_menu_list`.`Menu_ID` = '$menuID'");
	}
	
?>