<?php
require_once '../include/config.php';

  $To_Pay_Items = $_POST['names'];

$Client_ID = $_POST['Client_ID'];
$item_quantity = $_POST['item_quantity'];
$total_price = $_POST['total_price'];

  	$Pending_Orders_ID = "";
  	date_default_timezone_set('Asia/Manila');
    $wholeYear = date("Y");
    $year = date("y");
    $month = date("m");
    $day = date("d");
    $hour = date("h");
    $minutes = date("i");
    $seconds = date("s");
    $date = $year."-".$month."-".$day;
    $dateQuery = $wholeYear."-".$month."-".$day;
    $time = $hour.":".$minutes.":".$seconds;


			$checkID = "SELECT * FROM `tbl_pending_orders` WHERE Date_Added = '$dateQuery' ORDER BY Pending_Orders_ID DESC LIMIT 1 ";
    		$checkResult = mysqli_query($link, $checkID);

			if (mysqli_num_rows($checkResult) == 0) {
				$Pending_Orders_ID = "Order-Food-PPM-ID-".$date."-0001";

				$link->query("INSERT INTO `tbl_pending_orders` VALUES ('$Pending_Orders_ID', '$Client_ID', '$To_Pay_Items', '$item_quantity' , '$total_price', '$dateQuery', '$time', 'Cash-on-Delivery.jpg', 'Not Paid', 'Pending', 'Delivery', 'Delivery - No Table')");

				$link->query("UPDATE `tbl_cart` SET `Status` = 'Sold' WHERE Client_ID = '$Client_ID' AND Status = 'To Pay'");

			}
			else 
			{
				$row = mysqli_fetch_array($checkResult);
		        $lastID = $row['Pending_Orders_ID'];

		        $newID = substr($lastID, -4); //SLICED Member ID
		        $plusID = $newID + 1;
		        $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);

		        $Pending_Orders_ID = "Order-Food-PPM-ID-". $date."-".$formatID;

		     
		        
		        $link->query("INSERT INTO `tbl_pending_orders` VALUES ('$Pending_Orders_ID', '$Client_ID', '$To_Pay_Items', '$item_quantity' , '$total_price', '$dateQuery', '$time', 'Cash-on-Delivery.jpg', 'Not Paid', 'Pending', 'Delivery', 'Delivery - No Table')");

		       $link->query("UPDATE `tbl_cart` SET `Status` = 'Sold' WHERE Client_ID = '$Client_ID' AND Status = 'To Pay'");
			}
		
   




?>