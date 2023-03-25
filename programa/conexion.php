<?php
// Conectar a la base de datos
$con = pg_connect("host=127.0.0.1 port=5432 dbname=proyecto2 user=postgres password=1234567");

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Recuperar los datos enviados desde el formulario
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];

	// Insertar los datos en la tabla de clientes
	$sql = "INSERT INTO clientes (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
	pg_query($con, $sql);
}

// Cerrar la conexión a la base de datos
pg_close($con);
?>
