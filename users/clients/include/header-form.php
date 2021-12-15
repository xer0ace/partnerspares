<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinUser"]) || $_SESSION["loggedinUser"] !== true){
    header("location: user-login.php");
    exit;
}

$full_username = htmlspecialchars($_SESSION["Username"]);

$fullNameQuery = "SELECT * FROM `tbl_clients` WHERE Username = '$full_username'";
$nameResult = mysqli_query($link, $fullNameQuery);

  while ($row = mysqli_fetch_array($nameResult)) {
    $Client_ID = $row['Client_ID'];
      $Last_Name = $row['Last_Name'];
      $First_Name = $row['First_Name'];
      $Contact = $row['Contact'];
      $Municipality_City = $row['Municipality_City'];
      $Barangay = $row['Barangay'];
      $Street_Purok = $row['Street_Purok'];
      $picture = $row['picture'];
    }

?>
 <html lang="en">
    <head>
        <link href="../../assets/images/favicon.png" rel="icon">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->

        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />

        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://kit.fontawesome.com/1ff52a5a7e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <header id="home" class="navbar-fixed-top">
            <div class="header_top_menu clearfix">  
                <div class="container">
                    <div class="row summit">
                        <div class="col-md-5 col-md-offset-3 col-sm-12 text-right">
                            
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="head_top_social text-right">
                                <a href=""><i class="fa fa-facebook"></i></a>                             
                                <a href=""><i class="fa fa-twitter"></i></a>                               
                                <a href=""><i class="fa fa-phone"></i></a>
                            </div>  
                        </div>

                    </div>          
                </div>
            </div>

            <!-- End navbar-collapse-->

            <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand our_logo" href="#"><img src="assets/images/logo.png" alt="" /></a>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        

                                        <li class="dropdown"> 
                                            <a class="dropbtn">Account <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                <div class="dropdown-content">
                                                    <input type="text" style="display: none;" id="Client_ID" value="<?php echo $Client_ID; ?>" readonly>
                                                    <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                                                </div>
                                        </li>

                                        
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>  
        </header> <!-- End Header Section -->