<?php
 require_once "include/config.php";
 include "include/main-header.php";
$result_mssg ="";
 ?>
  <title>Reports - Transaction Analytics</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div class="container">
              <div class="row">
                  <div class="single_widget wow fadeIn">
                      <div class="margin-login">
                          <h4 class="login-header">Reports - Transaction Analytics</h4>
                            <div id="data" >
                                <label style="color:#2ecc71;"> Select a Month</label>
                                  <div class="col">
                                    <input type="month" id="month-picker" class="form-control" style="width: 25%;">
                                  </div>
                                  <div class="dashboard">
                                      <div class="col-md-12">
                                        <div id="curve_chart" style="height: 500px"></div>
                                      </div>
                                  </div>
                                  <div class="dashboard">
                                      <div class="col-md-4">
                                        <div id="donutchart" style="height: 500px;"></div>
                                      </div>

                                       <div class="col-md-8">
                                          <h4>Latest Transactions</h4>
                                          <div>
                                            <table class="transactions">
                                                <thead>
                                                  <th>Customer</th>
                                                  <th>Date</th>
                                                  <th>Items</th>
                                                  <th>Amount</th>
                                                  <th>Status</th>
                                                </thead>
                                                  <tbody id="transactions-list"></tbody>
                                            </table>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-12 dashboard">
                                      <div id="columnchart_material" style="height: 500px"></div>
                                  </div>
                                  <div class="col-md-12 dashboard">
                                      <div id="monthly_sales" style="height: 500px"></div>
                                  </div>

                                  <div class="col-md-2" style="color: #fff">..</div>
                                  
                            </div>
                      </div>
                  </div>
                
              </div>
            </div>
<?php include "include/main-footer.php" ?>
<script src="scripts/reports-analytics.js"></script>