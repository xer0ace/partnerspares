 <form id="contact-form" method="POST" action="<?php $_PHP_SELF ?>">
    <table class="contact-tracing" id="data">
<?php
	require_once '../include/config.php';
	if(ISSET($_POST['res'])){
		$query = $link->query("SELECT * FROM tbl_health_declaration");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						 	<th>
                               ".$fetch['Topic']." -  ".$fetch['Description']."
                            </th>

                                <th>
                                    <label for='".$fetch['Topic']."'>Oo</label>
                                    <input type='radio' name='titles[".$fetch['Topic']."]' value='Yes' class='radios'>
                                </th>

                                <th>
                                    <label for='".$fetch['Topic']."'>Hindi</label>
                                    <input type='radio' name='titles[".$fetch['Topic']."]' value='No' class='radios'>
                                </th>
					</tr>
				";
			
		}
	}

	
?> 
	                  
               

    </table>
    			<hr>
				<button type='submit' id='submit' class='btn btn-success' name="save">
                    <span class='fa fa-pencil-square-o'></span> Submit
                </button>

</form>