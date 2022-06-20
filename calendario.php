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
	<!-- Estilo calendario -->

	<link rel="stylesheet" href="assets/css/main.css">
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
						</div>



						<?php } ?>
						<div class="sb-sidenav-menu-heading">Pagina Actual:</div>
						<a class="nav-link" href="#">
							<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Calendario
						</a>
					</div>

				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<!-- container -->
				<div class="container">


					<div class="row">
						<div class="timeline">
							<div class="year">
								<div class="inner">
									<span>2016</span>
								</div>
							</div>

							<ul class="days">
								<li class="day">
									<div class="events">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius perferendis
											vitae, facere accusantium magni, explicabo mollitia quidem odio autem, iste
											optio? Consequuntur ratione dolorum velit maiores quam odit odio suscipit.
										</p>
										<div class="date">18 October (Monday)</div>
									</div>
								</li>

								<li class="day">
									<div class="events">
										<p>Lorem dolor sit amet, consectetur adipisicing elit. Eius perferendis vitae,
											facere accusantium magni, explicabo mollitia quidem odio autem, iste optio?
											Consequuntur ratione dolorum velit maiores quam odit odio suscipit.</p>
										<div class="date">18 October (Monday)</div>
									</div>
								</li>

								<li class="day">
									<div class="events">
										<div class="day__img">
											<img src="http://placehold.it/400x300" alt="" />
											<p class="caption">
												Lorem ipsum dolor sit amet.
											</p>
										</div>
										<div class="date">18 October (Monday)</div>
									</div>
								</li>

								<li class="day">
									<div class="events">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius perferendis
											vitae, facere accusantium magni, explicabo mollitia quidem odio autem, iste
											optio? Consequuntur ratione dolorum velit maiores quam odit odio suscipit.
										</p>
										<div class="date">18 October (Monday)</div>
									</div>
								</li>

								<li class="day">
									<div class="events">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius perferendis
											vitae, facere accusantium magni, explicabo mollitia quidem odio autem, iste
											optio? Consequuntur ratione dolorum velit maiores quam odit odio suscipit.
										</p>
										<div class="date">18 October (Monday)</div>
									</div>
								</li>

								<li class="day">
									<div class="events">
										<div class="day__img">
											<img src="http://placehold.it/400x300" alt="" />
											<p class="caption">
												Lorem ipsum dolor sit amet.
											</p>
										</div>
										<div class="date">18 October (Monday)</div>
									</div>
								</li>
							</ul>

							<div class="year year--end">
								<div class="inner">
									<span>2017</span>
								</div>
							</div>
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