<?php 
//Inicia la session en todos los header, el condicional evita que apareca un warning por dos secioines activas 

if(!isset($_SESSION)){
    session_start();
}
$userAuntenticado = $_SESSION['login'] ?? null;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <!-- Se realiza una condicion con PHP para agregar la clase inicio para el Index.php -->
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Imagen Logo">

                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Menu mobile">
                </div>
                <div class="derecha">
                    <img class="dark-mode-buton" src="/build/img/dark-mode.svg" alt="dark-mode imagen">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($userAuntenticado):?>
                            <a href="loginOut.php">Cerrar Sesíon</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!-- ESTE ES EL CIERRE DE LA BARRA  -->
        </div>

        
    </header>