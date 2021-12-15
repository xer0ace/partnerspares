<?php
	require_once '../include/config.php';

	$topic = $_POST['topic'];
	$description_edit = $_POST['description_edit'];

	$checkColumns = "SHOW COLUMNS FROM `tbl_form_inputs` LIKE '$topic'";
    $checkResultColumns = mysqli_query($link, $checkColumns);

    if (mysqli_num_rows($checkResultColumns) == 1) {
    	$message = "This Health Category is already existing!";
    	echo json_encode($message);
    }

    else
    {

		$checkID = "SELECT * FROM `tbl_health_declaration` ORDER BY Details_ID  DESC LIMIT 1 ";
	    $checkResult = mysqli_query($link, $checkID);

	    if (mysqli_num_rows($checkResult) == 0) {
	    	$finalID = "Health-001";
	    }
	    else
	    {
	    $row = mysqli_fetch_array($checkResult);
	    $lastID = $row['Details_ID'];

	    $newID = substr($lastID, -3); //SLICED Member ID
	    $plusID = $newID + 1;
	    $formatID = str_pad($plusID, 3, '0', STR_PAD_LEFT);

	    $finalID = "Health-".$formatID;
		}
		
		$link->query("INSERT INTO `tbl_health_declaration` (`Details_ID`, `Topic`, `Description`) VALUES ('$finalID', '$topic', '$description_edit')");
		$link->query("ALTER TABLE `tbl_form_inputs` ADD `$topic` VARCHAR(10) NOT NULL");
        $message = "Successfully Added!";
    	echo json_encode($message);
	}
?>
