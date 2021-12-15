<?php
	require_once '../include/config.php';

		$lagnat = $_POST['lagnat'];
        $ubo = $_POST['ubo'];
        $katawan = $_POST['katawan'];
        $lalamunan = $_POST['lalamunan'];
        $nakasalamuha = $_POST['nakasalamuha'];
        $alaga = $_POST['alaga'];
        $nagbyahe = $_POST['nagbyahe'];
        $lungsod = $_POST['lungsod'];
        $Client_ID = $_POST['Client_ID'];

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

		$message = "";
		// Prepare a select statement
        $sql = "SELECT * FROM tbl_contact_tracing WHERE `Date` = '$dateQuery' ORDER BY Contact_Tracing_ID DESC LIMIT 1";
        $checkResult = mysqli_query($link, $sql);

    	if (mysqli_num_rows($checkResult) == 0) {

    	$Contact_Tracing_ID = "Contact-Tracing-".$date."-0001";

    	}
    	else{

                $row = mysqli_fetch_array($checkResult);
                $lastID = $row['Contact_Tracing_ID'];

                $newID = substr($lastID, -4); //SLICED Member ID
                $plusID = $newID + 1;
                $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);

                $Contact_Tracing_ID = "Contact-Tracing-". $date."-".$formatID;
    		
    		
    	}

	$link->query("INSERT INTO `tbl_contact_tracing` VALUES ('$Contact_Tracing_ID', '$Client_ID', '$dateQuery', '$time', '$lagnat' , '$ubo' , '$katawan' , '$lalamunan' , '$nakasalamuha' , '$alaga' , '$nagbyahe' , '$lungsod'   )");

?>