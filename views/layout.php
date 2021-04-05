<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="views/static/img/h.png">
    <title>Oficialía Mayor</title>
    <!-- Axios -->
    <script src="views\static\axios\axios.js"></script>
    <!-- bootstrap-5.0.0-beta2-dist -->
    <link rel="stylesheet" href="views\static\bootstrap\css\bootstrap.css">
    <script src="views\static\bootstrap\js\bootstrap.js"></script>
    <!-- Bootswatch LUX -->
    <link rel="stylesheet" href="views\static\bootswatch\bootswatch-lux.css">
    <!-- fontawesome-free-5.14.0-web -->
    <link rel="stylesheet" href="views\static\fontawesome\css\all.css">
    <script src="views\static\fontawesome\js\all.js"></script>
    <!-- AlertifyJS 1.13.1 -->
    <link rel="stylesheet" href="views\static\alertifyjs\css\alertify.css">
    <link rel="stylesheet" href="views\static\alertifyjs\css\themes\default.css">
    <script src="views\static\alertifyjs\js\alertify.js"></script>
    <!-- jQuery -->
    <script src="views\static\jquery-3.5.1.min.js"></script>
    <!-- DataTables-1.10.24 
    <link rel="stylesheet" href="views\static\datatables\datatables.min.css">-->
    <script src="views\static\datatables\datatables.min.js"></script>
    <link rel="stylesheet" href="views\static\datatables\DataTables-1.10.24\css\dataTables.bootstrap4.min.css">
    <script src="views\static\datatables\DataTables-1.10.24\js\dataTables.bootstrap4.min.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        * {
            font-family: "Open Sans", sans-serif !important;
            font-weight: normal !important;
        }
    </style>
</head>

<body>
    <?php
    require_once "./controllers/viewsController.php";

    $viewsController = new viewsController();
    $vistas = $viewsController->obtenerVistasControlador();

    $vistas != "" ? require_once $vistas : require_once "./views/templates/welcome.php";
    ?>
</body>

</html>