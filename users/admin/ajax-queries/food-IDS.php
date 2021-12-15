<?php
require_once '../include/config.php';

  $get_FoodID = "SELECT * FROM tbl_food_item_list";
  $result = $link->query($get_FoodID);
  $option = "";

  if($result->num_rows > 0){
    while ( $row = $result->fetch_assoc()) {
      $Food_Item_ID = ucwords($row['Food_Item_ID']);
      $Name = ucwords($row['Name']);
        $option .= "<option value='$Food_Item_ID'>$Name</option>";
    }
  }

  $get_MenuID = "SELECT * FROM tbl_food_grid_display";
  $result2 = $link->query($get_MenuID);
  $option1 = "";

  if($result2->num_rows > 0){
    while ( $row = $result2->fetch_assoc()) {
      $Menu_ID = ucwords($row['Menu_ID']);
        $option1 .= "<option value='$Menu_ID'>$Menu_ID</option>";
    }
  }



?>
												                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-cutlery icon"></i>
                                                        <select type="text" class="form-control" id="foodID" required name="Food_Item_ID">
                                                        	<option value="Foods" selected>Foods *</option>
                                                          <?php echo $option; ?>
                         								</select>
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-archive icon"></i>
                                                        <select type="text" class="form-control" id="menuID" required name="Menu_ID">
                                                            <option value="Menu Number" selected>Menu Number *</option>
                                                            <?php echo $option1; ?>
                                                        </select>
                                                    </div>
                                                </div>