$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/orders-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}

	
	
});