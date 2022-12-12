<style>
	.logo {
    margin-left: -30px;
    height: 50px;
    
  }
  nav#bg-primary{
      background: white !important;
  }
  a.text-white{
    color: black !important;
  }
</style>

<nav class="navbar navbar-light fixed-top bg-primary" id="bg-primary" style="padding: 0;">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
        <img class="logo" src="../assets/img/logo.png">
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white">
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" style="color: black;"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>