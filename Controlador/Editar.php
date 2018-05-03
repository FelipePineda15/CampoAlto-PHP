<?php

    include '../Clases/Conexion.php';
    include '../Clases/Usuario.php';
    
    $ObjConexion = new Conexion();
    $ObjUsuario = new Usuario();
    
    $Conexion = $ObjConexion->Conectar();
    $ObjUsuario->Consultar($Conexion, $Documento);
    echo "<br>";
    echo "<br>"; 
    echo "<a href='../Index.php'>Inicio</a>";