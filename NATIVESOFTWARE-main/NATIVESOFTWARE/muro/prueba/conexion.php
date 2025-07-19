<?php

$conexion = mysqli_connect('localhost', 'root', '','usuario')
or die(mysql_error($mysqli)); 

//Variable de búsqueda
$consultaBusqueda = $_POST['busqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

    //Selecciona todo de la tabla mmv001 
    //donde el nombre sea igual a $consultaBusqueda, 
    //o el apellido sea igual a $consultaBusqueda, 
    //o $consultaBusqueda sea igual a nombre + (espacio) + apellido
    $consulta = mysqli_query($conexion, "SELECT * FROM usuario
    WHERE nombre COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' 
    OR correo COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'
    OR CONCAT(nombre,' ',apellido) COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'
    ");

    //Obtiene la cantidad de filas que hay en la consulta
    $filas = mysqli_num_rows($consulta);

    //Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
    if ($filas === 0) {
        $mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
    } else {
        //Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
        echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

        //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
        while($resultados = mysqli_fetch_array($consulta)) {
            $nombre = $resultados['nombre'];
            $apellido = $resultados['correo'];
            $edad = $resultados['portafolio'];
             $edad = $resultados['redes'];

            //Output
            $mensaje .= '
            <p>
            <strong>Nombre:</strong> ' . $nombre . '<br>
            <strong>Apellido:</strong> ' . $apellido . '<br>
            <strong>Edad:</strong> ' . $edad . '<br>
            </p>';

        };//Fin while $resultados

    }; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>