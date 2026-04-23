<?php

// Definimos variables
$nombre=$_GET['nombre'];
$domicilio=$_GET['domicilio'];
$documento=$_GET['documento'];
$dni=$_GET['dni'];
$sexo=$_GET['sexo'];
$telefono=$_GET['telefono'];
$mail=$_GET['mail'];

// Conectar a la base de datos
$mysqli = new mysqli("localhost","root", "");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}else{
    // Seleccionamos la base de datos creada en phpMyAdmin Clientes e inserta la informacion en la tabla cliente
    $mysqli -> select_db("clientes");
    $sql = "INSERT INTO cliente (nombre, domicilio, documento, dni, sexo, telefono, mail) VALUES ('$nombre','$domicilio','$documento','$dni','$sexo','$telefono','$mail')";

    // Ejecutar la consulta
    if ($mysqli->query($sql) === TRUE) {
        echo "Registro insertado correctamente.";
    } else {
        echo "Error al insertar el registro: " . $mysqli->error;
    }

}
// Cerrar la conexión
$mysqli->close();
?>
