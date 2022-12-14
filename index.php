<!DOCTYPE html>
<html lang="en">
<?php
session_start();
ob_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}
ob_end_flush();
?>

<style>
  .avatar {
    width: 40px;
    height: 40px;
    object-fit: cover;
    margin: 10px;
  }
</style>

<body id="page-top">
  <!-- Navigation-->
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <div class="header">
    <a href="index.php?page=home"><img class="logo" src="./assets/img/logo.png"></a>



    <ul class="nav">
      <li><a href="index.php?page=home">Home</a></li>
      <li><a href="index.php?page=about">About</a></li>
      <li><a href="#footer">Contact us</a></li>
      <?php if (isset($_SESSION['login_id'])) : ?>
        <li>
          <?php
          $sql = "SELECT * FROM users WHERE id = '{$_SESSION["login_id"]}'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <a class="username"><?php echo ($row['name']) ?><img class="avatar" src="assets/img/<?php echo ($row['avatar']) ?>" alt="" /></a>
          <?php
            }
          }
          ?>
          <ul class="subnav">
            <li><a href="index.php?page=profile">Profile</a></li>
            <li><a id="purchase-btn" href="index.php?page=purchase_order">History</a></li>
            <li><a id="logout-btn" href="logout.php">Logout</a></li>
          </ul>
        </li>
      <?php else : ?>
        <li><a class="nav_but login" href="index.php?page=login">LOG IN</a></li>
        <li><a class="nav_but signup" href="index.php?page=signup">SIGN UP</a></li>
      <?php endif; ?>
    </ul>
  </div>


  <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['setting_name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=flights"></span>Flight List</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        
                     
                    </ul>
                </div>
            </div>
        </nav> -->

  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : "home";
  include $page . '.php';
  ?>



  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="fa fa-arrow-righ t"></span>
          </button>
        </div>
        <div class="modal-body">
        </div>
      </div>
    </div>
  </div>
  <div id="preloader"></div>
  <footer class="bg-light py-5" id="footer">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Contact us</h2>
          <hr class="divider my-4" />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div><?php echo $_SESSION['setting_contact'] ?></div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!--  Make sure to change the email address in BOTH the anchor text and the link target below! -->
          <a class="d-block" href="mailto:<?php echo $_SESSION['setting_email'] ?>"><?php echo $_SESSION['setting_email'] ?></a>
        </div>
      </div>
    </div>
    <!-- <br>
    <div class="container">
      <div class="small text-center text-muted"> <?php echo $_SESSION['setting_name'] ?> | <a href="https://www.campcodes.com" target="_blank">CampCodes</a></div>
    </div> -->
  </footer>

  <?php include('footer.php') ?>
</body>

<?php $conn->close() ?>

</html>