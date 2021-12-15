<?php
 require_once "include/config.php";
 include "include/main-header.php";?>
  <title>PPM - List</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="../../assets/css/cart-css.css">
      <?php
        $query = $link->query("SELECT SUM(Price) as totalPrice FROM `tbl_cart` INNER JOIN tbl_food_item_list ON tbl_cart.Food_Item_ID = tbl_food_item_list.Food_Item_ID WHERE Client_ID = '$Client_ID' AND Status = 'To Pay' AND Discount_Status = 'No'");

          //Total preview price
          $TotalPrice = "";
            while($fetch = $query->fetch_array()){
            $NormalPrice = $fetch['totalPrice'];
            }

            $queryDiscount = $link->query("SELECT SUM(Price - (Price * Percent)) as totalPrice FROM `tbl_cart` INNER JOIN tbl_food_item_list ON tbl_cart.Food_Item_ID = tbl_food_item_list.Food_Item_ID INNER JOIN tbl_discounts ON tbl_discounts.Food_Item_ID = tbl_food_item_list.Food_Item_ID WHERE Client_ID = '$Client_ID' AND Status = 'To Pay' AND Discount_Status = 'Yes'");

            while($fetch = $queryDiscount->fetch_array()){
            $DiscountPrice = $fetch['totalPrice'];
            }

             $TotalPrice = $NormalPrice + $DiscountPrice;

            //Total Orders
            $firstquery = "SELECT Name FROM `tbl_cart` INNER JOIN tbl_food_item_list ON tbl_cart.Food_Item_ID = tbl_food_item_list.Food_Item_ID WHERE Client_ID = '$Client_ID' AND Status = 'To Pay'";
            $firstresult = mysqli_query($link, $firstquery);

            //decalare empty array
            $firstarray = array();
            while ($firstrow = mysqli_fetch_assoc($firstresult)) {
              //store mysql query results in the array
               $firstarray[] = $firstrow['Name'];
            }
              //format the array to -> 'array-01', 'array-02'
              $implode = "'".implode( "', '" , $firstarray )."'";
              

      ?>
<section id="portfolio" class="portfolio">
            <div class="container" id="checkout-bttn">
                <div class="row">
                   
                        <div class="col-md-12">
                            <div class="margin-login">

                                <main>
                                    <div class="basket">
                                     
                                      <div class="basket-labels">
                                        <ul>
                                          <li class="item item-heading">Item</li>
                                          <li class="price">Price</li>
                                          <li class="quantity">Quantity</li>
                                          <li class="subtotal">Subtotal</li>
                                        </ul>
                                      </div>

                                        <div id="food-table">
                                          
                                        </div>

                                    </div>
                                    
                                    <aside>
                                      <div class="summary" >
                                        <div class="summary-total-items"><span class="total-items"></span> Item(s) in your List</div>
                                        <input type="text" id="itemquantity" value="" class="input-total-items hidden-inputs">
                                        <div class="summary-subtotal">
                                          <div class="subtotal-title">Subtotal</div>
                                          <div class="subtotal-value final-value" id="basket-subtotal"><?php echo $TotalPrice; ?></div>
                                            <input type="text" name="" value="<?php echo $TotalPrice; ?>" id="input-subtotal" class='hidden-inputs'>
                                          <textarea readonly class="order-list" id="summaryorders" onclick="textAreaAdjust(this)" style="overflow:hidden"></textarea>
                                        </div>
                                        <div class="summary-delivery">
                                          <span id="checkout-message" style="color: red;"></span>
                                          <select name="delivery-collection" class="summary-delivery-selection" id="selection-method">
                                             <option disabled selected="selected">Select Dine In or Delivery</option>
                                             <option value="Dine In">Dine In</option>
                                             <option value="Delivery">Delivery</option>
                                          </select>
                                          <br>
                                          <div id="select-dine-in"></div>
                                          <div id="select-delivery-payment"></div>
                                        </div>
                                        <div class="summary-total">
                                          <div class="total-title">Total</div>
                                          <div class="total-value final-value" id="basket-total"><?php echo $TotalPrice; ?></div>
                                          <input type="text" value="<?php echo $TotalPrice; ?>" id="totalprice" class='hidden-inputs'>
                                        </div>
                                        <div class="summary-checkout">
                                          <button id="dine-in-button" class="checkout-cta">Go to Dine In</button> 
                                          <br>
                                          <button id="delivery-button" class="checkout-cta">Go to Delivery</button>                        
                                        </div>
                                      </div>
                                    </aside>
                                  </main>
                            
                            </div>
                        </div>
                   
                </div>
            </div>
        </section>
<?php include "include/main-footer.php" ?>

<script src="scripts/user-cart-ajax.js"></script>
<script type="text/javascript">
  
function textAreaAdjust(element) {
  element.style.height = "1px";
  element.style.height = (25+element.scrollHeight)+"px";
}
</script>
