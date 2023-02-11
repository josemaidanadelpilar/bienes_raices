<?php
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    // Importar la base de datos 
    $ruta = "/imagenes/";
    require "includes/config/databases.php"; 
    $db = conectarDB();
    $id = $_GET['id'];
    // Filtra para que solo incluya numeros 
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    // Realizar la consulta a la base datos $3
    $query = "SELECT * FROM propiedades WHERE id={$id}";

    // Obtener resultado de la base de datos 
    $resultado = mysqli_query($db, $query);

    $propiedad = mysqli_fetch_assoc($resultado);
    require 'includes/funciones.php';
    incluirTemplates('header');
?>
    <section class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'];?></h1>
        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'] . ".jpg"?>" alt="Anuncio destacado">
        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad['precio']?></p>
            <ul class="iconos-caracteristicas"> 
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']?></p>
                </li>

                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones']?></p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi corporis iusto corrupti recusandae distinctio. Ex totam eveniet, minima dolores dolor quas beatae sunt voluptate a est illo fuga ut magni ipsum dolor sit amet consectetur adipisicing elit. Quae vel vero, molestiae necessitatibus eos nisi voluptatem quod error tempore ratione deleniti eveniet earum modi facere nostrum numquam cupiditate voluptates ut.
            </p>
        </div>
    </section>
    <?php
mysqli_close($db);
incluirTemplates('footer');
?>

