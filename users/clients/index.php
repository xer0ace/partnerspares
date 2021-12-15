<?php
 require_once "include/config.php";
 include "include/main-header.php";?>
  <title>PPM - Home</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


  <section class="">
        <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                                  
                                    <div class="main_slider text-center">
                                       <div class="margin-login" style="color: #000">
                                          <a href="buy-food.php"><div class="col-md-2 main-home-menu"><i class="fas fa-store"></i> Buy Food</div></a>
                                          <a href="user-cart.php"><div class="col-md-2 main-home-menu"><i class="far fa-list-alt"></i> List</div></a>
                                          <a href="orders-to-pay.php"><div class="col-md-2 main-home-menu">
                                          <i class="fa fa-money"></i>  To Pay</div></a>
                                          <a href="orders-pending.php"><div class="col-md-2 main-home-menu"><i class="fas fa-tasks"></i> Pending Orders</div></a>
                                          <a href="orders-preparing.php"><div class="col-md-2 main-home-menu"><i class="fas fa-fire"></i> Preparing Orders</div></a>
                                          <a href="orders-to-receive.php"><div class="col-md-2 main-home-menu"><i class="fas fa-dolly-flatbed"></i> To Receive</div></a>
                                          <a href="orders-completed.php"><div class="col-md-2 main-home-menu"><span id="pending-counter" class="counter-notif"></span> <i class="fas fa-box-open"></i> Completed Orders</div></a>
                                          <a href="orders-cancelled.php"><div class="col-md-2 main-home-menu"><span id="preparing-counter" class="counter-notif"></span> <i class="fas fa-times-circle"></i> Cancelled Orders</div></a>
                                          
                                       </div>
                                    </div>

                                 </div>
                                 <div class="margin-footer">Z</div>
                                
                    </div>
                </div>
        </div>
          
</section>
        
   <section id="slider" class="slider">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                    <h1 class="header_front">Partners Pares & Mami House</h1>
                                    <p>Pares, Bulalo, Mami, Siopao, Siomai, Lugaw, Sizzling Sisig, at marami pang iba!</p>
                                    
                                </div>
                            </div>  
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="features">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_features_content_area  wow fadeIn" data-wow-duration="3s">
                            <div class="col-md-12">

                                <div id="best-seller">

                                    

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                                <h4>Delightful</h4>
                                <h3>Experience</h3>
                            </div>

                            <div class="main_portfolio_content">
                                <div id="data_grid"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ourPakeg" class="ourPakeg">
            <div class="container">
                <div class="main_pakeg_content">
                    <div class="row">
                        <div class="head_title text-center">
                            <h4>Amazing</h4>
                            <h3>Delicious</h3>
                        </div>

                        <div class="single_pakeg_one text-right wow rotateInDownRight">
                            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Menu 01</h4>
                                    </div>
                                    <ul>
                                       <div id="data_grid_1"></div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single_pakeg_two text-left wow rotateInDownLeft">
                            <div class="col-md-6 col-sm-8">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Menu 02</h4>
                                    </div>
                                    <ul>
                                       <div id="data_grid_2"></div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single_pakeg_three text-left wow rotateInDownRight">
                            <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>Menu 03</h4>
                                    </div>
                                    <ul>
                                       <div id="data_grid_3"></div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php include "include/main-footer.php" ?>
<script src="scripts/food-grid.js"></script>