<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
        <th>Category ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT * FROM tbl_category");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Category_ID']."</td>
						<td>".$fetch['Category_Name']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['Category_ID']."'>
									<span class='fa fa-pencil-square-o'></span> Edit</button>
						</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['Category_ID']."'>
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