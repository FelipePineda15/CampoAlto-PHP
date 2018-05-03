<?php

    include '../../Clases/Base.php';
    include '../../Clases/Conexion.php';
    include '../../Clases/Usuario.php';

    $ObjBase = new Base;
    $ObjConexion = new Conexion;
    $ObjUsuario = new Usuario;
    
    $Conexion = $ObjConexion->Conectar();
    $Documento = $_GET['Documento'];    
    $Datos = $ObjUsuario->ConsultarDocumento($Conexion, $Documento);
    
?>
<style>
<!--
#encabezado {padding:5px 0; border-bottom: 1px solid; width:100%;margin:auto;}
#encabezado .fila #col_1 {width: 15%; text-align: left;}
#encabezado .fila #col_2 {text-align:left; width: 65%}

#encabezado .fila #col_2 #span1{font-size: 15px;}
#encabezado .fila #col_2 #span2{font-size: 15px; color: #ccc;}

#footer {padding-bottom:5px 0;border-top: 2px solid #46d; width:80%; margin:auto;}
#footer .fila td {text-align:center; width:100%;}
#footer .fila td span {font-size: 10px; color: #000;}

#fecha {margin-top:100px; width:100%;}
#fecha tr td {text-align: right; width:100%;}

#central {margin-top:20px; width:100%;}
#central tr td {padding: 0px; text-align:left; width:100%;}

#datos { margin:auto; width:100%;}
#central td{border:2px solid black;padding: 4px;}
-->
</style>
<page backtop="28mm" backbottom="10mm" backleft="15mm" backright="10mm">
    
    <page_header>
        <table id="encabezado">
            <tr class="fila">
                <td id="col_1" >
                <img src="https://www.cmasdcomunicacion.com/wp-content/uploads/2016/12/Clientes-cmasd-Campoalto.jpg" width="260" height=100>
                </td>
                <td id="col_2">
                    <span id="span1"> CAMPOALTO</span>
                    <br>
                    <span id="span2">Inspiramos tu futuro </span>
                </td>
            </tr>
        </table>
    </page_header>
        
    <page_footer> 
        <table id="footer">
            <tr class="fila">
                <td>
                    <span>Factura de Pago</span>
                </td>
            </tr>
        </table>
    </page_footer>
            <p align="right">
            <?php
$fecha = date('Y-m-j H:i:s'); //Inicializando con la hora

$nuevafecha = strtotime ( '-7 hour' , strtotime ( $fecha ) ) ;

$nuevafecha = date ( 'j/m/Y  H:i:s' , $nuevafecha );

            echo $nuevafecha." hrs<br>";
            $dia = date("j"); 
            $mes = date("n"); 
            $anio = date("Y"); 
            $m="";
            switch ($mes) {
                case 1:$m="Enero"; break;
                case 2:$m="Febrero"; break;
                case 3:$m="Marzo"; break;
                case 4:$m="Abril"; break;
                case 5:$m="Mayo"; break;
                case 6:$m="Junio"; break;
                case 7:$m="Julio"; break;
                case 8:$m="Agosto"; break;
                case 9:$m="Septiembre"; break;
                case 10:$m="Octubre"; break;
                case 11:$m="Noviembre"; break;
                case 12:$m="Diciembre"; break;
            }
            echo $dia." de ".$m." de ".$anio;
            
            while($row=mysqli_fetch_array($Datos)){
            $No_Carne = $row['No_Carne'];
            $Documento = $row['Documento'];
            $Nombres = $row['Nombres'];
            $Apellidos = $row['Apellidos'];
            $ID_Programa = $row['ID_Programa'];
            $ID_Semestre = $row['ID_Semestre'];
            }
            
            ?></p>
            <p align="center"><b> DATOS DEL ESTUDIANTE</b></p>
            <br><br><br>
            <p align='left'>No. Carné: <?php  echo $No_Carne;?></p>
            <p align='left'>Documento: <?php  echo $Documento;?></p>
            <p align='left'>Nombres: <?php  echo $Nombres;?></p>
            <p align='left'>Apellidos: <?php  echo $Apellidos;?></p>
            <p align='left'>Programa: <?php  echo $ID_Programa;?></p>
            <p align='left'>Semestre: <?php  echo $ID_Semestre;?></p>

    <table id="central" style="width: 100%; border-collapse: collapse" border>    
        <tr style="height:10px" class="fila">
            <td style="width:20%;height:auto;" align="center"><b>Documento</b></td>
            <td style="width:20%;height:auto;" align="center"><b>Nombres</b></td>
            <td style="width:20%;height:auto;" align="center"><b>Apellidos</b></td>
            <td style="width:20%;height:auto;" align="center"><b>Programa</b></td>
            <td style="width:20%;height:auto;" align="center"><b>Semestre</b></td>
        </tr>
        <?php       
            $link = mysqli_connect("localhost", "root", "", "Campo_Alto");
        $sql = "SELECT * FROM estudiante WHERE Documento = $Documento";
        $Dato = mysqli_query($Conexion, $sql);             
        ?>
        <tr  class="fila">
            <td style="width:14%;height:auto;" align="center"><?php  echo $row['Documento'];?></td>
            <td style="width:14%;height:auto;" align="center"><?php  echo $row['Nombres'];?></td>
            <td style="width:14%;height:auto;" align="center"><?php  echo $row['Apellidos'];?></td>
            <td style="width:14%;height:auto;" align="center"><?php  echo $row['ID_Programa'];?></td>           
            <td style="width:14%;height:auto;" align="center"><?php  echo $row['ID_Semestre'];?></td>
        </tr>
        <?php        
        ?>
        <tr style="height:10px" class="fila">
            <td colspan="5"  align="right"><?php echo "<b> Total a pagar: </b>" ?></td>
        </tr>
    </table>
</page>
<?php
    $content = ob_get_clean();
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3); 
        $html2pdf->pdf->SetDisplayMode('fullpage'); 
        $html2pdf->writeHTML($content);
        $html2pdf->Output('Factura.pdf'); 
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>