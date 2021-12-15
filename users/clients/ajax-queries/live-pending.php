<?php
require_once '../include/config.php';
  if(ISSET($_POST['res'])){

    $Client_ID = $_POST['Client_ID'];
    $query = $link->query("SELECT COUNT(Pending_Orders_ID) AS Pending FROM tbl_pending_orders WHERE Client_ID = '$Client_ID' AND Order_Status = 'Pending'");

    while($fetch = $query->fetch_array()){
      echo " ".$fetch['Pending']."";
    }
    
  }
?>                       