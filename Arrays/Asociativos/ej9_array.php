<?php

// Array asociativo: la clave es el nombre y el valor es la nota
$notas = array("Yan" => 7.5, "Dani" => 4.2, "Angi" => 9.1, "Silvia" => 5.8, "Pepe" => 6.7, "Pepita" => 3.9);

$mayorNota = 0;
$mayorAlumno = "";

$menorNota = 10;
$menorAlumno = "";

$suma = 0;
$contador = 0;

$numAprobados = 0;
$numSuspensos = 0;

$aprobados = array(); 
$suspensos = array();

foreach($notas as $nombre => $nota) {
    if ($nota > $mayorNota) { // si la nota es mayor, guardo la nota y el nombre
        $mayorNota = $nota;
        $mayorAlumno = $nombre;
    }
    if ($nota < $menorNota) { // si la nota es menor, guardo la nota y el nombre
        $menorNota = $nota;
        $menorAlumno = $nombre;
    }

    $suma = $suma + $nota;
    $contador++;

    if ($nota >= 5) { // aprobado: lo cuento y lo meto en el array $aprobados
        $numAprobados++;
        $aprobados[$nombre] = $nota;
    } else { // suspenso: lo cuento y lo meto en el array $suspensos
        $numSuspensos++;
        $suspensos[$nombre] = $nota;
    }
}

// Nota media
$media = $suma / $contador;

// Porcentaje de aprobados
$porcentaje = ($numAprobados / $contador) * 100;

// a. Alumno con mayor nota
print("Alumno con mayor nota: " . $mayorAlumno . " (" . $mayorNota . ")");

// b. Alumno con menor nota
print("<br> Alumno con menor nota: " . $menorAlumno . " (" . $menorNota . ")");

// c. Nota media
print("<br> Nota media: " . $media);

// d. Número de aprobados y suspensos
print("<br> Número de aprobados: " . $numAprobados);
print("<br> Número de suspensos: " . $numSuspensos);

// e. Alumnos con nota superior a la media
print("<br><br> Alumnos con nota superior a la media: <br>");
foreach($notas as $nombre => $nota) {
    if ($nota > $media) {
        print($nombre . ": " . $nota . "<br>");
    }
}

// f. Listado ordenado de mayor a menor nota
arsort($notas); // ordena por valor (nota) de mayor a menor y mantiene los nombres
print("<br> Listado de mayor a menor nota: <br>");
foreach($notas as $nombre => $nota) {
    print($nombre . ": " . $nota . "<br>");
}

// g. Porcentaje de aprobados
print("<br> Porcentaje de aprobados: " . round($porcentaje, 2) . " %");

// h. Mostrar los nuevos arrays $aprobados y $suspensos
print("<br><br> Array aprobados: <br>");
foreach($aprobados as $nombre => $nota) {
    print($nombre . ": " . $nota . "<br>");
}

print("<br> Array suspensos: <br>");
foreach($suspensos as $nombre => $nota) {
    print($nombre . ": " . $nota . "<br>");
}

?>