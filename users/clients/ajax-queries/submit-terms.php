<?php
	require_once '../include/config.php';

        $Client_ID = $_POST['Client_ID'];

     

		$message = "";
		// Prepare a select statement
        $sql = "SELECT * FROM tbl_terms_and_conditions ORDER BY Terms_ID DESC LIMIT 1";
        $checkResult = mysqli_query($link, $sql);

    	if (mysqli_num_rows($checkResult) == 0) {

    	$Contact_Tracing_ID = "Terms-ID-0001";

    	}
    	else{

                $row = mysqli_fetch_array($checkResult);
                $lastID = $row['Terms_ID'];

                $newID = substr($lastID, -4); //SLICED Member ID
                $plusID = $newID + 1;
                $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);

                $Contact_Tracing_ID = "Terms-ID-".$formatID;
    		
    		
    	}

	$link->query("INSERT INTO `tbl_terms_and_conditions` VALUES ('$Contact_Tracing_ID', '$Client_ID')");

    date_default_timezone_set('Asia/Manila');
    $wholeYear = date("Y");
    $month = date("m");
    $day = date("d");

    $dateQuery = $wholeYear."-".$month."-".$day;

      $sqlTracing = "SELECT * FROM `tbl_contact_tracing` WHERE `Client_ID` = '$Client_ID' AND `Date` = '$dateQuery'";
      $checkResultTracing = mysqli_query($link, $sqlTracing);

      if (mysqli_num_rows($checkResultTracing) == 1) {
          $existing = "existing";
          echo json_encode($existing);
      }
      else
      {
        $nonexisting = "nonexisting";
        echo json_encode($nonexisting);
      }
?>