<?php
    include("conexion/conexion.php");
    $clav = $_POST['txtCat'];
    $descrip = $_POST['txtdescripcion'];

    $cons = "INSERT categoria VALUES ('$clav', '$descrip',DEFAULT);";
    if(mysqli_query($conexion,$cons)){
        header("location:Categoria.php");
    }else{
        echo"PROBLEMAS AL REGISTRAR LA CATEGORIA";
    }
    mysqli_close($conexion);
    ?>