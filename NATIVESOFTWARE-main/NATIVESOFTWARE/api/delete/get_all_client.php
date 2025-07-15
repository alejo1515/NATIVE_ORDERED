<?php
require_once('Client_class_delete.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET'  ){


    Client::get_all_client();
}
?>