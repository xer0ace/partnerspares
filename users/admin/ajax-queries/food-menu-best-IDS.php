<?php
require_once '../include/config.php';

  $category = $_POST['category'];
  $get_FoodID = "SELECT * FROM tbl_food_item_list WHERE Category_ID = '$category'";
  $result = $link->query($get_FoodID);
  $option = "";

  if($result->num_rows > 0){
    while ( $row = $result->fetch_assoc()) {
      $Food_Item_ID = ucwords($row['Food_Item_ID']);
      $Name = ucwords($row['Name']);
        $option .= "<option value='$Food_Item_ID'>$Name</option>";
    }
  }





?>
												                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-cutlery icon"></i>
                                                        <select type="text" class="form-control" id="foodID" required name="Food_Item_ID">
                                                        	<option value="Foods" selected disabled>Foods *</option>
                                                          <?php echo $option; ?>
                         								                 </select>
                                                    </div>
                                                </div>

                                                  
                                                