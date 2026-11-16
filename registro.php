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
$satisfaccion = $_POST["satisfaccion"];
$facilidad    = $_POST["facilidad"];
$comentario   = $_POST["comentario"];
$correo       = $_POST["correo"];

// Insertar datos en la base de datos
$instruccion_SQL = "INSERT INTO tabla_bl (satisfaccion, facilidad, comentario, correo)
                    VALUES ('$satisfaccion', '$facilidad', '$comentario', '$correo')";
                   
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

