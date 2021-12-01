<!-- comprueba si ya existe el objeto para poder editar -->
<?php $action = Utils::validate(isset($data) && is_object($data) ? $data : '') ?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-4">
            <h4>Registro de Usuario</h4>
        </div><!-- /.col -->
        <div class="col-sm-4">
            <button type="submit" form="rgUsuario" class="btn btn-light btn-xl pull-right w-35">
                <i class="fa fa-plus"></i>Guardar
            </button>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>usuario/registros">Registros</a>
                </li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<!-- /.container-forms-user -->
<div class="container-register-us">

    <div class="card card-light card-register-us">

        <form id="rgUsuario">
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control form-control-sm" id="nombre"
                           value="<?= isset($data) && is_object($data) ? $data->nombre_us : '' ?>">
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control form-control-sm" id="apellidos"
                           value="<?= isset($data) && is_object($data) ? $data->apellidos_us : '' ?>">
                </div>

                <div class="form-group">
                    <label for="rol">Rol de usuario</label>
                    <select class="form-control form-control-sm" id="rol">
                        <option value="<?= isset($data) && is_object($data) ? $data->rol : '' ?>" disabled
                                selected><?= isset($data) && is_object($data) ? $data->rol : 'Selecciona'; ?></option>
                        <option value="admin">Administrador</option>
                        <option value="ventas">Ventas</option>
                        <option value="doctor">Doctor</option>
                        <option value="psicologo">Psicólogo</option>
                        <option value="consultor">Consultor</option>
                        <option value="coordinador">Coordinador</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="rol">Unidad</label>
                    <select class="form-control form-control-sm" id="entidad">
                        <option value="<?= isset($data) && is_object($data) ? $data->nombre_entidad : '' ?>" disabled
                                selected><?= isset($data) && is_object($data) ? $data->nombre_entidad : 'Selecciona'; ?></option>
                        <?php while ($ent = $entidad->fetch_object()) : ?>
                            <option value="<?= $ent->id_entidad ?>">
                                <?= $ent->nombre_entidad ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control form-control-sm" id="email"
                           value="<?= isset($data) && is_object($data) ? $data->email_us : '' ?>">
                </div>

                <?php if (!isset($data)) : ?>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" minlength="6">
                    </div>
                <?php endif; ?>
            </div>

            <input type="hidden" value="<?= $action ?>" id="action">
            <input type="hidden" value="<?= $data->id_usuario ?>" id="usuario_id">
        </form>
    </div>

    <!-- change password -->
    <?php if (isset($data) && is_object($data)) : ?>
        <div class="card-register-us cd-sp">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Cambiar contraseña</h3>
                </div>
                <form method="post" id="userPass">
                    <legend></legend>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pass">Nueva contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="pass" placeholder="Password"
                                   minlength="6">
                        </div>
                        <div class="form-group">
                            <label for="newpass">Repetir nueva contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="newpass"
                                   placeholder="Password" minlength="6">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" id="idUser" value="<?= $data->id_usuario ?>">
                        <input type="submit" value="Guardar" class="btn btn-info btn-sm"/>
                    </div>
                </form>
            </div><!-- end change password -->

            <!-- Estado del usuario -->
            <div class="card card-light" id="card-body">
                <div class="card-header">
                    <h3 class="card-title">Estado del usuario</h3>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="status-user">
                                <label for="">
                                    <input type="text" name="" id="estado_us"
                                           value="<?= isset($data) && is_object($data) ? $data->estado_us : '' ?>">
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group clearfix">
                                    <div class="icheck-info d-inline">
                                        <input id="checkboxPrimary1" type="checkbox"
                                               data-v="<?= $data->id_usuario ?>" <?= isset($data) && $data->estado_us == 1 ? 'checked' : '' ?>>
                                        </label><label for="checkboxPrimary1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" id="idUser" value="<?= $data->id_usuario ?>">
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include "admin/layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/alerts.js"></script>
<script src="<?= base_url ?>assets/js/usuario/index.js"></script>
<script src="<?= base_url ?>admin/layout/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url ?>assets/js/paciente/expediente.js"></script>