<?php
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    require 'includes/funciones.php';
    
    incluirTemplates('header');
?>
    <section class="contenedor seccion contenido-centrado">
        <h1>Consejos para tener una alberca en tu casa sin gastar demasiado</h1>
        
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp" >
            <source srcset="build/img/destacada2.jpg" type="image/jpeg" >
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Anuncio destacado">
        </picture>
        <p class="informacion-meta">Escrito el: <span>01/02/2023</span> por: <span> Admin</span></p>
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi corporis iusto corrupti recusandae distinctio. Ex totam eveniet, minima dolores dolor quas beatae sunt voluptate a est illo fuga ut magni ipsum dolor sit amet consectetur adipisicing elit. Quae vel vero, molestiae necessitatibus eos nisi voluptatem quod error tempore ratione deleniti eveniet earum modi facere nostrum numquam cupiditate voluptates ut.
            </p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic, unde dolorum fuga eveniet corrupti repudiandae. Ullam, ad sapiente! Perferendis commodi nam culpa, soluta eaque ipsum? Recusandae non maiores nihil debitis!</p>
        </div>
    </section>
    <?php

incluirTemplates('footer');
?>