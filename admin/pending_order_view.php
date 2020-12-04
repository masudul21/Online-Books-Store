<?php 
session_start();
if(!isset($_SESSION["sess_user_name"])){
  header("location:../index.php");
} else {
  ?> 

      <?php

      $con=mysqli_connect('localhost','root','') or die(mysql_error());
      mysqli_select_db($con,'bookshop') or die("cannot select DB");

      if (isset($_POST['submit'])) {

       

        $id=$_GET['id'];  

        $status=$_POST['status'];
        $date=date('Y-m-d');

        $query = mysqli_query($con,"UPDATE `order` set Complete_date='$date',
          status='$status' where order_id='$id'");
        mysqli_query($con,$query);

      }   

      ?>
  <?php include 'inc/header.php';?>
  <?php include 'inc/sidebar.php';?>
  <style>
   table{

    background-color: white;
    width: 1000px;

  }
</style>
<body>
 <div class="grid_10">
  <div class="box round first grid">
    <div class="block"> 

      <?php 
      if (isset($_GET['id'])) {
        $id=$_GET['id'];  
        $i=0;

        $result = mysqli_query($con,"SELECT *  FROM `order` where order_id='$id'
         ");



        while($row = mysqli_fetch_array($result)) {
          ?>
          <form class='form' method='post'  enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                
                <input type="hidden" name="order_id" class="form-control" id="pid"   value="<?php echo $row['order_id'];?>">
              </div>
              <div class="form-group">
                <label for="name"><b>Name:</b><br></label>
                <?php
                echo $row['name'];?>
              </div>

              <div class="form-group">
                <label for="serial_no"><b>Address:</b><br></label>
                <?php
                echo $row['address'];?>
              </div>
              <div class="form-group">
                <label for="price"><b>Phone No:</b><br></label>
                <?php
                echo $row['phone'];?>
              </div>

              <div class="form-group">
                <label for="serial_no"><b>Total:</b><br></label>
                <?php
                $result = mysqli_query($con,"SELECT SUM(price) AS price FROM order_history where order_id='$id'"); 
                $row = mysqli_fetch_assoc($result); 
                echo $sum = $row['price'].' tk';

                ?>

              </div>     

              <div class="form-group">
                <label for="price"><b>Status:</b><br></label>
                <select class="button" name="status" id="parent_id" border="2" >
                  <option value="Pending">Pending</option>
                  <option value="Confirm">Confirm</option>
                  <option value="Cencel">Cencel</option>

                </select>
              </div>

              <div class="box-footer">
                <input class="btn btn-danger" style="color: white;" type='submit' name='submit' value='update' onClick='sales_report_fn();' >
              </div>

              <?php
            }
          }

          ?>


          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>SL No</th>

                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>

                </tr>

                <?php 

                $id=$_GET['id'];  
                $i=0;

                $result = mysqli_query($con,"SELECT * FROM order_history where order_id='$id'
                 ");
                while($row = mysqli_fetch_array($result)) {
                  ?>

                  <tr>
                    <td><?php echo $i=$i+1;?></td>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['quantity'];?></td>
                    <td><?=$row['price'];?></td>
                    <td>

                    </td>

                  </tr>

                  <?php

                }?>

                <br><br></tbody></table></div>
                <div class="form-group">
                  <lebel><center><b>Total:</lebel>
                    <?php
                    $result = mysqli_query($con,"SELECT SUM(price) AS price FROM order_history where order_id='$id'"); 
                    $row = mysqli_fetch_assoc($result); 
                    echo $sum = $row['price'].' tk';

                    ?>
                    <?php            if (isset($_POST['submit'])) {

                      ?>

                      <script type="text/javascript">
                        window.location.href = 'order.php';
                      </script>
                      <?php
                    }
                    ?>
                  </b></center>
                </div></div></div>

              </body>
              </html>
              <?php include 'inc/footer.php';?><?php }?>