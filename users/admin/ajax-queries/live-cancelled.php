<?php
require_once '../include/config.php';
  if(ISSET($_POST['res'])){

    $query = $link->query("SELECT COUNT(Pending_Orders_ID) AS Pending FROM tbl_pending_orders WHERE Order_Status = 'Cancelled'");

    while($fetch = $query->fetch_array()){
      echo " ".$fetch['Pending']."";
    }
    
  }
?>                       