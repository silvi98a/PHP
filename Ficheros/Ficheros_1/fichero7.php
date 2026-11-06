<HTML>

<HEAD>
    <TITLE> Operaciones Sistema Ficheros </TITLE>
</HEAD>

<BODY>

    <form name='sistema' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Fichero Origen (Ruta/nombre): *
        <br>
        <input type='text' name='origen' value='' size=15><br>

        Fichero Destino (Ruta/nombre): *
        <br>
        <input type='text' name='destino' value='' size=15><br>

        Operación:
        <br>
        <input type='radio' name="operacion" value='copiar' checked>Copiar fichero<br>
        <input type='radio' name="operacion" value='renombrar'>Renombrar fichero<br>
        <input type='radio' name="operacion" value='borrar'>Borrar fichero<br><br>

        <input type="submit" value="Ejecutar operación">
        <input type="reset" value="Borrar">

    </form>

    <?php
    require_once 'funciones.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $origen = funcion_limpiar($_POST['origen']);
        $destino = funcion_limpiar($_POST['destino']);
        $operacion = $_POST['operacion'];

        if (!existe_fichero($origen)) { //si el fichero origen no existe, da error.
            echo "<p>Error: el fichero origen no existe.</p>";
        } else {
            echo "<h3>Resultado de la operación</h3>";

            if ($operacion != "borrar") {
                $carpeta = dirname($destino); //saca solo la carpeta del destino
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true); //crea la carpeta (y las intermedias) si no existe. 0777 es permisos (leer, escribir y entrar al fichero)
                }
            }

            if ($operacion == "copiar") {
                copy($origen, $destino); //copy hace una copia del fichero. El original se queda donde estaba y aparece un segundo fichero en el destino.
                echo "Fichero copiado correctamente.<br>";
                echo "Origen: $origen<br>";
                echo "Destino: $destino<br>";
            }

            if ($operacion == "renombrar") {
                rename($origen, $destino); //cambio el nombre o mueve el fichero a otra carpeta.
                echo "Fichero renombrado correctamente.<br>"; //si el destino es la misma carpeta que el origen, cambia solo el nombre.
                echo "Origen: $origen<br>";
                echo "Destino: $destino<br>";
            }

            if ($operacion == "borrar") {
                unlink($origen); //borra el fichero
                echo "Fichero borrado correctamente.<br>";
                echo "Origen: $origen<br>";
            }
        }
    }
    ?>

</BODY>

</HTML>