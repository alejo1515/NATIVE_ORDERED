<?php
 $servidor = "localhost";
 $usuario = "root";
 $clave = "";
 $baseDeDatos = "usuario";

 $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

 

if (!$enlace)
{

    die("no hay conexion" .mysqli_connect_error());
}
	$nombre = $_POST["txtcorreo"];


    $query = mysqli_query($enlace,"SELECT * FROM usuario WHERE correo = '".$nombre."' and contrasena ='".$pass."'");
    $nr = mysqli_num_rows($query);

    if($nr == 0)
    { $noEncontrado = "no encontrado";
  echo $noEncontrado;

    }
while()
    { 
    }
?>