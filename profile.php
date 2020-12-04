<?php include('header.php');?>
<?php  include('config/config.php');?>

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
   <?php include('navbar.php');?>
   <!-- //Header -->
   <!-- //Header -->
   <!-- Start Search Popup -->

   <div class="ht__bradcaump__area bg-image--7">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="bradcaump__inner text-center">
            <h2 class="bradcaump-title">Profile</h2>
            <nav class="bradcaump-content">
              <a class="breadcrumb_item" href="index.html">Home</a>
              <span class="brd-separetor">/</span>
              <span class="breadcrumb_item active">Profile</span>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="wn__checkout__area section-padding--lg bg__white">
    <div class="container">

      <div class="row">
        <div class="col-md-4">

          <div class="clear"></div>
        </div>
        <center> <table class="table" style="border-color: black;">
          <?php $a= $_SESSION['unm'];    $con=mysqli_connect('localhost','root','') or die(mysql_error());
          mysqli_select_db($con,'bookshop') or die("cannot select DB");

          $user=mysqli_query($con,"SELECT * 
           FROM `user` where u_unm='$a'");

          while($values= mysqli_fetch_array($user))
            foreach ($user as $values) { ?>

              <tr><th><h3>Name:</th><td><?= $values['u_fnm'] ?></h3></td></tr>
              <tr><th><h3>User name:</th><td><?= $values['u_unm'] ?></h3></td></tr>

              <tr><th><h3>Email:</th><td><?= $values['u_email'] ?></h3></td></tr>

              <tr><th><h3>Phone:</th><td><?= $values['u_contact'] ?></h3></td></tr>
              <tr><th><h3>Gender:</th><td><?= $values['u_gender'] ?></h3></td></tr>

              <tr><th><a href="profile_update.php?id=<?=$values['u_id']?>"><butto class="btn btn-primary " >Edit</button></a></th></tr>

              <?php }?>
            </table></center>
          </div>



        </div>	
      </div>
      <?php include ('footer.php');?>