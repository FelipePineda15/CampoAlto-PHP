<?php

class Base {

    public function Conectar() {

        $link = mysqli_connect("localhost", "root", "", "Campo_Alto");

        if ($link === FALSE) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        return $link;
    }

    public function Login($Documento,$Conexion) {
        $sql = "Select Documento FROM Estudiante WHERE Documento = $Documento";
        $Datos = mysqli_query($Conexion, $sql);
        return $Datos;
    }
    
    public function Verificar($Documento, $Conexion){
        $sql = "SELECT Documento FROM Estudiante"
             . " WHERE Documento = $Documento";
        $Datos = mysqli_query($Conexion, $sql);
        $Identificacion = mysqli_fetch_array($Datos);
        return $Identificacion['Documento'];
    }
}