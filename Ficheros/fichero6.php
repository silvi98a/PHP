<HTML>

<HEAD>
    <TITLE> Datos Fichero </TITLE>
</HEAD>

<BODY>

    <form name='datos' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Fichero (Ruta/nombre): *
        <br>
        <input type='text' name='ruta' value='' size=15><br><br>

        <input type="submit" value="Ver datos fichero">
        <input type="reset" value="Borrar">

    </form>

    <?php
    require_once 'funciones.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ruta = funcion_limpiar($_POST['ruta']); //coge la ruta del formulario ya limpia

        if (!existe_fichero($ruta)) { //si el fichero no existe, da error.
            echo "<p>Error: el fichero no existe.</p>";
        } else {
            echo "<h3>Datos del fichero</h3>";
            echo "Nombre: " . basename($ruta) . "<br>"; //solo el nombre del fichero
            echo "Ruta: " . htmlspecialchars(realpath($ruta)) . "<br>"; //real path da la ruta completa. htmlspecialchars convierte a texto para evitar inyección de código
            echo "Tamaño: " . filesize($ruta) . " bytes<br>"; //filesize da tamaño en bytes. 
            echo "Último acceso: " . date("d/m/Y", fileatime($ruta)) . "<br>"; //fileatime devuelve cuándo se abrió el fichero por última vez
            echo "Última modificación: " . date("d/m/Y", filemtime($ruta)) . "<br>"; //filemtime última modificación
            echo "Tipo: " . strtoupper(pathinfo($ruta, PATHINFO_EXTENSION)) . "<br>"; //pathinfo saca la extensión y luego lo paso a mayúsculas
        }
    }
    ?>

</BODY>

</HTML>