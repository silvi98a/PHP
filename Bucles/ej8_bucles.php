<HTML>
<HEAD><TITLE> EJ8 Bucles – Conversor Decimal a base n </TITLE></HEAD>
<BODY>
<?php
    $num = 48; 
    $base = 8; //cambiar por 2, 4 o 6

    $n = $num; //lo que se va dividiendo
    $resultado = "";

    while ($n>0)
    {
        $resto = $n%$base; //el resto de dividir entre la base es el siguiente dígito
        $resultado = $resto . $resultado; //se pega por delante, los restos salen de derecha a izquierda
        $n = ($n-$resto) / $base; //quita el resto y divide entre la base, para que la división salga exacta
    }

    print("Numero $num en base $base = $resultado");
?>
</BODY>
</HTML>

<!-- Es el mismo programa que el ej7, pero cambiando el 2 por $base en las dos líneas donde se dividía -->