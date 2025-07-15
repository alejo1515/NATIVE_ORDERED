<?php


require_once('publicacion_class.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST'
&& isset($GET_['correo']) && isset($GET_['contenido'])  && isset($_GET['fechaPublicacion']) && isset($_GET['nombre']) && isset($_GET['links'])) {
Publicacion::create_publicacion($_GET['correo'], $_GET['contenido'] ,$_GET['fechaPublicacion'],$_GET['nombre'],$_GET['links']);
}


?>


