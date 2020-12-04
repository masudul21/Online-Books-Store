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
     <div class="content-wrapper">
   
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 col-md-offset-1">
          <!-- general form elements -->
          
               <div class="panel panel-danger">
            <div class="panel-heading"><h4>Edit Product</h4>
            </div> 

           
 <?php
 $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");

            if (isset($_POST['submit'])) {
$pid=$_POST['lid'];


 $image = $_FILES['image']['name'];

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
 
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            
if(!empty($image)) //new image uploaded
{
   //process your image and data
   $id=$_POST['lid'];
// where image is fields name in table where image-name is stored
 
   $query = mysqli_query($con,"UPDATE logo set logo='$image' where id='$id'");
}
}

            ?>
      <?php

$query1 = mysqli_query($con,"SELECT * from logo ");
while ($row = mysqli_fetch_array($query1)) {
  ?>
  <table>
<form class='form' method='post' action=""  enctype="multipart/form-data">
<div class="box-body">
             
<!--                   <label for="pid">PID</label> -->
                  <input type="hidden" name="lid" class="form-control" id="id"   value="<?php echo $row['id'];?>">
         

                <!-- style="color:red; font-size:18px;"> -->
<tr>
                 <th> <label >Image</label></th>

               <td><?php
     
         echo '<img src="../images/'.$row['logo'].'"  width="100px" height="75" border="0" />';

        ?> </td>
     
    <th><input type='file' name='image' id='image' ><br><br></th></tr><tr>
   <th> <label >After Choose</label></th>
    <td><img id="blah" src="#" alt="No image" /><br><br></td></tr>

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

              
 <br><br>
                 
       </table>             
           
         
                <center><input class="btn btn-danger" style="color: white;" type='submit' name='submit' value='update' ></center>
      

                <?php
            }
        
            ?>

<?php            if (isset($_POST['submit'])) {
 
  ?>

<!-- <script type="text/javascript">
window.location.href = 'product.php';
</script> -->
<?php
}
?>
</form>
  
 </div></div></div>
       <?php include 'inc/footer.php';?><?php }?>         
 
