<?php
 require_once "include/config.php";
 include "include/main-header.php";
$result_mssg ="";
 ?>
  <title>Contact - Tracing</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <link href="../../assets/css/evaluation.css" rel="stylesheet">
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                                <div class="col">
                                    <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                        <div class="margin-login">
                                            <h4 class="login-header">Contact - Tracing</h4>
                                            <div id="data" style="overflow-x:auto;">
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>

            <div>

            <?php ?>

        
        <form id='eval-paper'>
          <div id='doc2' class='yui-t7'>
            <div id='inner'>
            
              <div id='hd'>
                <div class='yui-gc'>
                  <div class='yui-u first'>
                     <img src=
                    'https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0'
                        class='".qr-code1 img-thumbnail img-responsive qr-code1' />
                    <h1><i class="fas fa-id-card"></i></h1>
                    <h1 id="name">Name</h1>
                    <h2><i class="fas fa-map-marker-alt"></i></h2>
                    <h2 id="address">Address</h2>
                    <h2><i class="fas fa-phone-alt"></i></h2>
                    <h2 id="contact">Contact</h2>
                    <h2><i class="fas fa-calendar-day"></i></h2>
                    <h2 id="date">Date | Time</h2>
                    <img class='staff-photo' src='../../uploaded-files/clients/client-default.png' id="profilepic">
                  </div>

                 
                </div><!--// .yui-gc -->
              </div><!--// hd -->

              <div id='bd'>
                <div id='yui-main'>

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u first'>
                        <h3>Nakakaranas ng:</h3>
                      </div>


                      <div class='yui-u'>
                        <p class='enlarge'>
                         Lagnat
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="lagnat" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u'>
                        <p class='enlarge'>
                           Ubo at/o sipon
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="ubo" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u'>
                        <p class='enlarge'>
                           Pananakit ng Katawan
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="katawan" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u'>
                        <p class='enlarge'>
                         Pananakit ng lalamunan/masakit lumunok
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="lumunok" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u'>
                        <p class='enlarge'>
                         May nakasalamuha ka ba na probable o kumpirmadong pasyente na may COVID-19 case mula sa isang metrong distansya o mas malapit pa at tumagal ng  mahigit 15 minuto sa nakalipas na 14 na araw?
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="nakasalamuha" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u'>
                        <p class='enlarge'>
                         Nag alaga ka ba ng probable o kumpirmadong pasyente na may COVID-19 ng hindi nakasuot ng tamang personal equipment sa nakalipas na 14 na araw?
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="alaga" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u'>
                        <p class='enlarge'>
                         Ikaw ba ay nagbyahe sa labas ng Pilipinas sa nakalipas na 14 na araw?
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="nagbyahe" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                  <div class='yui-b'>
                    <div class='yui-gf'>
                      <div class='yui-u'>
                        <p class='enlarge'>
                         I Ikaw ba ay nagbyahe sa labas ng iyong lungsod/munisipyo sa nakalipas na 14 na araw?
                        </p>
                          <table class='rating-feedback'>
                            <thead>
                              <tr>
                                <th>
                                  <input type="text" name="" value="" id="lungsod" readonly>
                                </th>
                              <tr>
                            </thead>
                        </table>
                      </div>
                    </div><!--// .yui-gf -->
                  </div><!--// .yui-b -->

                 


                </div><!--// yui-main -->
              </div><!--// bd -->

              

             

            </div><!-- // inner -->


          </div><!--// doc -->
          </form>

            </div>
<?php include "include/main-footer.php" ?>
<script src="scripts/contact-tracing-ajax.js"></script>
