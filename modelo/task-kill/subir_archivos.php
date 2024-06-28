<?php
    require "../../vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
    if(!isset($_FILES['archivo_excel'])){
        print("no existe");
    }else{
        // print("si existe");
        if ($_FILES['archivo_excel']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['archivo_excel']['tmp_name'])) {
            $archivo_temporal = $_FILES['archivo_excel']['tmp_name'];
            $nombre_archivo = $_FILES['archivo_excel']['name'];
            $directorio_destino = '../archivos/';
            $ruta_final = $directorio_destino . $nombre_archivo;
            // $spreadsheet = IOFactory::load($archivoTemporal);
            
            if(move_uploaded_file($archivo_temporal,$ruta_final)){
                $spreadsheet = IOFactory::load($ruta_final);
                $sheet = $spreadsheet->getActiveSheet();
                $archivo_csv = fopen($ruta_final,"w");
                $array_total = array();
                foreach ($sheet->getRowIterator() as $row) {
                    $rowData = array();
                    foreach ($row->getCellIterator() as $cell) {
                        if($cell->getValue() != ""){
                            $rowData[] = $cell->getValue();
                        }
                    }
                    if(!empty($rowData)){
                        array_push($array_total,$rowData);
                    }
                }
                if(unlink($ruta_final)){
                    print_r(json_encode($array_total));
                }
            }else{
                echo "error al subir el archivo";
            }
    
    
        } else {
            echo "Error al subir el archivo.";
        }
    }
?>
