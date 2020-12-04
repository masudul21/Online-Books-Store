<?php include('header.php');?>
<?php  include('config/config.php');?>

	<div class="wrapper" id="wrapper">

		<?php include('navbar.php');?>
		
		<!-- End Search Popup -->
		<!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--6">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">My Account</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">My Account</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form action="admin_login_cnn.php" method="post">
								<div class="account__form">
									<div class="input__box">
										<label>Username or email address <span>*</span></label>
										<input type="text" name="email" required="">
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" placeholder="Password" name="password" required>
									</div>
									<!-- <div class="form__btn"> -->
										<button class="btn btn-success" type="submit" name="submit">Login</button>
								<!-- 		<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
											<!-- <span>Remember me</span> -->
										</label>
									</div> 
									<!-- <a class="forget_pass" href="#">Lost your password?</a> -->
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</section>

		<?php include('footer.php'); ?>
	
