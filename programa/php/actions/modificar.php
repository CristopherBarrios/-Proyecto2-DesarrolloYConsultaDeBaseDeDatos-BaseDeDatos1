<?php
require("../conectar/conexion.php");
require("../actions/insertar.php");

function sqlUpdate($con, $name, $opcion, $informacion, $fecha, $tabla, $id) {
	pg_query($con,"UPDATE ".$tabla." SET name='$name', health_unit='$opcion', information='$informacion', date_added='$fecha' WHERE id='$id'");

}

function mainUpdate($con) {
	list($name, $opcion, $informacion, $fecha, $tabla, $id) = insertion();
	sqlUpdate($con, $name, $opcion, $informacion, $fecha, $tabla, $id);
}



if(isset($_POST['modificar'])){
	mainUpdate($con);
	header('Location:../../ref/bar/mantenimiento.php');
	}

?>	