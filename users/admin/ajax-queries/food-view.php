<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Serving</th>
        <th>Availability</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT Food_Item_ID, Name, Category_Name, Price, Availability, picture, Serving FROM tbl_food_item_list INNER JOIN tbl_category ON tbl_food_item_list.Category_ID = tbl_category.Category_ID");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						
						<td>".$fetch['Name']."</td>
						<td>".$fetch['Category_Name']."</td>
						<td>".$fetch['Price']."</td>
						<td>".$fetch['Serving']."</td>
						<td>".$fetch['Availability']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['Food_Item_ID']."'>
									<span class='fa fa-pencil-square-o'></span> Edit</button>
						</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['Food_Item_ID']."'>
								 	<span class='fa fa-trash-o'></span> Delete</button>
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