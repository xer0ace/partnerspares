<?php
require_once '../include/config.php';
    $checkID = "SELECT * FROM `tbl_clients` ORDER BY Client_ID  DESC LIMIT 1 ";
    $checkResult = mysqli_query($link, $checkID);

    $row = mysqli_fetch_array($checkResult);
    $lastID = $row['Client_ID'];

    $newID = substr($lastID, -4); //SLICED Member ID
    $plusID = $newID + 1;
    $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);


    $finalID = "Client-".$formatID;
    
?>

<input type="text" id="foodid" name="user_ID" style="display: none;" class="form-control form-control-lg form-control-a" required readonly value="<?php echo $finalID; ?>">