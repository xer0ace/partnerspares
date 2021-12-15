<?php
 require_once "include/config.php";
 include "include/main-header.php";?>
  <title>Account - Admin</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        
      <section class="">
        <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                                <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                                  
                                    <div class="main_slider text-center">
                                       <div class="margin-login" style="color: #000">
                                          <a href="food-list.php"><div class="col-md-2 main-home-menu"><i class="fas fa-warehouse"></i> Inventory</div></a>
                                          <a href="food-grid-display.php"><div class="col-md-2 main-home-menu"><i class="fas fa-grip-horizontal"></i> Grid Display</div></a>
                                          <a href="food-menu-display.php"><div class="col-md-2 main-home-menu">
                                          <i class="fab fa-elementor"></i> Menu Display </div></a>
                                          <a href="food-best-seller.php"><div class="col-md-2 main-home-menu"><i class="fas fa-award"></i> Best Seller</div></a>
                                          <a href="category-list.php"><div class="col-md-2 main-home-menu"><i class="fas fa-filter"></i> Categories</div></a>
                                          <a href="table-management.php"><div class="col-md-2 main-home-menu"><i class="fas fa-chair"></i> Table Management</div></a>
                                          <a href="pending-orders.php"><div class="col-md-2 main-home-menu"><span id="pending-counter" class="counter-notif"></span> <i class="fas fa-tasks"></i> Pending Orders</div></a>
                                          <a href="order-preparing.php"><div class="col-md-2 main-home-menu"><span id="preparing-counter" class="counter-notif"></span> <i class="fas fa-fire"></i> Preparing Orders</div></a>
                                          <a href="in-transit-orders.php"><div class="col-md-2 main-home-menu"><span id="in-transit-counter" class="counter-notif"></span> <i class="fas fa-dolly"></i> In Transit Orders</div></a>
                                          <a href="completed-orders.php"><div class="col-md-2 main-home-menu"><span id="completed-counter" class="counter-notif"></span> <i class="fas fa-check-double"></i> Completed Orders</div></a>
                                          <a href="cancelled-orders.php"><div class="col-md-2 main-home-menu"><span id="cancelled-counter" class="counter-notif"></span> <i class="far fa-times-circle"></i> Cancelled Orders</div></a>
                                          <a href="orders-list.php"><div class="col-md-2 main-home-menu"><i class="fas fa-list-ul"></i> Orders List</div></a>
                                          <a href="reports-sales.php"><div class="col-md-2 main-home-menu"><i class="far fa-calendar"></i> Sales</div></a>
                                          <a href="reports-cancelled.php"><div class="col-md-2 main-home-menu"><i class="far fa-calendar-times"></i> Cancelled Analytics</div></a>
                                          <a href="reports-analytics.php"><div class="col-md-2 main-home-menu"><i class="fas fa-chart-area"></i> Transaction Analytics</div></a>
                                          <a href="contact-tracing.php"><div class="col-md-2 main-home-menu"><i class="fas fa-notes-medical"></i> Contact Tracing</div></a>
                                       </div>
                                    </div>

                                 </div>
                                 <div class="margin-footer">Z</div>
                                
                    </div>
                </div>
        </div>
          
</section>
        

<?php include "include/main-footer.php" ?>