<HTML>
<HEAD><TITLE> EJ6 Strings - Analizador de log de servidor </TITLE></HEAD>
<BODY>
<?php
 $log = "192.168.1.25 - GET /productos/listado.php - 200 - Mozilla/5.0";

 $partes = explode(" - ", $log); // separo por espacio guión espacio " - "
 $ip = $partes[0]; // 192.168.1.25
 $metodo_rec = $partes[1]; // GET /productos/listado.php
 $numero = $partes[2]; // 200
 $mozilla = $partes[3]; // Mozilla/5.0

 $metodo_partes = explode(" ", $metodo_rec); // cojo el GET y la ruta
 $GET = $metodo_partes[0]; // GET
 $ruta = $metodo_partes[1]; // /productos/listado.php

 $php = strtoupper(substr($ruta, -3)); // hago dos cosas a la vez, primero que me coja de
 // la $ruta, las tres últimas letras y, por fuera, que lo ponga en mayúsculas y lo guarde
 // en $php
 $si = strrev(strtoupper(substr($ruta, 12, 2))); // igual que el anterior, pero le 
 // digo desde qué posición (12) y desde esa posición hasta cuánto coge (2),
 // con strtoupper lo pongo en mayúsculas 
 // y con la función strrev lo que hago es darle la vuelta a lo que he escogido (is -> si).



 print("<b> Salida: </b> <br> <br>");
 print("IP: $ip <br>");
 print("Método: $GET <br>");
 print("Recurso: $ruta <br>");
 print("Código HTTP: $numero <br>");
 print("Navegador: $mozilla <br> <br>");
 print("Tipo de recurso: $php <br>");
 print("Petición correcta: $si <br>");

 
?>
</BODY>
</HTML>
