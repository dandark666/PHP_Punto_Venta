<?php
include('conexion/conexion.php');
$cat = $_POST['txtIDM'];
$descripcionC = $_POST['txtMar'];
$estatus = $_POST['txtest'];


$consulta="Update presentacion
SET idPresentacion = '$cat',
descripcionPres = '$descripcionC',
estatus ='$estatus'
WHERE idPresentacion = '$cat'";

if(mysqli_query($conexion,$consulta)){
    header("location:Presentacion.php");

}else{
    echo "Problemas al actualizar la Presentacion ,Consulte al administrador";
}

 mysqli_close($conexion);

?>