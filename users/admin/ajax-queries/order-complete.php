<?php
  require_once '../include/config.php';
  
  $id = $_POST['Pending_Orders_ID'];
  
  $link->query("UPDATE `tbl_pending_orders` SET `Order_Status` = 'Completed', `Payment_Status` = 'Paid' WHERE `tbl_pending_orders`.`Pending_Orders_ID` = '$id'");
?>