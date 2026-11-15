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
    
    $fichero = leerFicheroMejorado('../../files/ibex35.txt', " ");
    array_shift($fichero); // quito la cabecera del .txt
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = funcion_limpiar($_POST['nombre']);
        $encontrado = false;

        foreach ($fichero as $campos) { // cada $campos es una línea ya separada por " "
    
            // si la línea tenía espacios dobles, explode deja campos vacíos: los quito
            $campos = array_values(array_filter($campos, 'strlen'));
            $total = count($campos);

            if ($total > 0) {
                $valor = "";
                for ($i = 0; $i < $total - 9; $i++) {
                    $valor = $valor . $campos[$i] . " ";
                }
                $valor = trim($valor);

                if (strtoupper($valor) == strtoupper($nombre)) { //si el valor introducido es igual al del .txt
                    $encontrado = true;
                    $d = $total - 9; // posición del primer dato
    
                    echo "<h3>Datos de cotización de $valor</h3>";
                    echo "Valor: $valor<br>";
                    echo "Último: " . $campos[$d] . "<br>";
                    echo "Variación %: " . $campos[$d + 1] . "<br>";
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
            trigger_error("El valor '$nombre' no existe.", E_USER_WARNING); // lo muestra customError (512)
        }
    }
    ?>

</BODY>

</HTML>