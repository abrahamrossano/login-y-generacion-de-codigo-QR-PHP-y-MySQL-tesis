<?php
    include('conexion.php');

    $correo=$_POST['id'];
    $tipo=$_POST['tipo'];
    $antecedente=$_POST['antecedente'];
    
    $sql="insert into antecedente(id_tipo,id_usuario,antecedente,fechaReg,baja) values('".$tipo."','".$correo."','".$antecedente."',now(),false)";
    $query = $con->query($sql);
        
    if($query!=null){
        print "<script>alert(\"Registro exitoso.\");window.location='../principal.php';</script>";
    }else{
        print "<script>alert(\"Error en el registro.\");window.location='../principal.php';</script>";
    }

?>
