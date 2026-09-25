<HTML>
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE></HEAD>
<BODY>
<?php
 $inicio = 1;
 $fin = 100;
 
 $cantidad = 0;
 $pares = 0;
 $impares = 0;
 $multiplos3 = 0;
 $suma = 0;

 for($i=$inicio; $i<=$fin; $i++) // desde que i = 1 hasta que i sea = 100
 {                                    // que i avance 1.
 
    $cantidad++; //acumulo en cantidades CUÁNTOS números habrá.
    $suma = $suma + $i; //los voy sumando en cada vuelta.

    if ($i % 2 == 0) //si 2 es divisible entre 0
        {
            $pares++; //acumulo los pares
        }
    else
        {
            $impares++; //acumulo los impares
        }

    if ($i % 3 == 0) // si 3 es divisible entre 0 (múltiplos de 3)
    {
        $multiplos3++; //acumulo los múltiplos de 3.
    }
 }

 print("Números del $inicio al $fin <br> <br>");
 print("Cantidad de números: $cantidad <br>");
 print("Números pares: $pares <br>");
 print("Números impares: $impares <br>");
 print("Múltiplos de 3: $multiplos3 <br>");
 print("Suma total: $suma <br>");

?>
</BODY>
</HTML>