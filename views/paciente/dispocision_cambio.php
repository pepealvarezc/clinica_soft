<?php
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
}
?>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url ?>paciente/expediente&id=<?= $id ?>">Expediente</a></li>
                    <li class="breadcrumb-item active">Disposición al cambio</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">DISPOSICIÓN AL CAMBIO</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">¿Cuánto es el mayor tiempo que se ha propuesto y ha logrado no consumir
                            alcohol-drogas? (mayor periodo de abstinencia). Si nunca se ha abstenido, marque ¨marque
                            0</label>
                        <input type="text" id="inputName" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>¿Cuándo ocurrió?</label>
                            <div class="input-group date " data-target-input="nearest">
                                <input type="date" id="fecha_nac" class="form-control form-control-sm" data-target="#reservationdate" value="value=" <?= isset($data) && is_object($data) ? $data->fecha_nac_pac : '' ?> />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">¿Por qué se abstuvo en esa ocasión y que hizo para mantenerse sin
                            consumir?</label>
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">¿En los últimos 6 meses cuanto tiempo es el mayor periodo que ha
                            tenido sin consumir?</label>
                        <input type="text" id="inputClientCompany" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>¿Cuándo ocurrió?</label>
                        <div class="input-group date " data-target-input="nearest">
                            <input type="date" id="fecha_nac" class="form-control form-control-sm" data-target="#reservationdate" value="value=" <?= isset($data) && is_object($data) ? $data->fecha_nac_pac : '' ?>"" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">¿Por qué se abstuvo en esa ocasión y que hizo para mantenerse sin
                            consumir?</label>
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">DISPOSICIÓN AL CAMBIO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">Actualmente, ¿Qué tan importante es para usted </label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Selecciona</option>
                            <option>Nada importantes</option>
                            <option>Poco importante</option>
                            <option>Algo importante</option>
                            <option>Importante</option>
                            <option>Muy dispuesto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">En una escala del 1 al 10 (en donde 1 es nada y 10 es mucho). ¿Qué
                            tan seguro se siente de no consumir alcohol-drogas? </label>
                        <input type="text" id="inputClientCompany" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEstimatedDuration">En estos momentos, usted piensa que:</label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Selecciona</option>
                            <option>No es su intención dejar de consumir</option>
                            <option>Está indeciso de querer dejar de consumir</option>
                            <option>Está decidido a dejar de consumir</option>
                            <option>Ya está haciendo algo para dejar de consumir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputEstimatedDuration">En estos momentos, usted piensa que:</label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Selecciona</option>
                            <option>Nada dispuesto</option>
                            <option>Poco dispuesto</option>
                            <option>Algo dispuesto</option>
                            <option>Dispuesto</option>
                            <option>Muy dispuesto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Menciona tres principales razones por las cuales es importante
                            para usted dejar de consumir:</label>
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content -->