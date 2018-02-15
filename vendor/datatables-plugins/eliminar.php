<?php
    include_once("../../libreria/header.php");
    include_once('../../libreria/database.php');
    include_once('../../libreria/config.php');
    include_once('../../libreria/consulta.php');
    
    $sql= new database(HOST, USER, PASSWD, DATABASE);
    $con= new consulta($sql);

    if ($_POST["eli"] > 0) {
	 $rst = $con->eliLog($_POST["eli"]);
    }


    unset($sql);
    unset($con);
?>
<h1>Datos eliminados</h1>
