<?php
	require_once '../include/config.php';

	$idnumber = $_POST['idnumber'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];

	$username_err = "";

     //id pre match pattern checker
	if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($username)))
    {
    $username_err = "Username can only contain letters, numbers, and underscores.";
    echo json_encode($username_err);
    }
    else
    {
    	// Prepare select statement
        $sql = "SELECT Username FROM tbl_admin WHERE Username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($username);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                //check existing id number
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This Username is already taken!";
                    echo json_encode($username_err);
                } else
                {
                    //no errors query insert data
                    $username_err = "Account Successfully Created!";
			    	echo json_encode($username_err);
						$password = "password123";
						$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hashs
						$link->query("INSERT INTO `tbl_admin` (`id`, `Username`, `Password`, `Last_Name`, `First_Name`, `picture`) VALUES ('$idnumber', '$username', '$param_password', '$lastname', '$firstname', 'admin-default.jpg')");
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
    }
	
?>
