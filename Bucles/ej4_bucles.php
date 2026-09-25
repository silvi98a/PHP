<HTML>
<HEAD><TITLE> EJ4 Bucles – Número primo </TITLE></HEAD>
<BODY>
<?php
 $num = 17;

    print("Número analizado: $num <br>");

    for ($i=2; $i<$num; $i++) //el contador empieza en 2 hasta el <17.
    {
        if ($num % $i == 0) //si num es divisible entre el i (contador que va incrementando en cada vuelta) y da 0
        {
            print("Probando divisor $i → Divisible <br>"); //es divisible
        } 
        else 
        {
            print("Probando divisor $i → No divisible <br>"); //no es divisible
        }
    }

    if ($i == $num) //si contador llega al número pedido ($num) -> contador 17 y num 17, entonces
    {
        print("$num es un número primo. <br>"); //el número pedido ($num) es primo
    } 
    else 
    {
        print("$num no es un número primo. <br>"); //el número pedido ($num) no es primo
    }
?>

</BODY>
</HTML>