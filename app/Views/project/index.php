<?php echo $this->extend("/template/layout"); ?>
<?php echo $this->section("css"); ?>
<style>
    ._hidden {
        display: none;
    }

    #map {
        height: 250px;
        width: 100%;
    }

    .js-example-basic-multiple {
        width: 250px;
    }
</style>
<?php echo $this->endSection() ?>
<?php echo $this->section("content"); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-second-primary">
        <h6 class="m-0 font-weight-bold text-white">Lista de Projectos</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <button class="btn btn-success" id="btnNewProject" data-toggle="modal" data-target="#modalData"><i class="fa-solid fa-folder-plus"></i> Nuevo Proyecto</button>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id="tbdata" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th hidden>id_project</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Cliente</th>
                            <th>Fecha Registro</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($projects as $project) : ?>
                            <tr>
                                <td hidden><?= $project["id_project"] ?></td>
                                <td><?= $project["codigo"] ?></td>
                                <td><?= $project["name"] ?></td>
                                <td><?= $project["id_customer"] ?></td>
                                <td><?= $project["date_register"] ?></td>
                                <?php foreach ($users as $user) :
                                    if ($project["id_user"] == $user["id_user"]) {
                                ?>

                                        <td> <?= $user["full_name"] ?> </td>
                                <?php }
                                endforeach; ?>
                                <?php if ($project["status"] == 1) { ?>
                                    <td><span class="badge badge-info">Activo</span></td>
                                <?php } else { ?>
                                    <td><span class="badge badge-danger">Inactivo</span></td>
                                <?php } ?>
                                <td class="options">
                                    <button data-toggle="modal" data-target="#modalData" class="btn btn-primary btn-sm" id="btnEdit" data-id="<?= $project['id_project'] ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-button" data-nombre="<?= $project['name'] ?>" data-id="<?= $project['id_project'] ?>">
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
                <h6>Detalle Proyecto</h6>
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
                                <label for="txtName">Nombre</label>
                                <input type="text" class="form-control form-control-sm input-validar" id="txtName" name="name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="cboCustomer">Cliente</label>
                                <select class="js-example-basic-multiple" name="states[]" multiple="multiple" id="cboCustomer" name="cboCustomer" required>
                                    <?php foreach ($clients as $client) { ?>
                                        <option value="<?= $client['id_customer'] ?>"><?= $client['name_customer'] ?></option>
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="txtImage">Lactitud</label>
                                <input class="form-control" type="text" id="txtLactitud" name="lactitud" required />
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="txtImage">Longitud</label>
                                <input class="form-control" type="text" id="txtLongitud" name="longitud" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" id="map">

                        </div>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap" async></script>
<script src="js/project/project.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<?php echo $this->endSection(); ?>