<?php
 require_once "include/config.php";
 include "include/main-header.php";
$result_mssg ="";
 include 'ajax-queries/food-add.php';
 include 'ajax-queries/food-update.php';
 ?>
  <title>Food - List</title>
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
                                            <h2 class="login-header">Food - List</h2>
                                            <span id="idtxt" class="idtxt"><?php echo $result_mssg; ?></span>
                                            <form action="#" method="POST" enctype="multipart/form-data" action="<?php $_PHP_SELF ?>">
                                                <div class="form-group">
                                                    <div id="idinput"></div>
                                                    <div class="input-container">
                                                        <i class="fa fa-cutlery icon"></i>
                                                        <input type="text" class="form-control" id="name" placeholder="Name" required name="Name">
                                                    </div>
                                                </div>

                                                <div id="category-input"></div>
                                                

                                                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-money icon"></i>
                                                        <input type="number" class="form-control" id="price" placeholder="Price" required name="Price">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fas fa-list-ol icon"></i>
                                                        <input type="number" class="form-control" id="serving" placeholder="Serving" required name="Serving">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-container">
                                                        <i class="fa fa-archive icon"></i>
                                                        <select type="text" class="form-control" required id="availability" name="Availability">
                                                        	<option value="Availability" selected>Availability *</option>
                          									<option value="Yes">Yes</option>
                          									<option value="No">No</option>
                         								</select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p style="color: #000000">NOTE: Image must be less than 10 MB (Megabytes) to upload.</p>
                                                    <div class="input-container">
                                                        <i class="fa fa-picture-o icon"></i>
                                                        <input type="file" name="file" id="file" class="form-control" name="image" accept="image/png, image/jpeg">
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-success" id="save" name="add_food"> 
                                                    <span class="fa fa-floppy-o" aria-hidden="true"></span> Add Food 
                                                </button>
                                                  
                                                <button type="submit" id="update" class="btn btn-warning" name="update_food">
                                                  <span class="fa fa-pencil-square-o"></span> Update Food Details
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
<?php include "include/main-footer.php" ?>
<script src="scripts/food-ajax-crud.js"></script>