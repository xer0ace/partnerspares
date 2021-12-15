<?php
 require_once "include/config.php";
 include "include/main-header.php";
 $result_mssg ="";
 include 'ajax-queries/profile-update.php';?>
  <title>Account - Profile</title>
  <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="../../assets/js/vendor/bootstrap.min.js"></script>
        
   <link href="../../assets/css/profile-card.css" rel="stylesheet">

<?php 

$query = $link->query("SELECT 
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_admin`) as admincount,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_clients`) as clientcount,
      (SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders`) as transactionscount");

    while($fetch = $query->fetch_array()){
      $admincount = $fetch["admincount"];
      $clientcount = $fetch["clientcount"];
      $transactionscount = $fetch["transactionscount"];
    }

    $totalusers = $admincount + $clientcount;

?>

<section class="news-single nav-arrow-b">
 <div class="container">     
<div class="margin-login">
<div class="wrapper">
  <div class="profile-card js-profile-card">
    <div class="profile-card__img">
      <div id="pic">
        <img src="../../uploaded-files/admin/<?php echo $Picture; ?>" alt="profile card">
      </div>
    </div>

    <div class="profile-card__cnt js-profile-cnt">
      <div class="profile-card__name"><i class='far fa-user'></i> <?php echo "$full_username"; ?></div>
      <div class="profile-card__txt"><i class="far fa-id-card"></i> <?php echo $First_Name; ?> <strong><?php echo $Last_Name; ?></strong></div>
      <div class="profile-card-loc">
        
        <span id="idtxt" class="idtxt" style="color: #c0392b;"><?php echo $result_mssg; ?></span>
      </div>

      <div class="profile-card-inf">
        <div class="profile-card-inf__item">
          <div class="profile-card-inf__title"><?php echo $totalusers; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-users"></i> Total Users</div>
        </div>

        <div class="profile-card-inf__item">
          <a href="account-admin.php">
          <div class="profile-card-inf__title"><?php echo $admincount; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-users-cog"></i> Admins</div>
          </a>
        </div>

        <div class="profile-card-inf__item">
          <div class="profile-card-inf__title"><?php echo $clientcount; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-user-friends"></i> Clients</div>
        </div>

        <div class="profile-card-inf__item">
          <a href="reports-analytics.php">
          <div class="profile-card-inf__title"><?php echo $transactionscount; ?></div>
          <div class="profile-card-inf__txt"><i class="fas fa-list"></i> Total Transactions</div>
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
          <input type="text" name="username" placeholder="Username" class="form-control form-control-lg form-control-a input-field" value="<?php echo $full_username; ?>" readonly>
          <input type="text" name="lastname" placeholder="Last Name" class="form-control form-control-lg form-control-a input-field" value="<?php echo $Last_Name; ?>">
          <input type="text" name="firstname" placeholder="First Name" class="form-control form-control-lg form-control-a input-field" value="<?php echo $First_Name; ?>">
        </div>

        <div class="profile-card-form__bottom">
          <button type="submit" class="profile-card__button button--blue" name="save">
            <i class="far fa-save"></i> Save
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