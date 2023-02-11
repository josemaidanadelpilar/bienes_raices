<?php
// Base de datos 
require '../../includes/funciones.php';
require '../includes/funciones.php';
// Incluimos la funciones, para incluir la funcion de estar autenticado 
$userAuntenticado = estarAutenticado();
if(!$userAuntenticado){
    header('Location:/login.php');
}
require '../../includes/config/databases.php';

$db = conectarDB();

// Consultar para obtener los vendedores 
$consulta = "SELECT * FROM vendedores";

$resultconecct = mysqli_query($db,$consulta);
//Arreglo con mensajes de errores 
$errores = [];
$titulo = '';
$precio = '';
$descripcion = ''; 
$habitaciones = ''; 
$wc = ''; 
$estacionamiento = '';
$fecha = date("Y-d-m");
$vendedorId = '';

//Ejecutar el codigo despues de que el usuario envie el formulario 

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // "<pre>";
    // var_dump($_POST);
    // "</pre>"; 

   
    // "<pre>";
    // var_dump($resultado);
    // "</pre>"; 
    // exit;
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

    //Validar la imagen para subir 
    if (!$imagen['name'] || $imagen['error'] ) {
        $errores[] = "La imagen es obligatoria";
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
        // SUBIDA DE ARCHIVOS 
        // Crear una carpeta 
        $carpetaImagenes = '../../imagenes';

        //Comprueba si la carpeta existe y si no existe la crea 
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        // Generar un nombre unico a cada imagen

        $nombreImagen = md5(uniqid(rand(), true));
        // '<pre>';
        // var_dump($nombreImagen);
        // '</pre>';
        // Subir la imagen 

        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen . ".jpg");
        
        $query = " INSERT INTO 
        propiedades(titulo,precio,imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedorID) VALUES ( '$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$estacionamiento','$fecha','$vendedorId')";
    
        // echo $query; 
    
        $resultado = mysqli_query($db,$query);
        if ($resultado) {
            //Redireccionar al usuario 
            header('Location: /admin?resultado=1');

        }
    }
    // Insertar en la base de datos 

}

// Este codigo inicio agrega una clase al header.php para agregar el background-image del de este index.php 
    require '../../includes/funciones.php';
    
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h1>Crear Nueva Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
         <?php endforeach; ?>
         <!-- El enctype habilita para subir archivos, ejemplo la imagen  -->
        <form class="formulario" 
        method="POST" 
        action="/admin/propiedades/crear.php" 
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
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
            
        </form>
    </main>
<?php

incluirTemplates('footer');
?>