<?php $action = Utils::validate(isset($data) && is_object($data) ? $data : '') ?>

<?php isset($data) && is_object($data) ? $id = $_GET['id'] : '' ?>

<?php if (isset($reingreso) && $reingreso) : ?>
    <?php $action = 'reingreso'; ?>
<?php endif; ?>

<!-- Formulario -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?= isset($ident) && is_object($ident) ? '<h4>Proceso de ventas</h4>' : '<h4>Proceso de ventas</h4>' ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/registros">Seguimientos</a>
                </li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<!-- Buttons -->
<div class="row">
    <div class="col-sm-6">
        <div class="card card-white">
            <div class="card-body" id="container-buttons">
                <a class="btn btn-app bg-primary" href="<?= base_url ?>venta/registro">
                    <i class="fas fa-barcode"></i> Nuevo prospecto
                </a>
                <a href="<?= base_url ?>venta/registros" class="btn btn-app bg-primary">
                    <i class="fas fa-phone-volume"></i> Llamadas en seguimiento
                </a>
                <a class="btn btn-app bg-primary" href="<?= base_url ?>paciente/registro">
                    <i class="fas fa-plus"></i> Nuevo ingreso
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Buttons -->
<div class="row">
    <div class="col-md-6">
        <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <label>Llamadas de seguimiento del día:</label>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- /.card-header -->
                        <table class="table table-bordered" id="tbldata">
                            <thead>
                                <tr>
                                    <th style="font-size: 13px;">Fecha de llamada</th>
                                    <th style="font-size: 13px;">Fecha de seguimiento</th>
                                    <th style="font-size: 13px;">Nombre contacto</th>
                                </tr>
                            </thead>
                            <tbody id="contactosPaciente">
                                <?php if (isset($llamadas) && $llamadas) : ?>
                                    <?php while ($res = $llamadas->fetch_object()) : ?>
                                        <tr>
                                            <td><?= $res->fecha_llamada ?></td>
                                            <td><?= $res->fecha_seguimiento ?></td>
                                            <td><?= $res->nombre_cont ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>

        <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <label>Próximos egresados por clínica</label>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- /.card-header -->
                        <table class="table table-bordered" id="proximosEgreso">
                            <thead>
                                <tr>
                                    <th style="font-size: 13px;">Unidad</th>
                                    <th style="font-size: 13px;">Paciente</th>
                                    <th style="font-size: 13px;">Fecha</th>
                                    <th style="font-size: 13px;">Salida</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-white">
            <div class="card-body">
                <label>Dato estadístico / Pacientes por clínica </label>
                <div class="row">
                    <div class="col-sm-4 col-6">
                        <div class="description-block border-left border-right">
                            <span class="description-percentage text-success">
                                <i class="fas fa-caret-up"></i>
                                <?= isset($arrEntidad) && $arrEntidad ? $arrEntidad[0]['cupos'] - 25 : false ?>
                                Lugares
                            </span>
                            <h5 class="description-header">
                                <?= isset($resp) && $resp ? $resp[0] : false ?>
                                Pacientes
                            </h5>
                            <span class="description-text">CAP 1</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-success">
                                <i class="fas fa-caret-up"></i>
                                <?= isset($arrEntidad) && $arrEntidad ? $arrEntidad[1]['cupos'] - 25 : false ?>
                                Lugares
                            </span>
                            <h5 class="description-header">
                                <?= isset($resp) && $resp ? $resp[1] : false ?>
                                Pacientes
                            </h5>
                            <span class="description-text">CAP 2</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-success">
                                <i class="fas fa-caret-up"></i>
                                <?= isset($arrEntidad) && $arrEntidad ? $arrEntidad[2]['cupos'] - 25 : false ?>
                                Lugares
                            </span>
                            <h5 class="description-header">
                                <?= isset($resp) && $resp ? $resp[2] : false ?>
                                Pacientes
                            </h5>
                            <span class="description-text">CAS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ventas por periodo mensual</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <span class="badge col-1 badge-warning float-right"><?= $val ?></span>
                            <span class="product-description">
                                Ingresos
                            </span>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <a href="javascript:void(0)" class="product-title">
                                <span class="badge badge-info float-right">
                                    <?php echo isset($arrResultVenta) && $arrResultVenta ? $arrResultVenta[0] : false ?><span>$</span>
                                </span>
                            </a>
                            <span class="product-description">
                                CAP 1
                            </span>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <span class="badge badge-danger float-right">
                                <?php echo isset($arrResultVenta) && $arrResultVenta ? $arrResultVenta[1] : false ?><span>$</span>
                            </span>

                            <span class="product-description">
                                CAP 2
                            </span>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <span class="badge badge-success float-right">
                                <?php echo isset($arrResultVenta) && $arrResultVenta ? $arrResultVenta[2] : false ?><span>$</span>
                            </span>
                            <span class="product-description">
                                CAS
                            </span>
                        </li>
                        <!-- /.item -->
                    </ul>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-md-6">
        </div>
    </div>

    <!-- /.table -->
    <?php include "admin/layout/footer.php" ?>
    <script src="<?= base_url ?>assets/js/alerts.js"></script>
    <script src="<?= base_url ?>assets/js/ventas/dashboard.js"></script>
    <script src="<?= base_url ?>admin/assets/js/table.js"></script>