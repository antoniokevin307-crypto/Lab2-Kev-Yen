<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Guardar datos (Punto 2 y 3: Ingreso y validación) [cite: 7, 8]
if (isset($_POST['guardar'])) {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $cantidad = (int) $_POST['cantidad'];
    $desc = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($nombre) && $cantidad > 0) {
        $insertar = "INSERT INTO registros (nombre_item, cantidad, descripcion) VALUES ('$nombre', $cantidad, '$desc')";
        mysqli_query($conexion, $insertar);
    }
}

// Consultar datos para la tabla 
$datos = mysqli_query($conexion, "SELECT * FROM registros ORDER BY fecha_registro DESC");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <title>Dashboard</title>
</head>

<body>
    <nav>Bienvenido,
        <?php echo $_SESSION['usuario']; ?> | <a href="salir.php">Cerrar Sesión</a>
    </nav>

    <div class="contenedor">
        <form method="POST">
            <h3>Registrar Nuevo Dato</h3>
            <input type="text" name="nombre" placeholder="Nombre del objeto" required>
            <input type="number" name="cantidad" placeholder="Cantidad" required>
            <textarea name="descripcion" placeholder="Descripción breve"></textarea>
            <button type="submit" name="guardar">Guardar Registro</button>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($datos)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['nombre_item']; ?>
                        </td>
                        <td>
                            <?php echo $row['cantidad']; ?>
                        </td>
                        <td>
                            <?php echo $row['descripcion']; ?>
                        </td>
                        <td>
                            <?php echo $row['fecha_registro']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>