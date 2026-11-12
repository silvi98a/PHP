<HTML>

<HEAD>
    <TITLE> Bolsa2.php </TITLE>
</HEAD>

<BODY>

    <FORM name='bolsa2' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Nombre del valor:
        <br>
        <input type='text' name='nombre' value='' size=15><br>
        <input type="submit" value="Buscar valor">
        <input type="reset" value="Limpiar">

    </FORM>

    <?php
    require_once '../funciones_bolsa.php';
    set_error_handler("customError"); //manejador de errores
    
    $fichero = leer_fichero('../../files/ibex35.txt'); //llamo a la función leer fichero
    $lineas = explode("\n", $fichero); // guardo en $lineas el contenido del fichero por cada salto de línea
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = funcion_limpiar($_POST['nombre']);
        $encontrado = false;

        for ($n = 1; $n < count($lineas); $n++) {// empieza en 1: salta la cabecera del .txt porque la he excrito a mano con los <td>
            $linea = trim($lineas[$n]); //quito espacios con trim
    
            if ($linea != "") {
                while (strpos($linea, "  ") !== false) {
                    $linea = str_replace("  ", " ", $linea);
                }

                $campos = explode(" ", $linea);
                $total = count($campos);

                $valor = "";
                for ($i = 0; $i < $total - 9; $i++) {
                    $valor = $valor . $campos[$i] . " ";
                }
                $valor = trim($valor);

                if (strtoupper($valor) == strtoupper($nombre)) { //si el valor introducido es igual al que está en el .txt
                    $encontrado = true;
                    $d = $total - 9; // posición del primer dato. Ej: AMADEUS (12 campos) → 12 - 9 = 3, que es "72,28" (el Último)
    
                    echo "<h3>Datos de cotización de $valor</h3>";
                    echo "Valor: $valor<br>";
                    echo "Último: " . $campos[$d] . "<br>"; // $d -> primer dato
                    echo "Variación %: " . $campos[$d + 1] . "<br>"; // $d + 1 siguiente dato 
                    echo "Variación: " . $campos[$d + 2] . "<br>";
                    echo "Ac. % año: " . $campos[$d + 3] . "<br>";
                    echo "Máximo: " . $campos[$d + 4] . "<br>";
                    echo "Mínimo: " . $campos[$d + 5] . "<br>";
                    echo "Volumen: " . $campos[$d + 6] . "<br>";
                    echo "Capitalización: " . $campos[$d + 7] . "<br>";
                }
            }

        }
        if (!$encontrado) {
            echo "<p>Error: el valor '$nombre' no existe.</p>";
        }
    }

    ?>


</BODY>

</HTML>