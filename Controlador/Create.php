<html>
    <head>
        <title>Registro Estudiantes</title>
        <link rel="alternate" type="application/rss+xml" title="Estudiantes CampoAlto» Feed" href="">
        <link rel="alternate" type="application/rss+xml" title="Estudiantes CampoAlto » RSS de los comentarios" href="">
        <script src="http://www.campoalto.edu.co/campoalto/hermesoft/portalIG/home_1/recursos/recursos2010/23112010/campo.jpg" type="text/javascript"
        defer=""></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="Formato.css">
    </head>
    
<?php
include '../Clases/Conexion.php';
include '../Clases/Usuario.php';

$ObjConexion = new Conexion();
$Conexion = $ObjConexion->Conectar();

$ObjUsuario = new Usuario();
echo $ObjUsuario->Registrar($Conexion, $_POST['ID_Estudiante'], $_POST['Documento'], $_POST['Nombres'], $_POST['Apellidos'], $_POST['Direccion'], $_POST['Telefono'], $_POST['Celular'], $_POST['Email'], $_POST['ID_Programa'], $_POST['ID_Semestre'], $_POST['Huella_Dactilar'], $_POST['No_Carne']);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    
    <a href='../Index.php'>Inicio</a>";
    <body> 
    </body>
</html>
