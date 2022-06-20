<?php 
    include('conexion.php');
    $id = $_POST['txtid'];
    $usuario = $_POST['txtusuario'];
    $nombre = $_POST['txtnombre'];
    $correo = $_POST['txtcorreo'];

    mysqli_query($conexion,"UPDATE `usuarios` SET `usuario` = '$usuario', `nombre` = '$nombre', `correo` = '$correo' WHERE `id` = '$id'") or die("Error de actualizar");
    mysqli_close($conexion);
    header("Location:../calendario.php");
?>