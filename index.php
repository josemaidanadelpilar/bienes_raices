<?php
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    require 'includes/funciones.php';
    
    incluirTemplates('header', $inicio = true);
?>
    <main  class="contendor seccion">
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
    </main>
    <section class="seccion contenedor">
    <h2>Casas y Depas en Ventas</h2>
    <?php 
    $limite = 3;
    include 'includes/templates/anuncios.php';
    ?>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo-block">Contactanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.webp" type="image/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>23/01/2021</span> por <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero 
                        </p>
                    </a>
                

                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.webp" type="image/jpg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>23/01/2021</span> por <span>Admin</span></p>
                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                

                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Sara Ojeda</p>
            </div>
        </section>
    </div>
<?php

incluirTemplates('footer');
?>
