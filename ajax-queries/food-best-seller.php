<?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT Name, Price, Availability, picture, Category_Name FROM tbl_best_seller INNER JOIN tbl_food_item_list ON tbl_best_seller.Food_Item_ID = tbl_food_item_list.Food_Item_ID INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID WHERE Discount_Status ='No'");

		$queryDiscount = $link->query("SELECT Name, Price, Availability, picture, Category_Name, Percent, Price - (Price * Percent) AS Discount_Sum FROM tbl_best_seller INNER JOIN tbl_food_item_list ON tbl_best_seller.Food_Item_ID = tbl_food_item_list.Food_Item_ID INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID INNER JOIN tbl_discounts ON tbl_food_item_list.Food_Item_ID = tbl_discounts.Food_Item_ID WHERE Discount_Status ='Yes'");

		while($fetchDiscount = $queryDiscount->fetch_array()){
			echo
				"
							<div class='main_features_contentbest text-left'>
                                        <div class='col-md-6'>
                                            <div class='single_features_text'>
                                               
                                                <h4>Best Seller <br> ".$fetchDiscount['Category_Name']."</h4>
                                                 <img src='uploaded-files/food-items/".$fetchDiscount['picture']."' class='best-seller'>       
                                                <h4>".$fetchDiscount['Name']."</h4>

                                                <p>Price: <del>₱ ".$fetchDiscount['Discount_Sum']."</del> -".$fetchDiscount['Percent']."%  - ₱ ".$fetchDiscount['Discount_Sum']." Only!</p>
                                                <p style='width: 900px;'>Available: ".$fetchDiscount['Availability']."</p> 

                                             </div>

                                        </div>
                                        
                                    </div>
                                    
				";
			
		}

		while($fetch = $query->fetch_array()){
			echo
				"
							<div class='main_features_contentbest text-left'>
                                        <div class='col-md-6'>
                                            <div class='single_features_text'>
                                               
                                                <h4>Best Seller <br> ".$fetch['Category_Name']."</h4>
                                                 <img src='uploaded-files/food-items/".$fetch['picture']."' class='best-seller'>       
                                                <h4>".$fetch['Name']."</h4>

                                                <p>Price: ₱ ".$fetch['Price']." Only!</p>
                                                <p style='width: 900px;'>Available: ".$fetch['Availability']."</p> 

                                             </div>

                                        </div>
                                        
                                    </div>
                                    
				";
			
		}
	}
	
?> 