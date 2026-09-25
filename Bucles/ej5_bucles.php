<HTML>
<HEAD><TITLE> EJ5 Bucles - Factorial </TITLE></HEAD>
<BODY>
<?php
    $num = 5;
    $factorial = 1; //aquí se irá acumulando el resultado. Empieza en 1 (no en 0), 
                    //porque si empezara en 0, cualquier multiplicación daría siempre 0.
    
    print("$num! = "); //imprimo antes del bucle porque solo se hace 1 vez

    for ($i=$num; $i>=1; $i--) //empieza en 5, incrementa mientras que sea mayor o igual que uno. El contador en vez de sumar, resta 1 en cada vuelta.
    {                          //por eso el bucle va de mayor a menor 5, 4, 3, 2, 1
        $factorial = $factorial * $i; //multiplica lo que hay dentro de factorial por el número actual del contador y lo guarda en la misma variable.
        print("$i "); //imprime el valor del contador en cada vuelta

        if ($i > 1) // si el contador es mayor que 1, imprime la x entre número y número
        {
            print("x ");
        }
    }

    print("= $factorial <br>"); //cuando sale del bucle, imprime el = con el número final que se acumula en factorial
?>
</BODY>
</HTML>