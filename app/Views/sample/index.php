<?php echo $this->extend("/template/layout"); ?>
<?php echo $this->section("css"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('css/mostrar-muestras.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">

<?php echo $this->endSection(); ?>
<?php echo $this->section("content"); ?>

<div class="container ">
    <h1 class="titulo">Muestras</h1>

    <div class="position-relative m-5 ">


        <div class="position-relative">
            <input class="d-inline p-3 form-control w-25  inline-block custom-mr " type="text" placeholder="Nombre de la muestra">
            <input class="d-inline p-3 form-control w-25  inline-block " type="text" placeholder="Norma">
        </div>

    </div>

    <div class="subContainer">
        <div class="mb-4">
            <div class="first d-flex position-relative">
                <label class="d-inline ">Campos</label>
                <button class="position-absolute bottom-0 end-0 btn btn-rounded btn-custom" id="addField">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 4.5a.5.5 0 0 1 .5.5V8h2.5a.5.5 0 0 1 0 1H8v2.5a.5.5 0 0 1-1 0V9H4.5a.5.5 0 0 1 0-1H7V4.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </button>




            </div>

            <div class=" container add  ">
                <div class="flowbite" id="badgeContainer">

                </div>

            </div>

        </div>


        <div id="divFields" class="overlay shadow-lg rounded d-block align-items-center d-none">
            <label class=" mb-3" for="">Nombre del campo</label>
            <input class=" mb-3 form-control" id="fieldValue" type="text">
            <label class=" mb-3" for="">Tipo del campo</label>
            <input class=" mb-3 form-control" type="text">
            <div class="d-grid  col-6 mx-auto">
                <button class="btn btn-secondary" id="addBadgeButton" type="button">Agregar</button>

            </div>
        </div>



        <div class="mb-3">

            <div class="first d-flex position-relative">

                <label class="d-inline">Formulas</label>
                <button class="position-absolute bottom-0 end-0" id="btnAddMethod">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 4.5a.5.5 0 0 1 .5.5V8h2.5a.5.5 0 0 1 0 1H8v2.5a.5.5 0 0 1-1 0V9H4.5a.5.5 0 0 1 0-1H7V4.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </button>



            </div>
            <div class=" container add  ">
                <div class="flowbite">



                </div>
            </div>

            <div class="overlay shadow-lg rounded d-block align-items-center d-none" id="divMethod">
                <label class=" mb-3" for="">Nombre de la formula</label>
                <input class=" mb-3 form-control" type="text">
                <label class=" mb-3" for="">Formula</label>
                <div class="flowbite container add mb-3 ">
                    <select name="countries" id="countries" multiple>
                        <option value="1">Afghanistan</option>
                        <option value="2">Australia</option>
                        <option value="3">Germany</option>
                        <option value="4">Canada</option>
                        <option value="5">Russia</option>
                    </select>


                </div>
                <div class=" d-grid  col-6 mx-auto">
                    <button class="tam btn btn-secondary" type="button">Agregar</button>
                </div>
            </div>

        </div>

        <div class="mx-auto">
            <button class="tam btn btn-primary " id="btnAddSample" type="button">Enviar</button>

        </div>
    </div>

</div>

<?php echo $this->endSection(); ?>
<?php echo $this->section("Scripts"); ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script src="js/sample/addSample.js"></script>

<?php echo $this->endSection(); ?>