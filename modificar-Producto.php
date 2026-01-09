<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/Rproducto1.css">
    <title>Actualizar Producto</title>
</head>
<body>
<div class="contenedor"> 
    <h1>Actualizar Producto</h1>

    <?php
require("conexion/conexion.php");
$idProd = $_GET['id'];
$consulta = "SELECT * FROM producto WHERE clvProd='$idProd'";
#EJECUTAR LA CONSULTA
$Presentacion = mysqli_query($conexion, $consulta);
$regPreod = mysqli_fetch_array($Presentacion);

?>

<form action="actualizar-prod.php" method="post">
    <table>
        <tr>
            <input type="hidden" name="txtIDM" value="<?php echo $idProd ?>">
        </tr>
        <tr>
            <td><label>Nombre:</label></td>
            <td><input type="text" name="txtNombre" required value="<?php echo $regPreod[1] ?>"></td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" name="txtDescripcion" required value="<?php echo $regPreod[2] ?>"></td>
        </tr>
        <tr>
            <td><label>Precio Actual:</label></td>
            <td><input type="text" name="txtPrecio" required value="<?php echo $regPreod[3] ?>"></td>
        </tr>
        <tr>
            <td><label>Stock Minimo:</label></td>
            <td><input type="text" name="txtStockMin" required value="<?php echo $regPreod[4] ?>"></td>
        </tr>
        <tr>
            <td><label>Stock Maximo:</label></td>
            <td><input type="text" name="txtStockMax" required value="<?php echo $regPreod[5] ?>"></td>
        </tr>
        <tr>
            <td><label>Stock Actual:</label></td>
            <td><input type="text" name="txtStockActual" required value="<?php echo $regPreod[6] ?>"></td>
        </tr>
        <tr>
            <td><label>Presentacion:</label></td>
            <td>
                <select name="selectPres">
                    <option value="">--seleccione--</option>
                    <?php
                    include("conexion/conexion.php");
                    $sql = "SELECT * FROM presentacion";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($mosPresentacion = mysqli_fetch_array($resultado)) {
                        $selected = ($mosPresentacion[0] == $regPreod[7]) ? "selected" : "";
                        echo '<option value="' . $mosPresentacion[0] . '" ' . $selected . '>' . $mosPresentacion['descripcionPres'] . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Categoria:</label></td>
            <td>
                <select name="selectCategoria">
                    <option value="">--seleccione--</option>
                    <?php
                    $sql = "SELECT * FROM categoria";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($mosCategoria = mysqli_fetch_array($resultado)) {
                        $selected = ($mosCategoria[0] == $regPreod[8]) ? "selected" : "";
                        echo '<option value="' . $mosCategoria[0] . '" ' . $selected . '>' . $mosCategoria['descripcionCat'] . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Marca:</label></td>
            <td>
                <select name="selecMarca">
                    <option value="">--seleccione--</option>
                    <?php
                    $sql = "SELECT * FROM marca";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($mosMarca = mysqli_fetch_array($resultado)) {
                        $selected = ($mosMarca[0] == $regPreod[9]) ? "selected" : "";
                        echo '<option value="' . $mosMarca[0] . '" ' . $selected . '>' . $mosMarca['descripcionmarca'] . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
         <tr>
            <td><label>Estatus:</label></td>
            <td><input type="text" name="txtEstatus" required value="<?php echo $regPreod[10] ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">ACTUALIZAR</button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <a href="Consulta-Productos.php"><button type="button">CANCELAR</button></a>
            </td>
        </tr>
    </table>
</form>
</div>   
</body>
</html>