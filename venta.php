<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Venta de Productos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/venta2.css">
</head>
<body>
<header class="header">
        <div class="logo">
<!---->            <img src="res/logo.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="Consulta-ven.php">Consultar Venta</a></li>
                <li><a href="producto.php">Registrar Producto</a></li>
                <li><a href="RegistraUsuario.php">Registrar Usuarios</a></li>
           </ul>            
        </nav>
        <a class="btn" href="cerrarSesion.php"><button>Cerrar Sesion</button></a>

<!---->        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<!---->        <div id="mobile-menu" class="overlay">
<!---->            <a onclick="closeNav()" href="" class="close">&times;</a>
<!---->            <div class="overlay-content">
<!---->                <a href="Consulta-ven.php">Consultar Venta</a>
<!---->                <a href="producto.php">Registrar Producto</a>
<!---->                <a href="RegistraUsuario.php">Registrar Usuarios</a>
<!---->                <a href="cerrarSesion.php">Cerrar Sesion</a>
<!---->            </div>
<!---->        </div>

    </header>


<!---->    <script type="text/javascript" src="nav.js"></script>


<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
        ?>
<div class="container">
    <h1>Agregar Productos a la Venta</h1>
    <form id="productForm" class="form-container">
        <label for="codigo">Código del Producto:</label>
        <input type="text" id="codigo" name="codigo" required>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        <button type="button" onclick="addProduct()">Agregar</button>
    </form>

    <h2>Productos en la Venta</h2>
    <div class="table-container">
        <table id="productTable" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <h2>Total: $<span id="total">0.00</span></h2>
    <button type="button" onclick="finalizeSale()">Finalizar Venta</button>
</div>

<script src="sales.js"></script>
</body>
</html>
<?php
    } else {
        echo "No tienes privilegios para ingresar al sitio.";
    }
} else {
    echo "Para ingresar debes <a href='index.php'>iniciar sesión</a>";
}
?>
