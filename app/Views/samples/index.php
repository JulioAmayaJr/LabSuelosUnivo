<?php echo $this->extend("/template/layout"); ?>
<?php echo $this->section("css"); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<?php echo $this->endSection(); ?>
<?php echo $this->section("content") ?>


<style>
    .linea {
        width: 100%;
        border-bottom: 0.1px solid rgb(218, 220, 215);
        margin-bottom: 10px;
        margin-top: 10px;

    }

    .a {

        height: 1em;
    }
</style>


<div class="card shadow mb-4">

    <div class="card-header py-3 bg-second-primary">
        <h6 class="m-0 font-weight-bold text-white">Agregar Muestras</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3  d-flex">

                <div class="dropdown  d-inline-block m-2">

                    <select style="overflow: hidden;" class="btn btn-success dropdown-toggle " name="" id="selectSample">

                        <?php foreach ($sample as $samples) { ?>

                            <option style="background-color: white;" class="dropdown-item" value="<?= $samples["id_sample"] ?>"><?= $samples["name"] ?></option>

                        <?php } ?>


                    </select>
                </div>

                <div class="dropdown d-inline-block m-2">

                    <select style="overflow: hidden;" class="btn btn-success dropdown-toggle " name="" id="selectProject">

                        <?php foreach ($project as $projects) { ?>
                            <option style="background-color: white; color:black" value="<?= $projects["id_project"] ?>">
                                <?= $projects["codigo"] ?> - <?= $projects["name"] ?>
                            </option>

                        <?php } ?>


                    </select>
                </div>



            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12 ">

                <div id="input-container" class="row ">

                </div>
            </div>
            <div class="linea"></div>
            <div class="col-sm-12 text-right">
                <button id="btnSaveSample" class="btn bg-info text-white" type="buttom"> Enviar <i class="fa-solid fa-arrow-right"></i></button>

            </div>
        </div>
    </div>
</div>












<?php echo $this->endSection(); ?>
<?php echo $this->section("Scripts") ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="js/samples/createSample.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>



<?php echo $this->endSection(); ?>