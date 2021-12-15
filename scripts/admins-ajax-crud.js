$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	DisplayID();
	
	$('#update').hide();
	//save information data
	$('#save').on('click', function(){
		if($('#lastname').val() == "" || $('#firstname').val() == "" || $('#username').val() == ""){
			var emptyfields = "Fields are empty";
			document.getElementById("idtxt").style.color = "#ff3f34";
			document.getElementById("idtxt").innerHTML = emptyfields;
			
		}else{
			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			var username = $('#username').val();
			$.ajax({
				url: 'ajax-queries/admin-add.php',
				type: 'POST',
				data: {
					username: username,
					firstname: firstname,
					lastname: lastname
				},
				success: function(data){
					var obj = jQuery.parseJSON(data);
					if(obj == "Username can only contain letters, numbers, and underscores." || obj == "This Username is already taken!") {
						 document.getElementById("idtxt").style.color = "#ff3f34";
						 document.getElementById("idtxt").innerHTML = obj;
						 $('#idnumber').val(idnumber);
						 $('#firstname').val(firstname);
						 $('#lastname').val(lastname);
						 $('#username').val(username);
						 $('#contact').val(contact);
						 DisplayData();
						 document.getElementById('picturePic').src='../../uploaded-files/admin/template.png';
					}
					else {
						 document.getElementById("idtxt").style.color = "#2ecc71";
						 document.getElementById("idtxt").innerHTML = obj;
						 $('#idnumber').val('');
						 $('#firstname').val('');
						 $('#lastname').val('');
						 $('#username').val('');
						 $('#contact').val('');
						 DisplayData();
						 DisplayID();
						 document.getElementById('picturePic').src='../../uploaded-files/admin/template.png';
					}	
				}
			});
		}
		
	}); 
	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/admin-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}
	/*
	// display ID on input. input id is ="idinput"
	function DisplayID(){
		$.ajax({
			url: 'ajax-queries/admin-id-sequence.php',
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
		var idnumber = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/admin-delete.php',
			type: 'POST',
			data: {
				idnumber: idnumber
			},

			success: function(data){
				DisplayData();
				$('#update').hide();
				$('#save').show();
				$('#idnumber').val('');
				$('#username').val('');
				$('#firstname').val('');
				$('#lastname').val('');
				$('#contact').val('');
				DisplayID();
				document.getElementById('picturePic').src='../../uploaded-files/admin/template.png';
			}
		});
	})
	//edit data
	$(document).on('click', '.edit', function(){
		var idnumber = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/admin-edit.php',
			type: 'POST',
			data: {
				idnumber: idnumber
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				mem_id = getArray.mem_id;
				
				$('#idnumber').val(getArray.idnumber);
				$('#username').val(getArray.username);
				$('#lastname').val(getArray.lastname);
				$('#firstname').val(getArray.firstname);
				$('#contact').val(getArray.contact);
				document.getElementById('picturePic').src='../../uploaded-files/admin/'+getArray.picturePic;
				
				document.getElementById("username").readOnly = true;
				$('#update').show();
				$('#save').hide();	
			}
		})
	});
	
	//update data
	$('#update').on('click', function(){
		var idnumber = $('#idnumber').val();
		var username = $('#username').val();
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var contact = $('#contact').val();
		
		$.ajax({
			url: 'ajax-queries/admin-update.php',
			type: 'POST',
			data: {
				idnumber: idnumber,
				username: username,
				firstname: firstname,
				lastname: lastname,
				contact: contact
			},
			success: function(){
				
				DisplayData();
				$('#idnumber').val('');
				$('#username').val('');
				$('#firstname').val('');
				$('#lastname').val('');
				$('#contact').val('');
				
				var updatedfields = "Successfully Updated!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;
				document.getElementById('picturePic').src='../../uploaded-files/admin/template.png';
				
				document.getElementById("username").readOnly = false;
				$('#update').hide();
				$('#save').show();
				DisplayID();				
			}
		});
	}); */
});