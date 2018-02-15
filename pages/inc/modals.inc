        <!-- Modal perfil -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Perfil</h4>
                  </div>
                  <div class="modal-body">
                  <form id="forma" name="forma" method="post" action="guardarPerfil.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" value="<?=$users["id_user"]?>" name="id">
                    Nombre<br>
                    <input type="text" class="form-control" value="<?=$users["nombre"]?>" name="nombre"><br>
                    Apellido Paterno<br>
                    <input type="text" class="form-control" value="<?=$users["ape_p"]?>" name="ape_p"><br>
                    Apellido Materno<br>
                    <input type="text" class="form-control" value="<?=$users["ape_m"]?>" name="ape_m"><br>
                    Correo electrónico<br>
                    <input type="email" class="form-control" value="<?=$users["mail"]?>" name="mail"><br>
                    Empresa<br>
                    <input type="text" class="form-control" value="<?=$users["id_empresa1"]?>" name="empresa"><br>
                    <input type="button" value="Cambiar Contraseña" class="btn btn-primary" data-toggle="modal" data-target="#myModalPass" data-dismiss="modal"><br>
                    
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
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Configuración</h4>
                  </div>
                  <div class="modal-body">
                    <input type="button" value="Datos de factura" class="btn btn-primary" data-toggle="modal" data-target="#myModalFac" data-dismiss="modal"><br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>
            
            
            <!-- Modal -->
<div class="modal fade" id="myModalFac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form role="form" name="registro" action="php/registro.php" method="post">
                                
                                        <label for="fullname">Empresa</label>
                                        <input type="text" class="form-control" id="fullname" name="nombre" placeholder="Nombre"><br>
                                    
                                
                                <!--Datos de la empresa-->
                                
                                    

                                        <label for="fullname">Calle</label>
                                        <input type="text" class="form-control" id="fullname" name="nombre" placeholder="Calle"><br>
                                    
                                
                                
                                    

                                        <label for="confirm_password">C.P</label>
                                        <input type="text" class="form-control" id="calle" name="calle" placeholder="C.P"><br>
                                    
                                

                                
                                    
                                        <label for="colonia">Colonia</label>
                                        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia"><br>
                                    
                                
                                
                                    
                                        <label for="municipio">Municipio</label>
                                        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio"><br>
                                    
                                
                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


            
            
        <!-- Modal password -->
            <div class="modal fade" id="myModalPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cambiar Contraseña</h4>
                  </div>
                  <div class="modal-body">
                    Contraseña anterior<br><br>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="input-group">
                          <input type="password" id="password1" class="form-control">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="..." onchange="document.getElementById('password1').type = this.checked ? 'text' : 'password'"> Ver Contraseña
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                    
                    
                    <br>Nueva contraseña<br><br>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="input-group">
                          <input type="password" id="password2" class="form-control">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="..." onchange="document.getElementById('password2').type = this.checked ? 'text' : 'password'"> Ver Contraseña
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                    
                    <br>Repetir contraseña<br><br>
                    
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="input-group">
                          <input type="password" id="password3" class="form-control">
                          <span class="input-group-addon">
                            <input type="checkbox" aria-label="..." onchange="document.getElementById('password3').type = this.checked ? 'text' : 'password'"> Ver Contraseña
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#myModal">Cerrar</button>
                    <button type="button" class="btn btn-success">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>