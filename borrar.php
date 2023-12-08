<!-- borrar.php -->
<?php

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    // Obtener el nombre del tallerista a borrar
    $id = $_GET["id"];

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "taller");

    if (mysqli_connect_errno()) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    // Borrar el tallerista
    $borrar = mysqli_query($conexion, "DELETE FROM tallerista WHERE id = '$id'");

    if ($borrar) {
        echo "Tallerista eliminado correctamente.";
    } else {
        echo "Error al eliminar el tallerista: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    // Redirigir a la página principal si no se proporciona un nombre válido
    header("Location: archivo.php");
    exit();
}

?>

