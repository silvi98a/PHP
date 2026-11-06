<?php
function abrirFichero($ruta) {
    $f = fopen($ruta, "r");
    $texto = fread($f, filesize($ruta));
    fclose($f);
    return $texto;   
}


?>