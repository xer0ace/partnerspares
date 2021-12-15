<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['idnumber'])){
		$idnumber = $_POST['idnumber'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		
		$link->query("UPDATE `tbl_admin` SET `Last_Name` = '$lastname', `First_Name` = '$firstname' WHERE `tbl_admin`.`id` = '$idnumber'");
	}
	
?>