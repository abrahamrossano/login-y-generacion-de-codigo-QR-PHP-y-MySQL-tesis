<?php 
        $sql= new database(HOST, USER, PASSWD, DATABASE);
        $con= new consulta($sql);
        $dat = $con->getInfoUser($usuario);
        $users = $dat[0];
        
        $_SESSION['iduser'] = $users["id_user"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Wred Panel de Control</title>

	<!-- Bootstrap Core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../vendor/dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="../vendor/morrisjs/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Wred Geolocalización</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
                        <!-- Button trigger modal -->
						<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
						</li>
						<li><a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-gear fa-fw"></i> Configuraciòn</a>
						</li>
						<li class="divider"></li>
						<li><a href="cerrarsesion.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
						
							<!-- /input-group -->
						</li>
						<li>
							<a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Panel de Control</a>
						</li>
						
						<li>
							<a href="#"><i class="fa fa-truck "></i>   Registrar Unidades<span class="fa arrow"></span></a>
							
				            	<ul class="nav nav-second-level">
								<li>
									<a href="registrou.php">Registrar Unidades</a>
								</li>
								<li>
									<a href="adminu.php">Administrar Unidades</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="#"><i class="glyphicon glyphicon-user fa-fw"></i> Choferes<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="registroc.php">Registrar Chofer</a>
								</li>
								<li>
									<a href="adminc.php">Administrar Chofer</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						
						<li>
							<a href="reportes.php"><i class="fa fa-bar-chart-o fa-fw"></i> Reportes</a>
							
                        </li>
                    </ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>
        
        <?php include 'inc/modals.inc'; ?>

		<div id="page-wrapper">