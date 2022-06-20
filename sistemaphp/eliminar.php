<?php

include('bdd.php');

$ID=$_POST['txtID'];
mysqli_query($conexionn,"DELETE FROM datos where ID='$ID'") or die("error de actualizar");
mysqli_close($conexionn);
header("location:../mostrar.php");
?>