$(document).ready(function(){
	
	$('#save').on('click', function(){
		if($('#newpass').val() == "" || $('#confirmpass').val() == "" ){
			var emptyfields = "Please enter the new password.";
			document.getElementById("idtxt").style.color = "#ff3f34";
			document.getElementById("idtxt").innerHTML = emptyfields;
			
		}
		else if ($('#newpass').val() != $('#confirmpass').val()) {
			var emptyfields = "Password did not match.";
			document.getElementById("idtxt").style.color = "#ff3f34";
			document.getElementById("idtxt").innerHTML = emptyfields;
		}
		else if ($('#newpass').val().length < 6) {
			var emptyfields = "Password must have atleast 6 characters.";
			document.getElementById("idtxt").style.color = "#ff3f34";
			document.getElementById("idtxt").innerHTML = emptyfields;
		}
		else {
			var username = $('#Client_ID').val();
			var newpass = $('#newpass').val();
			var confirmpass = $('#confirmpass').val();

			$.ajax({
				url: 'ajax-queries/change-password.php',
				type: 'POST',
				data: {
					username: username,
					newpass: newpass,
					confirmpass: confirmpass
				},
				success: function(){
						 $('#newpass').val('');
						 $('#confirmpass').val('');

						 var updatedfields = "Successfully Updated!";
						 document.getElementById("idtxt").style.color = "#2ecc71";
						 document.getElementById("idtxt").innerHTML = updatedfields;
				}
			});


		}
		
	});
	
	
	
});