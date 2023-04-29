<?php
    require('tfpdf/tfpdf.php');
    include("services/connect.php");

    $pdf = new tFPDF();
    $pdf->AddPage();
    // Add a Unicode font (uses UTF-8)
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);

    $pdf->SetFillColor(193,229,252); 

    $id = $_GET['id'];
        $sql = "SELECT * FROM order_product WHERE id_order = '$id'";
        $rs = mysqli_query($connect, $sql);

    $pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);

	$width_cell=array(11,100,7,40,40);

	$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true); 
	$pdf->Cell($width_cell[1],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'SL',1,0,'C',true); 
	$pdf->Cell($width_cell[3],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[4],10,'Tổng tiền',1,1,'C',true);
     
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
    $count = 0;
    $total = 0;
	while ($row = mysqli_fetch_assoc($rs)) {
        $product_id = $row['id_product'];
        $sql2 = "SELECT * FROM products WHERE id= '$product_id'";
        $rs2 = mysqli_query($connect, $sql2);
        $row2 = mysqli_fetch_assoc($rs2);
        $count++;
		$i++;
	$pdf->Cell($width_cell[0],10,$count,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row2['name'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['quantity'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,number_format($row2['price']),1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['quantity']*$row2['price']),1,1,'C',$fill);
	$fill = !$fill;

	}
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
	$pdf->Ln(10);
    $pdf->Output();
?>
