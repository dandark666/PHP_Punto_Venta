<?php
session_start();
?>
<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registrar Usuario</title>
            <link rel="stylesheet" href="estilos/Rusuario1.css">
            
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
                    <li><a href="consultar-Usuario.php">Consultar Usuario</a></li>
               </ul>            
            </nav>
            <a class="btn" href="cerrarSesion.php"><button>Cerrar Sesion</button></a>
    
    <!---->        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>
    
    <!---->        <div id="mobile-menu" class="overlay">
    <!---->            <a onclick="closeNav()" href="" class="close">&times;</a>
    <!---->            <div class="overlay-content">
    <!---->                <a href="venta.php">Venta</a>
    <!---->                <a href="consulta-Productos.php">Consultar Producto</a>
    <!---->                <a href="consultar-Usuario.php">Consultar Usuario</a>
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

            
    <h1>Registrar Usuario</h1>
    <form action="registrar-usuario.php" method="post">
        <table>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type="text" name="txtName"></td>
            </tr>
            <tr>
                <td><label>Apellido Paterno:</label></td>
                <td><input type="text" name="txtApe1"></td>
            </tr>
            <tr>
                <td><label>Apellido Materno:</label></td>
                <td><input type="text" name="txtApe2"></td>
            </tr>
            <tr>
                <td><label>Usuario:</label></td>
                <td><input type="text" name="txtUser"></td>
            </tr>
            <tr>
                <td><label>Contraseña:</label></td>
                <td><input type="password" name="txtpass"></td>
            </tr>
            <tr>
                <td><label>Rol:</label></td>
                <td>
                    <select name="selectrol">
                        <option value="">--seleccione--</option>
                        <?php
                        include("conexion/conexion.php");
                        $sql = "SELECT * FROM rol";
                        $resultado = mysqli_query($conexion, $sql);
                        while ($mosPresentacion = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $mosPresentacion[0] . '">' . $mosPresentacion['rol'] . '</option>';
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
