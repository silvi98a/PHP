<HTML>

<HEAD>
    <TITLE> Binario </TITLE>
</HEAD>

<BODY>

    <form name='binario' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Número decimal:
        <input type='text' name='decimal' value='' size=15><br> <!--el 'decimal' es el que llamaré desde el php -->

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

function decimal_a_binario($numero) {
    $binario = "";
    if ($numero == 0) {
        return "0";
    }
    while ($numero > 0) {
        $binario = ($numero % 2) . $binario;
        $numero = intdiv($numero, 2); // intdiv -> Devuelve el cociente entero -> dividend entre divisor
    }
    return $binario;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "El method que ha usado es: ", $_SERVER['REQUEST_METHOD'], "<br>";

    $decimal = funcion_limpiar($_POST['decimal']); //llamo al $decimal del html

    echo "Número decimal: " . $decimal, "<br>";

    $resultado = decimal_a_binario((int)$decimal);

    echo "Número binario: " . $resultado;
}
?>