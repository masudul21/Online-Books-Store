<?php 
session_start();
if(!isset($_SESSION["sess_user_name"])){
  header("location:../index.php");
} else {
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
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>SL No</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Order Date</th>
                    <th>Status</th>
                  <th>Action</th>     
                </tr>
<?php   
$con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");


 $result = mysqli_query($con,"SELECT * FROM `order` where status='Pending'");
$i=0;
     while($row = mysqli_fetch_array($result)) {
      ?>
                <tr>
                  <td><?php echo ++$i;?></td>
                  <td><?=$row['name'];?></td>
                  <td><?=$row['phone'];?></td>
                  <td><?=$row['address'];?></td>
                   <td><?=$row['date'];?></td>
                  <td style="font-size: 22px;"><span class="btn btn-warning" type="button"><?=$row['status'];?></span></td>
                  <!-- <td><?=$row['name'];?></td>
                     <td><?=$row['quantity'];?></td>
                        <td><?=$row['price'];?></td> -->
                       
                           
                              
                  <td>
                    
                    <a href="pending_order_view.php?id=<?=$row['order_id'];
                    ?>" type="button" class="btn btn-info"><span class="glyphicon glyphicon-view">Edit</span></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
</div></div>
</div></div></div></div>

</center>
</body>
</html>
<?php include 'inc/footer.php';?><?php }?>