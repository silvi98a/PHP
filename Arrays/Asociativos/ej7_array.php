<?php

// Array asociativo: la clave es el nombre y el valor es la nota
$alumnos = array("Yan" => 7, "Dani" => 4, "Angi" => 9, "Silvia" => 6, "Pepe" => 8);

$mayorNota = 0;
$mayorAlumno = "";

$menorNota = 10; // la nota más alta posible, así cualquier nota es menor que 10
$menorAlumno = "";

$suma = 0;
$contador = 0;

foreach($alumnos as $nombre => $nota) {
    if ($nota > $mayorNota) { // si la nota es mayor, guardo la nota y el nombre
        $mayorNota = $nota;
        $mayorAlumno = $nombre;
    }
    if ($nota < $menorNota) { // si la nota es menor, guardo la nota y el nombre
        $menorNota = $nota;
        $menorAlumno = $nombre;
    }
    $suma = $suma + $nota; // se van sumando las notas
    $contador++; // meto los alumnos que hay para hacer la media después
}

// Media de las notas
$media = $suma / $contador;

// a. Alumno con mayor nota
print("Alumno con mayor nota: " . $mayorAlumno . " (" . $mayorNota . ")");

// b. Alumno con menor nota
print("<br> Alumno con menor nota: " . $menorAlumno . " (" . $menorNota . ")");

// c. Media de las notas
print("<br> Media de las notas: " . $media);

?>