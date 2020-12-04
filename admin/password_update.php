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
           
 <?php
   $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");

            if (isset($_POST['submit'])) {
$id=$_POST['id'];
$password=$_POST['password'];
$query = mysqli_query($con,"UPDATE admin set password='$password' where id='$id'");  

 }
      
if (isset($_GET['update'])) {

$update = $_GET['update'];
$query1 = mysqli_query($con,"select * from admin where id=$update");
while ($row = mysqli_fetch_array($query1)) {

 ?>

<form class='form' method='post' id='myform'>
<table class="form">          
                 <input type="hidden" name="id" class="form-control" id="uid"   value="<?php echo $row['id'];?>">
                    
         <tr>
                    <td>
                        <label>New Password</label>
                 
                  
     
                  <input type="password" name="password" class="form-control" id="password">
              
                    </td>
                </tr>
         
        
         <tr>
                 
                    <td>
                <input class="btn btn-danger" style="color: white;" type='submit' name='submit' value='Change Password' >
             </td>
                </tr>
            
                <?php
            }
        }
            ?>
</table>
            </form>
         <?php         
        if (isset($_GET['submit'])) {
          ?>

<script type="text/javascript">
window.location.href = 'admin_view.php';
</script>
<?php
           }
           ?>

</form>
 
                
 


<?php 
mysqli_close($con);

?>
<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer
>
  
 $("#myform").validate({
           rules: {
               password: { 
                 required: true,
                    minlength: 6,
                    maxlength: 10,

               }
             }
           });

</script>
     </div>
    </div>
</div>
</center>
</body>

</html>
<?php include ('inc/footer.php') ;?>
<?php } ?>
