<?php







$conexion = mysqli_connect('localhost', 'root', '','usuario')


or die(mysql_error($mysqli)); 



session_start();


diferencia($conexion);


function diferencia($conexion){
if(isset($_POST['eliminar'])){


    $pass = $_POST["contrasenaEliminar"];

    $query = mysqli_query($conexion,"SELECT * FROM usuario WHERE correo = '". $_SESSION["correo"] ."' and contrasena ='".$pass."'");
    $nr = mysqli_num_rows($query);
 
    if($nr == 1)
    {
       eliminar($conexion);
        header("Location: ../inicio/index.html");
    }
  else if ($nr == 0)
    {  header("Location:configuracion.html");
    }
    insertar($conexion);

}
}


function eliminar ($conexion){

    $correo= $_POST["correo"];

    $pass = $_POST["contrasenaEliminar"];



  $query = mysqli_query($conexion,"DELETE FROM usuario WHERE correo = '" . $_SESSION["correo"] . "' and contrasena ='".$pass."'");


mysqli_query($conexion, $query);

mysqli_close($conexion);

header(location:" ../validacion_ingreso/phpIngreso_credenciales.php");

}

?>