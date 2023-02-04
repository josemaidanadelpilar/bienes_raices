<?php
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    require 'includes/funciones.php';
    
    incluirTemplates('header');
?>
    <main  class="contendor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 años de Experiencia</blockquote>
                <p>
                    Proin consequat viverra sapien, malesuada tempor tortor feugiat vitae. In dictum felis et nunc aliquet molestie. Proin tristique commodo felis, sed auctor elit auctor pulvinar. Nunc porta, nibh quis convallis sollicitudin, arcu nisl semper mi, vitae sagittis lorem dolor non risus. Vivamus accumsan maximus est, eu mollis mi. Proin id nisl vel odio semper hendrerit. Nunc porta in justo finibus tempor. Suspendisse lobortis dolor quis elit suscipit molestie. Sed condimentum, erat at tempor finibus, urna nisi fermentum est, a dignissim nisi libero vel est. Donec et imperdiet augue. Curabitur malesuada sodales congue. Suspendisse potenti. Ut sit amet convallis nisi.
                </p>
            </div>
        </div>
    </main>
    <section class="contendor seccion">
        <h1>Mas Sobre Nosotros</h1>
        <div class="icono-nosotros">
            <div class="icono">
                    <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nihil, similique enim esse nostrum velit voluptate illo perferendis incidunt explicabo architecto vel, laboriosam at aspernatur commodi quod consequatur, maiores neque.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nihil, similique enim esse nostrum velit voluptate illo perferendis incidunt explicabo architecto vel, laboriosam at aspernatur commodi quod consequatur, maiores neque.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nihil, similique enim esse nostrum velit voluptate illo perferendis incidunt explicabo architecto vel, laboriosam at aspernatur commodi quod consequatur, maiores neque.</p>
            </div>
        </div>
    </section>
<?php

incluirTemplates('footer');
?>