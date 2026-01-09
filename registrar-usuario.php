<?php
    $Nombre = $_POST['txtName'];
    $ape1 = $_POST['txtApe1'];
    $ape2 = $_POST['txtApe2'];
    $usuario = $_POST['txtUser'];
    $contraseña = $_POST['txtpass'];
    $Rol = $_POST['selectrol'];

    

    $cons = "INSERT usuario VALUES (default,'$Nombre', '$ape1', '$ape2', '$usuario', MD5('$contraseña'), '$Rol',DEFAULT);";


    include("conexion/conexion.php");
    if(mysqli_query($conexion,$cons)){
        header("location:venta.php");
    }else{
        echo"PROBLEMAS AL REGISTRAR EL USUARIO";
    }
    mysqli_close($conexion);
    ?>