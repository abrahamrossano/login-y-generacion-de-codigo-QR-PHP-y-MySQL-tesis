<?php
    include_once("../../libreria/header.php");
    include_once('../../libreria/database.php');
    include_once('../../libreria/config.php');
    include_once('../../libreria/consulta.php');

    $sql= new database(HOST, USER, PASSWD, DATABASE);
    $con= new consulta($sql);
    $lista = $con->getLog();
?>

    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
                <th>idUsuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Baja</th>
            </tr>
        </thead>
        <tbody>
            <?php
	    foreach($lista as $fila){ 
    ?>
                <tr class="odd gradeX">
                    <td>
                        <?=$fila["id"]?>
                    </td>
                    <td>
                        <?=$fila["correo"]?>
                    </td>
                    <td>
                        <?=$fila["password"]?>
                    </td>
                    <td>
                        <?=$fila["baja"]?>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    </div>
    </body>

    </html>
