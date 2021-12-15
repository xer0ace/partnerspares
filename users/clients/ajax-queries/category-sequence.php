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

                                                
                                                    <div class="input-container">
                                                        <i class="fa fa-money icon"></i>
                                                        <select type="text" class="form-control" required id="category" name="Category">
                                                            <option value="All" selected>Category *</option>
                                                             <?php echo $option; ?>
                                                        </select>
                                                    </div>
                                               

<script type="text/javascript">
$(document).ready(function(){

 $("#category").on('change', function(){
        var category_ID = $("#category").val();

          $.ajax({
            url : "ajax-queries/show-category.php",
            type:"POST",
            cache:false,
            data:{category_ID: category_ID},
            success:function(data){
             
              $("#food-table").html(data);
            
            }
          });
       
      });




});
</script>