<?php
if (isset($_POST["add_food"]))
{
 
  $maxsize    =  10000000;

  $Food_ID = $_POST['Food_ID'];
  $Name = $_POST['Name'];
  $Price = $_POST['Price'];
  $Serving = $_POST['Serving'];
  $Availability = $_POST['Availability'];
  $Category = $_POST['Category'];

    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);


    if ($Availability == "Availability" || $Category == "Category") {
    	$result_mssg = "Please complete all fields";
    }
    else
    {
		    if ($_FILES['file']['size'] == 0 && $_FILES["file"]["size"] == 0) 
		    {
		      $link->query("INSERT INTO `tbl_food_item_list` VALUES ('$Food_ID', '$Name', '$Category', '$Price', '$Availability', 'default.png', '$Serving', 'No')");
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
		        $uploads_dir = '../../uploaded-files/food-items';
		        #TO move the uploaded file to specific location
		        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
		        $link->query("INSERT INTO `tbl_food_item_list` VALUES ('$Food_ID', '$Name', '$Category', '$Price', '$Availability', '$pname', '$Serving', 'No')");
		      }
		    }
	}
  }
?>