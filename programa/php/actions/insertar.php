<?php
require("../conectar/conexion.php");


function OpUbica() {
	if (isset($_POST['submit'])) {

		$tabla =  "users";
    }
	if(isset($_POST['modificar'])){
		$tabla =  "users";
	}
	if(isset($_POST['eliminar'])){
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
	$apellido = $_POST['ape'];
    $id = $_REQUEST['id'];

	return [$name, $opcion, $informacion, $fecha, $tabla, $id,$apellido];
}

function mainSubmit($con) {
	list($name, $opcion, $informacion, $fecha, $tabla, $id,$apellido) = insertion();
	sqlInsetInto($con,$name, $opcion, $informacion, $fecha, $tabla, $id,$apellido);
}

function sqlInsetInto($con,$name, $opcion, $informacion, $fecha, $tabla, $id,$apellido) {
	pg_query($con,"INSERT INTO ".$tabla." (name,health_unit, information, date_added,apellido) VALUES ('$name','$opcion', '$informacion', '$fecha','$apellido');");
}





if(isset($_POST['submit'])){
	mainSubmit($con);
	header('Location:../../ref/bar/mantenimiento.php');
 }


 ?>