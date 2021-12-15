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
                        
                                <form id="contact-form">
                                <table class="contact-tracing">
                                    <tr>
                                        <th>
                                            Lagnat
                                        </th>
                                         <th>
                                            <label for='lagnatY'>Oo</label>
                                            <input type='radio' id='lagnatY' name='lagnat' value='Yes'>
                                        </th>
                                         <th>
                                            <label for='lagnatN'>Hindi</label>
                                            <input type='radio' id='lagnatN' name='lagnat' value='No'>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Ubo at/o sipon
                                        </th>
                                         <th>
                                           <label for='UboY'>Oo</label>
                                            <input type='radio' id='UboY' name='ubo' value='Yes'>
                                        </th>
                                         <th>
                                           <label for='UboN'>Hindi</label>
                                            <input type='radio' id='UboN' name='ubo' value='No'>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pananakit ng Katawan
                                        </th>
                                         <th>
                                            <label for='katawanY'>Oo</label>
                                            <input type='radio' id='katawanY' name='katawan' value='Yes'>
                                        </th>
                                         <th>
                                           <label for='katawanN'>Hindi</label>
                                            <input type='radio' id='katawanN' name='katawan' value='No'>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pananakit ng lalamunan/masakit lumunok
                                        </th>
                                         <th>
                                            <label for='lalamunanY'>Oo</label>
                                            <input type='radio' id='lalamunanY' name='lalamunan' value='Yes'>
                                        </th>
                                         <th>
                                             <label for='lalamunanN'>Hindi</label>
                                            <input type='radio' id='lalamunanN' name='lalamunan' value='No'>
                                        </th>
                                    </tr>

                                    <tr>
                                            <th>
                                                <p>May nakasalamuha ka ba na probable o kumpirmadong pasyente na may COVID-19 case mula sa isang metrong distansya o mas malapit pa at tumagal ng  mahigit 15 minuto sa nakalipas na 14 na araw? </p>
                                            </th>
                                            <th>
                                                <label for='nakasalamuhaY'>Oo</label>
                                                <input type='radio' id='nakasalamuhaY' name='nakasalamuha' value='Yes'>
                                            </th>
                                            <th>
                                                <label for='nakasalamuhaN'>Hindi</label>
                                                <input type='radio' id='nakasalamuhaN' name='nakasalamuha' value='No'>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th><p>
                                                Nag alaga ka ba ng probable o kumpirmadong pasyente na may COVID-19 ng hindi nakasuot ng tamang personal equipment sa nakalipas na 14 na araw?
                                            </p></th>
                                            <th>
                                                <label for='alagaY'>Oo</label>
                                                <input type='radio' id='alagaY' name='alaga' value='Yes'>
                                            </th>
                                            <th>
                                                <label for='alagaN'>Hindi</label>
                                                <input type='radio' id='alagaN' name='alaga' value='No'>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th><p>
                                               Ikaw ba ay nagbyahe sa labas ng Pilipinas sa nakalipas na 14 na araw?
                                            </p></th>
                                            <th>
                                                <label for='nagbyaheY'>Oo</label>
                                                <input type='radio' id='nagbyaheY' name='nagbyahe' value='Yes'>
                                            </th>
                                            <th>
                                                <label for='nagbyaheN'>Hindi</label>
                                                <input type='radio' id='nagbyaheN' name='nagbyahe' value='No'>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th><p>
                                               Ikaw ba ay nagbyahe sa labas ng iyong lungsod/munisipyo sa nakalipas na 14 na araw?
                                            </p></th>
                                            <th>
                                                <label for='lungsodY'>Oo</label>
                                                <input type='radio' id='lungsodY' name='lungsod' value='Yes'>
                                            </th>
                                            <th>
                                                <label for='lungsodN'>Hindi</label>
                                                <input type='radio' id='lungsodN' name='lungsod' value='No'>
                                            </th>
                                        </tr>
                                </table>
                            </form>
                           

                    <hr>
                     <button type='button' id='submit' class='btn btn-success'>
                        <span class='fa fa-pencil-square-o'></span> Submit
                     </button>
                

                                          
                                       </div>
                                 </div>  
                </div>
        </div>
          
</section>
<?php include "include/main-footer.php" ?>
<script src="scripts/send-contact-tracing.js"></script>
