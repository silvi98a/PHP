<?php

// Matriz de 3 filas x 5 columnas. Son 3 arrays porque tiene 3 filas.
$matriz = array(
    array(2, 4, 6, 9, 7), // fila 0
    array(8, 10, 12, 1, 12), // fila 1
    array(14, 16, 88, 3, 15) // fila 2
);

// Primero por filas: el for de fuera recorre las filas y el de dentro las columnas
print("Filas <br>");
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 5; $columna++) {
        // +1 porque los índices empiezan en 0 y en la figura empiezan en 1
        print("(" . ($fila + 1) . "," . ($columna + 1) . ") = " . $matriz[$fila][$columna]);
        if ($columna < 4) { // para quitar el último guión de las columnas
            print(" - ");
        }
    }
    print("<br>");
}

// Luego columnas: ahora el for de fuera recorre las columnas y el de dentro las filas
print("<br> Columnas <br>");
for ($columna = 0; $columna < 5; $columna++) {
    for ($fila = 0; $fila < 3; $fila++) {
        print("(" . ($fila + 1) . "," . ($columna + 1) . ") = " . $matriz[$fila][$columna]);
        if ($fila < 2) { // para quitar el último guión de las filas
            print(" - ");
        }
    }
    print("<br>");
}


/*
Se accede con dos índices: $matriz[$fila][$columna]. El primero elige el array de 
dentro (la fila) y el segundo elige el valor dentro de ese array (la columna).
Por ejemplo, $matriz[1][3] es el 1: fila 1, columna 3. Es lo mismo que en el 
ejercicio 1 ($matriz[$fila][$columna] = $numero), con la diferencia de que allí se 
creaba la matriz con los bucles y aquí se escribe directamente.

Explicado en mi cuaderno.

*/
?>