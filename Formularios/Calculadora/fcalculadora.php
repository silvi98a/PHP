<HTML>

<HEAD>
    <TITLE> Calculadora </TITLE>
</HEAD>

<BODY>

    <form name='calculadora' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Operando 1:
        <input type='text' name='operando1' value='' size=15><br>

        Operando 2:
        <input type='text' name='operando2' value='' size=15><br>

        Selecciona operación:
        <br>
        <input type='radio' name='operacion' value='suma' checked>Suma</br>
        <input type='radio' name='operacion' value='resta'>Resta</br>
        <input type='radio' name='operacion' value='producto'>Producto</br>
        <input type='radio' name='operacion' value='division'>División</br>



        <input type="submit" value="Enviar"> <!--el submit en cuanto lo pinchamos, nos lleva al action-->

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

function suma($a, $b) {
    return $a + $b;
}

function resta($a, $b) {
    return $a - $b;
}

function producto($a, $b) {
    return $a * $b;
}

function division($a, $b) {
    if ($b == 0) {
        return "No se puede dividir entre 0";
    }
    return $a / $b;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "El method que ha usado es: ", $_SERVER['REQUEST_METHOD'], "<br>";

    $operando1 = funcion_limpiar($_POST['operando1']);
    $operando2 = funcion_limpiar($_POST['operando2']);
    $operacion = funcion_limpiar($_POST['operacion']);

    echo "Primer número: " . $operando1, "<br>";
    echo "Segundo número: " . $operando2, "<br>";
    echo "Opción escogida: " . $operacion, "<br>";

    switch ($operacion) {
        case 'suma':
            $resultado = suma($operando1, $operando2);
            break;
        case 'resta':
            $resultado = resta($operando1, $operando2);
            break;
        case 'producto':
            $resultado = producto($operando1, $operando2);
            break;
        case 'division':
            $resultado = division($operando1, $operando2);
            break;
    }

    echo "Resultado: " . $resultado;
}
?>