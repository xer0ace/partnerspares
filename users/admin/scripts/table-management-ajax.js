$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	
	
	$('#update').hide();
	//save information data
	$('#save').on('click', function(){
		if($('#tablenumber').val() == "" || $('#status').val() == "Status" || $('#capacity').val() == "Status")
		{
			var emptyfields = "Fields are empty";
			document.getElementById("idtxt").style.color = "#ff3f34";
			document.getElementById("idtxt").innerHTML = emptyfields;
		}
		else
		{
			var tablenumber = $('#tablenumber').val();
			var status = $('#status').val();
			var capacity = $('#capacity').val();
			
			
			$.ajax({
				url: 'ajax-queries/table-add.php',
				type: 'POST',
				data: {
					tablenumber: tablenumber,
					capacity: capacity,
					status: status
				},
				success: function(data){
				$('#tablenumber').val('');
				$('#capacity').val('');
				$('#status').val('Status');
				DisplayData();
				var emptyfields = "Successfully Added Table";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = emptyfields;
				}
			});
		}
		
	});
	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/table-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}

	//delete function
	$(document).on('click', '.delete', function(){
		var tablenumber = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/table-delete.php',
			type: 'POST',
			data: {
				tablenumber: tablenumber
			},

			success: function(data){
				DisplayData();
				$('#update').hide();
				$('#save').show();
				
				$('#tablenumber').val('');
				$('#capacity').val(getArray.capacity);
				$('#status').val('Status');
				
				
			}
		});
	})
	//edit data
	$(document).on('click', '.edit', function(){
		var table_number = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/table-edit.php',
			type: 'POST',
			data: {
				table_number: table_number
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				mem_id = getArray.mem_id;
				
				$('#tablenumber').val(getArray.tablenumber);
				$('#capacity').val(getArray.capacity);
				$('#status').val(getArray.status);
				
				
				$('#update').show();
				$('#save').hide();	
			}
		})
	});
	
	//update data
	$('#update').on('click', function(){
		var tablenumber = $('#tablenumber').val();
		var capacity = $('#capacity').val();
		var status = $('#status').val();
		
		$.ajax({
			url: 'ajax-queries/table-update.php',
			type: 'POST',
			data: {
				tablenumber: tablenumber,
				capacity: capacity,
				status: status
			},
			success: function(){
				
				DisplayData();
				$('#tablenumber').val('');
				$('#capacity').val('');
				$('#status').val('Status');
				
				var updatedfields = "Successfully Updated!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;
		
				
				
				$('#update').hide();
				$('#save').show();
								
			}
		});
	});
});