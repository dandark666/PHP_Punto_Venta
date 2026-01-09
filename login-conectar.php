<?php
    if (isset($_POST['txtusuario'])) {
        $user = $_POST['txtusuario'];
        $password = $_POST['txtcontraseña'];

        include('conexion/conexion.php');

       $sql = "SELECT * FROM usuario WHERE usuario = '$user' AND Clave = MD5('$password') AND estatus = 1";


        $ejeSql = mysqli_query($conexion, $sql);
        $regUsuario = mysqli_fetch_assoc($ejeSql);

        if (mysqli_num_rows($ejeSql) == 1) {
            session_start();
            $_SESSION['user'] = $regUsuario['Usuario'];
            $_SESSION['rol'] = $regUsuario['idrol'];
            $_SESSION['Iduser']=$regUsuario['idUsuario'];
            header("location:venta.php");
        } else {
            // Mostrar mensaje de error en la misma página
            echo "<p>Usuario o contraseña incorrecta</p>";
        }
    }
?>
