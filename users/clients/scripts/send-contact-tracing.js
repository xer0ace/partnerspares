$(document).ready(function(){
	

	
			$('#submit').on('click', function(){

				if (! $('input[name=lagnat]').is(':checked') || ! $('input[name=ubo]').is(':checked') || ! $('input[name=katawan]').is(':checked') || ! $('input[name=lalamunan]').is(':checked') || ! $('input[name=nakasalamuha]').is(':checked') || ! $('input[name=alaga]').is(':checked') || ! $('input[name=nagbyahe]').is(':checked') || ! $('input[name=lungsod]').is(':checked')) {
					alert('Please answer all question in the Health Declartion Form before proceeding!');
				}

				else
				{
					var lagnat = $('input[name=lagnat]:checked', '#contact-form').val()
					var ubo = $('input[name=ubo]:checked', '#contact-form').val()
					var katawan = $('input[name=katawan]:checked', '#contact-form').val()
					var lalamunan = $('input[name=lalamunan]:checked', '#contact-form').val()
					var nakasalamuha = $('input[name=nakasalamuha]:checked', '#contact-form').val()
					var alaga = $('input[name=alaga]:checked', '#contact-form').val()
					var nagbyahe = $('input[name=nagbyahe]:checked', '#contact-form').val()
					var lungsod = $('input[name=lungsod]:checked', '#contact-form').val()
					var Client_ID = $('#Client_ID').val();

					if (lagnat == "Yes" || ubo == "Yes" || katawan == "Yes" || lalamunan == "Yes" || nakasalamuha == "Yes" || alaga == "Yes" || nagbyahe == "Yes" || lungsod == "Yes") {
						

						$.ajax({
							url: 'ajax-queries/submit-contact.php',
							type: 'POST',
							data: {
								Client_ID: Client_ID,
								lagnat: lagnat,
								ubo: ubo,
								katawan: katawan,
								lalamunan: lalamunan,
								nakasalamuha: nakasalamuha,
								alaga: alaga,
								nagbyahe: nagbyahe,
								lungsod: lungsod
							},
							success: function(data){
								alert("You answered a question that raises a red flag on the health protocol corresponding in COVID-19, you are hereby prohibited to access our system and services.");
								window.location.replace("logout.php");
							}
						});
					}
					else {

					$.ajax({
							url: 'ajax-queries/submit-contact.php',
							type: 'POST',
							data: {
								Client_ID: Client_ID,
								lagnat: lagnat,
								ubo: ubo,
								katawan: katawan,
								lalamunan: lalamunan,
								nakasalamuha: nakasalamuha,
								alaga: alaga,
								nagbyahe: nagbyahe,
								lungsod: lungsod
							},
							success: function(data){
								window.location.replace("index.php");
							}
						});
					}
				}

			});
	
});
