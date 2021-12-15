function DisplayPending(){
		

		$.ajax({
			url: 'ajax-queries/live-pending.php',
			type: 'POST',
			data: {
			
				res: 1
			},
			success: function(response){
				$('#pending-counter').html(response);
			}
		})
}

function DisplayPreparing(){
	

		$.ajax({
			url: 'ajax-queries/live-preparing.php',
			type: 'POST',
			data: {
				
				res: 1
			},
			success: function(response){
				$('#preparing-counter').html(response);
			}
		})
}

function DisplayInTransit(){
		

		$.ajax({
			url: 'ajax-queries/live-in-transit.php',
			type: 'POST',
			data: {
				
				res: 1
			},
			success: function(response){
				$('#in-transit-counter').html(response);
			}
		})
}

function DisplayCompleted(){
		

		$.ajax({
			url: 'ajax-queries/live-completed.php',
			type: 'POST',
			data: {
				
				res: 1
			},
			success: function(response){
				$('#completed-counter').html(response);
			}
		})
}

function DisplayCancelled(){
		

		$.ajax({
			url: 'ajax-queries/live-cancelled.php',
			type: 'POST',
			data: {
				
				res: 1
			},
			success: function(response){
				$('#cancelled-counter').html(response);
			}
		})
}


$(document).ready(function(){
	var mem_id;
	
DisplayPending();
DisplayPreparing();
DisplayInTransit();
DisplayCompleted();
DisplayCancelled();

});

// display ID on input. input id is ="idinput"
