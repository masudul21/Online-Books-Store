<?php include('header.php');?>
<?php  include('config/config.php');?>

<?php
$con=mysqli_connect('localhost','root','') or die(mysql_error());
mysqli_select_db($con,'bookshop') or die("cannot select DB");
if (isset($_POST['submit'])) {
  $fid=$_POST['pid'];
  $name=$_POST['name'];
  $number=$_POST['number'];
  $email=$_POST['email']; 

  $address=$_POST['address'];
  $pass=$_POST['pass'];


  $query = "UPDATE user set
  u_unm='$name',u_contact='$number',u_pwd='$pass',u_email='$email',u_city='$address' where u_id='$fid'";

  if(mysqli_query($con, $query))
  {
    echo "<div class='alert alert-success'>";
    echo "<center>Your Submited Data Updated Succesfully</center>";
    echo "</div>";
  }

  else {
    echo "ERROR" . mysqli_error($con);
  }
}


?>

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
          <div class="col-md-6 offset-md-4">
            <div class="box">

              <?php     

              $query1=mysqli_query($con,"SELECT * 
               FROM `user` where u_id='$_GET[id]' ");
              // var_dump($query);
              // exit();
              while($result1= mysqli_fetch_array($query1))
                foreach ($query1 as $result1) { ?>

                  <center><form id="form_444844" class="appnitro"  method="POST" action="";>



                    <input name="pid" type="hidden" value="<?= $result1['u_id'] ?>"><br>


                    Full Name:<br>
                    <input  class="form-control" name="name" type="text" value="<?= $result1['u_unm'] ?>" required>
                    <br>
                    Phone Number:<br>
                    <input  class="form-control" name="number" type="text" value="<?=$result1['u_contact']?>" placeholder="" required><br>
                    Email:<br>
                    <input  class="form-control" name="email" value="<?=$result1['u_email']?>" type="email" required>
                    <br>

                    City:<br>
                    <input  class="form-control" name="address" type="text" value="<?=$result1['u_city']?>" placeholder="" required><br>

                    Password:<br>
                    <input  class="form-control" name="pass" type="password" value="<?=$result1['u_pwd']?>" placeholder="" required><br>

                    <input type="submit" class="btn btn-success" name="submit" value="Submit">

                  </form></center>


                <?php }?>

              </div></div>
            </div></div></div></div>
            <?php include ('footer.php');?>