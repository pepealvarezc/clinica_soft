<?php
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
}
?>

    <!-- table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">CONSUMO DE SUSTANCIAS</h3>
            <div class="col-md-3">
                <a class="btn btn-info btn-xl pull-right w-100" data-toggle="modal" data-target="#modalCategory">
                    <i class="fa fa-plus"></i> Ingresar nuevo registro
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <form id="consumoSustancias">
            <div class="card-body" id="card-body"><table id="list" class="table table-bordered table-striped">
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
                            <td><?= isset($sus) ? $sus->tipo_sust : '' ?></td>
                            <td><?= isset($sus) ? $sus->consumo_sust : '' ?></td>
                            <td><?= isset($sus) ? $sus->forma_cons : '' ?></td>
                            <td><?= isset($sus) && $sus->frecuencia_cons != '' ? $sus->frecuencia_cons : '<input type="text">' ?></td>
                            <td><?= isset($sus) ? $sus->cant_consumo_sust : '' ?></td>
                        </tr>
                    <?php endwhile; ?>

                    </tbody>
                </table>
        </form>
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
                    <form id="">
                        <div class="form-group">
                            <label for="nombre">SUSTANCIA:</label>
                            <select class="form-control form-control-sm" id="sustancia">
                                <option value="Alcohol">Alcohol</option>
                                <option value="Marihuana">Marihuana</option>
                                <option value="Marihuana">Cocaína</option>
                                <option value="Heroína">Cocaína</option>
                                <option value="Heroína">Metanfetaminas Anfetaminas</option>
                                <option value="Heroína">Inhalables</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">CONSUMO:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="radio-true" value="si" name="customRadio">
                                <label class="form-check-label">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="radio-false" value="no" name="customRadio">
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url ?>assets/js/paciente/consumoSustancias.js"></script><?php
