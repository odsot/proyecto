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
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrar Usuario</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Creacion de Cuenta</h3></div>
                                    <div class="card-body">
                                        <form action="sistemaphp/registrarusuario.php" method="POST";>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Usuario:</label><input class="form-control py-4" id="inputFirstName" type="text" placeholder="&#128273; Usuario" name="usuario" require/></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Nombres Completos:</label><input class="form-control py-4" id="inputLastName" type="text" placeholder="&#128101; Nombres-Apellidos" name="nombresA" require/></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Correo:</label><input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="&#9993; Correo" name="correo" require/></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Contraseña:</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="&#128274; Contraseña "name="contraseña" require /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Tipo:</label>
                                                    <br>
                                                    <select name="tipo" id="tipo">

                                                        <option value=""> Elegir </option> 

                                                        <option value=1>Administrador</option>

                                                        <option value=2>Usuario</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-block" value="Registrar Cuenta">
                                            <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="calendario.php">Voler</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
