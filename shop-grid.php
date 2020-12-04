<?php include('header.php');?>
<?php  include('config/config.php');?>
<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

	<?php include('navbar.php');?>	
	<!-- Header -->
	<div class="ht__bradcaump__area bg-image--6">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bradcaump__inner text-center">
						<h2 class="bradcaump-title">Shop Grid</h2>
						<nav class="bradcaump-content">
							<a class="breadcrumb_item" href="index.php">Home</a>
							<span class="brd-separetor">/</span>
							<span class="breadcrumb_item active">Shop Grid</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Bradcaump area -->
	<!-- Start Shop Page -->
	<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
					<div class="shop__sidebar">
						<aside class="wedget__categories poroduct--cat">
							<h3 class="wedget__title">Product Categories</h3>
							<ul>
								<!-- for category show -->
								<?php  $category=mysqli_query($con,"SELECT * FROM `category` ORDER BY id ");
									foreach ($category as $key) {

										$category_count=mysqli_query($con,"SELECT * 
											FROM `product` Where category='$key[name]'");
										$num_rows = mysqli_num_rows($category_count);
										?>
										<li><a href="shop-grid.php?name=<?=$key['name']?>"><?php echo $key['name'];?>(<?=$num_rows?>)<span></span></a></li>
									<?php }?>
								</ul>
							</aside>

						</div>
					</div>
					<div class="col-lg-9 col-12 order-1 order-lg-2">

					<div class="tab__container">
					<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
					<div class="row product" align="center">
						<?php
						if(isset($_GET['name']))
						{
							$product=mysqli_query($con,"SELECT * FROM `product` Where category='$_GET[name]' ORDER BY id desc");
							while($values= mysqli_fetch_array($product))
								foreach ($product as $values) { ?>
									<div class="col-md-3 product__thumb">
										<a href="single-product.php?id=<?= $values['id']?>"><img style="height:270px; width:200px;" src="images/<?= $values['image']?>" alt="product image"></a>
										<p><?= $values['name']?></p>
										<p><b>Qty: </b><?= $values['amount']?></p>
										<p><b>Price: </b><?= $values['price']?> Tk</p>

										<div ><span><a class="btn btn-warning" href="single-product.php?id=<?= $values['id']?>"> Add to cart </a></span></div>
									</div>
								<?php }
							}
							else if(isset($_GET['writer_id']))
							{
								$product=mysqli_query($con,"SELECT * FROM `product` Where writer='$_GET[writer_id]' ORDER BY id desc");
								while($values= mysqli_fetch_array($product))
									foreach ($product as $values) { ?>
										<div class="col-md-3 product__thumb">
											<a href="single-product.php?id=<?= $values['id']?>"><img style="height:270px; width:200px;" src="images/<?= $values['image']?>" alt="product image"></a>
											<p><?= $values['name']?></p>
											<p><b>Qty: </b><?= $values['amount']?></p>
											<p><b>Price: </b><?= $values['price']?> Tk</p>

											<div ><span><a class="btn btn-warning" href="single-product.php?id=<?= $values['id']?>"> Add to cart </a></span></div>


										</div>

									<?php }

								}
								else if(isset($_GET['publisher_id']))
								{
									$product=mysqli_query($con,"SELECT * FROM `product` Where publisher='$_GET[publisher_id]' ORDER BY id desc");
									while($values= mysqli_fetch_array($product))
										foreach ($product as $values) { ?>
											<div class="col-md-3 product__thumb">
												<a href="single-product.php?id=<?= $values['id']?>"><img style="height:270px; width:200px;" src="images/<?= $values['image']?>" alt="product image"></a>
												<p><?= $values['name']?></p>
												<p><b>Qty: </b><?= $values['amount']?></p>
												<p><b>Price: </b><?= $values['price']?> Tk</p>

												<div ><span><a class="btn btn-warning" href="single-product.php?id=<?= $values['id']?>"> Add to cart </a></span></div>


											</div>

										<?php }

									}
									else if(isset( $_POST['search']))
									{
										$term=$_POST['search'];
										$product=mysqli_query($con,"SELECT product.id,product.image,product.price,product.name,writer.name,publisher.name ,product.amount
											FROM `product` INNER JOIN `writer` ON product.writer=writer.id INNER JOIN `publisher` ON product.publisher =publisher.id  where product.name like'%$term%' OR product.category like'%$term%' OR writer.name like'%$term%' OR publisher.name like'%$term%'  ");
										while($values= mysqli_fetch_array($product))
											foreach ($product as $values) { ?>

												<div class="col-md-3 product__thumb">
													<a href="single-product.php?id=<?= $values['id']?>"><img style="height:270px; width:200px;" src="images/<?= $values['image']?>" alt="product image"></a>
													<p><?= $values['name']?></p>
													<p><b>Qty: </b><?= $values['amount']?></p>
													<p><b>Price: </b><?= $values['price']?> Tk</p>

													<div><span><a  class="btn btn-warning" href="single-product.php?id=<?= $values['id']?>"> Add to cart </a></span></div>


												</div>


												<?php
											}

										}

										else{
											$product=mysqli_query($con,"SELECT * 

												FROM `product` ORDER BY id desc limit 20 ");
											while($values= mysqli_fetch_array($product))
												foreach ($product as $values) { ?>
													<div class="col-md-3 product__thumb">
														<a href="single-product.php?id=<?= $values['id']?>"><img style="height:270px; width:200px;" src="images/<?= $values['image']?>" alt="product image"></a>
														<p><?= $values['name']?></p>
														<p><b>Qty: </b><?= $values['amount']?></p>
														<p><b>Price: </b><?= $values['price']?> Tk</p>

														<div><span><a class="btn btn-warning" href="single-product.php?id=<?= $values['id']?>"> Add to cart </a></span></div>


													</div>

												<?php }}?>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Shop Page -->
					<!-- Footer Area -->
<?php include('footer.php'); ?>
