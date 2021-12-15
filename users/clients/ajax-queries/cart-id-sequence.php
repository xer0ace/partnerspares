<?php
require_once '../include/config.php';
    

    $finalID = "";
    $wholeYear = date("Y");
    $year = date("y");
    $month = date("m");
    $day = date("d");
    $date = $year."-".$month."-".$day;
    $dateQuery = $wholeYear."-".$month."-".$day;

    $checkID = "SELECT * FROM `tbl_cart` WHERE Date_Added = '$dateQuery' ORDER BY Cart_ID  DESC LIMIT 1 ";
    $checkResult = mysqli_query($link, $checkID);

    if (mysqli_num_rows($checkResult) == 0) {

       $finalID = "Cart-". $date."-0001";
    }
    else
    {
    
        $row = mysqli_fetch_array($checkResult);
        $lastID = $row['Cart_ID'];

        $newID = substr($lastID, -4); //SLICED Member ID
        $plusID = $newID + 1;
        $formatID = str_pad($plusID, 4, '0', STR_PAD_LEFT);

        

        $finalID = "Cart-". $date."-".$formatID;
    }
    
?>

<input type="text" id="cartID" style="display: none;" class="form-control form-control-lg form-control-a" required readonly value="<?php echo $finalID; ?>">