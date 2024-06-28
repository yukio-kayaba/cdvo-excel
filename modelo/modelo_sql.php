<?php
    class Modelo{
        private $sql;
        private $dbdatos;
        private $condicion;

        public function __construct($usuario,$base_datos,$password)
        {
            $this->dbdatos = new PDO("mysql:host=localhost;dbname=$base_datos",$usuario,$password);
        }
        public function crear_tabla($titulo,$datos){
            try {
                $datos_1 = "CREATE TABLE $titulo(`id` INT NOT NULL AUTO_INCREMENT,";
                $codigo_valores = "";
                $codigo_parametros = "";
                foreach ($datos as $key => $value){
                    $datos_1 .= "`$value` VARCHAR(345) NULL,";
                    $codigo_valores .= "`".$value."`,";
                    $codigo_parametros .= "'".$value."',";
                }
                $datos_1 .= "PRIMARY KEY (`id`));";
                // $this->sql = "CREATE TABLE $titulo(`id` INT NOT NULL AUTO_INCREMENT,PRIMARY KEY (`id`));";
                $this->sql = $datos_1;
                $this->ejecutar();
// INSERT INTO `ficheros`.`archivo_excel` (`time`, `carrera`, `acepta`, `positivo`, `negativo`, `edad`, `sexo`, `trabajo`) VALUES ('time', 'carrera', 'acepta', 'positivo', 'negativo', 'edad', 'sexo', 'trabajo');
                $codigo_valores = substr($codigo_valores,0,-1);
                $codigo_parametros = substr($codigo_parametros,0,-1);

                $this->sql = "INSERT INTO $titulo ($codigo_valores) VALUES ($codigo_parametros);";
                $this->ejecutar();
                return 1;
            } catch (PDOException $e) {
                return $e;
            }
        }
        public function ejecutar(){
            $resultado = $this->dbdatos->prepare($this->sql);
            $resultado->execute();
            $resultado->closeCursor();
            // return $datos;
        }
        public function verificar_conexion(){

        }
        public function agregar_valores($tabla,$datos,$parametros){
            $codigo_parametros = "";
            foreach ($datos as $key => $value) {
                $codigo_parametros .= "'".$value."',";
            }
            $codigo_parametros = substr($codigo_parametros,0,-1);
            // $codigo_valores = substr($parametros,0,-1);
            $this->sql = "INSERT INTO $tabla($parametros) VALUES ($codigo_parametros)";
            print_r($this->sql);
            // $this->ejecutar();
        }
        public function get_tabla_colum($consulta){
            $this->sql = $consulta;
            $resultado = $this->dbdatos->prepare($this->sql);
            $resultado->execute();
            return $resultado->fetchAll(PDO::FETCH_COLUMN);
        }
        public function validador_cuenta($dni,$contra){
            $this->sql = "select validador_cuenta('$dni', '$contra');";
            $resultado = $this->dbdatos->prepare($this->sql);
            $resultado->execute();
            return $resultado->fetchAll(PDO::FETCH_COLUMN);
        }
    }
?>