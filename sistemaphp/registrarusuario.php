<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    include "conexion.php";

    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $nombre=$_POST['nombresA'];
    $tipo=$_POST['tipo'];
    $email=$_POST['correo'];
 

    $pass_ci = sha1($contraseña);

    $consulta="INSERT INTO usuarios (usuario, password, nombre,tipo_usuario,correo) VALUES ( '$usuario', '$pass_ci', '$nombre','$tipo','$email');";
    $resultado=mysqli_query($conexion, $consulta) or die("Error de registro");
    mysqli_close($conexion);
    header("Location:../tabla.php");


?>