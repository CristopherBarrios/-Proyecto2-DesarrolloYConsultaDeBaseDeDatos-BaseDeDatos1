<?php
require("../conectar/conexion.php");
require("../actions/insertar.php");

function sqlDeleteTabla($con,$tabla) {
    $id = $_REQUEST['id'];
    pg_query($con,"DELETE FROM ".$tabla." WHERE id='$id'");

}

function mainUnlink($con) {
    list($tabla) = OpUbica();

    sqlDeleteTabla($con,$tabla);
}

if(isset($_POST['eliminar'])){
	mainUnlink($con);
    header('Location:../../ref/bar/expediente.php');
}
?>