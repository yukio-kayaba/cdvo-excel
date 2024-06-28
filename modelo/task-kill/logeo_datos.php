<?php
    require_once("../modelo_sql.php");
    require_once("../configuracion.php");

    if(isset($_POST['dni'])){
        $conexion = new Modelo(user,bd_date,password);
        $dni = $_POST['dni'];
        $contra = $_POST['contrasenia'];
        $resultado = $conexion->validador_cuenta($dni,$contra);
        if($resultado > 0){
            session_start();
            $_SESSION['id_user'] = $resultado[0];
            print_r(decbin($resultado[0]));
        }else{
            print(-1);
        }
    }else{
        print(-1);
    }
?>