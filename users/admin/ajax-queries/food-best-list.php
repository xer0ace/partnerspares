<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
        <th>Food Item ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Availability</th>
        <th>Action</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	
		$category = $_POST['category'];
		$query = $link->query("SELECT * FROM tbl_food_item_list WHERE Category_ID = '$category'");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Food_Item_ID']."</td>
						<td>".$fetch['Name']."</td>
						<td>".$fetch['Price']."</td>
						<td>".$fetch['Availability']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['Food_Item_ID']."'>
									<span class='fa fa-pencil-square-o'></span> View</button>
						</td>
						
					</tr>
				";
			
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