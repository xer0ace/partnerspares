<?php
require_once '../include/config.php';
  if(ISSET($_POST['res'])){

    $Client_ID = $_POST['Client_ID'];
    $query = $link->query("SELECT COUNT(To_Pay_ID) AS To_Pay FROM tbl_to_pay WHERE Client_ID = '$Client_ID'");

    while($fetch = $query->fetch_array()){
      echo " ".$fetch['To_Pay']."";
    }
    
  }
?>                       