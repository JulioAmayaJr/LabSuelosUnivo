<link href="../tools/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('css/methood.css') ?>">
<title>Document</title>


<div class="container">
    <div class="card shadow mb-4 mt-3 ">
        <div style="background-color: #0d6efd;" class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-white">Formula</h6>
        </div>
        <div class="card-body">



            <div class="row">
                <div class="col-sm-12">
                    <div style="" class="py-5 input-group-text ">

                    </div>
                </div>
            </div>
            <hr />
            <div class="row ">
                <div class="col-sm-12 ">
                    <div class="mb-1 mt-1 d-flex justify-content-center ">
                        <button type="button" class="btn btn-primary py-1  ">Bajar <i class="fa-solid fa-greater-than"></i></button>

                    </div>
                    <div class="mb-1  d-flex justify-content-center position-relative">
                        <button type="button" class="btn btn-primary py-1 "><i class="fa-solid fa-less-than"></i> Subir</button>
                        <button style="right: 0%;" type="button" class="btn btn-primary py-1 position-absolute top-0 end-0 p-3">Agregar Formula</button>
                    </div>

                </div>

            </div>
            <hr />
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3 input-group-sm ">
                            <input style="text-align: center;" type="text" id="inpu" class="form-control" value="" placeholder="Ingrese el nombre de la formula">
                        </div>
                        <div class="col-sm-12 mb-3 mt-1">
                            <input type="text" id="inpu" class="form-control input-group-text" value="">

                        </div>
                    </div>

                </div>

                <div class="col-sm-12">
                    <div class="row ">
                        <div class="col-sm-8">
                            <div style="background-color: #0d6efd;" class="card-header py-1 ">
                                <h6 class="m-0 font-weight-bold text-white">Listado de formulas</h6>
                            </div>
                            <div class="divF input-group-text">

                            </div>

                        </div>
                        <div class="col-sm-4 ">
                            <div>
                                <table>
                                    <tr>
                                        <td colspan="4">
                                            <div class="butt  input-group-text" id="result">0</button></div>
                                    </tr>
                                    <tr>
                                        
                                        <td><button class="butt">&#8730;</button></td>
                                        <td><button class="butt">AC</button></td>
                                        <td colspan="2"><button class="butt"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="31" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                                                    <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                                                    <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                                </svg></button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="butt">1</button></td>
                                        <td><button class="butt">2</button></td>
                                        <td><button class="butt">3</button></td>
                                        <td><button class="butt">+</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="butt">4</button></td>
                                        <td><button class="butt">5</button></td>
                                        <td><button class="butt">6</button></td>
                                        <td><button class="butt">-</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="butt">7</button></td>
                                        <td><button class="butt">8</button></td>
                                        <td><button class="butt">9</button></td>
                                        <td><button class="butt">x</button></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><button class="butt">0</button></td>
                                        <td colspan="1" ><button class="butt">.</button></td>
                                        <td colspan="1"><button class="butt">&#247; </button></td>
                                    </tr>
                                    <tr>
                                        
                                        
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>