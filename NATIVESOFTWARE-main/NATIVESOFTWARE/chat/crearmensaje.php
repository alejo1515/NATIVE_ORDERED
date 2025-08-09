<?php

session_start();

if (empty($_SESSION["correo"])) {
    header("location:../index.html");
}

$conexion = mysqli_connect('localhost', 'root', '','usuario')
or die(mysql_error($mysqli)); 


insertar($conexion);






function diferencia($conexion){
if(isset($_POST['enviar'])){
insertar($conexion);


}

if(isset($_POST['eliminar'])){
insertar($conexion);

}

}


function insertar($conexion){
$contenido = $_POST['contenido'];
$correo_destinatario = $_POST['correo_destinatario'];
$correo_usuario =$_SESSION["correo"];


$consultas ="SELECT *
FROM usuario
WHERE correo = '.$correo_destinatario.';




if($consultas == 1){

$stmt = $conexion->prepare("INSERT INTO mensajes (contenido, correo_destinatario, correo_usuario) 
                            VALUES (:contenido, :correo_destinatario, :correo_usuario)");

$stmt->bindParam(':contenido', $contenido);
$stmt->bindParam(':correo_destinatario', $correo_destinatario);
$stmt->bindParam(':correo_usuario', $correo_usuario);


if ($stmt->execute()) {
    echo "Mensaje enviado con éxito.";
} else {
    echo "Error al enviar el mensaje.";
}
}



function eliminar($conexion){
    $correo = $_POST["correo"];
$consulta ="DELETE FROM mensajes(id_mensaje,contenido,fecha_envio,correo_usuario,correo_destinatario )
    VALUES($correo, $contenido, $fechaPublicacion, $nombre, $links)";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);

}
?>









