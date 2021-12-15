<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Availability</th>
        <th>View</th>
        <th>Remove</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT tbl_food_item_list.Food_Item_ID, Name, Category_Name, Price, Availability FROM tbl_best_seller INNER JOIN tbl_food_item_list ON tbl_best_seller.Food_Item_ID = tbl_food_item_list.Food_Item_ID INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Name']."</td>
						<td>".$fetch['Category_Name']."</td>
						<td>".$fetch['Price']."</td>
						<td>".$fetch['Availability']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['Food_Item_ID']."'>
									<span class='fa fa-pencil-square-o'></span> View</button>
						</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['Food_Item_ID']."'>
								 	<span class='fa fa-trash-o'></span> Remove</button>
						</td>
						
					</tr>
				";
			
		}
	}
	
?> 
	</tbody>
</table>
<script type="text/javascript">
   $(document).ready(function()
     {
       $('#table_id').DataTable();
     }
   );
 </script>