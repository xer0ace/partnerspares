<?php
require_once '../include/config.php';
    $checkID = "SELECT * FROM `tbl_food_item_list` ORDER BY Food_Item_ID  DESC LIMIT 1 ";
    $checkResult = mysqli_query($link, $checkID);

    if (mysqli_num_rows($checkResult) == 0) {
    	$finalID = "Food-0001";
    }
    else
    {
    $row = mysqli_fetch_array($checkResult);
    $lastID = $row['Food_Item_ID'];

    $newID = substr($lastID, -4); //SLICED Member ID
    $plusID = $newID + 1;
    $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);


    $finalID = "Food-".$formatID;
	}
    
?>

<input type="text" id="foodid" name="Food_ID" style="display: none;" class="form-control form-control-lg form-control-a" required readonly value="<?php echo $finalID; ?>">