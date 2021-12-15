function DisplayCart(){
		var Client_ID = $('#Client_ID').val();

		$.ajax({
			url: 'ajax-queries/live-cart.php',
			type: 'POST',
			data: {
				Client_ID: Client_ID,
				res: 1
			},
			success: function(response){
				$('#cart-counter').html(response);
			}
		})
}

function DisplayToPay(){
		var Client_ID = $('#Client_ID').val();

		$.ajax({
			url: 'ajax-queries/live-to-pay.php',
			type: 'POST',
			data: {
				Client_ID: Client_ID,
				res: 1
			},
			success: function(response){
				$('#pay-counter').html(response);
			}
		})
}

function DisplayPendingOrders(){
		var Client_ID = $('#Client_ID').val();

		$.ajax({
			url: 'ajax-queries/live-pending.php',
			type: 'POST',
			data: {
				Client_ID: Client_ID,
				res: 1
			},
			success: function(response){
				$('#pending-counter').html(response);
			}
		})
}

function DisplayPreparing(){
		var Client_ID = $('#Client_ID').val();

		$.ajax({
			url: 'ajax-queries/live-preparing.php',
			type: 'POST',
			data: {
				Client_ID: Client_ID,
				res: 1
			},
			success: function(response){
				$('#preparing-counter').html(response);
			}
		})
}

function DisplayInTransit(){
		var Client_ID = $('#Client_ID').val();

		$.ajax({
			url: 'ajax-queries/live-in-transit.php',
			type: 'POST',
			data: {
				Client_ID: Client_ID,
				res: 1
			},
			success: function(response){
				$('#in-transit-counter').html(response);
			}
		})
}

function DisplayCompleted(){
		var Client_ID = $('#Client_ID').val();

		$.ajax({
			url: 'ajax-queries/live-completed.php',
			type: 'POST',
			data: {
				Client_ID: Client_ID,
				res: 1
			},
			success: function(response){
				$('#completed-counter').html(response);
			}
		})
}

function DisplayCancelled(){
		var Client_ID = $('#Client_ID').val();

		$.ajax({
			url: 'ajax-queries/live-cancelled.php',
			type: 'POST',
			data: {
				Client_ID: Client_ID,
				res: 1
			},
			success: function(response){
				$('#cancelled-counter').html(response);
			}
		})
}

$(document).ready(function(){
	var mem_id;
	
DisplayCart();
DisplayToPay();
DisplayPendingOrders();
DisplayPreparing();
DisplayInTransit();
DisplayCompleted();
DisplayCancelled();
});

// display ID on input. input id is ="idinput"
