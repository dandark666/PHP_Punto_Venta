<?php
session_start();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registrar Productos</title>
            <link rel="stylesheet" href="estilos/Rproducto1.css">
            
        </head>
        <body>
        <header class="header">
        <div class="logo">
<!---->            <img src="res/logo.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="venta.php">Venta</a></li>
                <li><a href="consulta-Productos.php">Consultar Producto</a></li>
                <li><a href="RegistraUsuario.php">Registrar Usuario</a></li>
           </ul>            
        </nav>
        <a class="btn" href="cerrarSesion.php"><button>Cerrar Sesion</button></a>

<!---->        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<!---->        <div id="mobile-menu" class="overlay">
<!---->            <a onclick="closeNav()" href="" class="close">&times;</a>
<!---->            <div class="overlay-content">
<!---->                <a href="venta.php">Venta</a>
<!---->                <a href="consulta-Productos.php">Consultar Producto</a>
<!---->                <a href="RegistraUsuario.php">Registrar Usuario</a>
                       <a href="cerrarSesion.php">Cerrar Sesion</a>
<!---->            </div>
<!---->        </div>

    </header>
    <script type="text/javascript" src="nav.js"></script>
    <?php

        if (isset($_SESSION['user'])) {
        if ($_SESSION['rol'] == 1) {
    ?>
    <section class="contenedor">
    <h1>Registrar Producto</h1>
    <form action="registrar-producto.php" method="post">
        <table>
            <tr>
                <td><label>Codigo del Producto:</label></td>
                <td><input type="text" name="txtCodigo"required></td>
            </tr>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type="text" name="txtNombre"required></td>
            </tr>
            <tr>
                <td><label>Descripcion:</label></td>
                <td><input type="text" name="txtDescripcion"required></td>
            </tr>
            <tr>
                <td><label>Precio Actual:</label></td>
                <td><input type="text" name="txtPrecio"required></td>
            </tr>
            <tr>
                <td><label>Stock Minimo:</label></td>
                <td><input type="text" name="txtStockMin"required></td>
            </tr>
            <tr>
                <td><label>Stock Maximo:</label></td>
                <td><input type="text" name="txtStockMax"required></td>
            </tr>
            <tr>
                <td><label>Stock Actual:</label></td>
                <td><input type="text" name="txtStockActual"required></td>
            </tr>
            <tr>
                <td><label>Presentacion:</label></td>
                <td>
                    <select name="selectPres">
                        <option value="">--seleccione--</option>
                        <?php
                        include("conexion/conexion.php");
                        $sql = "SELECT * FROM presentacion WHERE estatus = 1";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($mosPresentacion = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $mosPresentacion[0] . '">' . $mosPresentacion['descripcionPres'] . '</option>';
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
                        $sql = "SELECT * FROM categoria WHERE estatus = 1";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($mosCategoria = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $mosCategoria[0] . '">' . $mosCategoria['descripcionCat'] . '</option>';
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
                        $sql = "SELECT * FROM marca WHERE estatus = 1";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($mosMarca = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $mosMarca[0] . '">' . $mosMarca['descripcionmarca'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">REGISTRAR</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="reset">CANCELAR</button>
                </td>
            </tr>
        </table>
    </form>
</section>
        </body>
        </html>
        <?php
    } else {
        echo "No tienes privilegios para ingresar al sitio, solo administradores.";
    }
} else {
    echo "Para ingresar debes <a href='index.php'>iniciar sesión</a>";
}
?>
