<?php

 require_once "include/config.php";
 include "include/main-header.php";?>
  <title>Health Declaration Management</title>
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
                                            <h2 class="login-header">Health Declaration Management</h2>
                                            <span id="idtxt"></span>
                                            <form action="#" method="POST">
                                                <div class="form-group">
                                                    <div id="idinput"></div>
                                                     <input style="color: #000; display: none;" type="text" name="" readonly id="healthid">
                                                    <div class="input-container">
                                                        <i class="fas fa-sort-numeric-down icon"></i>
                                                        <input type="text" class="form-control" id="topic" placeholder="Title" required>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fas fa-users icon"></i>
                                                        <textarea class="form-control" id="description_edit" placeholder="Description" required></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <!-- <button type="button" class="btn btn-success" id="save" name="add_student"> <span class="fa fa-floppy-o" aria-hidden="true"></span> Add Table </button> -->
                                                  <button type="button" id="update" class="btn btn-warning">
                                                  <span class="fa fa-pencil-square-o"></span> Update Table
                                                </button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                    <div class="margin-login">
                                        <h3 style="color: #2ecc71">Desciption</h3>
                                        <p style="color: #000000" id="description">{see here}
                                        </p>
                                        <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
<?php include "include/main-footer.php" ?>
<script src="scripts/health-declaration-ajax.js"></script>