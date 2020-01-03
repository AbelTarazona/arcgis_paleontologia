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
                    <h1 class="h2">Ficha Técnica</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="openRegister()">
                            Añadir
                            <span data-feather="plus"></span>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group" id="inscripcion-container">
                            <label for="nombre">Nombre del Patrimonio Paleontológico Inmueble</label>
                            <input type="text" class="form-control" id="txtNombre"
                                placeholder="Piedra Chamana Sector A, B y C">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label style="opacity: 0;">...</label>
                            <button type="button" class="btn btn-primary" onclick="searchPatrimonio()"
                                style="width: inherit; display: block;">Buscar</button>
                        </div>
                    </div>

                </div>



                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patrimonio</th>
                            <th>Clasificación</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="body_patrimoniotable">
                        <?php echo $patrimonios?>
                    </tbody>
                </table>




            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>


    <script>
        feather.replace()
    </script>

    <script src="<?php echo base_url(); ?>public/js/ficha_lista.js"></script>



</body>

</html>