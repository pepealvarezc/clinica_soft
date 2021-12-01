<?php $action = Utils::validate(isset($data) && is_object($data) ? $data : '') ?>

<?php isset($data) && is_object($data) ? $id = $_GET['id'] : '' ?>

<?php if (isset($reingreso) && $reingreso) : ?>
    <?php $action = 'reingreso'; ?>
<?php endif; ?>

    <!-- Formulario -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Coordinador clínico </h4>
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
                        <i class="fas fa-user-plus"></i> Asignar paciente
                    </a>
                    <a class="btn btn-app bg-primary">
                        <i class="fas fa-arrow-circle-right"></i> CIE
                    </a>
                    <a class="btn btn-app bg-primary" href="<?= base_url ?>paciente/registro">
                        <i class="fas fa-user-nurse"></i> Sesiones terapeuta
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-white">
                <!-- /.card-header -->
                <div class="card-body">
                    <label>Sesiones próximas de su equipo:</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- /.card-header -->
                            <table class="table table-bordered" id="tbldata">
                                <thead>
                                <tr>
                                    <th style="font-size: 13px;">Fecha</th>
                                    <th style="font-size: 13px;">Nombre paciente</th>
                                    <th style="font-size: 13px;">No de sesion</th>
                                </tr>
                                </thead>
                                <tbody id="contactosPaciente">
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
                            <table class="table table-bordered" id="tbldata">
                                <thead>
                                <tr>
                                    <th style="font-size: 13px;">Unidad</th>
                                    <th style="font-size: 13px;">Paciente</th>
                                    <th style="font-size: 13px;">Fecha</th>
                                    <th style="font-size: 13px;">Salida</th>
                                </tr>
                                </thead>
                                <tbody id="contactosPaciente">

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
                <!-- /.card-header -->
                <div class="card-body">
                    <label>Sesiones próximas para el:</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- /.card-header -->
                            <table class="table table-bordered" id="tbldata">
                                <thead>
                                <tr>
                                    <th style="font-size: 13px;">Fecha</th>
                                    <th style="font-size: 13px;">Nombre</th>
                                    <th style="font-size: 13px;">No de sesion</th>
                                    <th style="font-size: 13px;">ir a sesion</th>
                                </tr>
                                </thead>
                                <tbody id="contactosPaciente">
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
                    <label>Cumpleaños de pacientes del mes en curso</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- /.card-header -->
                            <table class="table table-bordered" id="tbldata">
                                <thead>
                                <tr>
                                    <th style="font-size: 13px;">Nombre</th>
                                    <th style="font-size: 13px;">Fecha nacimiento</th>
                                </tr>
                                </thead>
                                <tbody id="contactosPaciente">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <!-- /.table -->
    <script src="<?= base_url ?>assets/js/alerts.js"></script>
    <script src="<?= base_url ?>admin/assets/js/table.js"></script>
<?php include "admin/layout/footer.php" ?>