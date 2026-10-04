<?php

$matriz = array();
$numero = 2; // primer múltiplo de 2

// Relleno la matriz 3x3 con los sucesivos múltiplos de 2
// IMPORTANTE: el for de dentro da todas sus vueltas por cada vuelta del for de fuera
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        $matriz[$fila][$columna] = $numero;
        $numero = $numero + 2; // siguiente múltiplo de 2
    }
} // En cada vuelta se guarda $numero y luego se le suman 2 para la siguiente.

// Muestro la matriz por filas
print("<table border='1'>");

print("<tr>");
print("<th></th>");
print("<th>Col 1</th>");
print("<th>Col 2</th>");
print("<th>Col 3</th>");
print("</tr>");

for ($fila = 0; $fila < 3; $fila++) {
    print("<tr>"); // abre una fila de la tabla
    print("<th>Fila " . ($fila + 1) . "</th>"); // La variable $fila vale 0, 1, 2, pero en la figura los títulos son "Fila 1, Fila 2, Fila 3". Por eso se le suma 1 solo al mostrar el título.
    for ($columna = 0; $columna < 3; $columna++) {
        print("<td>" . $matriz[$fila][$columna] . "</td>"); // una celda
    }
    print("</tr>");
}

print("</table>");

//Explicado en mi cuaderno

?>