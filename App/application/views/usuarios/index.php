<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("assets/images/favicon.png"); ?>">
    <title>Quality Bill Service- Clientes</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("assets/css/lib/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url("assets/css/helper.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('index.php/factura'); ?>">
                        <!-- Logo icon -->
                        <b><img src="<?php echo base_url("assets/images/logo.png"); ?>" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="<?php echo base_url("assets/images/logo-text.png"); ?>" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- User profile and search -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url("assets/images/users/5.jpg"); ?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="<?php echo base_url('index.php/factura' . '/' . $this->session->userdata('id_usuario')); ?>"><i class="fa fa-file"></i> Factura</a></li>
                                    <li><a href="<?php echo base_url('index.php/usuarios' . '/' . $this->session->userdata('id_empresa')); ?>"><i class="fa fa-address-book"></i> Clientes</a></li>
                                    <li><a href="<?php echo base_url('index.php/configuracion' . '/' . $this->session->userdata('id_empresa')); ?>"><i class="fa fa-wrench"></i> Configuración</a></li>
                                    <li><a href="<?php echo base_url('index.php/login/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Registro de Personal</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>NIT</th>
                                                <th>Direccion</th>
                                                <th>Telefono</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>NIT</th>
                                                <th>Direccion</th>
                                                <th>Telefono</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                if ($clientes !== false) {
                                                    foreach ($clientes as $dato) {
                                            ?>
                                                    <tr>
                                                        <td><?php if ($dato !== null && $dato->NOMBRE !== null) {
                                                            echo ($dato->NOMBRE);
                                                        }
                                                        ?></td>
                                                        <td><?php if ($dato !== null && $dato->NIT !== null) {
                                                            echo ($dato->NIT);
                                                        }
                                                        ?></td>
                                                        <td><?php if ($dato !== null && $dato->DIRECCION !== null) {
                                                            echo ($dato->DIRECCION);
                                                        }
                                                        ?></td>
                                                        <td><?php if ($dato !== null && $dato->TELEFONO !== null) {
                                                            echo ($dato->TELEFONO);
                                                        }
                                                        ?></td>
                                                        <td><input type="button" class="btn btn-primary btn-rounded" value="EDITAR" 
                                                            data-edit="<?php if ($dato !== null && $dato->ID !== null) {echo ($dato->ID);}?>">
                                                        <input type="button" class="btn btn-danger btn-rounded" value="ELIMINAR" 
                                                            data-delete="<?php if ($dato !== null && $dato->ID !== null) {echo ($dato->ID);}?>"></td>
                                                    </tr>
                                                    <?php }}
                                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <button type="button" class="btn btn-primary" name="btn-nuevo" id="btn-nuevo">NUEVO CLIENTE</button>
            <!-- End Container fluid  -->

            <!-- footer -->
            <footer class="footer"> © 2018 Todos los derechos reservados. Quality Bill Service</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!--Modal -->
    <div class="modal" id="Modal-Cliente" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-valide" id="form-cliente" name="form-cliente">
                        <div class="form-body">
                            <!--row-->
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Cliente</label>
                                        <input type="text" class="form-control input-rounded" name="nombre" id="nombre" 
                                        placeholder="Cliente">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">NIT</label>
                                        <input type="tel" class="form-control input-rounded" name="nit" id="nit" 
                                        placeholder="NIT">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Dirección</label>
                                        <input type="text" class="form-control input-rounded" name="direccion" id="direccion" 
                                        placeholder="Dirección">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Telefono</label>
                                        <input type="tel" class="form-control input-rounded" name="telefono" id="telefono" 
                                        placeholder="Telefono">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ciudad</label>
                                        <input type="text" class="form-control input-rounded" name="ciudad" id="ciudad" 
                                        placeholder="Ciudad">
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="form-actions">
                                <input type="hidden" name="ident" id="ident" value="">
                                <button type="button" class="btn btn-success" id="btn-submit" name="btn-submit">Guardar</button>
                                <button type="button" class="btn btn-inverse" data-dismiss="modal">Cancelar</button>
                            </div>     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End iModal-->
    <div id="ModalDelete" class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
      <!-- dialog body -->
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    Está a punto de eliminar un usuario de forma permanente. ¿Está seguro(a)?
                  </div>
    <!-- dialog buttons -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" id='btn-confirm-del'>CONFIRMAR</button>
                    <button type="button" class="btn btn-danger" id='btn-cancel-del'>CANCELAR</button>
                  </div>
                </div>
              </div>
            </div>
    <!-- All Jquery -->
    <script src="<?php echo base_url("assets/js/lib/jquery/jquery.min.js"); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url("assets/js/lib/bootstrap/js/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url("assets/js/jquery.slimscroll.js"); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url("assets/js/sidebarmenu.js"); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url("assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"); ?>"></script>


    <!-- Form validation -->
    <script src="<?php echo base_url("assets/js/lib/form-validation/jquery.validate.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/form-validation/jquery.validate-init.js"); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url("assets/js/custom.min.js"); ?>"></script>

    <script src="<?php echo base_url("assets/js/lib/datatables/datatables.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/lib/datatables/datatables-init.js"); ?>"></script>

<script>
$(document).ready(function() {

    $('#btn-nuevo').click(function(){
      var modal = $('#Modal-Cliente');
      $('#form-cliente').trigger("reset");
      $('#ident').val('');
      modal.find('#modal-title').html('Nuevo Cliente');
      modal.modal('show');
    });

    $('#btn-cancelar').click(function(){
        $("#Modal-Cliente").modal("hide"); 
    });

    $('#btn-submit').click(function(){
      $.ajax({
        method: "POST",
        url: "<?php echo base_url('index.php/usuarios/crearcliente'); ?>",
        data: $('#form-cliente').serialize()
      })
      .done(function( data ) {
        alert("Información Registrada");
        location.reload();
      });
    });
});

$(document).on('click', 'input[data-delete]', function(){
    var id = $(this).attr('data-delete');
    var modal = $('#ModalDelete');
    $.ajax({

    })
    .done(function( data ) {
      modal.modal('show');

      $('#btn-confirm-del').click(function(){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('index.php/usuarios/eliminarusuario'); ?>"+ '/' + id
        })
        .done(function( data ) {
          location.reload();
        });
      });

      $('#btn-cancel-del').click(function(){
        modal.modal('hide');
      });
    });
  });

$(document).on('click', 'input[data-edit]', function() {
    var id = $(this).attr('data-edit');
    var modal = $('#Modal-Cliente');
    $.ajax({
      method: "GET",
      url: "<?php echo base_url('index.php/usuarios/leercliente'); ?>" + '/' + id
    })
    .done(function(data) {
      modal.find('input[name=nombre]').val(data.NOMBRE);
      modal.find('input[name=nit]').val(data.NIT);
      modal.find('input[name=direccion]').val(data.DIRECCION);
      modal.find('input[name=telefono]').val(data.TELEFONO);
      modal.find('input[name=ciudad]').val(data.CIUDAD);
      modal.find('input[name=ident]').val(data.ID);
      modal.find('#modal-title').html('Cliente');
      modal.modal('show');
    });
  });
</script>

</body>

</html>