<?php

$primero = array("Programación", "Bases de Datos", "Lenguajes de Marcas", "Sistemas Informáticos");
$segundo = ["DWES", "DWEC", "Despliegue", "Diseño de Interfaces Web"];
$optativas = ["Inglés Profesional", "Digitalización"];

// a. Unir los tres arrays sin funciones de arrays
$union = array(); // creo un array vacio

foreach($primero as $valor) {
    $union[] = $valor; // lo que hace es coger el valor de cada posición del array $primero y lo 
}                       // mete en la siguiente posición libre.
foreach($segundo as $valor) {
    $union[] = $valor;
}
foreach($optativas as $valor) {
    $union[] = $valor;
}

// b. Lo mismo con array_merge()
$union = array_merge($primero, $segundo, $optativas); //hago lo mismo que en las líneas 10-18, pero simplificado con merge
                                                    // mete en el array nuevo según el orden en el que se ponga los nombres
                                                  // de los otros arrays (los que existen)
// c. Añadir "Proyecto Intermodular"                                                  
$union[] = "Proyecto Intermodular"; //se mete en la última posición del array

// d. Comprobar si "DWES" está en el array
if (in_array("DWES", $union)) { // hay que poner el nombre tal cual está registrado porque sino, no lo encuentra
    print("DWES está en el array");
} else {
    print("DWES no está en el array");
}

// e. Posición de "DWES"
print("<br> Posición en el array de DWES: " . array_search("DWES", $union));

// f. Eliminar un módulo indicado
unset($union[array_search("Digitalización", $union)]); // se lee de dentro hacia fuera

// g. Ordenar alfabéticamente
sort($union);

// h. Mostrar con una lista HTML
print("<ul>");
foreach($union as $valor) {
    print("<li>" . $valor . "</li>");
}
print("</ul>");

?>