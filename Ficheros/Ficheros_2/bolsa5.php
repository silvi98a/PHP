<?php
require_once '../funciones_bolsa.php';

$lineas = explode("\n", leer_fichero('../../files/ibex35.txt'));
$capitalizacion = 0;
$volumen = 0;

for ($n = 1; $n < count($lineas); $n++) {
    $linea = trim($lineas[$n]);

    if ($linea != "") {
        while (strpos($linea, "  ") !== false) {
            $linea = str_replace("  ", " ", $linea);
        }

        $campos = explode(" ", $linea);
        $total = count($campos);

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