<?php
require_once '../funciones_bolsa.php';
set_error_handler("customError"); //manejador de errores

$fichero = leerFicheroMejorado('../../files/ibex35.txt', " ");
array_shift($fichero); // quito la cabecera del .txt

$maximos = array();
$minimos = array();
$volumenes = array();
$capitalizaciones = array();

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

        $inicio_datos = $total - 9;
        // cotizaciones: la coma decimal pasa a punto para poder comparar
        $maximos[$valor] = str_replace(",", ".", $campos[$inicio_datos + 4]);
        $minimos[$valor] = str_replace(",", ".", $campos[$inicio_datos + 5]);
        // volumen y capitalización: quito los puntos de los miles
        $volumenes[$valor] = str_replace(".", "", $campos[$inicio_datos + 6]);
        $capitalizaciones[$valor] = str_replace(".", "", $campos[$inicio_datos + 7]);
    }
}
?>

<HTML>

<HEAD>
    <TITLE> Bolsa6.php </TITLE>
</HEAD>

<BODY>

    <FORM name='bolsa6' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
        <input type="submit" value="Mostrar valores relevantes">
    </FORM>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Resultados</h3>";

        echo "Valor con la máxima cotización: " . array_search(max($maximos), $maximos) . " (" . max($maximos) . ")<br>";
        echo "Valor con la mínima cotización: " . array_search(min($minimos), $minimos) . " (" . min($minimos) . ")<br>";
        echo "Valor con el mayor volumen negociado: " . array_search(max($volumenes), $volumenes) . " (" . max($volumenes) . ")<br>";
        echo "Valor con el menor volumen negociado: " . array_search(min($volumenes), $volumenes) . " (" . min($volumenes) . ")<br>";
        echo "Valor con la máxima capitalización: " . array_search(max($capitalizaciones), $capitalizaciones) . " (" . max($capitalizaciones) . ")<br>";
        echo "Valor con la mínima capitalización: " . array_search(min($capitalizaciones), $capitalizaciones) . " (" . min($capitalizaciones) . ")<br>";
    }
    ?>

</BODY>

</HTML>