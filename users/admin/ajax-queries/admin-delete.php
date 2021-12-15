<?php
	require_once '../include/config.php';
	
	$id = $_POST['idnumber'];
	
	$link->query("DELETE FROM `tbl_admin` WHERE `id` = '$id'");
?>