<?php
if (isset($_POST["update_food"]))
{
  $errors     = array();
  $maxsize    =  10000000;

  $Food_ID = $_POST['Food_ID'];
  $Name = $_POST['Name'];
  $Price = $_POST['Price'];
  $Serving = $_POST['Serving'];
  $Availability = $_POST['Availability'];
  $Category = $_POST['Category'];

    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);


    if ($Availability == "Availability") {
    	$result_mssg = "Please enter an Availability";
    }
    else
    {
		    if ($_FILES['file']['size'] == 0 && $_FILES["file"]["size"] == 0) 
		    {
		      $link->query("UPDATE `tbl_food_item_list` SET `Name` = '$Name', `Category_ID` = '$Category', `Price` = '$Price', `Availability` = '$Availability', Serving = '$Serving' WHERE `tbl_food_item_list`.`Food_Item_ID` = '$Food_ID'");
		    }
		    else
		    {
		      if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) 
		      {
		        $errors[] = 'File too large. File must be less than 10 megabytes.';
		      }

		      else
		      {
		        #temporary file name to store file
		        $tname = $_FILES["file"]["tmp_name"];
		               
		        #upload directory path
		        $uploads_dir = '../../uploaded-files/food-items';
		        #TO move the uploaded file to specific location
		        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
		       $link->query("UPDATE `tbl_food_item_list` SET `Name` = '$Name', `Category_ID` = '$Category',  `Price` = '$Price', `Availability` = '$Availability', `picture` = '$pname', Serving = '$Serving' WHERE `tbl_food_item_list`.`Food_Item_ID` = '$Food_ID'");
		      }
		    }
	}
  }
?>