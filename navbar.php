<header id="wn__header" class="header__area header__absolute">
<div class="container-fluid">
<div class="row">
<div class="col-md-6 col-sm-6 col-6 col-lg-2">
<div class="logo">
<a href="index.html">
<img src="images/logo/logo.jpg" alt="logo images">
</a>
</div>
</div>
<div class="col-lg-8 d-none d-lg-block">
<nav class="mainmenu__nav">
<ul class="meninmenu d-flex justify-content-start">
<li class="drop with--one--item"><a href="index.php">Home</a></li>
<li class="drop with--one--item"><a href="shop-grid.php">Shop</a>
</li>
<li class="drop"><a href="#">Books</a>
<div class="megamenu mega03">
	<ul class="item item03">
		<li class="title">Categories</li>
       <!-- Category query -->
		<?php  $category=mysqli_query($con,"SELECT * FROM `category` ORDER BY id asc");
			foreach ($category as $key) {
               // category count
				$category_count=mysqli_query($con,"SELECT * 
					FROM `product` Where category='$key[name]'");
					// row count function
				$num_rows = mysqli_num_rows($category_count);

				?>
				<li><a href="shop-grid.php?name=<?php echo $key['name']; ?>"><?php echo $key['name'];?>(<?=$num_rows?>)</a></li>
			<?php }?>

		</ul>

	</div>
</li>
<li class="drop"><a href="#">Writer</a>
	<div class="megamenu mega02">
		<ul class="item item02">
			<li class="title">Writer Names</li>
			<!-- Writer Query -->
			<?php  $writer=mysqli_query($con,"SELECT * 
				FROM `writer` ORDER BY id ");
			while($key= mysqli_fetch_array($writer))
				foreach ($writer as $key) { 
					$writer_count=mysqli_query($con,"SELECT * FROM `product` Where writer='$key[id]'");
					$num_rows = mysqli_num_rows($writer_count);
					?>
					<li><a href="shop-grid.php?writer_id=<?=$key['id']?>"><?= $key['name']?>(<?=$num_rows?>)<span></span></a></li>
				<?php }?>
			</ul>
		</div>
	</li>
	<li class="drop"><a href="#">Publisher</a>
		<div class="megamenu mega02">
			<ul class="item item02">
				<li class="title">Publisher</li>
				<!-- publisher query -->
				<?php  $publisher=mysqli_query($con,"SELECT * 
					FROM `publisher` ORDER BY id ");
				while($key= mysqli_fetch_array($publisher))
					foreach ($publisher as $key) {
						$publisher_count=mysqli_query($con,"SELECT * 
							FROM `product` Where publisher='$key[id]'");
						$num_rows = mysqli_num_rows($publisher_count);
						?>
						<li><a href="shop-grid.php?publisher_id=<?=$key['id']?>"><?= $key['name']?>(<?=$num_rows?>)<span></span></a></li>
					<?php }?>
				</ul>
			</div>
		</li>

		<li><a href="message.php">Book Request</a></li>
		
		</ul>
	</nav>
</div>
<div class="col-md-6 col-sm-6 col-6 col-lg-2">
	<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
		<li class="shop_search">
	      <!--- for search -->
			<form id="search_mini_form" class="minisearch"  action="shop-grid.php" method="post">
				<input style="width: 150px; margin-right: 15px;" type="search" placeholder="search" name="search" class="search__active form-control">

			</li>
			<li><input style="margin-right: 15px;" type="submit" class="btn btn-sm btn-success">
			</form>
		</li>
		<li style="display: none;" class="wishlist"><a href="#"></a></li>
		<li class="shopcart"><a  href="cart.php"><span class="product_qun"><?php 
        // Number of product in cart count
		if(isset($_SESSION["shopping_cart"])){
			echo count($_SESSION['shopping_cart']);
		} else {
			echo '0'; }?></span></a>

			<!-- End Shopping Cart -->
		</li>
		<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
			<div class="searchbar__content setting__block">
				<div class="content-inner">
					<div class="switcher-currency">
						<strong class="label switcher-label">
							<span>My Account</span>
						</strong>
						<div class="switcher-options">
							<div class="switcher-currency-trigger">
								<div class="setting__menu">
									
									<?php if(!empty( $_SESSION['unm']) ){ 

										$count_message=mysqli_query($con,"SELECT * 
											FROM `message` where customer_id=$_SESSION[u_id]
											AND status='Reply'");
										$num_rows = mysqli_num_rows($count_message);

										?>

										<span><a href="my-account.php">My Order</a></span>
										<span><a href="message.php">Message(<?=$num_rows?>)</a></span>
										<span><a href="profile.php">Profile</a></span>
										<span><a href="logout.php">Logout</a></span>
									<?php } else{ ?>

										<span><a href="admin-account.php">Admin Sign In</a></span>
										
										<span><a href="register.php">Sign In</a></span>
										<span><a href="register.php">Create An Account</a></span>

									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
</div>

<!-- Start Mobile Menu -->

		<!-- End Mobile Menu -->
		<div class="mobile-menu d-block d-lg-none">
		</div>
		<!-- Mobile Menu -->	
	</div>		
</header>