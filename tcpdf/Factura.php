<?php

include '../Clases/Conexion.php';
include '../Clases/Usuario.php';
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
require_once('conexion.php');
require_once './tcpdf/barcodes.php';

$ObjConexion = new Conexion();
$ObjUsuario = new Usuario();

$Documento = $_GET['Documento'];
$Conexion = $ObjConexion->Conectar();
$Datos = $ObjUsuario->Consultar($Conexion, $Documento);

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Tu Desprendible'); //Titlo del pdf
$pdf->setPrintHeader(false); //No se imprime cabecera
$pdf->setPrintFooter(false); //No se imprime pie de pagina
$pdf->SetMargins(20, 20, 20, false); //Se define margenes izquierdo, alto, derecho
$pdf->SetAutoPageBreak(true, 20); //Se define un salto de pagina con un limite de pie de pagina
$pdf->addPage();

$sql = "SELECT Documento, Nombres, Apellidos, Nombre_Programa, Numero_Semestre, Valor_Pago, Valor_Semestre FROM Estudiante INNER JOIN Programa ON Programa.ID_Programa = Estudiante.ID_Programa INNER JOIN semestre ON Semestre.ID_Semestre = Estudiante.ID_Semestre INNER JOIN pago ON pago.ID_Estudiante = estudiante.ID_Estudiante WHERE Documento = 1019120851";
$Datos = mysqli_query($Conexion, $sql);
$html = '';
$item = 1;

while ($row = mysqli_fetch_array($Datos)) {
    $Documento = $row['Documento'];
    $Nombres = $row['Nombres'];
    $Apellidos = $row['Apellidos'];
    $Nombre_Programa = $row['Nombre_Programa'];
    $Numero_Semestre = $row['Numero_Semestre'];
    $Valor_Semestre = $row['Valor_Semestre'];
    $Valor_Pago = $row['Valor_Pago'];
    $Fecha = date ('dmY');
    $FechaLimite = strtotime ('+15 day', strtotime($Fecha));
    $FechaLimite = date ('Ymd', $FechaLimite);
    $barcode = '(420)7709998075146(8020)' . $Documento . '(3900)' . $Valor_Pago . '(96)' . $FechaLimite;
    $Barcode = $pdf->serializeTCPDFtagParameters(array($barcode, 'C128', '', '', 72, 25, 0.5,
        array('position' => 'S', 'border' => false, 'padding' => 2, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'helvetica', 'fontsize' => 7, 'stretchtext' => 6), 'N'));

    $html .= '<page_header>
        <head>
            <title>CAMPOALTO</title>
            <link rel="alternate" type="application/rss+xml" title="Latin Sport F.C – Escuela de Fútbol » Feed" href="">
            <link rel="alternate" type="application/rss+xml" title="Latin Sport F.C – Escuela de Fútbol » RSS de los comentarios" href="">
            <script src="http://www.campoalto.edu.co/campoalto/hermesoft/portalIG/home_1/recursos/recursos2010/23112010/campo.jpg" type="text/javascript"
            defer=""></script>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../Formato.css">   
        </head>
        <img src="https://www.cmasdcomunicacion.com/wp-content/uploads/2016/12/Clientes-cmasd-Campoalto.jpg" width="100" height=100>
        <h2><h><p align = "center"> COMPLEJO EDUCATIVO CAMPO ALTO ACESALUD S.A. </p></h2><p align = "center"> NIT. 830.015.970-6 </p>
        <h4><p align = "center">Inspiramos tu futuro </p></h4>
        <h3><p align = "center">Desprendible de Pago </p></h3>
        <p align = "center">__________________________________________________________________________</p>
        <p align = "right">Fecha de Impresion : ' . date('d m Y - H:i:s') . '</p> <br>        
    </page_header>
    <p align="center"><b> DATOS DEL ESTUDIANTE </b></p>
        <table border="" cellpadding="5">
                                        <tr>
						<td width="100" bgcolor="#E6E6E6"><b>Documento: </b></td>
						<td width="220">' . $Documento . '</td>
					</tr>
					<tr>
						<td width="100" bgcolor="#E6E6E6"><b>Nombres: </b></td>
						<td width="220">' . $Nombres . '</td>
					</tr>
					<tr>
						<td bgcolor="#E6E6E6"><b>Apellidos: </b></td>
						<td>' . $Apellidos . '</td>
					</tr>
					<tr>
						<td bgcolor="#E6E6E6"><b>Programa: </b></td>
                                                <td>' . $Nombre_Programa . '</td>
					</tr>
					<tr>
						<td bgcolor="#E6E6E6"><b>Semestre: </b></td>
                                                <td>' . $Numero_Semestre . '</td>
					</tr>										
	</table><br><br><br>
    <p align="center"><b> CONCEPTOS DE COBRO </b></p>
        <table border = "1">
            <tr>
                <td><p align="center">Descripcion</p></td>                
            </tr>
            <tr>
                <td><p align="left">Matricula Tecnico en Servicios Farmaceuticos</p></td>          
            </tr>            
        </table>
        <p>           
        


        </p>
        <table border="1" cellpadding="5">
                                        <tr>
						<td width="100" bgcolor="#E6E6E6"><b>Fecha Limite De Pago: </b></td>
						<td>' . $FechaLimite . '</td>
					</tr>
					<tr>
						<td width="100" bgcolor="#E6E6E6"><b>Valor Semestre: </b></td>
						<td>' . $Valor_Semestre . '</td>
					</tr>
					<tr>
						<td bgcolor="#E6E6E6"><b>Total a Pagar: </b></td>
						<td>' . $Valor_Pago . '</td>
					</tr>
                                        
															
	</table>
        <br><br>
    <p align= "center"><tcpdf method="write1DBarcode" params="' . $Barcode . '" /></p>';


    $item = $item + 1;
}

$pdf->SetFont('Helvetica', '', 10);
$pdf->writeHTML($html, true, 0, true, 0);

$pdf->lastPage();
$pdf->output('Factura.pdf', 'I');
