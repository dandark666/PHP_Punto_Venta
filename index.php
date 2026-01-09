<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
    <link rel="stylesheet" href="estilos/login2.css">
</head>
<body>
    <section class="section">
        
        <div class="centrado">
            <h1 style="text-align: center;">Iniciar Sesión</h1><br>
            <form action="login-conectar.php" method="POST">
                <h4>Usuario</h4>
                <input style="color: black;" class="menu" type="text" id="txtusuario" name="txtusuario" placeholder="Usuario" required>
                <h4>Contraseña</h4>
                <input style="color: black;" class="menu" type="password" id="txtcontraseña" name="txtcontraseña" placeholder="Contraseña" required><br>
                <button class="boton" type="submit" name="enviar">Ingresar</button>
            </form>
        </div>
    </section>
    
</body>
</html>