<?php
// Un array para cada columna de la tabla
$decimal = array();
$binario = array();
$octal = array();
$hexadecimal = array();

for ($i = 0; $i <= 20; $i++) { // Genero los números del 0 al 20
    $decimal[$i] = $i;
}

foreach($decimal as $posicion => $valor) { // Recorro el array decimal y guardo cada valor en su array
    $binario[$posicion] = decbin($valor); // decbin convierte de decimal a binario
    $octal[$posicion] = decoct($valor); // decoct convierte de decimal a octal
    $hexadecimal[$posicion] = dechex($valor); // dechex convierte de decimal a hexadecimal
}

// La tabla
print("<table border='1'>");
    print("<tr>");
    print("<th>Decimal</th>");
    print("<th>Binario</th>");
    print("<th>Octal</th>");
    print("<th>Hexadecimal</th>");
print("</tr>");

foreach($decimal as $posicion => $valor) {
    print("<tr>");
    print("<td>" . $decimal[$posicion] . "</td>");
    print("<td>" . $binario[$posicion] . "</td>");
    print("<td>" . $octal[$posicion] . "</td>");
    print("<td>" . $hexadecimal[$posicion] . "</td>");
    print("</tr>");
}

print("</table>");

/*
var_dump($binario);
var_dump($octal);
var_dump($hexadecimal);
*/

?>