<?php
require_once('Client_class_delete.php');


if ($_SERVER['REQUEST_METHOD'] == 'PUT'
&& isset($_GET['correo']) && isset($_GET['nombreUsuario']) && isset($_GET['contrasena']) && isset($_GET['fechaNacimiento'])) {
Client::UPDATE_client($_GET['correo'], $_GET['nombreUsuario'] ,$_GET['contrasena'],$_GET['fechaNacimiento']);
}
?>
