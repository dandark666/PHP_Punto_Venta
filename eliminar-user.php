<?php
include('conexion/conexion.php');
 
$idProd = $_GET['id'];
$sql = "UPDATE usuario SET estatus = '0'
    WHERE idUsuario = '$idProd'";

if(mysqli_query($conexion,$sql)){
    header("location:consultar-Usuario.php");
}else{
    echo "problemas al Eliminar Producto, consulte al administrador";
}