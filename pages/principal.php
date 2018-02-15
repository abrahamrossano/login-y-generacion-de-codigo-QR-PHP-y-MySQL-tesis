<?php
    //inicio de sesion
	require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
        //librerias necesarias
        include_once('../libreria/database.php');
        include_once('../libreria/config.php');
        include_once('../libreria/consulta.php');
        
        //consultas a la base
        $sql= new database(HOST, USER, PASSWD, DATABASE);
        $con= new consulta($sql);
        //$dat = $con->getInfoUser($usuario);
        //$users = $dat[0];
        
        //$_SESSION['iduser'] = $users["id_user"];
        //include 'inc/header.inc';
        
        $lista = $con->getHistorial($usuario);
        $listaa = $con->getAntecedente($usuario);
        $listaaa = $con->getInfoUsuario($usuario);
        $abo = $con->getTipo();
        
        //determinar el estado del usuario
        if(empty($listaa)){
            $ante = 0;
        }else{
            $antecedente = $listaa[0];
            $ante = 1;
        }
        
        if(empty($listaaa)){
            $info = 0;
        }else{
            $users = $listaaa[0];
            $info = 1;
        }
        $lis = $con->getUsuarioID($usuario);
        $idUsuario = $lis[0];
        foreach($lis as $filaaaa){
            $s= $filaaaa["idusuario"];
        }
        
        $correo = $usuario;
        $idFin = $s;
        include 'php/modals.inc';
        
        
	?>


    <!DOCTYPE html>
    <html lang="es">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Inicio</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/scrolling-nav.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand page-scroll" href="#page-top">emerhelp</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">Datos</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#services">Historial</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Antecedentes</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="cerrarsesion.php">Cerrar Sesion</a>
                        </li>
                        <li>
                            <a class="page-scroll" href=""><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Intro Section -->
        <section id="intro" class="intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Hola:
                            <?php echo $sesion->get("usuario"); ?> 
                            </h1>
                        <h1>emerhelp</h1>
                        <p><strong>Instrucciones de uso:  </strong>1) registra tus datos medicos y de contacto de tus familiares. 2) imprime el codigo QR en una tarjeta enmicada 3) ve tu historial de visitas a medicos que tengan el sistema instalado
                            <a class="btn btn-default page-scroll" href="#about">¡Comenzar ahora!</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Datos</h2>
                        <ul class="list-group">
                            <?php
                                if($info==0){
                                    echo '<li class="list-group-item"><button class="btn btn-default" data-toggle="modal" data-target="#myModalInfo">Agregar información</button></li>';
                                }else{
                                    
                                foreach($listaaa as $filaaa){ 
                            ?>
                                <li class="list-group-item">
                                    <?=$filaaa["curp"]?>
                                </li>
                                <li class="list-group-item">
                                    <?=$filaaa["fechaN"]?>
                                </li>
                                <li class="list-group-item">
                                    <?=$filaaa["delegacion"]?>
                                </li>
                                <li class="list-group-item">
                                    <?=$filaaa["ser_med"]?>
                                </li>
                                <li class="list-group-item">
                                    <?=$filaaa["afiliacion"]?>
                                </li>
                                <li class="list-group-item">
                                    <?=$filaaa["vigencia"]?>
                                </li>
                                <li class="list-group-item"><button class="btn btn-default" data-toggle="modal" data-target="#myModalInfo">Modificar información</button></li>
                                <?php }
                                }?>
                                
                        </ul>

                    </div>
                    <div class="col-lg-6">
                        <h2>Código QR</h2>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <iframe src="gqr.php" width="320" height="320" frameborder="0"></iframe>
                            </li>
                            <li class="list-group-item"><form action="qr-pdf.php" target="_blank"><input type="submit" class="btn btn-default" value="Descargar PDF"></form></li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Historial
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Motivo</th>
                                                    <th>Hospital</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                foreach($lista as $fila){ 
                            ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <?=$fila["fecha"]?>

                                                        </td>
                                                        <td>
                                                            <?=$fila["motivo"]?>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <?=$fila["nombre"]?>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Antecedentes Medicos <input type="submit" class="btn btn-default" value="Nuevo" data-toggle="modal" data-target="#myModalNuevo">
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
                                            <th>Tipo de Antecedente</th>
                                            <th>Antecedente</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                foreach($listaa as $filaa){ 
                            ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <?=$filaa["nombre"]?>

                                                </td>
                                                <td>
                                                    <?=$filaa["antecedente"]?>
                                                </td>
                                                <td>
                                                    <center>
                                                        <input type="button" class="btn btn-default" value="Editar" data-toggle="modal" data-target="#myModalEditar" >
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                       <form action="php/borrarA.php" method="post">
                                                       <input type="hidden" name="idAntecedente" value="<?=$filaa["idantecedentes"]?>">
                                                        <input type="submit" class="btn btn-default" value="Borrar">
                                                        </form>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrolling-nav.js"></script>
        <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example2').DataTable({
                    responsive: true
                });
            });
        </script>
    </body>
    </html>
    <?php 
	}	
?>
