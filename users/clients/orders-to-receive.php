<?php
 require_once "include/config.php";
 include "include/main-header.php";

 ?>
  <title>PPM - To Receive Orders</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      
<section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                   
                        <div class="col-md-12">
                            <div class="margin-login">
                                <div class="search-container">
                                  <h4>To Receive Orders</h4>
                                    <div class="input-container">
                                        <i class="fa fa-search icon"></i>
                                        <input type="text" class = "searchInput" name="search_bar" placeholder="Search Orders"  id="search_name" onkeyup="GetDetail(this.value)"> 
                                        <div id="cart-id"></div>
                                    </div>

                                </div>
                               
                            <table id="mainTbl"  cellspacing='0' style='width:100%'>
                            <thead></thead>
                                <tbody id="food-table">

                                    

                                </tbody>
                                <tfoot>
                                      <tr class='notfound'>
                                        <td colspan='1'>No Product Found</td>
                                      </tr>
                                </tfoot>
                        </table>
                            </div>
                        </div>
                   
                </div>
            </div>
        </section>
<?php include "include/main-footer.php" ?>
<script src="scripts/orders-to-receive-ajax.js"></script>
 