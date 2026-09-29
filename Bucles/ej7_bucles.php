<HTML>
<HEAD><TITLE> EJ7 Bucles – Conversor a binario </TITLE></HEAD>
<BODY>
<?php
    $numero = 168; //número que queremos convertir (poner 128, 127, 1 o 2 en vez de 168)
    $n = $numero; //va dividiendo entre 2
    $binario = ""; //donde guardo el resultado

    while ($n>0) //mientras quede algo por dividir (mientras que $n sea mayor que 0, repetir bucle)
    {
        $resto = $n%2; //el resto es el siguiente dígito (0 o 1)
        $binario = $resto . $binario; //se pega por delante, los restos salen de derecha a izquierda
        $n = floor($n/2); //divide entre 2 y redondea hacia abajo (168 -> 84, 21 -> 10, 1 -> 0)
        //también se puede hacer así -> $n = ($n - $resto) / 2; //quita el resto y así la división sale exacta
    }

    print("Numero $numero en binario = $binario"); //imprime el número y su binario
?>
</BODY>
</HTML>

<!--Ejercicio explicado en mi cuaderno con dibujos -->