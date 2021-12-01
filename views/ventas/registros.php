<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="card-title">Llamadas de seguimiento</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/index">Panel de ventas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/ingresoVenta">Ventas concretadas</a>
                </li>
                <li class="breadcrumb-item active">Registros</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<div class="card">
    <!-- /.card-header -->
    <!-- <button id="testing">Click</button>-->
    <div class="card-body" id="card-body">
        <!--
        <a href="<?= base_url ?>paciente/registro" class="btn btn-light btn-xl pull-right w-25">
            <i class="fa fa-plus"></i>Nuevo Ingreso
        </a>
        -->
        <table id="tblRegistros" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="font-size: 15px;"> Fecha llamada</th>
                <th style="font-size: 15px;"> Fecha seguimiento</th>
                <th style="font-size: 15px;"> Teléfono </th>
                <th style="font-size: 15px;"> Nombre</th>
                <th style="font-size: 15px;"> Ascesor</th>
                <th style="font-size: 15px;"> Estado</th>
                <th style="font-size: 12px;"> Modificar</th>
                <th style="font-size: 12px;"> Finalizar Seguimiento</th>
                <th style="font-size: 12px;"> Ingreso paciente</th>
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
<!--<script src="<?= base_url ?>assets/js/ventas/index.js"></script>-->
<script src="<?= base_url ?>assets/js/ventas/consultas.js"></script>
<!--<script src="<?= base_url ?>admin/assets/js/table.js"></script> -->