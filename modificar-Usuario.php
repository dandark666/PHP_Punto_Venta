<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/Rusuario1.css">
    <title>Editar Usuario</title>
</head>
<body>

<div class="contenedor"> 
    <h1>Editar Usuario</h1>

    <?php
require("conexion/conexion.php");
$idProd = $_GET['id'];
$consulta = "SELECT * FROM usuario WHERE idUsuario='$idProd'";
#EJECUTAR LA CONSULTA
$Presentacion = mysqli_query($conexion, $consulta);
$regPreod = mysqli_fetch_array($Presentacion);

?>

<form action="actualizar-usuario.php" method="post">
    <table>
        <tr>
            <input type="hidden" name="txtIDM" value="<?php echo $idProd ?>">
        </tr>
        <tr>
            <td><label>Nombre:</label></td>
            <td><input type="text" name="txtNombre" required value="<?php echo $regPreod[1] ?>"></td>
        </tr>
        <tr>
            <td><label>Apellido Paterno:</label></td>
            <td><input type="text" name="txtApe1" required value="<?php echo $regPreod[2] ?>"></td>
        </tr>
        <tr>
            <td><label>Apellido Materno:</label></td>
            <td><input type="text" name="txtApe2" required value="<?php echo $regPreod[3] ?>"></td>
        </tr>
        <tr>
            <td><label>Usuario:</label></td>
            <td><input type="text" name="txtUser" required value="<?php echo $regPreod[4] ?>"></td>
        </tr>
        <tr>
            <td><label>Contraseña:</label></td>
            <td><input type="password" name="txtpass" required value="<?php echo $regPreod[5] ?>"></td>
        </tr>
        <tr>
            <td><label>Rol:</label></td>
            <td>
            <select name="selectrol" required>
                        <option value="">--seleccione--</option>
                        <?php
                        include("conexion/conexion.php");
                        $sql = "SELECT * FROM rol";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($mosCategoria = mysqli_fetch_array($resultado)) {
                            $selected = ($mosCategoria[0] == $regPreod[6]) ? "selected" : "";
                            echo '<option value="' . $mosCategoria[0] . '" ' . $selected . '>' . $mosCategoria['rol'] . '</option>';
                        }
                        ?>
                    </select>
            </td>
        </tr>
        <tr>
            <td><label>Estatus:</label></td>
            <td><input type="text" name="txtEstatus" required value="<?php echo $regPreod[7] ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Actualizar</button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <a href="consultar-Usuario.php"><button type="button">CANCELAR</button></a>
            </td>
        </tr>
    </table>
</form>
</div>       
</body>
</html>