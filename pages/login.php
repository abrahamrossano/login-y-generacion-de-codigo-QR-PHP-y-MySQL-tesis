<?php
	require_once("sesion.class.php");

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		
		if(validarUsuario($usuario,$password) == true)
		{			
			$sesion->set("usuario",$usuario);
            
			header("location: principal.php");
		}
		else 
		{
			print "<script>alert(\"Acceso invalido.\");window.location='login.php';</script>";
		}
	}
	
	function validarUsuario($usuario, $password)
	{
		$conexion = new mysqli("localhost","root","","base_datos");
		$consulta = "select password from usuario where correo = '$usuario';";
		
		$result = $conexion->query($consulta);
		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["password"]) == 0 )
				return true;						
			else					
				return false;
		}
		else
				return false;
	}

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body background="Hospital.jpg" style="background-repeat: no-repeat; background-position: center center;">

        <div id="login-overlay" class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Inicio de sesión</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="well">
                                <form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="form-group">
                                        <label for="username" class="control-label">Usuario</label>
                                        <input class="form-control" placeholder="E-mail" name="usuario" type="email" autofocus>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Contraseña</label>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        <span class="help-block"></span>
                                    </div>
                                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                    <input type="submit" class="btn btn-success btn-block" name="iniciar" value="Iniciar Sesion">
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <p class="lead">¿No tienes cuenta aún?</p>
                            <ul class="list-unstyled" style="line-height: 2">
                                <li><span class="fa fa-check text-success"></span> Administración de antecedentes</li>
                                <li><span class="fa fa-check text-success"></span> historial clinico</li>
                                <li><span class="fa fa-check text-success"></span> antecedentes quirurgicos</li>
                                <li><span class="fa fa-check text-success"></span> antecedentes personales patologicos</li>

                            </ul>
                            <p><a href="registro.php" class="btn btn-info btn-block">Registrarse</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
