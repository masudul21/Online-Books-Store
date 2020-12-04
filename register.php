
<?php include('header.php');?>
<?php  include('config/config.php');?>
<div class="wrapper" id="wrapper">
<!-- Header -->
<?php include('navbar.php');?>
<!-- //Header -->
<!-- //Header -->
<!-- Start Search Popup -->


<div class="ht__bradcaump__area bg-image--7">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="bradcaump__inner text-center">
<h2 class="bradcaump-title">Register</h2>
<nav class="bradcaump-content">
<a class="breadcrumb_item" href="index.php">Home</a>
<span class="brd-separetor">/</span>
<span class="breadcrumb_item active">Register</span>
</nav>
</div>
</div>
</div>
</div>
</div>
<section class="wn__checkout__area section-padding--lg bg__white">
<div class="container">

<div class="row">
<div class="col-md-4">
<div  style="">


<?php
//require('config/config.php');
if(isset($_SESSION['status']))
{
echo '<h2>Hello :  '.$_SESSION['unm'].'</h2>';
}
else
{
echo '<form action="process_login.php" method="POST">
<h4>Sign In</h4>
<br>
<p>Username:</p>
<input type="text" class="form-control" name="email"><br>

<p>Password:</p>
<input type="password" class="form-control" name="password"> </br>
<input type="submit" class="btn btn-success" name="submit" id="x" value="Login" />
<br />
<br />

</form>';
}
?>

</div>
</div>
<div class="col-md-8">
<!-- start page -->


<!-- start content -->

<div id="content">

<div class="post">
<center> <p class="title" style="font-size:25px; padding-bottom:0px;">Register here to login</p></center> 


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
echo '<font color="blue">You are successfully Registered..</font>';
echo '<br><br>';
}

?>

<table>
<form action="process_register.php" method="POST">
<tr>
<td><b>Full Name :</b>&nbsp;&nbsp;</td>
<td><input type='text' class="form-control"  maxlength="30" name='fnm'></td>

</tr>

<tr><td>&nbsp;</tr>

<tr>
<td><b>User Name :</b>&nbsp;&nbsp;</td>
<td><input type='text' class="form-control"  size="30" maxlength="30" name='unm'></td>
<td>&nbsp;</td>

</tr>

<tr><td>&nbsp;</tr>

<tr>
<td><b>Password :</b>&nbsp;&nbsp;</td>
<td><input type='password' class="form-control"  name='pwd' size="30"></td>

</tr>

<tr><td>&nbsp;</tr>

<tr>
<td><b>Confirm Password:</b>&nbsp;&nbsp;</td>
<td><input type='password' class="form-control"  name='cpwd' size="30"></td>

</tr>

<tr><td>&nbsp;</tr>

<tr>
<td><b>Gender:</b>&nbsp;&nbsp;</td>

<td><input type="radio"   value="Male" name="gender" id='m'><label> Male</label>
<input type="radio" value="Female" name="gender" id='f'><label>Female</label></td>
<td>&nbsp;</td>
</tr>

<tr><td>&nbsp;</tr>

<tr>
<td><b>E-mail Address:</b>&nbsp;&nbsp;</td>
<td><input type='email' class="form-control"  name='mail' size="30"></td>

</tr>

<tr><td>&nbsp;</tr>

<tr>
<td><b>Contact No.:</b>&nbsp;&nbsp;</td>
<td><input type='text' class="form-control"  name='contact' size="30"></td>

</tr>

<tr><td>&nbsp;</tr>


<tr>
<td><b>City:</b>&nbsp;&nbsp;</td>
<td>
<select class="form-control"  style="width: 195px;" name="city">

<option>Dhaka
<option>Rangpur
<option>Rajshahi
<option>Chittagong
<option>Dinajpur
<option>Sylhet
<option>Bogura
<option>Barishal
<option>Gazipur
<option>Khulna
<option>Mymensingh



</select>

</tr>

<tr><td>&nbsp;</tr>



<tr>
<td></td>
<td colspan="2">
<input type='submit' class="btn btn-primary" value="  Submit ">
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
</div>
</div>
<!-- End Contact Area -->
<!-- Footer Area -->
<?php include('footer.php'); ?>