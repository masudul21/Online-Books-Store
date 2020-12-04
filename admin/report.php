<script type="text/javascript">

  $(function() {
  $("#from_sales_date").date_input();
   $("#to_sales_date").date_input();
});

function sales_report_fn() 
{ 
 window.open("order_report.php?from_sales_date="+$('#from_sales_date').val()+"&to_sales_date="+$('#to_sales_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
   
}

</script> 
<?php 
session_start();
if(!isset($_SESSION["sess_user_name"])){
  header("location:../index.php");
} else {
?> 
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<section class="content">
     <div class="grid_10">
            <div class="box round first grid">
                <div class="block"> 
<br>
<br>
<br>
<br>
<body>  <h3 style="padding-right:60px">  Sales Report </h3>
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <form action="order_report.php" method="post" name="order_report" id="order_report" target="myNewWinsr">
        <td> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<strong> </strong></td> 
        <td><b>From</b></td>
        <td><input class="form-control" name="from_sales_date" type="date" id="from_sales_date"  style="width:150px;"></td>
        <td><b>To</b></td>
        <td><input class="form-control" name="to_sales_date" type="date" id="to_sales_date"  style="width:150px;"></td>
        <td><input class='btn btn-green' name="submit" type="button" value="Show" onClick='sales_report_fn();'></td>
    </form>
  </tr>

</table>
</body>
</div></div></div>
<?php include ('inc/footer.php') ;?>
<?php } ?>