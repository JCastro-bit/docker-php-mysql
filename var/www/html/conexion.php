<?php

$host = "my-mysql-container"; // Ajusta esto al nombre de tu contenedor MySQL
$username = "root";
$password = "mipassword";
$database = "pruebadb";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    die("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

echo "Conexión exitosa 🎉 " . $mysqli->host_info . "\n";

// No olvides cerrar la conexión cuando hayas terminado
$mysqli->close();

?>
