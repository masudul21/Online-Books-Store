<?php 
session_start();
if(!isset($_SESSION["sess_user_name"])){
	header("location:../index.php");
} else {
	?> 
	<?php include 'inc/header.php';?>
	<?php include 'inc/sidebar.php';?>
	<?php 

	if(isset($_POST['submit'])){

///  exit();
		$tid=$_POST['tid'];
		$name=$_POST['name'];



		$con=mysqli_connect('localhost','root','') or die(mysql_error());
		mysqli_select_db($con,'bookshop') or die("cannot select DB");

		$query="INSERT INTO category VALUES ('$tid','$name')";

		if(mysqli_query($con, $query))
		{
			echo "Your Submited Data Inserted Succesfully.If you Want to Add more Data You can...go on..";
		}

		else {
			echo "ERROR" . mysqli_error($con);
		}
	}
	?> 
	<div class="grid_10">
		<div class="box round first grid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12 col-md-offset-4">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Add Category</h3>
						</div>
						<br>

						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="" method="post">
								<input type="hidden" class="form-control" name="tid"  placeholder=" Product Details" required>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="name"  placeholder=" Category Details" required>
									</div>
								</div>
								<br>

								<div class="row">

									<div class="col-sm-8 col-sm-offset-2">
										<button type="submit" name="submit" class="btn btn-green">Create</button>

										<button type="reset" class="btn-red btn">Reset</button>
									</div>
								</div>
							</div>
						</form>
						<div class="panel-footer">

						</div>

					</div>
				</div>
			</div></div></div></div></div></div></div></div>
			<?php include 'inc/footer.php';?><?php }?>