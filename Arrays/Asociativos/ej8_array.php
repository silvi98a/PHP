<?php

// Array asociativo: la clave es el código del producto y el valor es su precio
$productos = array("MON01" => 189.99, "TEC02" => 45.50, "RAT03" => 25.99, "SSD04" => 79.95, "RAM05" => 54.00);

$masCaro = 0;
$masCaroCodigo = "";

$masBarato = 500; // precio alto, así cualquier precio es menor
$masBaratoCodigo = "";

$suma = 0;
$contador = 0;

$codigoBuscar = "SSD04"; // Código que quiero comprobar

// a. Mostrar todos los productos y sus precios
// (en el mismo bucle calculo el más caro, el más barato y la suma)
print("Productos: <br>");
foreach($productos as $codigo => $precio) {
    print($codigo . ": " . $precio . "€ <br>");

    if ($precio > $masCaro) { // si el precio es mayor, guardo el precio y el código
        $masCaro = $precio;
        $masCaroCodigo = $codigo;
    }
    if ($precio < $masBarato) { // si el precio es menor, guardo el precio y el código
        $masBarato = $precio;
        $masBaratoCodigo = $codigo;
    }

    $suma = $suma + $precio; // Para hacer la media igual que con nota y alumno (el ejercicio de antes)
    $contador++;
}

// b. Producto más caro y más barato
print("<br> Producto más caro: " . $masCaroCodigo . " a " . $masCaro . "€");
print("<br> Producto más barato: " . $masBaratoCodigo . " a " . $masBarato . "€");

// c. Precio medio
$media = $suma / $contador;
print("<br> Precio medio: " . $media . "€");

// d. Productos cuyo precio supera la media
print("<br><br> Productos que superan la media: <br>");
foreach($productos as $codigo => $precio) {
    if ($precio > $media) {
        print($codigo . ": " . $precio . "€ <br>");
    }
}

// e. Ordenar por precio ascendente
asort($productos); // ordena por valor (precio) y mantiene los códigos
print("<br> Ordenados por precio (ascendente): <br>");
foreach($productos as $codigo => $precio) {
    print($codigo . ": " . $precio . "€ <br>");
}

// f. Ordenar por código de producto
ksort($productos); // ordena por clave (código) y mantiene los precios
print("<br> Ordenados por código: <br>");
foreach($productos as $codigo => $precio) {
    print($codigo . ": " . $precio . "€ <br>");
}

// g. Comprobar si existe un código concreto
if (array_key_exists($codigoBuscar, $productos)) {
    print("<br> El código " . $codigoBuscar . " SÍ existe");
} else {
    print("<br> El código " . $codigoBuscar . " NO existe");
}

?>