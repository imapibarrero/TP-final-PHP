<!-- actualizar.php -->
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"])) {
    // Obtener los datos del formulario
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

    // Actualizar los datos del tallerista en la base de datos
    $actualizar = mysqli_query($conexion, "UPDATE tallerista SET apellido = '$apellido', email = '$email', tema = '$tema' WHERE nombre = '$nombre'");

    if ($actualizar) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar datos: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    // Redirigir a la página principal si no se proporciona un nombre válido
    header("Location: archivo.php");
    exit();
}

?>
