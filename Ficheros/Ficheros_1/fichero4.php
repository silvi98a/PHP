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
    $contenido = leer_fichero("../../files/alumnos2.txt");
    $lineas = explode("\n", $contenido); 
    // trocea el texto por cada salto de línea (\n) y guarda cada trozo en el array $lineas (una posición por alumno)

    foreach ($lineas as $linea) {
        if (trim($linea) != "") { //mira si hay texto aún, si hay entra y si no hay, la ignora y pasa a la siguiente
        $campos = explode("##", $linea); //LO QUE CAMBIA RESPECTO AL ANTERIOR
        //Lo que hace es guardar en el array $campos lo que encuentra ($campos[0] nombre, $campos[1] apellido) después de cada ## en $linea (que es quien tiene guardado lo que hay en el fichero)
        
        $nombre = $campos[0];
        $apellido1 = $campos[1];
        $apellido2 = $campos[2];
        $fecha = $campos[3];
        $localidad = $campos[4];

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