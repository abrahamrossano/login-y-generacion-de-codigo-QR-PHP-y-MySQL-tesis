<?php
    include('conexion.php');

    $id=$_POST['idAntecedente'];
    
    $sql="update antecedente set baja=true where idantecedentes = '".$id."'";
    $query = $con->query($sql);
        
    if($query!=null){
        print "<script>alert(\"Registro exitoso.\");window.location='../principal.php';</script>";
    }else{
        print "<script>alert(\"Error en el registro.\");window.location='../principal.php';</script>";
    }

?>