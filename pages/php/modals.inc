        <!-- Modal datos -->
            <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Perfil</h4>
                  </div>
                  <div class="modal-body">
                  <form id="forma" name="forma" method="post" action="guardarPerfil.php" enctype="multipart/form-data">
                    <?php
                    
                        if($info==0){
                        ?>
                            <input type="hidden" class="form-control" value="<?php echo $correo; ?>" name="id">
                    Curp<br>
                    <input type="text" class="form-control" value="" name="nombre"><br>
                    Fecha de Nacimiento<br>
                    <input type="text" class="form-control" value="" name="ape_p"><br>
                    Lugar de Nacimiento<br>
                    <input type="text" class="form-control" value="" name="ape_m"><br>
                    Servicio Medico<br>
                    <input type="email" class="form-control" value="" name="mail"><br>
                    Número de afiliación<br>
                    <input type="email" class="form-control" value="" name="mail"><br>
                    Vigencia<br>
                    <input type="email" class="form-control" value="" name="mail"><br>
                    Delegación<br>
                    <input type="email" class="form-control" value="" name="mail"><br>
                    <?php
                        }else{
                            ?>
                            <input type="hidden" class="form-control" value="<?=$users["curp"]?>" name="id">
                    Curp<br>
                    <input type="text" class="form-control" value="<?=$users["curp"]?>" name="nombre"><br>
                    Fecha de Nacimiento<br>
                    <input type="text" class="form-control" value="<?=$users["fechaN"]?>" name="ape_p"><br>
                    Lugar de Nacimiento<br>
                    <input type="text" class="form-control" value="<?=$users["LugarN"]?>" name="ape_m"><br>
                    Servicio Medico<br>
                    <input type="email" class="form-control" value="<?=$users["ser_med"]?>" name="mail"><br>
                    Número de afiliación<br>
                    <input type="email" class="form-control" value="<?=$users["afiliacion"]?>" name="mail"><br>
                    Vigencia<br>
                    <input type="email" class="form-control" value="<?=$users["vigencia"]?>" name="mail"><br>
                    Delegación<br>
                    <input type="email" class="form-control" value="<?=$users["delegacion"]?>" name="mail"><br>
                        <?php } ?>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-success" value="Guardar Cambios">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
        <!-- Modal nuevo -->
            <div class="modal fade" id="myModalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Configuración</h4>
                  </div>
                  <div class="modal-body">
                    <form id="forma" name="forma" method="post" action="php/recibir.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $idFin;?>">
                    Tipo de antecedente<br>
                    <select class="form-control" name="tipo">
                    <?php
                    foreach($abo as $lsta){
                                            ?>
                                                <option value="<?php echo $lsta['idtipo']; ?>"><?php echo $lsta['nombre']; ?></option>
                                        <?php
                                            }
                                        ?>
                                        </select><br>
                    Antecedente<br>
                    <input type="text" class="form-control" name="antecedente"><br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-success" value="Guardar Cambios">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            
            <!-- Modal configuración -->
            <div class="modal fade" id="myModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Configuración</h4>
                  </div>
                  <div class="modal-body">
                    <form id="forma" name="forma" method="post" action="guardarPerfil.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $idFin;?>">
                    Tipo de antecedente<br>
                    <select class="form-control" name="tipo">
                    <?php
                    foreach($abo as $lsta){
                                            ?>
                                                <option value="<?php echo $lsta['idtipo']; ?>"><?php echo $lsta['nombre']; ?></option>
                                        <?php
                                            }
                                        ?>
                                        </select><br>
                    Antecedente<br>
                    <input type="text" class="form-control" name="antecedente" value="<?=$antecedente["antecedente"]?>"><br>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-success" value="Guardar Cambios">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
        