<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/method.css') ?>">
    <title>Document</title>
    <link href="../tools/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="dpone ">
                <div class="content">

                </div>
            </div>
            <div class="dptwo ">
                <div class="content">
                    <div class="button-container">
                        <button class="btn btn-square">Bajar <i class="fa-solid fa-greater-than"></i></button>
                        <button class="btn btn-square"> <i class="fa-solid fa-less-than"></i> Subir</button>
                        <button class="btn btn-square btn-bottom-right"> Agregar Formula</button>
                    </div>
                </div>
            </div>


            <div class="dpth ">
                <div class="content">
                    <div>
                        <input style=" text-align:center; width: 30%;margin-right: 810px; " type="text" placeholder="Ingrese Nombre De La Formula">
                    </div>
                    <div>
                        <input class="inp" type="text">
                    </div>


                    <div class="calculadora ">
                        <div class="row">
                            <div class="a col-8">
                                <div class="aa">
                                    <label for="">Listado De Formulas</label>
                                    <div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class=" b col-4">
                                <div class="bb">

                                    <div class="display">0</div>
                                    <div class="buttons">

                                        <button></button>
                                        <button>x^2</button>
                                        <button>CE</button>
                                        <button class="operator"><-</button>

                                                <button>7</button>
                                                <button>8</button>
                                                <button>9</button>
                                                <button class="operator">/</button>

                                                <button>4</button>
                                                <button>5</button>
                                                <button>6</button>
                                                <button class="operator">*</button>

                                                <button>1</button>
                                                <button>2</button>
                                                <button>3</button>
                                                <button class="operator">-</button>

                                                <button></button>
                                                <button>0</button>
                                                <button>.</button>
                                                <button class="operator">+</button>

                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>


                    </div>

                   

                </div>
                
            </div>
            <button style="margin-top: 23px;width: 10%;margin-left: 90%;border-radius: 5px 5px;">Siguiente</button>
        </div>
       
    </div>
</body>

</html>