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

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-second-primary">
        <h6 class="m-0 font-weight-bold text-white">Lista de Usuarios</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <button class="btn btn-success" id="btnNewUser" data-toggle="modal" data-target="#modalData"><i class="fas fa-user-plus"></i> Nuevo Usuario</button>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id="tbdata" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th hidden>Id</th>
                            <th>Foto</th>
                            <th>Nombre Completo</th>
                            <th>Cargo</th>
                            <th>Fecha registro</th>
                            <th>Fecha Modificacion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td hidden><?= $user["id_user"] ?></td>
                                <td><img style="height:60px;" src="<?= base_url() ?>img/<?= $user["image"] ?>" /></td>
                                <td><?= $user["full_name"] ?></td>
                                <?php foreach ($roles as $rol) {
                                    if ($user["id_rol"] == $rol["id_rol"]) { ?>
                                        <td><?= $rol["name"] ?></td>
                                <?php break;
                                    }
                                } ?>
                                <td><?= $user["date_register"] ?></td>
                                <td><?= $user["modification_date"] ?></td>
                                <?php if ($user["status"] == 1) { ?>
                                    <td><span class="badge badge-info">Activo</span></td>
                                <?php } else { ?>
                                    <td><span class="badge badge-danger">Inactivo</span></td>
                                <?php } ?>
                                <td class="options">
                                    <button data-toggle="modal" data-target="#modalData" class="btn btn-primary btn-sm" id="btnEdit" data-id="<?= $user['id_user'] ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-button" data-nombre="<?= $user['full_name'] ?>" data-id="<?= $user['id_user'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!--  Modal-->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Detalle Usuario</h6>
                <button class="close" type="button" id="btnClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="text" hidden value="0" id="txtId">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="txtFullName">Nombre Completo</label>
                                <input type="text" class="form-control form-control-sm input-validar" id="txtFullName" name="name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="txtUserName">Usuario</label>
                                <input type="text" class="form-control form-control-sm input-validar" id="txtUserName" name="name" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="cboRol">Cargo</label>
                                <select class="form-control form-control-sm" id="cboRol" name="cboRol" required>
                                    <option selected disabled>-- Seleccione un cargo --</option>
                                    <?php foreach ($roles as $rol) { ?>
                                        <option value="<?= $rol['id_rol'] ?>"><?= $rol['name'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-6 _hidden" id="divStatus">
                                <label for="cboStatus">Estado</label>
                                <select class="form-control form-control-sm" id="cboStatus">
                                    <option value="1">Activo</option>
                                    <option value="0">No Activo</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="txtImage">Foto</label>
                                <input class="form-control-file" type="file" id="txtImage" name="image" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <img id="imgUser" style="max-width:200px;" src="https://images.unsplash.com/photo-1519648023493-d82b5f8d7b8a?w=300" class="rounded mx-auto d-block" alt="Foto usuario">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" id="btnSave">Guardar</button>
                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section("Scripts") ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="js/user/user.js"></script>
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
