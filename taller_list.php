<!-- archivo.php -->
<?php

// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "taller");

if (mysqli_connect_errno()) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Obtener datos de la tabla "tallerista"
$consulta = mysqli_query($conexion, "SELECT * FROM tallerista");

if (!$consulta) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de talleristas inscriptos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Listado de talleristas</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Tema del taller</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        <?php while ($fila = mysqli_fetch_assoc($consulta)): ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td><?php echo $fila['tema']; ?></td>
                <td>
                    <!-- Botón Editar -->
                    <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    
                    <!-- Botón Borrar -->
                    <a href="borrar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Borrar</a>
                </td>
            </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
