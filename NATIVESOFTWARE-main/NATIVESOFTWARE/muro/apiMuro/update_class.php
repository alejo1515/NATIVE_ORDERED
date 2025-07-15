<?php
require_once('publicacion_class.php');


if ($_SERVER['REQUEST_METHOD'] == 'PUT'
&& isset($_GET['idpublicacion']) && isset($_GET['correo']) && isset($_GET['contenido']) && isset($_GET['fechaPublicacion'])&& isset($_GET['nombre'])&& isset($_GET['links'])) {
Publicacion::update_publicacion($_GET['idpublicacion'], $_GET['correo'] ,$_GET['contenido'],$_GET['fechaPublicacion'],$_GET['nombre'],$_GET['links']);
}
?>
