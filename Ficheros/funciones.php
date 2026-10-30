<?php

function funcion_limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*ASÍ NO
function comprobar_obligatorios($nombre, $apellido1, $apellido2, $fecha, $localidad) {
    if ($nombre == "" || $apellido1 == "" || $apellido2 == "" || $fecha == "" || $localidad == "") {
        return false;
    }
    return true;
}
*/ //MEJOR HACERLO DE LA SIGUIENTE MANERA o CON (IS_NULL($NOMBRE) .... RETURN FALSE, SINO, RETURN TRUE
function comprobar_obligatorios($nombre, $apellido1, $apellido2, $fecha, $localidad) {
    if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($fecha) || empty($localidad)) {
        return false;
    }
    return true;
}

/*ASÍ NO
function guardar_alumno($nombre, $apellido1, $apellido2, $fecha, $localidad) {
    $linea = implode('##', [$nombre, $apellido1, $apellido2, $fecha, $localidad]);
    file_put_contents(__DIR__ . "/../files/alumnos2.txt", $linea . "\n", FILE_APPEND);
}
*/ //MEJOR DE LA SIGUIENTE MANERA SIN ARRAU DE POR MEDIO
function guardar_alumno($nombre, $apellido1, $apellido2, $fecha, $localidad) {
    $linea = $nombre . '#' . $apellido1 . '#' . $apellido2 . '#' . $fecha . '#' . $localidad;
    file_put_contents("/../files/alumnos2.txt", $linea . "\n", FILE_APPEND);
}

function ajustar($texto, $longitud) {
    return str_pad($texto, $longitud); //str_pad rellena con espacios por defecto
}

?>

