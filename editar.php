<!-- editar.php -->
<?php

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    // Obtener el ID del tallerista a editar
    $id = $_GET["id"];

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "taller");

    if (mysqli_connect_errno()) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    // Consultar el tallerista con el ID proporcionado
    $consulta = mysqli_query($conexion, "SELECT * FROM tallerista WHERE id = $id");

    if (!$consulta) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    // Obtener los datos del tallerista
    $tallerista = mysqli_fetch_assoc($consulta);

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    // Redirigir a la página principal si no se proporciona un ID válido
    header("Location: archivo.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tallerista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Editar Tallerista</h2>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $tallerista['id']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $tallerista['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $tallerista['apellido']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $tallerista['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tema">Tema del Taller</label>
            <input type="text" class="form-control" id="tema" name="tema" value="<?php echo $tallerista['tema']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>


