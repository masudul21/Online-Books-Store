<?php 
session_start();
if(!isset($_SESSION["sess_user_name"])){
  header("location:../index.php");
} else {
?> 
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 <?php
  $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");
 if (isset($_POST['submit'])) {
$fid=$_POST['pid'];
$name=$_POST['name'];
$address=$_POST['address'];
    $contact=$_POST['contact'];



                         
   $query = "UPDATE publisher set
name='$name',address='$address',contact='$contact' where id='$fid'";

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
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-0">
        <div class="box">
       
  <?php     

              $query1=mysqli_query($con,"SELECT * 
                         FROM `publisher` where id='$_GET[id]' ");
              // var_dump($query);
              // exit();
              while($result1= mysqli_fetch_array($query1))
              foreach ($query1 as $result1) { ?>
 
<form id="form_444844" class="appnitro"  method="POST" action="";>



<input name="pid" type="hidden" value="<?= $result1['id'] ?>"><br>

 
Publisher Name:<br>
<input  class="form-control" name="name" type="text" value="<?= $result1['name'] ?>" required>
<br>
Address:<br>
<input  class="form-control" name="address" type="text" value="<?= $result1['address'] ?>" required>
<br>
Contact:<br>
<input  class="form-control" name="contact" type="text" value="<?= $result1['contact'] ?>" required>
<br>
<input type="submit" class="btn btn-success" name="submit" value="Submit">

</form>


    <?php }?>

</div></div>
</div></div></div></div>
<?php include 'inc/footer.php';?>
<?php } ?>