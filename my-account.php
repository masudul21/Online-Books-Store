<?php
 session_start();
 extract($_POST);
 extract($_SESSION);

if(empty( $_SESSION['unm']) ){
 header("location:register.php");
}

 else {?>
<?php include('header.php');?>
<?php  include('config/config.php');?>

	<div class="wrapper" id="wrapper">
		<!-- Header -->
   <?php include('navbar.php');?>

            

             <div class="ht__bradcaump__area bg-image--7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">My orders</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">My order</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <section class="wn__checkout__area section-padding--lg bg__white">
            <div class="container">
            
                <div class="row">
    <div class="col-md-12">
     <table class="table table-hover">
      <tbody>
        <tr>
          <th>SL No</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Order Date</th>
          <th>Confirm Date</th>
          <th>Status</th>
        </tr>
        <?php   
        $con=mysqli_connect('localhost','root','') or die(mysql_error());
        mysqli_select_db($con,'bookshop') or die("cannot select DB");

        $result = mysqli_query($con,"SELECT * FROM `order` where customer_id='$_SESSION[u_id]'");
        $i=0;

        while($row = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo ++$i;?></td>
            <td><?=$row['name'];?></td>
            <td><?=$row['phone'];?></td>
            <td><?=$row['address'];?></td>
            <td><?=$row['date'];?></td>
            <td><?=$row['complete_date'];?></td>
            <td style="font-size: 22px;">
              <?php if($row['status']=='Complete'){ 
                echo'<span class="label label-success" style="background-color:red;padding-right:10px;padding-left:15px;">'.$row['status'].'</span>'; }
               
                  elseif($row['status']=='Cencel'){ 
                    echo'<span class="label label-info" style="background-color:#D1FF33;padding-right:15px;padding-left:29px;">'.$row['status'].'</span>'; }
                    else{echo'<span class="label label-warning" style="background-color:yellow;padding-right:15px;padding-left:15px;" >'.$row['status'].'</span>';}; ?></td>
                    <td>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
           
        </div>
        </div>
        </div>
        <!-- End Contact Area -->
		<!-- Footer Area -->
<?php include('footer.php'); }?>