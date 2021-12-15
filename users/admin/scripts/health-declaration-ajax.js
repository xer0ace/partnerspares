$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	
	
	$('#update').hide();
	//save information data
	$('#save').on('click', function(){
		if($('#topic').val() == "" || $('#description_edit').val() == "Status")
		{
			var emptyfields = "Fields are empty";
			document.getElementById("idtxt").style.color = "#ff3f34";
			document.getElementById("idtxt").innerHTML = emptyfields;
		}
		else
		{
			var topic = $('#topic').val();
			var description_edit = $('#description_edit').val();
			
			
			$.ajax({
				url: 'ajax-queries/health-add.php',
				type: 'POST',
				data: {
					topic: topic,
					description_edit: description_edit
				},
				success: function(data){
					var obj = jQuery.parseJSON(data);

					if (obj == "This Health Category is already existing!") {
						 document.getElementById("idtxt").style.color = "#ff3f34";
						 document.getElementById("idtxt").innerHTML = obj;
						 $('#topic').val(topic);
						 $('#description_edit').val(description_edit);
					}
					else{
						document.getElementById("idtxt").style.color = "#2ecc71";
						document.getElementById("idtxt").innerHTML = obj;
							$('#healthid').val('');
							$('#topic').val('');
							$('#description_edit').val('');
							$('#description').text('{see here}');
						DisplayData();
					
					}
				}
			});
		}
		
	});
	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/health-view.php',
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
		var healthid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/health-delete.php',
			type: 'POST',
			data: {
				healthid: healthid
			},

			success: function(data){
				DisplayData();
				$('#update').hide();
				$('#save').show();
				
				$('#healthid').val('');
				$('#topic').val('');
				$('#description_edit').val('');
				$('#description').text('{see here}');

				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = "Successfully Deleted!";
				
			}
		});
	})
	//edit data
	$(document).on('click', '.edit', function(){
		var healthid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/health-edit.php',
			type: 'POST',
			data: {
				healthid: healthid
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				mem_id = getArray.mem_id;
				
				$('#topic').val(getArray.topic);
				$('#healthid').val(getArray.topic);
				$('#description_edit').val(getArray.description);
				$('#description').text(getArray.description);
				
				$('#update').show();
				$('#save').hide();	
			}
		})
	});
	
	//update data
	$('#update').on('click', function(){
		var healthid = $('#healthid').val();
		var topic = $('#topic').val();
		var description_edit = $('#description_edit').val();
		
		$.ajax({
			url: 'ajax-queries/health-update.php',
			type: 'POST',
			data: {
				healthid: healthid,
				topic: topic,
				description_edit: description_edit
			},
			success: function(){
				
				DisplayData();
				$('#healthid').val('');
				$('#topic').val('');
				$('#description_edit').val('');
				$('#description').text('{see here}');

				
				var updatedfields = "Successfully Updated!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;
		
				
				
				$('#update').hide();
				$('#save').show();
								
			}
		});
	});
});