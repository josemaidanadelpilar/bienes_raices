<?php
function conectarDB() : mysqli  {
    // El servidor, el usuario, contraseña y el nombre de la base de datos 
    $db = mysqli_connect('localhost', 'root', 'Vedoya771109', 'bienes_raices');
    if (!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}?>