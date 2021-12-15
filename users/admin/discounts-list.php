<?php

 require_once "include/config.php";
 include "include/main-header.php";
$result_mssg ="";
 ?>
  <title>Discount List</title>
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
                                            <h2 class="login-header">Discount List</h2>
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
                                        <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

                  
<?php include "include/main-footer.php" ?>
<script src="scripts/discount-list-ajax.js"></script>