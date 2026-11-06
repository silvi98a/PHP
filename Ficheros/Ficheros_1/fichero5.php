<HTML>

<HEAD>
    <TITLE> Operaciones Ficheros </TITLE>
</HEAD>

<BODY>

    <FORM name='operaciones' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Fichero (Ruta/nombre): *
        <br>
        <input type='text' name='ruta' value='' size=15><br>

        Operaciones:
        <br>
        <input type='radio' name="operacion" value='mostrarFichero' checked>Mostrar fichero<br>

        <input type='radio' name="operacion" value='mostrarLinea'>Mostrar línea
        <input type="number" name="linea" min="1" max="5" value="1"><br>

        <input type="radio" name="operacion" value="mostrarN">Mostrar N primeras líneas
        <input type="number" name="lineas" min="1" max="10" value="5"><br><br>

        <input type="submit" value="Ejecutar operación">
        <input type="reset" value="Borrar">

    </FORM>
    <?php
    require_once '../funciones.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ruta = funcion_limpiar($_POST['ruta']);
        $operacion = $_POST['operacion'];

        if (!existe_fichero($ruta)) {
            echo "<p>Error: el fichero no existe.</p>";
        } else {
            $lineas = explode("\n", leer_fichero($ruta));
            $total = count($lineas);

            echo "<h3>Contenido del fichero</h3>";

            if ($operacion == "mostrarFichero") {
                for ($i = 0; $i < $total; $i++) {
                    echo "Línea " . ($i + 1) . ": " . funcion_limpiar($lineas[$i]) . "<br>";
                }
            }

            if ($operacion == "mostrarLinea") {
                $n = funcion_limpiar($_POST['linea']); //coge el número que le haya puesto en ese apartado del formulario
                if ($n <= $total) {
                    echo "Línea $n: " . funcion_limpiar($lineas[$n - 1]);
                } else {
                    echo "Error: el fichero no tiene la línea $n.";
                }
            }

            if ($operacion == "mostrarN") {
                $n = funcion_limpiar($_POST['lineas']); //coge el número que le haya puesto en ese apartado del formulario
                for ($i = 0; $i < $n && $i < $total; $i++) {
                    echo "Línea " . ($i + 1) . ": " . funcion_limpiar($lineas[$i]) . "<br>";
                }
            }
        }
    }
    ?>
</BODY>

</HTML>