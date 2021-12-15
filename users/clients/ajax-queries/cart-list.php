<?php
require_once '../include/config.php';
  if(ISSET($_POST['res'])){

    $Client_ID = $_POST['Client_ID'];

    $getlist = "SELECT Cart_ID, Name, Price, Availability, picture FROM `tbl_cart` INNER JOIN tbl_food_item_list ON tbl_cart.Food_Item_ID = tbl_food_item_list.Food_Item_ID WHERE Client_ID = '$Client_ID' AND Status = 'To Pay' AND Discount_Status = 'No'";
    $list_result = mysqli_query($link, $getlist);

    $getlistDiscounts = "SELECT Cart_ID, Name, Price, Availability, picture, Percent, Price - (Price * Percent) AS Discount_Sum FROM `tbl_cart` INNER JOIN tbl_food_item_list ON tbl_cart.Food_Item_ID = tbl_food_item_list.Food_Item_ID INNER JOIN tbl_discounts ON tbl_discounts.Food_Item_ID = tbl_food_item_list.Food_Item_ID WHERE Client_ID = '$Client_ID' AND Status = 'To Pay' AND Discount_Status = 'Yes'";
    $list_resultDiscounts = mysqli_query($link, $getlistDiscounts);

        if (mysqli_num_rows($list_result) == 0 && mysqli_num_rows($list_resultDiscounts) == 0) {

           echo "<script> document.getElementById('selection-method').disabled = true;</script>";

        }
        else
        {
           while($fetchDiscounts = $list_resultDiscounts->fetch_array()){
                    $Prices = $fetchDiscounts['Discount_Sum'];
                    echo "
                        <div class='basket-product'>
                          <div class='item'>
                            <div class='product-image'>
                            Discounted <del>₱ ".$fetchDiscounts['Price']."</del> - ".$fetchDiscounts['Percent']." %
                              <img  src='../../uploaded-files/food-items/".$fetchDiscounts['picture']."'>
                            </div>
                            <div class='product-detail'>
                              <h6>
                                <strong>
                                    <span class='item-quantity'>&nbsp;&nbsp;&nbsp;&nbsp;1</span>
                                    <span> x - </span>
                                    <span class='food-name'>".$fetchDiscounts['Name']."</span>
                                  </strong>
                              </h6>
                            </div>
                          </div>
                          <div class='price'>".$Prices."</div>
                          <div class='quantity'>
                            <input type='number' value='1' min='1' class='quantity-field'>
                          </div>
                            <input class='subtotal-row hidden-inputs food-quantity' type='text' name='food-quantity[]' value='1x ".$fetchDiscounts['Name']." | ₱".$Prices." x 1 = ₱".$Prices."'>
                          <div class='subtotal'>".$Prices."</div>
                                                        
                          <div class='remove'>
                            <button class='remove-item btn btn-primary' name='".$fetchDiscounts['Cart_ID']."'>Remove</button>
                          </div>
                        </div>
                    ";
                  }

            while($fetch = $list_result->fetch_array()){
                    $Price = $fetch['Price'];
                    echo "
                        <div class='basket-product'>
                          <div class='item'>
                            <div class='product-image'>
                              <img  src='../../uploaded-files/food-items/".$fetch['picture']."'>
                            </div>
                            <div class='product-detail'>
                              <h6>
                                <strong>
                                    <span class='item-quantity'>&nbsp;&nbsp;&nbsp;&nbsp;1</span>
                                    <span> x - </span>
                                    <span class='food-name'>".$fetch['Name']."</span>
                                  </strong>
                              </h6>
                            </div>
                          </div>
                          <div class='price'>".$Price."</div>
                          <div class='quantity'>
                            <input type='number' value='1' min='1' class='quantity-field'>
                          </div>
                            <input class='subtotal-row hidden-inputs food-quantity' type='text' name='food-quantity[]' value='1x ".$fetch['Name']." | ₱".$Price." x 1 = ₱".$Price."'>
                          <div class='subtotal'>".$Price."</div>
                                                        
                          <div class='remove'>
                            <button class='remove-item btn btn-primary' name='".$fetch['Cart_ID']."'>Remove</button>
                          </div>
                        </div>
                    ";
                  }




        }


                  


  }
?>                       
<script type="text/javascript">
  


/* Set values + misc */
var fadeTime = 300;

/* Assign actions */
$('.quantity input').change(function() {
  updateQuantity(this);
});

$('.remove button').click(function() {
  removeItem(this);
});

$(document).ready(function() {
  updateSumItems();
});


/* Recalculate cart */
function recalculateCart(onlyTotal) {
  var subtotal = 0;

  /* Sum up row totals */
  $('.basket-product').each(function() {
    subtotal += parseFloat($(this).children('.subtotal').text());
  });

  /* Calculate totals */
  var total = subtotal;


  /*If switch for update only total, update only total display*/
  if (onlyTotal) {
    /* Update total display */
    $('.total-value').fadeOut(fadeTime, function() {
      $('#basket-total').html(total.toFixed(2));
      $('.total-value').fadeIn(fadeTime);
    });
  } else {
    /* Update summary display. */
    $('.final-value').fadeOut(fadeTime, function() {
      $('#basket-subtotal').html(subtotal.toFixed(2));
      $('#input-subtotal').val(subtotal.toFixed(2));
      $('#basket-total').html(total.toFixed(2));
       $('#totalprice').val(total.toFixed(2));
      if (total == 0) {
        $('.checkout-cta').fadeOut(fadeTime);
      } else {
        $('.checkout-cta').fadeIn(fadeTime);
      }
      $('.final-value').fadeIn(fadeTime);
    });
  }
}

/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.price').text());
  
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Update line price display and recalc cart totals */
  productRow.children('.subtotal').each(function() {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });

  var testname = productRow.find('.food-name').text();

  productRow.find('.subtotal-row').val(quantity+"x - " +testname+ " | ₱" +price.toFixed(2)+ " x "+quantity+" = ₱" +linePrice);
  productRow.find('.item-quantity').text(quantity);
  updateSumItems();
}

function updateSumItems() {
  var sumItems = 0;
  $('.quantity input').each(function() {
    sumItems += parseInt($(this).val());
  });
  $('.total-items').text(sumItems);
  $('.input-total-items').val(sumItems);
}

/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
    updateSumItems();
  });
}
</script>