<?php
   include('conexion/conexion.php');
   $clav = $_POST['txtIDM']; 
   $Nombre = $_POST['txtNombre'];
   $Descripcion = $_POST['txtApe1'];
   $PresioA = $_POST['txtApe2'];
   $StockMIN = $_POST['txtUser'];
   $StockMaximo = $_POST['txtpass'];
   $StockAct = $_POST['selectrol'];
    $estatus = $_POST['txtEstatus'];
   
   
   $consulta = "UPDATE usuario
             SET Nombre = '$Nombre',
                 ApellidoP = '$Descripcion',
                 ApellidoM = '$PresioA',
                 Usuario = '$StockMIN ',
                 Clave = MD5('$StockMaximo'),
                 idrol = '$StockAct',
                 estatus='$estatus'
             WHERE idUsuario = '$clav'";
    


    include("conexion/conexion.php");
    if(mysqli_query($conexion,$consulta)){
        header("location:consultar-Usuario.php");
    }else{
        echo"PROBLEMAS AL REGISTRAR EL USUARIO";
    }
    mysqli_close($conexion);
    ?>