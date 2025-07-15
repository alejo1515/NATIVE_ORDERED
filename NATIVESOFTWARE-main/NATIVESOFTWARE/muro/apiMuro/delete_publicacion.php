<?php
require_once('publicacion_class.php');


if ($_SERVER['REQUEST_METHOD'] == 'DELETE'
&& isset($_GET['correo'] ) && isset($_GET['fechaPublicacion'])){

    Publicacion::delete_publicacion_by_correo($_GET['correo'],$_GET['fechaPublicacion']);
}
?>