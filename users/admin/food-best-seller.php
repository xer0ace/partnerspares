<?php

 require_once "include/config.php";
 include "include/main-header.php";
$result_mssg ="";
 ?>
  <title>Food - Best Seller</title>
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
                                            <h2 class="login-header">Food - Best Seller</h2>
                                            <span id="idtxt" class="idtxt"><?php echo $result_mssg; ?></span>
                                            <form action="#" method="POST">

                                                <div id="category-input"></div>

                                                <div id="selects"></div>                                           

                                                <br>
                                                <button type="button" class="btn btn-warning" id="save" name="add_food"> 
                                                    <span class="fa fa-floppy-o" aria-hidden="true"></span> Update Best Seller Display 
                                                </button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                    <div class="margin-login">
                                        <img src="../../uploaded-files/food-items/template.png" class="profile-image" id="picturePic">
                                        <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

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
       
            
                  
<?php include "include/main-footer.php" ?>
<script src="scripts/food-best-seller-ajax.js"></script>