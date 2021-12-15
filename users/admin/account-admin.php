<?php

 require_once "include/config.php";
 include "include/main-header.php";?>
  <title>Account - Admin</title>
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
                                            <h2 class="login-header">Account - Admin</h2>
                                            <span id="idtxt"></span>
                                            <form action="#" method="POST">
                                                <div class="form-group">
                                                    <div id="idinput"></div>
                                                    <div class="input-container">
                                                        <i class="fa fa-user icon"></i>
                                                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-user icon"></i>
                                                        <input type="text" class="form-control" id="lastname" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-user icon"></i>
                                                        <input type="text" class="form-control" id="firstname" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-success" id="save" name="add_student"> <span class="fa fa-floppy-o" aria-hidden="true"></span> Create Admin Account </button>
                                                  <button type="button" id="update" class="btn btn-warning">
                                                  <span class="fa fa-pencil-square-o"></span> Update Admin Account
                                                </button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                    <div class="margin-login">
                                        <img src="../../uploaded-files/admin/template.png" class="profile-image" id="picturePic">
                                        <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
<?php include "include/main-footer.php" ?>
<script src="scripts/admins-ajax-crud.js"></script>