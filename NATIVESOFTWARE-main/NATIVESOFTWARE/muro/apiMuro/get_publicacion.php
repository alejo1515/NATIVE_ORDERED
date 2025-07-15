<?php
require_once('publicacion_class.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET' 
&& isset($_GET['correo'] ) && isset($_GET['fechaPublicacion'])) {


    Publicacion::get_publicacion($_GET['correo'],$_GET['fechaPublicacion']);
}
?>