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
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?=base_url()?>index.php/factura/generarpdf" method="post" id="form-factura" name="form-factura">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-descripcion">Cliente <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control custom-select" id="id_cliente" name="id_cliente">
                                                    <?php
                                                        if ($clientes !== false) {
                                                            foreach ($clientes as $dato) {
                                                    ?>
                                                                <option value="<?php if ($dato !== null && $dato->ID !== null) {echo ($dato->ID);} ?>">
                                                                    <?php if ($dato !== null && $dato->NOMBRE !== null) {echo ($dato->NOMBRE);}?>
                                                                </option>
                                                            <?php }}
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-descripcion">Descripción <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-observaciones">Observaciones <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="vobservaciones" name="observaciones" placeholder="Observaciones">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Valor Acta antes de IVA <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="tel" class="form-control" id="totalfactura" name="totalfactura" placeholder="Total factura"required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4 checkbox checkbox-success">
                                                <label for="iva"> IVA sobre Utilidad <span class="text-danger">*</span></label>
                                                <input id="iva" name="iva" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4 checkbox checkbox-success">
                                                <label for="administracion"> Porcentaje Administración <span class="text-danger">*</span></label>
                                                <input id="administracion" name="administracion" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4 checkbox checkbox-success">
                                                <label for="imprevistos"> Porcentaje Imprevistos <span class="text-danger">*</span></label>
                                                <input id="imprevistos" name="imprevistos" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4 checkbox checkbox-success">
                                                <label for="utilidad"> Porcentaje Utilidad <span class="text-danger">*</span></label>
                                                <input id="utilidad" name="utilidad" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" id="btn-pdf" name="btn-pdf">Submit</button>
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

</body>



</html>