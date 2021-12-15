$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	
	 function DisplayData(){
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
});