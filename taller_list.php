<?php

$conexion = mysqli_connect("localhost","root","","taller");

echo "** Conexion a BD taller **";

if(mysqli_connect_errno()){

    echo "no se conectó por un error: " . mysqli_connect_errno();    
}else{
    echo "se conectó de forma correcta";
}

$consulta = mysqli_query($conexion,"SELECT * FROM tallerista ");

$listadoArray = mysqli_fetch_array($consulta);




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
            <th>Nombre</th>
            <th>Apellido</th>
            <th>email</th>
            <th>Tema del taller</th>
            <!-- Agregar más columnas según las necesidades -->
        </tr>
        </thead>
        <tbody>

        <?php
        // Recorrer los resultados y mostrar en la tabla
        while ($fila = mysqli_fetch_assoc($consulta)):
            ?>
            <tr>

                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><?php echo $fila['email']; ?></td>
                <td><?php echo $fila['tema']; ?></td>
                <!-- Agregar más celdas según las columnas en tu tabla -->
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
