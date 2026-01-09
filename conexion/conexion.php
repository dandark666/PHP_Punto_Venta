<?php

    $servidor = "localhost";
    $usuario = "id22216022_rojo";
    $contra = "123456Rr.";
    $basededatos = "id22216022_puntov";

    $conexion = mysqli_connect(

        $servidor,
        $usuario,
        $contra,
        $basededatos
        
    ) OR DIE("PROBLEMAS AL CONECTAR CON EL SERVIDOR");

    /*if(!$conexion){
        
        echo "PROBLEMA AL REALIZAR LA CONEXION";

    }*/
