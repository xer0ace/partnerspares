<?php
require_once '../include/config.php';
  
    $Client_ID = $_POST['Client_ID'];
  
    $query = $link->query("SELECT To_Pay_ID, tbl_to_pay.Client_ID, To_Pay_Items, Item_Quantity, Sub_Total, Date_Added, Dine_Method, Table_Number, Last_Name, First_Name, Contact, Municipality_City, Barangay, Street_Purok, picture FROM `tbl_to_pay` INNER JOIN tbl_clients ON tbl_to_pay.Client_ID = tbl_clients.Client_ID  WHERE tbl_to_pay.Client_ID = '$Client_ID'");

    while($fetch = $query->fetch_array()){

      $Dine_Method = $fetch['Dine_Method'];
      $Table_Number = $fetch['Table_Number'];
      $items = $fetch['To_Pay_Items'];
      $date = $fetch['Date_Added'];
      $quantity = $fetch['Item_Quantity'];
      $total = $fetch['Sub_Total'];

      echo "
       
      <form action='#' method='POST' enctype='multipart/form-data'>

      <div class='panel panel-default invoice' id='invoice'>
      <div class='panel-body'>
        <div class='row'>
        <div class='col-sm-6 top-left'>
        
        </div>

        <div class='col-sm-6 top-right'>
             <p><sub><i>".$fetch['To_Pay_ID']."</i></sub></p>  
             <span><p>".$date."</p></span>
          </div>

      </div>
      <hr>
      <div class='row'>

        <div class='col-xs-4 from'>
          <p><i class='far fa-user'></i>  ".$fetch['First_Name']." ".$fetch['Last_Name']."</p>
          <p><i class='fas fa-phone-alt'></i>  ".$fetch['Contact']."</p>
          <p><i class='fas fa-map-marked-alt'></i>  ".$fetch['Street_Purok'].", ".$fetch['Barangay'].", ".$fetch['Municipality_City']."</p>
        </div>
        <div class='col-xs-4 to'>
            <label>Insert a picture or screenshot of Proof of Payment</label>
            <input type='file' name='proof_payment' accept='image/png, image/jpeg' >
             <br><sub>NOTE: Image must be less than 10 MB (Megabytes) to upload.</sub>
        </div>
          <div class='col-xs-4 text-right payment-details'>
          <p>".$Dine_Method."</p>
          <p>".$Table_Number."</p>
          </div>
      </div>

      <div class='row table-row'>
        <table class='table table-striped'>
              <tr>
                <td style='width:50%'><strong>Item(s)</strong></td>
                <td class='text-right' style='width:15%'><strong>Quantity</strong></td>
                <td class='text-right' style='width:15%'><strong>Total Price</strong></td>
              </tr>
              <tr>
                <td>".$items."</td>
                <td class='text-right'>".$quantity."</td>
                <td class='text-right'>₱ ".$total."</td>
              </tr>
          </table>

      </div>
                        <input type='text' class='pay-details' style='display: none;' name='list_items' value='".$items."' readonly>
                        <input type='text' class='pending-details' name='dine_type' value='".$Dine_Method."' readonly>
                        <input type='text' class='pending-details' name='table_seated' value='".$Table_Number."' readonly>
                        <input type='text' class='pending-details' name='date_added' value='".$date."' readonly>
                        <input type='text' class='pending-details' name='quantity' value='".$quantity."' readonly>
                        <input type='text' class='pending-details' name='total' value='".$total."' readonly>

      <div class='row'>
      <div class='col-xs-6 margintop'>

        <button type='submit'  class='btn btn-success approve' name='pay_now'>
          <i class='fas fa-hand-holding-usd'></i> Pay Now 
        </button>

        <button type='submit' class='btn btn-danger cancel' name='cancel_order'>
          <i class='fas fa-window-close'></i> Cancel
        </button>
      </div>

      </div>
      </div>
    </div>
    </form>
              
      ";


    }
?>                       
        
               

