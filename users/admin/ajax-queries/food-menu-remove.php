<?php
	require_once '../include/config.php';
	
		$menu_id = $_POST['menu_id'];
		
		$link->query("UPDATE `tbl_menu_list` SET `Food_Item_ID` = '' WHERE `tbl_menu_list`.`Menu_ID` = '$menu_id'");
	
	
?>