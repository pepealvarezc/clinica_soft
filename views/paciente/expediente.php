<?php
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url ?>admin/layout/dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>

                        <h4 class="profile-username text-center"><?= isset($pac) && is_object($pac) ? $pac->nombre_pa : ''; ?></h4>

                        <!--<p class="text-muted text-center">Software Engineer</p>-->
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link " href="#activity">Documentos</a>
                            </li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="#settings">Configuraciones</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <section class="content">
                            <div>
                                <label for="">Ingresos:</label>

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <div class="info-box">
                                            <select class="form-control form-control" id="ingreso">
                                                <option value="" disabled selected><?= isset($data) && is_object($data) ? $data->escolaridad_pac : 'Selecciona'; ?></option>
                                                <?php while ($ing = $res->fetch_object()) : ?>
                                                    <option value="<?= $ing->id_ingreso_paciente ?>">
                                                        <?= $ing->fecha_ingreso ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <div class="col" id="contPdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info elevation-1">
                                                <a href="<?= base_url ?>paciente/registro&id=<?= $id ?>" class="small-box-footer">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                            </span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Ingreso</span>
                                                <span class="info-box-number">
                                                    <small></small>
                                                </span>
                                            </div>

                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-danger elevation-1">
                                                <a href="<?= base_url ?>dispocisionCambio/registro&id=<?= $id ?>" class="small-box-footer">
                                                <i class="fas fa-folder"></i>
                                                </a>
                                            </span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Documento</span>
                                                <span class="info-box-number"></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->

                                    <!-- fix for small devices only -->
                                    <div class="clearfix hidden-md-up"></div>
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-success elevation-1">
                                                <a href="<?= base_url ?>consumoSustancias/registro&id=<?= $id ?>" class="small-box-footer">
                                                <i class="fas fa-folder"></i>
                                                </a>
                                            </span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Documento</span>
                                                <span class="info-box-number"></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div> 
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Documento</span>
                                                <span class="info-box-number"></span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "admin/layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/paciente/asignacion.js"></script>
<script src="<?= base_url ?>assets/js/expediente/index.js"></script>
<script src="<?= base_url ?>assets/js/expediente/ajax.js"></script>