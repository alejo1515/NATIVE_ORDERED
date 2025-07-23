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
 
session_start();
	$nombre = $_POST["txtusuario"];
    $pass = $_POST["txtcontrasena"];

    $query = mysqli_query($enlace,"SELECT * FROM usuario WHERE correo = '".$nombre."' and contrasena ='".$pass."'");
   if($datos=$query->fetch_object())

    {
         $_SESSION["correo"] = $datos ->correo;
          $_SESSION["nombre"] = $datos ->nombre;
          $_SESSION["nombreUsuario"] = $nombreUsuario ->nombreUsuario;
        header("Location: ../inicio/index.php");
    }
  else
    { header("Location: phpIngreso.php");

    }
?>