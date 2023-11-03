<?php
	include 'plantilla.php';
	require 'modelo/conexiondb.php';
	
	$conn = Conectarse();
	$resultado = $conn->query("SELECT TipoDocUsuario, nodocUsuario, monbreUsuario, apellidoUsuario, direccionUsuario, telefonoUsuario, correoUsuario, `estadoUsuario` FROM usuario");
			
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(20,6,'TIP ',1,0,'C',1);
	$pdf->Cell(20,6,'NUMERO',1,0,'C',1);
	$pdf->Cell(20,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(20,6,'APELLIDO',1,0,'C',1);
	$pdf->Cell(25,6,'DIRECCION',1,0,'C',1);
	$pdf->Cell(20,6,'TELEfONO',1,0,'C',1);
	$pdf->Cell(38,6,'CORREO',1,0,'C',1);
	$pdf->Cell(20,6,'ESTADO',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch())
	{
		$pdf->Cell(20,6,utf8_decode($row['TipoDocUsuario']),1,0,'C');
		$pdf->Cell(20,6,$row['nodocUsuario'],1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['monbreUsuario']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['apellidoUsuario']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['direccionUsuario']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['telefonoUsuario']),1,0,'C');
		$pdf->Cell(38,6,utf8_decode($row['correoUsuario']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['estadoUsuario']),1,1,'C');
	}
	$pdf->Output();
?>