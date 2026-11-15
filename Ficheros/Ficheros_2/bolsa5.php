<?php
require_once '../funciones_bolsa.php';
set_error_handler("customError"); //manejador de errores

$fichero = leerFicheroMejorado('../../files/ibex35.txt', " ");
array_shift($fichero); // quito la cabecera del .txt

$capitalizacion = 0;
$volumen = 0;

foreach ($fichero as $campos) { // cada $campos es una línea ya separada por " "

    // si la línea tenía espacios dobles, explode deja campos vacíos: los quito
    $campos = array_values(array_filter($campos, 'strlen'));
    $total = count($campos);

    if ($total > 0) {
        //quito los puntos de los miles (4.264 pasa a 4264) para poder sumarlos como números.
        //la capitalización es el penúltimo campo y el volumen el antepenúltimo
        $capitalizacion += str_replace(".", "", $campos[$total - 2]);
        $volumen += str_replace(".", "", $campos[$total - 3]);
    }
}
?>

<HTML>

<HEAD>
    <TITLE> Bolsa5.php </TITLE>
</HEAD>

<BODY>

    <FORM name='bolsa5' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Mostrar:
        <select name="opcion">
            <option value="capitalizacion">Total Capitalización</option>
            <option value="volumen">Total Volumen</option>
        </select><br>

        <input type="submit" value="Visualizar">
        <input type="reset" value="Borrar">

    </FORM>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Resultado</h3>";

        if ($_POST['opcion'] == "capitalizacion") {
            echo "Total Capitalización: $capitalizacion";
        } else {
            echo "Total Volumen: $volumen";
        }
    }
    ?>

</BODY>

</HTML>