<?php

include ('conexion.php');

$ID=$_POST['txtID'];
mysqli_query($conexion, "DELETE FROM usuarios where id='$ID'") or die('Error al eliminar');

mysqli_close($conexion);
header("location:../tabla.php");
?>