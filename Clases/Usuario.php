<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author usuario
 */
class Usuario {
    //put your code here
    public function Registrar($Conexion, $ID_Estudiante, $Documento, $Nombres, $Apellidos, $Direccion, $Telefono, $Celular, $Email, $ID_Programa, $ID_Semestre, $Huella_Dactilar , $No_Carne) {
        $query = "INSERT INTO estudiante (ID_Estudiante, Documento, Nombres, Apellidos, Direccion, Telefono, Celular, Email, ID_Programa, ID_Semestre, Huella_Dactilar, No_Carne) VALUES ($ID_Estudiante, $Documento, '$Nombres', '$Apellidos', '$Direccion', $Telefono, $Celular, '$Email', $ID_Programa, $ID_Semestre, $Huella_Dactilar, $No_Carne)";
        $Consulta = mysqli_query($Conexion, $query);
        
        if ($Consulta){
            $Respuesta = "Registrado con exito";
        }else{
            $Respuesta = "Problema con el registro";
        }
        
        return $Respuesta;
    }

    public function Consultar($Conexion, $Documento){
        $query="SELECT * FROM estudiante WHERE Documento = $Documento";
        $Consulta = mysqli_query($Conexion,$query);
        return $Consulta;
    }
    
    public function ConsultarDocumento($Conexion, $Documento){
        $query = "SELECT * FROM estudiante WHERE Documento = $Documento";
        $Consulta = mysqli_query($Conexion, $query);
        return $Consulta;
    }
    
    public function Editar($Conexion, $No_Carné, $Nombres, $Apellidos, $Direccion, $Telefono, $Celular, $Email, $ID_Programa, $ID_Semestre, $Huella_Dactilar, $Documento) {
       $query = "UPDATE estudiante SET No_Carné = $No_Carné ,Nombres ='$Nombres',Apellido ='$Apellidos', Direccion ='$Direccion', Telefono ='$Telefono', Celular ='$Celular', Email ='$Email', Programa ='$ID_Programa', Semestre ='$ID_Semestre', Huella_Dactilar ='$Huella_Dactilar' WHERE Documento='$Documento'";
       $Consulta = mysqli_query($Conexion, $query);
       
       if ($Consulta){
            $Respuesta = "Modificado con exito";
        } else {
            $Respuesta = "Problema al actualizar";
        }
        return $Respuesta;
    }
    
    public function Eliminar($Documento, $Conexion){
        $query= "DELETE FROM Campo_Alto WHERE Documento = $Documento";
        $Consulta = mysqli_query($Conexion, $query);
        if ($Consulta){
            $Respuesta = "Eliminado con exito";
        } else {
            $Respuesta = "Problema al eliminar";
        }
        return $Respuesta;
    }
    
}
