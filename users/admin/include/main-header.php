<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$full_username = htmlspecialchars($_SESSION["Username"]);

$fullNameQuery = "SELECT * FROM `tbl_admin` WHERE Username = '$full_username'";
$nameResult = mysqli_query($link, $fullNameQuery);

  while ($row = mysqli_fetch_array($nameResult)) {
      $idnumber = $row['id'];
      $Last_Name = $row['Last_Name'];
      $First_Name = $row['First_Name'];
      $Picture = $row['picture'];
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
                                        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>

                                        <li class="dropdown">
                                            <a class="dropbtn"><i class="fas fa-drumstick-bite"></i> Foods <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                <div class="dropdown-content">
                                                    <a href="food-list.php"><i class="fas fa-warehouse"></i> Inventory</a>
                                                    <a href="food-grid-display.php"><i class="fas fa-grip-horizontal"></i> Grid Display</a>
                                                    <a href="food-menu-display.php"><i class="fab fa-elementor"></i> Menu Display</a>
                                                    <a href="food-best-seller.php"><i class="fas fa-award"></i> Best Seller</a>
                                                    <a href="category-list.php"><i class="fas fa-filter"></i> Categories</a>
                                                    <a href="discounts-list.php"><i class="fas fa-percent"></i> Discounts</a>
                                                </div>
                                        </li>

                                        <li><a href="table-management.php"><i class="fas fa-chair"></i> Table Management</a></li>
                                        <li class="dropdown">

                                            <a class="dropbtn">Orders <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                <div class="dropdown-content">
                                                    <a href="pending-orders"><span id="pending-counter" class="counter-notif"></span> <i class="fas fa-tasks"></i> Pending Orders</a>
                                                    <a href="order-preparing.php"><span id="preparing-counter" class="counter-notif"></span> <i class="fas fa-fire"></i> Preparing Orders</a>
                                                    <a href="in-transit-orders.php"><span id="in-transit-counter" class="counter-notif"></span> <i class="fas fa-dolly"></i> In Transit Orders</a>
                                                    <a href="completed-orders.php"><span id="completed-counter" class="counter-notif"></span> <i class="fas fa-check-double"></i> Completed Orders</a>
                                                     <a href="cancelled-orders.php"><span id="cancelled-counter" class="counter-notif"></span> <i class="far fa-times-circle"></i> Cancelled Orders</a>
                                                </div>
                                        </li>

                                         <li class="dropdown">
                                            <a class="dropbtn"></i> <i class="fas fa-chart-line"></i> Reports <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                <div class="dropdown-content">
                                                    <a href="orders-list.php"><i class="fas fa-list-ul"></i> Orders List</a>
                                                    <a href="reports-sales.php"><i class="far fa-calendar"></i> Sales</a>
                                                    <a href="reports-cancelled.php"><i class="far fa-calendar-times"></i> Cancelled Analytics</a>
                                                    <a href="reports-analytics.php"><i class="fas fa-chart-area"></i> Transaction Analytics</a>
                                                    <a href="contact-tracing.php"><i class="fas fa-notes-medical"></i> Contact Tracing</a>
                                                    <a href="health-declaration-management.php"><i class="fas fa-book-medical"></i> Health Declaration</a>
                                                </div>
                                        </li>

                                        <li class="dropdown">
                                            <a class="dropbtn"></i> <i class="fas fa-user-friends"></i> Accounts <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                <div class="dropdown-content">
                                                    <a href="profile.php"><i class="fas fa-user-cog"></i> <?php echo $First_Name." ".$Last_Name; ?></a>
                                                    <input type="text" style="display: none;" id="idnumber" value="<?php echo $idnumber; ?>" readonly>
                                                    <a href="account-admin.php"><i class="fas fa-user-shield"></i> Admin</a>
                                                    <a href="change-password.php"><i class="fas fa-unlock-alt"></i> Change Password</a>
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
