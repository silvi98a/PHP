<?php
require_once '../funciones_bolsa.php';
set_error_handler("customError"); //manejador de errores

$fichero = leerFicheroMejorado('../../files/ibex35.txt', " ");
array_shift($fichero); // quito la cabecera del .txt

$nombres = array(); // lista de nombres para el desplegable
$datos = array();   // para cada nombre: sus 8 datos

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
        // array_slice coge 8 elementos a partir de $inicio_datos (Último ... Capit., sin la hora)
        $datos[$valor] = array_slice($campos, $inicio_datos, 8);
    }
}

// nombres de los campos, en el mismo orden que los datos
$etiquetas = array("Último", "Variación %", "Variación", "Ac. % año", "Máximo", "Mínimo", "Volumen", "Capitalización");
?>
<HTML>

<HEAD>
    <TITLE> Bolsa4.php </TITLE>
</HEAD>

<BODY>

    <FORM name='bolsa4' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Valor bursátil:
        <br>
        <select name="nombre">
            <?php
            foreach ($nombres as $v) { //igual que en bolsa3.php
                echo "<option value='$v'>$v</option>";
            }
            ?>
        </select><br>

        Mostrar:
        <br>
        <select name="campo">
            <?php
            foreach ($etiquetas as $i => $e) { //recorre posición y elemento. El value es la posición y el texto es el elemento.
                echo "<option value='$i'>$e</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Visualizar">
        <input type="reset" value="Borrar">

    </FORM>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = funcion_limpiar($_POST['nombre']);
        $campo = $_POST['campo'];

        echo "<h3>Resultado</h3>";
        echo "El valor " . $etiquetas[$campo] . " de $nombre es " . $datos[$nombre][$campo];
    }
    ?>

</BODY>

</HTML>