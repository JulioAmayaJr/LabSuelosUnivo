<?php echo $this->extend("/template/layout"); ?>
<?php echo $this->section("css"); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<style>
    ._hidden {
        display: none;
    }

    .toastify {
        background: linear-gradient(to right, #ff6e6e, #ffa2a2);
        color: #fff;
        border-radius: 8px;
    }

    .toastify__toast {
        font-weight: bold;
    }
</style>
<?php echo $this->endSection() ?>
<?php echo $this->section("content"); ?>

<div class="row">
    <div class="col-sm-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-second-primary">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user"></i> Mis Datos</h6>
            </div>
            <div class="card-body">
                
                <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <img id="imgFoto" src="https://images.unsplash.com/photo-1519648023493-d82b5f8d7b8a?w=300" class="rounded mx-auto d-block" style="width: 200px; height: 200px;">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="txtNombre">Nombre</label>
                                    <input type="hidden" value="<?= $user["id_user"] ?>" id="txtId">
                                    <input type="text" class="form-control form-control-sm" disabled id="txtNombre" value="<?= $user["full_name"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="txtCorreo">Correo</label>
                                    <input type="email" class="form-control form-control-sm" id="txtEmail" value="<?= $user["email"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="txTelefono">Telefono</label>
                                    <input type="text" class="form-control form-control-sm" id="txtPhone" value="<?= $user["phone"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="txtRol">Rol</label>
                                    <?php foreach($roles as $rol){
                                        if($user["id_rol"] == $rol["id_rol"]) { ?>
                                    <input type="text" class="form-control form-control-sm" id="txtRol" disabled value="<?= $rol["name"] ?>">
                                    <?php break;
                                        }
                                    } ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-success btn-sm btn-block" id="btnGuardarCambios">Guardar Cambios</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-sm-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-second-primary">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-key"></i> Cambiar Contraseña</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="txtClaveActual">Contraseña Actual</label>
                            <input type="password" class="form-control form-control-sm input-validar" id="txtClaveActual" name="Clave Actual">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="txtClaveNueva">Nueva Contraseña</label>
                            <input type="password" class="form-control form-control-sm input-validar" id="txtClaveNueva" name="Clave Nueva">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="txtConfirmarClave">Confirmar Contraseña</label>
                            <input type="password" class="form-control form-control-sm input-validar" id="txtConfirmarClave" name="Confirmar Clave">
                            <p id="succed"></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm btn-block" id="btnCambiarClave">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section("Scripts") ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="js/profile/profile.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#tbdata').DataTable({
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>
<?php echo $this->endSection();
