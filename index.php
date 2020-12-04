
<?php include('header.php');?>
<?php  include('config/config.php');?>
	<div class="wrapper" id="wrapper">
   <?php include('navbar.php');?>
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--6 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>

		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New<span class="color--theme" style="color: blue;">Books</span></h2>
						</div>
					</div>
				</div>
				<div class="tab__container mt--60">
					
					<div class="row">
							<?php
                        // Story book view query
							$product=mysqli_query($con,"SELECT *FROM `product` ORDER BY id desc
								LIMIT 12 ");
                      
                         foreach ($product as $values){?>
							<div class="col-md-3 product__thumb"  align="center">
								<a href="single-product.php?id=<?= $values['id']?>"><img style="height:300px; width: 220px;" src="images/<?= $values['image']?>" alt="product image"></a>
										<p><?=$values['name']?></p>
										<p><b>Qty: </b><?= $values['amount']?></p>
								        <p><b>Price: </b><?= $values['price']?> Tk</p>
								<div ><span><a class="btn btn-warning" href="single-product.php?id=<?= $values['id']?>"> Add to cart </a></span></div><br>
							</div>

							<?php } //endforech ?>

		            </div>
	</div>
		</section>

		<!-- Best Sale Area Area -->
		<!-- Footer Area -->
		<?php include('footer.php'); ?>