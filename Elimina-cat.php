<?php
include('conexion/conexion.php');
 
$idProd = $_GET['id'];
$sql = "UPDATE categoria SET estatus = '0'
    WHERE idCategoria = '$idProd'";

if(mysqli_query($conexion,$sql)){
    header("location:Categoria.php");
}else{
    echo "problemas al Eliminar la Categoria, consulte al administrador";
}
?>