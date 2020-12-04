<?php
if(isset($_POST["submit"])){
// echo "ok";
// exit();
	if(!empty($_POST['email']) && !empty($_POST['password'])) {
		$email=$_POST['email'];
		$password=$_POST['password'];

		$con=mysqli_connect('localhost','root','') or die(mysql_error());
		mysqli_select_db($con,'bookshop') or die("cannot select DB");

		$query=mysqli_query($con,"SELECT * FROM admin WHERE email='".$email."' AND password='".$password."'");
		$numrows=mysqli_num_rows($query);
		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
				$dbemail=$row['email'];
				$dbpassword=$row['password'];
			}

			if($email == $dbemail && $password == $dbpassword)
			{
				session_start();
				$_SESSION['sess_user_name']=$email;

				/* Redirect browser */
				header("Location:admin");
			}
		} else {
			echo "<script>alert('Invalid email or password!'); location.href='admin-account.php';</script>";
		}

	} else {
		echo "<script>alert('All fields are required!'); location.href='admin-account.php';</script>";
	}
}
?>