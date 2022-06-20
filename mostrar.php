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

		
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	include('sistemaphp/bdd.php');

	
	
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Sistema Web</title>
	<link rel="stylesheet" href="registeoestilo.css">
	<link href="css/styles.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
		crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
		crossorigin="anonymous"></script>
</head>
<?php 
	$sql="SELECT * FROM usuarios";
	$elimiar = mysqli_query($conexion, $sql);

	while($mostrar = mysqli_fetch_array($elimiar)){ 
	while($row = $resultado->fetch_assoc()) {
		
?>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="prinicipalinicio.php">Sitio Web</a><button class="btn btn-link btn-sm order-1 order-lg-0"
			id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">

			</div>
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<?php echo $row['nombre']; ?><i class="fas fa-user fa-fw"></i>
				</a>
				<?php

					$sql="SELECT * FROM usuarios";
					$resultado = mysqli_query($conexion, $sql);

					while($mostrar = mysqli_fetch_array($resultado)){


				?>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="configuracion.php?id=<?php  echo $row['id']?>">Configurar</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="sistemaphp/logout.php">Cerrar-Sesión</a>
				</div>
				<?php }}}?>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<a class="nav-link" href="#">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div><?php
								$DateAndTime = date('m-d-Y ');  
								echo "Fecha: $DateAndTime";
								?>

						</a>



						<div class="sb-sidenav-menu-heading">Interfaces</div>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
							aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
							Datos
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
							data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav"><a class="nav-link"
									href="Calendario.php">Calendario</a><a class="nav-link" href="mostrar.php">Datos de
									Insumos</a></nav>
						</div>
						<?php if($tipo_usuario == 1) { ?>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
							aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
							Administracion
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
							data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
								<a class="nav-link collapsed" href="#" data-toggle="collapse"
									data-target="#pagesCollapseAuth" aria-expanded="false"
									aria-controls="pagesCollapseAuth">Usuarios
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
									data-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav"><a class="nav-link"
											href="register.php">Registrar Usuarios</a><a class="nav-link"
											href="tabla.php">Mostrar/Eliminar Usuarios</a>
								</div>
								<a class="nav-link collapsed" href="#" data-toggle="collapse"
									data-target="#pagesCollapseError" aria-expanded="false"
									aria-controls="pagesCollapseError">Ingresar Datos
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
									data-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav"><a class="nav-link"
											href="401.html">Modificar Calendario</a></nav>
								</div>
								<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
									data-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav"><a class="nav-link"
											href="ingresardatos.php">Ingresar Datos</a></nav>
								</div>
								
							</nav>
						</div>
						<?php } ?>


						<div class="sb-sidenav-menu-heading">Pagina Actual:</div>
						<a class="nav-link" href="#">
							<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Registro de Insumos
						</a>
					</div>

				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<!--DATOS-->
				<div class="mostrardatos">
					<table class="table ">
						<h2 class="TituloT">Insumos Disponibles</h2>
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">NOMBRE</th>
								<th scope="col">CANTIDAD</th>
								<th scope="col">PRECIO</th>
								<?php if($tipo_usuario == 1) { ?>
								<th scope="col" class="acciones">ACCIONES</th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php

								$sql="SELECT * FROM datos";
								$resultado = mysqli_query($conexionn, $sql);

								while($mostrar = mysqli_fetch_array($resultado)){

					
							?>
							<tr>
								<td>
									<?php  echo $mostrar['ID']?>
								</td>
								<td>
									<?php  echo $mostrar['NOMBRE']?>
								</td>
								<td>
									<?php  echo $mostrar['CANTIDAD']?>
								</td>
								<td>
									<?php  echo $mostrar['PRECIO']?>
								</td>
								<td>
									<?php if($tipo_usuario == 1) { ?>
									<!-- Editars -->
									<a href="editar.php?id=<?php  echo $mostrar['ID']?>"><button
											class="btn btn-success">Editar</button></a>
									<!-- Eliminar -->
									<form action="sistemaphp/eliminar.php" method="post">
										<input type="hidden" name="txtID" value="<?php echo $mostrar['ID']?>" readonly>
								<td>
									<input class="btn btn-danger" type="submit" value="Eliminar" name="btnEliminar">
								</td>
								</form>
								<?php } ?>
								</td>
							</tr>
							<?php 
							}
							?>
						</tbody>
					</table>
					<?php if($tipo_usuario == 1) { ?>
					<a href="ingresardatos.php"><button type="button" class="btn btn-primary btn-sm"
							style="width: 100%; font-size: 20px;">Ingresar Datos</button></a></li>
					<?php } ?>
				</div>
			</main>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
		crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/chart-area-demo.js"></script>
	<script src="assets/demo/chart-bar-demo.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/datatables-demo.js"></script>
</body>

</html>