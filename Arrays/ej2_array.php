<?php
$dia = array();
$temperaturas = array (18, 21, 19, 24, 25, 22, 20, 26, 23, 21); 

$diferenciaDia = array();

$tempMax = 0;
$diaMax = 1;
$tempMin = 30; //les asigno un valor para luego poder ir hacia atrás en el bucle
$diaMin = 10; // ""     ""     ""

$totalMedia = 0;
$tempMedia = 0;

$diasEncimaMedia = 0;

for ($x = 0; $x < count($temperaturas); $x++) {
    $dia[$x] = 1 + $x; //primera columna

    // Diferencia de temperatura entre el día de antes y el actual.
    if ($x == 0) {
        $diferenciaDia[$x] = "-";
    } else {
        $diferenciaDia[$x] = $temperaturas[$x] - $temperaturas[$x - 1];
    }

    // Temperaturas máxima y día
    if ($temperaturas[$x] > $tempMax) { // comparo si las temp son máximas para guardar el máximo valor.
        $tempMax = $temperaturas[$x]; // si hay un valor más alto, lo guardo en tempMax
        $diaMax = $dia[$x]; // guardo el día en el que ha habido más temperatura.
    }

    // Temperaturas mínima y día
    if ($temperaturas[$x] < $tempMin) {
        $tempMin = $temperaturas[$x];
        $diaMin = $dia[$x]; // 
    }

    // Temperatura media
    $totalMedia += $temperaturas[$x];

    //Lo que imprime la tabla.
    echo " ". $dia[$x] . " " . $temperaturas[$x] . " " . $diferenciaDia[$x] . "<br>";

}

// Importante que esté le media hecha para luego usarla en la media de días (párrafo siguiente)
$tempMedia = $totalMedia / count($temperaturas);

    
// Números de días por encima de la media
// Creo otro bucle una vez que tengo la media (párrafo anterior)
for ($y = 0; $y < count($temperaturas); $y++) {
    if ($temperaturas[$y] > $tempMedia) {
        $diasEncimaMedia++;
    }
}



    echo " <br> Temperatura máxima: " . $tempMax . "º. Se ha producido en el día: " . $diaMax . "";
    echo " <br> Temperatura mínima: " . $tempMin . "º. Se ha producido en el día: " . $diaMin . "";
    echo " <br> Temperatura media: " . $tempMedia . "";
    echo " <br> Número de días por encima de la media: " . $diasEncimaMedia . "";


/*var_dump($dia);
var_dump($temperaturas);
var_dump($diferenciaDia);
*/

?>