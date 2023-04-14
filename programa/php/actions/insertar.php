<?php
require("../conectar/conexion.php");


function OpUbica() {
	if (isset($_POST['submit'])) {

		$tabla =  "users";
    }
	if(isset($_POST['modificar'])){
		$tabla =  "users";
	}
    return [$tabla];
}

function insertion() {
	list($tabla) = OpUbica();
    $name = $_POST['name'];
    $opcion = $_POST['opcion'];
    $informacion = $_POST['informacion'];
	$fecha = $_POST['fecha'];
    $id = $_REQUEST['id'];

	return [$name, $opcion, $informacion, $fecha, $tabla, $id];
}

function mainSubmit($con) {
	list($name, $opcion, $informacion, $fecha, $tabla, $id) = insertion();
	sqlInsetInto($con,$name, $opcion, $informacion, $fecha, $tabla, $id);
}

function sqlInsetInto($con,$name, $opcion, $informacion, $fecha, $tabla, $id) {
	pg_query($con,"INSERT INTO ".$tabla." (name, health_unit, information, date_added) VALUES ('$name', '$opcion', '$informacion', '$fecha');");
}





if(isset($_POST['submit'])){
	mainSubmit($con);
	header('Location:../../ref/bar/mantenimiento.php');
 }


 ?>