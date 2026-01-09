<?php
    $clav = $_POST['txtCat'];
    $descrip = $_POST['txtdescripcion'];

   $cons = "INSERT marca VALUES ('$clav', '$descrip',DEFAULT);";

    include("conexion/conexion.php");
    if(mysqli_query($conexion,$cons)){
        header("location:Marca.php");
    }else{
        echo"PROBLEMAS AL REGISTRAR LA MARCA";
    }
    mysqli_close($conexion);
    ?>