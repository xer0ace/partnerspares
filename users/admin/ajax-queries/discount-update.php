<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['foodID'])){

		$foodID = $_POST['foodID'];
		$category = $_POST['category'];
		$percent = $_POST['percent'];

    	$check1stID = "SELECT * FROM `tbl_discounts` ORDER BY Discount_ID  DESC LIMIT 1 ";
    	$check1stResult = mysqli_query($link, $check1stID);


		if (mysqli_num_rows($check1stResult) == 0) {
    	$final1stID = "Discount-001";
	    }
	    else
	    {
	    $row = mysqli_fetch_array($check1stResult);
	    $lastID = $row['Discount_ID'];

	    $newID = substr($lastID, -3); //SLICED Member ID
	    $plusID = $newID + 1;
	    $formatID = str_pad($plusID, 3, '0', STR_PAD_LEFT);


	    $final1stID = "Discount-".$formatID;
		}



		$checkID = "SELECT * FROM `tbl_discounts` WHERE Food_Item_ID = '$foodID'";
    	$checkResult = mysqli_query($link, $checkID);

    	if (mysqli_num_rows($checkResult) == 0) {
    		$link->query("INSERT INTO `tbl_discounts` VALUES ('$final1stID', '$foodID', '.$percent')");
    		$link->query("UPDATE `tbl_food_item_list` SET `Discount_Status` = 'Yes' WHERE `tbl_food_item_list`.`Food_Item_ID` = '$foodID'");
    	}
    	else {
    		$link->query("UPDATE `tbl_discounts` SET `Percent` = '.$percent' WHERE `tbl_discounts`.`Food_Item_ID` = '$foodID'");
    		$link->query("UPDATE `tbl_food_item_list` SET `Discount_Status` = 'Yes' WHERE `tbl_food_item_list`.`Food_Item_ID` = '$foodID'");
    	}
		
		
	}
	
?>