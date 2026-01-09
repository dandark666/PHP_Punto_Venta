<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/editar.css">
    <title>Editar Presentacion</title>
</head>
<body>
<div class="contenedor"> 
    <h1>Actualizar Precentacion</h1>

    <?php
    require("conexion/conexion.php");
    $idPres = $_GET['id'];
    $consulta = "SELECT * FROM presentacion WHERE idPresentacion='$idPres'";
    #EJECUTAR LA CONSULTA
    $Presentacion = mysqli_query($conexion, $consulta);
    $regPres = mysqli_fetch_array( $Presentacion );

    ?>

    <form action = "actualizar-pres.php" method = "post">
    <table>
            <tr>
                <td>
                </td>
                
                <td>
    <input type = "hidden" name = "txtIDM" value="<?php echo $idPres ?>">
         </td>    
           </tr>
            <tr>
                <td>
                    <label> Descripcion </label>
                </td>
                
                <td>
                    <input type = "text" name = "txtMar" value="<?php echo $regPres[1] ?>">
                </td>    
            </tr>
            <tr>
                <td>
                    <label> Estatus </label>
                </td>
                
                <td>
                    <input type = "text" name = "txtest" value="<?php echo $regPres[2] ?>">
                </td>    
            </tr>
            
            <tr>
                <td>
                    <button type = "reset"> CANCELAR </button>
                </td>
                
                <td>
                    <button type = "submit"> GUARDAR CAMBIOS </button>
                </td>  
            </tr>
        </table>
    </form>
    </div>   
</body>
</html>