<?php
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 

    // Si ?? null no tiene un valor le asigna un null, parecido a un isset() para que el array no este vacio
    $resultado = $_GET['resultado'] ?? null;
    require '../includes/funciones.php';
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if (intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar</a>
        <a href="/admin/propiedades/borrar.php" class="boton boton-verde">Borrar</a>
    </main>
<?php

incluirTemplates('footer');
?>