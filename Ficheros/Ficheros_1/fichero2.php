<HTML>

<HEAD>
    <TITLE> Fichero 2 </TITLE>
</HEAD>

<BODY>

    <h2> Datos del alumno </h2>
    Guardar datos de alumnos en fichero de texto (con delimitadores ##)

    <form name='fichero2' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Nombre: *
        <input type='text' name='nombre' value='' size=15><br>

        Apellido 1: *
        <input type='text' name='apellido1' value='' size=15><br>

        Apellido 2: *
        <input type='text' name='apellido2' value='' size=15><br>

        Fecha nacimiento: *
        <input type='date' name='fecha' value=''><br>

        Localidad: *
        <input type='text' name='localidad' value='' size=15><br>

        <input type="submit" value="Guardar alumno">

        <input type="reset" value="Limpiar">

    </FORM>
</BODY>

</HTML>


<?php

require_once 'funciones.php'; // carga las funciones

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "El method que ha usado es: ", $_SERVER['REQUEST_METHOD'], "<br>";

    $nombre = funcion_limpiar($_POST['nombre']);
    $apellido1 = funcion_limpiar($_POST['apellido1']);
    $apellido2 = funcion_limpiar($_POST['apellido2']);
    $fecha = funcion_limpiar($_POST['fecha']);
    $localidad = funcion_limpiar($_POST['localidad']);

    if (comprobar_obligatorios($nombre, $apellido1, $apellido2, $fecha, $localidad)) {
        $fecha = date("d/m/Y", strtotime($fecha));
        guardar_alumno($nombre, $apellido1, $apellido2, $fecha, $localidad);
        echo "Alumno guardado correctamente";
    } else {
        echo "Faltan campos obligatorios";
    }
}
?>


<!--
HECHO
is_empty
is_null
comprobar_obligatorios



f_ride -> leer ficheros ver diferencia file_put_content


HECHO
meter # entre los elementos-->


