<?php $action = Utils::validate(isset($data) && is_object($data) ? $data : '') ?>

<?php
//$id = isset($data) && is_object($data) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
//$paciente_id = isset($data) && is_object($data) : false;
if (isset($_GET['id'])) {
    $paciente_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
} else {
    $paciente_id = isset($data) && $data && is_object($data) ? $data->paciente_id : false;
}

$idVenta = isset($_GET['idv']) ? filter_var($_GET['idv'], FILTER_VALIDATE_INT) : false;
?>

<?php if (isset($reingreso) && $reingreso) : ?>
    <?php $action = 'reingreso'; ?>
<?php endif; ?>

<!-- Formulario -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?= isset($ident) && is_object($ident) ? '<h4>Formulario de Reingreso</h4>' : '<h4>Formulario de ingreso</h4>' ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php if (isset($arr)) : ?>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url ?>venta/registros">Seguimientos</a>
                    </li>
                <?php else: ?>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url ?>venta/registros">Seguimientos</a>
                    </li>
                <?php endif; ?>
                <li class="breadcrumb-item active">Ingreso</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
<!-- Buttons -->
<div class="card card-white col-sm-6">
    <div class="card-body" id="container-buttons">
        <?php if (!$idVenta) : ?>
            <button type="submit" form="rgPaciente" class="btn btn-cns btn-flat">
                Guardar <i class="far fa-save"></i>
            </button>
        <?php elseif ($idVenta && !isset($data) && !$data && !is_object($data)) : ?>
            <button type="submit" form="rgPaciente" class="btn btn-cns btn-flat">
                Guardar <i class="far fa-save"></i>
            </button>
        <?php elseif ($idVenta && isset($data) && $data && is_object($data)) : ?>
            <a type="button" form="rgPaciente" class="btn btn-cns btn-flat"
               href="<?= base_url ?>venta/detalleProspecto&idDp=<?= $data->id_venta ?>">
                Detalle prospecto <i class="fas fa-arrow-right"></i>
            </a>
        <?php endif; ?>
        <!-- PDF  -->
        <?php if(isset($data) && $data && is_object($data)) : ?>
            <a href="<?= base_url ?>docs/contrato_ingreso_esp.php?&idP=<?=$data->id_paciente?>&idI=<?=$data->id_ingreso_paciente?>" class="btn btn-danger btn-flat" target="_blank">
                <i class="fas fa-file-pdf"> PDF Español</i>
            </a>
            <a href="<?= base_url ?>docs/contrato_ingreso_ing.php?&idP=<?=$data->id_paciente?>&idI=<?=$data->id_ingreso_paciente?>" class="btn btn-danger btn-flat" target="_blank">
                <i class="fas fa-file-pdf"> PDF Ingles</i>
            </a>
        <?php endif ; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <form id="rgPaciente">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="nombre"
                                       value="<?= isset($data) && is_object($data) ? $data->nombre_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellido_p">Apellido Paterno:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                       id="apellido_p"
                                       value="<?= isset($data) && is_object($data) ? $data->apellido_paterno_ip : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="apellido_m">Apellido Materno:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                       id="apellido_m"
                                       value="<?= isset($data) && is_object($data) ? $data->apellido_materno_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lugar_nac">Lugar Nacimiento:</label>
                                <input type="text" class="form-control form-control-sm" id="lugar_nac"
                                       value="<?= isset($data) && is_object($data) ? $data->lugar_nacimiento_ip : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <div class="input-group date " data-target-input="nearest">
                                    <input type="date" id="fecha_nac" class="form-control form-control-sm"
                                           data-target="#reservationdate"
                                           value="<?= isset($data) && is_object($data) ? $ident->fecha_nacimineto_ip : '' ?>">
                                    <div class="input-group-append" data-target="#reservationdate"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="text" class="form-control form-control-sm" id="edad"
                                       value="<?= isset($data) && is_object($data) ? $data->edad_pa : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="rol">Estado Civil:</label>
                                <select class="form-control form-control-sm" id="civil">
                                    <option value="<?= isset($data) && is_object($data) ? $data->estado_civil_ip : '' ?>"
                                            disabled
                                            selected><?= isset($data) && is_object($data) ? $data->estado_civil_ip : 'Selecciona'; ?></option>
                                    <option value="Soltero(a)">Soltero(a)</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                    <option value="Viudo(a)">Viudo(a)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="hijos">Hijos:</label>
                                <select class="form-control form-control-sm" id="hijos">
                                    <option value="<?= isset($data) && is_object($data) ? $data->hijos_ip : '0' ?>"
                                            disabled
                                            selected><?= isset($data) && is_object($data) ? $data->hijos_ip : 'Selecciona'; ?></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="edades">Edades:</label>
                                <input type="text" class="form-control form-control-sm" id="edades"
                                       value="<?= isset($data) && is_object($data) ? $data->edades_hijos_ip : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rol">Escolaridad :</label>
                                <select class="form-control form-control-sm" id="escolaridad">
                                    <option value="<?= isset($data) && is_object($data) ? $data->estado_civil_ip : '' ?>"
                                            disabled
                                            selected><?= isset($data) && is_object($data) ? $data->estado_civil_ip : 'Selecciona'; ?></option>
                                    <option value="Educación preescolar">Educación preescolar</option>
                                    <option value="Educación Primaria">Educación Primaria</option>
                                    <option value="Educación secundaria">Educación secundaria</option>
                                    <option value="Educación media superio">Educación media superior</option>
                                    <option value="Educación superio">Educación superior</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Ocupación:</label>
                                <input type="text" class="form-control form-control-sm" id="ocupacion"
                                       value="<?= isset($data) && is_object($data) ? $data->ocupacion_ip : '' ?>">
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <form id="rgPaciente">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ocupacion">Vive con:</label>
                                <input type="text" class="form-control form-control-sm" id="vive_con"
                                       value="<?= isset($data) && is_object($data) ? $data->vive_con_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="calle">Calle:</label>
                                <input type="text" class="form-control form-control-sm" id="calle"
                                       value="<?= isset($data) && is_object($data) ? $data->calle_vive_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="colonia">Colonia:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                       id="colonia"
                                       value="<?= isset($data) && is_object($data) ? $data->colonia_ip : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ext">Ext:</label>
                                <input type="text" class="form-control form-control-sm" id="ext"
                                       value="<?= isset($data) && is_object($data) ? $data->ext_vive_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="interior">Int:</label>
                                <input type="text" class="form-control form-control-sm" id="interior"
                                       value="<?= isset($data) && is_object($data) ? $data->interior_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cp">CP:</label>
                                <input type="text" class="form-control form-control-sm" id="cp"
                                       value="<?= isset($data) && is_object($data) ? $data->codigo_postal_ip : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="ciudad">Ciudad:</label>
                                <input type="text" class="form-control form-control-sm" id="ciudad"
                                       value="<?= isset($data) && is_object($data) ? $data->ciudad_vive_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="estado_vive">Estado:</label>
                                <input type="text" class="form-control form-control-sm" id="estado_vive"
                                       value="<?= isset($data) && is_object($data) ? $data->estado_vive_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pais">País:</label>
                                <input type="text" class="form-control form-control-sm" id="pais"
                                       value="<?= isset($data) && is_object($data) ? $data->pais_vive_ip : '' ?>">
                            </div>
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="hijos">Medio por el cual:</label>
                            <select class="form-control form-control-sm" id="se_entrero">
                                <option value="<?= isset($data) && is_object($data) ? $data->modo_se_entero : '0' ?>"
                                        disabled
                                        selected><?= isset($data) && is_object($data) ? $data->modo_se_entero : 'Selecciona'; ?></option>
                                <option value="Internet">Internet</option>
                                <option value="Recomendación">Recomendación</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Conferencia">Conferencia</option>
                                <option value="Radio">Radio</option>
                                <option value="Televisión">Televisión</option>
                                <option value="Redes Sociales">Redes Sociales</option>
                                <option value="Folleto">Folleto</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="recomendado">Recomendado por:</label>
                            <input type="text" class="form-control form-control-sm" id="recomendado" disabled="disabled"
                                   value="<?= isset($data) && is_object($data) ? $data->recomendado_por : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="resp">Resp Legal:</label>
                            <input type="text" class="form-control form-control-sm" id="resp"
                                   value="<?= isset($data) && is_object($data) ? $data->resp_legal : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="actitud">Estado y actitud al ingresar:</label>
                            <input type="text" class="form-control form-control-sm" id="actitud"
                                   value="<?= isset($data) && is_object($data) ? $data->estado_actitud : '' ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="observaciones">Observaciones al ingresar:</label>
                            <input type="text" class="form-control form-control-sm" id="observaciones"
                                   value="<?= isset($data) && is_object($data) ? $data->observaciones_ingreso : '' ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class=" float-right">
                            <?php if (!isset($arr)) : ?>
                                <a type="button" id="btnCreate" class="btn btn-cns btn-flat" data-toggle="modal"
                                   data-target="#modalCategory">
                                    Ingresar contactos <i class="far fa-list-alt"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-header -->
                        <table class="table table-bordered" id="listContactos">
                            <thead>
                            <tr>
                                <th style="font-size: 13px;">Nombre</th>
                                <th style="font-size: 13px;">Parentesco</th>
                                <th style="font-size: 13px;">Telefono</th>
                                <th style="font-size: 13px;">Correo</th>
                                <?php if (!isset($arr)) : ?>
                                    <th style="font-size: 13px;">Editar</th>
                                    <th style="font-size: 13px;">Eliminar</th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody id="contactosPaciente">
                            <?php if (isset($arr)) : ?>
                                <?php for ($i = 0; $i < count($arr); $i++) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $arr[$i]['nombre_contacto'] ?>
                                        </td>
                                        <td>
                                            <?php echo $arr[$i]['parentesco_cp'] ?>
                                        </td>
                                        <td>
                                            <?php echo $arr[$i]['telefono_cp'] ?>
                                        </td>
                                        <td>
                                            <?php echo $arr[$i]['correo_cp'] ?>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nombre">Adicción o tratamiento:</label>
                                <select class="form-control form-control-sm" id="adiccion">
                                    <option value="<?= isset($data) && is_object($data) ? $data->adicion_tratamiento : '' ?>"
                                            disabled
                                            selected><?= isset($data) && is_object($data) ? $data->adicion_tratamiento : 'Selecciona'; ?></option>
                                    <option value="Alcoholismo">Alcoholismo</option>
                                    <option value="Drogadicción">Drogadicción</option>
                                    <option value="Trastorno Mental">Trastorno Mental</option>
                                    <option value="Trastorno Alimenticio">Trastorno Alimenticio</option>
                                    <option value="Ludopatía">Ludopatía</option>
                                    <option value="Ingobernabilidad">Ingobernabilidad</option>
                                    <option value="Codependencia">Codependencia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Tratamiento:</label>
                            <select class="form-control form-control-sm" id="tratamiento" required>
                                <option value="<?= isset($data) && is_object($data) ? $data->nombre_entidad : '' ?>"
                                        disabled
                                        selected><?= isset($data) && is_object($data) ? $data->nombre_entidad : 'Selecciona'; ?></option>
                                <?php while ($ent = $tratamiento->fetch_object()) : ?>
                                    <option value="<?= $ent->id_entidad ?>"><?= $ent->nombre_entidad ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="nombre">
                                Ingreso:
                            </label>
                            <input type="text" class="form-control form-control-sm" id="ingreso"
                                   value="<?= isset($data) && is_object($data) ? $data->fecha_alta_ing : $dataNow ?> ">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Precio:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control" id="precio_trat"
                                       value="<?= isset($data) && is_object($data) ? $data->precio_tratamiento_ip : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="nombre">Precio con letra:</label>
                            <input type="text" class="form-control form-control-sm"
                                   id="precio_letra"
                                   value="<?= isset($data) && is_object($data) ? $data->precio_letra : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nombre">Duracion:</label>
                            <div class="field-duracion">
                                <input type="number" class="form-control form-control-sm" id="duracion"
                                       value="<?= isset($data) && is_object($data) ? $data->duracion_ip : '' ?>">
                                <div id="txt-bx">
                                    <label for="txt-duracion" id="cont-duracion">

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="deposito_ip">Deposito:</label>
                            <input type="number" class="form-control form-control-sm" id="deposito_ip"
                                   value="<?= isset($data) && is_object($data) ? $data->deposito_ip : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="rol">Moneda</label>
                            <select class="form-control form-control-sm" id="moneda">
                                <option value="<?= isset($data) && is_object($data) ? $data->moneda_ip : '' ?>" disabled
                                        selected><?= isset($data) && is_object($data) ? $data->moneda_ip : 'Selecciona'; ?></option>
                                <option value="USD">USD</option>
                                <option value="MXN">MXN</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="nombre">Deposito letra:</label>
                            <input type="text" class="form-control form-control-sm" id="deposito_letra"
                                   value="<?= isset($data) && is_object($data) ? $data->deposito_letra : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Forma de Pago Saldo:</label>
                            <input type="text" class="form-control form-control-sm" id="forma_pago"
                                   value="<?= isset($data) && is_object($data) ? $data->forma_pago_ip : '' ?>">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="paciente_id" value="<?= $paciente_id ?>"/>
                <input type="hidden" id="ventaId" value="<?= $idVenta ?>"/>
                <input type="hidden" id="action" value="<?= $action ?>"/>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- Modal Create-->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="cpForm">
                    <div class="form-group">
                        <label for="nombre">Nombre contacto:</label>
                        <input type="text" class="form-control" id="nombreCp" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Telefono contacto:</label>
                        <input type="text" class="form-control" id="telCp">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Correo contacto:</label>
                        <input type="text" class="form-control" id="correoCp">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Parentesco:</label>
                        <input type="text" class="form-control" id="parentescoCp" required>
                    </div>
                    <input type="hidden" name="" id="actionContact" value="">
                    <input type="hidden" name="" id="ingreso_id" value="">
                    <input type="hidden" name="" id="paciente_id" value="">
                    <input type="hidden" name="" id="venta_id" value="<?= $idVenta ?>">

                    <button type="submit" class="btn btn-cns btn-flatt" id="btnAction">
                        <i class="far fa-save"> Guardar</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <form id="cpEdit">
                    <div class="form-group">
                        <label for="nombre">Nombre contacto:</label>
                        <input type="text" class="form-control" id="nombreEdit" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Telefono contacto:</label>
                        <input type="text" class="form-control" id="telEdit">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Correo contacto:</label>
                        <input type="text" class="form-control" id="correoEdit">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Parentesco:</label>
                        <input type="text" class="form-control" id="parentescoEdit" required>
                    </div>
                    <button type="button" class="btn btn-cns btn-flatt btnAction" id="btnAction">
                        Guardar
                    </button>
                    <input type="hidden" id="idContact">
                </form>

            </div>
        </div>
    </div>
</div>

<!-- /.table -->
<?php include "admin/layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/alerts.js"></script>
<script src="<?= base_url ?>assets/js/paciente/index.js"></script>
<script src="<?= base_url ?>assets/js/paciente/contactos.js"></script>
<script src="<?= base_url ?>admin/assets/js/table.js"></script>