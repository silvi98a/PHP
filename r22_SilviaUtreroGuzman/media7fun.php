<?php

function leer_fichero($nomFichero) {
    if(!file_exists($nomFichero)) {
        trigger_error("El fichero no existe.");
        return "";
    }

    $f = fopen($nomFichero, "r"); //abrir el fichero. "r" es solo lectura
    $contenido = fread($f, filesize($nomFichero));
    fclose($f); //cerrar el fichero
    return $contenido;
}

function customError($errno, $errstr) { //función de errores
  echo "<b>Error:</b> $errstr";
}

function funcion_limpiar($data) { // Evitar inyección de código
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//array con los 4 jugadores a partir de los datos del formulario
function crearJugadores($datos)
{
    $jugadores = [];

    for ($i = 1; $i <= 4; $i++) {
        $nombre = trim($datos["jugador" . $i]);

        // Validación con excepción
        if ($nombre == "") {
            throw new Exception("El nombre del jugador $i no puede estar vacío.");
        }

        $jugadores[] = [
            "nombre" => $nombre,
            "cartas" => [],
            "puntos" => 0,
            "premio" => 0
        ];
    }

    return $jugadores;
}