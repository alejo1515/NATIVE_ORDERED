<?php
require_once('Client_class_delete.php');


if ($_SERVER['REQUEST_METHOD'] == 'DELETE'
&& isset($_GET['correo'] )){

    Client::delete_client_by_correo($_GET['correo']);
}
?>