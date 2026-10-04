<?php

// Array asociativo: la clave es el nombre y el valor es la edad
$alumnos = array("Yan" => 28, "Angi" => 23, "Dani" => 30, "Silvia" => 28, "Pepe" => 19);

// a. Mostrar el contenido del array con un bucle
foreach($alumnos as $nombre => $edad) { // lo mismo que los foreach anteriores
    print($nombre . " tiene " . $edad . " años <br>");
}

// b. Situar el puntero en la segunda posición y mostrar su valor
reset($alumnos); // coloca el puntero en la primera posición (esta vez no haría falta porque ya empezamos en la primera.)
next($alumnos); // avanza el puntero a la segunda posición
print("<br> Segunda posición: " . key($alumnos) . " tiene " . current($alumnos) . " años");

// c. Ordenar por edad de menor a mayor
asort($alumnos); // ordena por valor (edad) y mantiene los nombres

print("<br><br> Ordenado por edad: <br>");
foreach($alumnos as $nombre => $edad) {
    print($nombre . " tiene " . $edad . " años <br>");
}

reset($alumnos); // puntero a la primera posición
print("<br> Primera posición: " . key($alumnos) . " tiene " . current($alumnos) . " años");

end($alumnos); // puntero a la última posición
print("<br> Última posición: " . key($alumnos) . " tiene " . current($alumnos) . " años");

?>