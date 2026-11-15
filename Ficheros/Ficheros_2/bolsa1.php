<?php
require_once '../funciones_bolsa.php';
set_error_handler("customError"); //manejador de errores

$fichero = leerFicheroMejorado('../../files/ibex35.txt', " "); //llamo a la función leer fichero
array_shift($fichero); // quito la primera línea (la cabecera del .txt)
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
        foreach ($fichero as $campos) { // cada $campos es una línea ya separada por " "

            // si la línea tenía espacios dobles, explode deja campos vacíos: los quito
            $campos = array_values(array_filter($campos, 'strlen'));
            $total = count($campos);

            if ($total > 0) {
                // el nombre son todos los campos menos los 9 últimos
                $nombre = "";
                for ($i = 0; $i < $total - 9; $i++) {
                    $nombre = $nombre . $campos[$i] . " ";
                }

                echo "<tr>";
                echo "<td>" . trim($nombre) . "</td>";
                for ($i = $total - 9; $i < $total - 1; $i++) { // 8 celdas, sin la Hora
                    echo "<td>" . $campos[$i] . "</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>