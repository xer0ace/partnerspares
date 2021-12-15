<?php
require_once '../include/config.php';

  $get_FoodID = "SELECT * FROM tbl_category";
  $result = $link->query($get_FoodID);
  $option = "";

  if($result->num_rows > 0){
    while ( $row = $result->fetch_assoc()) {
      $Category_ID = ucwords($row['Category_ID']);
      $Name = ucwords($row['Category_Name']);
        $option .= "<option value='$Category_ID'>$Name</option>";
    }
  }



?>

                                                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-money icon"></i>
                                                        <select type="text" class="form-control" required id="category" name="Category">
                                                            <option value="Category" selected disabled>Category *</option>
                                                             <?php echo $option; ?>
                                                        </select>
                                                    </div>
                                                </div>
<script type="text/javascript">
$(document).ready(function(){


  $("#category").on('change', function(){
        var category = $("#category").val();
          $.ajax({
            url : "ajax-queries/food-menu-best-IDS.php",
            type:"POST",
            cache:false,
            data:{
              category: category},
            success:function(data){
              $("#selects").html(data);
            
            }
          });
       
      });
});
</script>	             