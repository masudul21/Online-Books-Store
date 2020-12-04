<?php 
session_start();
if(!isset($_SESSION["sess_user_name"])){
  header("location:../index.php");
} else {
?> 
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<body>
   
 <div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">    
          <h4>Edit  Admin Info</h4>
           

           
 <?php
    $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");

            if (isset($_POST['submit'])) {
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
 
$query = mysqli_query($con,"UPDATE admin set
name='$name', email='$email' where id='$id'");  

 }
      
if (isset($_GET['update'])) {

$update = $_GET['update'];
$query1 = mysqli_query($con,"select * from admin where id=$update");
while ($row = mysqli_fetch_array($query1)) {

 ?>

<form class='form' method='post'>
<table class="form">          
                 <input type="hidden" name="id" class="form-control" id="uid"   value="<?php echo $row['id'];?>">
                    
         <tr>
                    <td>
                  <input type="hidden" name="id" class="form-control" id="uid"   value="<?php echo $row['id'];?>"></td>
              
                 <td> <label for="name">Name</label></td>
     
                  <td><input type="text" name="name" class="form-control" id="question_title" value="<?php echo $row['name'];?>"></td>
           


                  <td><label for="name">Email</label></td>
     
                  <td><input type="email" name="email" class="form-control" id="question_title" value="<?php echo $row['email'];?>"></td>
          
                  



                <!-- style="color:red; font-size:18px;"> -->

            
                <td><input class="btn btn-green" style="color: white;" type='submit' name='submit' value='update' ></td>
              </tr>
   
                <?php
            }
        }
            ?>

         <?php         
        if (isset($_GET['submit'])) {
          ?>

<script type="text/javascript">
window.location.href = 'admin_view.php';
</script>
<?php
           }
           ?>
</table>
</form></div></div></div>
                
 
<?php include ('inc/footer.php') ;?>

<?php 
mysqli_close($con);

?>
<?php } ?>