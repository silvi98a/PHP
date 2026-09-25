<HTML>
<HEAD><TITLE> EJ3 Bucles – Tablas multiplicar </TITLE></HEAD>
<BODY>
<?php
 $num1 = 3;
 $num2 = 7;
?>

<table border=1px>
    <tr>
        <th>Operación</th>
        <th>Resultado</th>
    </tr>

    <?php
        for ($tabla=$num1; $tabla<=$num2; $tabla++) //Mientras la tabla vaya del $num1 (3) al $num2 (7)
        {                                           //que la tabla siga recorriendo el bucle (tabla++).
            for ($i=1; $i<=10; $i++) //recorre tabla
            {
                $resultado = $tabla * $i; //misma tabla que el anterior ejercicio.
                print("<tr>");
                print("<td>$tabla x $i</td>");
                print("<td>$resultado</td>");
                print("</tr>");
            }
        }
    ?>

</table>

</BODY>
</HTML>

<!--En cada vuelta, cambia de qué número se hace la tabla: primero 3, luego 4, luego 5, 6 y 7. Se ejecuta 5 veces en total (una por cada tabla)
Bucle interior for ($i=1; $i<=10; $i++)
Por cada tabla, este bucle recorre los números del 1 al 10, y en cada vuelta: calcula $resultado = $tabla * $i
Imprime una fila nueva en la tabla HTML con la operación y el resultado.
Se ejecuta 10 veces por cada tabla → como hay 5 tablas, en total se ejecuta 5 × 10 = 50 veces, generando 50 filas.

