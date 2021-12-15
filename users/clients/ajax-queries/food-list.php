<?php
require_once '../include/config.php';
  if(ISSET($_POST['res'])){

     $queryDiscounts = $link->query("SELECT tbl_food_item_list.Food_Item_ID, Name, Category_Name, Price, Availability, Percent, Price - (Price * Percent) AS Discount_Sum, picture, Serving FROM tbl_discounts INNER JOIN tbl_food_item_list ON tbl_discounts.Food_Item_ID = tbl_food_item_list.Food_Item_ID INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID;");

    while($fetchDiscounts = $queryDiscounts->fetch_array()){

      echo "
                <tr>
                    <td>

                        <div class='containerFood'>
                          <img src='../../uploaded-files/food-items/".$fetchDiscounts['picture']."' alt='Avatar'>
                          <span class='category'>Discounted<br>".$fetchDiscounts['Category_Name']."</span>
                            <div class='details-food'>
                              Name:<br>
                              Price:<br>
                              Available:<br>
                              Serving:
                            </div>
                            <div class='details-food'>
                              ".$fetchDiscounts['Name']."<br>
                              <del>₱ ".$fetchDiscounts['Price']."</del> - ₱ ".$fetchDiscounts['Discount_Sum']." <br>
                              ".$fetchDiscounts['Availability']."<br>
                               ".$fetchDiscounts['Serving']."
                            </div>
                            
                              <span class='time-right'>
                                        <button type='button' class='btn btn-success add_to_cart' name='".$fetchDiscounts['Food_Item_ID']."'> 
                                            <i class='far fa-list-alt'></i> Add to List 
                                        </button>
                              </span>
                              <span class='time-right'>
                                  <button type='button' class='btn btn-primary buy-now' name='".$fetchDiscounts['Food_Item_ID']."'> 
                                            <span class='fa fa-money' aria-hidden='true'></span> Buy Now
                                        </button>
                              </span>
                        </div>
                    </td>
                </tr> 

              ";

    }


    $query = $link->query("SELECT Food_Item_ID, Name, Category_Name, Price, Availability, picture, Serving FROM tbl_food_item_list INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID WHERE `Availability` = 'Yes' AND Discount_Status = 'No' ");

    while($fetch = $query->fetch_array()){

     $foodid = $fetch['Food_Item_ID'];

      $querysold = $link->query("SELECT IFNULL(COUNT(*), 0) AS Sold FROM `tbl_cart` WHERE `Status` = 'Sold' AND `Food_Item_ID` = '$foodid'");

       while($fetchsold = $querysold->fetch_array()){

              echo "
                <tr>
                    <td>

                        <div class='containerFood'>
                          <img src='../../uploaded-files/food-items/".$fetch['picture']."' alt='Avatar'>
                          <span class='category'>".$fetch['Category_Name']."</span>
                            <div class='details-food'>
                              Name:<br>
                              Price:<br>
                              Available:<br>
                              Serving:
                            </div>
                            <div class='details-food'>
                              ".$fetch['Name']."<br>
                              ₱ ".$fetch['Price']."<br>
                              ".$fetch['Availability']."<br>
                               ".$fetch['Serving']."
                            </div>
                            
                              <span class='time-right'>
                                        <button type='button' class='btn btn-success add_to_cart' name='".$fetch['Food_Item_ID']."'> 
                                            <span class='fa fa-cart-plus' aria-hidden='true'></span> Add to Cart 
                                        </button>
                              </span>
                              <span class='time-right'>
                                  <button type='button' class='btn btn-primary buy-now' name='".$fetch['Food_Item_ID']."'> 
                                            <span class='fa fa-money' aria-hidden='true'></span> Buy Now
                                        </button>
                                  <strong>".$fetchsold['Sold']." Sold</strong>
                              </span>
                        </div>
                    </td>
                </tr> 

              ";

       }
    }

  }
?>                       