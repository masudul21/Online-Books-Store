<?php
session_start();
extract($_POST);
extract($_SESSION);

if(empty( $_SESSION['unm']) ){
   header("location:register.php");
}

else {?>

    <?php
    $con=mysqli_connect('localhost','root','') or die(mysql_error());
    mysqli_select_db($con,'bookshop') or die("cannot select DB");
    $status_chk=mysqli_query($con,"SELECT * FROM message Where customer_id='$_SESSION[u_id]' AND status='Reply' order by id desc");
    foreach ($status_chk as $value)
    {
      if($value['status']=='Reply')
      {
          $query = mysqli_query($con,"UPDATE message set
           status='Seen' where customer_id='$_SESSION[u_id]'");

      }
  }

  if(isset($_POST['submit']))
  {

    $message=$_POST['message'];
    $customer=$_SESSION['u_id'];
    $status='Not Seen';

    $query="insert into `message`(`customer_id`, `message`, `status`)
    values('$customer','$message','$status')";

    mysqli_query($con,$query) or die("Can't Execute Query...");
    header("location:message.php?ok=1");
}

?>
<?php include('header.php');?>

<div class="wrapper" id="wrapper">
  <!-- Header -->
  <?php include('navbar.php');?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Inbox</h2>
                    <nav class="bradcaump-content">
                      <a class="breadcrumb_item" href="index.html">Home</a>
                      <span class="brd-separetor">/</span>
                      <span class="breadcrumb_item active">Inbox</span>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>
<section class="wn__checkout__area section-padding--lg bg__white">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <center> <p class="title" style="font-size:25px; padding-bottom:0px;">Message</p></center> 

                <table>
                    <thead>
                        <tr>
                            <th>You</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $message=mysqli_query($con,"SELECT * 
                            FROM `message` Where customer_id='$_SESSION[u_id]' ORDER BY id ");

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
                <div id="content">
                    <div class="post">
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
                                        <td><b>Write Message Here</b>&nbsp;&nbsp;</td>
                                        <td>
                                         <textarea name="message" class="form-control" required ></textarea>
                                     </td>
                                 </tr>
                                 <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <input type='submit' name="submit" class="btn btn-primary" value="  Send ">
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
</div>
<!-- End Contact Area -->
<!-- Footer Area -->
<?php include('footer.php');   } ?>