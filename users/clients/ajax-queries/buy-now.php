<?php
	require_once '../include/config.php';

		$cartID = $_POST['cartID'];
		$Food_Item_ID = $_POST['Food_Item_ID'];
		$Client_ID = $_POST['Client_ID'];

		$message = "";
		// Prepare a select statement
        $sql = "SELECT * FROM tbl_cart WHERE Food_Item_ID = '$Food_Item_ID' AND Client_ID = '$Client_ID'";
        $checkResult = mysqli_query($link, $sql);

        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $date = $year."-".$month."-".$day;

    	if (mysqli_num_rows($checkResult) == 1) {
    	$message = "You already have this Item on your cart";
    	echo json_encode($message);
    	}
    	else{

    		$link->query("INSERT INTO `tbl_cart` VALUES ('$cartID', '$Food_Item_ID', '$Client_ID', '$date' )");
    	}

	//------------------------------------------------------------------------------------->
	

 	

?>