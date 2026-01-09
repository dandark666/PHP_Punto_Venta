<?php
include('conexion/conexion.php');
 
$idProd = $_GET['id'];
$sql = "UPDATE marca SET estatus = '0'
    WHERE idMarca = '$idProd'";

if(mysqli_query($conexion,$sql)){
    header("location:Marca.php");
}else{
    echo "problemas al Eliminar Producto, consulte al administrador";
}
?>