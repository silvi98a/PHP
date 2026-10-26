<HTML>

<HEAD>
    <TITLE> Cambio de base </TITLE>
</HEAD>

<BODY>

    <form name='cambiobase' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Número decimal:
        <input type='text' name='decimal' value='' size=15><br>

        Selecciona base:
        <br>
        <input type='radio' name='base' value='binario' checked>Binario<br>
        <input type='radio' name='base' value='octal'>Octal<br>
        <input type='radio' name='base' value='hexadecimal'>Hexadecimal<br>
        <input type='radio' name='base' value='todos'>Todos a la vez<br>

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

function decimal_a_base($numero, $base) {
    return strtoupper(base_convert($numero, 10, $base)); //el base convert es 
}

function binario($numero) {
    return decimal_a_base($numero, 2);
}

function octal($numero) {
    return decimal_a_base($numero, 8);
}

function hexadecimal($numero) {
    return decimal_a_base($numero, 16);
}

function todos($numero) {
    echo "Binario: " . binario($numero) . "<br>";
    echo "Octal: " . octal($numero) . "<br>";
    echo "Hexadecimal: " . hexadecimal($numero);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "El method que ha usado es: ", $_SERVER['REQUEST_METHOD'], "<br>";

    $decimal = (int) funcion_limpiar($_POST['decimal']);
    $base = funcion_limpiar($_POST['base']);

    echo "Número decimal: " . $decimal, "<br>";
    echo "Base escogida: " . $base, "<br>";

    switch ($base) {
        case 'binario':
            echo "Binario: " . binario($decimal);
            break;
        case 'octal':
            echo "Octal: " . octal($decimal);
            break;
        case 'hexadecimal':
            echo "Hexadecimal: " . hexadecimal($decimal);
            break;
        case 'todos':
            todos($decimal);
            break;
    }
}
?>