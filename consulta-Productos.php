<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Productos</title>
    <link rel="stylesheet" href="estilos/ConsultaP.css">
    
</head>
<body>
<header class="header">
        <div class="logo">
<!---->            <img src="res/logo.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
           <li><a href="producto.php">Registrar Producto</a></li>
           <li><a href="Categoria.php">Registrar Categoria</a></li>
           <li><a href="Marca.php">Registrar Marca</a></li>
           <li><a href="Presentacion.php">Registrar Presentacion</a></li>
           </ul>            
        </nav>
        <a class="btn" href="index.php"><button>Cerrar Sesion</button></a>

<!---->        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<!---->        <div id="mobile-menu" class="overlay">
<!---->            <a onclick="closeNav()" href="" class="close">&times;</a>
<!---->            <div class="overlay-content">
<!---->                <a href="producto.php">Registrar Producto</a>
<!---->                <a href="Categoria.php">Registrar Categoria</a>
<!---->                <a href="Marca.php">Registrar Marca</a>
<!---->                <a href="Presentacion.php">Registrar Pres</a>
                       <a href="cerrarSesion.php">Cerrar Sesion</a>
<!---->            </div>
<!---->        </div>

    </header>
     <script type="text/javascript" src="nav.js"></script>
    <h1>Consultar Productos</h1>
<article class="content-art2">
        <table border="1" class="tablaCat">
        <tr>
            <th> Clave </th>
            <th> Nombre </th>
            <th> Descripcion</th>
            <th> Precio Actual</th>
            <th> Stock Minimo </th>
            <th> Stock Maximo </th>
            <th> Stock Actual</th>
            <th> Presentacion</th>
            <th> Categoria</th>
            <th> Marca</th>
            <th> Estatus</th>
            <th> Editar</th>
            <th> Eliminar</th>
        </tr>

         <?php

        include("conexion/conexion.php");
        $consulta = "CALL ObtenerProductos()";

# EJECUTAR LA CONSULTA
$areas = mysqli_query($conexion, $consulta);

# EXTRAER LOS DATOS DE LA CONSULTA
while ($mostrarProducto = mysqli_fetch_assoc($areas)) {
    echo "<tr>" .
        "<td>" . $mostrarProducto["clvProd"] . "</td>" .
        "<td>" . $mostrarProducto["nombreProd"] . "</td>" .
        "<td>" . $mostrarProducto["descripcionProd"] . "</td>" .
        "<td>" . $mostrarProducto["precioAct"] . "</td>" .
        "<td>" . $mostrarProducto["stockMIn"] . "</td>" .
        "<td>" . $mostrarProducto["stockMax"] . "</td>" .
        "<td>" . $mostrarProducto["stockAct"] . "</td>" .
        "<td>" . $mostrarProducto["nombrePresentacion"] . "</td>" .
        "<td>" . $mostrarProducto["nombreCategoria"] . "</td>" .
        "<td>" . $mostrarProducto["nombreMarca"] . "</td>" .
        "<td>" . $mostrarProducto["estatus"] . "</td>" .
        "<td><a href='modificar-Producto.php?id=" . $mostrarProducto["clvProd"] . "' title='Editar'><img src='res/edit.png' width='30' height='30'></a></td>" .
        "<td><a href='Eliminat-Producto.php?id=" . $mostrarProducto["clvProd"] . "'title='Eliminar'><img src='res/elim.png' width='30' height='30'></a></td>" .
        "</tr>";
}

           ?>

        </table>
</article>
</body>
</html>