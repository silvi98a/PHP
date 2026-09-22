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

print("IP " . $ip1 . " en binario es " . $prim . $sec . $ter . $cuar);



?>
</BODY>
</HTML>