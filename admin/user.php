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
              <table style="text-align:center;">
                <thead>
                   <tr>
      <th scope="3">SL</th>

      <th>Name</th>
      <th>Email</th>   
      <th>Mobile</th>
      <th>Address</th>
      <th>Gender</th>
	  <th>Action</th>

   
   
    </tr>

  <?php      $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");

              $query1=mysqli_query($con,"SELECT * 
                         FROM `user` ");
             $count=0;
              while($result1= mysqli_fetch_array($query1))
              foreach ($query1 as $result1) { ?>
 
    <tr>
 <td><?=++$count?></td>
      <td><?= $result1['u_fnm'] ?></td>
      <td><?= $result1['u_email'] ?></td>
      <td><?= $result1['u_contact'] ?></td>
       <td><?=$result1['u_city']?></td>
      <td><?= $result1['u_gender'] ?></td>

   <?php echo "<td><a style='padding-right:5px;' href=user_edit.php?id=".$result1['u_id']."><button class='btn btn-green'>Edit</button></a>"; echo "<a href=user_delete.php?id=".$result1['u_id']."><button class='btn btn-danger' style='background-color:red'>Delete</button></a></td>"; ?>


    </tr>

    <?php }?>
  </table></div></div></div>
</body>
</html>
<?php include 'inc/footer.php';?><?php }?>