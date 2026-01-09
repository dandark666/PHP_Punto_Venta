<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/editar.css">
    <title>Editar categoria</title>
</head>
<body>
    <div class="contenedor"> 
    <h1>Actualizar Categoria</h1>

    <?php
    require("conexion/conexion.php");
    $idCat = $_GET['id'];
    $consulta = "SELECT * FROM categoria WHERE idCategoria='$idCat'";
    #EJECUTAR LA CONSULTA
    $Categorias = mysqli_query($conexion, $consulta);
    $regcat = mysqli_fetch_array($Categorias );

    ?>

    <form action = "actualizar-cat.php" method = "post">
    <table>
            <tr>
                <td>
                </td>
                
                <td>
    <input type = "hidden" name = "txtIDM" value="<?php echo $idCat ?>">
         </td>    
           </tr>
            <tr>
                <td>
                    <label> Descripcion </label>
                </td>
                
                <td>
                    <input type = "text" name = "txtMar" value="<?php echo $regcat[1] ?>">
                </td>    
            </tr>
            <tr>
                <td>
                    <label> Estatus </label>
                </td>
                
                <td>
                    <input type = "text" name = "txtestatus" value="<?php echo $regcat[2] ?>">
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