<HTML>

<HEAD>
    <TITLE> Datos Fichero </TITLE>
</HEAD>

<BODY>

    <form name='datos' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

        Fichero (Ruta/nombre): *
        <br>
        <input type='text' name='ruta' value='' size=15><br><br>

        <input type="submit" value="Ver datos fichero">
        <input type="reset" value="Borrar">

    </form>