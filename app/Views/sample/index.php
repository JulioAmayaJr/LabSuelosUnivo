<?php echo $this->extend("/template/layout"); ?>
<?php echo $this->section("css"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('css/mostrar-muestras.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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



            </div>

            <div class=" container add  ">
                <div class="flowbite">
                    <span class="badge bg-primary mb-3 me-2">
                        Default
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </span>
                    <span class="badge bg-dark mb-3 me-2">
                        Dark
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </span>
                </div>

            </div>

        </div>


        <div class="overlay shadow-lg rounded d-block align-items-center d-none">
            <label class=" mb-3" for="">Nombre del campo</label>
            <input class=" mb-3 form-control" type="text">
            <label class=" mb-3" for="">Tipo del campo</label>
            <input class=" mb-3 form-control" type="text">
            <div class="d-grid  col-6 mx-auto">
                <button class="btn btn-secondary" type="button">Agregar</button>

            </div>
        </div>



        <div class="mb-3">

            <div class="first d-flex position-relative">
                <label class="d-inline ">Formulas</label>


            </div>
            <div class=" container add  ">
                <div class="flowbite">

                    <span class="badge bg-primary mb-3 me-2">
                        Default
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </span>
                    <span class="badge bg-dark mb-3 me-2">
                        Dark
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </span>

                </div>
            </div>

            <div class="overlay shadow-lg rounded d-block align-items-center d-none  ">
                <label class=" mb-3" for="">Nombre de la formula</label>
                <input class=" mb-3 form-control" type="text">

                <div class="flowbite container add mb-3 ">

                    <span id="badge-dismiss-dark" class="tam mb-3 inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-gray-800 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                        Dark
                        <button type="button" class="inline-flex items-center p-1 ms-2 text-sm text-gray-400 bg-transparent rounded-sm hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-gray-300" data-dismiss-target="#badge-dismiss-dark" aria-label="Remove">
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Remove badge</span>
                        </button>
                    </span>
                    <span id="badge-dismiss-dark" class="tam mb-3 inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-gray-800 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                        Dark
                        <button type="button" class="inline-flex items-center p-1 ms-2 text-sm text-gray-400 bg-transparent rounded-sm hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-gray-300" data-dismiss-target="#badge-dismiss-dark" aria-label="Remove">
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Remove badge</span>
                        </button>
                    </span>


                </div>
                <div class=" d-grid  col-6 mx-auto">
                    <button class="tam btn btn-secondary" type="button">Agregar</button>

                </div>
            </div>

        </div>

        <div class="mx-auto">
            <button class="tam btn btn-primary " type="button">Enviar</button>

        </div>
    </div>

</div>

<?php echo $this->endSection(); ?>