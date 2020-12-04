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
<?php  
  $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");
 if (isset($_POST['submit'])) {

$name=$_POST['message'];
$status='Reply';


                         
   $query = "UPDATE message set
   reply='$name',status='$status' where id='$_GET[id]'";

if(mysqli_query($con, $query))
{
echo "<div class='alert alert-success'>";
echo "<center>Your Submited Data Updated Succesfully</center>";
echo "</div>";
}
}

 ?>
<div class="grid_10">
  <div class="box round first grid">

    <div class="grid_10">
     
        <h2>Message</h2>
        <div class="block"> 
          
         <div class="row">
        <div class="col-md-12">

              <table>
                    <thead>
                        <tr>
                            <th>Message</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  $con=mysqli_connect('localhost','root','') or die(mysql_error());
                              mysqli_select_db($con,'bookshop') or die("cannot select DB"); 
                               $message=mysqli_query($con,"SELECT * 
                                FROM `message` Where id='$_GET[id]' ORDER BY id ");
                               while($key= mysqli_fetch_array($message))
                                foreach ($message as $key):
                                 ?>

                        <tr>
                            <td><?=$key['message']?></td>
                            <td><?=$key['reply']?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                
          

        </div>
    </div>
            
                <div class="row">
        <div class="col-md-12">
            <!-- start page -->
 
    
                        <!-- start content -->
                
                            <div id="content">
                    
                                <div class="post">
                                    <center> <p class="title" style="font-size:25px; padding-bottom:0px;">Message</p></center> 
                                    
                        
                                    <div class="entry">
                                    <br><br>
                                        <?php
                                            if(isset($_GET['error']))
                                            {
                                                echo '<font color="red">'.$_GET['error'].'</font>';
                                                echo '<br><br>';
                                            }
                                            
                                            if(isset($_GET['ok']))
                                            {
                                                echo '<font color="blue">Message Send successfully</font>';
                                                echo '<br><br>';
                                            }
                                        
                                        ?>
                                    
                                        <table>
                                            <form action="" method="POST">
                                                                                
                                                <tr>
                                               
                                                    <td>
                                                   <textarea name="message" class="form-control"></textarea>

                                                    </td>
                                                    <td colspan="2">
                                                        <input type='submit' name="submit" class='btn btn-green' value="  Send ">
                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>
                                    
                                </div>
                    
                    
                            </div>
                
                        <!-- end content -->
            

          </div>
        </div>
       </div></div></div>
     </div></div>
     <?php include 'inc/footer.php';?><?php }?>