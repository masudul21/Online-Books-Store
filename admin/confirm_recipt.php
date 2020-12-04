

<?php 

      $con=mysqli_connect('localhost','root','') or die(mysql_error());
      mysqli_select_db($con,'bookshop') or die("cannot select DB");

      if (isset($_GET['id'])) {
        $id=$_GET['id'];  
        $i=0;

        $result = mysqli_query($con,"SELECT *  FROM `order` where order_id='$id'
         ");



        while($row = mysqli_fetch_array($result)) {
          ?>
           
            <script>
            function prnt(){
                var div=document.getElementById('pnt').innerHTML  ;
                var win=window.open("", "", "width=800,height=500");
                win.document.write(div);
                win.print();
            }
        </script>
        <button type="submit" class="btn btn-danger" onclick="prnt();" > Print</button>
        <a href="confirm.php" title=""><button type=""  class="btn btn-success">Back</button></a>
        <div id="pnt">
          <link rel="stylesheet" href="../css/bootstrap.min.css">
           <div class="row">
             <div class="col-md-4 offset-md-4">
             <center><h3>Book Shop</h3>
             <h5>www.bookshop.com</h5> </center>
          
            <table class="table">
           
              <tbody>
                <tr>
                  <th>Name:</th>
                  <td><?php echo $row['name'];?></td>
                </tr>
                <tr>
                  <th>Address:</th>
                  <td><?php echo $row['address'];?></td>
                </tr>
                <tr>
                  <th>Phone:</th>
                  <td><?php echo $row['phone'];?></td>
                </tr>
              </tbody>
            </table> 
              <?php
            }
          }

          ?>


          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table">
              <tbody>
                <tr>
                  <th>SL No</th>

                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>

                </tr>

                <?php 

                $id=$_GET['id'];  
                $i=0;

                $result = mysqli_query($con,"SELECT * FROM order_history where order_id='$id'
                 ");
                while($row = mysqli_fetch_array($result)) {
                  ?>

                  <tr>
                    <td><?php echo $i=$i+1;?></td>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['quantity'];?></td>
                    <td><?=$row['price'];?></td>
                  </tr>

                  <?php

                }?>

               
                <tr>
                  <td colspan="4"><lebel><center><b>Total:</lebel>
                    <?php
                    $result = mysqli_query($con,"SELECT SUM(price) AS price FROM order_history where order_id='$id'"); 
                    $row = mysqli_fetch_assoc($result); 
                    echo $sum = $row['price'].' tk';

                    ?>
                  </td>
                   </tbody></table></div>
                  </b></center>
                </div></div></div>
               </div>
           </div>
         </div>
              </body>
              </html>