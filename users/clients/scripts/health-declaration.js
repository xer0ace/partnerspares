$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	
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

	
	
	
});