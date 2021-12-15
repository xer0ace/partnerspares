<?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT Name, Price, Availability, picture FROM tbl_best_seller INNER JOIN tbl_food_item_list ON tbl_best_seller.Food_Item_ID = tbl_food_item_list.Food_Item_ID LIMIT 1;");

		while($fetch = $query->fetch_array()){
			echo
				"
				<style>
				.main_features_contentbest{
					background:url(../../uploaded-files/food-items/".$fetch['picture'].") right center no-repeat;
					padding:40px;
					overflow:hidden;
				}
				</style>

							<div class='main_features_contentbest text-left'>
                                        <div class='col-md-6'>
                                            <div class='single_features_text'>
                                               
                                                <h4>Best Seller</h4>
                                                <h3>".$fetch['Name']."</h3>

                                                <p>Price: ₱ ".$fetch['Price']." Only!</p>
                                                <p style='width: 900px;'>Available: ".$fetch['Availability']."</p>                     
                                             </div>
                                        </div>
                                    </div>
				";
			
		}
	}
	
?> 