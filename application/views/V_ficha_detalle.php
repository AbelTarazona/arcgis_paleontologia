<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paleontología</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .bg-darkuu {
            background-color: #d39e00 !important;
        }
    </style>
    <link href="<?php echo base_url(); ?>public/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/Madeleine.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER  -->
    <?php include 'header.php';?>

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR  -->
            <?php include 'sidebar.php';?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                

                <?php echo $data ?>

                <div class="card my-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Nombre del Patrimonio Paleontológico Inmueble</label>
                                    <input type="text" class="form-control" id="txtNombre"
                                        placeholder="Piedra Chamana Sector A, B y C">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Clasificación</label>
                                    <select class="form-control" id="selectClasificacion">
                                        <option value="">Seleccione una clasificación</option>
                                        <?php echo $combo_clasificacion ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Estado</label>
                                    <select class="form-control" id="selectEstado">
                                        <option value="">Seleccione un estado</option>
                                        <?php echo $combo_estado ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Descripción</label>
                                    <textarea class="form-control" rows="4" id="txtDescripcion"
                                        placeholder="Ingrese la descripción del Patrimonio Paleontológico"></textarea>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Estratigrafía</label>
                                    <input type="text" class="form-control" id="txtEstratigrafia"
                                        placeholder="Estratos geológicos del Eoceno">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">N° de Plano</label>
                                    <input type="text" class="form-control" id="txtNumPlano"
                                        placeholder="PP-117-MC_DGPA/DSFL-2017 WGS84a">
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

               




                <button type="button" class="btn btn-secondary" style="float: right;margin-bottom: 10px;"
                    onclick="back()">Regresar</button>




            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

    <script src="<?php echo base_url(); ?>public/lib/stats.js"></script>
    <script src="<?php echo base_url(); ?>public/lib/detector.js"></script>
    <script src="<?php echo base_url(); ?>public/lib/three.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/Madeleine.js"></script>


    <script>
        feather.replace()
    </script>

    <script src="<?php echo base_url(); ?>public/js/ficha.js"></script>

    <script>
        window.onload = function () {

            getUbigeo();

            /*
            madeleine = new Madeleine({
                target: 'target', // target div id
                data: '<?php echo base_url(); ?>public/samples/octocat.stl', // data path
                path: '<?php echo base_url(); ?>public'  // path to source directory from current html file
            });*/

            Lily.ready({
                target: 'target',  // target div id
                file: 'files',  // file input id
                path: '<?php echo base_url(); ?>public'  // path to source directory from current html file


            });


        }; 
    </script>


</body>

</html>