<?php
include('config/config.php');

if(!empty($_POST))
{

	$msg="";
    $mail_unname_exist_chk=mysqli_query($con,"SELECT * FROM `user` where u_email='$_POST[mail]' OR u_unm='$_POST[unm]' ");
    $mail_num_rows = mysqli_num_rows($mail_unname_exist_chk);
   
	if(empty($_POST['fnm']) || empty($_POST['unm']) || empty($_POST['gender']) || empty($_POST['pwd']) || empty($_POST['cpwd']) || empty($_POST['mail'])||empty($_POST['city']))
	{
		$msg.="<li>Please full fill all requirement";
	}

	if($_POST['pwd']!=$_POST['cpwd'])
	{
		$msg.="<li>Please Enter your Password Again.....";
	}

		//if(!ereg("^[a-z0-9_]+[a-z0-9_.]*@[a-z0-9_-]+[a-z0-9_.-]*\.[a-z]{2,5}$",$_POST['mail']))
		//{
			//$msg.="<li>Please Enter Your Valid Email Address...";
		//}


	if(strlen($_POST['pwd'])>10)
	{
		$msg.="<li>Please Enter Your Password in limited Format....";
	}

	if(is_numeric($_POST['fnm']))
	{
		$msg.="<li>Name must be in String Format...";
	}
	if($mail_num_rows>0)
	{
		$msg.="<li>The User Name Or Email You Enter Already Exist";
	}

	if(strlen($_POST['contact'])!=11)
	{
		$msg.="<li>Phone number format is not correct";
	}

	if($msg!="")
	{
		header("location:register.php?error=".$msg);
	}
	else
	{
		$fnm=$_POST['fnm'];
		$unm=$_POST['unm'];
		$pwd=$_POST['pwd'];
		$gender=$_POST['gender'];
		$email=$_POST['mail'];
		$contact=$_POST['contact'];
		$city=$_POST['city'];

		$query="insert into user(u_fnm,u_unm,u_pwd,u_gender,u_email,u_contact,u_city)
		values('$fnm','$unm','$pwd','$gender','$email','$contact','$city')";

		mysqli_query($con,$query) or die("Can't Execute Query...");
		header("location:register.php?ok=1");
	}
}
else
{
	header("location:index.php");
}
?>