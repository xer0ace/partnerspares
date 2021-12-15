<?php

if (isset($_POST["save"])) {
	$errors     = array();
  	$maxsize    =  10000000;

	$username = $_POST["username"];
	$lastname = $_POST["lastname"];
	$firstname = $_POST["firstname"];
	$contact = $_POST["contact"];
	$municipality = $_POST["municipality"];
	$barangay = $_POST["barangay"];
	$street_purok = $_POST["street_purok"];

	$pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

    if (empty($username) || empty($lastname) || empty($firstname)) {
    	echo "<script>alert('Empty fields!') </script>";
    }
    else
    {
    	if ($_FILES['file']['size'] == 0 && $_FILES["file"]["size"] == 0) 
		    {
		      $link->query("UPDATE `tbl_clients` SET `Last_Name` = '$lastname', `First_Name` = '$firstname', `Contact` = '$contact', `Municipality_City` = '$municipality', `Barangay` = '$barangay', `Street_Purok` = '$street_purok' WHERE `tbl_clients`.`Username` = '$username'");

		      echo "<script> window.location.replace('profile.php');</script>";
		    }
		else
		    {
		      if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) 
		      {
		        $result_mssg = 'File too large. File must be less than 10 megabytes.';
		      }

		      else
		      {
		        #temporary file name to store file
		        $tname = $_FILES["file"]["tmp_name"];
		               
		        #upload directory path
		        $uploads_dir = '../../uploaded-files/clients';
		        #TO move the uploaded file to specific location
		        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
		        $link->query("UPDATE `tbl_clients` SET `Last_Name` = '$lastname', `First_Name` = '$firstname', `Contact` = '$contact', `Municipality_City` = '$municipality', `Barangay` = '$barangay', `Street_Purok` = '$street_purok', `picture` = '$pname' WHERE `tbl_clients`.`Username` = '$username'");
		         echo "<script> window.location.replace('profile.php');</script>";
		      }
		    }
    }
}


?>