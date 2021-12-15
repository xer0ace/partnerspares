<?php
 require_once "include/config.php";
 include "include/main-header.php";
$result_mssg ="";
 ?>
  <title>Repots - Orders List</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                                <div class="col">
                                    <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                        <div class="margin-login">
                                            <h4 class="login-header">Reports - Orders List</h4>
                                            <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
<?php include "include/main-footer.php" ?>
<script src="scripts/orders-list-ajax.js"></script>
