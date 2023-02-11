<?php
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    require 'includes/funciones.php';
    
    incluirTemplates('header');
?>
    <main  class="contendor seccion">
    <?php 
    $limite = 10;
    include 'includes/templates/anuncios.php';
    ?>
    </main>
    <?php

incluirTemplates('footer');
?>

