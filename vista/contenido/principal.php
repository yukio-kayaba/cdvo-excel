<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDVO - EXCEL</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <script src="./vista/js/principal.js" defer></script>
</head>
<body>
    <h1>Inicio</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="archivo">SUBIR EXCEL</label>
        <input type="file" id="archivo" name="archivo_excel" accept=".xlsx,.csv" hidden>
        <br>
    </form>
    <button id="subir_ar">Subir archivo</button>
    <button id="servidor"> Enviar al servidor </button>
    <div id="tabla">
    </div>
</body>
</html>