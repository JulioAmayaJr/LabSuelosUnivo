<?php echo $this->extend("/template/layout"); ?>

<?php echo $this->section("content"); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-second-primary">
        <h6 class="m-0 font-weight-bold text-white">Lista de Clientes</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalData" id="btnNewCustom"><i class="fas fa-user-plus"></i> Nuevo Cliente </button>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id="tbdata" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th hidden>Id</th>
                            <th>Nombre</th>
                            <th>Tipo de cliente</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>DUI</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer): ?> 
                            <tr>
                                <td hidden><?= $customer["id_customer"]?></td>
                                <td><?= $customer["name_customer"] ?></td>
                                <?php foreach ($typecustomers as $type){
                                    if ($customer["id_type_customer"] == $type["id_type_customer"]){ ?>
                                        <td><?= $type["type_customer"] ?></td>
                                    <?php  break;
                                    }
                                } ?>
                                <td><?= $customer["email"] ?></td>
                                <td><?= $customer["cell_phone"] ?></td>
                                <td><?= $customer["number_dui"] ?></td>
                                <td class="options">
                                    <button data-toggle="modal" data-target="#modalData" id="btnEdit" data-id="<?= $customer["id_customer"] ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-button" id="btnDelete" data-nombre="<?= $customer["name_customer"] ?>" data-id="<?= $customer["id_customer"] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach;?>
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
                        <div class="form-group col-sm-4">
                            <label for="cboType">Tipo de cliente</label>
                            <select class="form-control form-control-sm input-validar" name="id_type" id="cboType">
                                <option selected disabled>-- Seleccione tipo de cliente --</option>
                                <?php foreach ($typecustomers as $type){ ?> 
                                    <option value="<?= $type["id_type_customer"] ?>"><?= $type["type_customer"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="txtNombre">Nombre completo</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtNombre" name="name">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="txtCorreo">Correo</label>
                            <input type="email" class="form-control form-control-sm input-validar" id="txtCorreo" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="txtTelefono">Telefono</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtTelefono" name="cell_phone">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="txtDepartment">Departamento</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtDepartment" name="department">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="txtMunicipality">Municipio</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtMunicipality" name="municipality">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 hide">
                            <label for="txtNIT">NIT</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtNIT" name="nit">
                        </div>
                        <div class="form-group col-sm-4 hide">
                            <label for="txtGiro">Giro</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtGiro" name="spin">
                        </div>
                        <div class="form-group col-sm-4 hide">
                            <label for="txtRazon">Razón social</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtRazon" name="social_reason">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-4">
                            <label for="txtDUI">DUI</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtDUI" name="dui">
                        </div>
                        <div class="form-group col-sm-4 hide">
                            <label for="txtNoRegistro" class="hide">No de registro NRC</label>
                            <input type="text" class="form-control form-control-sm input-validar" id="txtNoRegistro" name="no_nrc">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-8">
                            <label for="txtAddress">Direccion</label>
                            <textarea name="address" id="txtAddress" class="form-control form-control-sm input-validar" style="width: 100%; height: 100px; resize: none;"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="submit" id="btnSave">Guardar</button>
                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section("Scripts") ?>
<script src="js/customer/customer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php echo $this->endSection(); ?>