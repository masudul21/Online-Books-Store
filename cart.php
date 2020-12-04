<?php 
session_start();
$product_ids = array();

if(isset($_POST['submit'])){

	$qty=$_POST['quantity'];
	$id2=$_POST['id'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());
  mysqli_select_db($con,'bookshop') or die("cannot select DB");
  $query1=mysqli_query($con,"SELECT * FROM `product` WHERE `id`='$id2'");

  $row = mysqli_fetch_array($query1);

  if ($row['amount']<=$qty) {
   echo "<script>alert('Sorry Insufficient Product In stock')</script>";
 }
 else{

   if(isset($_SESSION['shopping_cart'])){

   $count = count($_SESSION['shopping_cart']);
        
    $product_ids = array_column($_SESSION['shopping_cart'], 'id');

    if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
      $_SESSION['shopping_cart'][$count] = array
      (

        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'quantity' => filter_input(INPUT_POST, 'quantity')
      );   
    }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
          for ($i = 0; $i < count($product_ids); $i++){
            if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
              $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
            }
          }
        }
        
      }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
    $_SESSION['shopping_cart'][0] = array
    (
            // 'image' => filter_input(INPUT_GET, 'image'),
      'id' => filter_input(INPUT_GET, 'id'),
      'name' => filter_input(INPUT_POST, 'name'),
      'price' => filter_input(INPUT_POST, 'price'),
      'quantity' => filter_input(INPUT_POST, 'quantity')
    );
  }
  header("Location: cart.php");
}
}

if(isset($_POST['update'])){

  $qtys=$_POST['qtys'];

  $product_ids = array_column($_SESSION['shopping_cart'], 'id');
  $product_id = array_column($_SESSION['shopping_cart'], 'quantity');


                   // $row = mysqli_fetch_array($query);
  for ($i = 0; $i < count($product_ids); $i++){

		// var_dump($product_ids);
    $con=mysqli_connect('localhost','root','') or die(mysql_error());
    mysqli_select_db($con,'bookshop') or die("cannot select DB");
    $query=mysqli_query($con,"SELECT * FROM `product` WHERE `id`=$product_ids[$i]");
    while($rows=mysqli_fetch_array($query)){
	  // echo $rows['quantity'];

      if ($product_id[$i] != $qtys[$i] &&  $qtys[$i]< $rows['amount']){
                    //add item quantity to the existing product in the array
        $_SESSION['shopping_cart'][$i]['quantity']=
        $qtys[$i];
        header("Location: cart.php");
        unset($_SESSION['msg']);
      }
      else{

       $_SESSION['msg']="Insufficient";
       break;
     }
   }
 }
}
if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
  foreach($_SESSION['shopping_cart'] as $key => $product){
    if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
      unset($_SESSION['shopping_cart'][$key]);
    }
  }
    //reset session array keys so they match with $product_ids numeric array
  $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}


//pre_r($_SESSION);

function pre_r($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}


?>
<?php include('header.php');?>
<?php include('config/config.php');?>
<div class="wrapper" id="wrapper">

  <!-- Header -->
  <?php include('navbar.php');?>


<div id="cart-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- banner background part -->
			</div>
		</div>
	</div>
</div>
<br>
<br>


<?php 
if (!empty($_SESSION['msg'])  ) {
  echo '<center><h4 style="color:red">Sorry Insufficient Product In stock</h4></center>';
  unset($_SESSION['msg']);
}

?>
<div id="cart-table">
	<div class="container">
   <div class="row pt-5 pb-5">
    <div class="col-md-12">

     <form action="cart.php" method="post">

       <div class="table-content wnro__table table-responsive">
        <table class="table">
          <thead>
            <tr class="title-top">
              <th class="product-remove">Remove</th>
              <th class="product-thumbnail">Image</th>
              <th class="product-name">Product</th>
              <th class="product-price">Price</th>
              <th class="product-quantity">Quantity</th>
              <th class="product-subtotal">Total</th>
            </tr>
          </thead>
          <tbody>
           <tr>
            <?php
            if(!empty($_SESSION['shopping_cart'])):  

             $total = 0;  
             foreach($_SESSION['shopping_cart'] as $key => $result): ?>
              <td><a href="cart.php?action=delete&id=<?php echo $result['id']; ?>" class="fa fa-times" ></a></td>
              <td>
              <?php $con=mysqli_connect('localhost','root','') or die(mysql_error());
              mysqli_select_db($con,'bookshop') or die("cannot select DB"); 
			  $a=$result['id']; 
              $query=mysqli_query($con,"SELECT * FROM `product` WHERE `id`='$a'");
              $row = mysqli_fetch_array($query);
              echo' <img style="height:50px;" src="images/'.$row['image'].'" alt="">'; ?>
              </td>        	
              <td><?php echo $result['name'];?></td>
              <td>Tk.<?php echo $result['price'];?></td>
              <td class="quantity">

                <input class="changesNo product-quantity" type="number" id="number" min="1" value ="<?php echo $result['quantity'];?>" name="qtys[]">
              </td>	

                <td><i aria-hidden="true"></i><?php echo number_format($result['quantity'] * $result['price'], 2); ?> tk</td>
                <input  type="hidden" id="number" type="text" name="id[]" value="<?php echo $result["id"];?>">	      
              </tr>			   
              <?php 
                  // $total=0;
              $total = $total + ($result['quantity'] * $result['price']);  
             endforeach;  ?> 
             <tr>
             <th ></th>
             <td >

             </td>			      
             <td colspan="3"></td>

             <td>

              <!-- <input type="hidden" name="" value="<?php $a=$result['id'];?>" placeholder=""> -->
              <button class="btn btn-success"  name="update" value="update" type="submit">Update cart</button>
            </td>

          </tr>
        </tbody>
        <?php endif;?>
      </table>
    </div>
  </div>
</div>
</form>



<div class="row">
  <div class="col-lg-6 offset-lg-6">
    <div class="cartbox__total__area">
      <div class="cartbox-total d-flex justify-content-between">
        <ul class="cart__total__list">

          <li>Sub Total</li>
        </ul>
        <ul class="cart__total__tk">
          <li><?php  if(isset($total)){echo number_format($total, 2);} ?> tk</li>

        </ul>
      </div>
      <div class="cart__total__amount">
        <span>Grand Total</span>
        <span> <?php if(isset($total)){echo number_format($total, 2);} ?> tk</span>
      </div>
    </div>
  </div>
</div>

<br>
<!-- 		<button type="button" class="btn btn-dark float-right pl-5 pr-5">Proceed To checkout</button> -- -->
<?php if (empty($_SESSION['shopping_cart'])) {   	# code...
  ?>
  <a style=" pointer-events: none; color: white " href="checkout.php" type="button" class="btn btn-danger float-right pl-5 pr-5"></span>Proceed To checkout</a>
<?php }else {?>
  <a style=" color: white " href="checkout.php" type="button" class="btn btn-danger float-right pl-5 pr-5" ></span>Proceed To checkout</a>
<?php }?>
<br><br>

  <script>
   function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }

  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }
</script>
</div></div></div></div></div>
<?php include('footer.php'); ?>
