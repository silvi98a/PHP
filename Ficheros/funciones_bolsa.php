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

// Lee un fichero y devuelve un array asociativo [clave => valor]
function leerFicheroMejorado($ruta, $separador) {
    $lineas = file($ruta);
    $datos = [];

    foreach ($lineas as $linea) {
        $partes = explode($separador, trim($linea));
        $datos[$partes[0]] = $partes;
    }

    return $datos;
}

function customError($errno, $errstr) { //función de errores
    if ($errno==1024) {
        echo "<b>Aplicación Bolsa:</b> El fichero no se ha podido cargar";
    } elseif ($errno==512) {
        echo"<b>Aplicación Bolsa: </b> El valor que busca, no existe";
    } else {
        echo "Error: $errno - $errstr";
    }
    return true;
}

function funcion_limpiar($data) { // Evitar inyección de código
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>



<!-- PHP file() lee el fichero y lo mete en aray asociativos para recorrer con foreach. -->


