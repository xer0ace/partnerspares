<?php
 require_once "include/config.php";
 include "include/main-header.php";
 ?>
  <title>Category - List</title>
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
                                            <h2 class="login-header">Category - List</h2>
                                            <span id="idtxt" class="idtxt"></span>
                                            <form action="#" method="POST">
                                                <div class="form-group">
                                                    <div id="idinput"></div>
                                                    <div class="input-container">
                                                        <i class="fa fa-cutlery icon"></i>
                                                        <input type="text" class="form-control" id="name" placeholder="Name" required name="Name">
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-success" id="save" name="add_food"> 
                                                    <span class="fa fa-floppy-o" aria-hidden="true"></span> Add Category 
                                                </button>
                                                  
                                                <button type="button" id="update" class="btn btn-warning" name="update_food">
                                                  <span class="fa fa-pencil-square-o"></span> Update Category Details
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
<script src="scripts/food-category.js"></script>