<?php
require_once '../include/config.php';
  
    $Client_ID = $_POST['Client_ID'];
  
    $query = $link->query("SELECT Pending_Orders_ID, tbl_pending_orders.Client_ID, Items, Item_Quantity, Total, Date_Added, Time_Added, proof_picture, Payment_Status, Order_Status, Dine_Method, Table_Number, Last_Name, Last_Name, First_Name, Contact, Municipality_City, Barangay, Street_Purok, picture FROM `tbl_pending_orders` INNER JOIN tbl_clients ON tbl_pending_orders.Client_ID = tbl_clients.Client_ID WHERE tbl_pending_orders.Client_ID = '$Client_ID' AND Order_Status = 'Preparing'");

    while($fetch = $query->fetch_array()){

      $Dine_Method = $fetch['Dine_Method'];
      $Table_Number = $fetch['Table_Number'];
      $items = $fetch['Items'];
      $date = $fetch['Date_Added'];
      $time = $fetch['Time_Added'];
      $quantity = $fetch['Item_Quantity'];
      $total = $fetch['Total'];
      $payment_stat = $fetch['Payment_Status'];
      $status = $fetch['Order_Status'];

      echo "
      <tr>
            <td>

              
            <div class='panel panel-default invoice' id='invoice'>
      <div class='panel-body'>
      <div class='invoice-ribbon'><div class='ribbon-inner'>".$payment_stat."</div></div>
        <div class='row'>

        <div class='col-sm-6 top-left'>
          <img src=
                    'https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0'
                        class='".$fetch['Pending_Orders_ID']." img-thumbnail img-responsive qr-code' />
        </div>

        <div class='col-sm-6 top-right'>
             <p><sub><i>".$fetch['Pending_Orders_ID']."</i></sub></p>  
             <span><p>".$date." | ".$time."</p></span>
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
                      <div class='dropdown-image'>
                        <img src='../../uploaded-files/payments/".$fetch['proof_picture']."' alt='".$fetch['proof_picture']."' width='100' height='100'>
                          <div class='dropdown-content-image'>
                            <img src='../../uploaded-files/payments/".$fetch['proof_picture']."' alt='".$fetch['proof_picture']."' width='300'>
                            <div class='desc-image'>Proof of Payment</div>
                          </div>
                      </div>
          </div>

          <div class='col-xs-4 text-right payment-details'>
          <span class='lead marginbottom payment-info' style='background-color:#2980b9;color:#ffffff;'>".$status."</span>
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


      </div>
    </div>

            </td>
      </tr>

            <script>
              function htmlEncode(value) {
              return $('<div/>').text(value)
                .html();
              }

              var qrinfo = 'Order ID: ".$fetch['Pending_Orders_ID']." | ".$fetch['First_Name']." ".$fetch['Last_Name']." | ".$fetch['Contact']." |  ".$fetch['Street_Purok'].", ".$fetch['Barangay'].", ".$fetch['Municipality_City']." |  ".$Dine_Method." |  ".$Table_Number." | ".$date." | ".$time." | ".$quantity." - Item(s) | ₱ ".$total." | ".$payment_stat." | ".$status."';

               $(document).ready(function(){
                DisplayQR();
                  
                   function DisplayQR() {

                    let finalURL =
                    'https://chart.googleapis.com/chart?cht=qr&chl=' +
                    htmlEncode(qrinfo) +
                    '&chs=160x160&chld=L|0'

                    // Replace the src of the image with
                    // the QR code image
                    $('.".$fetch['Pending_Orders_ID']."').attr('src', finalURL);
                  };
              });
            </script>
      ";


    }
?>                       
        
               

