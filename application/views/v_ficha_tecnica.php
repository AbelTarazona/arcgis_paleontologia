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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Registro de Ficha Técnica</h1>
                </div>

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

                <div class="card my-4">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <h4>Ubicación</h4>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Descripción</label>
                                    <textarea class="form-control" rows="2" id="txtDescripcionUbicacion"
                                        placeholder="Se localiza a 87 km al noroeste de la capital provincial de Cajamarca, a 91.8 km al noreste de la capital provincial de Chiclayo y 11.8 km al noroeste del distrito de Santa Cruz de Succhabamba.V."></textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Departamento</label>
                                    <select class="form-control" id="selectDepartamento" onchange="getProvincia()">
                                        <option value="">Seleccione un departamento</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Provincia</label>
                                    <select class="form-control" id="selectProvincia" onchange="getDistrito()">
                                        <option value="">Seleccione una provincia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Distrito</label>
                                    <select class="form-control" id="selectDistrito">
                                        <option value="">Seleccione un distrito</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">DATUM</label>
                                    <input type="text" class="form-control" placeholder="WGS84" id="txtDATUM">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Proyección</label>
                                    <input type="text" class="form-control" placeholder="UTM" id="txtProyeccion">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Sistema de Coordenadas</label>
                                    <input type="text" class="form-control" placeholder="UTM"
                                        id="txtSistemaCoordenadas">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Zona UTM</label>
                                    <input type="text" class="form-control" placeholder="Zona 17 Sur" id="txtZonaUTM">
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Carta Nacional</label>
                                    <input type="text" id="txtCartaNacional" class="form-control"
                                        placeholder="Ingresar carta nacional">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Altitud</label>
                                    <input id="txtAltitud" type="text" class="form-control"
                                        placeholder="2550.00 m.s.n.m.">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">


                                    <h5>Coordenada UTM de referencia</h5>
                                    <small id="emailHelp" class="form-text text-muted">Creación de sectores e
                                        hitos.</small>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Sector</label>
                                    <input type="text" class="form-control" id="sectorID" placeholder="A">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label style="opacity: 0;">...</label>
                                    <button type="button" class="btn btn-primary" onclick="addSector()"
                                        style="width: inherit; display: block;">Agregar</button>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Descripción</label>
                                    <textarea class="form-control" rows="3" id="sectorDescripcionID"
                                        placeholder="Ingrese descripción de sector"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div id="sectoresContainer" style="padding: 5px;"></div>
                            </div>



                        </div>

                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Antecedentes</label>
                                    <textarea class="form-control" rows="4" id="txtAntecedentes"
                                        placeholder="Ingrese antecedentes del Patrimonio Paleontológico"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Afectaciones</label>
                                    <textarea class="form-control" rows="4" id="txtAfectaciones"
                                        placeholder="Ingrese afectaciones del Patrimonio Paleontológico"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Observaciones</label>
                                    <textarea class="form-control" rows="4" id="txtObservaciones"
                                        placeholder="Ingrese observaciones del Patrimonio Paleontológico"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group" id="inscripcion-container">
                                    <label for="nombre">Croquis</label>
                                    <input type="text" class="form-control" id="txtCroquis"
                                        placeholder="Ingrese croquis del Patrimonio Paleontológico">
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Importancia</label>
                                    <textarea class="form-control" rows="4" id="txtImportancia"
                                        placeholder="Ingrese importancia del Patrimonio Paleontológico"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Valor</label>
                                    <textarea class="form-control" rows="4" id="txtValor"
                                        placeholder="Ingrese valor del Patrimonio Paleontológico"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="selectTipoDoc">Significado</label>
                                    <textarea class="form-control" rows="4" id="txtSignificado"
                                        placeholder="Ingrese significado del Patrimonio Paleontológico"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="col-12">
                                    <h4>Modelo 3D</h4>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" id="files" name="files" multiple>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div id="target" class="madeleine" style="width: 10px;!important"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12">
                                    <h4>Imágenes</h4>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input id="addFileExtra" type="file" name="fileImagen" class="custom-file"
                                            multiple>
                                    </div>
                                </div>

                                <!--<div class="col-12">
                                    <img src="" height="200" alt="Vista previa de la imagen...">
                                </div>-->
                            </div>






                        </div>
                    </div>
                </div>




                <button type="button" class="btn btn-success" style="float: right;margin-bottom: 10px;"
                    onclick="save()">Guardar</button>




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