<?php

$aleatorio = array();
$sumaPosImpares = 0;
$sumaPosPares = 0;

$contPares = 0;
$contImpares = 0;

$mayorImpares = 0;
$mayorPares = 0;

$mediaPares = 0;
$mediaImpares = 0;

$valoresPares = 0;
$valoresImpares = 0;

for ($i = 0; $i<20; $i++) { //Genero en las 20 primeras posiciones un número del 1 al 100
    $aleatorio[$i] = rand(1, 100);
}

foreach($aleatorio as $posicion => $valor) { // Esto da dos cosas del array a la vez, posición (índice del array 0, 1, 2..20) y el valor (lo que hay dentro de esa posición)
    if ($posicion%2==0) { // suma los de las posiciones pares
        $sumaPosPares = $sumaPosPares + $valor;
        $contPares++; // para luego hacer la media
        if ($valor > $mayorPares) { // si el valor es mayor, lo meto en $mayorPares
            $mayorPares = $valor;
        }
    } else { // suma los de las posiciones impares
        $sumaPosImpares = $sumaPosImpares + $valor;
        $contImpares++; // para luego hacer la media
        if ($valor > $mayorImpares) { // si el valor es mayor, lo meto en $mayorImpares
            $mayorImpares = $valor;
        }
    }

    if ($valor % 2 == 0) { // el valor es par
        $valoresPares++;
    } else { // el valor es impar
        $valoresImpares++;
    }
}

// Media de cada grupo
$mediaPares = $sumaPosPares / $contPares;
$mediaImpares = $sumaPosImpares / $contImpares;


var_dump($aleatorio);

print("<br> Suma de las posiciones pares: ". $sumaPosPares);
print("<br> Suma de las posiciones impares: " . $sumaPosImpares);

print("<br> Media del grupo par: " . $mediaPares);
print("<br> Media del grupo impar: " . $mediaImpares);

print("<br> Mayor valor del grupo par " . $mayorPares);
print("<br> Mayor valor del grupo impar " . $mayorImpares);

print("<br> Número de valores pares: " . $valoresPares);
print("<br> Número de valores impares: " . $valoresImpares);



?>