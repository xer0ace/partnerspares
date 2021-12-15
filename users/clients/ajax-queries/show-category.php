<?php
require_once '../include/config.php';


    $category_ID = $_POST['category_ID'];

    if ($category_ID == 'All') {
       $query = $link->query("SELECT Food_Item_ID, Name, tbl_food_item_list.Category_ID, Category_Name, Price, Availability, picture FROM tbl_food_item_list INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID WHERE `Availability` = 'Yes';");

        while($fetch = $query->fetch_array()){
          echo "
            <tr>
                <td>
                    <div class='containerFood'>
                      <img src='../../uploaded-files/food-items/".$fetch['picture']."' alt='Avatar'>
                      <span class='category'>".$fetch['Category_Name']."</span>
                        <div class='details-food'>
                          Name:<br>
                          Price:<br>
                          Available:
                        </div>
                        <div class='details-food'>
                          ".$fetch['Name']."<br>
                          ₱ ".$fetch['Price']."<br>
                          ".$fetch['Availability']."
                        </div>
                        <strong>95 Sold</strong>
                          <span class='time-right'>
                                    <button type='button' class='btn btn-success add_to_cart' name='".$fetch['Food_Item_ID']."'> 
                                        <span class='fa fa-cart-plus' aria-hidden='true'></span> Add to Cart 
                                    </button>
                          </span>
                          <span class='time-right'>
                              <button type='button' class='btn btn-primary buy-now' name='".$fetch['Food_Item_ID']."'> 
                                        <span class='fa fa-money' aria-hidden='true'></span> Buy Now
                                    </button>
                       
                                    
                          </span>
                    </div>
                </td>
            </tr> 
          ";
        }

    }
    else
    {



        $query = $link->query("SELECT Food_Item_ID, Name, tbl_food_item_list.Category_ID, Category_Name, Price, Availability, picture FROM tbl_food_item_list INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID WHERE tbl_food_item_list.Category_ID = '$category_ID' AND `Availability` = 'Yes';");

        while($fetch = $query->fetch_array()){
          echo "
            <tr>
                <td>
                    <div class='containerFood'>
                      <img src='../../uploaded-files/food-items/".$fetch['picture']."' alt='Avatar'>
                       <span class='category'>".$fetch['Category_Name']."</span>
                        <div class='details-food'>
                          Name:<br>
                          Price:<br>
                          Available:
                        </div>
                        <div class='details-food'>
                          ".$fetch['Name']."<br>
                          ₱ ".$fetch['Price']."<br>
                          ".$fetch['Availability']."
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
                       

                          </span>
                    </div>
                </td>
            </tr> 
          ";
        }
  }
?>                       