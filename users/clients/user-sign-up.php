<title>PPM - Sign Up</title>
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
 

 $username_err = $lastname = $firstname = $contact = "";
 $municipality = $barangay = $street =  $username = "";
 $username = $password = $user_ID = "";

if (isset($_POST['Sign_Up'])) {
    
    $user_ID = $_POST['user_ID'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $contact = $_POST['contact'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];

    // Validate username
    if(empty(trim($_POST["Username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Username FROM tbl_clients WHERE Username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["Username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["Username"]);
                }
            } else{
                $username_err = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $username_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $username_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $username_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($username_err) && ($password != $confirm_password)){
            $username_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err)){
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        // Prepare an insert statement
        $sql = "INSERT INTO tbl_clients VALUES ('$user_ID','$username', '$param_password', '$lastname', '$firstname', '$contact', '$municipality', '$barangay', '$street', 'client-default.png')";
   
          
        if (mysqli_query ($link, $sql)) {    
                // Redirect to login page
                header("location: user-login.php");
        }
    }

}
include 'include/header.php';

?>
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                    <div class="margin-login">
                                <h2 class="login-header">Sign Up</h2>
                                    <form action="#" id="formid" ction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group">
                                            <div id="idinput"></div>
                                            <div class="input-container">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-phone icon"></i>
                                                <input type="text" class="form-control" name="contact" placeholder="Contact" value="<?php echo $contact; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-map-marker icon"></i>
                                                <input type="text" class="form-control" name="municipality" placeholder="Municipality/City" value="<?php echo $municipality; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-map-marker icon"></i>
                                                <input type="text" class="form-control" name="barangay" placeholder="Barangay" value="<?php echo $barangay; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-map-marker icon"></i>
                                                <input type="text" class="form-control" name="street" placeholder="Street/Purok" value="<?php echo $street; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" name="Username" placeholder="Username" value="<?php echo $username; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-lock icon"></i>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-lock icon"></i>
                                                <input type="password" class="form-control" name="confirm_password" placeholder="Password" required>
                                            </div>
                                        </div>

                                         <span class="login-error"><?php echo $username_err; ?></span> <br>
                                         <div class="input-container">
                                            <button type="submit" class="btn btn-primary" id="save" name="Sign_Up"> 
                                                <span class="fa fa-sign-in" aria-hidden="true"></span> Sign Up
                                            </button>
                                        </div>
                                    </form> 

                                </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
<?php include "include/footer.php";?>
<script src="scripts/user-sign-up.js"></script>