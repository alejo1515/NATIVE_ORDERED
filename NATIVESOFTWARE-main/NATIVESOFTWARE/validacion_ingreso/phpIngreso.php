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

	$nombre = $_POST["txtusuario"];
    $pass = $_POST["txtcontrasena"];

    $query = mysqli_query($enlace,"SELECT * FROM usuario WHERE correo = '".$nombre."' and contrasena ='".$pass."'");
    $nr = mysqli_num_rows($query);

    if($nr == 1)
    {

        header("Location: ../inicio/index.html");
    }
  else if ($nr == 0)
    {  header("Location:phpIngreso_credenciales.html")
    }
?>