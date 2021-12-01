<?php
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
}
?>

<!-- table -->
<div class="card">
    <div class="card-header">
        <div class="btn-group">
            <div>
                <a class="btn btn-info btn-xl pull-right w-100" data-toggle="modal" data-target="#modalCategory">
                    <i class="fa fa-plus"></i> Ingresar nuevo registro
                </a>
            </div>
            <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body" id="card-body">
        <table id="list" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th><p class="title-table-sust">TIPO DE SUSTANCIA</p></th>
                <th><p class="title-table-sust">CONSUMO</p></th>
                <th><p class="title-table-sust">FORMA DE CONSUMO</p></th>
                <th><p class="title-table-sust">FRECUENCIA DE CONSUMO</p></th>
                <th><p class="title-table-sust">CANTIDAD CONSUMIDA CON MAS FRECUENCIA </p></th>
                <th><p class="title-table-sust">EDAD DE INICIO DEL CONSUMO </p></th>
            </tr>
            </thead>
            <tbody>

            <?php while ($sus = $sust->fetch_object()) : ?>
                <tr>
                    <td><?= isset($sus) ? $sus->nombre_sust : '' ?></td>
                    <td><?= isset($sus) ? $sus->consumo_sust : '' ?></td>
                    <td><?= isset($sus) ? $sus->forma_cons : '' ?></td>
                    <td><?= isset($sus) ? $sus->frecuencia_cons : '' ?></td>
                    <td><?= isset($sus) ? $sus->cant_consumo_sust : '' ?></td>
                    <td><?= isset($sus) ? $sus->edad_inicio_cons : '' ?></td>
                </tr>
            <?php endwhile; ?>

            </tbody>
        </table>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONSUMO DE SUSTANCIAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form id="consumoSustancias">
                    <div class="form-group">
                        <label for="nombre">SUSTANCIA:</label>
                        <select class="form-control form-control-sm" id="sustancia">
                            <?php while ($sus = $sustancia->fetch_object()) : ?>
                                <option class="change" data-id="<?= $id ?>"
                                        value="<?= $sus->id_sustancia ?>"><?= $sus->nombre_sust ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div id="inputs-sustancia" class="none-inputs">
                        <div class="form-group">
                            <label for="nombre">CONSUMO:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="radio-true" value="si"
                                       name="customRadio">
                                <label class="form-check-label">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="radio-false" value="no"
                                       name="customRadio">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre">FORMA DE CONSUMO:</label>
                            <select class="form-control form-control-sm" id="forma-consumo">
                                <?= isset($data) && is_object($data) && $data->tipo_sust == 'Ingerida' ? '' : `<option value="Ingerida">Ingerida</option>` ?>
                                <option value="Inyectada">Inyectada</option>
                                <option value="Fumada">Fumada</option>
                                <option value="Inhalada">Inhalada</option>
                                <option value="Otras">Otras</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombre">FRECUENCIA DE DIAS DE CONSUMO</label>
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">CANTIDAD CONSUMIDA CON MAS FRECUENCIA</label>
                            <input type="text" class="form-control form-control-sm" id="cantidad"
                                   value="<?= isset($data) && is_object($data) ? $data->cant_consumo_sust : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">EDAD DE INICIO DEL CONSUMO</label>
                            <input type="text" class="form-control form-control-sm" id="inicio-consumo"
                                   value="<?= isset($data) && is_object($data) ? $data->edad_inicio_cons : '' ?>">
                        </div>
                        <input type="hidden" id="paciente_id" value="<?= $id ?>"/>
                        <input type="hidden" id="action" value="<?= $action ?>"/>
                        <button type="submit" class="btn btn-info w-100"><i class="fas fa-user"></i>Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Situcaion Frecuencia -->
<div class="card">
    <div class="card-header">
        <div class="btn-group">
            <div>
                <a class="btn btn-info btn-xl pull-right w-100" data-toggle="modal" data-target="#modalCategory">
                    <i class="fa fa-plus"></i> Ingresar nuevo registro
                </a>
            </div>
            <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body" id="card-body">
        <table id="list" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th><p class="title-table-sust">SITUACIÓN QUE CON MÁS FRECUENCIA LE OCASIONA CONSUMIR</p></th>
                <th><p class="title-table-sust">NÚMERO (1 AL 8) 1= MÁS FRECUENTE 8= MENOS FRECUENTE</p></th>
            </tr>
            </thead>
            <tbody>
            <form>
                <tr>
                    <td>
                        <p>
                            Emociones desagradables (Triste, ansioso, preocupado, etc.)
                        </p>
                    </td>
                    <td>

                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Por alguna enfermedad.
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Necesidad física (Síndrome de abstinencia, que su cuerpo necesita sustancia.)
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Probando autocontrol (Ponerse a prueba, sentir que puede controlar y para su consumo.)
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Conflictos con otros (Pleitos o problemas con alguna persona.)
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Momentos agradables con otros (Disfrutar de la compañía de otras personas.)
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Presión social (Cuando otras personas lo invitan a consumir.)
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>

    </div>
</div>
<!-- Escala -->
<div class="card">
    <div class="card-header">
        <div class="btn-group">
            <div>
                <a class="btn btn-info btn-xl pull-right w-100" data-toggle="modal" data-target="#modalCategory">
                    <i class="fa fa-plus"></i> Ingresar nuevo registro
                </a>
            </div>
            <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body" id="card-body">
        <table id="list" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th><p class="title-table-sust">TIPO DE PROBLEMA</p></th>
                <th><p class="title-table-sust"></p>ALCOHOL</th>
                <th><p class="title-table-sust"></p>DROGAS</th>
            </tr>
            </thead>
            <tbody>
            <form>
                <tr>
                    <td>
                        <p>
                            Sin problema.
                        </p>
                    </td>
                    <td>

                        <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                               value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">

                    </td>
                    </td>
                    <td>

                        <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                               value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">

                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Un pequeño problema (estoy preocupado al respecto, pero no he tenido ninguna consecuencia negativa).
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Un problema (he tenido algunas consecuencias negativas, pero ninguna que pueda considerarse seria).
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Un gran problema (he tenido algunas consecuencias negativas serias).
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="consumo-frecuencia"
                                   value="<?= isset($data) && is_object($data) ? $data->frecuencia_cons : '' ?>">
                        </div>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>

    </div>
</div>
<script src="<?= base_url ?>assets/js/paciente/consumoSustancias.js"></script>