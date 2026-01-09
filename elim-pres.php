<?php
include('conexion/conexion.php');
 
$idProd = $_GET['id'];
$sql = "UPDATE presentacion SET estatus = '0'
    WHERE idPresentacion = '$idProd'";

if(mysqli_query($conexion,$sql)){
    header("location:Presentacion.php");
}else{
    echo "problemas al Eliminar la Categoria, consulte al administrador";
}
?>