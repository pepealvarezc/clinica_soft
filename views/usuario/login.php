<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinica nuevo ser</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url ?>admin/layout/dist/css/adminlte.min.css">
    <script src="<?= base_url ?>admin/layout/plugins/jquery/jquery.min.js"></script>
    <!-- Sweet alert -->
    <script src="<?= base_url ?>assets/js/plugins/SweerAlert/dist/sweetalert2.all.min.js"></script>
</head>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <img src="<?=base_url?>assets/img/logoLogin.svg" alt="" style="width:80%; margin-bottom: 1rem">
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar sesión</p>
            <form id="login-form">
                <div class="input-group mb-3">
                    <input
                            type="email"
                            class="form-control"
                            placeholder="Correo"
                            name="email_us"
                            id="email"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input
                            type="password"
                            class="form-control"
                            placeholder="Contraseña"
                            name="password"
                            id="pass"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-block">Entrar</button>
                    </div>
                </div>
            </form>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <script src="<?= base_url ?>assets/js/globalUrl.js"></script>
    <script src="<?= base_url ?>assets/js/usuario/index.js"></script>
    <!-- jQuery -->
    <script src="<?= base_url ?>admin/layout/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url ?>admin/layout/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url ?>admin/layout/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url ?>assets/js/alerts.js"></script>
</body>

</html>