<?php
if(isset($_POST["submit"])){
// echo "ok";
// exit();
if(!empty($_POST['email']) && !empty($_POST['password'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];

	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'bookshop') or die("cannot select DB");

	$query=mysqli_query($con,"SELECT * FROM user WHERE u_unm='".$email."' AND u_pwd='".$password."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($query))
	{
	$dbemail=$row['u_unm'];
	$dbid=$row['u_id'];
	$dbpassword=$row['u_pwd'];
	}

	if($email == $dbemail && $password == $dbpassword)
	{
	session_start();
	$_SESSION['unm']=$email;
	$_SESSION['u_id']=$dbid;
	$_SESSION['status']=true;

	/* Redirect browser */
	header("Location:index.php");
	}
	} else {
	echo "Invalid email or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>