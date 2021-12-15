<?php
require_once '../include/config.php';

$To_Pay_Items = $_POST['names'];

$Client_ID = $_POST['Client_ID'];
$item_quantity = $_POST['item_quantity'];
$total_price = $_POST['total_price'];

	$To_Pay_ID = "";
    $wholeYear = date("Y");
    $year = date("y");
    $month = date("m");
    $day = date("d");
    $date = $year."-".$month."-".$day;
    $dateQuery = $wholeYear."-".$month."-".$day;

    $message = "";

    $checkitems = "SELECT * FROM `tbl_to_pay` WHERE Client_ID = '$Client_ID'";
    $itemresult = mysqli_query($link, $checkitems);

    if (mysqli_num_rows($itemresult) == 1) 
    {

        $message = "existing";
        echo json_encode($message);
        	
    }
    else
    {
        $checkID = "SELECT * FROM `tbl_to_pay` WHERE Date_Added = '$dateQuery' ORDER BY To_Pay_ID  DESC LIMIT 1 ";
            $checkResult = mysqli_query($link, $checkID);

            if (mysqli_num_rows($checkResult) == 0) {

               $To_Pay_ID = "To-Pay-". $date."-0001";
               $link->query("INSERT INTO `tbl_to_pay` VALUES ('$To_Pay_ID', '$Client_ID', '$To_Pay_Items', '$item_quantity' , '$total_price', '$dateQuery', 'Delivery', 'Delivery - No Table')");

               $link->query("UPDATE `tbl_cart` SET `Status` = 'Pending' WHERE Client_ID = '$Client_ID' AND Status = 'To Pay'");

                $message = "success";
                echo json_encode($message);
            }
            else
            {
            
                $row = mysqli_fetch_array($checkResult);
                $lastID = $row['To_Pay_ID'];

                $newID = substr($lastID, -4); //SLICED Member ID
                $plusID = $newID + 1;
                $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);

                $To_Pay_ID = "To-Pay-". $date."-".$formatID;

                $link->query("INSERT INTO `tbl_to_pay` VALUES ('$To_Pay_ID', '$Client_ID', '$To_Pay_Items', '$item_quantity' , '$total_price', '$dateQuery', 'Delivery', 'Delivery - No Table')");
                
                $link->query("UPDATE `tbl_cart` SET `Status` = 'Pending' WHERE Client_ID = '$Client_ID' AND Status = 'To Pay'");
                $message = "success";
                 echo json_encode($message);
            }
    }

?>