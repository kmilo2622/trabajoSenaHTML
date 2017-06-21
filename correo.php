<?php

/*
Programa de correos desarrollado por Juan Camilo Arroyave Rico
Para el servicio Nacional de Aprendizaje SENA
en el programa de Producción de Multimedia.
*/

include 'vendor/autoload.php';

$request = $_REQUEST;

//Primero hacemos las validaciones respectivas dado que no todos los campos son requeridos

if (isset($request['nombre'])) {
    $nombre = $request['nombre'];
} else {
    $nombre = "No hay un nombre";
}

if (isset($request['apellido'])) {
    $apellido = $request['apellido'];
} else {
    $apellido = "No hay un apellido";
}

if (isset($request['ocupacion'])) {
    $ocupacion = $request['ocupacion'];
} else {
    $ocupacion = "No hay una ocupación";
}

if (isset($request['edad'])) {
    $ocupacion = $request['edad'];
} else {
    $ocupacion = "No hay una ocupación";
}

//ahora configuramos el email
/*
No pondré contraseñas de correos ni nada por el estilo en este documento
*/

print_r($request);

?>