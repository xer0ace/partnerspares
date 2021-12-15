<table id="table_id" class="display table orders" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
      	<th>Contact Tracing ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Date</th>
        <th>Time</th>
        <th>Fever</th>
        <th>Colds</th>
        <th>Body Pain</th>
        <th>Sore Throat</th>
        <th>Socialize with Covid Patient</th>
      	<th>Took cared of Covid Patient</th>
      	<th>Travelled outside Ph</th>
      	<th>Travelled outside Province</th>
        <th>View</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT `Contact_Tracing_ID`, `tbl_clients`.`Client_ID`, `Date`, `Time`, `Fever`, `Colds`, `Pain`, `Throat`, `Socialized`, `Patient`, `Traveled`, `Traveled_Local`, Last_Name, First_Name, Contact, Municipality_City, Barangay, Street_Purok, picture FROM tbl_contact_tracing INNER JOIN tbl_clients ON tbl_contact_tracing.Client_ID = tbl_clients.Client_ID");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Contact_Tracing_ID']."</td>
						<td>".$fetch['Last_Name'].", ".$fetch['First_Name']."</td>
						<td>".$fetch['Street_Purok'].", ".$fetch['Barangay'].", ".$fetch['Municipality_City']."</td>
						<td>".$fetch['Date']."</td>
						<td>".$fetch['Time']."</td>
						<td>".$fetch['Fever']."</td>
						<td>".$fetch['Colds']."</td>
						<td>".$fetch['Pain']."</td>
						<td>".$fetch['Throat']."</td>
						<td>".$fetch['Socialized']."</td>
						<td>".$fetch['Patient']."</td>
						<td>".$fetch['Traveled']."</td>
						<td>".$fetch['Traveled_Local']."</td>
						
						<td>							
							<button class='btn btn-info edit' name='".$fetch['Contact_Tracing_ID']."'>
									<span class='fa fa-pencil-square-o'></span> View</button>
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