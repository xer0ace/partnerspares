<?php
 require_once "include/config.php";
 include "include/main-header.php";
  include "ajax-queries/pay-items.php";


 ?>
  <title>PPM - To Pay</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      
<section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                   
                        <div class="col-md-12">
                            <div class="margin-login">

                                <div class="search-container"></div>
                                <img src="../../assets/images/gcash.jpg" class="gcash">
                            
                                <div id="food-table">
                                </div>
                               
                            </div>
                        </div>
                   
                </div>
            </div>
        </section>
<?php include "include/main-footer.php" ?>
<script src="scripts/user-to-pay.js"></script>
