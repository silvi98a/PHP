<HTML>
<HEAD><TITLE> EJ6 Bucles – Simulador de ahorro </TITLE></HEAD>
<BODY>
<?php
    $capital = 1000;
    $interes = 5;
    $anios = 5;

    print("Capital inicial: $capital &euro; <br>"); //imprimo antes del bucle porque solo se hace 1 vez

    for ($i=1; $i<=$anios; $i++) //empieza en 1, incrementa mientras sea menor o igual que anios
    {
        $capital = $capital + ($capital * $interes / 100); //le suma al capital el interés de ese año y lo guarda en la misma variable

        printf("Año %d: %.2f &euro; <br>", $i, $capital); //imprime el año y el capital con 2 decimales
    }

    printf("Capital final: %.2f &euro;", $capital); //cuando sale del bucle, imprime el capital final acumulado
?>
</BODY>
</HTML>