<!DOCTYPE html>
<html lang="es" id="pagina_no_tocar" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDVO</title>
    <!-- <link rel="stylesheet" href="./vista/css/bulma.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script> -->
    <!-- <script src="./controlador/app.js" defer></script> -->
    <link rel="stylesheet" href="./vista/css/stylos.css">
    <script src="./vista/js/login_date.js" defer></script>
</head>
    <div class="container">
        <div class="container--profile">
            <span class="logo">
                <img src="./vista/img/new logo CDVO.jpg" alt="">
            </span>
        </div>
        <div class="container-form">
            <form id="login-form" class="form">
                <input type="text" name="" id="dni" placeholder="dni">
                <input type="password" name="" id="contra" placeholder="contraseña">

                <input type="submit" value="Iniciar Secion">
                <div class="border"></div>
                <p class="create-pages" id="create_count"><i>Crear cuenta</i></p>
            </form>
            <p class="create-page">
                <a href="#"> GDVO </a> te conecta con el software que necesitas
            </p>
        </div>
    </div>
<?php
    require_once("./vista/layout/footer.php");
?>

