<HTML>
<HEAD><TITLE> EJ2 Bucles – Tabla multiplicar </TITLE></HEAD>
<BODY>
<?php
    $num = 8;
?>
                // los comentarios en html se hacen con <!-- -->

<table border=1px> <!-- Mirar tablas https://www.w3schools.com/html/html_tables.asp -->
    <tr>           <!-- Bordes https://www.w3schools.com/html/html_table_borders.asp -->
        <th>Operación</th> <!-- th son los encabezados que tendrá la tabla -->
        <th>Resultado</th> <!-- por cada th se forma una columna -->
    </tr>

        <?php
        for ($i=1; $i<=10; $i++) //recorrer tabla
            {
                $resultado = $num * $i;
                print("<tr>"); //abre una fila de la tabla. tr es table row
                print("<td>$num x $i</td>"); //escribe en una celda. td es table data
                print("<td>$resultado</td>"); //escribe en la siguiente celda (resultado)
                print("</tr>"); //cierra la fila de la tabla
            }
        ?>
</table>


</BODY>
</HTML>