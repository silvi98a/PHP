<HTML>
<HEAD><TITLE> EJ4 Strings - Generador de URL amigable (slug) </TITLE></HEAD>
<BODY>
<?php
 $titulo = "Introducción a la Programación Web con PHP";

 $texto = trim($titulo); //quito espacios.
 $texto = strtolower($texto); //paso todo a minúsculas.

 $conTildes = array("á", "é", "í", "ó", "ú"); //quito las tildes metiéndolo en un array y remplazando
 $sinTildes = array("a", "e", "i", "o", "u"); //por las letras sin tilde.

 $texto = str_replace($conTildes, $sinTildes, $texto); //dos arrays que cambian cosas del texto
 //como le paso dos arrays, con el primero busca las letras con tilde
 // y con el segundo hace el reemplazo en
 // paralelo, posición [0] -> á por la posición [0] del otro array -> a

 $texto = str_replace(" ", "-", $texto); //esto es decirle al $texto que cambie todo lo que
                                         // lleve espacio por un guión.

 $url = "http://" . $texto;

 print($url);

?>
</BODY>
</HTML>