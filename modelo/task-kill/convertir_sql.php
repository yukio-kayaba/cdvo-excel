<?php
    require_once("../modelo_sql.php");
    require_once("../configuracion.php");
    if(isset($_POST['datos'])){
        $conexion = new Modelo(user,bd_date,password);
        $datos = json_decode($_POST['datos']);
        $titulo = $_POST['titulo'];
        $opcion = $_POST['opcion'];
        $datos_inicio = $datos[0];
        $codigo_parametro = "";


        // verificando si la tabla existe;
        $validador = $conexion->get_tabla_colum("SELECT id FROM $titulo WHERE id = 0;");

        if($validador > 0){
            echo "el archivo si existe";
            if($opcion == 1){
                echo "NO SE PUDO CREAR , LA TABLA YA EXISTE";
                return;
            }else{
                
            }
        }


        foreach ($datos[0] as $key => $value) {
            $codigo_parametro .= "`".$value."`,";
        }
        $codigo_parametro = substr($codigo_parametro,0,-1);
        // print_r($datos);
        foreach ($datos as $key => $value) {
            if($key == 0){
                print("creando  tabla");
                // $valor = $conexion->crear_tabla($titulo,$value);
                $valor = 1;
                if($valor != 1){
                    echo "error al crear el archivo";
                }else{
                    echo "tabla creado con exito";
                }
            }else{
                // print_r($value);
                $conexion->agregar_valores($titulo,$value,$codigo_parametro);
            }
        }
    }
?>
