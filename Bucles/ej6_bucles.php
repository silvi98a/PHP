<HTML>
<HEAD><TITLE> EJ6 Bucles – Simulador de ahorro </TITLE></HEAD>
<BODY>
<?php
    $capital = 1000;
    $interes = 5;
    $anios = 5; //se deja en 5 porque son 5 años lo que queremos saber.

    print("Capital inicial: $capital € <br>"); //imprimo antes del bucle porque solo se hace 1 vez

    for ($i=1; $i<=$anios; $i++) //empieza en 1, incrementa mientras sea menor o igual que anios
    {
        $capital = $capital + ($capital * $interes / 100); //le suma al capital el interés de ese año y lo guarda en la misma variable
        $capital = round($capital, 2); //redondeo a 2 decimales para que se vea como dinero

        print("Año $i: $capital € <br>"); //imprime el año y el capital de ese momento
    }

    print("Capital final: $capital €"); //cuando sale del bucle, imprime el capital final acumulado
?>
</BODY>
</HTML>

<!--Ejercicio explicado en mi cuaderno con dibujos-->