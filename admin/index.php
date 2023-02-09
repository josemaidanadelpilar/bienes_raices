<?php
    // Importar la conexion 
    require '../includes/config/databases.php';
    $db = conectarDB();
    // Escribir el Query 
    $query = "SELECT * FROM propiedades";
    // Consultar la base de datos 
    $resultadoConsultar = mysqli_query($db, $query);
// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    // Si ?? null no tiene un valor le asigna un null, parecido a un isset() para que el array no este vacio
    $resultado = $_GET['resultado'] ?? null;

    // El post no existe hasta que se mande un request method 
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id) {
            // ELIMINAR EL ARCHIVO
            $carpetaImagenes = '../imagenes/';
            $query = "SELECT imagen FROM propiedades WHERE id={$id}";
            $resultado = mysqli_query($db,$query);

            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen'] . ".jpg");
    
            //ELIMINAR LA PROPIEDAD
            $query = "DELETE FROM propiedades WHERE id={$id}";
            $resultado = mysqli_query($db,$query);

            if($resultado){
                header('location: /admin?resultado=3');
            }
        }

    }
    require '../includes/funciones.php';
    // Incluir templates 
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if (intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio Creado correctamente</p>

        <?php elseif(intval($resultado) === 2):?>
            <p class="alerta exito">Anuncio Actulizado correctamente</p>
        <?php elseif(intval($resultado) === 3):?>
            <p class="alerta exito-borrado">Anuncio Borrado correctamente</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <table class="propiedades table-dark-mode">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>


                </tr>
            </thead>

            <!-- Mostrar los resulatos en el html  -->
            <tbody>
                <?php while( $propiedad = mysqli_fetch_assoc( $resultadoConsultar ) ): ?>
                    
                <tr>
                    <td><?php echo $propiedad['id'];?></td>
                    <td><?php echo $propiedad['titulo'];?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen'] . ".jpg"; ?>" alt="Imagen de publicidad" class="imagen-tabla"></td>
                    <td><?php echo $propiedad['precio'];?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value=" <?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
<?php
// cerrar la conexion 
mysqli_close($db);
// Incluir templates de footer 
incluirTemplates('footer');
?>