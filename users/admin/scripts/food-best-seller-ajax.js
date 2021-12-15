$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	DisplayCategory();

	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/food-best-view.php',
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
				$('#foodID').val(getArray.foodid);
				$('#category').val(getArray.category);
				document.getElementById('picturePic').src='../../uploaded-files/food-items/'+getArray.picturePic;
			}
		})
	});

	//update data
	$('#save').on('click', function(){
		var foodID = $('#foodID').val();
		var category = $('#category').val();
		
		
		$.ajax({
			url: 'ajax-queries/food-best-update.php',
			type: 'POST',
			data: {
				category: category,
				foodID: foodID
			},
			success: function(){
				
				DisplayData();
				$('#foodID').val('Foods');
				$('#category').val('Category');
				
				
				var updatedfields = "Successfully Updated!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;
				DisplayData();
				DisplayBestSeller();
						
			}
		});
	});

	DisplayBestSeller();
	
	 function DisplayBestSeller(){
        $.ajax({
            url: 'ajax-queries/food-best-seller.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#best-seller').html(response);
            }
        })
    }

   //delete function
	$(document).on('click', '.delete', function(){
		var foodid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/food-best-seller-remove.php',
			type: 'POST',
			data: {
				foodid: foodid
			},

			success: function(data){
				$('#foodID').val('Foods');
				$('#category').val('Category');
				
				var updatedfields = "Successfully Removed!";
				document.getElementById("idtxt").style.color = "#c0392b";
				document.getElementById("idtxt").innerHTML = updatedfields;
				DisplayData();
				
				document.getElementById('picturePic').src='../../uploaded-files/food-items/template.png';
			}
		});
	})
	
});