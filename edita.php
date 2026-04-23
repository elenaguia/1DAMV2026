<?php
if(isset($_GET['id'])) {
    $id = $_GET['id']; // Asignar el valor del ID correctamente
    $n_nombre = $_GET['nombre'];
    $n_domicilio = $_GET['domicilio'];
    $n_documento = $_GET['documento'];
    $n_dni=$_GET['dni'];
    $n_sexo=$_GET['sexo'];
    $n_telefono = $_GET['telefono'];
    $n_mail = $_GET['mail'];

    //Conexión a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "clientes");

    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }
    $sql = "UPDATE cliente SET nombre='$n_nombre', domicilio='$n_domicilio', documento='$n_documento', dni='$n_dni', sexo='$n_sexo', telefono='$n_telefono', mail='$n_mail' WHERE dni='$id'";
    if ($mysqli->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "Acceso no autorizado.";
}
?>
