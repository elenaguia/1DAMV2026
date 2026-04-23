<html>
    <head>
    <title>Práctica 7.1 Borrar</title>
    </head>
<body>
<?php
// Verificar si se ha recibido un ID válido a través de la URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Conectar a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "clientes");

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }

    // Preparar la consulta para eliminar el registro
    $id = $_GET['id'];
    $sql = "DELETE FROM cliente WHERE dni = '$id'";

    // Ejecutar la consulta
    if ($mysqli->query($sql) === TRUE) {
        echo "Registro borrado correctamente.";
    } else {
        echo "Error al borrar el registro: " . $mysqli->error;
    }

    // Cerrar la conexión
    $mysqli->close();
} else {
    echo "ID no proporcionado o no válido.";
}
?>
<!-- Botón para volver a tabla.php -->
<button onclick="window.location.href='tabla.php'">Volver</button>
</body>
</html>