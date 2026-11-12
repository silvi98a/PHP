<?php
require_once '../funciones_bolsa.php';
function customError($errno, $errstr) { //función de errores
  echo "<b>Error:</b> $errstr";
}
set_error_handler("customError"); //manejador de errores

$fichero = leer_fichero('../../files/ibex35.txt'); //llamo a la función leer fichero
$lineas = explode("\n", $fichero); // guardo en $lineas el contenido del fichero por cada salto de línea
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bolsa1.php</title>
</head>

<body>
    <h2>Valores del IBEX35</h2>

    <table>
        <tr>
            <td>Valor</td>
            <td>Último</td>
            <td>Var. %</td>
            <td>Var.</td>
            <td>Ac. % año</td>
            <td>Máx.</td>
            <td>Mín.</td>
            <td>Vol.</td>
            <td>Capit.</td>
        </tr>

        <?php
        for ($n = 1; $n < count($lineas); $n++) {// empieza en 1: salta la cabecera del .txt porque la he excrito a mano con los <td>
            $linea = trim($lineas[$n]); //quito espacios con trim

            if ($linea != "") {
                while (strpos($linea, "  ") !== false) {  //busco dos espacios seguidos (devuelve false si no los encuentra)
                    $linea = str_replace("  ", " ", $linea); // mientras haya dos espacios, replace los cambiará por un solo espacio.
                }

                $campos = explode(" ", $linea); // meto en un array cada valor que encuentro después de un espacio ' '
                $total = count($campos); //posición de la 0 a la 11 (algunos tienen 2-3nombres como AMADEUS IT GROUP) aquí total vale 12. 3 nombres + 9 datos = 12

                // el nombre son todos los campos menos los 9 últimos que son los datos (Último, Var.%....)
                // Si hay 12 campos y 9 son datos, el nombre ocupa los primeros 12 - 9 = 3. El bucle va de 0 a 2 y los une con espacios: "AMADEUS IT GROUP ". 
                // Para ACS, $total es 10, así que solo une 1 campo
                $nombre = "";
                for ($i = 0; $i < $total - 9; $i++) {
                    $nombre = $nombre . $campos[$i] . " ";
                }

                echo "<tr>";
                echo "<td>" . trim($nombre) . "</td>"; //quita el espacio que sobra del final de nombre
                for ($i = $total - 9; $i < $total - 1; $i++) {// se imprime 8 celdas, sin la Hora
                    echo "<td>" . $campos[$i] . "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>