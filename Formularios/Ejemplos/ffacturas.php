<HTML>

<HEAD>
    <TITLE> FORMULARIO BASE </TITLE>
</HEAD>

<BODY>

    <form name='facturas' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Número Factura:
        <input type='text' name='factura' value='' size=15><br>

        Proveedor:
        <input type='text' name='proveedor' value='' size=15><br>

        Importe:
        <input type='text' name='importe' value='' size=15><br>

        IVA:
        <br>
        <input type='radio' name='iva' value='10'>10%</br>
        <input type='radio' checked name='iva' value='21'>21%</br>


        <input type="submit" value="Alta Factura"> <!--el submit en cuanto lo pinchamos, nos lleva al action-->

        <input type="reset" value="Borrar">

    </FORM>
</BODY>

</HTML>


<?php
/*
Solo ejecutar si pulsamos SUBMIT (Alta Factura). Lo que hace es que por una parte
esté el HTML y, por otra, el PHP
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "El method que ha usado es: ", $_SERVER['REQUEST_METHOD'], "<br>";

    echo "Nombre programa:", $_SERVER["PHP_SELF"], "<br>";

    echo $_POST['factura'], "<br>";

    $proveedor = $_POST['proveedor'];
    $importe = $_POST['importe'];
    $iva = $_POST['iva'];

    echo $proveedor, "<br>";
    echo $importe, "<br>";
    echo $iva, "<br>";

    echo "Total factura:" . $totalfactura = $importe + $importe * ($iva / 100); //porque el iva es por 0.21 o 0.10 y en el valor que he puesto en HTML es un 10 o 21
}
?>