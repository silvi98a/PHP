<?php
$indice = [];
$impares = [];
$suma = [];


//primer bucle para hacer el índice (tabla Índice)
for ($x=0; $x<20; $x++) {
    $indice[$x] = 0+$x;
    }

//segundo bucle para meter los impares (tabla Valor)
for ($i=0; $i<20; $i++) {
    $impares[$i] = 2 * $i + 1;
}

//tercer bucle para las sumas (tabla Suma)
//sumo el valor actual al total anterior
$valorActual = 0; //creo una variable para ir acumulando los valores actuales
for ($j=0; $j<20; $j++) {
    $valorActual = $valorActual + $impares[$j]; //explicado en mi cuaderno
    $suma[$j] = $valorActual;
}

//Las tablas
echo "<table border='1'>";
echo "<tr><th>Indice</th><th>Valor</th><th>Suma</th></tr>";

for ($k=0; $k<20; $k++) {
    echo "<tr>";
    echo "<td>" . $indice[$k] . "</td>";
    echo "<td>" . $impares[$k] . "</td>";
    echo "<td>" . $suma[$k] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>

