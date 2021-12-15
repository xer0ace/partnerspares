<?php
 require_once "include/config.php";
 include "include/main-header.php";?>
  <title>Accounts - Change Password</title>
        
   <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                        
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                    <div class="margin-login">
                                <h2 class="login-header">Change Password</h2>
                                    <form action="#" id="formid" action="" method="post">
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-unlock icon"></i>
                                                <input type="password" class="form-control" id="newpass" placeholder="New Password" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-container">
                                                <i class="fa fa-lock icon"></i>
                                                <input type="password" class="form-control" id="confirmpass" placeholder="Confirm Password" required>
                                            </div>

                                        </div>
                                         <span class="login-error" id="idtxt"></span> 
                                         <span class="login-error"></span> <br>
                                         <div class="input-container">
                                            <button type="button" class="btn btn-success" id="save" name="add_student"> 
                                                <i class="far fa-edit"></i> Change Password
                                            </button>
                                        </div>
                                    </form> 
                                </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            

<?php include "include/footer.php" ?>
<script src="scripts/change-password-ajax.js"></script>