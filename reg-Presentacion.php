<?php
    $clav = $_POST['txtCat'];
    $descrip = $_POST['txtdescripcion'];

   $cons = "INSERT presentacion VALUES ('$clav', '$descrip',DEFAULT);";

    include("conexion/conexion.php");
    if(mysqli_query($conexion,$cons)){
        header("location:Presentacion.php");
    }else{
        echo"PROBLEMAS AL REGISTRAR LA MARCA";
    }
    mysqli_close($conexion);
    ?>