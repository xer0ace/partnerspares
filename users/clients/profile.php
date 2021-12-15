<?php
 require_once "include/config.php";
 include "include/main-header.php";
  $result_mssg ="";
  include 'ajax-queries/profile-update.php';?>
  <title>Account - <?php echo $First_Name." ".$Last_Name  ?></title>
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
        
   <link href="../../assets/css/profile-card.css" rel="stylesheet">

<?php 

$query = $link->query("SELECT 
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_to_pay` WHERE Client_ID = '$Client_ID') as totalpay,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_cart` WHERE Client_ID = '$Client_ID' AND Status = 'To Pay') as totalcart,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Client_ID = '$Client_ID') as totaltransactions,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Client_ID = '$Client_ID' AND Order_Status = 'Pending') as totalpending,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Client_ID = '$Client_ID' AND Order_Status = 'Preparing') as totalpreparing,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Client_ID = '$Client_ID' AND Order_Status = 'In-Transit') as totalintransit,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Client_ID = '$Client_ID' AND Order_Status = 'Completed') as totalcompleted,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Client_ID = '$Client_ID' AND Order_Status = 'Cancelled') as totalcancelled
      ");

    while($fetch = $query->fetch_array()){
      $totalpay = $fetch["totalpay"];
      $totalcart = $fetch["totalcart"];
      $transactionscount = $fetch["totaltransactions"];
      $totalpending = $fetch["totalpending"];
      $totalpreparing = $fetch["totalpreparing"];
      $totalintransit = $fetch["totalintransit"];
      $totalcompleted = $fetch["totalcompleted"];
      $totalcancelled = $fetch["totalcancelled"];
    }

?>

<section class="news-single nav-arrow-b">
 <div class="container">     
<div class="margin-login">
<div class="wrapper">
  <div class="profile-card js-profile-card">
    <div class="profile-card__img">
      <div id="pic">
        <img src="../../uploaded-files/clients/<?php echo $picture; ?>" alt="profile card">
      </div>
    </div>

    <div class="profile-card__cnt js-profile-cnt">
      <div class="profile-card__name"><i class='far fa-user'></i> <?php echo "$full_username"; ?></div>
      <div class="profile-card__txt"><i class="far fa-id-card"></i> <?php echo $First_Name; ?> <strong><?php echo $Last_Name; ?></strong></div>
      <div class="profile-card-loc">
        <span class="profile-card-loc__icon">
          <i class='fas fa-map-marker-alt'></i>
        </span>

        <span class="profile-card-loc__txt">
           <?php echo $Municipality_City.", ".$Barangay.", ".$Street_Purok; ?>
        </span>

        
      </div>
      <br>
     <strong><i class='fas fa-phone-alt'></i> <?php echo $Contact; ?></strong><br>
      <span id="idtxt" class="idtxt" style="color: #c0392b;"><?php echo $result_mssg; ?></span>
      <div class="profile-card-inf">
        <div class="profile-card-inf__item">
          <div class="profile-card-inf__title"><?php echo $transactionscount; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-list"></i> Total Transactions</div>
        </div>

        <div class="profile-card-inf__item">
          <a href="user-cart.php">
          <div class="profile-card-inf__title"><?php echo $totalcart;  ?></div>
          <div class="profile-card-inf__txt"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart</div>
          </a>
        </div>

        <div class="profile-card-inf__item">
          <a href="orders-to-pay.php">
          <div class="profile-card-inf__title"><?php echo $totalpay; ?></div>
          <div class="profile-card-inf__txt"><i class="fa fa-money" aria-hidden="true"></i> To Pay</div>
          </a>
        </div>

        <div class="profile-card-inf__item">
          <a href="orders-pending.php">
          <div class="profile-card-inf__title"><?php echo $totalpending; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-tasks"></i> Pending Orders</div>
          </a>
        </div>

        <div class="profile-card-inf__item">
          <a href="orders-preparing">
          <div class="profile-card-inf__title"><?php echo $totalpreparing; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-fire"></i> Preparing Orders</div>
          </a>
        </div>

        <div class="profile-card-inf__item">
          <a href="orders-to-receive.php">
          <div class="profile-card-inf__title"><?php echo $totalintransit; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-dolly-flatbed"></i> To Receive</div>
          </a>
        </div>

        <div class="profile-card-inf__item">
          <a href="orders-completed.php">
          <div class="profile-card-inf__title"><?php echo $totalcompleted; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-box-open"></i> Completed Orders</div>
          </a>
        </div>

        <div class="profile-card-inf__item">
          <a href="orders-cancelled.php">
          <div class="profile-card-inf__title"><?php echo $totalcancelled; ?></div>
          <div class="profile-card-inf__txt"><i class="far fa-times-circle"></i> Cancelled Orders</div>
          </a>
        </div>
      </div>

      

      <div class="profile-card-ctr">
        <button class="profile-card__button button--blue js-message-btn"><i class="fas fa-user-edit"></i> Edit Details</button>
      </div>
    </div>
    <!---- Window Modal Box --->
    <div class="profile-card-message js-message">
      <form class="profile-card-form" method="POST" enctype="multipart/form-data" action="<?php $_PHP_SELF ?>" >
        <div class="profile-card-form__container">
          Profile Picture
            <p>NOTE: Image must be less than 10 MB (Megabytes) to upload.</p>
          <input type="File" name="file" class="form-control form-control-lg form-control-a input-field" accept="image/png, image/jpeg">
          <input type="text" name="username" placeholder="Username" class="form-control form-control-lg form-control-a input-field" value="<?php echo $full_username; ?>" readonly style='display: none;'>
          <input type="text" name="lastname" placeholder="Last Name" class="form-control form-control-lg form-control-a input-field" value="<?php echo $Last_Name; ?>">
          <input type="text" name="firstname" placeholder="First Name" class="form-control form-control-lg form-control-a input-field" value="<?php echo $First_Name; ?>">
          <input type="text" name="contact" placeholder="Contact" class="form-control form-control-lg form-control-a input-field" value="<?php echo $Contact; ?>">
          <input type="text" name="municipality" placeholder="Municipality/City" class="form-control form-control-lg form-control-a input-field" value="<?php echo $Municipality_City; ?>">
          <input type="text" name="barangay" placeholder="Barangay" class="form-control form-control-lg form-control-a input-field" value="<?php echo $Barangay; ?>">
          <input type="text" name="street_purok" placeholder="Street/Purok" class="form-control form-control-lg form-control-a input-field" value="<?php echo $Street_Purok; ?>">
        </div>

        <div class="profile-card-form__bottom">
          <button type="submit" class="profile-card__button button--blue" name="save">
            <i class="far fa-save"></i>  Save
          </button>

          <button class="profile-card__button button--gray js-message-close">
            <i class="far fa-window-close"></i> Cancel
          </button>
        </div>
      </form>

      <div class="profile-card__overlay js-message-close"></div>
    </div>
    <!---- Modal Box End ---->

  </div>

</div>

</div>
      
    
  </div>
</section>
<?php 
include "include/main-footer.php";

?>
<script src="../../scripts/profile-card.js"></script>