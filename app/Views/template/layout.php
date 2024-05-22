<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lab de suelos UNIVO </title>

    <!-- Custom fonts for this template-->
    <link href="tools/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="tools/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="tools/toastr/toastr.min.css" rel="stylesheet">
    <link href="tools/sweetalert/sweetalert.css" rel="stylesheet">

    <?php
    echo $this->renderSection("css")

    ?>

    <link rel="stylesheet" href="tools/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="tools/datatables/extensiones/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="tools/datatables/extensiones/css/buttons.dataTables.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="background-color: #333333;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-flask-vial"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lab Suelos UNIVO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Administración Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministracion">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseAdministracion" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url() ?>user">Usuarios</a>
                        <a class="collapse-item" href="<?= base_url() ?>customer">Clientes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Inventario Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Muestras</span>
                </a>
                <div id="collapseInventario" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url() ?>sample">Agregar Muestra</a>
                        <a class="collapse-item" href="productos.html">Mostrar Muestra</a>
                        <a class="collapse-item" href="<?= base_url() ?>groupSample">Ramas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Venta Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVenta">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Proyectos</span>
                </a>
                <div id="collapseVenta" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url() ?>project">Proyecto</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Reportes Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReportes">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapseReportes" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="reporte_venta.html">Reporte de Ventas</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #CCCCCC;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color: #CCCCCC;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session("user")["full_name"] ?></span>
                                <img class="img-profile rounded-circle" src="<?=base_url()?>/img/<?=session("user")["image"]?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url() ?>/login/logout" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    echo $this->renderSection("content")
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer " style="background-color: #CCCCCC;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="tools/jquery/jquery.min.js"></script>
    <script src="tools/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="tools/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>
    <script src="tools/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="tools/toastr/toastr.min.js"></script>
    <script src="tools/sweetalert/sweetalert.js"></script>

    <script src="tools/datatables/jquery.dataTables.min.js"></script>
    <script src="tools/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="tools/datatables/extensiones/js/dataTables.responsive.min.js"></script>

    <script src="tools/datatables/extensiones/js/dataTables.buttons.min.js"></script>
    <script src="tools/datatables/extensiones/js/jszip.min.js"></script>
    <script src="tools/datatables/extensiones/js/buttons.html5.min.js"></script>
    <script src="tools/datatables/extensiones/js/buttons.print.min.js"></script>
    <?php
    echo $this->renderSection("Scripts")
    ?>
</body>

</html>
