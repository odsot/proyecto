<?php

session_start();
require 'sistemaphp/conexion.php';

if(!isset($_SESSION['id'])){
	header("Location: iniciosesion.php");
}

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if($tipo_usuario == 1){
	$where = "";
	} else if($tipo_usuario == 2){
	$where = "WHERE id=$id";
}

$sql = "SELECT * FROM usuarios $where";
$resultado = $mysqli->query($sql);
include('sistemaphp/bdd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="registeoestilo.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<!--DATOS-->
	<div class="mostrardatos">
    <table class="table">
        <thead>

        </thead>
        <tbody>
    <?php

        $id = $_GET["id"];

        $sql="SELECT * FROM datos where ID='$id'";
        $resultado = mysqli_query($conexionn, $sql);

        while($mostrar = mysqli_fetch_array($resultado)){

       
     ?>
            <form action="sistemaphp/procesar_editar.php" method="POST">
            <div class="form-register">
				<div class="position">
					<center><h4>Editar Datos</h4></center>
                    <input class="controls"type="hidden" value="<?php  echo $mostrar['ID']?>" name="txtID">
                    <label for="">Nombre:</label>
					<input class="controls" type="text" value="<?php  echo $mostrar['NOMBRE']?>" name="txtNOMBRE" require>
                    <label for="">Cantidad:</label>
					<input class="controls" type="text" value="<?php  echo $mostrar['CANTIDAD']?>" name="txtCANTIDAD" require>
                    <label for="">Precio:</label>
					<input class="controls" type="text" value="<?php  echo $mostrar['PRECIO']?>" name="txtPRECIO" require>
					<a href="mostrar.php"><input class="botons" type="button" value="Regresar"></a>
					<button type="submit" value=" " class="btn btn-primary btn-sm" style="width: 100%; font-size: 18px;">ACTUALIZAR</button>
				</div>
			</div>
            <?php 
             }
            ?>
            </form>
        </tbody>
        </table>
		
	</div>
	

	</div>	<!-- /container -->
	

	<footer id="footer">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contacto</h3>
						<div class="widget-body">
							<p>0941515115<br>
								<a href="mailto:#">fincapunin@gmail.com</a><br>
								<br>
								Naranjito-Guayas Finca Punin
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Sigueme en</h3>
						<div class="widget-body">
							<p class="follow-me-icons clearfix">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Inicio</a> | 
								<a href="about.html">About</a> |
								<a href="sidebar-right.html">Sidebar</a> |
								<a href="contact.html">Contact</a> |
								<b><a href="signup.html">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2022, Santiago Oñate. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>