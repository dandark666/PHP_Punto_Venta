<?php
include('conexion/conexion.php');
$cat = $_POST['txtIDM'];
$descripcionC = $_POST['txtMar'];
$estatus=$_POST['txtestatus'];


$consulta="Update categoria
SET idCategoria = '$cat',
descripcionCat = '$descripcionC',
estatus='$estatus'
WHERE idCategoria = '$cat'";

if(mysqli_query($conexion,$consulta)){
    header("location:Categoria.php");

}else{
    echo "Problemas al actualizar la Categoria ,Consulte al administrador";
}

 mysqli_close($conexion);

?>