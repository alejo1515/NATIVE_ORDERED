<?php


$conexion = mysqli_connect('localhost', 'root', '','usuario')


or die(mysql_error($mysqli)); 




diferencia($conexion);


function diferencia($conexion){
if(isset($_POST['registro'])){


$nombre = $_POST["txtusuario"];
    $pass = $_POST["txtcontrasena"];

    $query = mysqli_query($conexion,"SELECT * FROM usuario WHERE correo = '".$nombre."' and contrasena ='".$pass."'");
    $nr = mysqli_num_rows($query);
 
    if($nr == 1)
    {
       actualizar($conexion);
        header("Location: ../inicio/index.html");
    }
  else if ($nr == 0)
    {  header("Location:configuracion.html");
    }
    insertar($conexion);

}
}





function actualizar($conexion){

$nombreUsuario = $_POST['nombreUsuario'];
$nombre = $_POST['nombre'];
$correo  = $_POST['txtusuario'];
$contrasena = $_POST['txtcontrasena'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$portafolio = $_POST['portafolio'];
$redes = $_POST['redes'];
$ubicacion = $_POST['ubicacion'];
$bio = $_POST['bio'];
$telefono = $_POST['telefono'];


$sql ="UPDATE usuario
 SET nombreUsuario = '$nombreUsuario', 
 nombre = '$nombre', 
 contrasena = '$contrasena',
 correo = '$correo', 
 fechaNacimiento = '$fechaNacimiento', 
 portafolio = '$portafolio', 
 redes = '$redes', 
 ubicacion = '$ubicacion', 
 bio ='$bio', 
 telefono = '$telefono'

WHERE correo = '$correo'";

mysqli_query($conexion, $sql);
mysqli_close($conexion);

header( "Location: ../inicio/index.html");

}




?>