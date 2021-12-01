<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="card-title">Administración de pacientes</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>paciente/registro">Registro</a>
                </li>
                <li class="breadcrumb-item active">Registros</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<div class="card">
    <!-- /.card-header -->
    <div class="card-body" id="card-body">
        <!--
        <a href="<?= base_url ?>paciente/registro" class="btn btn-light btn-xl pull-right w-25">
            <i class="fa fa-plus"></i>Nuevo Ingreso
        </a>
        -->
        <table id="tbldata" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> Nombre</th>
                <th> Apellido Paterno</th>
                <th> Apellido Materno</th>
                <th> Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($obj = $data->fetch_object()) : ?>
                <tr>
                    <td><?= $obj->nombre_ip ?></td>
                    <td><?= $obj->apellido_paterno_ip ?></td>
                    <td><?= $obj->apellido_materno_ip ?></td>
                    <td class="col-1">
                        <a type="button" class="btn bg-gradient-white btn-sm"
                           href="<?= base_url ?>paciente/expediente&id=<?= $obj->id_paciente ?>">
                            <i class="fas fa-folder"></i>
                        </a>
                        <a type="button" class="btn bg-gradient-white btn-sm"
                           href="<?= base_url ?>paciente/reingreso&id=<?= $obj->id_paciente ?>">
                            <i class="fas fa-redo-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endwhile;; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- page script -->
<?php include "admin/layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/usuario/index.js"></script>
<script src="<?= base_url ?>admin/assets/js/table.js"></script>