<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['foodid'])){
		$id = $_POST['foodid'];
		
		$query = $link->query("SELECT tbl_food_item_list.Food_Item_ID, Name, tbl_food_item_list.Category_ID, Price, Availability, Percent, Price - (Price * Percent) AS Discount_Sum FROM tbl_discounts INNER JOIN tbl_food_item_list ON tbl_discounts.Food_Item_ID = tbl_food_item_list.Food_Item_ID INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID WHERE `Food_Item_ID` ='$id'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'foodid' => $fetch['Food_Item_ID'],
			'category' => $fetch['Category_ID'],
			'percent' => $fetch['Percent'],
			'picturePic' => $fetch['picture']
		);
		
		echo json_encode($array);
	}
?>