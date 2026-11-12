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

?>

