
<?php include('header.php');?>
<?php include('config/config.php');?>
<div class="wrapper" id="wrapper">

<!-- Header -->
<?php include('navbar.php');?>

<br><br><br>
<!-- End Bradcaump area -->
<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
<div class="container">
<div class="row">
<div class="col-lg-9 col-12">
<div class="wn__single__product">
<div class="row">
<div class="col-lg-6 col-12">
<div class="wn__fotorama__wrapper">

<?php $product=mysqli_query($con,"SELECT * 
FROM `product` where id='$_GET[id]' ");

foreach ($product as $values) { ?>
	<div class="" data-nav="">
		<a href="1.jpg"><img style=" width:300px!important; height:400px!important; " src="images/<?= $values['image']?>" alt=""></a>

	</div>
</div>
</div>
<div class="col-lg-6 col-12">
<div class="product__info__main">
	<h1><?= $values['name']?></h1>
	<div class="price-box">
		<span><?= $values['price']?> tk</span>
	</div>
	<div class="product__overview">
		<?php
		    $writer=mysqli_query($con,"SELECT * 
			FROM `writer` where id='$values[writer]' ");
			foreach ($writer as $result2) { ?>
				<h3> <?php  echo $result2['name']; }?></h3>


				<?php $publisher=mysqli_query($con,"SELECT * 
					FROM `publisher` where id='$values[publisher]' ");
					foreach ($publisher as $result3) { ?>


						<h4><?php  echo $result3['name']; }?></h4>
					</div>
					<div class="box-tocart d-flex">
						<span>Qty</span>
						<!-- <input id="qty"  name="qty" min="1" value="1" title="Qty" type="number"> -->
						<div class="addtocart__actions">

							<form action="cart.php?action=add&id=<?php echo $values['id']; ?>" method="post">
								<input type="hidden" name="id" value="<?php echo $values['id'];?>">	
								<input type="hidden" name="name" value="<?php echo $values['name'];?>">
								<input type="hidden" name="price" value="<?php echo $values['price'];?>">		 			
								<input class="input-text qty"  id="number" type="number" name="quantity" min="1" value="1">
								<input class="tocart" type="submit" class="buysubmit" name="submit" value="Add to Cart"/>
							</form>				

							
						</div>
						
					</div>
			</div>
		</div>
	</div>
</div>
<div class="product__info__detailed">
	<div class="pro_details_nav nav justify-content-start" role="tablist">
		<a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
		<!-- <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a> -->
	</div>
	<div class="tab__container">
		<!-- Start Single Tab Content -->
		<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
			<div class="description__attribute">
				<p><?php  echo $values['details'];?></p>
				
			</div>
		</div>
		<?php }?>
		
	</div>
</div>


<!-- End main Content -->

</div>
</div></div>
</div></div>
<!-- End Search Popup -->
<!-- Footer Area -->
<?php include('footer.php'); ?>
