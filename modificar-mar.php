<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/editar.css">
    <title>Editar Marca</title>
</head>
<body>
    <div class="contenedor"> 
    <h1>Actualizar  Marca</h1>

    <?php
    require("conexion/conexion.php");
    $idMar = $_GET['id'];
    $consulta = "SELECT * FROM marca WHERE idMarca='$idMar'";
    #EJECUTAR LA CONSULTA
    $Marcas = mysqli_query($conexion, $consulta);
    $regMar = mysqli_fetch_array($Marcas);

    ?>

    <form action = "actualizar-mar.php" method = "post">
    <table>
            <tr>
                <td>
                </td>
                
                <td>
    <input type = "hidden" name = "txtIDM" value="<?php echo $idMar ?>">
         </td>    
           </tr>
            <tr>
                <td>
                    <label> Descripcion </label>
                </td>
                
                <td>
                    <input type = "text" name = "txtMar" value="<?php echo $regMar[1] ?>">
                </td>    
            </tr>
            <tr>
                <td>
                    <label> Estatus </label>
                </td>
                
                <td>
                    <input type = "text" name = "txtestatus" value="<?php echo $regMar[2] ?>">
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