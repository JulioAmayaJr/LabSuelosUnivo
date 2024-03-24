<?php echo $this->extend("/template/layout"); ?>

<?php echo $this->section("content"); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-second-primary">
        <h6 class="m-0 font-weight-bold text-white">Lista de Clientes</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalData"><i class="fas fa-user-plus"></i> Nuevo Cliente </button>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id="tbdata" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img style="height:60px ;" src="https://images.unsplash.com/photo-1519648023493-d82b5f8d7b8a?w=300" class="rounded mx-auto d-block" /></td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td><span class="badge badge-info">Activo</span></td>
                            <td>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img style="height:60px ;" src="https://images.unsplash.com/photo-1519648023493-d82b5f8d7b8a?w=300" class="rounded mx-auto d-block" /></td>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td><span class="badge badge-danger">No Activo</span></td>
                            <td>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
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
                <h6>Detalle cliente</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" value="0" id="txtId">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="txtNombre">Nombre</label>
                                    <input type="text" class="form-control form-control-sm input-validar" id="txtNombre" name="Nombre">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtCorreo">Correo</label>
                                    <input type="email" class="form-control form-control-sm input-validar" id="txtCorreo" name="Correo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="txtTelefono">Telefono</label>
                                    <input type="text" class="form-control form-control-sm input-validar" id="txtTelefono" name="Telefono">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="cboRol">Rol</label>
                                    <select class="form-control form-control-sm" id="cboRol">
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="cboEstado">Estado</label>
                                    <select class="form-control form-control-sm" id="cboEstado">
                                        <option value="1">Activo</option>
                                        <option value="0">No Activo</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtFoto">Foto</label>
                                    <input class="form-control-file" type="file" id="txtFoto" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <img id="imgUsuario" style="max-width:200px;" src="https://images.unsplash.com/photo-1519648023493-d82b5f8d7b8a?w=300" class="rounded mx-auto d-block" alt="Foto usuario">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="button" id="btnGuardar">Guardar</button>
                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section("Scripts") ?>
<script src="js/customer/customer.js"></script>
<?php echo $this->endSection(); ?>