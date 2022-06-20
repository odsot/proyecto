<?php
include('bdd.php');

$ID=$_POST['txtID'];
$NOMBRE=$_POST['txtNOMBRE'];
$CANTIDAD=$_POST['txtCANTIDAD'];
$PRECIO=$_POST['txtPRECIO'];

mysqli_query($conexionn,"UPDATE `datos` SET `NOMBRE` = '$NOMBRE', 
`CANTIDAD` = '$CANTIDAD', `PRECIO` = '$PRECIO' WHERE `ID` = '$ID'") or die("error de actualizar");
mysqli_close($conexionn);
header("Location:../mostrar.php");

?>