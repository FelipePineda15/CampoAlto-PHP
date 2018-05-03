<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author usuario
 */
class Conexion {
    //put your code here
    public function Conectar(){
        $link = mysqli_connect("localhost", "root", "", "campo_alto");
        
        if ($link === false){
            die("ERROR: Could not connect. " .mysqli_connect_error());
        }
        
        return $link;
    }
}
