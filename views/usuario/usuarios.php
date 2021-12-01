<div class="card">
    <div class="card-header">
        <h3 class="card-title">Administración de usuarios</h3>
        <div class="col-md-3">
            <a href="<?= base_url ?>usuario/registro" class="btn btn-light btn-xl pull-right w-100">
                <i class="fa fa-plus"></i> Ingresar nuevo registro
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body" id="card-body">
        <table id="tblRegistros" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> No. Empleado</th>
                <th> Nombre</th>
                <th> Apellidos</th>
                <th> Email</th>
                <th> Estado</th>
                <th> Rol</th>
                <th> EDIT</th>
                <th> DELET</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($us = $data->fetch_object()) : ?>
                <tr>
                    <td><?= $us->id_usuario ?></td>
                    <td><?= $us->nombre_us ?></td>
                    <td><?= $us->apellidos_us ?></td>
                    <td><?= $us->email_us ?></td>
                    <td>
                        <div id="status-user">
                            <label for="">
                                <?= $us->estado_us ?>
                            </label>
                        </div>
                    </td>
                    <td><?= $us->rol ?></td>
                    <td>
                        <a class="btn bg-gradient-white btn-sm" href="<?= base_url ?>usuario/editar&id=<?= $us->id_usuario ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm delete_us" data-id="<?= $us->id_usuario ?>">
                            <i class="fas fa-trash">
                            </i>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
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