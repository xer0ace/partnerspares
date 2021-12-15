<?php
require_once '../include/config.php';
    $checkID = "SELECT * FROM `tbl_category` ORDER BY Category_ID  DESC LIMIT 1 ";
    $checkResult = mysqli_query($link, $checkID);

    if (mysqli_num_rows($checkResult) == 0) {
    	$finalID = "Category-01";
    }
    else
    {
    $row = mysqli_fetch_array($checkResult);
    $lastID = $row['Category_ID'];

    $newID = substr($lastID, -2); //SLICED Member ID
    $plusID = $newID + 1;
    $formatID = str_pad($plusID, 2, '0', STR_PAD_LEFT);


    $finalID = "Category-".$formatID;
	}
    
?>

<input type="text" id="foodid" style="display: none;" name="Food_ID" class="form-control form-control-lg form-control-a" required readonly value="<?php echo $finalID; ?>">