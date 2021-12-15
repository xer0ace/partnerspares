<?php
	require_once '../include/config.php';
	
	$id = $_POST['healthid'];
	
	$link->query("DELETE FROM `tbl_health_declaration` WHERE `Topic` = '$id'");
	$link->query("ALTER TABLE `tbl_form_inputs` DROP `$id`");
?>