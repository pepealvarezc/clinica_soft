<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>CLINICA NUEVO SER</title>
    <!-- Jquery -->
    <script src="<?= base_url ?>admin/layout/plugins/jquery/jquery.min.js"></script>
    <!-- Sweet alert -->
    <script src="<?= base_url ?>assets/js/plugins/SweerAlert/dist/sweetalert2.all.min.js"></script>
    <!-- styles css -->
    <link rel="stylesheet" href="<?= base_url ?>admin/assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/daterangepicker/daterangepicker.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/select2/css/select2.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="<?= base_url ?>admin/layout/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- sweetalert -->
    <link rel="text/css" href="<?= base_url ?>assets/plugins/SweerAlert/dist/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <!-- Left navbar links -->
        <ul class="navbar-nav navbar-center">
            <li>
                <a class="navbar-brand">
                    <img src="<?= base_url ?>assets/img/logo.svg" alt="AdminLTE Logo"
                         class="brand-image img-circle elevation-3"
                         style="opacity: .8; margin-left: 1rem" id="logo">
                    <span class="brand-text font-weight-light">Clínica nuevo ser</span>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url ?>dashboard/index" class="nav-link" id="r-home">Inicio</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url ?>usuario/logout" class="nav-link">Cerrar sesión</a>
            </li>
        </ul>

        <!-- SEARCH FORM
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
        -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <aside class="main-sidebar sidebar-light-white elevation-4">
        <!-- Brand Logo -->
        <div class="login-logo" style="display: flex; align-items: center; justify-content: center;">
            <img src="<?=base_url?>assets/img/logoLogin.svg" alt="" style="width:100%; padding: 1rem">
        </div>