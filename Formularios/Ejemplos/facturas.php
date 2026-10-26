<?php

echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";

echo  $_POST['factura'],"<br>";
$proveedor=$_POST['proveedor'];
$importe=$_POST['importe'];
$iva=$_POST['iva'];
echo  $proveedor,"<br>";
echo  "Importe:".$importe,"<br>";
echo  "IVA:".$iva,"<br>";
$totalfactura=$importe+$importe*($iva/100);
echo "Total factura:".$totalfactura;
?>