<?php

// Dos matrices de 3x3
$a = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

$b = array(
    array(2, 5, 1),
    array(1, 3, 2),
    array(0, 1, 3)
);

$suma = array();
$producto = array();

// a. Suma: cada elemento se suma con el que está en la misma posición de la otra matriz
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        $suma[$fila][$columna] = $a[$fila][$columna] + $b[$fila][$columna];
    }
}

// b. Producto: cada elemento es la fila de A multiplicada por la columna de B
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        $producto[$fila][$columna] = 0; // empieza en 0 para ir acumulando
        for ($k = 0; $k < 3; $k++) { // recorre la fila de A y la columna de B a la vez
            $producto[$fila][$columna] = $producto[$fila][$columna] + $a[$fila][$k] * $b[$k][$columna];
        }
    }
}

// Enseño las matrices
print("Matriz A: <br>");
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        print($a[$fila][$columna] . " ");
    }
    print("<br>");
}

print("<br> Matriz B: <br>");
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        print($b[$fila][$columna] . " ");
    }
    print("<br>");
}

print("<br> a. Suma <br>");
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        print($suma[$fila][$columna] . " ");
    }
    print("<br>");
}

print("<br> b. Producto <br>");
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 3; $columna++) {
        print($producto[$fila][$columna] . " ");
    }
    print("<br>");
}



// Explicado en el cuaderno

?>