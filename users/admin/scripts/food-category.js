$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	DisplayID();
	
	$('#update').hide();
	//save information data
	$('#save').on('click', function(){
		if($('#foodid').val() == "" || $('#name').val() == ""){
			var emptyfields = "Fields are empty";
			document.getElementById("idtxt").style.color = "#ff3f34";
			document.getElementById("idtxt").innerHTML = emptyfields;
		}else{
			var foodid = $('#foodid').val();
			var name = $('#name').val();
			
			$.ajax({
				url: 'ajax-queries/category-add.php',
				type: 'POST',
				data: {
					foodid: foodid,
					name: name
				},
				success: function(data){
					var obj = jQuery.parseJSON(data);
					if(obj == "Username can only contain letters, numbers, and underscores." || obj == "This Username is already taken!") {
						 document.getElementById("idtxt").style.color = "#ff3f34";
						 document.getElementById("idtxt").innerHTML = obj;
						 $('#foodid').val(foodid);
						 $('#name').val(name);
						 DisplayData();
					}
					else {
						 document.getElementById("idtxt").style.color = "#2ecc71";
						 document.getElementById("idtxt").innerHTML = obj;
						 $('#foodid').val('');
						 $('#name').val('');
						 DisplayData();
						 DisplayID();
					}	
				}
			});
		}
		
	});

	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/category-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}

	function DisplayID(){
		$.ajax({
			url: 'ajax-queries/category-id-sequence.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#idinput').html(response);
			}
		})
	}

	//delete function
	$(document).on('click', '.delete', function(){
		var foodid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/category-delete.php',
			type: 'POST',
			data: {
				foodid: foodid
			},

			success: function(data){
				DisplayData();
				DisplayID();
				$('#update').hide();
				$('#save').show();

				$('#name').val('');
			
			}
		});
	})
	//edit data
	$(document).on('click', '.edit', function(){
		var foodid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/category-edit.php',
			type: 'POST',
			data: {
				foodid: foodid
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				mem_id = getArray.mem_id;
				
				$('#foodid').val(getArray.foodid);
				$('#name').val(getArray.name);
				$('#update').show();
				$('#save').hide();	
			}
		})
	});

	//update data
	$('#update').on('click', function(){
		var foodid = $('#foodid').val();
		var name = $('#name').val();
		
		$.ajax({
			url: 'ajax-queries/category-update.php',
			type: 'POST',
			data: {
				foodid: foodid,
				name: name
			},
			success: function(){
				DisplayData();
				DisplayID();
				$('#name').val('');
				
				var updatedfields = "Successfully Updated!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;		

				$('#update').hide();
				$('#save').show();	
			}
		});
	});
	
});