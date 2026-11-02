<HTML>
<HEAD> <TITLE> Operaciones Ficheros </TITLE>
</HEAD>
<BODY>
    
    <form name='operaciones' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

    Fichero (Ruta/nombre): *
    <br>
    <input type='text' name='ruta' value='' size=15><br>

    Operaciones:
    <br>
    <input type='text' name='mostrarFichero' value='' checked>Mostrar fichero</br>

    <input type='text' name='mostrarLinea' value=''>Mostrar línea</br>
    <input type="number" name="linea" min="1" max="5" value="1">

    <input type="submit" value="Alta Factura"> <!--el submit en cuanto lo pinchamos, nos lleva al action-->

    <input type="reset" value="Borrar">

</FORM>
</BODY>
</HTML>
