<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$validacion = filter_input(INPUT_POST, 'validacion', FILTER_VALIDATE_BOOL);

if (!$validacion) {
    die('debes aceptar el termino');
}

$host = 'localhost';
$dbname = 'mensaje_db';
$username = 'root';
$password = '';

$conn = mysqli_connect(
    hostname: $host,
    username: $username,
    password: $password,
    database: $dbname
);

if (mysqli_connect_error()) {
    die('error de conexion: ' . mysqli_connect_error());
}

$sql = 'INSERT INTO mensaje (nombre, apellido, email)
        VALUES (?, ?, ?)';

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "sss",
    $nombre,
    $apellido,
    $email
);

mysqli_stmt_execute($stmt);
echo "<h1 class='mensaje-php'>se cargaron los datos correctamente</h1>";
echo "<h2 class class='mensaje2-php'>gracias por tu solicitud, estaremos en contacto a la brevedad </h2>";

//echo 'datos cargados correctamente';
