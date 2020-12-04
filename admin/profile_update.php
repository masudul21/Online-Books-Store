<?php session_start(); include 'inc/header.php';?>
<center>
              <div class="row">
        <!-- left column -->
        <div class="col-md-10 col-md-offset-1">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Admin Info</h3>
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <?php   
              $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");
             $result = mysqli_query($con,"SELECT * FROM admin");
             $row = mysqli_fetch_array($result); {
                ?>
              <div class="box-body">
                <div class="form-group">
<!--                   <label for="pid">PID</label> -->
                  <input type="hidden" name="uid" class="form-control" id="uid"   value="<?php echo $row['uid'];?>">
                </div>

                  <label for="name">Admin Name :<?php echo $row['name'];?> </label><br>
     
              

   
                  <label for="serial_no">Email:<?php echo $row['email'];?></label><br>
                  
          
                 <div class="form-group">
                  <label for="point">Password</label>
<br>
                <a class="btn btn-default" style="color: black;" href=<?php echo"password_update.php?update={$row['id']}"?>><span class="glyphicon glyphicon-lock">Change Password</a>
                </div>
                <!-- style="color:red; font-size:18px;"> -->
                               
              <div class="box-footer">
              
                <a class="btn btn-success" style="color: white;" href=<?php echo"admin_update.php?update={$row['id']}"?>><span class="glyphicon glyphicon-pencil">Edit Another Info</a>
              
               <?php
}
?>                 
            </div>
          </div>
      </div>
  </div>
</center>
 <?php include 'inc/footer.php';?>