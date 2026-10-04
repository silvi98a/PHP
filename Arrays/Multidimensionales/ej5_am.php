<?php

$matriz = array();
$maximos = array(); 
$promedios = array();

// Relleno la matriz 3x3 con números aleatorios y calculo el máximo y el promedio de cada fila
for ($fila = 0; $fila < 3; $fila++) {
    $suma = 0; // se reinicia en cada fila
    $maximo = 0; // se reinicia en cada fila

    for ($columna = 0; $columna < 3; $columna++) {
        $matriz[$fila][$columna] = rand(1, 100); //para que genere el número aleatorio
        $suma = $suma + $matriz[$fila][$columna];
        if ($matriz[$fila][$columna] > $maximo) { // si el elemento es mayor, lo guardo como máximo de la fila
            $maximo = $matriz[$fila][$columna];
        }
    }

    // Al terminar la fila, guardo los resultados en los arrays
    $maximos[$fila] = $maximo;
    $promedios[$fila] = $suma / 3;
}

// Enseño la matriz para poder comprobar los resultados
print("Matriz: <br>");
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        print($matriz[$fila][$columna] . " ");
    }
    print("<br>");
}

// Los dos arrays
print("<br> Máximos de cada fila: <br>");
foreach($maximos as $posicion => $valor) {
    print("Fila " . ($posicion + 1) . ": " . $valor . "<br>");
}

print("<br> Promedios de cada fila: <br>");
foreach($promedios as $posicion => $valor) {
    print("Fila " . ($posicion + 1) . ": " . round($valor, 2) . "<br>");
}

?>