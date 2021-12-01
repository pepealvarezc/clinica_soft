<?php $action = Utils::editData(isset($edit) && $edit ? $edit : '') ?>
<?php if (!isset($detalleProspecto)) : ?>
    <?php isset($data) && is_object($data) ? $id = $_GET['id'] : '' ?>
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
                    <a href="<?= base_url ?>venta/index">Panel de ventas</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/registros">Seguimientos</a>
                </li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div>
    </div>
</div>

<form class="row" id="rgVenta">
    <div class="col-md-6">
        <div class="card card-white">
            <div class="card-body">
                <form id="rgVenta">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="nombre">Fecha de llamada:</label>
                                <input type="text" class="form-control form-control-sm" id="fechaLlamada" value="<?= isset($data) && is_object($data) ? $data->fecha_llamada : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellido_p">Hora de llamada:</label>
                                <input type="text" class="form-control form-control-sm" id="horaLlamada" value="<?= isset($data) && is_object($data) ? $data->hora_llamada : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="apellido_m">Lada + Telefono:</label>
                                <input type="text" class="form-control form-control-sm" id="ladaTel" required value="<?= isset($data) && is_object($data) ? $data->lada_tel : '' ?>">
                                <p id="whatsapp-validate" class="input__tel__true">Campo obligatorio.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Razon de llamada:</label>
                                <select class="form-control form-control-sm" id="razon" required>
                                    <option value="<?= isset($data) && is_object($data) ? $data->razon_llamada : '' ?>" disabled selected><?= isset($data) && is_object($data) ? $data->razon_llamada : 'Selecciona'; ?></option>
                                    <option value="Prospecto">Prospecto</option>
                                    <option value="Cobrar algún servicio o producto">Cobrar algún servicio o producto
                                    </option>
                                    <option value="Busca Empleo o Recursos Humanos">Busca Empleo o Recursos Humanos
                                    </option>
                                    <option value="Quiere hablar con paciente activo">Quiere hablar con paciente
                                        activo
                                    </option>
                                    <option value="Busca persona perdida o saber si aqui esta">Busca persona perdida o
                                        saber si aqui esta
                                    </option>
                                    <option value="Proveedor">Proveedor</option>
                                    <option value="Otro">Otro</option>
                                    <option value="Busca Empleado">Busca Empleado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lugar_nac">Nombre contacto:</label>
                                <input type="text" class="form-control form-control-sm" id="nombre" value="<?= isset($data) && is_object($data) ? $data->nombre_cont : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Correo de contacto:</label>
                                <input type="email" class="form-control form-control-sm" id="correo" value="<?= isset($data) && is_object($data) ? $data->correo_cont : '' ?>">
                                <p id="email-validate" class="input-true">Campo obligatorio.</p>
                                <p id="email-validate-format" class="input-true">No contiene el formato de un correo
                                    electronico.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Parentesco:</label>
                                <input type="text" class="form-control form-control-sm" id="parentesco" value="<?= isset($data) && is_object($data) ? $data->parentesco_cont : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Tipo de consumo:</label>
                                <input type="text" class="form-control form-control-sm" id="consumo" value="<?= isset($data) && is_object($data) ? $data->tipo_consumo : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Edad:</label>
                                <input type="number" class="form-control form-control-sm" id="edad" value="<?= isset($data) && is_object($data) ? $data->edad_cont : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Acepta:</label>
                                <select class="form-control form-control-sm" id="acepta">
                                    <option value="<?= isset($data) && is_object($data) ? $data->aceptacion : '' ?>" disabled selected><?= isset($data) && is_object($data) ? $data->aceptacion : 'Selecciona'; ?></option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="card card-white col-sm-6" id="btns-media">
            <div class="card-body" id="btns-social-media">
                <a id="email-btn">
                    <i class="fas fa-envelope-square icons-whatsapp-email"></i>
                </a>
                <a href="" class="float" target="_blanck" id="btn-whatsapp">
                    <i class="fab fa-whatsapp-square icons-whatsapp-email wts-mobile"></i>
                </a>
                <a href="sms://+14035550185?body=I%27m%20interested%20in%20your%20product.%20Please%20contact%20me." id="msn-cell">
                    <i class="fas fa-mobile-alt wts-mobile" style="font-size: 46px;"></i>
                </a>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card card-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="resp">Detalles adicionales:</label>
                            <textarea class="form-control form-control-sm" id="detalles" cols="30" rows="3">
                                <?= isset($data) && is_object($data) ? $data->detalles_ad : '' ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="actitud">Por que medio se envio:</label>
                            <input type="text" class="form-control form-control-sm" id="medioEnvio" value="<?= isset($data) && is_object($data) ? $data->medio_de_envio : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Medio por el cual se entero:</label>
                            <select class="form-control form-control-sm" id="medioEntero">
                                <option value="<?= isset($data) && is_object($data) ? $data->medio_entero : '' ?>" disabled selected><?= isset($data) && is_object($data) ? $data->medio_entero : 'Selecciona'; ?></option>
                                <option value="Prospecto">Televisión</option>
                                <option value="Internet">Internet</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Radio">Radio</option>
                                <option value="Recomendación">Recomendación</option>
                                <option value="Reingreso">Reingreso</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha de seguimiento:</label>
                            <div class="input-group date " data-target-input="nearest">
                                <input type="date" id="fechaSeg" class="form-control form-control-sm" data-target="#reservationdate" value="<?= isset($data) && is_object($data) ? $data->fecha_seguimiento : '' ?>">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Calificación de llamadas:</label>
                            <select class="form-control form-control-sm" id="calLLamada" required>
                                <option selected disabled>Selecciona:</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="action" value="<?= $action ?>">
                    <input type="hidden" id="ventaId" value="<?= $data->id_venta ?>">
                </div>
            </div>
        </div>

</form>


<!-- DIRECT NOTES -->
<div class="card direct-chat direct-chat-primary">
    <div class="card-header">
        <h3 class="card-title">Notas de seguimiento</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body list-notes">
        <div class="direct-chat-messages" id="listNotes">
            <?php if (isset($dataArr) && $dataArr) : ?>
                <?php foreach ($dataArr as $el) : ?>
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">
                                <?= $el->nombre_us ?>
                            </span>
                            <span class="direct-chat-timestamp float-right">
                                <?= $el->fecha_alta_n ?> | <?= $el->hora_alta_n ?>
                            </span>
                        </div>
                        <div class="direct-chat-text">
                            <?= $el->nota_desc ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="card-footer">
        <form id="fmNota">
            <div class="input-group">
                <input type="text" id="notaSeg" placeholder="Crear nota..." class="form-control">
                <input type="hidden" id="nombreUs" value="<?= $_SESSION['identity']->nombre_us ?>">
                <span class="input-group-append">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </span>
            </div>
        </form>
    </div>
</div>

<!-- Buttons -->
<div class="card card-white col-sm-6 actionHide" id="actionButtonsContainer">
    <div class="card-body" id="container-buttons">
        <button type="submit" form="rgVenta" class="btn btn-cns btn-flat" id="btnVenta">
            Guardar <i class="far fa-save"></i>
        </button>
    </div>
</div>
</div>

<?php include "admin/layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/alerts.js"></script>
<script src="<?= base_url ?>assets/js/ventas/index.js"></script>
<script src="<?= base_url ?>assets/js/ventas/ajax.js"></script>
<script src="<?= base_url ?>admin/assets/js/table.js"></script>