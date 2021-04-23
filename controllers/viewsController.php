<?php
require_once "./models/viewsModel.php";

class viewsController extends viewsModel
{
    public function obtenerPlantillaControlador()
    {
        return require_once "./views/layout.php";
    }

    public function obtenerVistasControlador()
    {
        if (isset($_GET['views'])) {
            $ruta = explode("/", $_GET['views']);
            $respuesta = viewsModel::obtenerVistasModelo($ruta[0]);
        } else {
            $respuesta = "";
        }
        return $respuesta;
    }
}

# by Alejandro Ríos - RiversHIRSCH