<?php
require_once('Database.class.php');

class Publicacion{

    public static function create_publicacion($correo, $contenido, $fechaPublicacion, $nombre, $links){
        $database = new Database();
        $conn = $database->getConnection();

    $stmt=$conn->prepare('INSERT INTO publicaciones(correo, contenido, fechaPublicacion, nombre, links)
    VALUES(:correo, :contenido, :fechaPublicacion, :nombre, :links)');


    $stmt->bindParam(':correo',$correo);
    $stmt->bindParam(':contenido',$contenido);
    $stmt->bindParam(':fechaPublicacion',$fechaPublicacion);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':links',$links);


    if($stmt->execute()){
        header('HTTP/1.1 201 Publicacion creada correctamente');
    }else{
        header('HTTP/1.1 401 Publicacion no se ha creado correctamente');
    }
    }

    public static function delete_publicacion_by_correo($fechaPublicacion,$correo){
     $database = new Database();
     $conn = $database->getConnection();

     $stmt = $conn->prepare('DELETE FROM publicaciones WHERE correo =:correo AND fechaPublicacion =:fechaPublicacion');
     $stmt->bindParam(':correo',$correo);
      $stmt->bindParam(':fechaPublicacion',$fechaPublicacion);
     
    if($stmt->execute()){
        header('HTTP/1.1 201 Publicacion eliminada correctamente');
    }else{
        header('HTTP/1.1 401 Publicacion no se ha eliminado correctamente');
    }}

  public static function get_publicacion($correo,$fechaPublicacion){
   $database = new Database();
   $conn = $database->getConnection();
   $stmt = $conn->prepare ('SELECT * FROM publicaciones WHERE correo =:correo AND fechaPublicacion =:fechaPublicacion'); 
    $stmt->bindParam(':correo',$correo);
      $stmt->bindParam(':fechaPublicacion',$fechaPublicacion);
   
   if($stmt->execute()){
     $result = $stmt-> fetchAll();
     echo json_encode($result);
        header('HTTP/1.1 201 se logro la busqueda');
    }else{
        header('HTTP/1.1 401 no se logro la busqueda');
    }}

  

public static function update_publicacion($correo, $contenido, $fechaPublicacion, $nombre, $links, $idpublicacion){

 $database = new Database();
   $conn = $database->getConnection();
   $stmt = $conn->prepare ('UPDATE publicaciones SET correo=:correo, contenido=:contenido, fechaPublicacion=:fechaPublicacion, nombre=:nombre, links=:links WHERE correo=:correo AND idpublicacion=:idpublicacion');

      $stmt->bindParam(':correo',$correo);
    $stmt->bindParam(':contenido',$contenido);
    $stmt->bindParam(':fechaPublicacion',$fechaPublicacion);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':links',$links);
     $stmt->bindParam(':idpublicacion',$idpublicacion);


   if($stmt->execute()){
header('HTTP/1.1 201 Publicacion actualizada correctamente');
    }else{
        header('HTTP/1.1 401 Publicacion no se ha actualizado correctamente');
    }

}

}
?>