<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nuevo usuario</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">
                            <form role="form" name="registro" action="php/registro.php" method="post">

                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="apellidoP" class="control-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="apellidoP" name="apellidoP" required>
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="apellidoM" class="control-label">Apellido Materno</label>
                                    <input type="text" class="form-control" id="apellidoM" name="apellidoM" required>
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="edad" class="control-label">Edad</label>
                                    <input type="text" class="form-control" id="edad" name="edad" value="" required="" title="Please enter you username">
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="sexo" class="control-label">Sexo</label>
                                    <select name="sexo" class="form-control">
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label">Correo electrónico</label>
                                    <input type="text" class="form-control" id="email" name="email" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Repetir Contraseña</label>
                                    <input type="password" class="form-control" id="password2" name="password2" value="" required="" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                    <button type="submit" class="btn btn-success btn-block">Registrar</button>
                                    <a href="login.php">¿Ya tienes cuenta?</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
