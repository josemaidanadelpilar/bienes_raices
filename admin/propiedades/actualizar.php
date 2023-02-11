<?php
require '../../includes/funciones.php';
// Incluimos la funciones, para incluir la funcion de estar autenticado 
$userAuntenticado = estarAutenticado();
if(!$userAuntenticado){
    header('Location:/login.php');
}
$id = $_GET['id'];
// Valida que el url sea un entero, evitando que sea un script o sentencia sql 
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: /admin');
}
// Base de datos 
require '../../includes/config/databases.php';

$db = conectarDB();

//Consulta para obtener los datos de la propiedad 
$consultaPropiedad = "SELECT * FROM propiedades WHERE id = {$id}";

$resultadoPropiedad = mysqli_query($db, $consultaPropiedad);

$propiedad = mysqli_fetch_assoc($resultadoPropiedad);


// Consultar para obtener los vendedores 
$consulta = "SELECT * FROM vendedores";

$resultconecct = mysqli_query($db,$consulta);


//Arreglo con mensajes de errores 
$errores = [];
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$precio = intval($precio);
$descripcion = $propiedad['descripcion'];
$descripcion = strval($descripcion);
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$creado = $propiedad['creado'];
$vendedorId = $propiedad['vendedorID'];
$imagenPropiedad = $propiedad['imagen'];

//Ejecutar el codigo despues de que el usuario envie el formulario 

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // "<pre>";
    // var_dump($_POST);
    // "</pre>";

    // Convirtiendo los "name" en variables 
    $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
    $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] ); 
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] ); 
    $wc = mysqli_real_escape_string( $db, $_POST['wc'] ); 
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
    $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );

    //Asignar file en una variable
    $imagen = $_FILES['imagen'];
    
    // "<pre>";
    // var_dump($imagen['name']);
    // "</pre>"; 
    // exit;

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes añadir el precio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "Debes añadir la descripcion de al menos 50 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "Debes añadir el campo habitaciones";
    }

    if (!$wc) {
        $errores[] = "Debes añadir el campo baños";
    }

    if (!$estacionamiento) {
        $errores[] = "Debes añadir la cantidad de estacionamiento";
    }

    
    if (!$vendedorId) {
        $errores[] = "Debes seleccionar un vendedor";
    }

    //Validar la imagen por tamaño 1mb maximo 
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }


    // '<pre>';
    // var_dump($errores);
    // '</pre>';
    // Revisar que el arreglo de error este vacio
    if (empty($errores)) {
        // // SUBIDA DE ARCHIVOS 

        //Comprueba si la carpeta existe y si no existe la crea 
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        // Se eliminar el nombre de la variable $nombreImagen = ""; para evitar eliminar la imagen actual, se extrae de la base de datos directamente el nombre a eliminar en caso de que se actualize 
        $nombreImagen = "";
        if ($imagen['name']) {
            // Eliminar la imagen previa 
            unlink($carpetaImagenes . $propiedad['imagen'] . ".jpg");
            $nombreImagen = md5(uniqid(rand(), true));
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen . ".jpg");
        } else {
            // Se rasigna el nombre a la variable 
            $nombreImagen = $propiedad['imagen'];
        }
        // // Crear una carpeta 

        // Generar un nombre unico a cada imagen

        $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio},imagen = '{$nombreImagen}',descripcion = '{$descripcion}',habitaciones = {$habitaciones},wc = {$wc},estacionamiento = {$estacionamiento},vendedorID = {$vendedorId} WHERE id = {$id}";
        // var_dump($query);
        // exit;
    
        $resultado = mysqli_query($db,$query);
        if ($resultado) {
            //Redireccionar al usuario 
            header('Location: /admin?resultado=2');

        }
    }
    // Insertar en la base de datos 

}

// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
         <?php endforeach; ?>
         <!-- El enctype habilita para subir archivos, ejemplo la imagen  -->
        <form class="formulario" 
        method="POST" 
        enctype="multipart/form-data">
            <fieldset>

            <!-- Los name permite leer lo que el usuario ingresa y guardar en las variables   -->
                <legend>Informacion General De Nuestra Propiedad</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" 
                name="titulo" placeholder="Titulo Propiedad" 
                value="<?php echo $titulo;?>">

                <label for="precio">Precio:</label>
                <input type="number" 
                id="precio"  name="precio" 
                placeholder="Precio Propiedad" 
                value="<?php echo $precio ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" 
                id="imagen" 
                accept="image/jpeg, image/png" name="imagen"
                value="<?php echo $imagen['name'] ?>">

                <img class="imagen-small" src="/imagenes/<?php echo $imagenPropiedad . ".jpg"; ?>" alt="" >

                <label for="descripcion">Descripcion</label>
                <textarea 
                id="descripcion" 
                name="descripcion" ><?php echo $descripcion; ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Información de la propiedad</legend>
                
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" 
                id="habitaciones" 
                name="habitaciones" 
                placeholder="Ej: 3" 
                value="<?php echo $habitaciones; ?>" 
                min="1" max="15">

                <label for="wc">Baños:</label>
                <input type="number" 
                id="wc" 
                name="wc" 
                placeholder="Ej: 3" 
                value="<?php echo $wc; ?>" 
                min="1" max="15">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" 
                id="estacionamiento" 
                name="estacionamiento" 
                placeholder="Ej: 3 " 
                value="<?php echo $estacionamiento; ?>" 
                min="1" max="15">

            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option  value="">--Seleccionar--</option>
                    <?php while ($row = mysqli_fetch_assoc($resultconecct)): ?>
                        <option <?php echo $vendedorId === $row['id'] ? 'selected' : '';?> 
                        value="<?php echo $row['id'];?>"
                        ><?php echo $row['nombre'] . " " . $row['apellido']; ?>
                    </option>
                    <?php endwhile; ?>
                </select>

            </fieldset>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
            
        </form>
    </main>
<?php

incluirTemplates('footer');
?>