<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['username'])){
		$username = $_POST['username'];
		$newpass = $_POST['newpass'];
		$confirmpass = $_POST['confirmpass'];


		$param_password = password_hash($newpass, PASSWORD_DEFAULT); // Creates a password hashs
		$link->query("UPDATE `tbl_admin` SET `Password` = '$param_password' WHERE `tbl_admin`.`id` = '$username'");
	}
	
?>