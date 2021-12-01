<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pacientes Asignados</h3>
        <div class="col-md-3">
            <a href="<?= base_url ?>paciente/registro" class="btn btn-info btn-xl pull-right w-100">
                <i class="fa fa-plus"></i> Ingresar nuevo registro
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body" id="card-body">
        <table id="tblRegistros" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> No.Paciente</th>
                    <th> Nombre </th>
                    <th> Estado</th>
                    <th> Expediente</th>
                    <th> Eliminar</th>
                </tr>
            </thead>
            <tbody>
              
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