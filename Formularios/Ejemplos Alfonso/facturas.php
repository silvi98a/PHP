<?php
/*
Esta forma de recuperar valores requiere que el método especificado en el formulario 
de envío sea POST y que la versión de PHP soporte variables superglobales.
*/
echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";

echo  $_POST['factura'],"<br>";

$proveedor = $_POST['proveedor'];
$importe = $_POST['importe'];
$iva = $_POST['iva'];

echo $proveedor,"<br>";
echo $importe,"<br>";
echo $iva,"<br>";

echo "Total factura:" . $totalfactura = $importe + $importe * ($iva/100); //porque el iva es por 0.21 o 0.10 y en el valor que he puesto en HTML es un 10 o 21
?>
