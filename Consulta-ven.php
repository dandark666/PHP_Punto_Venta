<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultar Venta</title>
  <link rel="stylesheet" href="estilos/ConsultaP.css">
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
    <!---->                <a href="cerrarSesion.php">Cerrar Sesion</a>
    <!---->            </div>
    <!---->        </div>
    
        </header>
        <script type="text/javascript" src="nav.js"></script>
        <?php
            if (isset($_SESSION['user'])) {
            if ($_SESSION['rol'] == 1) {
             ?>

<h1>Consultar Venta</h1>
<article class="content-art2">
        <table border="1" class="tablaCat">
        <tr>
            <th> Folio </th>
            <th> Fecha </th>
            <th> Total </th>
            <th> Vendedor</th>
        </tr>

         <?php

        include("conexion/conexion.php");
        $consulta = "CALL ObtenerVentas()";

# EJECUTAR LA CONSULTA
$areas = mysqli_query($conexion, $consulta);

# EXTRAER LOS DATOS DE LA CONSULTA
while ($mostrarVenta = mysqli_fetch_assoc($areas)) {
    echo "<tr>" .
        "<td>" . $mostrarVenta["folioVenta"] . "</td>" .
        "<td>" . $mostrarVenta["fechaVenta"] . "</td>" .
        "<td>" . $mostrarVenta["totalVenta"] . "</td>" .
        "<td>" . $mostrarVenta["nombreUsuario"] . "</td>" .
        "</tr>";
}

           ?>

        </table>
</article>
  
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
