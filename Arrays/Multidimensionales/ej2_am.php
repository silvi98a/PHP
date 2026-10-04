<?php

$matriz = array();
$sumaFilas = array(0, 0, 0); // una suma por cada fila
$sumaColumnas = array(0, 0, 0); // una suma por cada columna
$numero = 2; // primer múltiplo de 2

// Relleno la matriz 3x3 con los sucesivos múltiplos de 2
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        $matriz[$fila][$columna] = $numero;
        $sumaFilas[$fila] = $sumaFilas[$fila] + $numero; // sumo el número a su fila
        $sumaColumnas[$columna] = $sumaColumnas[$columna] + $numero; // y a su columna
        $numero = $numero + 2; // siguiente múltiplo de 2
    }
}

// Muestro la suma por filas (una fila de tabla por cada suma)
print("SUMA POR FILAS:");
print("<table border='1'>");
for ($fila = 0; $fila < 3; $fila++) {
    print("<tr>");
    print("<td>" . $sumaFilas[$fila] . "</td>");
    print("</tr>");
}
print("</table>");

// Muestro la suma por columnas (una sola fila de tabla con tres celdas)
print("<br> SUMA POR COLUMNAS:");
print("<table border='1'>");
print("<tr>");
for ($columna = 0; $columna < 3; $columna++) {
    print("<td>" . $sumaColumnas[$columna] . "</td>");
}
print("</tr>");
print("</table>");


//Explicado en mi cuaderno

?>