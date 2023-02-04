<?php
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    require 'includes/funciones.php';
    
    incluirTemplates('header');
?>
    <section class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente el bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp" >
            <source srcset="build/img/destacada.jpg" type="image/jpeg" >
            <img loading="lazy" src="build/img/destacada.jpg" alt="Anuncio destacado">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas"> 
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi corporis iusto corrupti recusandae distinctio. Ex totam eveniet, minima dolores dolor quas beatae sunt voluptate a est illo fuga ut magni ipsum dolor sit amet consectetur adipisicing elit. Quae vel vero, molestiae necessitatibus eos nisi voluptatem quod error tempore ratione deleniti eveniet earum modi facere nostrum numquam cupiditate voluptates ut.
            </p>
        </div>
    </section>
    <?php

incluirTemplates('footer');
?>

