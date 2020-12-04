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
      
        <h2>Message</h2>
        <div class="block"> 
    
          <table class="table">
            <thead>
             <tr>
              <th>SL</th>
              <th>Customer Name</th>
              <th>Message</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php      $con=mysqli_connect('localhost','root','') or die(mysql_error());
          mysqli_select_db($con,'bookshop') or die("cannot select DB");

          $query1=mysqli_query($con,"SELECT * 
           FROM `message` order by id desc ");
          $count=0;

            foreach ($query1 as $result1) { ?>

             <tr>
               <td><?=++$count?></td>
              <?php $user=mysqli_query($con,"SELECT * 
              FROM `user` where u_id='$result1[customer_id]' ");
              while($values= mysqli_fetch_array($user))
              foreach ($user as $values) { ?>
              <td> <?php  echo $values['u_unm']; }?></td>
              <td> <?php  echo $result1['message'];?></td>
              <?php if($result1['status']=='Not Seen'){ ?>
              <td ><span class="btn-sm btn-danger"> <?php  echo $result1['status']; }else{?></span></td>
              <td ><span class="btn-sm btn-success"> <?php  echo $result1['status']; }?></span></td>


               <?php echo "<td><a href=reply.php?id=".$result1['id']."><button class='btn btn-success'>Reply</button></a></td>";?>


             </tr>

           <?php }?>
         </table>
       </div></div></div>
     </div></div>
     <?php include 'inc/footer.php';?><?php }?>