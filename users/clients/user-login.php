<title>PPM - Login</title>
<?php 
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinUser"]) && $_SESSION["loggedinUser"] === true){
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
        $sql = "SELECT Username, Password FROM tbl_clients WHERE Username = ?";
        
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
                            $_SESSION["loggedinUser"] = true;
                            
                            $_SESSION["Username"] = $username;  


                            date_default_timezone_set('Asia/Manila');
                            $wholeYear = date("Y");
                            $month = date("m");
                            $day = date("d");

                            $dateQuery = $wholeYear."-".$month."-".$day;


                            $sql = "SELECT tbl_contact_tracing.Client_ID, `Date`, Username FROM `tbl_contact_tracing` INNER JOIN tbl_clients ON tbl_contact_tracing.Client_ID = tbl_clients.Client_ID WHERE `Username` = '$username' AND `Date` = '$dateQuery'";
                            $checkResult = mysqli_query($link, $sql);


                            $sqlTerms = "SELECT tbl_terms_and_conditions.Client_ID, Username FROM `tbl_terms_and_conditions` INNER JOIN tbl_clients ON tbl_terms_and_conditions.Client_ID = tbl_clients.Client_ID WHERE `Username` = '$username'";
                            $checkResultTerms = mysqli_query($link, $sqlTerms);

                            $sqlTermsContact = "SELECT tbl_contact_tracing.Client_ID, `Date`, Username FROM `tbl_contact_tracing` INNER JOIN tbl_clients ON tbl_contact_tracing.Client_ID = tbl_clients.Client_ID WHERE (`Username` = '$username' AND `Date` = '$dateQuery') AND (Fever = 'Yes' OR Colds = 'Yes' OR Pain = 'Yes' OR Throat = 'Yes' OR Socialized = 'Yes' OR Patient = 'Yes' OR Traveled = 'Yes' OR Traveled_Local = 'Yes')";
                            $checkResultTermsContact = mysqli_query($link, $sqlTermsContact);

                            if (mysqli_num_rows($checkResultTerms) == 1) {


                                 if (mysqli_num_rows($checkResultTermsContact) == 1) {
                                    echo "<script> alert('You are prohibited to use the website and its services until further notice, concerning your health declaration form, you have possible signs of symptomps of COVID-19.');

                                    location.replace('logout.php');

                                     </script>";

                                     
                                }


                                else {

                                        if (mysqli_num_rows($checkResult) == 1) {

                                        // Redirect user to welcome page
                                        header("location: index.php");
                                   
                                        }
                                        else {
                                             header("location: contact-tracing-form.php");

                                        } 
                                }                          
                            }

                            else {
                                 header("location: terms-conditions.php");

                            }
                            


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
                                <h2 class="login-header">Login</h2>
                                    <form action="#" id="formid" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                                        </div>
                                    </form> 
                                    <span style="color: #000000"> Dont have an Account? <a href="user-sign-up.php">Click Here</a> to Sign Up!</span>
                                </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
<?php include "include/footer.php" ?>
<script src="scripts/admins-ajax-crud.js"></script>