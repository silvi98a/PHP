<HTML>
<HEAD><TITLE> EJ2 Strings - Analizador de nombre de usuario </TITLE></HEAD>
<BODY>



<?php
 $nombre = " aLBeRTo gaRCia loPEz ";
 
 $conTrim = trim($nombre); //quita espacios.
 $conMinus = strtolower($conTrim); //todo en minúsculas.
 $mayusInic = ucwords($conMinus); //primera letra con mayúsculas
 $numCarac = strlen($conTrim); //cuenta caracteres.
 
 $nombrePartido = explode(" ", $mayusInic); //explode separa por espacios
 $nombreSolo = $nombrePartido[0];
 $apellido1 = $nombrePartido[1];
 $apellido2 = $nombrePartido[2];
 
 $iniciales = substr($nombreSolo, 0, 1) . "." .  //coge la primera letra de cada palabra
			  substr($apellido1, 0, 1) . "." .
			  substr($apellido2, 0, 1). ".";
	
 $nombreUsuario = strtolower($nombreSolo) . "." . strtolower($apellido1);
 
 print("Cadena original: " . $nombre . "<br>");
 print("Nombre normalizado: " . $mayusInic. "<br>");
 print("Número de caracteres: " . $numCarac . "<br>"); // me da 20 ???
 print("Nombre: " . $nombreSolo . "<br>");
 print("Primer apellido: " . $apellido1 . "<br>");
 print("Segundo apellido: " . $apellido2 . "<br>");
 print("Iniciales: " . $iniciales . " <br>");
 print("Nombre de usuario: " . $nombreUsuario);
 
?>


</BODY>
</HTML>