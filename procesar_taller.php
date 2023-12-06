<!-- procesar_taller.php -->
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $tema = $_POST["tema"];

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "taller");

    if (mysqli_connect_errno()) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    // Escapar los datos para prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellido = mysqli_real_escape_string($conexion, $apellido);
    $email = mysqli_real_escape_string($conexion, $email);
    $tema = mysqli_real_escape_string($conexion, $tema);

    // Crear la consulta SQL para insertar datos en la tabla "tallerista"
    $consulta = "INSERT INTO tallerista (nombre, apellido, email, tema) VALUES ('$nombre', '$apellido', '$email', '$tema')";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Datos insertados correctamente en la base de datos.";
    } else {
        echo "Error al insertar datos en la base de datos: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}

?>
