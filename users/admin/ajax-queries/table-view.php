<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
        <th>Table Number</th>
        <th>Capacity</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Remove</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT * FROM tbl_dine_table");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Table_Number']."</td>
						<td>".$fetch['Capacity']."</td>
						<td>".$fetch['Status']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['Table_Number']."'>
									<span class='fa fa-pencil-square-o'></span> Edit</button>
						</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['Table_Number']."'>
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