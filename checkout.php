<?php
session_start();
extract($_POST);
extract($_SESSION);

if(empty( $_SESSION['unm']) ){
	header("location:register.php");
}

else {?>	
	<div class="container">

		<center>
			<div  class="form">
				<?php

				$con=mysqli_connect('localhost','root','') or die(mysql_error());
				mysqli_select_db($con,'bookshop') or die("cannot select DB");

				if(isset($_POST['submit']))
				{
					$name=$_POST['name'];
					$phone=$_POST['phone'];
					$city=$_POST['city'];
					$address=$_POST['address'];
					$customer=$_SESSION['u_id'];

					$total=$_POST['total'];
					$status='Pending';
					$pname=$_POST['pname'];
					$quantity=$_POST['quantity'];
					$subtotal=$_POST['subtotal'];
					//$subtotal=$_POST['order_id'];
					$date=date('Y-m-d');

					$query="INSERT INTO `order`(`name`,`customer_id`,`phone`,`city`,`address`,`date`,`status`,`total`) VALUES ('$name','$customer','$phone','$city','$address','$date','$status','$total')";

					if(mysqli_multi_query($con,$query))
					{


						$order= mysqli_insert_id($con);
						$total=0; 
						if(isset($_SESSION['shopping_cart']))
						{
							foreach($_SESSION['shopping_cart'] as $key => $result):
								$id=$result['id'];
								$a=$result['name'];
								$b=$result['quantity'];
								$c=$result['price']*$result['quantity'];


									$date=date('Y-m-d');
									$query121 ="INSERT INTO `order_history`(`order_id`,`id`,`name`,`price`,`quantity`,`date`) VALUES('$order','$id', '$a','$c','$b','$date')";
									mysqli_query($con,$query121);

									$result4=mysqli_query($con,"select * from product where id='$id'");
									while($row=mysqli_fetch_array($result4)){
										$qty=$row['amount']; 
										$qty1=$qty-$b;
										$archive_quer = "UPDATE product set amount='$qty1' where id=$id";
										mysqli_query($con,$archive_quer); 
									}
								endforeach;
							}

							echo "<script>alert('Congratulation..Your order has been placed successfully. Your product will be delivered to your home and our agent will call you if necessary. Thanks For Being With Us'); location.href='my-account.php';</script>";
							unset($_SESSION["shopping_cart"]);
							unset($_SESSION['success']);

						}
						else{
							echo "error". mysqli_error($con);
						}
					}



					?>
	<?php include('header.php');?>
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<?php include('navbar.php');?>

		
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">Checkout</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">Checkout</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<!-- Start Checkout Area -->
		<section class="wn__checkout__area section-padding--lg bg__white">
			<div class="container">

				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="customer_details">
							<h3>Billing details</h3>
							<div class="customar__field">
								<div class="margin_between">
									<form id="contactform" action="" method="post"> 
										<div class="input_box space_between">
											<label>First name <span>*</span></label>
											<input id="name" name="name"  required="" tabindex="1" type="text"> 
										</div>
										<div class="input_box space_between">
											<label>Address<span>*</span></label>
											<textarea id="address" name="address" placeholder="Address" required="" cols="55" row="10"type="email"> </textarea>

										</div>
										<div class="input_box space_between">
											<label>City<span>*</span></label>
											<input type="text" id="city" name="city" placeholder="Please Enter your city" required="" >  
										</div>
										<div class="input_box space_between">
											<label>Mobile phone<span>*</span></label>
											<input id="phone" name="phone" minlength="11" maxlength="11"  required="" type="number"> 
										</div>





										<?php 
										if(isset($_SESSION['shopping_cart'])){
											$total=0; foreach($_SESSION['shopping_cart'] as $key => $result):?>
											<input  name="order_id"  required="" type="hidden" value="<?=$result['id']?>">

											<input  name="pname"  required="" type="hidden" value="<?=$result['name']?>">
											<input  name="quantity"  required="" type="hidden" value="<?=$result['quantity']?>">
											<input  name="subtotal"  required="" type="hidden" value="<?=$result['price']*$result['quantity']?>">



											<?php $total = $total + ($result['quantity'] * $result['price']); ?>
											<input  name="total"  required="" type="hidden" value="<?php echo $total;?>">
										<?php endforeach;  ?>


										<?php
									}
									?>
									<br>
									<div class="">
										<input class="btn btn-primary" name="submit" id="submit" tabindex="5" value="Confirm & Proceed" type="submit"> 
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
				<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
					<div class="wn__order__box">
						<h3 class="onder__title">Your order</h3>
						<ul class="order__total">
							<li>Product</li>
							<li>Price</li>
						</ul>
						<ul class="order_product">
							<?php 
							if(isset($_SESSION['shopping_cart'])){
								foreach($_SESSION['shopping_cart'] as $key => $result):?>
									<li><?=$result['name']?> × <?=$result['quantity']?><span><?=$result['quantity']*$result['price']?> Tk</span></li>
								<?php endforeach;  ?>


								<?php
							}
							?>
						</ul>
						<ul class="shipping__method">
							<li>Cart Subtotal <span><?php         										
							if(isset($_SESSION['shopping_cart'])){ ?><?=$total?><?php }else { echo "0";} ?> Tk</span></li>
							<li>Charge
								<ul>
									<li>

										<label>Delivery Charge: 50 tk</label>
									</li>

								</ul>
							</li>
						</ul>
						<ul class="total__amount">
							<li>Order Total <span><?php         											
							if(isset($_SESSION['shopping_cart'])){ ?><?= $total+50  ?> <?php }else { echo "0";} ?> tk</span></li>
						</ul>
					</div>
					<div id="accordion" class="checkout_accordion mt--30" role="tablist">
						<div class="payment">
							<div class="payment">
								<div class="che__header" role="tab" id="headingThree">
									<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<span>Cash on Delivery</span>
									</a>
								</div>
								<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="payment-body">Pay with cash upon delivery.</div>
								</div>
							</div>
							
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End Checkout Area -->
		<!-- Footer Area -->
		<?php include('footer.php'); }?>
		