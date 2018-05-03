<?php

include '../Clases/UsuarioP.php';
include '../Clases/ConexionP.php';

$ObjConexion = new Conexion;
$ObjUsuario = new Usuario();

$Conexion = $ObjConexion->Conectar();
echo $ObjUsuario->Eliminar($_GET['Documento'], $Conexion);
echo "<br>";
echo "<br>";
echo "<a href='../IndexP.php'>Inicio</a>";
