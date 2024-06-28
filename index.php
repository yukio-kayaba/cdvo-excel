<?php
    require_once("./controlador/principal.php");
    require "vendor/autoload.php";
    session_start();

    if(isset($_GET['vista'])){
        print_r($_GET['vista']);

        if(method_exists("ModeloControlador",$_GET['vista'])){
            ModeloControlador::{$_GET["vista"]}();
        }else{
            ModeloControlador::error_pagina();
        }
    }else{
        ModeloControlador::inicio();
    }
?>