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
                <th>Nombre</th>
                <th>Licencia</th>
                <th>Foto</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
	    foreach($lista as $fila){ 
    ?>
                <tr class="odd gradeX">
                    <td>
                        <?=$fila["nombre"]?> 
                        <?=$fila["ape_p"]?>
                    </td>
                    <td>
                        <?=$fila["num_licencia"]?>
                    </td>
                    <td>
                        <center><?=$fila["foto"]?></center>
                    </td>
                    <td><center>
                        <button id="mod" name="mod" value="Modificar" class="btn"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Modificar</button>
                        </center>
                    </td>
                    <td><center>
                       <form action="eliminar.php" method="post">
                           <button id="eli" name="eli" class="btn"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
                       </form>
                       
                        </center>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    </div>
    </body>

    </html>
