<?php
include('conexion/conexion.php');
  $clav = $_POST['txtIDM']; 
  $Nombre = $_POST['txtNombre'];
  $Descripcion = $_POST['txtDescripcion'];
  $PresioA = $_POST['txtPrecio'];
  $StockMIN = $_POST['txtStockMin'];
  $StockMaximo = $_POST['txtStockMax'];
  $StockAct = $_POST['txtStockActual'];
  $Pres = $_POST['selectPres'];
  $Cat = $_POST['selectCategoria'];
  $Mar = $_POST['selecMarca'];
  $estatus = $_POST['txtEstatus'];
  
  $consulta="Update producto
SET clvProd = '$clav',
nombreProd = '$Nombre',
descripcionProd ='$Descripcion',
precioAct = '$PresioA',
stockMIn = '$StockMIN ',
stockMax ='$StockMaximo',
stockAct ='$StockAct',
idPresentacion = '$Pres',
idCategoria = '$Cat',
idMarca= '$Mar',
estatus='$estatus'
WHERE clvProd = '$clav'";

    include("conexion/conexion.php");
    if(mysqli_query($conexion,$consulta)){
        header("location:consulta-Productos.php");
    }else{
        echo"PROBLEMAS AL REGISTRAR EL BECARIO";
    }
    mysqli_close($conexion);
    ?>