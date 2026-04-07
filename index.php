<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['usuario'];
    $pass = $_POST['clave'];

    $query = "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$pass'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['usuario'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Datos incorrectos');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login UGB</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <form method="POST" class="login-form">
        <h2>Control de Acceso</h2>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>