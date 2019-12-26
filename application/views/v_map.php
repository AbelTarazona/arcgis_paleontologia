<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paleontología</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://js.arcgis.com/3.22/dijit/themes/claro/claro.css">
    <link rel="stylesheet" href="https://js.arcgis.com/3.22/esri/css/esri.css">

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



        #map {
            width: 100%;
            position: absolute;
            height: 100vh;
        }

        .dj_ie .infowindow .window .top .right .user .content {
            position: center;
        }

        .dj_ie .simpleInfoWindow .content {
            position: center;
        }


        .templatePicker {
            border: none;
        }
    </style>
    <link href="<?php echo base_url(); ?>public/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER  -->
    <?php include 'header.php';?>

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR  -->
            <?php include 'sidebar.php';?>



            <main role="main" class="col-md-12 ml-sm-auto col-lg-12">
                <div class="claro" style="width: 100%; height: 100%;">
                    <div id="map"></div>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://js.arcgis.com/3.22/"></script>
    <script src="<?php echo base_url(); ?>public/js/map.js"></script>

    <script>
        /* globals Chart:false, feather:false */

        (function () {
            'use strict'

            feather.replace()

        }())
    </script>

</body>

</html>