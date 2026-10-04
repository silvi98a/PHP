<?php

// Matriz de 3 filas x 4 columnas
$matriz = array(
    array(1, 2, 3, 4),
    array(5, 6, 7, 8),
    array(9, 10, 11, 12)
);

$traspuesta = array();

// a. Traspuesta: las filas pasan a ser columnas y las columnas pasan a ser filas
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 4; $columna++) {
        $traspuesta[$columna][$fila] = $matriz[$fila][$columna]; // se intercambian los índices
    }
}

// Matriz original (3x4)
print("Matriz original (3x4): <br>");
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 4; $columna++) {
        print($matriz[$fila][$columna] . " ");
    }
    print("<br>");
}

// Traspuesta (4x3: ahora tiene 4 filas y 3 columnas)
print("<br> Matriz traspuesta (4x3): <br>");
for ($fila = 0; $fila < 4; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        print($traspuesta[$fila][$columna] . " ");
    }
    print("<br>");
}

?>