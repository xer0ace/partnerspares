<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
      	<th>Item ID</th>
        <th>Food Item ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Availability</th>
        <th>Menu Section</th>
        <th>Remove</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT Menu_ID, tbl_menu_list.Food_Item_ID, Name, Price, Availability, Menu_Number FROM tbl_menu_list INNER JOIN tbl_food_item_list ON tbl_menu_list.Food_Item_ID = tbl_food_item_list.Food_Item_ID;");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Menu_ID']."</td>
						<td>".$fetch['Food_Item_ID']."</td>
						<td>".$fetch['Name']."</td>
						<td>".$fetch['Price']."</td>
						<td>".$fetch['Availability']."</td>
						<td>".$fetch['Menu_Number']."</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['Menu_ID']."'>
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