<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Presentacion</title>
    <link rel="stylesheet" href="estilos/categoria1.css">
</head>
<body>
<header class="header">
        <div class="logo">
<!---->            <img src="res/logo.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
    <li><a href="producto.php">Registrar Producto</a></li>
    <li><a href="consulta-Productos.php">Consultar Producto</a></li>
    <li><a href="RegistraUsuario.php">Registrar Usuario</a></li>
</ul>
</nav>
<a class="btn" href="cerrarSesion.php"><button>Cerrar Sesion</button></a>

<a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<div id="mobile-menu" class="overlay">
    <a onclick="closeNav()" href="" class="close">&times;</a>
    <div class="overlay-content">
        <a href="producto.php">Registrar Producto</a>
        <a href="consulta-Productos.php">Consultar Producto</a>
        <a href="RegistraUsuario.php">Registrar Usuario</a>
        <a href="cerrarSesion.php">Cerrar Sesion</a>
    </div>
</div>
<script type="text/javascript" src="nav.js"></script>
    </header>
     
    <?php
            if (isset($_SESSION['user'])) {
            if ($_SESSION['rol'] == 1) {
             ?>
            <section class="contenedor">
    <article class="content-art1">
        <h3>Registrar Presentación</h3>
        <form action="reg-Presentacion.php" method="post">
            <table class="catT">
                <tr>
                    <td>
                        <label>CODIGO PRESENTACION</label>
                    </td>
                    <td>
                        <input type="text" name="txtCat" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>DESCRIPCION</label>
                    </td>
                    <td>
                        <input type="text" name="txtdescripcion" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="buttons" type="reset">CANCELAR</button>
                    </td>
                    <td>
                        <button class="buttons" type="submit">REGISTRAR</button>
                    </td>
                </tr>
            </table>
        </form>
    </article>
    <article class="content-art2">
        <table border="1" class="tablaCat">
            <tr>
                <th>NO.</th>
                <th>DESCRIPCION</th>
                <th>ESTATUS</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
            <?php
            include("conexion/conexion.php");
            $consulta ="CALL ObtenerPresentaciones()";
            $areas = mysqli_query($conexion, $consulta);
            while($regPres = mysqli_fetch_assoc($areas)){
                echo "<tr>".
                "<td data-label='NO.'>".$regPres["idPresentacion"] . "</td>".
                "<td data-label='DESCRIPCION'>".$regPres["descripcionPres"] . "</td>".
                "<td data-label='ESTATUS'>".$regPres["estatus"] . "</td>".
                "<td data-label='EDITAR'><a href='modificar-pres.php?id=".$regPres["idPresentacion"]."' title='Editar'><img src='res/edit.png' width='30' height='30'></a></td>".
                "<td data-label='ELIMINAR'><a href='elim-pres.php?id=".$regPres["idPresentacion"]."' title='Eliminar'><img src='res/elim.png' width='30' height='30'></a></td>".
                "</tr>";
            }
            ?>
        </table>
    </article>
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

