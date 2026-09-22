<HTML>
<HEAD><TITLE> EJ1 Strings – Conversor de Decimal a Binario </TITLE></HEAD>
<BODY>

<?php
$ip1 = "192.18.16.204";

$var1 = substr($ip1,0,3);
$var2 = substr($ip1,4,2);
$var3 = substr($ip1,7,2);
$var4 = substr($ip1,10,3);

$prim = decbin((int) $var1);
$sec = decbin((int) $var2);
$ter = decbin((int) $var3);
$cuar = decbin((int) $var4);

print("IP " . $ip1 . " en binario es " . $prim . $sec . $ter . $cuar . "<br>");

#Otra manera de hacerlo con la función explode()
$porPartes = explode(".", $ip1); //explode separa por puntos
$parte0 = $porPartes[0];
$parte1 = $porPartes[1];
$parte2 = $porPartes[2];
$parte3 = $porPartes[3];

printf("IP " . $ip1 . " en binario es: %b.%b.%b.%b", $parte0, $parte1, $parte2, $parte3);
//lo que hace es que yo le paso en qué formato quiero que lo ponga y, después, con $asigno QUÉ quiero que me formatee.

// Si quisiera que no salgan los puntos entre los números binarios, en vez de poner los . entre las %b, lo dejaría
// sin puntos, así -> %b%b%b%b
?>
</BODY>
</HTML>