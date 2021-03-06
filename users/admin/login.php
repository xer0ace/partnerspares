<title>PPM - Admin Login</title>
<?php 
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "include/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT Username, Password FROM tbl_admin WHERE Username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            
                            $_SESSION["Username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid password";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<?php include 'include/header.php';?>
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                        
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                    <div class="margin-login">
                                <h2 class="login-header">Admin - Login</h2>
                                    <form action="#" id="formid" ction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-lock icon"></i>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>

                                        </div>

                                         <span class="login-error"><?php echo $login_err; ?></span> <br>
                                         <div class="input-container">
                                            <button type="submit" class="btn btn-success" id="save" name="add_student"> 
                                                <span class="fa fa-sign-in" aria-hidden="true"></span> Log In 
                                            </button>
                                    </form> 
                                </div>
                                </div>
                            </div>
                       
                    </div>
                    </div>
                </div>
            </div>
<?php include "include/footer.php" ?>
<script src="scripts/admins-ajax-crud.js"></script>