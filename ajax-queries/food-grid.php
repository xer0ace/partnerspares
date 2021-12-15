<?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT Name, Price, Availability, picture FROM tbl_food_grid_display INNER JOIN tbl_food_item_list ON tbl_food_grid_display.Food_Item_ID = tbl_food_item_list.Food_Item_ID;");

		while($fetch = $query->fetch_array()){
			echo
				"
					<div class='col-md-3 col-sm-4 col-xs-6 single_portfolio_text'>
    					<img src='uploaded-files/food-items/".$fetch['picture']."' alt='' />
        					<div class='portfolio_images_overlay text-center'>
            					<h6>".$fetch['Name']."</h6>
            						<p class='product_price'>₱".$fetch['Price']."</p>
            						<p style='color:#ffffff;'> Availability: ".$fetch['Availability']."</p>
        							</div>
							</div>
				";
			
		}
	}
	
?> 