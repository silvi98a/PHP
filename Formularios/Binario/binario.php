<?php

function funcion_limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function decimal_a_binario($numero) {
    $binario = "";
    if ($numero == 0) {
        return "0";
    }
    while ($numero > 0) {
        $binario = ($numero % 2) . $binario;
        $numero = intdiv($numero, 2); // Devuelve el cociente entero -> dividend entre divisor
    }
    return $binario;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "El method que ha usado es: ", $_SERVER['REQUEST_METHOD'], "<br>";

    $decimal = funcion_limpiar($_POST['decimal']); // aquí llamo al $decimal del html

    echo "Número decimal: " . $decimal, "<br>";

    $resultado = decimal_a_binario((int)$decimal);

    echo "Número binario: " . $resultado;
}
?>