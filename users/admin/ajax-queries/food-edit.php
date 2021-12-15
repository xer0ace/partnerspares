<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['foodid'])){
		$id = $_POST['foodid'];
		
		$query = $link->query("SELECT * FROM `tbl_food_item_list` WHERE `Food_Item_ID` ='$id'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'foodid' => $fetch['Food_Item_ID'],
			'name' => $fetch['Name'],
			'category' => $fetch['Category_ID'],
			'price' => $fetch['Price'],
			'serving' => $fetch['Serving'],
			'availability' => $fetch['Availability'],
			'picturePic' => $fetch['picture']
		);
		
		echo json_encode($array);
	}
?>