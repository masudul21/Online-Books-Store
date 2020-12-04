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
      <div class="block">        
       <div class="agile-tables">
        <div class="panel-heading"><h4>Edit Book</h4>
        </div> 


        <?php
        $con=mysqli_connect('localhost','root','') or die(mysql_error());
        mysqli_select_db($con,'bookshop') or die("cannot select DB");

        if (isset($_POST['submit'])) {
          $pid=$_POST['pid'];
          $name=$_POST['name'];
          $price=$_POST['price'];

          $quantity=$_POST['quantity'];
// $image=$_POST['image'];
          $description=$_POST['description'];
          $category=$_POST['category'];
          $writer=$_POST['writer'];
          $publisher=$_POST['publisher'];

          $image = $_FILES['image']['name'];

          $target_dir = "../images/";
          $target_file = $target_dir . basename($_FILES["image"]["name"]);

          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
         
          if($image != null){
            $query = mysqli_query($con,"UPDATE product set name='$name',price='$price',amount='$quantity', image='$image',details='$description', writer='$writer',publisher='$publisher',category='$category' where id='$pid'");
          }else
          {
            $query = mysqli_query($con,"UPDATE product set name='$name',price='$price',amount='$quantity', details='$description',writer='$writer',publisher='$publisher',category='$category' where id='$pid'");
          }
        } 

        ?>
        <?php
        if (isset($_GET['update'])) {

          $update = $_GET['update'];
          $query1 = mysqli_query($con,"SELECT * from product where id=$update");
          while ($row = mysqli_fetch_array($query1)) {
            ?>
            <table>
              <form class='form' method='post'  enctype="multipart/form-data">
                <!-- <div class="box-body"> -->

                  <!--                   <label for="pid">PID</label> -->
                  <input type="hidden" name="pid" class="form-control" id="id"   value="<?php echo $row['id'];?>">

                  <tr>
                    <th> <label for="name">Name</label></th>

                    <td> <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'];?>"><br></td></tr>


                    <th> <label for="price">Price</label></th>
                    <td><input type="text" name="price" class="form-control" id="price" value="<?php echo $row['price'];?>"><br></td></tr>
                      <tr>
                        <th><label for="quantity">Quantity</label></th>
                        <td><input type="text" name="quantity" class="form-control" id="quantity" value="<?php echo $row['amount'];?>"><br></td></tr>
                        <tr>
                          <th><label for="quantity">Category</label></th>
                          <td><select class="form-control" name="category" >
                            <option value="<?= $row['category'] ?>"><?= $row['category']?>
                            <?php $con=mysqli_connect('localhost','root','') or die(mysql_error());
                            mysqli_select_db($con,'bookshop') or die("cannot select DB");

                            $query1=mysqli_query($con,"SELECT * 
                             FROM `category` ");
// var_dump($query);
// exit();
                            while($result1= mysqli_fetch_array($query1))
                              foreach ($query1 as $result1) {?>

                                <option value="<?= $result1['name'] ?>"><?= $result1['name'] ?></option>

                              <?php }?>
                            </select><br>

                          </td>

                        </tr>
                        <tr>
                          <th><label for="quantity">Writer</label></th>
                          <td><select class="form-control" name="writer" >
                            <?php $con=mysqli_connect('localhost','root','') or die(mysql_error());
                            mysqli_select_db($con,'bookshop') or die("cannot select DB");

                            $writer_list=mysqli_query($con,"SELECT * 
                             FROM `writer`");
                              foreach ($writer_list as $result1) { ?>
                                 <option <?php if($result1['id']==$row['writer']){ ?> selected="selected" <?php }?> value="<?=$result1['id']?>"><?=$result1['name']?></option>
                                
              
                              <?php }?>
                            </select><br>
                          </td>
                        </tr>

                          <tr>
                          <th><label for="quantity">Publisher</label></th>
                          <td><select class="form-control" name="publisher" >
                            <?php $con=mysqli_connect('localhost','root','') or die(mysql_error());
                            mysqli_select_db($con,'bookshop') or die("cannot select DB");

                            $publisher=mysqli_query($con,"SELECT * 
                             FROM `publisher` ");
// var_dump($query);
// exit();
                            foreach ($publisher as $result1) { ?>
                                 <option <?php if($result1['id']==$row['publisher']){ ?> selected="selected" <?php }?> value="<?=$result1['id']?>"><?=$result1['name']?></option>
                                
              
                              <?php }?>
                            </select><br>
                          </td>
                        </tr>


                            <!-- style="color:red; font-size:18px;"> -->
                            <tr>
                             <th> <label >Image</label></th>

                             <td><?php

                             echo '<img src="../images/'.$row['image'].'"  width="100px" height="75" border="0" />';

                             ?> </td>

                             <th><input type='file' name='image' id='image' ><br></th></tr><tr>
                               <th> <label >After Choose</label></th>
                               <td><img id="blah" src="#" alt="No image" /><br></td></tr>

                               <script type="text/javascript">
                                 function readURL(input) {
                                  if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                      $('#blah')
                                      .attr('src', e.target.result)
                                      .width(100)
                                      .height(75);
                                    };

                                    reader.readAsDataURL(input.files[0]);
                                  }
                                }
                                $("#image").change(function()
                                {
                                  readURL(this)
                                });
                              </script>
                              <tr>
                                <th><label for="quantity">Description</label><br></th>
                                <td><input type="text" name="description" class="form-control" id="quantity" value="<?php echo $row['details'];?>"></td></tr>


                                <br>

                              </table>             


                              <center><input class="btn btn-danger" style="color: white;" type='submit' name='submit' value='update' ></center>


                              <?php
                            }
                          }
                          ?>

                          <?php            if (isset($_POST['submit'])) {

                            ?>

                            <script type="text/javascript">
                              window.location.href = 'product.php';
                            </script>
                            <?php
                          }
                          ?>
                        </form>
                      </table></div></div></div></div>

                      <?php include 'inc/footer.php';?><?php }?>         

