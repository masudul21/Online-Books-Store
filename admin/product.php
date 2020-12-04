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
     <div class="agile-tables">

      <table id="myTable" class="table" border="2" ">
        <thead>
         <tr>
          <th>SL</th>

          <th>Photo</th>
          <th>Name</th>
          <th>Category</th>
          <th>Writer</th>
          <th>Publisher</th>
          <th>Price</th>
          <th> Description </th>
          <th>Quantity</th>
          <th>Edit</th>
          <th>Delete</th>



        </tr>
      </thead>
      <?php      $con=mysqli_connect('localhost','root','') or die(mysql_error());
      mysqli_select_db($con,'bookshop') or die("cannot select DB");

      $query1=mysqli_query($con,"SELECT * 
       FROM `product` ");
      $count=0;
      while($result1= mysqli_fetch_array($query1))
        foreach ($query1 as $result1) { ?>
          <tbody>
            <tr>
              <td><?=++$count?></td>
              <td><?php


              echo'  <img style=" height:100px; width:200px; padding-top:30px; "  src="../images/'.$result1['image'].'"  class="img-responsive" alt="properties"/>';

              ?></td>
              <td><?= $result1['name'] ?></td>
              <td><?= $result1['category'] ?></td>
              <?php $writer=mysqli_query($con,"SELECT * 
             FROM `writer` where id='$result1[writer]' ");
             while($values= mysqli_fetch_array($writer))
             foreach ($writer as $values) { ?>
             <td> <?php  echo $values['name']; }?></td>

             <?php $publisher=mysqli_query($con,"SELECT * 
             FROM `publisher` where id='$result1[publisher]' ");
             while($values2= mysqli_fetch_array($publisher))
             foreach ($publisher as $values2) { ?>
             <td> <?php  echo $values2['name']; }?></td>


              <td><?= $result1['price'] ?></td>
              <td><?= $result1['details'] ?></td>


              <td><?=$result1['amount']?></td>
              <?php echo "<td><a href=product_update.php?update=".$result1['id']."><button class='btn btn-blue' >Edit</button></a></td>"; echo "<td><a href=product_delete.php?id=".$result1['id']."><button class='btn btn-danger' style='background-color:red'>Delete</button></a></td>"; ?>


            </tr>
          </tbody>
        <?php }?>
      </table>
    </div></div>
  </div>

</center>
</body>
</html>
<?php include 'inc/footer.php';?><?php }?>