<?php

require 'app.php';
function incluirTemplates( string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php";
}
function estarAutenticado() {
session_start();
$userAuntenticado = $_SESSION['login'];
// Si tienes return no es necesario tener un ELSE 
if($userAuntenticado){
    return true;
}
return false;
}
?>
