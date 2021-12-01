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
                    <li class="breadcrumb-item"><a
                                href="<?= base_url ?>paciente/expediente&id=<?= $id ?>">Expediente</a></li>
                    <li class="breadcrumb-item active">Disposición al cambio</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Disposición al cambio</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">¿Quiénes integran su familia (con la que se tiene mayor
                            contacto)?</label>
                        <div class="form-group">
                            <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>

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
                <th></th>
                <th><p class="title-table-sust">5 Totalmente de acuerdo</p></th>
            </tr>
            </thead>
            <tbody>
            <form>
                <tr>
                    <td>
                        <p>
                            Los miembros de mi familia acostumbramos a hacer cosas juntos.
                        </p>
                    </td>
                    <td>

                        <div class="form-group">
                            <label for="inputStatus">Actualmente, ¿Qué tan importante es para usted </label>
                            <select id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Selecciona</option>
                                <option>5 Totalmente de acuerdo</option>
                                <option>4 De acuerdo</option>
                                <option>3 Neutral (ni de acuerdo, ni en desacuerdo)</option>
                                <option>2 En desacuerdo</option>
                                <option>1 Totalmente en desacuerdo</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Un pequeño problema (estoy preocupado al respecto, pero no he tenido ninguna consecuencia
                            negativa).
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="inputStatus">Actualmente, ¿Qué tan importante es para usted </label>
                            <select id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Selecciona</option>
                                <option>5 Totalmente de acuerdo</option>
                                <option>4 De acuerdo</option>
                                <option>3 Neutral (ni de acuerdo, ni en desacuerdo)</option>
                                <option>2 En desacuerdo</option>
                                <option>1 Totalmente en desacuerdo</option>
                            </select>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <p>
                            Un problema (he tenido algunas consecuencias negativas, pero ninguna que pueda considerarse
                            seria).
                        </p>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="inputStatus">Actualmente, ¿Qué tan importante es para usted </label>
                            <select id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Selecciona</option>
                                <option>5 Totalmente de acuerdo</option>
                                <option>4 De acuerdo</option>
                                <option>3 Neutral (ni de acuerdo, ni en desacuerdo)</option>
                                <option>2 En desacuerdo</option>
                                <option>1 Totalmente en desacuerdo</option>
                            </select>
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
                            <label for="inputStatus">Actualmente, ¿Qué tan importante es para usted </label>
                            <select id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Selecciona</option>
                                <option>5 Totalmente de acuerdo</option>
                                <option>4 De acuerdo</option>
                                <option>3 Neutral (ni de acuerdo, ni en desacuerdo)</option>
                                <option>2 En desacuerdo</option>
                                <option>1 Totalmente en desacuerdo</option>
                            </select>
                        </div>

                </tr>
            </form>
            </tbody>
        </table>

    </div>
</div>
<!-- /.content -->