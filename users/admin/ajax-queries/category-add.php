<?php
	require_once '../include/config.php';

	$foodid = $_POST['foodid'];
	$name = $_POST['name'];

	$username_err = "";

     //id pre match pattern checker
	
    	// Prepare select statement
        $sql = "SELECT Category_Name FROM tbl_category WHERE Category_Name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($name);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                //check existing id number
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "Category is already existing";
                    echo json_encode($username_err);
                } else
                {
                    //no errors query insert data
                    $username_err = "Category Successfully Added!";
			    	echo json_encode($username_err);

						$link->query("INSERT INTO `tbl_category` (`Category_ID`, `Category_Name`) VALUES ('$foodid', '$name')");
                }
            } else
            {
                //fatal error
                $username_err = "Oops! Something went wrong. Please try again later.";
                echo json_encode($username_err);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
	
?>
