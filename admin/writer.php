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
<div class="grid_10">
  <div class="box round first grid">

    <div class="grid_10">
      <div class="box round first grid">
        <h2>Writer</h2>
        <div class="block">  
         <a href="add_writer.php"><button class='btn btn-green'>Add Writer<br></button></a>
                  
              <table class="table">
                <thead>
                   <tr>
      <th>SL</th>

      <th>ID</th>
      <th>Writer Name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Action</th>
    </tr>
  </thead>
 
  <?php      $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");

              $query1=mysqli_query($con,"SELECT * 
                         FROM `writer` ");
             $count=0;
              while($result1= mysqli_fetch_array($query1))
              foreach ($query1 as $result1) { ?>
 
   <tr>
 <td><?=++$count?></td>
      <td><?= $result1['id'] ?></td>
      <td><?= $result1['name'] ?></td>
      <td><?= $result1['address'] ?></td>
      <td><?= $result1['contact'] ?></td>

   <?php echo "<td><a style='padding-right: 5px;'href=edit_writer.php?id=".$result1['id']."><button class='btn btn-green'>Edit</button></a>";
   echo "<a href=writer_delete.php?id=".$result1['id']."><button class='btn btn-danger' style='background-color:red'>Delete</button></a></td>"; ?>


    </tr>

    <?php }?>
  </table>
</div></div></div>
</body>
</html>
<?php include 'inc/footer.php';?><?php }?>