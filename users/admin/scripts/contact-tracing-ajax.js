$(document).ready(function(){
	var mem_id;
	
	DisplayData();
	
	function DisplayData(){
		$.ajax({
			url: 'ajax-queries/tracing-view.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}

	//edit data
	$(document).on('click', '.edit', function(){
		var contactid = $(this).attr('name');
		
		$.ajax({
			url: 'ajax-queries/tracing-edit.php',
			type: 'POST',
			data: {
				contactid: contactid
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				mem_id = getArray.mem_id;
				
				document.getElementById('name').innerHTML = getArray.fname+' '+getArray.lname;
				document.getElementById('address').innerHTML = getArray.street+', '+getArray.barangay+', '+getArray.municipality;
				document.getElementById('contact').innerHTML = getArray.contact;
				document.getElementById('date').innerHTML = getArray.Date+' | '+getArray.Time;

				$('#lagnat').val(getArray.Fever);
				$('#ubo').val(getArray.Colds);
				$('#katawan').val(getArray.Pain);
				$('#lumunok').val(getArray.Throat);
				$('#nakasalamuha').val(getArray.Socialized);
				$('#alaga').val(getArray.Patient);
				$('#nagbyahe').val(getArray.Traveled);
				$('#lungsod').val(getArray.Traveled_Local);

				document.getElementById('profilepic').src='../../uploaded-files/clients/'+getArray.picturePic;


				function htmlEncode(value) {
	              return $('<div/>').text(value)
	                .html();
	              }

	              var qrinfo = 'Name: ' +getArray.fname+' '+getArray.lname+ ' | Address: ' +getArray.street+', '+getArray.barangay+', '+getArray.municipality+
	               ' | Contact: ' +getArray.contact+ ' | Date: ' +getArray.Date+' - '+getArray.Time+ ' | Lagnat: ' + getArray.Fever + ' | Ubo: ' 
	               + getArray.Colds + ' | Sakit ng katawan: ' + getArray.Pain + ' | Sakit ng lalamunan: ' + getArray.Throat + ' | May nakasalamuha: ' + getArray.Socialized + ' | Nag alaga: ' + getArray.Patient + 
	               ' | Nagbyahe sa labas ng Ph: '  + getArray.Traveled + ' | Nagbyahe sa labas ng lungsod: '  + getArray.Traveled_Local;

	               $(document).ready(function(){
	                DisplayQR();
	                  
	                   function DisplayQR() {

	                    let finalURL =
	                    'https://chart.googleapis.com/chart?cht=qr&chl=' +
	                    htmlEncode(qrinfo) +
	                    '&chs=160x160&chld=L|0'

	                    // Replace the src of the image with
	                    // the QR code image
	                    $('.qr-code1').attr('src', finalURL);
	                  };
	              });



			}
		})
	});
	
});


              
           