<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellidoP"]) &&isset($_POST["apellidoM"]) 
       &&isset($_POST["edad"]) 
       &&isset($_POST["sexo"]) 
       &&isset($_POST["email"]) &&isset($_POST["password"])
       &&isset($_POST["password2"])){
		if($_POST["nombre"]!=""&& $_POST["apellidoP"]!=""&&$_POST["apellidoM"]!=""&&$_POST["email"]!=""&& $_POST["password"]==$_POST["password2"]){
			include "conexion.php";
			
			$found=false;
			$sql1= "select * from usuario where correo=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"email ya esta registrado.\");window.location='../registro.php';</script>";
			}
			$sql = "insert into usuario(nombre,apellidoP,apellidoM,edad,sexo,correo,password,fechaReg,baja) values (\"$_POST[nombre]\",\"$_POST[apellidoP]\",\"$_POST[apellidoM]\",\"$_POST[edad]\",\"$_POST[sexo]\",\"$_POST[email]\",\"$_POST[password]\",now(),false)";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.php';</script>";
			}else{
                print "<script>alert(\"Problema en el registro intentelo mas tarde\");window.location='../registro.php';</script>";
            }
		}print "<script>alert(\"Problema en el registro nivel 3\");window.location='../registro.php';</script>";
	}print "<script>alert(\"Problema en el registro nivel 2\");window.location='../registro.php';</script>";
}print "<script>alert(\"Problema en el registro nivel 1\");window.location='../registro.php';</script>";



?>
