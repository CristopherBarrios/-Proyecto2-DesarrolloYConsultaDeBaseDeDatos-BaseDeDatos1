<?php
require("../conectar/conexion.php");

$username = $_POST['mail'];
$pass = $_POST['pass'];

$sql2 = pg_query($con, "SELECT * FROM login WHERE email='$username'");

if ($f2 = pg_fetch_array($sql2)) {
    if (is_null($pass)) {
        echo '<script>alert("INSERTE CONTRASEÑA")</script> ';
        echo "<script>location.href='../../../index.php'</script>";
    }
}

$sql = pg_query($con, "SELECT * FROM login WHERE email='$username'");

if ($f = pg_fetch_array($sql)) {
    if ($pass == $f['password']) {
        header("Location: ../../ref/bar/bar.php");
    } else {
        echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
        echo "<script>location.href='../../../index.php'</script>";
    }
} else {
    echo '<script>alert("ESTE USUARIO NO EXISTE, POR FAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
    echo "<script>location.href='../../../index.php'</script>";
}
?>