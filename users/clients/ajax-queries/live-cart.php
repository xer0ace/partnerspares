<?php
require_once '../include/config.php';
  if(ISSET($_POST['res'])){

    $Client_ID = $_POST['Client_ID'];
    $query = $link->query("SELECT COUNT(Cart_ID) AS NumberOfCart FROM tbl_cart WHERE Client_ID = '$Client_ID' AND Status = 'To Pay'");

    while($fetch = $query->fetch_array()){
      echo " ".$fetch['NumberOfCart']."";
    }




    
  }
?>                       