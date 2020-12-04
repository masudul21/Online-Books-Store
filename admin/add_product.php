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
<div class="row">
<!-- left column -->
<div class="col-md-12 col-md-offset-4">
<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Add Book</h3>
	</div>
	<br>
	<div class="tab-content">
		<div class="tab-pane active" id="horizontal-form">
			<form class="form-horizontal" action="add_product_cnn.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" class="form-control" name="tid" placeholder="Product Name" required>
					<label for="focusedinput" class="col-sm-2">Book Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="name" placeholder="Product Name" required>
					</div>
				</div>
				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Book Details</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="details"  placeholder=" Product Details" required>
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Price</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="price" placeholder="Price" required>
					</div>
				</div>
				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Writer</label>
					<div class="col-sm-8">
						<select class="form-control" name="writer" >
							<?php $con=mysqli_connect('localhost','root','') or die(mysql_error());
							mysqli_select_db($con,'bookshop') or die("cannot select DB");

							$query1=mysqli_query($con,"SELECT * FROM `writer` ");
							while($result1= mysqli_fetch_array($query1))
								foreach ($query1 as $result1) {?>

									<option value="<?= $result1['id'] ?>"><?= $result1['name'] ?></option>

								<?php }?>
							</select>
						</div>
					</div>	
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Publisher</label>
						<div class="col-sm-8">
							<select class="form-control" name="publisher" >
								<?php $con=mysqli_connect('localhost','root','') or die(mysql_error());
								mysqli_select_db($con,'bookshop') or die("cannot select DB");

								$query1=mysqli_query($con,"SELECT * FROM `publisher` ");
								while($result1= mysqli_fetch_array($query1))
									foreach ($query1 as $result1) {?>

										<option value="<?= $result1['id'] ?>"><?= $result1['name'] ?></option>

									<?php }?>
								</select>
							</div>
						</div>	

						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Category</label>
							<div class="col-sm-8">
								<select class="form-control" name="category" >
									<?php $con=mysqli_connect('localhost','root','') or die(mysql_error());
									mysqli_select_db($con,'bookshop') or die("cannot select DB");

									$query1=mysqli_query($con,"SELECT * 
										FROM `category` ");
// var_dump($query);
// exit();
									while($result1= mysqli_fetch_array($query1))
										foreach ($query1 as $result1) {?>

											<option value="<?= $result1['name'] ?>"><?= $result1['name'] ?></option>

										<?php }?>
									</select>

								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Quantity</label>
								<div class="col-sm-8">
									<input type="number" min="0" class="form-control" name="quantity"   required>
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Product Image</label>
								<div class="col-sm-8">
									<input type="file" name="image" id="packageimage" required>
								</div>
							</div>							
							<br/>	

							<div class="row">

								<div class="col-sm-8 col-sm-offset-2">
									<button type="submit" name="submit" class="btn-blue btn" >Create</button>

									<button type="reset" class="btn-red btn" style='background-color:red' >Reset</button>
								</div>
							</div>
						</div>
					</form>
                    <div class="panel-footer">

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'inc/footer.php';?><?php }?>