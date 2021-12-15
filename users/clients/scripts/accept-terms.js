$(document).ready(function(){
	$("#submit").hide();

	$('#terms').click(function() {
		    $("#submit").toggle(this.checked);
		    	$('#submit').click(function() {
		    		var Client_ID = $('#Client_ID').val();
		    			$.ajax({
							url: 'ajax-queries/submit-terms.php',
							type: 'POST',
							data: {
								Client_ID: Client_ID
							},
							success: function(data){
								var obj = jQuery.parseJSON(data);
								if (obj == "existing") {
									window.location.replace("index.php");
								}
								else {
									window.location.replace("contact-tracing-form.php");
								}
								
							}
						});
				});
		});
			
});
