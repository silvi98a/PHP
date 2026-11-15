<?php
require_once '../funciones_bolsa.php';
set_error_handler("customError"); //manejador de errores

$fichero = leerFicheroMejorado('../../files/ibex35.txt', " ");
array_shift($fichero); // quito la cabecera del .txt

$nombres = array(); // lista de nombres para el desplegable
$datos = array();   // para cada nombre: último, máximo y mínimo

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
        $nombres[] = $valor;
        $datos[$valor] = array($campos[$inicio_datos], $campos[$inicio_datos + 4], $campos[$inicio_datos + 5]);
        // Último (+0), Máximo (+4) y Mínimo (+5)
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
        $encontrado = false;

        foreach ($datos as $valor => $cotizaciones) { //datos es el array que recorro. $valor guarda la clave (nombre empresa) y $cotizaciones guarda el contenido de la posición (que es otro array con los tres datos (Último, Máximo y Mínimo))
            if ($valor == $nombre) { // comparo el nombre del fichero con el del formulario
                $encontrado = true;
                echo "<h3>Resultado</h3>";
                echo "Cotización de $nombre es " . $cotizaciones[0] . "<br>";
                echo "Cotización Máxima de $nombre es " . $cotizaciones[1] . "<br>";
                echo "Cotización Mínima de $nombre es " . $cotizaciones[2] . "<br>";
            }
        }

        if (!$encontrado) {
            trigger_error("El valor que busca usted, NO existe.");
        }
    }
    ?>

</BODY>

</HTML>