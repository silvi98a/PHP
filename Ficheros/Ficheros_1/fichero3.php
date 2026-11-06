<h2>Listado de alumnos</h2>

<table>
    <tr>
        <th>Nombre</th>
        <th>Apellido 1</th>
        <th>Apellido 2</th>
        <th>Fecha nacimiento</th>
        <th>Localidad</th>
    </tr>

    <?php
    require_once '../funciones.php';

    $contador = 0;
    $contenido = leer_fichero("/../files/alumnos1.txt");
    $lineas = explode("\n", $contenido); 
    // trocea el texto por cada salto de línea (\n) y guarda cada trozo en el array $lineas (una posición por alumno)

    foreach ($lineas as $linea) {
        if (trim($linea) != "") { //mira si hay texto aún, si hay entra y si no hay, la ignora y pasa a la siguiente
            $nombre = trim(substr($linea, 0, 40)); //substr coge el texto de 0 a 40 y trim quita espacios
            $apellido1 = trim(substr($linea, 40, 41));
            $apellido2 = trim(substr($linea, 81, 42));
            $fecha = trim(substr($linea, 123, 10));
            $localidad = trim(substr($linea, 133, 27));

            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$apellido1</td>";
            echo "<td>$apellido2</td>";
            echo "<td>$fecha</td>";
            echo "<td>$localidad</td>";
            echo "</tr>";

            $contador++;
        }
    }
    ?>
</table>

<?php
echo "Se han leído $contador filas del fichero";
?>