<table id="table_id" class="display table" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
        <th>Title</th>
        <th>Edit</th>
        <th>Remove</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT * FROM tbl_health_declaration");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Topic']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['Details_ID']."'>
									<span class='fa fa-pencil-square-o'></span> Edit</button>
						</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['Topic']."'>
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