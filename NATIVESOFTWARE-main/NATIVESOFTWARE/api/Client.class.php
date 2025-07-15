<?php
require_once('Database.class.php');

class Client{

    public static function create_client($correo, $nombreUsuario, $contrasena, $fechaNacimiento){
        $database = new Database();
        $conn = $database->getConnection();

    $stmt=$conn->prepare('INSERT INTO usuarios(correo,nombreUsuario,contrasena,fechaNacimiento)
    VALUES(:correo,:nombreUsuario,:contrasena,:fechaNacimiento)');


    $stmt->bindParam(':correo',$correo);
    $stmt->bindParam(':nombreUsuario',$nombreUsuario);
    $stmt->bindParam(':contrasena',$contrasena);
    $stmt->bindParam(':fechaNacimiento',$fechaNacimiento);


    if($stmt->execute()){
        header('HTTP/1.1 201 Cliente creado correctamente');
    }else{
        header('HTTP/1.1 401 Cliente no se ha creado correctamente');
    }
    }

    public static function delte_client_by_correo($correo){
     $database = new Database();
     $conn = $database->getConnection();

     $stmt = $conn->prepare('DELETE FROM usuarios WHERE correo =:correo');
     $stmt->bindParam(':correo',$correo);

    }

?>