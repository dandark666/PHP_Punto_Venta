<?php
    $clav = $_POST['txtCodigo'];
    $Nombre = $_POST['txtNombre'];
    $Descripcion = $_POST['txtDescripcion'];
    $PresioA = $_POST['txtPrecio'];
    $StockMIN = $_POST['txtStockMin'];
    $StockMaximo = $_POST['txtStockMax'];
    $StockAct = $_POST['txtStockActual'];
    $Pres = $_POST['selectPres'];
    $Cat = $_POST['selectCategoria'];
    $Mar = $_POST['selecMarca'];

    

   $cons = "INSERT producto VALUES ('$clav', '$Nombre', '$Descripcion', '$PresioA', '$StockMIN', '$StockMaximo', '$StockAct', '$Pres', '$Cat', '$Mar',DEFAULT);";

    include("conexion/conexion.php");
    if(mysqli_query($conexion,$cons)){
        header("location:consulta-Productos.php");
    }else{
        echo"PROBLEMAS AL REGISTRAR EL BECARIO";
    }
    mysqli_close($conexion);
    ?>