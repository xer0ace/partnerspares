$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	DisplayMenus();

	// display data on table. table id is ="data"
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/food-menu-view.php',
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
			url: 'ajax-queries/menu-IDS.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#selects').html(response);
			}
		})
	}

	//remove menu function
	$(document).on('click', '.delete', function(){
		var menu_id = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/food-menu-remove.php',
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
				DisplayMenu1();	
				DisplayMenu2();		
				DisplayMenu3();	
			}
		});
	})

	//update data
	$('#save').on('click', function(){
		var foodID = $('#foodID').val();
		var menuID = $('#menuID').val();
		
		$.ajax({
			url: 'ajax-queries/food-menu-update.php',
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
				DisplayMenu1();	
				DisplayMenu2();		
				DisplayMenu3();					
			}
		});
	});

	DisplayMenu1();
	
	 function DisplayMenu1(){
        $.ajax({
            url: 'ajax-queries/food-menu-1.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data_grid_1').html(response);
            }
        })
    }

    DisplayMenu2();
	
	 function DisplayMenu2(){
        $.ajax({
            url: 'ajax-queries/food-menu-2.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data_grid_2').html(response);
            }
        })
    }

    DisplayMenu3();
	
	 function DisplayMenu3(){
        $.ajax({
            url: 'ajax-queries/food-menu-3.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response){
                $('#data_grid_3').html(response);
            }
        })
    }
	
});