<?php
require_once '../include/config.php';
    $checkID = "SELECT * FROM `tbl_admin` ORDER BY id  DESC LIMIT 1 ";
    $checkResult = mysqli_query($link, $checkID);

    $row = mysqli_fetch_array($checkResult);
    $lastID = $row['id'];

    $newID = substr($lastID, -3); //SLICED Member ID
    $plusID = $newID + 1;
    $formatID = str_pad($plusID, 3, '0', STR_PAD_LEFT);


    $finalID = "Admin-".$formatID;
    
?>

<input type="text" id="idnumber" style="display: none;" class="form-control form-control-lg form-control-a" required readonly value="<?php echo $finalID; ?>">