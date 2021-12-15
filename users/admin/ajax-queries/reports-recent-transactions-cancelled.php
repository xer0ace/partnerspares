<?php
require_once '../include/config.php';
  	$month = $_POST['month'];
  	$newMonth = substr($month, 5);
	$newYear = substr($month, 0, -3);

    $query = $link->query("SELECT  Items, Total, Date_Added, Order_Status, Last_Name, First_Name, picture FROM `tbl_pending_orders` INNER JOIN tbl_clients ON tbl_pending_orders.Client_ID = tbl_clients.Client_ID WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-31' ORDER BY `tbl_pending_orders`.`Date_Added` DESC LIMIT 5");

    while($fetch = $query->fetch_array()){

      $items = $fetch['Items'];
      $date = $fetch['Date_Added'];
      $total = $fetch['Total'];
      $status = $fetch['Order_Status'];
      $Last_Name = $fetch['Last_Name'];
      $First_Name = $fetch['First_Name'];
      $picture = $fetch['picture'];

      echo "
      <tr>
            <td>
            	<img src='../../uploaded-files/clients/".$picture."' class='transaction-profile'>
       			<strong>".$First_Name." ".$Last_Name."</strong>
            </td>

            <td>
       			".$date."
            </td>

            <td>
       			".$items."
            </td>

            <td>
       			".$total."
            </td>

            <td>
       			".$status."
            </td>
        </tr> 
      ";


    }
?>                       
        
               

