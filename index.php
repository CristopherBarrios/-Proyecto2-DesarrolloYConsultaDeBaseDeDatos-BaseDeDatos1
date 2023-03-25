<!DOCTYPE html>
<html>
    <head>
        <title>Proyecto2</title>

    </head>
    <body>
        <h2>Insertar datos en la tabla de clientes</h2>
	    <form action="programa/conexion.php" method="POST">
		    <label for="nombre">Nombre:</label>
		    <input type="text" name="nombre" required><br><br>

		    <label for="email">Correo electrónico:</label>
		    <input type="email" name="email" required><br><br>

		    <label for="telefono">Teléfono:</label>
		    <input type="tel" name="telefono" required><br><br>

		    <input type="submit" value="Guardar">
	</form>
    </body>
</html>