<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include('bdd.php');


$nombre=$_POST['NOMBRE'];
$cantidad=$_POST['CANTIDAD'];
$precio=$_POST['PRECIO'];

$consulta="INSERT INTO `datos` (`NOMBRE`, `CANTIDAD`, `PRECIO`) VALUES ( '$nombre', '$cantidad', '$precio');";

$resultado=mysqli_query($conexionn, $consulta) or die("Error de registro");
mysqli_close($conexionn);
header("Location:../mostrar.php");

?>