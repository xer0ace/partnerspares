<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
        <th>ID Number</th>
        <th>Username</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT * FROM tbl_admin WHERE id NOT IN ('Admin-000')");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['id']."</td>
						<td>".$fetch['Username']."</td>
						<td>".$fetch['Last_Name']."</td>
						<td>".$fetch['First_Name']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['id']."'>
									<span class='fa fa-pencil-square-o'></span> Edit</button>
						</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['id']."'>
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