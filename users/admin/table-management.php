<?php

 require_once "include/config.php";
 include "include/main-header.php";?>
  <title>Table Management</title>
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
                                            <h2 class="login-header">Table Management</h2>
                                            <span id="idtxt"></span>
                                            <form action="#" method="POST">
                                                <div class="form-group">
                                                    <div id="idinput"></div>
                                                    <div class="input-container">
                                                        <i class="fas fa-sort-numeric-down icon"></i>
                                                        <input type="text" class="form-control" id="tablenumber" placeholder="Table Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div id="idinput"></div>
                                                    <div class="input-container">
                                                        <i class="fas fa-users icon"></i>
                                                        <input type="number" class="form-control" id="capacity" placeholder="Capacity" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fas fa-info icon"></i>
                                                        <select type="text" class="form-control" required id="status" name="Status">
                                                            <option value="Status" selected>Status *</option>
                                                            <option value="Available">Available</option>
                                                            <option value="Occupied">Occupied</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-success" id="save" name="add_student"> <span class="fa fa-floppy-o" aria-hidden="true"></span> Add Table </button>
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
                                        <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
<?php include "include/main-footer.php" ?>
<script src="scripts/table-management-ajax.js"></script>