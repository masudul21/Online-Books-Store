<!--  -->

<?php 

if(isset($_POST['submit'])){

	$image = $_FILES['image']['name'];
//var_dump($_POST);
// exit();

	$target_dir = "../images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);

	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
///  exit();
	$tid=$_POST['tid'];
	$name=$_POST['name'];
	$details=$_POST['details']; 
	$price=$_POST['price'];
	$writer=$_POST['writer'];
	$publisher=$_POST['publisher'];
	$category=$_POST['category'];
	$quantity=$_POST['quantity'];
	$tag='';





	$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'bookshop') or die("cannot select DB");


	$query="INSERT INTO product VALUES ('$tid','$name','$details','$price','$writer','$publisher','$category','$quantity','$image','$tag')";


	if(mysqli_query($con, $query))
	{
		header("Location:product.php");

		echo "Your Submited Data Inserted Succesfully.If you Want to Add more Data You can...go on..";
	}

	else {
		echo "ERROR" . mysqli_error($con);
	}
}
?> 

<?php 
// close connection 
mysqli_close($con);
?>