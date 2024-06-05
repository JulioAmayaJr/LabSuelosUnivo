<?php echo $this->extend("/template/layout"); ?>

<?php echo $this->section("css"); ?>
<link rel="stylesheet" href="css/sample.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<style>
    ._hidden {
        display: none;
    }



    .js-example-basic-multiple {
        width: 250px;
    }

    .linea {
        width: 100%;
        border-bottom: 0.1px solid rgb(218, 220, 215);
        margin-bottom: 10px;
        margin-top: 10px;

    }

    .pad {}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php echo $this->endSection() ?>


<?php echo $this->section("content"); ?>
<input type="text" id="idUser" hidden value="<?= session("user")["id_user"] ?>">
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-second-primary">
        <h6 class="m-0 font-weight-bold text-white">Agregar Muestra</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <select class="form-select" id="cboGroupSample">
                    <option selected disabled>-- Seleccione una rama --</option>
                    <?php foreach ($groupSample as $gs) { ?>
                        <option value="<?= $gs['id_group_sample'] ?>"><?= $gs['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-3">
                <input id="nameSample" class="form-control" type="text" placeholder="Nombre De La Muestra">
            </div>
            <div class="col-sm-2">
                <input id="nameRule" class="form-control" type="text" placeholder="Norma">
            </div>

            <div class="col-sm-4 text-right ">
                <button class="btn btn-success " id="btnNewProject" data-toggle="modal" data-target="#modalData"><i class="fa-solid fa-folder-plus"></i> Agregar Campos</button>
            </div>
        </div>
        <hr />
        <div class="row ">
            <div id="badgeContainer" class="este  col-sm-12">
              
              

            </div>
            <div class="linea"></div>

            <div class="col-sm-12 text-right">
                <a id="btnAddSample" class="btn bg-info text-white" type="buttom"> Siguiente <i class="fa-solid fa-arrow-right"></i></a>

            </div>
        </div>
    </div>
</div>



<!--  Modal-->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button class="close" type="button" id="btnClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="text" hidden value="0" id="txtId">
                <div class="container">

                    <p>Nombre Del Campo</p>
                    <input class="form-control" id="fieldValue" type="text">
                    <p>Tipo Del Campo</p>
                    <select name="" id="typeField" class="form-select">
                        <option value="0" selected disabled>-- Seleccione --</option>
                        <option value="Text">Texto</option>
                        <option value="Number">Numero</option>
                    </select>
                    <!--Campo antiguo de captura de tipo de dato. Oculto-->
                    <input class="form-control" id="" type="text" hidden>
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
<script src="js/sample/addSample.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   
</script>
<?php echo $this->endSection(); ?>