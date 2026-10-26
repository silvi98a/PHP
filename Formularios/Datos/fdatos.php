<HTML>

<HEAD>
    <TITLE> Datos Alumnos </TITLE>
</HEAD>

<BODY>

    <h2>Datos Alumnos</h2>

    <form name='datos' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Nombre:
        <input type='text' name='nombre' value='' size=15> * Obligatorio<br>

        Apellido1:
        <input type='text' name='apellido1' value='' size=15><br>

        Apellido2:
        <input type='text' name='apellido2' value='' size=15><br>

        Email:
        <input type='text' name='email' value='' size=15> * Obligatorio<br>

        Sexo:
        <input type='radio' name='sexo' value='Mujer'>Mujer
        <input type='radio' name='sexo' value='Hombre'>Hombre * Obligatorio<br>

        <input type="submit" value="Enviar">

        <input type="reset" value="Borrar">

    </FORM>
</BODY>

</HTML>

<?php

function funcion_limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function comprobar_obligatorios($nombre, $email, $sexo) {
    if ($nombre == "" || $email == "" || $sexo == "") {
        return false;
    } //valida que el usuario no deje un campo en blanco. Si la cadena está vacía, devuelve false y detiene el proceso
    return true;
}

function guardar_datos($nombre, $apellido1, $apellido2, $email, $sexo) {
    $linea = $nombre . ";" . $apellido1 . ";" . $apellido2 . ";" . $email . ";" . $sexo . "\n";
    file_put_contents(__DIR__ . "/datos.txt", $linea, FILE_APPEND); //sirve para escribir datos en el archivo de texto. 
} 
//file_put_contents abre el archivo, escribe datos y cierra el archivo.
//file_append lo que hace es escribir en una línea nueva y no borrar lo anterior
//__DIR__ lo que hace es guardar el archivo en la misma carpeta donde está el PHP
function mostrar_valores($nombre, $apellido1, $apellido2, $email, $sexo) {
    echo "Nombre: " . $nombre . "<br>";
    echo "Apellido 1: " . $apellido1 . "<br>";
    echo "Apellido 2: " . $apellido2 . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Sexo: " . $sexo . "<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "El method que ha usado es: ", $_SERVER['REQUEST_METHOD'], "<br>";

    $nombre = funcion_limpiar($_POST['nombre']);
    $apellido1 = funcion_limpiar($_POST['apellido1']);
    $apellido2 = funcion_limpiar($_POST['apellido2']);
    $email = funcion_limpiar($_POST['email']);
    $sexo = funcion_limpiar($_POST['sexo']);

    if (comprobar_obligatorios($nombre, $email, $sexo)) { //si están rellenos los campos, los guarda
        guardar_datos($nombre, $apellido1, $apellido2, $email, $sexo);
        echo "<h3>Datos guardados correctamente</h3>"; //sino, da error y pide los campos obligatorios.
        mostrar_valores($nombre, $apellido1, $apellido2, $email, $sexo);
    } else {
        echo "Faltan campos obligatorios: nombre, email y sexo";
    }
}
?>