<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li><a href="add_product.php">Add Book</a></li>
                <li><a href="product.php">View Book</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="writer.php">Writer</a></li>
                <li><a href="publisher.php">Publisher</a></li>
                </li>
                <li><a href="user.php" >User Info</a></li>
                <li><a href="order.php" >Order</a></li>
				<?php
					//$con=mysqli_connect('localhost','root','') or die(mysql_error());
						//mysqli_select_db($con,'bookshop') or die("cannot select DB");
				    //$result = mysqli_query($con,"SELECT * FROM `order` where status='Pending'");
                      // $num_rows = mysqli_num_rows($result);
					   ?>
                <li><a href="pending.php" >Pending Order<?php // echo $num_rows; ?></a></li>
                <li><a href="confirm.php" >Confirm Order</a></li>
                <li><a href="cencel.php" >Cencel Order</a></li>

                <?php
                $con=mysqli_connect('localhost','root','') or die(mysql_error());
                              mysqli_select_db($con,'bookshop') or die("cannot select DB");
                 $count_message=mysqli_query($con,"SELECT * 
                    FROM `message` Where status='Not Seen'");
                    $num_rows = mysqli_num_rows($count_message); ?>
                <li><a href="message.php" >Message(<?=$num_rows?>)</a></li>
               <!-- <li><a href="report.php" >Report</a></li>-->

                </li>
               
                <li class="ic-form-style"><a href="profile.php"><span>Profile</span></a></li>
                <li class="ic-charts"><a target="_blank" href="../index.php"><span>Visit Website</span></a></li>
            </ul>
        </div>
    </div>
</div>