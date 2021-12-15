<?php

 require_once "include/config.php";
 include "include/main-header.php";
$result_mssg ="";
 ?>
  <title>Food - Grid Display</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                        
                                <div class="col-md-4">
                                    <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                        <div class="margin-login">
                                            <h2 class="login-header">Food - Grid Display</h2>
                                            <span id="idtxt" class="idtxt"><?php echo $result_mssg; ?></span>
                                            <form action="#" method="POST">

                                                <div id="selects"></div>
                                               
                                                <br>
                                                <button type="button" class="btn btn-warning" id="save" name="add_food"> 
                                                    <span class="fa fa-floppy-o" aria-hidden="true"></span> Update Grid Display 
                                                </button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                    <div class="margin-login">
                                        <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>


             <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                     <div class="margin-login">
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
            </div>
        </section>
<?php include "include/main-footer.php" ?>
<script src="scripts/food-grid-ajax.js"></script>