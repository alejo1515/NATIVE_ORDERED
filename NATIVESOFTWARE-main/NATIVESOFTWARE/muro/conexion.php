<?php
$conexion = mysqli_connect('localhost', 'root', '','usuario')
or die(mysql_error($mysqli)); 


insertar($conexion);
function diferencia($conexion){
if(isset($_POST['publicar'])){
insertar($conexion);


}

if(isset($_POST['eliminar'])){
insertar($conexion);

}

}


function insertar($conexion){
$contenido = $_POST['contenido'];
$nombre = $_POST['nombre'];
$links = $_POST['links'];
$correo = $_POST['correo'];




$consulta ="INSERT INTO publicaciones(correo, contenido,fechaPublicacion, nombre, links)
    VALUES ('$correo', '$contenido', NOW(), '$nombre', '$links')";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);

header("Location: muro.html");
}

function eliminar($conexion){
    $correo = $_POST["correo"];
$consulta ="DELETE FROM publicaciones(correo, contenido, fechaPublicacion, nombre, links)
    VALUES($correo, $contenido, $fechaPublicacion, $nombre, $links)";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);

}
?>