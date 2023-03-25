<?php
require("../conectar/conexion.php");

$realname=$_POST['realname'];
$mail=$_POST['nick'];
$pass=$_POST['pass'];
$rpass=$_POST['rpass'];

$checkemail = pg_query($con, "SELECT * FROM login WHERE email='$mail'");
$check_mail = pg_num_rows($checkemail);

if($pass == $rpass) {
    if($check_mail > 0) {
        echo '<script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script>';
        echo "<script>location.href='../../ref/signin/signin.php'</script>";
    } else {
        pg_query($con, "INSERT INTO login (usuar, password, email) VALUES ('$realname', '$pass', '$mail')");
        echo '<script language="javascript">alert("Usuario registrado con éxito");</script>';
        echo "<script>location.href='../../ref/login/login.php'</script>";
    }
} else {
    echo '<script language="javascript">alert("Las contraseñas son incorrectas");</script>';
    echo "<script>location.href='../../ref/signin/signin.php'</script>";
}
?>
