<?php
 require_once "include/config.php";
 include "include/header-form.php";?>
  <title>PPM - Health Declaration</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


  <section class="">
        <div class="container">
                <div class="row">
                  
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                       <div class="margin-login" style="color: #000">
                                          
                                         
                            <h2>Health Declaration Form</h2>
                            <h3>Nakakaranas ka ba ng:</h3>
                        
                           
                                    
                            <div id="data"></div>

                                
                           


                

                                          
                                       </div>
                                 </div>  
                </div>
        </div>
          
</section>
<?php include "include/main-footer.php" ?>
<script src="scripts/health-declaration.js"></script>
<?php
if (isset(($_POST["save"]))) {

  

}
?>
