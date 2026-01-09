<?php
include('conexion/conexion.php');
$marca = $_POST['txtIDM'];
$descripcionM = $_POST['txtMar'];
$status = $_POST['txtestatus'];


$consulta="Update marca
SET idMarca = '$marca',
descripcionmarca = '$descripcionM',
estatus = '$status'
WHERE idMarca = '$marca'";

if(mysqli_query($conexion,$consulta)){
    header("location:Marca.php");

}else{
    echo "Problemas al actualizar la Marca ,Consulte al administrador";
}

 mysqli_close($conexion);

?>