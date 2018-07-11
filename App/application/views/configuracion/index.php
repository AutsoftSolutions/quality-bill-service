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
    <title>Quality Bill Service- Facturación</title>
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
                                    <li><a href="<?php echo base_url('index.php/perfil' . '/' . $this->session->userdata('id_usuario')); ?>"><i class="ti-user"></i> Perfil</a></li>
                                    <li><a href="<?php echo base_url('index.php/usuarios' . '/' . $this->session->userdata('id_empresa')); ?>"><i class="fa fa-address-book"></i> Usuarios</a></li>
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
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" id="form-datos" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-usuario">Usuario <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario"
                                                 value="<?php if ($data[0]->USUARIO !== null) {echo ($data[0]->USUARIO);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Contraseñña <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña"
                                                 value="<?php if ($data[0]->PASSWORD !== null) {echo ($data[0]->PASSWORD);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-nombre">Nombre <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Descripcion"
                                                 value="<?php if ($data[0]->NOMBRE !== null) {echo ($data[0]->NOMBRE);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-nit">NIT <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT"
                                                 value="<?php if ($data[0]->NIT !== null) {echo ($data[0]->NIT);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-direccion">Dirección <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" 
                                                value="<?php if ($data[0]->DIRECCION !== null) {echo ($data[0]->DIRECCION);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-telefono">Telefono <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" 
                                                value="<?php if ($data[0]->TELEFONO !== null) {echo ($data[0]->TELEFONO);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-nombre">Correo <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" 
                                                value="<?php if ($data[0]->CORREO !== null) {echo ($data[0]->CORREO);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-resolucion">Resolución de Facturación <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="resolucion" name="resolucion" 
                                                placeholder="Resolución de Facturación" 
                                                value="<?php if ($data[0]->RESOLUCION !== null) {echo ($data[0]->RESOLUCION);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-fechar">Fecha de Resolución <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="fecha_resolucion" name="fecha_resolucion" 
                                                placeholder="Fecha Resolución" 
                                                value="<?php if ($data[0]->FECHA_RESOLUCION !== null) {echo ($data[0]->FECHA_RESOLUCION);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-actividad">Actividad Económica <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="actividad" name="actividad" 
                                                placeholder="Actividad Económica" 
                                                value="<?php if ($data[0]->ACTIVIDAD_ECONOMICA !== null) {echo ($data[0]->ACTIVIDAD_ECONOMICA);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-facturacion">Facturación <span class="text-danger">*</span></label>
                                            <div class="col-lg-2">
                                                <input type="text" class="form-control" id="factura_desde" name="factura_desde" placeholder="Desde"
                                                 value="<?php if ($data[0]->FACTURA_DESDE !== null) {echo ($data[0]->FACTURA_DESDE);}?>">
                                                <label class="col-lg-4 col-form-label" for="val-a">a</label>
                                                <input type="text" class="form-control" id="factura_hasta" name="factura hasta" placeholder="Hasta"
                                                 value="<?php if ($data[0]->FACTURA_HASTA !== null) {echo ($data[0]->FACTURA_HASTA);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-nombre">Tarifa ICA <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tarifa" name="tarifa" placeholder="Tarifa ICA" 
                                                value="<?php if ($data[0]->ICA !== null) {echo ($data[0]->ICA);}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-img">Imagen Organización <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="imagen" name="imagen">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <?php if ($data[0] !== null && $data[0]->IMAGEN !== null) {?>
                                                    <img src="<?php echo base_url($data[0]->IMAGEN); ?>" alt="" width="250" height="" />
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="button" class="btn btn-primary" id="btn-config">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 Todos los derechos reservados. Quality Bill Service</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
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

<script>
$(document).ready(function() {
   $('#btn-config').click(function(){
    var formElement =  $('#form-datos');
    formData = new FormData(formElement[0]);
    formData.append('imagen', $('#imagen')[0].files[0]);
    $.ajax({
        method: "POST",
        url: "<?php echo base_url('index.php/configuracion/guardarinfo'); ?>",
        data: formData,
        processData: false,
        contentType: false,
      })
      .done(function( data ) {
        alert("Información Registrada");
        location.reload();
      });
    }); 
});
</script>

</body>

</html>