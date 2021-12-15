$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	DisplayID();
	DisplayCategory();
	
	$('#update').hide();
	//save information data
	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/food-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}

	// display ID on input. input id is ="idinput"
	function DisplayID(){
		$.ajax({
			url: 'ajax-queries/food-id-sequence.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#idinput').html(response);
			}
		})
	}

	function DisplayCategory(){
		$.ajax({
			url: 'ajax-queries/category-sequence.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#category-input').html(response);
			}
		})
	}

	//delete function
	$(document).on('click', '.delete', function(){
		var foodid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/food-delete.php',
			type: 'POST',
			data: {
				foodid: foodid
			},

			success: function(data){
				DisplayData();
				$('#update').hide();
				$('#save').show();
				$('#foodid').val('');
				$('#name').val('');
				$('#price').val('');
				$('#availability').val('Availability');
				DisplayID();
				document.getElementById('picturePic').src='../../uploaded-files/food-items/template.png';
			}
		});
	})
	//edit data
	$(document).on('click', '.edit', function(){
		var foodid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/food-edit.php',
			type: 'POST',
			data: {
				foodid: foodid
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				mem_id = getArray.mem_id;
				
				$('#foodid').val(getArray.foodid);
				$('#name').val(getArray.name);
				$('#category').val(getArray.category);
				$('#price').val(getArray.price);
				$('#serving').val(getArray.serving);
				$('#availability').val(getArray.availability);
				document.getElementById('picturePic').src='../../uploaded-files/food-items/'+getArray.picturePic;
				$('#update').show();
				$('#save').hide();	
			}
		})
	});
	
});