<?php
    class ModeloControlador{
        public function __construct()
        {
            
        }


        static function inicio(){
            require_once("./vista/contenido/principal.php");
        }
        static function error_pagina(){
            
        }
        static function login(){
            require_once("./vista/contenido/login.php");
        }
    }
?>