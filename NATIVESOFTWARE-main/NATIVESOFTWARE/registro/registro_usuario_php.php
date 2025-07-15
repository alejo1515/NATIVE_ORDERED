<?php
$conexion = mysqli_connect('localhost', 'root', '','usuario')
or die(mysql_error($mysqli)); 


insertar($conexion);
function diferencia($conexion){
if(isset($_POST['registro'])){
insertar($conexion);

}


}


function insertar($conexion){
$correo = $_POST['correo'];
$nombreUsuario = $_POST['nombreUsuario'];
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$portafolio = $_POST['portafolio'];
$redes = $_POST['redes'];
$ubicacion = $_POST['ubicacion'];
$bio = $_POST['bio'];
$telefono = $_POST['telefono'];



$consulta ="INSERT INTO usuario(correo,nombreUsuario, nombre, contrasena, fechaNacimiento, portafolio, redes, ubicacion, bio, telefono)
    VALUES ('$correo', '$nombreUsuario', '$nombre', '$contrasena', '$fechaNacimiento','$portafolio', '$redes', '$ubicacion', '$bio','$telefono')";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);

header("Location:../index.html");
}

function eliminar($conexion){
    $correo = $_POST["correo"];
$consulta ="DELETE FROM usuario(correo,nombreUsuario, contrasena, fechaNacimiento, portafolio, redes, ubicacion, bio, telefono)
    VALUES ('$correo', '$nombreUsuario', '$nombre', '$contrasena', '$fechaNacimiento','$portafolio', '$redes', '$ubicacion', '$bio','$telefono')";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);

}


?>