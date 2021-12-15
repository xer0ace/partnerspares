$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	DisplayMenus();

	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/food-grid-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}

	
	function DisplayMenus(){
		$.ajax({
			url: 'ajax-queries/food-IDS.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#selects').html(response);
			}
		})
	}

	//update data
	$('#save').on('click', function(){
		var foodID = $('#foodID').val();
		var menuID = $('#menuID').val();
		
		$.ajax({
			url: 'ajax-queries/food-grid-update.php',
			type: 'POST',
			data: {
				foodID: foodID,
				menuID: menuID
			},
			success: function(){
				
				DisplayData();
				$('#foodID').val('Foods');
				$('#menuID').val('Menu Number');
				
				var updatedfields = "Successfully Updated!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;
				DisplayData();
				DisplayMenus();
				DisplayGrid();				
			}
		});
	});

	DisplayGrid();
	
	 function DisplayGrid(){
        $.ajax({
            url: 'ajax-queries/food-grid.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data_grid').html(response);
            }
        })
    }

    //remove grid function
	$(document).on('click', '.delete', function(){
		var menu_id = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/food-grid-remove.php',
			type: 'POST',
			data: {
				menu_id: menu_id
			},

			success: function(data){
				DisplayData();
				$('#foodID').val('Foods');
				$('#menuID').val('Menu Number');
				
				var updatedfields = "Successfully Removed!";
				document.getElementById("idtxt").style.color = "#2ecc71";
				document.getElementById("idtxt").innerHTML = updatedfields;
				DisplayData();
				DisplayMenus();
				DisplayGrid();
			}
		});
	})
	
});