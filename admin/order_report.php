<?php
require 'fpdf/fpdf.php';


$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial','B','10');
$pdf->Cell(70,8);


//$pdf->Cell(20,8,'Company:',0);
$pdf->SetFont('Arial','','16');
$pdf->Cell(100,8,'Book Shop',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B','10');
$pdf->Cell(77,8);
//$pdf->Cell(20,8,'Address:',0);
$pdf->SetFont('Arial','','14');
$pdf->Cell(100,8,'www.bookshop.com ');
$pdf->Ln(5);
$pdf->SetFont('Arial','B','10');
$pdf->Cell(77,8);
//$pdf->Cell(20,8,'Phone:',0);
$pdf->SetFont('Arial','','13');
$pdf->Cell(100,8, 'address',0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B','10');
$pdf->Cell(77,8);
//$pdf->Cell(20,8,'Vat_reg:',0);
$pdf->SetFont('Arial','','12');
$pdf->Cell(100,8,'Uttara, Dhaka-1230',0);        
$pdf->Ln(8);
$pdf->Ln(15);
$pdf->SetFont('Arial','B','11');
$pdf->Cell(1,8,'',0);
$selected_date=$_GET['from_sales_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s.000000', $selected_date );
 $fromdate=$mysqldate;
			$selected_date=$_GET['to_sales_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s.000000', $selected_date );

  $todate=$mysqldate;
$pdf->Cell(18,8,'From: ',0);
$pdf->Cell(115,8,$_GET['from_sales_date'],0);
$pdf->Cell(10,8,'To: ',0);
$pdf->Cell(25,8,$_GET['to_sales_date'],0);
$pdf->Ln(8);
$pdf->Ln(15);
$pdf->SetFont('Arial','B','B');
$pdf->Cell(30,8,'Date ',1);
$pdf->Cell(30,8,'Sales ID ',1);
$pdf->Cell(60,8,'Product Name ',1);
$pdf->Cell(25,8,'Price ',1);
$pdf->Cell(25,8,'Quantity ',1);
$pdf->Cell(25,8,'Total',1);
$pdf->Ln(8);
$pdf->SetFont('Arial','B','B');
 $con=mysqli_connect('localhost','root','') or die(mysql_error());
            mysqli_select_db($con,'bookshop') or die("cannot select DB");
$result =mysqli_query($con,"SELECT * FROM order_history where  date BETWEEN '$fromdate' AND '$todate'");
// $line = mysqli_fetch_array( $result );
// var_dump($line);
// exit();
$total=0;
while($line = mysqli_fetch_array( $result )) {
	// $r
   $mysqldate=$line['date'];
 		$phpdate = strtotime( $mysqldate );
 		$phpdate = date("d/m/Y",$phpdate);
$pdf->Cell(30,8,$phpdate ,1);
$pdf->Cell(30,8,$line['id'],1);
$pdf->Cell(60,8,$line['name'] ,1);
$pdf->Cell(25,8,$line['price'],1);
$pdf->Cell(25,8,$line['quantity'],1);
$pdf->Cell(25,8,$line['price']*$line['quantity'],1);
$t=$line['price']*$line['quantity'];
$total=$total+$t;
// $pdf->Cell(30,8,$line->subtotal ,1);
$pdf->Ln(8);
}
// exit();
$pdf->SetFont('Arial','B','10');
$pdf->Cell(170,8,'Sub Total:',1);
$pdf->Cell(25,8,$total,1);

$pdf->Ln(30); 
$pdf->SetFont('Arial','B','11');
$pdf->Cell(63,8,'',0);
$pdf->Cell(80,8,' ',0);
$pdf->Ln(8);
$pdf->SetFont('Arial','B','11');
$pdf->Cell(60,8,'',0);
$pdf->Cell(80,8,'. ',0);
$pdf->Ln(8);
$pdf->SetFont('Arial','B','11');
$pdf->Cell(60,8,'',0);
$pdf->Cell(80,8,' ',0);
$pdf->Ln(8);
$pdf->Output();
?>