$(document).ready(function(){
	var mem_id;
	
	
	DisplayID();
	
	// display ID on input. input id is ="idinput"
	function DisplayID(){
		$.ajax({
			url: 'ajax-queries/user-id-sequence.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#idinput').html(response);
			}
		})
	}
	
	
	
});