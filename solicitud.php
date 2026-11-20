<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Formulario</title>
</head>
<body>

<?php
// Validar datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

// Conectar a la base de datos
$connection = mysqli_connect($host, $user, $pass);

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

// Seleccionar la base de datos
$datab = "blformu";
$db = mysqli_select_db($connection, $datab);

if (!$db) {
    die("No se ha podido seleccionar la base de datos.");
}

// Capturar datos del formulario
$id       = $_POST["id"];
$libro_id       = $_POST["libro_id"];
$nombre         = $_POST["nombre"];
$documento      = $_POST["documento"];
$grado          = $_POST["grado"];
$grupo          = $_POST["grupo"];
$correo         = $_POST["correo"];
$telefono       = $_POST["telefono"];
$fecha_solicitud = $_POST["fecha_solicitud"];
$comentario     = $_POST["comentario"];
$estado = "Pendiente";
$fecha_registro       = $_POST["fecha_registro"];

// Insertar datos en la base de datos
$instruccion_SQL = "INSERT INTO tabla_bl (id, libro_id, nombre, documento, grado, grupo, correo, telefono, fecha_solicitud, comentario, estado, fecha_registro)
                    VALUES ('$id', '$libro_id', '$nombre', '$documento', '$grado', '$grupo', '$correo', '$telefono', '$fecha_solicitud', '$comentario', '$estado', '$fecha_registro')";
                   
$resultado = mysqli_query($connection, $instruccion_SQL);

if ($resultado) {
    echo "<script>
            alert('¡Envío exitoso del Formulario!');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "<script>
            alert('Error al guardar la información.');
            history.back();
          </script>";
}

mysqli_close($connection);
?>

</body>
</html>

