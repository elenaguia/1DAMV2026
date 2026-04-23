<?php
// Verificar si se ha recibido un ID válido a través de la URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Conectar a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "clientes");

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }

    // Obtener el ID del cliente
    $id = $_GET['id'];

    // Preparar la consulta para obtener los datos del cliente
    $sql = "SELECT * FROM cliente WHERE dni = '$id'";

    // Ejecutar la consulta
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Si se encontraron resultados, mostrar el formulario con los datos del cliente
        $fila = $result->fetch_assoc();
?>
        <html>
        <head>
            <title>Actualizar Cliente</title>
        </head>
        <body>
            <h2>Actualizar Cliente:</h2>
            <form action="update.php?id=<?php echo $id; ?>" method="get">
                <fieldset>
                    <legend>Datos Personales</legend>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>
                    <label>Domicilio:</label>
                    <input type="text" name="domicilio" value="<?php echo $fila['domicilio']; ?>"><br>
                    <label>Documento:</label>
                    <select name="documento">
                        <option value="DNI" <?php if($fila['documento'] == 'DNI') echo 'selected'; ?>>Documento Nacional de Identidad</option>
                        <option value="TR" <?php if($fila['documento'] == 'TR') echo 'selected'; ?>>Tarjeta de Residencia</option>
                        <option value="PASS" <?php if($fila['documento'] == 'PASS') echo 'selected'; ?>>Pasaporte</option>
                    </select><br>
                    <label>Número Doc.:</label>
                    <input type="string" name="dni" value="<?php echo $fila['dni']; ?>" readonly><br>
                    <label>Sexo:</label>
                    <input type="radio" name="sexo" value="Hombre" <?php if($fila['sexo'] == 'Hombre') echo 'checked'; ?>> Hombre
                    <input type="radio" name="sexo" value="Mujer" <?php if($fila['sexo'] == 'Mujer') echo 'checked'; ?>> Mujer<br>
                    <label>Teléfono:</label>
                    <input type="tel" name="telefono" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?php echo $fila['telefono']; ?>"><br>
                    <label>Correo Electrónico:</label>
                    <input type="text" name="mail" size="20" value="<?php echo $fila['mail']; ?>"><br>
                    <input type="button" name="update" value="Actualizar" onclick="window.location.href='edita.php?id=<?php echo $id; ?>'">
                  <!-- <button type="submit" name="update" formaction= <?php //echo "edita.php?id=$fila['dni'];" ?>>Actualizar</button> -->
                </fieldset>
            </form>
<?php
    } else {
        echo "No se encontró ningún cliente con ese ID.";
    }

    // Liberar el resultado y cerrar la conexión
    $result->free();
    $mysqli->close();
} else {
    echo "ID no proporcionado o no válido.";
}
?>
<!-- Botón para volver a tabla.php -->
<button onclick="window.location.href='tabla.php'">Volver</button>
</body>
</html>