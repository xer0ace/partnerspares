$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	DisplayCategory();

	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/discount-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}

	function DisplayCategory(){
		$.ajax({
			url: 'ajax-queries/discount-category.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#category-input').html(response);
			}
		})
	}

	
	//update data
	$('#save').on('click', function(){
		var foodID = $('#foodID').val();
		var category = $('#category').val();
		var percent = $('#percentage').val();
		
		
		$.ajax({
			url: 'ajax-queries/discount-update.php',
			type: 'POST',
			data: {
				category: category,
				foodID: foodID,
				percent: percent
			},
			success: function(){
				
				DisplayData();
				$('#foodID').val('Foods');
				$('#category').val('Category');
				$('#percentage').val('');
				
				var updatedfields = "Successfully Updated!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;
				DisplayData();	
			}
		});
	});


   //delete function
	$(document).on('click', '.delete', function(){
		var foodid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/discount-remove.php',
			type: 'POST',
			data: {
				foodid: foodid
			},

			success: function(data){
				$('#foodID').val('Foods');
				$('#category').val('Category');
				$('#percent').val('');
				
				var updatedfields = "Successfully Removed!";
				document.getElementById("idtxt").style.color = "#c0392b";
				document.getElementById("idtxt").innerHTML = updatedfields;
				DisplayData();
				
				document.getElementById('picturePic').src='../../uploaded-files/food-items/template.png';
			}
		});
	})
	
});