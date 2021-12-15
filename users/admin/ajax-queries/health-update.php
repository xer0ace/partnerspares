<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['healthid'])){
		$healthid = $_POST['healthid'];
		$topic = $_POST['topic'];
		$description_edit = $_POST['description_edit'];
		
		$link->query("UPDATE `tbl_health_declaration` SET `Topic` = '$topic', `Description` = '$description_edit' WHERE `tbl_health_declaration`.`Topic` = '$healthid'");
		$link->query("ALTER TABLE `tbl_form_inputs` CHANGE `$healthid` `$topic` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL");
	}
	
?>