<?php 
session_start();
if(!isset($_SESSION["sess_user_name"])){
	header("location:index.php");
} else {
?> 
<?php
   $con = mysqli_connect('localhost','root','');
   mysqli_select_db($con,'bookshop');
   $sql = "DELETE FROM product WHERE id='$_GET[id]'";
   if(mysqli_query($con,$sql))
	   header("refresh:1; url=product.php");
   else
	   echo "Not Deleted!";


?>
<?php

}
?>