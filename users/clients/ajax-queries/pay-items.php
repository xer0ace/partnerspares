<?php
	
if (isset($_POST["pay_now"]))
{

  $maxsize = 10000000;

  $dine_type = $_POST['dine_type'];
  $table_seated = $_POST['table_seated'];
  $list_items = $_POST['list_items'];
  $quantity = $_POST['quantity'];
  $total = $_POST['total'];

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

  $pname = rand(1000,10000)."-".$_FILES["proof_payment"]["name"];
  $extension = pathinfo($_FILES["proof_payment"]["name"], PATHINFO_EXTENSION);

   if ($_FILES['proof_payment']['size'] == 0 && $_FILES["proof_payment"]["size"] == 0) 
   {	
   		// if proof of payment is empty
		echo "<script> alert('Please attach the picture or screenshot of the proof of payment below.') </script>";
   }
   else
   {
   		if(($_FILES['proof_payment']['size'] >= $maxsize) || ($_FILES["proof_payment"]["size"] == 0)) 
		{
			echo "<script> alert('File too large. File must be less than 10 megabytes.') </script>";
		}

		else
		{
			$checkID = "SELECT * FROM `tbl_pending_orders` WHERE Date_Added = '$dateQuery' ORDER BY Pending_Orders_ID DESC LIMIT 1 ";
    		$checkResult = mysqli_query($link, $checkID);

			if (mysqli_num_rows($checkResult) == 0) {
				$Pending_Orders_ID = "Order-Food-PPM-ID-".$date."-0001";

				$link->query("INSERT INTO `tbl_pending_orders` VALUES ('$Pending_Orders_ID', '$Client_ID', '$list_items', '$quantity' , '$total', '$dateQuery', '$time', '$pname', 'Paid', 'Pending', '$dine_type', '$table_seated')");

				$link->query("DELETE FROM `tbl_to_pay` WHERE Client_ID = '$Client_ID'");
				$link->query("UPDATE `tbl_cart` SET `Status` = 'Sold' WHERE Client_ID = '$Client_ID' AND Status = 'Pending'");

				#temporary file name to store file
		        $tname = $_FILES["proof_payment"]["tmp_name"];
		               
		        #upload directory path
		        $uploads_dir = '../../uploaded-files/payments';
		        #TO move the uploaded file to specific location
		        move_uploaded_file($tname, $uploads_dir.'/'.$pname);


				echo "<script> 
				alert('Payment Successful! Please wait for the PPM Staff to review your payment');
				window.location.href = 'orders-pending.php';
				 </script>";
			}
			else 
			{
				$row = mysqli_fetch_array($checkResult);
		        $lastID = $row['Pending_Orders_ID'];

		        $newID = substr($lastID, -4); //SLICED Member ID
		        $plusID = $newID + 1;
		        $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);

		        $Pending_Orders_ID = "Order-Food-PPM-ID-". $date."-".$formatID;

		        #temporary file name to store file
		        $tname = $_FILES["proof_payment"]["tmp_name"];
		               
		        #upload directory path
		        $uploads_dir = '../../uploaded-files/payments';
		        #TO move the uploaded file to specific location
		        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
		        
		        $link->query("INSERT INTO `tbl_pending_orders` VALUES ('$Pending_Orders_ID', '$Client_ID', '$list_items', '$quantity' , '$total', '$dateQuery', '$time', '$pname', 'Paid', 'Pending', '$dine_type', '$table_seated')");
		        $link->query("DELETE FROM `tbl_to_pay` WHERE Client_ID = '$Client_ID'");
		        $link->query("UPDATE `tbl_cart` SET `Status` = 'Sold' WHERE Client_ID = '$Client_ID' AND Status = 'Pending'");
		        echo "<script> alert('Payment Successful! Please wait for the PPM Staff to review your payment');
		        window.location.href = 'orders-pending.php'; </script>";
			}
		}
   }

}

if (isset($_POST["cancel_order"]))
{

  $dine_type = $_POST['dine_type'];
  $table_seated = $_POST['table_seated'];
  $list_items = $_POST['list_items'];
  $quantity = $_POST['quantity'];
  $total = $_POST['total'];

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
				$Pending_Orders_ID = "Pending-Food-ID-".$date."-0001";

				$link->query("INSERT INTO `tbl_pending_orders` VALUES ('$Pending_Orders_ID', '$Client_ID', '$list_items', '$quantity' , '$total', '$dateQuery', '$time', 'Cancelled-order.jpg', 'Cancelled', 'Cancelled', 'Cancelled', 'Cancelled')");

				$link->query("DELETE FROM `tbl_to_pay` WHERE Client_ID = '$Client_ID'");

			 $link->query("DELETE FROM `tbl_cart` WHERE Client_ID = '$Client_ID' AND Status = 'Pending'");


				echo "<script> 
				alert('Order Cancelled!');
				window.location.href = 'orders-cancelled.php';
				 </script>";
			}
			else 
			{
				$row = mysqli_fetch_array($checkResult);
		        $lastID = $row['Pending_Orders_ID'];

		        $newID = substr($lastID, -4); //SLICED Member ID
		        $plusID = $newID + 1;
		        $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);

		        $Pending_Orders_ID = "Pending-Food-ID-". $date."-".$formatID;
		        
		        $link->query("INSERT INTO `tbl_pending_orders` VALUES ('$Pending_Orders_ID', '$Client_ID', '$list_items', '$quantity' , '$total', '$dateQuery', '$time', 'Cancelled-order.jpg', 'Cancelled', 'Cancelled', 'Cancelled', 'Cancelled')");

		        $link->query("DELETE FROM `tbl_cart` WHERE Client_ID = '$Client_ID' AND Status = 'Pending'");


		        $link->query("DELETE FROM `tbl_to_pay` WHERE Client_ID = '$Client_ID'");
		        echo "<script> alert('Order Cancelled!');
		        window.location.href = 'orders-cancelled.php'; </script>";
			}


}

?>