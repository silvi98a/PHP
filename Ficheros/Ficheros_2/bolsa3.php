<?php
require_once '../funciones_bolsa.php';
set_error_handler("customError"); //manejador de errores

$fichero = leer_fichero('../../files/ibex35.txt');
$lineas = explode("\n", $fichero);

$nombres = array(); // lista de nombres para el desplegable
$datos = array();   // para cada nombre: último, máximo y mínimo

for ($n = 1; $n < count($lineas); $n++) {
    $linea = trim($lineas[$n]);

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

        $inicio_datos = $total - 9;
        $nombres[] = $valor;
        $datos[$valor] = array($campos[$inicio_datos], $campos[$inicio_datos + 4], $campos[$inicio_datos + 5]);
                                 // $inicio_datos tiene: Último (+0), Máximo (+4) y Mínimo (+5).
    }
}
?>

<HTML>

<HEAD>
    <TITLE> Bolsa3.php </TITLE>
</HEAD>

<BODY>

    <FORM name='bolsa3' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Valor bursátil:
        <br>
        <select name="nombre">
            <?php
            foreach ($nombres as $v) { // cada vuelta, $v guarda el elemento actual de $nombres (ACCIONA, ACERINOX...)
                echo "<option value='$v'>$v</option>"; // lo que se escribe <option value='ACCIONA'>ACCIONA</option>
            }                                      //Al enviar el formulario, $_POST['nombre'] es "ACCIONA", y con eso busca en $datos["ACCIONA"].
            ?>
        </select><br>

        <input type="submit" value="Visualizar">
        <input type="reset" value="Borrar">

    </FORM>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = funcion_limpiar($_POST['nombre']);

        if (isset($datos[$nombre])) {
            echo "<h3>Resultado</h3>";
            echo "Cotización de $nombre es " . $datos[$nombre][0] . "<br>";
            echo "Cotización Máxima de $nombre es " . $datos[$nombre][1] . "<br>";
            echo "Cotización Mínima de $nombre es " . $datos[$nombre][2] . "<br>";
        } else {
            echo "<p>Error: el valor no existe.</p>";
        }
    }
    ?>

</BODY>

</HTML>