<table id="table_id" class="display table orders" style="cursor: pointer;">
    <thead>
      <tr style="background-color: #2ecc71; color: #fff">
      	<th>Order ID</th>
        <th>Items</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Payment</th>
        <th>Order Status</th>
        <th>Dine Method</th>
        <th>Table Number</th>
        <th>Ordered by</th>
        <th>Date</th>
      	<th>Time</th>
      	<th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
     <tbody style="color: #000000">
     <?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT Pending_Orders_ID, tbl_pending_orders.Client_ID, Items, Item_Quantity, Total, Date_Added, Time_Added, proof_picture, Payment_Status, Order_Status, Dine_Method, Table_Number, Last_Name, First_Name, Contact, Municipality_City, Barangay, Street_Purok, picture FROM `tbl_pending_orders` INNER JOIN tbl_clients ON tbl_pending_orders.Client_ID = tbl_clients.Client_ID");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td>".$fetch['Pending_Orders_ID']."</td>
						<td>".$fetch['Items']."</td>
						<td>".$fetch['Item_Quantity']."</td>
						<td>".$fetch['Total']."</td>
						<td>".$fetch['Payment_Status']."</td>
						<td>".$fetch['Order_Status']."</td>
						<td>".$fetch['Dine_Method']."</td>
						<td>".$fetch['Table_Number']."</td>
						<td>".$fetch['Last_Name'].", ".$fetch['First_Name']."</td>
						<td>".$fetch['Date_Added']."</td>
						<td>".$fetch['Time_Added']."</td>
						<td>".$fetch['Street_Purok'].", ".$fetch['Barangay'].", ".$fetch['Municipality_City']."</td>
						<td>							
							<button class='btn btn-warning edit' name='".$fetch['Pending_Orders_ID']."'>
									<span class='fa fa-pencil-square-o'></span> Edit</button>
						</td>
						<td>
								 <button class='btn btn-danger delete' name='".$fetch['Pending_Orders_ID']."'>
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