<?php
include "Clases/Conexion.php";
include "Clases/Usuario.php";

$ObjConexion = new Conexion;
$ObjUsuario = new Usuario;

$Conexion = $ObjConexion->Conectar();
$Datos = $ObjUsuario->ConsultarDocumento($Conexion, $_POST['Documento']);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>CAMPOALTO</title>
        <link rel="alternate" type="application/rss+xml" title="Latin Sport F.C – Escuela de Fútbol » Feed" href="">
        <link rel="alternate" type="application/rss+xml" title="Latin Sport F.C – Escuela de Fútbol » RSS de los comentarios" href="">
        <script src="http://www.campoalto.edu.co/campoalto/hermesoft/portalIG/home_1/recursos/recursos2010/23112010/campo.jpg" type="text/javascript"
        defer=""></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="Formato.css">   
    </head>
    <body>
        <table border="1" class="tabla">

            <tr>
                <th>ID_Estudiante</th>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Email</th>
                <th>ID_Programa</th>
                <th>ID_Semestre</h>
                <th>No. Carné</th>
            </tr>

            <?php
            while ($Dato = mysqli_fetch_array($Datos)) {
                ?>
                <tr>
                    <td><?php echo $Dato['ID_Estudiante'] ?></td>
                    <td><?php echo $Dato['Documento'] ?></td>
                    <td><?php echo $Dato['Nombres'] ?></td>
                    <td><?php echo $Dato['Apellidos'] ?></td>
                    <td><?php echo $Dato['Direccion'] ?></td>
                    <td><?php echo $Dato['Telefono'] ?></td>
                    <td><?php echo $Dato['Celular'] ?></td>
                    <td><?php echo $Dato['Email'] ?></td>
                    <td><?php echo $Dato['ID_Programa'] ?></td>
                    <td><?php echo $Dato['ID_Semestre'] ?></td>            
                    <td><a href="html2pdf/pdf/Factura.php?Documento=<?php echo $Dato['Documento']; ?>">Generar PDF</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <a href="Index.php">Inicio</a>
    </body>
</html>