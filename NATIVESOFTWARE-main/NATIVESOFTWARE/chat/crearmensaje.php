<?php

session_start();

if (empty($_SESSION["correo"])) {
    header("location:../index.html");
}

$conexion = mysqli_connect('localhost', 'root', '','usuario')
or die(mysql_error($mysqli)); 




diferencia($conexion);

function diferencia($conexion){
if(isset($_POST['enviar'])){
insertar($conexion);

}
}

	


function insertar($conexion){

$contenido = $_POST["contenido"];
    $correo_destinatario = $_POST["correo_destinatario"];
    $correo_usuario = $_SESSION["correo"];



    $query = mysqli_query($conexion,"SELECT * FROM usuario WHERE correo = '".$correo_destinatario."' ");

     $datos=$query->fetch_object();

    if (mysqli_num_rows($query) == 1)
      
      { 


$consulta ="INSERT INTO mensajes(contenido, correo_destinatario, correo_usuario)
    VALUES ('$contenido', '$correo_destinatario', '$correo_usuario')";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);



        header("Location: ../inicio/index.php");

        
    }
  else if(mysqli_num_rows($query) == 0)
    { header("Location: chat.php");

    }





}




?>
















