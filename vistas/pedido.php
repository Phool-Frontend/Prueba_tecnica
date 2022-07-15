<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Pedido <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio U.</th>
                            <th>Total</th>
                            <th>Detalle P.</th>
                            <th>Estado</th>
                            <th>Fecha Pago</th>
                            <th>Asesor</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio U.</th>
                            <th>Total</th>
                            <th>Detalle P.</th>
                            <th>Estado</th>
                            <th>Fecha Pago</th>
                            <th>Asesor</th>
                          </tfoot>
                        </table>
                    </div>
                    <!-- //TODO:Debe jalar el id del asesor al momento de hacer el pedido en las consultas,podemos traerlos con el seleccionar de cada cliente ya que ahi esta el id de asesor -->
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Cantidad:</label>
                              <input type="text" class="form-control" name="cantidad" id="cantidad" maxlength="50" placeholder="Cantidad" required>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Producto:</label>
                              <select id="idproducto" title="Producto" name="idproducto" class="form-control selectpicker" data-live-search="true" required>
                              </select>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Cliente:</label>
                              <select id="idcliente" title="Cliente" name="idcliente" class="form-control selectpicker" data-live-search="true" required>
                              </select>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Detalle pedido:</label>
                              <input type="text" class="form-control" name="detalle_pedido" id="detalle_pedido" maxlength="50" placeholder="Nombre" required>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <label>Total:</label>
                              <input type="text" class="form-control" name="total" id="total" maxlength="50" placeholder="Total" required readonly>
                            </div>
                         

                            <input type="hidden" name="idpedido" id="idpedido">
                            <input type="hidden" name="idasesor" id="idasesor">
                            <input type="hidden" name="idproducto_pe" id="idproducto_pe">
                            

                       
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->


<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/pedido.js"></script>


