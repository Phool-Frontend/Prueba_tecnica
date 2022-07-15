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
                          <h1 class="box-title">Total pedido x cliente</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
   
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Seleccione cliente:</label>
                              <select id="idcliente" title="Seleccione cliente" name="idcliente" class="form-control selectpicker" data-live-search="true" required>

                              </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>#Total de pedidos:</label>
                              <input type="text" class="form-control" name="total_pedidos" id="total_pedidos"  placeholder="Total pedidos" disabled>
                            </div>
                            

                            <!-- <input type="hidden" name="idasesor" id="idasesor"> -->

                       
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
<script type="text/javascript" src="scripts/total_pedido_x_cliente.js"></script>


