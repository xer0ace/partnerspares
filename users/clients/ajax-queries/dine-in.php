<?php
require_once '../include/config.php';
$option = "";
	$get_table = "SELECT * FROM tbl_dine_table WHERE Status = 'Available'";
	$result_table = $link->query($get_table);

	if($result_table->num_rows > 0){
                while ( $row = $result_table->fetch_assoc()) {
                  $Table_Number = ucwords($row['Table_Number']);
                  $Status = ucwords($row['Status']);
                  $Capacity = ucwords($row['Capacity']);
                    $option .= "<option value='$Table_Number'>$Table_Number - $Status | Capacity: $Capacity</option>";
                }
              }

?>
<select name="delivery-collection" class="summary-delivery-selection" id="select-table">
    <option value="Table" selected="selected">Table Number</option>
    <?php echo $option; ?>
</select>