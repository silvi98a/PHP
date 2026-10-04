<?php

// Matriz de 3 filas x 5 columnas (la del ejercicio 3)
$matriz = array(
    array(2, 4, 6, 9, 7), // fila 0
    array(8, 10, 12, 1, 12), // fila 1
    array(14, 16, 88, 3, 15) // fila 2
);

$mayor = 0;
$filaMayor = 0;
$columnaMayor = 0;

// Recorro toda la matriz: el for de fuera las filas y el de dentro las columnas
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 5; $columna++) {
        if ($matriz[$fila][$columna] > $mayor) { // si el elemento es mayor, guardo el valor, la fila y la columna
            $mayor = $matriz[$fila][$columna];
            $filaMayor = $fila;
            $columnaMayor = $columna;
        }
    }
}

// +1 porque los índices empiezan en 0 y en la figura empiezan en 1
print("Elemento Mayor " . $mayor . " – fila " . ($filaMayor + 1) . " columna " . ($columnaMayor + 1));
                                                 //Sino, saldría fila 2 columna 2
?>