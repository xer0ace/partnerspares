<?php
	require_once '../include/config.php';
	
	if(ISSET($_POST['contactid'])){
		$contactid = $_POST['contactid'];
		
		$query = $link->query("SELECT `Contact_Tracing_ID`, `tbl_clients`.`Client_ID`, `Date`, `Time`, `Fever`, `Colds`, `Pain`, `Throat`, `Socialized`, `Patient`, `Traveled`, `Traveled_Local`, Last_Name, First_Name, Contact, Municipality_City, Barangay, Street_Purok, picture FROM tbl_contact_tracing INNER JOIN tbl_clients ON tbl_contact_tracing.Client_ID = tbl_clients.Client_ID WHERE Contact_Tracing_ID = '$contactid'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'fname' => $fetch['First_Name'],
			'lname' => $fetch['Last_Name'],
			'street' => $fetch['Street_Purok'],
			'barangay' => $fetch['Barangay'],
			'municipality' => $fetch['Municipality_City'],
			'contact' => $fetch['Contact'],
			'Date' => $fetch['Date'],
			'Time' => $fetch['Time'],

			'Fever' => $fetch['Fever'],
			'Colds' => $fetch['Colds'],
			'Pain' => $fetch['Pain'],
			'Throat' => $fetch['Throat'],
			'Socialized' => $fetch['Socialized'],
			'Patient' => $fetch['Patient'],
			'Traveled' => $fetch['Traveled'],
			'Traveled_Local' => $fetch['Traveled_Local'],

			'picturePic' => $fetch['picture']
		);
		
		echo json_encode($array);
	}
?>