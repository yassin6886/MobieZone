<?php
include 'db.php';
require ('lib/fpdf185/fpdf.php');

if (!isset($_GET['o'])) {
    exit('No se proporcionó un ID de orden.');
}

$order_id = $_GET['o'];

$sql = "SELECT * FROM orders_info, order_products, products WHERE orders_info.order_id = $order_id 
        AND orders_info.order_id = order_products.order_id AND order_products.product_id = products.product_id";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Almacenar los productos en un arreglo
    $productos = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = $row;
    }
    
    // Crear un nuevo objeto PDF
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    
    /*output the result*/
    /*set font to arial, bold, 14pt*/
    $pdf->SetFont('Arial','B',20);
    
    /*Cell(width , height , text , border , end line , [align] )*/
    $pdf->Cell(71 ,10,'',0,0);
    $pdf->Cell(59 ,5,'FACTURA',0,0);
    $pdf->Cell(59 ,10,'',0,1);
    
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(71 ,5,'DIRECCION',0,0);
    $pdf->Cell(59 ,5,'',0,0);
    $pdf->Cell(59 ,5,'Details',0,1);
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(130 ,5,'C/ Alberto Aguilera, 23',0,0);
    $pdf->Cell(25 ,5,'ID CLIENTE:',0,0);
    $pdf->Cell(34 ,5,$cliente,0,1);
    
    $pdf->Cell(130 ,5,'28015, MADRID',0,0);
    $pdf->Cell(25 ,5,'FECHA:',0,0);
    $pdf->Cell(34 ,5,$fecha,0,1);
    
    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,utf8_decode('Nº PEDIDO:'),0,0);
    $pdf->Cell(34 ,5,$pedido,0,1);
    
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(130 ,5,'Factura A',0,0);
    $pdf->Cell(59 ,5,'',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(189 ,10,'',0,1);
    
    $pdf->Cell(50 ,10,$row["f_name"],0,1);
    
    $pdf->SetFont('Arial','B',10);
    /*Heading Of the table*/
    $pdf->Cell(10 ,6,'PR',1,0,'C');
    $pdf->Cell(80 ,6,'DESCRIPCION',1,0,'C');
    $pdf->Cell(23 ,6,'CANTIDAD',1,0,'C');
    $pdf->Cell(30 ,6,'P. UNITARIO',1,0,'C');
    $pdf->Cell(20 ,6,'IVA',1,0,'C');
    $pdf->Cell(25 ,6,'TOTAL',1,1,'C');/*end of line*/
    /*Heading Of the table end*/
    
    $pdf->SetFont('Arial','',10);
    $i = 1;
    $total = 0;
    foreach ($productos as $producto) {
        $cantidad = $producto["qty"];
        $precio = $producto["amt"] * $cantidad;
        $iva = $precio + ($precio * 0.21);
        $pdf->Cell(10 ,6,$i,1,0);
        $pdf->Cell(80 ,6,$producto["product_title"],1,0);
        $pdf->Cell(23 ,6,$producto["qty"],1,0,'R');
        $pdf->Cell(30 ,6,$producto["amt"],1,0,'R');
        $pdf->Cell(20 ,6,'21%',1,0,'R');
        $pdf->Cell(25 ,6,$iva,1,1,'R');
        $i++;
        $total += $iva;
    }
    
    $pdf->Cell(118 ,6,'',0,0);
    $pdf->Cell(25 ,6,'SUBTOTAL',0,0);
    $pdf->Cell(45 ,6,$total,1,1,'R');
    
    // Generar el archivo PDF
    ob_end_clean(); // Limpiar el búfer de salida
    $pdf->Output('factura.pdf', 'D'); // Descargar el archivo PDF con el nombre "ticket.pdf"
} else {
    echo 'No hay productos comprados.';
}
