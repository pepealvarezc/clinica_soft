<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="card-title">Ventas concretadas</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/index">Panel de ventas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/registros">Seguimientos</a>
                </li>
                <li class="breadcrumb-item active">Ventas</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>


<div class="card">
    <!-- /.card-header -->
    <div class="card-body" id="card-body">
        <table id="tblventaIngreso" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> Nombre</th>
                <th> Apellido paterno </th>
                <th> Apellido materno</th>
                <th> Fecha de ingreso</th>
                <th> Detalle prospecto</th>
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
<script src="<?= base_url ?>assets/js/ventas/consultas.js"></script>
<script src="<?= base_url ?>admin/assets/js/table.js"></script>