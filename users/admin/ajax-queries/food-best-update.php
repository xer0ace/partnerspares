<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['foodID'])){

		$foodID = $_POST['foodID'];
		$category = $_POST['category'];

    	$check1stID = "SELECT * FROM `tbl_best_seller` ORDER BY Best_Seller_ID  DESC LIMIT 1 ";
    	$check1stResult = mysqli_query($link, $check1stID);


		if (mysqli_num_rows($check1stResult) == 0) {
    	$final1stID = "Best-Seller-01";
	    }
	    else
	    {
	    $row = mysqli_fetch_array($check1stResult);
	    $lastID = $row['Best_Seller_ID'];

	    $newID = substr($lastID, -2); //SLICED Member ID
	    $plusID = $newID + 1;
	    $formatID = str_pad($plusID, 2, '0', STR_PAD_LEFT);


	    $final1stID = "Best-Seller-".$formatID;
		}



		$checkID = "SELECT * FROM `tbl_best_seller` WHERE Category_ID = '$category'";
    	$checkResult = mysqli_query($link, $checkID);

    	if (mysqli_num_rows($checkResult) == 0) {
    		$link->query("INSERT INTO `tbl_best_seller` VALUES ('$final1stID', '$foodID', '$category')");
    	}
    	else {
    		$link->query("UPDATE `tbl_best_seller` SET `Food_Item_ID` = '$foodID' WHERE `tbl_best_seller`.`Category_ID` = '$category'");
    	}
		
		
	}
	
?>